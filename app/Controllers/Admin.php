<?php
/* Default Controller File */

namespace Pathology\Controllers;

use Pathology\Core\Controller;

class Admin extends Controller
{
    public function __construct() {
        $this->userModel = $this->model('User');
        $this->aboutModel = $this->model('About');
    }

    public function index() {
        $data = [
            'title' => 'Admin',
        ];
        if (check_logged_in() && check_is_admin()){
            $this->view('admin/index', $data);
        }else{
            $_SESSION['ERRORS']['access'] = 'You do not have access to this page.';
            header('location: /pathology/');
            exit();
        }
    }

    public function login(){
        $data = [
            'title' => 'Admin Login',
        ];
        if (check_logged_in()){
            if (check_is_admin()){
                header('location: /pathology/admin/index');
                exit();
            }
            else{
                header('location: /pathology/users/profile');
                exit();
            }
        }else{
            $this->view('admin/login', $data);
        }
    }

    public function about(){
        $data = [
            'title' => 'Admin Login',
        ];
        $about_data = $this->aboutModel->getAboutData();
        $data['about'] = $about_data ? $about_data[0] : [];
        $this->view('admin/about', $data);
    }

    public function about_update(){
        /*
        * -------------------------------------------------------------------------------
        *   Securing against Header Injection
        * -------------------------------------------------------------------------------
        */

        foreach($_POST as $key => $value){
            $_POST[$key] = _cleaninjections(trim($value));
        }

        if(check_logged_in() && check_is_admin()){
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'info' => trim($_POST['info']),
                'house_no' => trim($_POST['house_no']),
                'street_name' => trim($_POST['street_name']),
                'state' => trim($_POST['state']),
                'postal' => trim($_POST['postal_code']),
                'city' => trim($_POST['city']),
                'country' => trim($_POST['country']),
                'phone' => trim($_POST['phone']),
            ];
            $data['error'] = [
                'info' => '',
                'house' => '',
                'street' => '',
                'state' => '',
                'postal' => '',
                'city' => '',
                'country' => '',
                'phone' => '',
            ];

            echo '===';
            print_r($data);
            if($this->aboutModel->updateAboutData($data)){
                echo 'success';
                $_SESSION['alert_success'] = 'Update successful';
            }else{
                echo 'failed';
                $_SESSION['alert_failed'] = 'Update failed';
            }
            header('location: /pathology/admin/about');
            exit();
        }else{
            $_SESSION['ERRORS']['access'] = 'You do not have access to this content.';
            header('location: /pathology');
            exit();
        }
    }
}

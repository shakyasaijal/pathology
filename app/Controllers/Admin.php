<?php
/* Default Controller File */

namespace Pathology\Controllers;

use Pathology\Core\Controller;

class Admin extends Controller
{
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function index() {
        $data = [
            'title' => 'Admin',
        ];
        if (check_logged_in() && check_is_admin()){
            echo 'logged in';
        }else{
            echo 'logged out';
        }
        $this->view('admin/index', $data);
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
}

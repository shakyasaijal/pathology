<?php
/* Contact Controller File */
namespace Pathology\Controllers;
use Pathology\Core\Controller;

class Contact extends Controller
{
    public function __construct(){
        $this->messageModel = $this->model('Message');
        $this->aboutModel = $this->model('About');
    }

    public function index()
    {   
        $about_data = $this->aboutModel->getAboutData();
        $this->view('contact/index',['title' => 'Contact Us', 'about_data' => $about_data[0]]);
    }

    public function message(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            /*
            * -------------------------------------------------------------------------------
            *   Securing against Header Injection
            * -------------------------------------------------------------------------------
            */

            foreach($_POST as $key => $value){
                $_POST[$key] = _cleaninjections(trim($value));
            }
            
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'full_name' => trim($_POST['full_name']),
                'email' => trim($_POST['email']),
                'phone' => trim($_POST['phone']),
                'subject' => trim($_POST['subject']),
                'message' => trim($_POST['message']),
                'fnError' => '',
                'emailError' => '',
                'subjectError' => '',
                'messageError' => '',
                'title' => 'Contact Us'
            ];

            if(empty($data['full_name'])){
                $data['fnError'] = 'Please enter your full name.';
            }

            if(empty($data['email'])){
                $data['emailError'] = 'Please enter your email address.';
            }else if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                $data['emailError'] = 'Please enter a valid email address.';
            }

            if(empty($data['subject'])){
                $data['subjectError'] = 'Please enter a suitable subject.';
            }

            if(empty($data['message'])){
                $data['messageError'] = 'Please enter a message';
            }

            if(empty($data['fnError']) && empty($data['emailError']) && empty($data['subjectError']) && empty($data['messageError'])){
                if($this->aboutModel->saveMessages($data)){
                    $_SESSION['alert_success'] = 'Message has been successfully sent. We will contact you as soon as possible.';
                }
                else{
                    $_SESSION['alert_failed'] = 'Message has could not be sent. Please try again.';
                }
                header('location: /pathology/contact');
            }else{
                $this->view('contact/index', $data);
            }
        }else{
            header('location: /pathology/contact');
            exit();
        }
    }
}
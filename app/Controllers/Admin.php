<?php
/* Default Controller File */

namespace Pathology\Controllers;

use Pathology\Core\Controller;

class Admin extends Controller
{
    public function __construct() {
        $this->userModel = $this->model('User');
        $this->aboutModel = $this->model('About');
        $this->messageModel = $this->model('Message');
        $this->faqModel = $this->model('Faq');
    }

    public function index() {
        $data = [
            'title' => 'Admin',
        ];
        if (check_logged_in() && check_is_admin()){
            $this->view('admin/index', $data);
        }else{
            $_SESSION['ERRORS']['access'] = 'You do not have access to this page.';
            header('location: /pathology/admin/login');
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
                'full_address' => trim($_POST['full_address']),
                'email' => trim($_POST['email']),
                'facebook_link' => trim($_POST['facebook_link']),
                'linkedin_link' => trim($_POST['linkedin_link']),
                'phone' => trim($_POST['phone']),
            ];
            $data['error'] = [
                'info' => '',
                'full_address' => '',
                'email' => '',
                'facebook_link' => '',
                'linkedin_link' => '',
                'phone' => '',
            ];

            if($this->aboutModel->updateAboutData($data)){
                $_SESSION['alert_success'] = 'Update successful.';
            }else{
                $_SESSION['alert_failed'] = 'Update failed. Please try again';
            }
            header('location: /pathology/admin/about');
            exit();
        }else{
            $_SESSION['alert_failed'] = 'You do not have access to this content.';
            header('location: /pathology');
            exit();
        }
    }

    public function messages(){
        if(check_logged_in() && check_is_admin()){
            $messages = $this->messageModel->getAllMessages();
            $data = [
                'title' => 'Messages',
                'messages' => $messages ? $messages : []
            ];
            $this->view('admin/messages', $data);
        }else{
            $_SESSION['alert_failed'] = 'You do not have access to this content.';
            header('location: /pathology');
            exit();
        }
    }

    public function faq(){
        if(check_logged_in() && check_is_admin()){
            $faq = $this->faqModel->getAllFaq();
            $data = [
                'title' => 'FAQ\'s',
                'faq' => $faq ? $faq : []
            ];
            $this->view('admin/faq', $data);
        }else{
            $_SESSION['alert_failed'] = 'You do not have access to this content.';
            header('location: /pathology');
            exit();
        }
    }

    public function faq_edit($id){
        if(check_logged_in() && check_is_admin()){
            $data = [
                'title' => 'EDIT'
            ];
            $row = $this->faqModel->getById($id);
            if ($row){
                $data['faq'] = $row;
                $data['id'] = $id;
                $this->view('admin/faq-base/edit.html', $data);
            }else{
                $_SESSION['alert_failed'] = 'Data not found.';
                header('location: /pathology/admin/faq');
                exit();
            }
            $this->view('admin/faq-base/edit', $data);
        }else{
            $_SESSION['alert_failed'] = 'You do not have access to this content.';
            header('location: /pathology');
            exit();
        }
    }
    public function faq_update(){
        /*
        * -------------------------------------------------------------------------------
        *   Securing against Header Injection
        * -------------------------------------------------------------------------------
        */

        foreach($_POST as $key => $value){
            $_POST[$key] = _cleaninjections(trim($value));
        }

        /*
        * -------------------------------------------------------------------------------
        *   Verifying CSRF token
        * -------------------------------------------------------------------------------
        */
        if (!verify_csrf_token()){
            $_SESSION['STATUS']['loginstatus'] = 'Request could not be validated';
            header("Location: /pathology/users/login");
            exit();
        }

        if (!$_SERVER['REQUEST_METHOD'] == 'POST'){
            header('location: /pathology/admin/faq');
            exit();
        }

        if(check_logged_in() && check_is_admin()){
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => 'EDIT',
                'question' => trim($_POST['question']),
                'answer' => trim($_POST['answer']),
                'id' => trim($_POST['faq_id']),
                'questionError' => '',
                'answerError' => '',
            ];

            if (empty($data['question'])){
                $data['questionError'] = 'Please enter a question.';
            }

            if (empty($data['answer'])){
                $data['answerError'] = 'Please enter a answer.';
            }

            if (empty($data['questionError']) && empty($data['answerError'])){
                if($this->faqModel->updateRow($data)){
                    $_SESSION['alert_success'] = 'Update successful.';
                }else{
                    $_SESSION['alert_success'] = 'Update failed. Please try again.';
                }
                header('location: /pathology/admin/faq');
                exit();
            }

            $this->view('admin/faq-base/edit', $data);
        }else{
            $_SESSION['alert_failed'] = 'You do not have access to this content.';
            header('location: /pathology');
            exit();
        }
    }

    public function faq_delete(){
        /*
        * -------------------------------------------------------------------------------
        *   Securing against Header Injection
        * -------------------------------------------------------------------------------
        */

        foreach($_POST as $key => $value){
            $_POST[$key] = _cleaninjections(trim($value));
        }

        /*
        * -------------------------------------------------------------------------------
        *   Verifying CSRF token
        * -------------------------------------------------------------------------------
        */
        if (!verify_csrf_token()){
            $_SESSION['STATUS']['loginstatus'] = 'Request could not be validated';
            header("Location: /pathology/users/login");
            exit();
        }

        if (!$_SERVER['REQUEST_METHOD'] == 'POST'){
            header('location: /pathology/admin/faq');
            exit();
        }

        if(check_logged_in() && check_is_admin()){
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => 'EDIT',
                'question' => trim($_POST['question']),
                'answer' => trim($_POST['answer']),
                'id' => trim($_POST['faq_id']),
                'questionError' => '',
                'answerError' => '',
            ];

            if (empty($data['question'])){
                $data['questionError'] = 'Please enter a question.';
            }

            if (empty($data['answer'])){
                $data['answerError'] = 'Please enter a answer.';
            }

            if (empty($data['questionError']) && empty($data['answerError'])){
                if($this->faqModel->updateRow($data)){
                    $_SESSION['alert_success'] = 'Update successful.';
                }else{
                    $_SESSION['alert_success'] = 'Update failed. Please try again.';
                }
                header('location: /pathology/admin/faq');
                exit();
            }

            $this->view('admin/faq-base/edit', $data);
        }else{
            $_SESSION['alert_failed'] = 'You do not have access to this content.';
            header('location: /pathology');
            exit();
        }
    }
}

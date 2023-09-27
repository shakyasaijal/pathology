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

        if (!$_SERVER['REQUEST_METHOD'] == 'POST'){
            header('location: /pathology/admin/faq');
            exit();
        }

        if(check_logged_in() && check_is_admin()){
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => 'EDIT',
                'faq_id' => trim($_POST['faq_id']),
            ];
            if($this->faqModel->deleteFaq($data['faq_id'])){
                $_SESSION['alert_success'] = '<strong>Success!</strong> FAQ has been successfully deleted.';
            }else{
                $_SESSION['alert_failed'] = '<strong>Sorry!</strong> FAQ could not be deleted. Please try again later.';
            }
            header('location: /pathology/admin/faq');
            exit();
        }else{
            $_SESSION['alert_failed'] = 'You do not have access to this content.';
            header('location: /pathology');
            exit();
        }
    }
    
    public function add_faq(){
        /*
        * -------------------------------------------------------------------------------
        *   Securing against Header Injection
        * -------------------------------------------------------------------------------
        */

        foreach($_POST as $key => $value){
            $_POST[$key] = _cleaninjections(trim($value));
        }

        if(check_logged_in() && check_is_admin()){
            $data = [
                'title' => 'Add FAQ',
            ];
            $this->view('admin/faq-base/add', $data);
        }else{
            $_SESSION['alert_failed'] = '<strong>Sorry !</strong> You do not have access.';
            header('location: /pathology');
            exit();
        }
    }

    public function faq_add(){
        /*
        * -------------------------------------------------------------------------------
        *   Securing against Header Injection
        * -------------------------------------------------------------------------------
        */

        foreach($_POST as $key => $value){
            $_POST[$key] = _cleaninjections(trim($value));
        }

        if(check_logged_in() && check_is_admin()){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Sanitize post data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'title' => 'Add FAQ',
                    'question' => trim($_POST['question']),
                    'answer' => trim($_POST['answer']),
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
                    if($this->faqModel->addFaq($data)){
                        $_SESSION['alert_success'] = 'Add successful.';
                    }else{
                        $_SESSION['alert_failed'] = 'Add failed. Please try again.';
                    }
                    header('location: /pathology/admin/faq');
                    exit();
                }else{
                    $_SESSION['alert_failed'] = 'Please fill all the fields.';
                    header('location: /pathology/admin/add_faq');
                    exit();
                }
            }else{
                $_SESSION['alert_failed'] = '<strong>Sorry !</strong> You do not have access.';
                header('location: /pathology');
                exit();
            }
        }else{
            $_SESSION['alert_failed'] = '<strong>Sorry !</strong> You do not have access.';
            header('location: /pathology');
            exit();
        }
    }

    public function all_doctors(){
        if(check_logged_in() && check_is_admin()){
            $doctors = $this->faqModel->getAllDoctors();
            $data = [
                'title' => 'Doctors',
                'doctors' => $doctors ? $doctors : []
            ];
            $this->view('admin/all-doctors', $data);
        }else{
            $_SESSION['alert_failed'] = 'You do not have access to this content.';
            header('location: /pathology');
            exit();
        }
    }

    public function add_doctors(){
        if(check_logged_in() && check_is_admin()){
            $data = [
                'title' => 'Add Doctor',
            ];
            $this->view('admin/add-doctors', $data);
        }else{
            $_SESSION['alert_failed'] = 'You do not have access to this content.';
            header('location: /pathology');
            exit();
        }
    }

    public function add_new_doctor(){
        /*
        * -------------------------------------------------------------------------------
        *   Securing against Header Injection
        * -------------------------------------------------------------------------------
        */

        foreach($_POST as $key => $value){
            $_POST[$key] = _cleaninjections(trim($value));
        }

        if(check_logged_in() && check_is_admin()){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Sanitize post data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'title' => 'Add Doctors',
                    'full_name' => trim($_POST['full_name']),
                    'email' => trim($_POST['email']),
                    'phone' => trim($_POST['phone']),
                    'speciality' => trim($_POST['speciality']),
                    'is_available' => trim($_POST['is_available'])
                ];

                $uploadDir = ROOT_FOLDER . "/pathology/public/img/doctors/"; // Directory where you want to store uploaded images
                $uploadFile = $uploadDir . basename($_FILES["image"]["name"]);
                
                if (!file_exists($uploadFile)){
                    move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFile);
                }

                $img_for_db = '/pathology/img/doctors/'. basename($_FILES["image"]["name"]);
                $data['photo'] = $img_for_db;
                $row = $this->userModel->saveDoctor($data);
                if($row){
                    $_SESSION['alert_success'] = '<strong>Success!</strong> New doctor has been added.';
                    header('location: /pathology/admin/all_doctors');
                    exit();
                }else{
                    $_SESSION['alert_success'] = '<strong>Sorry!</strong> New doctor could not be added. Please try again.';
                    header('location: /pathology/admin/add_doctors');
                    exit();
                }
            }else{
                $_SESSION['alert_failed'] = '<strong>Sorry !</strong> You do not have access.';
                header('location: /pathology/admin/add_doctors');
                exit();
            }
        }else{
            $_SESSION['alert_failed'] = '<strong>Sorry !</strong> You do not have access.';
            header('location: /pathology');
            exit();
        }
    }

    public function doctor_edit($id){
        if(check_logged_in() && check_is_admin()){
            $doctor = $this->userModel->getDoctorById($id);
            $data = [
                'title' => 'Edit Doctor',
                'doctor' => $doctor
            ];

            $this->view('admin/edit_doctor', $data);
        }else{
            $_SESSION['alert_failed'] = 'You do not have access to this content.';
            header('location: /pathology');
            exit();
        }
    }

    public function update_doctor(){
        /*
        * -------------------------------------------------------------------------------
        *   Securing against Header Injection
        * -------------------------------------------------------------------------------
        */

        foreach($_POST as $key => $value){
            $_POST[$key] = _cleaninjections(trim($value));
        }

        if(check_logged_in() && check_is_admin()){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Sanitize post data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'title' => 'Edit Doctors',
                    'full_name' => trim($_POST['full_name']),
                    'email' => trim($_POST['email']),
                    'phone' => trim($_POST['phone']),
                    'speciality' => trim($_POST['speciality']),
                    'is_available' => trim($_POST['is_available']),
                    'id' => trim($_POST['doctor_id']),
                    'doctor_photo' => trim($_POST['doctor_photo'])
                ];

                if($_FILES["image"]["name"]){
                    $uploadDir = ROOT_FOLDER . "/pathology/public/img/doctors/"; // Directory where you want to store uploaded images
                    $uploadFile = $uploadDir . basename($_FILES["image"]["name"]);
                    $img_for_db = '/pathology/img/doctors/'. basename($_FILES["image"]["name"]);
                }else{
                    $img_for_db = $data['doctor_photo'];
                }
                
                
                if (!file_exists($uploadFile) && $_FILES["image"]["name"]){
                    move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFile);
                }

                $data['photo'] = $img_for_db;
                $row = $this->userModel->updateDoctor($data);
                if($row){
                    $_SESSION['alert_success'] = '<strong>Success!</strong> Details has been updated.';
                    header('location: /pathology/admin/all_doctors');
                    exit();
                }else{
                    $_SESSION['alert_success'] = '<strong>Sorry!</strong> Details could not be updated. Please try again.';
                    header('location: /pathology/admin/all_doctors');
                    exit();
                }
            }else{
                $_SESSION['alert_failed'] = '<strong>Sorry !</strong> You do not have access.';
                header('location: /pathology');
                exit();
            }
        }else{
            $_SESSION['alert_failed'] = '<strong>Sorry !</strong> You do not have access.';
            header('location: /pathology');
            exit();
        }
    }

    public function doctor_delete(){
        /*
        * -------------------------------------------------------------------------------
        *   Securing against Header Injection
        * -------------------------------------------------------------------------------
        */

        foreach($_POST as $key => $value){
            $_POST[$key] = _cleaninjections(trim($value));
        }

        if(check_logged_in() && check_is_admin()){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Sanitize post data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'doctor_id' => trim($_POST['doctor_id'])
                ];

                if($this->userModel->deleteDoctor($data['doctor_id'])){
                    $_SESSION['alert_success'] = '<strong>Success !</strong> Doctor has been deleted.';
                    header('location: /pathology/admin/all_doctors');
                    exit();
                }else{
                    $_SESSION['alert_success'] = '<strong>Sprry !</strong> Doctor could not be deleted.';
                    header('location: /pathology/admin/all_doctors');
                    exit(); 
                }
            }
        }
    }
}

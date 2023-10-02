<?php
/* Default Controller File */

namespace Pathology\Controllers;

use Pathology\Core\Controller;

class Users extends Controller
{
    public function __construct() {
        $this->userModel = $this->model('User');
        $this->faqModel = $this->model('Faq');
        $this->aboutModel = $this->model('About');
    }

    public function login() {
        $about_data = $this->aboutModel->getAboutData();
        $data = [
            'title' => 'Login',
            'about_data' => $about_data[0]
        ];
        $this->view('authentication/login', $data);
    }

    public function register(){
        $about_data = $this->aboutModel->getAboutData();
        $this->view('authentication/register', ['title' => 'Register', 'about_data' => $about_data[0]]);
    }

    public function user_login() {
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
        $data = [
            'title' => 'Login',
            'email' => '',
            'password' => '',
            'emailError' => '',
            'passwordError' => ''
        ];

        //Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => 'Login',
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'is_admin' => trim($_POST['login_by']),
                'emailError' => '',
                'passwordError' => '',
            ];

            //Validate username
            if (empty($data['email'])) {
                $_SESSION['ERRORS']['emailError'] = 'Please enter a valid email.';
                $data['emailError'] = 'Please enter a username.';
            }

            //Validate password
            if (empty($data['password'])) {
                $_SESSION['ERRORS']['passwordError'] = 'Please enter a password.';
                $data['passwordError'] = 'Please enter a password.';
            }

            //Check if all errors are empty
            if (empty($data['emailError']) && empty($data['passwordError'])) {
                // Check if email exists

                if (!$this->userModel->findUserByEmail($data['email'])) {
                    $_SESSION['ERRORS']['emailError'] = "The email address you entered isn't connected to an account.";
                    $data['emailError'] = "The email address you entered isn't connected to an account.";
                }else{
                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                    if(gettype($loggedInUser) == 'boolean'){
                        $_SESSION['ERRORS']['passwordError'] = 'Authentication Failed.';
                        $data['passwordError'] = "Authentication Failed.";
                    }
                    else if(!$loggedInUser->email){
                        $_SESSION['ERRORS']['passwordError'] = 'Authentication Failed.';
                        $data['passwordError'] = "Authentication Failed.";
                    }else{
                        $this->createUserSession($loggedInUser);
                        if (isset($_POST['rememberme'])){

                            $selector = bin2hex(random_bytes(8));
                            $token = random_bytes(32);
                            
                            // Remove old authentication token
                            $this->userModel->removeAuthToken($data['email']);
    
                            setcookie(
                                'rememberme',
                                $selector.':'.bin2hex($token),
                                time() + (86400 * 30), // 86400 = 1 day
                                '/',
                            );
    
                            // Create authentication token
                            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
                            $this->userModel->createAuthToken($data['email'], $selector, $hashedToken, date('Y-m-d\TH:i:s', time() + 864000));
                        }
                        $_SESSION['alert_success'] = 'Login Successful.';

                        if ($loggedInUser->is_admin == 1){
                            header('location: /pathology/admin/index');
                            exit();
                        }else{
                            header('location: /pathology/users/profile');
                            exit();
                        }
                    }
                }
                
            $this->view('authentication/login', $data);
    }

        } else {
            $data = [
                'username' => '',
                'password' => '',
                'usernameError' => '',
                'passwordError' => ''
            ];
        }
        if ($data['is_admin'] == 'admin'){
            header('location: /pathology/admin/login');
            exit();
        }
        $this->view('authentication/login', $data);
    }

    public function user_register() {
        $data = [
            'title' => 'Register',
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $data = [
                'title' => 'Register',
                'first_name' => trim($_POST['first_name']),
                'last_name' => trim($_POST['last_name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => '',
                'first_nameError' => '',
                'last_nameError' => ''
            ];

            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            // Validate first name
            if(empty($data['first_name'])){
                $data['first_nameError'] = 'Please enter first name.';
            }else if(strlen($data['first_name']) < 2){
                $data['first_nameError'] = 'Please enter valid first name.';
            }


            // Validate last name
            if(empty($data['last_name'])){
                $data['last_nameError'] = 'Please enter last name.';
            }else if(strlen($data['last_name']) < 2){
                $data['last_nameError'] = 'Please enter valid last name.';
            }

            //Validate email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter email address.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter the correct format.';
            } else {
                //Check if email exists.
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['emailError'] = 'Email is already taken.';
                }
            }

           // Validate password on length, numeric values,
            if(empty($data['password'])){
              $data['passwordError'] = 'Please enter password.';
            } elseif(strlen($data['password']) < 8){
              $data['passwordError'] = 'Password must be at least 8 characters';
            } elseif (preg_match($passwordValidation, $data['password'])) {
              $data['passwordError'] = 'Password must be have at least one numeric value.';
            }

            //Validate confirm password
             if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Please confirm password.';
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                }
            }

            // Make sure that errors are empty
            if (empty($data['first_nameError']) && empty($data['last_nameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                //Register user from model function
                if ($this->userModel->register($data)) {
                    //Redirect to the login page
                    $_SESSION['alert_success'] = '<strong>Sign Up Successful!</strong> Please login with your credentials.';
                    include_once '../app/utils/sendEmail.php';
                    $subject = 'Sign Up Completed!';
                    $email_template = 'sign_up_completed.html';
                    $email_to = $data['email'];
                    $user_name = $data['first_name']. ' '. $data['last_name'];
                    sendEmail($subject, $email_template, $email_to, $user_name);
                    header('location: /pathology/users/login');
                    exit();
                } else {
                    die('Something went wrong.');
                }
            }
        }
        if (isset($data['first_nameError']) || isset($data['last_nameError']) || isset($data['emailError']) || isset($data['passwordError']) || isset($data['confirmPasswordError'])) {
            $_SESSION['alert_failed'] = '<strong>Error!</strong> Please resolve the errors below.';
        }
        $this->view('authentication/register', $data);
    }

    public function createUserSession($user) {
        $_SESSION['verified'] = $user->is_verified;
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['email'] = $user->email;
        $_SESSION['is_admin'] = $user->is_admin;
        if($user->is_verified){
            $_SESSION['auth'] = 'verified';
        } else{
            $_SESSION['auth'] = 'loggedin';
        }
    }

    public function profile(){
        $user = $this->userModel->getUserId($_SESSION['email']);
        
        if(!check_logged_in() && !$user){
            header('location: /pathology/users/login');
            exit();
        }else{
            $data = [
                'title' => 'Profile',
                'user_data' => $user
            ];
            $this->view('authentication/profile', $data);
        }

        
    }

    public function logout(){
        if (check_logged_in()){
            if(isset($_COOKIE[session_name()])){

                setcookie(session_name(), '', time()-7000000, '/');
            }
            
            if(isset($_COOKIE['rememberme'])) {
            
                setcookie('rememberme', '', time()-7000000, '/');
                $this->userModel->removeAuthToken($_SESSION['email']);

                if (isset($_SESSION['auth'])){
            
                    $_SESSION['auth'] = 'verified';
                }
            }
            session_unset();
            session_destroy();
            $_SESSION['alert_success'] = 'Logout successful!';
        }
        header('location: /pathology/');
        exit();
    }

    public function forget_password(){
        if(check_logged_in()){
            $_SESSION['alert_failed'] = 'You are already logged in!';
            header('location: /pathology');
            exit();
        }else{
            $about_data = $this->aboutModel->getAboutData();
            $data = [
                'title' => 'Forget Password',
                'about_data' => $about_data[0]
            ];
            $this->view('authentication/forget_password', $data);
        }
    }

    public function send_password_reset(){
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
            $_SESSION['alert_failed'] = 'Request could not be validated.';
            header("Location: /pathology/users/forget_password");
            exit();
        }
        $data = [
            'title' => 'Forget Password',
            'email' => '',
            'emailError' => '',
        ];

        //Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'email' => trim($_POST['email']),
                'emailError' => '',
            ];

            //Validate email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter a username.';
            }
            $user = $this->userModel->getUserId($data['email']);
            if (!$user) {
                $_SESSION['alert_success'] = 'If this email is recorded in our system, then you will receive a password reset email.';
                header('location: /pathology/users/forget_password');
                exit();
            }else{
                $token = bin2hex(random_bytes(16));

                $token_hash = hash("sha256", $token);

                $expiry = date("Y-m-d H:i:s", time() + 60 * 30);
                
                $this->userModel->setUserToken($token_hash, $expiry, $user);

                include_once '../app/utils/sendEmail.php';
                $subject = 'Breast Cancer Pathology | Reset Password';
                $email_template = 'password_reset.php';
                $email_to = $data['email'];
                $user_name = $user->first_name. ' '. $user->last_name;
                $send_data = array("token" => $token);
                $email_sent = sendEmailWithData($subject, $email_template, $email_to, $user_name, $send_data);
                $_SESSION['alert_success'] = 'If this email is recorded in our system, then you will receive a password reset email.';
                header('location: /pathology/users/login');
                exit();
            }
        }else{
            $_SESSION['alert_failed'] = 'Request could not be sent.';
            header('location: /pathology/users/login');
            exit();
        }
    }

    public function reset_password(){
        $token = $_GET['token'];
        $token_hash = hash("sha256", $token);
        $row = $this->userModel->getHashUser($token_hash);
        if (!$row){
            $_SESSION['alert_failed'] = 'Sorry. Token is invalid';
            header('location: /pathology/users/login');
            exit();
        }else{
            if (strtotime($row->expire_at) <= time()) {
                $_SESSION['alert_failed'] = 'Sorry. Token has expired. Please request a new one.';
                header('location: /pathology/users/forget_password');
                exit();
            }else{
                $user = $this->userModel->getUserById($row->user_id);
                $data = [
                    'title' => 'Reset Password',
                    'user' => $user
                ];
                $this->view('authentication/reset_password', $data);
            }
        }
    }

    public function complete_password_reset(){
        /*
        * -------------------------------------------------------------------------------
        *   Securing against Header Injection
        * -------------------------------------------------------------------------------
        */

        foreach($_POST as $key => $value){
            $_POST[$key] = _cleaninjections(trim($value));
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $data = [
                'title' => 'Reset Password',
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'user_id' => intVal(trim($_POST['user_id'])),
                'passwordError' => '',
                'confirmPasswordError' => '',
            ];

            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            // Validate password on length, numeric values,
            if(empty($data['password'])){
                $data['passwordError'] = 'Please enter password.';
            } elseif(strlen($data['password']) < 8){
                $data['passwordError'] = 'Password must be at least 8 characters';
            } elseif (preg_match($passwordValidation, $data['password'])) {
                $data['passwordError'] = 'Password must be have at least one numeric value.';
            }

            //Validate confirm password
            if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Please confirm password.';
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                    $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                }
            }

            // Make sure that errors are empty
            if (empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                $update_password = $this->userModel->updateUserPassword($data);
                if ($update_password){
                    $user = $this->userModel->getUserById($data['user_id']);
                    $_SESSION['alert_success'] = '<strong>Password Changed successfully!</strong> Please login with your credentials.';
                    if ($user) {
                        //Redirect to the login page
                        include_once '../app/utils/sendEmail.php';
                        $subject = 'Password has been reset!';
                        $email_template = 'password_has_reset.php';
                        $email_to = $user->email;
                        $user_name = $user->first_name. ' '. $user->last_name;
                        $send_data = array(
                            'time' => date('F j, Y, g:i A')
                        );
                        sendResetDoneEmail($subject, $email_template, $email_to, $user_name, $send_data);
                        header('location: /pathology/users/login');
                        exit();
                    } else {
                        header('location: /pathology/users/login');
                        exit();
                    }
                }else{
                    $_SESSION['alert_failed'] = '<strong>Sorry!</strong> Password could not be updated. Please try again later.';
                    header('location: /pathology/users/forget_password');
                    exit();
                }
            }else{
                $_SESSION['alert_failed'] = '<strong>Sorry!</strong> Password could not be updated. Please try again later.';
                header('location: /pathology/users/forget_password');
                exit();
            }
        }else{
            $_SESSION['alert_failed'] = '<strong>Sorry!</strong> Password could not be updated. Please try again later.';
            header('location: /pathology/users/forget_password');
            exit();
        }
    }

    public function doctors(){
        $doctors = $this->faqModel->getAllDoctors();
        $about_data = $this->aboutModel->getAboutData();
        $data = [
            'title' => 'Our Doctors',
            'doctors' => $doctors,
            'about_data' => $about_data[0]
        ];

        $this->view('home/all_doctors', $data);
    }

    public function consult(){
        /*
        * -------------------------------------------------------------------------------
        *   Securing against Header Injection
        * -------------------------------------------------------------------------------
        */

        foreach($_POST as $key => $value){
            $_POST[$key] = _cleaninjections(trim($value));
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(!check_logged_in()){
                $_SESSION['alert_failed'] = 'Please login first.';
                header('location: /pathology/users/login');
                exit();
            }else{
                $user = $this->userModel->getUserById($_SESSION['user_id']);
                $doctor = $this->userModel->getDoctorById(intVal(trim($_POST['doctor_id'])));
                if ($user && $doctor){
                    //Redirect to the login page
                    include_once '../app/utils/sendEmail.php';
                    $subject = 'Request for Consultation!';
                    $email_template = 'consult.html';
                    $email_to = $doctor->email;
                    $user_name = $doctor->full_name;
                    $send_data = array(
                        'time' => date('F j, Y, g:i A'),
                        'patient_name' => $user->first_name.' '.$user->last_name,
                        'patient_email' => $user->email,
                        'doctor_name' => $user_name
                    );
                    if(sendConsultEmail($subject, $email_template, $email_to, $user_name, $send_data)){
                        $_SESSION['alert_success'] = '<strong>Success!</strong> We have sent an email to the doctor and you. Doctor will contact you soon.';
                        header('location: /pathology/users/doctors');
                        exit();
                    }else{
                        $_SESSION['alert_failed'] = 'Something went wrong. Please try again later.';
                        header('location: /pathology/users/doctors');
                        exit();
                    }
                }else{
                    $_SESSION['alert_failed'] = 'Something went wrong. Please try again later.';
                    header('location: /pathology/users/doctors');
                    exit();
                }
            }
        }
    }
}

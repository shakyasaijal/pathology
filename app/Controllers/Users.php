<?php
/* Default Controller File */

namespace Pathology\Controllers;

use Pathology\Core\Controller;

class Users extends Controller
{
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function login() {
        $data = [
            'title' => 'Login',
        ];
        $this->view('authentication/login', $data);
    }

    public function register(){
        $this->view('authentication/register', ['title' => 'Register']);
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

                        if ($data['is_admin'] == 'admin'){
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
        $data = [
            'title' => 'Profile',
        ];
        if(!check_logged_in()){
            header('location: /pathology/users/login');
            exit();
        }
        $this->view('authentication/profile', $data);
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
            $data = [
                'title' => 'Forget Password',
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
            $user_id = $this->userModel->findUserByEmail($data['email']);
            if (!$user_id) {
                $_SESSION['alert_success'] = 'If this email is recorded in our system, then you will receive a password reset email.';
                header('location: /pathology/users/forget_password');
                exit();
            }else{
                $token = bin2hex(random_bytes(16));

                $token_hash = hash("sha256", $token);

                $expiry = date("Y-m-d H:i:s", time() + 60 * 30);
                
                $this->userModel->setUserToken($token_hash, $expiry, $user_id);

                include_once '../app/utils/sendEmail.php';
                $subject = 'Breast Cancer Pathology | Reset Password';
                $email_template = 'password_reset.html';
                $email_to = $data['email'];
                $user_name = $data['first_name']. ' '. $data['last_name'];
                sendEmail($subject, $email_template, $email_to, $user_name);
            }
        }else{
            $_SESSION['alert_failed'] = 'Request could not be sent.';
        }
    }
}

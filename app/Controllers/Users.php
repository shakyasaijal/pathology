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
        $data = [
            'title' => 'Login',
            'username' => '',
            'password' => '',
            'usernameError' => '',
            'passwordError' => ''
        ];

        //Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'usernameError' => '',
                'passwordError' => '',
            ];

            //Validate username
            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter a username.';
            }

            //Validate password
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter a password.';
            }

            //Check if all errors are empty
            if (empty($data['usernameError']) && empty($data['passwordError'])) {
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                echo $loggedInUser;
                // if ($loggedInUser) {
                //     $this->createUserSession($loggedInUser);
                // } else {
                //     $data['passwordError'] = 'Password or username is incorrect. Please try again.';

                //     $this->view('authentication/login', $data);
                // }

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
                    header('location: /pathology/users/login');
                } else {
                    die('Something went wrong.');
                }
            }
        }
        $this->view('authentication/register', $data);
    }
}

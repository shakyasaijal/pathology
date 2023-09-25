<?php
    include('../app/Models/User.php');

    function _cleaninjections($test) {

        $find = array(
            "/[\r\n]/", 
            "/%0[A-B]/",
            "/%0[a-b]/",
            "/bcc\:/i",
            "/Content\-Type\:/i",
            "/Mime\-Version\:/i",
            "/cc\:/i",
            "/from\:/i",
            "/to\:/i",
            "/Content\-Transfer\-Encoding\:/i"
        );
        $ret = preg_replace($find, "", $test);
        return $ret;
    }

    function generate_csrf_token() {

        if (!isset($_SESSION)) {

            session_start();
        }

        if (empty($_SESSION['token'])) {

            $_SESSION['token'] = bin2hex(random_bytes(32));
        }
    }

    function insert_csrf_token() {

        generate_csrf_token();

        echo '<input type="hidden" name="token" value="' . $_SESSION['token'] . '" />';
    }

    function verify_csrf_token() {

        generate_csrf_token();

        if (!empty($_POST['token'])) {

            if (hash_equals($_SESSION['token'], $_POST['token'])) {

                return true;
            } 
            else {
                
                return false;
            }
        }
        else {

            return false;
        }
    }

    function check_logged_out() {

        if (!isset($_SESSION['auth'])){
    
            return true;
        }
        else {
    
            header("Location: /pathology");
            exit();
        }
    }

    function check_logged_in() {
        if (isset($_SESSION['auth'])){
            return true;
        }
        else {
            // header("Location: /pathology/users/login/");
            // exit();
            return false;
        }
    }

    function check_is_admin(){
        if($_SESSION['is_admin'] == 1){
            return true;
        }else{
            return false;
        }
    }

    function force_login($email) {

        $userModel = new Pathology\Models\User();

        $row = $userModel->doForceLogin($email);
        if(!$row){
            return false;
        }else{
            if ($row->is_verified != NULL){
                $_SESSION['auth'] = 'verified';
            }else{
                $_SESSION['auth'] = 'loggedIn';
            }

            $_SESSION['verified'] =$row->is_verified;
            $_SESSION['user_id'] = $row->user_id;
            $_SESSION['email'] = $row->email;
            $_SESSION['is_admin'] = $row->is_admin;
            return true;
        }
    }

    function check_remember_me(){
        $userModel = new Pathology\Models\User();
        if (empty($_SESSION['auth']) && !empty($_COOKIE['rememberme'])) {
            list($selector, $validator) = explode(':', $_COOKIE['rememberme']);
            $row = $userModel->getAuthToken($selector);


            if (!$row){
                return false;
            }else{
                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($tokenBin, $row->token);

                if ($tokenCheck === false) {

                    // COOKIE VALIDATION FAILURE
                    return false;
                }
                else if ($tokenCheck === true) {

                    $email = $row->user_email;
                    force_login($email);
                    
                    return true;
                }
            }
        }
    }
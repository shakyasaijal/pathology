<?php 
include('../app/Views/base/header.php');

// if logged in then redirect to home page
check_logged_out();

?>
    <p>Login</p>
    <form method="POST" action="/pathology/users/user_login">
    <?php insert_csrf_token(); ?>

    <input type="hidden" name="type" value="login">
        <input type="text" name="email"  
        placeholder="Username/Email...">
        <?php print_r($_SESSION['ERRORS'])?>
        <?php 
            if(isset($_SESSION['ERRORS']['emailError'])) 
            {
                echo $_SESSION['ERRORS']['emailError']; 
                unset($_SESSION['ERRORS']); 
            }        
        ?>
        <input type="password" name="password" 
        placeholder="Password...">
        <?php 
            if(isset($_SESSION['ERRORS']['passwordError'])) {
                echo $_SESSION['ERRORS']['passwordError']; 
                unset($_SESSION['ERRORS']); 
            }
        ?>
        <input type="checkbox" class="custom-control-input" id="rememberme" name="rememberme">Remember Me
        <input type="hidden" name="login_by" value="admin"/>
        <button type="submit" name="submit" value="loginsubmit" name="loginsubmit">Log In</button>
    </form>

    <?php include('../app/Views/base/footer.php');?>

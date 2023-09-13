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
        <?php echo $data['emailError']; ?>
        <input type="password" name="password" 
        placeholder="Password...">
        <?php echo $data['passwordError']; ?>
        <input type="checkbox" class="custom-control-input" id="rememberme" name="rememberme">Remember Me
        <input type="hidden" name="login_by" value="user"/>
        <button type="submit" name="submit" value="loginsubmit" name="loginsubmit">Log In</button>
    </form>

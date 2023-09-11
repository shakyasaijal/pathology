<?php include('../app/Views/base/header.php')?>
    <p>Login</p>
    <form method="POST" action="/pathology/users/user_login">
    <input type="hidden" name="type" value="login">
        <input type="text" name="email"  
        placeholder="Username/Email...">
        <?php echo $data['emailError']; ?>
        <input type="password" name="password" 
        placeholder="Password...">
        <?php echo $data['passwordError']; ?>
        <button type="submit" name="submit">Log In</button>
    </form>

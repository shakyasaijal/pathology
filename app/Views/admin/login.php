<?php 
    include('../app/Views/base/header.php');
    include('../app/Views/base/navbar.php');

    // if logged in then redirect to home page
    check_logged_out();
?>


<div class="container margin_120_95">
	<div class="login-room">
    	<div class="auth-container verticle-center center">
			<div class="logo-page-container center">
                <img src="/pathology/img/logos/logo.png" alt="Breast Cancer Pathology">
        	</div>
        	<div class="form-container">
            	<div class="title text-center">ADMIN SIGN IN</div>
            	<div class="forms mt-3">
					<?php
						include_once('../app/Views/base/notification.php');
					?>
					<form action="/pathology/users/user_login" method="POST">
						<?php insert_csrf_token(); ?>
                        <input type="hidden" name="type" value="login">
                        <input type="hidden" name="login_by" value="admin"/>

						<div class="form-group">
							<div class="label">Email Address</div>
							<input type="text" name="email" class="form-control" autocomplete="off" required>
							
                            <?php 
                                if(isset($_SESSION['ERRORS']['emailError'])) 
                                {
                                    echo $_SESSION['ERRORS']['emailError']; 
                                    unset($_SESSION['ERRORS']); 
                                }        
                            ?>
						</div>
						<div class="form-group">
							<div class="label">Password </div>
							<input type="password" name="password" class="form-control" autocomplete="off" required>
							<?php 
                                if(isset($_SESSION['ERRORS']['passwordError'])) {
                                    echo $_SESSION['ERRORS']['passwordError']; 
                                    unset($_SESSION['ERRORS']); 
                                }
                            ?>
						</div>
						<div class="form-group">
							<input type="checkbox" id="rememberme" name="rememberme"> &nbsp;Remember Me
						</div>


						<div class="form-group">
							<button type="submit" class="btn btn-success">Sign In</button>
						</div>
					</form>
            	</div>
        	</div>
		</div>
	</div>
</div>
<?php include('../app/Views/base/footer.php');?>
	
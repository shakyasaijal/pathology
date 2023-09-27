<?php include('../app/Views/base/header.php');?>
<?php include('../app/Views/base/navbar.php');?>

<div class="container margin_120_95">
	<div class="login-room">
    	<div class="auth-container verticle-center center">
			<div class="logo-page-container center">
                <img src="/pathology/img/logos/logo.png" alt="Breast Cancer Pathology">
        	</div>
        	<div class="form-container">
            	<div class="title">SIGN IN</div>
            	<div class="forms mt-3">
					<?php
						include_once('../app/Views/base/notification.php');
					?>
					<form action="/pathology/users/user_login" method="POST">
						<?php insert_csrf_token(); ?>
            			<input type="hidden" name="type" value="login">
						<input type="hidden" name="login_by" value="user"/>
						<div class="form-group">
							<div class="label">Email Address</div>
							<input type="text" name="email" class="form-control" autocomplete="off" required>
							
							<?php
								if (isset($data['emailError'])){
									echo '<div class="form-error">'.
									$data['emailError'].'
								</div>';
								}
							?>
						</div>
						<div class="form-group">
							<div class="label">Password <span class="forget-password"><a href="/pathology/users/forget_password">Forget Password?</a></span></div>
							<input type="password" name="password" class="form-control" autocomplete="off" required>
							<?php
								if (isset($data['passwordError'])){
									echo '<div class="form-error">'.
									$data['passwordError'].'
								</div>';
								}
							?>
						</div>
						<div class="form-group">
							<input type="checkbox" id="rememberme" name="rememberme"> &nbsp;Remember Me
						</div>


						<div class="form-group">
							<button type="submit" class="btn btn-success">Sign In</button>
							<a href="/pathology/users/register" class="new-here"><span>New Here? <span class="up">Sign Up Now</span></span></a>
						</div>
					</form>
            	</div>
        	</div>
		</div>
	</div>
</div>
<?php include('../app/Views/base/footer.php');?>
	
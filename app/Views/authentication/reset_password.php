<?php include('../app/Views/base/header.php');?>
<?php include('../app/Views/base/navbar.php');?>

<div class="container margin_120_95">
	<div class="login-room">
    	<div class="auth-container verticle-center center">
	        <div class="logo-page-container center">
                <img src="/pathology/img/logos/logo.png" alt="Breast Cancer Pathology">
        	</div>
        	<div class="form-container">
            	<div class="title">Reset Your Password</div>
            	<div class="forms mt-3">
					<?php
						include_once('../app/Views/base/notification.php');
					?>
					<form action="/pathology/users/complete_password_reset" method="POST">
						<?php insert_csrf_token(); ?>
						<div class="form-group">
							<div class="label">New Password</div>
							<input type="password" name="password" class="form-control" autocomplete="off" required autofocus>
							
							<?php
								if (isset($data['passwordError'])){
									echo '<div class="form-error">'.
									$data['passwordError'].'
								</div>';
								}
							?>
							<input type="hidden" name="user_id" value="<?=$data['user']->user_id?>">
						</div>
						<div class="form-group">
							<div class="label">Confirm Password</div>
							<input type="password" name="confirmPassword" class="form-control" autocomplete="off" required>
							
							<?php
								if (isset($data['confirmPasswordError'])){
									echo '<div class="form-error">'.
									$data['confirmPasswordError'].'
								</div>';
								}
							?>
						</div>


						<div class="form-group">
							<button type="submit" class="btn btn-success">Send Reset Code</button>
						</div>
					</form>
            	</div>
        	</div>
		</div>
	</div>
</div>
<?php include('../app/Views/base/footer.php');?>
	
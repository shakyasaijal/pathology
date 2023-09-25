<?php include('../app/Views/base/header.php');?>
<?php include('../app/Views/base/navbar.php');?>

<div class="container margin_120_95">
	<div class="login-room">
    	<div class="auth-container verticle-center center">
	        <div class="logo-page-container center">
                <img src="/pathology/img/logos/logo.png" alt="Breast Cancer Pathology">
        	</div>
        	<div class="form-container">
            	<div class="title">Forgot your password?</div>
            	<div class="forms mt-3">
					<?php
						include_once('../app/Views/base/notification.php');
					?>
					<form action="/pathology/users/send_password_reset" method="POST">
						<?php insert_csrf_token(); ?>
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
							<button type="submit" class="btn btn-success">Send Reset Code</button>
						</div>
					</form>
            	</div>
        	</div>
		</div>
	</div>
</div>
<?php include('../app/Views/base/footer.php');?>
	
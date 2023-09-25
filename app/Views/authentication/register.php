<?php include('../app/Views/base/header.php');?>
<?php include('../app/Views/base/navbar.php');?>

<div class="container margin_120_95">
	<div class="login-room">
    	<div class="auth-container verticle-center center">
			<div class="logo-page-container center">
                <img src="/pathology/img/logos/logo.png" alt="Breast Cancer Pathology">
        	</div>
        	<div class="form-container">
            	<div class="title">SIGN UP</div>
            	
            	<div class="forms mt-3">
                    <?php
						include_once('../app/Views/base/notification.php');
					?>
					<form action="/pathology/users/user_register" method="POST">
						<?php insert_csrf_token(); ?>
                        <div class="form-group">
							<div class="label">First Name *</div>
							<input type="text" name="first_name" class="form-control" autocomplete="off" required value='<?php if($data['first_name']) echo $data['first_name']; ?>'>
							
							<?php
								if (isset($data['first_nameError'])){
									echo '<div class="form-error">'.
									$data['first_nameError'].'
								</div>';
								}
							?>
						</div>
                        <div class="form-group">
							<div class="label">Last Name *</div>
							<input type="text" name="last_name" value='<?php if($data['last_name']) echo $data['last_name']; ?>' class="form-control" autocomplete="off" required value='<?php if($data['first_name']) echo $data['first_name']; ?>'>
							
							<?php
								if (isset($data['last_nameError'])){
									echo '<div class="form-error">'.
									$data['last_nameError'].'
								</div>';
								}
							?>
						</div>
						<div class="form-group">
							<div class="label">Email Address *</div>
							<input type="text" name="email" class="form-control" autocomplete="off" required value='<?php if($data['email']) echo $data['email']; ?>'>
							
							<?php
								if (isset($data['emailError'])){
									echo '<div class="form-error">'.
									$data['emailError'].'
								</div>';
								}
							?>
						</div>
						<div class="form-group">
							<div class="label">Password *</div>
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
							<div class="label">Confirm Password *</div>
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
							<button type="submit" class="btn btn-success">Sign Up</button>
							<a href="/pathology/users/login" class="new-here"><span>Have an account? <span class="up">Sign In Now</span></span></a>
						</div>
					</form>
            	</div>
        	</div>
		</div>
	</div>
</div>
<?php include('../app/Views/base/footer.php');?>
	
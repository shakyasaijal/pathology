<header class="header_sticky">	
	<a href="#menu" class="btn_mobile">
		<div class="hamburger hamburger--spin" id="hamburger">
			<div class="hamburger-box">
				<div class="hamburger-inner"></div>
			</div>
		</div>
	</a>
	<!-- /btn_mobile-->
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-6">
				<a href="/pathology">
					<div class="main-logo-container">
						<img src="/pathology/img/logos/logo.png" alt="Breast Cancer Pathology">
					</div>
				</a>	
			</div>
			<div class="col-lg-9 col-6">
			
				<nav id="menu" class="main-menu">
					<ul>
						<li>
							<span><a href="/pathology">Home</a></span>
						</li>
						<li>
							<span><a href="/pathology/users/doctors">Doctors</a></span>
						</li>
						<li>
							<span><a href="/pathology/contact">Contact</a></span>
						</li>
						<li>
							<span><a href="/pathology/about">About Us</a></span>
						</li>
						<li>
							<span><a href="/pathology/faq">FAQ</a></span>
						</li>
						<?php
							if (check_logged_in()){
								echo '<li><span><a href="/pathology/users/logout"><i class="fas fa-running pr-2"></i> Logout</a></span></li>';
							}else{
								echo '<li>
									<span><a href="/pathology/users/login">Login</a></span>
								</li>';
							}
						?>
						
					</ul>
				</nav>
				<!-- /main-menu -->
			</div>
		</div>
	</div>
	<!-- /container -->
</header>
<main>

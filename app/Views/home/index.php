<?php include('../app/Views/base/header.php');?>
<?php include('../app/Views/base/navbar.php');?>
		<div class="hero_home version_1">
			<div class="content">
				<h3>Use Our AI!</h3>
				<p>
					An easy way to predict the breast cancer in real-time.
				</p>
				<a href="/pathology/ai" class="btn btn-lg btn-success">Use Now</a>
			</div>
		</div>
		<div class="container margin_120_95">
			<div class="main_title">
				<h2>Discover the <strong>online</strong> appointment!</h2>
				<p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie. Sed ad debet scaevola, ne mel.</p>
			</div>
			<div class="row add_bottom_30">
				<div class="col-lg-4 ">
					<div class="box_feat" id="icon_1">
						<span></span>
						<h3 class="wow fadeInLeft">Find a Doctor</h3>
						<p class="wow fadeInLeft">Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie.</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="box_feat" id="icon_2">
						<span></span>
						<h3 class="wow fadeInLeft">View profile</h3>
						<p class="wow fadeInLeft">Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie.</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="box_feat" id="icon_3">
						<h3 class="wow fadeInLeft">Book a visit</h3>
						<p class="wow fadeInLeft">Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie.</p>
					</div>
				</div>
			</div>
			<!-- /row -->
			<p class="text-center"><a href="{% url 'front:list' %}" class="btn_1 medium wow bounce">Find Doctor</a></p>
		</div>
		<!-- /container -->
		<div class="bg_color_1">
			<div class="container margin_120_95">
				<div class="main_title">
					<h2>Most Viewed doctors</h2>
				</div>
				<div id="reccomended" class="owl-carousel owl-theme">
					<?php
	                    foreach ($data['doctors'] as $row) {
							echo '
								<div class="item">
									<a href="">
										<div class="title">
											<h4>'. $row['full_name'] .'<em>
											'. $row['speciality'] .'
											</em></h4>
										</div><img src="'. $row['photo'] .'" alt=""/>
									</a>
								</div>
							';						
						}
					?>
				</div>
				<!-- /carousel -->
			</div>
			<!-- /container -->
		</div>
		<div id="app_section">
			<div class="container">
				<div class="row justify-content-around">
					<div class="col-md-5">
						<p><img src="/pathology/img/app_img.svg" alt="" class="img-fluid" width="500" height="433"></p>
					</div>
					<div class="col-md-6">
						<small>Application</small>
						<h3>Download <strong>Pathology App</strong> Now!</h3>
						<p class="lead">Tota omittantur necessitatibus mei ei. Quo paulo perfecto eu, errem percipit ponderum no eos. Has eu mazim sensibus. Ad nonumes dissentiunt qui, ei menandri electram eos. Nam iisque consequuntur cu.</p>
						<div class="app_buttons wow" data-wow-offset="100">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 43.1 85.9" style="enable-background:new 0 0 43.1 85.9;" xml:space="preserve">
							<path stroke-linecap="round" stroke-linejoin="round" class="st0 draw-arrow" d="M11.3,2.5c-5.8,5-8.7,12.7-9,20.3s2,15.1,5.3,22c6.7,14,18,25.8,31.7,33.1" />
							<path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-1" d="M40.6,78.1C39,71.3,37.2,64.6,35.2,58" />
							<path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-2" d="M39.8,78.5c-7.2,1.7-14.3,3.3-21.5,4.9" />
						</svg>
							<a href="#0" class="fadeIn"><img src="/pathology/img/apple_app.png" alt="" width="150" height="50" data-retina="true"></a>
							<a href="#0" class="fadeIn"><img src="/pathology/img/google_play_app.png" alt="" width="150" height="50" data-retina="true"></a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /app_section -->

<?php include('../app/Views/base/footer.php');?>

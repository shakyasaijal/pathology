</main>
<footer  class="wow fadeInUp">
	<div class="container margin_60_35">
		<div class="row">
			<div class="col-lg-3 col-md-12">
				<p>
					<a href="/pathology" title="Breast Cancer Pathology">
						<img src="/pathology/img/logos/logo.png" data-retina="true" alt="" width="163" height="36" class="img-fluid">
					</a>
				</p>
			</div>
			<div class="col-lg-3 col-md-4">
				<h5>About</h5>
				<ul class="links">
					<li><a href="/pathology/about">About us</a></li>
					<li><a href="/pathology/users/login">Login</a></li>
					<li><a href="/pathology/users/register">Register</a></li>
				</ul>
			</div>
			<div class="col-lg-3 col-md-4">
				<h5>Useful links</h5>
				<ul class="links">
					<li><a href="/pathology/users/doctors">Doctors</a></li>
					<li><a href="/pathology/contact">Contact</a></li>
					<li><a href="/pathology/faq">FAQ</a></li>
				</ul>
			</div>
			<div class="col-lg-3 col-md-4">
				<h5>Contact with Us</h5>
				<ul class="contacts">
					<li><a href="tel://<?=$data['about_data']['phone'];?>"><i class="icon_mobile"></i><?=$data['about_data']['phone'];?></a></li>
					<li><a href="mailto:<?=$data['about_data']['email'];?>"><i class="icon_mail_alt"></i> <?=$data['about_data']['email'];?></a></li>
				</ul>
			</div>
		</div>
		<!--/row-->
		<hr>
		<div class="row">
			<div class="col-md-8">
				
			</div>
			<div class="col-md-4">
				<div id="copy">© <span id="year"></span></div>
			</div>
		</div>
	</div>
</footer>
	<!--/footer-->
	</div>
	<!-- page -->
	<div id="toTop"></div>
	<!-- Back to top button -->
	<!-- COMMON SCRIPTS -->
	<script src="/pathology/js/jquery-2.2.4.min.js"></script>
	<script src="/pathology/js/common_scripts.min.js"></script>
	<script src="/pathology/js/functions.js"></script>
</body>
</html>
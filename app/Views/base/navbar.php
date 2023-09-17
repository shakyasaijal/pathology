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
				<a href="/"><h3>BC Pathology</h3></a>	
			</div>
			<div class="col-lg-9 col-6">
			
				<nav id="menu" class="main-menu">
					<ul>
						<li>
							<span><a href="/pathology">Home</a></span>
						</li>
						<li>
							<span><a href="{% url 'front:list' %}">Doctors</a></span>
						</li>
						<li>
							<span><a href="{% url 'front:blogs' %}">News and Events</a></span>
						</li>
						<li>
							<span><a href="{% url 'front:about' %}">About Us</a></span>
						</li>
						<li>
							<span><a href="/pathology/users/login">Login</a></span>
						</li>
					</ul>
				</nav>
				<!-- /main-menu -->
			</div>
		</div>
	</div>
	<!-- /container -->
</header>
<main>

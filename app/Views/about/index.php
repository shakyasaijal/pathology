<?php include('../app/Views/base/header.php');?>
<?php include('../app/Views/base/navbar.php');?>
	
<div class="bg_color_1">
    <div class="margin_120_95">
    <div class="bg_color_1">
			<div class="container margin_120_95">
				<div class="main_title">
					<h1>About Our Pathology</h1>
					<p><?php echo $data['about_data']['full_address']; ?></p>
				</div>
				<div class="row justify-content-between">
					<div class="col-lg-6">
						<figure class="add_bottom_30">
							<img src="/pathology/img/about_1.jpg" class="img-fluid" alt="">
						</figure>
					</div>
					<div class="col-lg-5">
                    <?php echo $data['about_data']['info']; ?>
						<p><em>-Admin Desk</em></p>
					</div>
				</div>
			</div>
		</div>
		<div class="container margin_120_95">
			<div class="main_title">
				<h2>Our founders</h2>
			</div>
			<div id="staff" class="owl-carousel owl-theme">
			<div class="item">
					<a href="javascript:void(0)">
						<div class="title">
							<h4>Ayush Yagol<em>CEO</em></h4>
						</div><img src="/pathology/img/ayush.png" alt="">
					</a>
				</div>
				<div class="item">
					<a href="javascript:void(0)">
						<div class="title">
							<h4>Roisha Shrestha<em>Marketing</em></h4>
						</div><img src="/pathology/img/roisha.png" alt="">
					</a>
				</div>
				
				<div class="item">
					<a href="javascript:void(0)">
						<div class="title">
							<h4>Saijal Shakya<em>Customer Service</em></h4>
						</div><img src="/pathology/img/saijal.png" alt="">
					</a>
				</div>
				<div class="item">
					<a href="javascript:void(0)">
						<div class="title">
							<h4>Ruby Chakatu<em>Business strategist</em></h4>
						</div><img src="/pathology/img/ruby.png" alt="">
					</a>
				</div>
			</div>
		</div>
		<div class="container margin_120_95">
			<div class="main_title">
				<h2>Why TO Choose Us</h2>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<a class="box_feat_about" href="#0">
						<i class="fa fa-user-md"></i>
						<h3>+ 5575 Doctors</h3>
						<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris.</p>
					</a>
				</div>
				<div class="col-lg-4 col-md-6">
					<a class="box_feat_about" href="#0">
						<i class="fa fa-phone"></i>
						<h3>H24 Support</h3>
						<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris. </p>
					</a>
				</div>
				<div class="col-lg-4 col-md-6">
					<a class="box_feat_about" href="#0">
						<i class="fa fa-book"></i>
						<h3>Instant Booking</h3>
						<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris.</p>
					</a>
				</div>
				<div class="col-lg-4 col-md-6">
					<a class="box_feat_about" href="#0">
						<i class="fa fa-headphones"></i>
						<h3>Help Direct Line</h3>
						<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris. </p>
					</a>
				</div>
				<div class="col-lg-4 col-md-6">
					<a class="box_feat_about" href="#0">
						<i class="fa fa-shield"></i>
						<h3>Secure Payments</h3>
						<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris.</p>
					</a>
				</div>
				<div class="col-lg-4 col-md-6">
					<a class="box_feat_about" href="#0">
						<i class="fa fa-comment"></i>
						<h3>Support via Chat</h3>
						<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris. </p>
					</a>
				</div>
			</div>
			<!--/row-->
		</div>
    </div>
</div>
		

<?php include('../app/Views/base/footer.php');?>

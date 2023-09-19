<?php include('../app/Views/base/header.php');?>
<?php include('../app/Views/base/navbar.php');?>
	
<div class="bg_color_1">
    <div class="margin_120_95">
    <div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">We would like to hear from you !!</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">Get in touch</h3>
									<div id="form-message-warning" class="mb-4">
										<?php
											include_once('../app/Views/base/notification.php');
										?>
									</div> 
				      		<div id="form-message-success" class="mb-4">
				      		</div>
									<form method="POST" id="contactForm" name="contactForm" class="contactForm" action="/pathology/contact/message">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="name">Full Name *</label>
													<input type="text" class="form-control" name="full_name" id="name" placeholder="Full Name" value="<?php if($data['full_name']) echo $data['full_name']; ?>" required>
                                                    <?php 
                                                        if($data['fnError']){
                                                            echo '<label class="form-error">' . $data['fnError'] . '</label>';
                                                        }
                                                    ?>
                                                </div>
											</div>
											<div class="col-md-6"> 
												<div class="form-group">
													<label class="label" for="email">Email Address *</label>
													<input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php if($data['email']) echo $data['email']; ?>" required>
                                                    <?php 
                                                        if($data['emailError']){
                                                            echo '<label class="form-error">' . $data['emailError'] . '</label>';
                                                        }
                                                    ?>
												</div>
											</div>
                                            <div class="col-md-6"> 
												<div class="form-group">
													<label class="label" for="email">Phone</label>
													<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php if($data['phone']) echo $data['phone']; ?>">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="subject">Subject *</label>
													<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" value="<?php if($data['subject']) echo $data['subject']; ?>" required>
                                                    <?php 
                                                        if($data['subjectError']){
                                                            echo '<label class="form-error">' . $data['subjectError'] . '</label>';
                                                        }
                                                    ?>
                                                </div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="#">Message *</label>
													<textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message" required></textarea>
                                                    <?php 
                                                        if($data['messageError']){
                                                            echo '<label class="form-error">' . $data['messageError'] . '</label>';
                                                        }
                                                    ?>
                                                </div>
											</div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Fields with (*) is required</label>
                                                </div>
                                            </div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="Send Message" class="btn theme-btn">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-lg-4 col-md-5 d-flex align-items-stretch">
								<div class="info-wrap bg-theme w-100 p-md-5 p-4 f-theme">
									<h3>Let's get in touch</h3>
									<p class="mb-4">We're open for any suggestion or just to have a chat</p>
                                <div class="dbox w-100 d-flex align-items-start">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-map-marker fa-icon-size"></span>
                                    </div>
                                    <div class="text pl-3">
                                    <p><span></span><?php echo $data['about_data']['full_address']; ?></p>
                                </div>
                            </div>
                                <div class="dbox w-100 d-flex align-items-start">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-phone fa-icon-size"></span>
                                    </div>
                                    <div class="text pl-3">
                                    <p><span></span> <a href="tel://<?php echo $data['about_data']['phone']; ?>"><?php echo $data['about_data']['phone']; ?></a></p>
                                </div>
                            </div>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-paper-plane fa-icon-size"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span></span> <a href="mailto:<?php echo $data['about_data']['email']; ?>"><?php echo $data['about_data']['email']; ?></a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-facebook fa-icon-size"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span></span> <a href="<?php echo $data['about_data']['facebook_link']; ?>" target="_blank">Facebook</a></p>
					          </div>
				          </div>
			          </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>
		

<?php include('../app/Views/base/footer.php');?>

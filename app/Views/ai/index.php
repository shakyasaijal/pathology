<?php include('../app/Views/base/header.php');?>
<?php include('../app/Views/base/navbar.php');?>
		<div class="hero_home version_1 ai_home_cover">
			<div class="content">
				<h3>Breast Cancer Prediction</h3>
				<p>
					AI based prediction model
				</p>
			</div>
		</div>
        <div class="bg_color_1">
			<div class="container margin_120_95">
				<div class="main_title">
					<h2>Get Started</h2>
					<p>Fill all the fields below from your report</p>
				</div>
				<div id="" class="container ai">
					<div class="form-box">
						<h1 class="text-center">Breast Cancer Prediction</h1>
						<p class="text-center">For quick evaluation only. Please consult with your doctor.</p>
						<form action="" class="mt-5">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="name">Radius Effected *</label>
										<input class="form-control" step="0.01" id="radius_mean" type="number" name="radius" min="0" max="100" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="name">Perimeter Covered *</label>
										<input class="form-control" step="0.01" id="perimeter_mean" type="number" name="perimeter" min="0" max="100" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="name">Area Mean *</label>
										<input class="form-control" step="0.01" id="area_mean" type="number" name="area" min="0" max="100" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="name">Symmetry *</label>
										<input class="form-control" step="0.01" id="symmetry_mean" type="number" name="symmetry" min="0" max="100" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="name">Compactness *</label>
										<input class="form-control" step="0.01" id="compactness_mean" type="number" name="compactness" min="0" max="100" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="name">Concave Points *</label>
										<input class="form-control" step="0.01" id="concave_mean" type="number" name="concave" min="0" max="100" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div id="result"></div>
								</div>
							</div>
							<button class="btn theme-btn btn-lg buttonload">
								<div class="predicting">
									<i class="fa fa-spinner fa-spin"></i> Predicting
								</div>
								<div class="to_predict">
									Predict
								</div>
							</button>
							</div>
						</form>
					</div>
				</div>
				<!-- /carousel -->
			</div>
			<!-- /container -->
		</div>
		<!-- Information about AI -->
		<div class="bg_color_1 bg_theme">
			<div class="container margin_120_95">
				<div class="main_title">
					<h2><b>About Our AI</b></h2>
					<p>Please go through the following information before using our AI</p>
				</div>
				<div id="" class="container ai">
					<div class="form-box">
						<h2 class="text-center">AI Prediction</h2>
						<p class="text-center">
						Our AI model for breast cancer prediction boasts a commendable <b>90% accuracy rate</b>, demonstrating its potential to significantly improve early diagnosis and patient outcomes. Leveraging advanced machine learning algorithms, it analyzes intricate patterns within medical data to swiftly and accurately identify potential malignancies. This high level of precision not only aids healthcare professionals in making informed decisions but also offers patients the benefit of early intervention, ultimately saving lives. Our model represents a powerful tool in the fight against breast cancer, underlining the remarkable potential of AI in the realm of medical diagnostics and enhancing the quality of healthcare delivery.
						</p>
						
					</div>
				</div>
				<div id="" class="container ai mt-5">
					<div class="form-box">
						<h2 class="text-center">Getting hands on report</h2>
						<p class="text-center">
							There are several clinics who are screening the breast for early detection of breast cancer in women.
							Basic screening will not be useful for predicting cancer using our AI. We recommend you to do <a href="https://www.breastscreen.nsw.gov.au/about-screening-mammograms" target="_blank"><b>Mammogram Screening</b></a>
							You can get the mammogram report in your email. Currently, <a href="https://www.breastscreen.nsw.gov.au/" target="_blank"><b>Breast Screen Service NSW</b></a> is 
							giving free mammograph screening.
						</p>
						
					</div>
				</div>
				<div id="" class="container ai mt-5">
					<div class="form-box">
						<h2 class="text-center">Mammogram Report Samping</h2>
						<div class="img-container">
							<img src="/pathology/img/breast/gram.png" class="img-fluid">
						</div>
						<div class="img-container">
							<img src="/pathology/img/breast/gram2.png" class="img-fluid">
						</div>
					</div>
				</div>
			</div>
			<!-- /container -->
		</div>
		<script src="/pathology/js/jquery-2.2.4.min.js"></script>
		<script>
			$(document).ready(function(){
				$("form").submit(function(e){
					$('.predicting').css('display', 'block');
					$('.to_predict').css('display', 'none');
					$('#result').html('');
					$('#result').removeClass('less_chance');
					$('#result').removeClass('high_chance');
					$('#result').html('');
					e.preventDefault();

					let data = JSON.stringify({
						"radius_mean": parseFloat(document.getElementById('radius_mean').value),
						"perimeter_mean": parseFloat(document.getElementById('perimeter_mean').value),
						"area_mean": parseFloat(document.getElementById('area_mean').value),
						"symmetry_mean": parseFloat(document.getElementById('symmetry_mean').value),
						"compactness_mean": parseFloat(document.getElementById('compactness_mean').value),
						"concave points_mean": parseFloat(document.getElementById('concave_mean').value)
					});

					$.ajax({
						url : '//localhost:<?=PORT_FOR_PYTHON;?>/predict',
						type: 'POST',
						data: data,
						contentType: 'application/json',
						success: function (data) {
							if (data === '1'){
								$('#result').html('Our AI has predicted that you have <b>higher chances</b> of Breast Cancer.');
								$('#result').addClass('high_chance');
							}else{
								$('#result').html('Our AI has predicted that you have <b>less chances</b> of Breast Cancer.');
								$('#result').addClass('less_chance');
							}
							$('.predicting').css('display', 'none');
							$('.to_predict').css('display', 'block');
						},
						error: function (request, status, error) {
							if (status === 'error'){
								$('#result').html('Looks like our server is down. Please try again.');
								$('#result').addClass('less_chance');
								$('.predicting').css('display', 'none');
								$('.to_predict').css('display', 'block');
							}
						}
					});					
				});
			});
		</script>
<?php include('../app/Views/base/footer.php');?>

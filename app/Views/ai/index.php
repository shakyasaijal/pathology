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
										<input class="form-control" step="0.01" id="radius_mean" type="number" name="radius" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="name">Perimeter Covered *</label>
										<input class="form-control" step="0.01" id="perimeter_mean" type="number" name="perimeter" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="name">Area Mean *</label>
										<input class="form-control" step="0.01" id="area_mean" type="number" name="area" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="name">Symmetry *</label>
										<input class="form-control" step="0.01" id="symmetry_mean" type="number" name="symmetry" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="name">Compactness *</label>
										<input class="form-control" step="0.01" id="compactness_mean" type="number" name="compactness" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="name">Concave Points *</label>
										<input class="form-control" step="0.01" id="concave_mean" type="number" name="concave" required>
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
						url : '//localhost:5000/predict',
						type: 'POST',
						data: data,
						contentType: 'application/json',
						success: function (data) {
							if (data === '1'){
								$('#result').html('Our AI has predicted that you have higher chances of Breast Cancer.');
								$('#result').addClass('high_chance');
							}else{
								$('#result').html('Our AI has predicted that you have less chances of Breast Cancer.');
								$('#result').addClass('less_chance');
							}
							$('.predicting').css('display', 'none');
							$('.to_predict').css('display', 'block');
						}
					});					
				});
			});
		</script>
<?php include('../app/Views/base/footer.php');?>
$("button").click(function(){
  
});
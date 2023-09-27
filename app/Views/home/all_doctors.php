<?php include('../app/Views/base/header.php');?>
<?php include('../app/Views/base/navbar.php');?>
<div class="container margin_60_35">
<?php
    include_once('../app/Views/base/notification.php');
?>
			<div class="row">
				<div class="col-lg-12">
                    <?php
                        foreach($data['doctors'] as $row){
                            echo '
                                <div class="strip_list wow fadeInLeft">
                                    <figure>
                                        <a href=""><img src="'. $row['photo'] .'" alt=""></a>
                                    </figure>
                                    <small>
                                        '. $row['speciality'] .'
                                    </small>
                                    <h3>Dr. '. $row['full_name'] .'</h3>
                                    <p>Phone: '. $row['phone'] .'</p>
                                    <p>Email: '. $row['email'] .'</p>
                                    <span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>('.  ($row['is_available'] == 1 ? 'Available': 'Not Available') .')</small></span>
                                    <ul>
                                        <li>
                                            <form method="POST" action="/pathology/users/consult">
                                                <input type="hidden" name="doctor_id" value="'. $row['id'] .'"/>
                                                <button type="submit" class="consult">Consult Now</button>
                                            </form>
                                        </li>a
                                    </ul>
                                </div>
                            ';
                        }
                    ?>
				</div>
				<!-- /aside -->
			</div>
			<!-- /row -->
		</div>

<?php include('../app/Views/base/footer.php');?>

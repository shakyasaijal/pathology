<?php include('../app/Views/base/header.php');?>
<?php include('../app/Views/base/navbar.php');?>


<div class="bg_color_1">
    <div class="margin_120_95">
        <div class="bg_color_1">
            <div class="container">
                <h2>
                    <?php
                        echo 'Hello '.$data['user_data']->first_name;
                    ?>
                </h2>

                <strong class="text-center">We are updating our system. Be in touch</strong>
            </div>
		</div>
    </div>
</div>
		

<?php include('../app/Views/base/footer.php');?>

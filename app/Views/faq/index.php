<?php include('../app/Views/base/header.php');?>
<?php include('../app/Views/base/navbar.php');?>
	
<div class="bg_color_1">
    <div class="container margin_120_95">
        <div class="main_title">
            <h2>Frequently Asked Questions</h2>
        </div>
    </div>
    <div class="container ">
        <div class="accordion" id="accordionExample">
            <?php
                $counter = 1;
                foreach($data['faq'] as $row){
                    echo '
                        <div class="card">
                            <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse' . $counter .'" aria-controls="collapse' . $counter . '">
                                ' . $row['question'] . '
                                </button>
                            </h2>
                            </div>
        
                            <div id="collapse'.$counter.'" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                ' . $row['answer'] . '
                            </div>
                            </div>
                        </div>
                    ';
                    $counter++;
                }
            ?>
        </div>
    </div>
</div>
		

<?php include('../app/Views/base/footer.php');?>

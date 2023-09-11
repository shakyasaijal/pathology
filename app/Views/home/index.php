<?php include('../app/Views/base/header.php')?>
<?php
    if(isLoggedIn()){
        echo 'yes';
    }
    else{
        echo 'no';
    }

    ?>
<!-- Anything you will write here will be loaded on view page -->

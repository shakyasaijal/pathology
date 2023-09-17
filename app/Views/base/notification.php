<?php
		if(isset($_SESSION['alert_failed'])){
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' .
                    $_SESSION['alert_failed'] . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
			unset($_SESSION['alert_failed']);
		}

		if(isset($_SESSION['alert_success'])){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' .
                    $_SESSION['alert_success'] . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
			unset($_SESSION['alert_success']);
		}
?>
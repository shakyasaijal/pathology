Admin dashboard
<?php
		if (check_logged_in()){
			echo '<a class="dropdown-item text-muted" href="/pathology/users/logout"><i class="fa fa-running pr-2"></i> Logout</a>';
		}
	?>
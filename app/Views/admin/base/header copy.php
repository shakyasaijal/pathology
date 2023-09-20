<?php
    if (check_logged_in()){
        echo '<a class="dropdown-item text-muted" href="/pathology/users/logout"><i class="fa fa-running pr-2"></i> Logout</a>';
    }
?>
<a href="/pathology/admin/about">About</a>
<a href="/pathology/admin/messages">Messages</a>
<a href="/pathology/admin/faq">FAQ</a>

<br/>
<?php
if(isset($_SESSION['alert_failed'])){
    echo $_SESSION['alert_failed'];
    unset($_SESSION['alert_failed']);
}

if(isset($_SESSION['alert_success'])){
    echo $_SESSION['alert_success'];
    unset($_SESSION['alert_success']);
}
?>
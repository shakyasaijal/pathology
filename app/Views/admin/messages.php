<?php include('../app/Views/admin/base/header.php');?>
<link href="/pathology/dashboard/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Messages</h1>
</div>
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">All Web Messages</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Message</th>
                        <th>Sent at</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Sent at</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                        foreach ($data['messages'] as $row) {
                            echo '<tr>';
                                echo '<td>' . $row['full_name'] . '</td>';
                                echo '<td>' . $row['email'] . '</td>';
                                echo '<td>' . $row['phone'] . '</td>';
                                echo '<td>' . $row['subject'] . '</td>';
                                echo '<td>' . $row['message'] . '</td>';
                                echo '<td>' . $row['created_at'] . '</td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('../app/Views/admin/base/footer.php');?>
<script src="/pathology/dashboard/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/pathology/dashboard/datatables/jquery.dataTables.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="/pathology/dashboard/js/admin.js"></script>
<script>
// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
  });
});

</script>
<!-- 
<table border="1">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Subject</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($data['messages'] as $row) {
                echo '<tr>';
                echo '<td>' . $row['full_name'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['phone'] . '</td>';
                echo '<td>' . $row['message'] . '</td>';
                echo '<td>' . $row['subject'] . '</td>';
                echo '<td>' . $row['created_at'] . '</td>';
                echo '<td>' . $row['updated_at'] . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table> -->
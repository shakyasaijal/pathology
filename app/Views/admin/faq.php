<?php include('../app/Views/admin/base/header.php');?>
<link href="/pathology/dashboard/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Frequently Asked Questions (FAQ)</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>S.No.</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                    $counter = 1;
                    foreach ($data['faq'] as $row) {
                        echo '<tr>';
                            echo '<td>' . $counter . '</td>';
                            echo '<td>' . $row['question'] . '</td>';
                            echo '<td>' . $row['answer'] . '</td>';
                            echo "<td><a href='/pathology/admin/faq_edit/$row[id]' title='Edit'><span class='fas fa-pencil-alt'></span></a></td>";
                        echo '</tr>';
                        $counter++;
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

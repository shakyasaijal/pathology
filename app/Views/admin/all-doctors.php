<?php include('../app/Views/admin/base/header.php');?>
<link href="/pathology/dashboard/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">All Doctors <a href="/pathology/admin/add_doctors" class="btn btn-success float-right"><span class="fas fa-plus"> Add New Doctors</span></a></h6>
    
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Full Name</th>
                    <th>Photo</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Speciality</th>
                    <th>Is Available</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>S.No.</th>
                    <th>Full Name</th>
                    <th>Photo</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Speciality</th>
                    <th>Is Available</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                    $counter = 1;
                    foreach ($data['doctors'] as $row) {
                        echo '<tr>';
                        echo '<td>' . $counter . '</td>';
                        echo '<td>' . $row['full_name'] . '</td>';
                        echo '<td><img src="' . $row['photo'] . '" class="doctors-img" /></td>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td>' . $row['phone'] . '</td>';
                        echo '<td>' . $row['speciality'] . '</td>';
                        echo '<td>' . $row['is_available'] . '</td>';
                        echo "<td>
                        <a href='/pathology/admin/doctor_edit/$row[id]' title='Edit'>
                            <button class='form-control btn-warning'>
                            <span class='fas fa-pencil-alt'>
                            </span></button>
                        </a>" . "&emsp;".
                        "
                            <form method='POST' action='/pathology/admin/doctor_delete/'>
                                <input type='hidden' name='doctor_id' value='".$row['id']."'/>
                                <button type='submit' class='form-control btn-danger' onClick='confirmDelete(event)'>
                                    <span class='fas fa-trash-alt'></span>
                                </button>
                            </form>
                        </td>";
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
<script src="/pathology/dashboard/swal/swal.min.js"></script>

<script>
// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#dataTable').DataTable({
    });
    function confirmDelete(event) {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        swal({
            title: "Are you sure?",
            text: "But you will still be able to retrieve this file.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, archive it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
                console.log('asda');
                // form.submit();          // submitting the form when user press yes
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
    }
});


</script>

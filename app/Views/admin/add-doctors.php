<?php include('../app/Views/admin/base/header.php');?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Doctor</h1>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Doctor Form</h6>
            </div>
            <div class="card-body">
                <form class="user" action="/pathology/admin/add_new_doctor" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="phone">Full Name *</label>
                            <input type="text" class="form-control form-control-user" name="full_name" id="exampleFirstName"
                                placeholder="Full Name" value="<?php echo $data['doctor']['full_name'] ? $data['doctor']['full_name'] : ''?>" required>
                            <?php echo isset($data['error']['full_name']) ? $data['error']['full_name']  : ''?>
                        </div>
                        <div class="col-sm-6">
                            <label for="phone">Photo *</label>
                            <input type="file" class="form-control-file" name="image" id="exampleLastName" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="phone">Email address *</label>
                            <input type="text" class="form-control form-control-user" name="email" id="exampleInputEmail"
                                placeholder="Email Address" value="<?php echo $data['doctor']['email'] ? $data['doctor']['email'] : ''?>" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="phone">Phone *</label>
                            <input type="number" class="form-control form-control-user" name="phone" id="exampleInputEmail"
                                placeholder="Phone" value="<?php echo $data['doctor']['phone'] ? $data['doctor']['phone'] : ''?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="phone">Speciality *</label>
                            <input type="text" class="form-control form-control-user" name="speciality" id="exampleFirstName"
                                placeholder="Full Name" value="<?php echo $data['doctor']['speciality'] ? $data['doctor']['speciality'] : ''?>" required>
                            <?php echo isset($data['error']['speciality']) ? $data['error']['speciality']  : ''?>
                        </div>
                        <div class="col-sm-6">
                        <label for="phone">Is Available *</label>
                            <select name="is_available" class="form-control" required>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            <?php echo isset($data['error']['is_available']) ? $data['error']['is_available']  : ''?>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-theme btn-md">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('../app/Views/admin/base/footer.php');?>

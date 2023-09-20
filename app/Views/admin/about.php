<?php include('../app/Views/admin/base/header.php');?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">About Page Update</h1>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Update Form</h6>
            </div>
            <div class="card-body">
                <form class="user" action="/pathology/admin/about_update" method="POST">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="phone">Phone number</label>
                            <input type="text" class="form-control form-control-user" name="phone" id="exampleFirstName"
                                placeholder="Phone" value="<?php echo $data['about']['phone'] ? $data['about']['phone'] : ''?>" required>
                            <?php echo isset($data['error']['phone']) ? $data['error']['phone']  : ''?>
                        </div>
                        <div class="col-sm-6">
                            <label for="phone">Email address</label>
                            <input type="text" class="form-control form-control-user" name="email" id="exampleLastName"
                                placeholder="Email" value="<?php echo $data['about']['email'] ? $data['about']['email'] : ''?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Full address</label>
                        <input type="text" class="form-control form-control-user" name="full_address" id="exampleInputEmail"
                            placeholder="Full Address" value="<?php echo $data['about']['full_address'] ? $data['about']['full_address'] : ''?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Facebook Link</label>
                        <input type="text" class="form-control form-control-user" name="facebook_link" id="exampleInputEmail"
                            placeholder="Facebook Link" value="<?php echo $data['about']['facebook_link'] ? $data['about']['facebook_link'] : ''?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Linkedin Link</label>
                        <input type="text" class="form-control form-control-user" name="linkedin_link" id="exampleInputEmail"
                            placeholder="Linkedin Link" value="<?php echo $data['about']['linkedin_link'] ? $data['about']['linkedin_link'] : ''?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Introduction</label>
                        <textarea name="info" class="form-control" rows="5">
                            <?php 
                                echo $data['about']['info'] ?
                                    $data['about']['info'] :
                                    '';
                            ?>
                        </textarea>
                        <?php echo isset($data['error']['info']) ? $data['error']['info']  : ''?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-theme btn-md">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('../app/Views/admin/base/footer.php');?>

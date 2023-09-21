<?php include('../app/Views/admin/base/header.php');?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Update FAQ</h1>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Update Form</h6>
            </div>
            <div class="card-body">
                <form class="user" action="/pathology/admin/faq_update" method="POST">
                    <?php insert_csrf_token(); ?>
                    <div class="form-group row">
                        <label for="phone">Question</label>
                        <textarea name="question" class="form-control" rows="5">
                            <?php
                                if (isset($data['faq'])){
                                    echo $data['faq']->question;
                                }
                            ?>
                        </textarea>
                        <?php
                            if (isset($data['questionError'])){
                                echo $data['questionError'];
                            }
                        ?>
                        <?php
                            if (isset($data['faq'])){
                                echo '<input type="hidden" name="faq_id" value="'.$data["id"].'"/>';
                            }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="phone">Answer</label>
                        <textarea name="answer" class="form-control" rows="5">
                            <?php
                                if (isset($data['faq'])){
                                    echo $data['faq']->answer;
                                }
                            ?>
                        </textarea>
                        <?php
                            if (isset($data['answerError'])){
                                echo $data['answerError'];
                            }
                        ?>
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

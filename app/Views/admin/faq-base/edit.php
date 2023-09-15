<?php include('../app/Views/admin/base/header.php');
?>

<form method="POST" action='/pathology/admin/faq_update'>
    <?php insert_csrf_token(); ?>
    <textarea name="question">
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
    <textarea name="answer">
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
    <button type="submit">Update</button>
</form>
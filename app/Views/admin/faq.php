<?php include('../app/Views/admin/base/header.php');
?>

<br/>faq
<br/>
<?php
foreach($data['faq'] as $row){
    echo $row['question'];
    echo "<a href='/pathology/admin/faq_edit/$row[id]'>Edit</a><br/>";
}
?>
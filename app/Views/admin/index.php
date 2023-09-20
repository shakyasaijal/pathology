<?php include('../app/Views/admin/base/header.php');?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>
<?php include('../app/Views/admin/base/footer.php');?>


<form action="/pathology/admin/about_update" method="POST">

    intro<textarea name="info">
    <?php 
        echo $data['about']['info'] ?
            $data['about']['info'] :
            '';
    ?>
    </textarea>
    <?php echo isset($data['error']['info']) ? $data['error']['info']  : ''?>
    
    House Number <input type="text" name="house_no" value="<?php echo $data['about']['house_no'] ? $data['about']['house_no'] : ''?>" required><br/>
    <?php echo isset($data['error']['house']) ? $data['error']['house']  : ''?>

    Street name<input type="text" name="street_name" value="<?php echo $data['about']['street_name'] ? $data['about']['street_name'] : ''?>" required><Br/>
    <?php echo isset($data['error']['street']) ? $data['error']['street']  : ''?>

    State<input type="text" name="state" value="<?php echo $data['about']['state'] ? $data['about']['state'] : ''?>" required><Br/>
    <?php echo isset($data['error']['state']) ? $data['error']['state']  : ''?>

    POstal<input type="number" name="postal_code" value="<?php echo $data['about']['postal_code'] ? $data['about']['postal_code'] : ''?>" required><Br/>
    <?php echo isset($data['error']['postal']) ? $data['error']['postal']  : ''?>

    City<input type="text" name="city" value="<?php echo $data['about']['city'] ? $data['about']['city'] : ''?>" required><Br/>
    <?php echo isset($data['error']['city']) ? $data['error']['city']  : ''?>

    Country<input type="text" name="country" value="<?php echo $data['about']['country'] ? $data['about']['country'] : ''?>" required><Br/>
    <?php echo isset($data['error']['country']) ? $data['error']['country']  : ''?>

    Phone<input type="text" name="phone" value="<?php echo $data['about']['phone'] ? $data['about']['phone'] : ''?>" required><Br/>
    <?php echo isset($data['error']['phone']) ? $data['error']['phone']  : ''?>

        <button type="submit">Update</button>

</form>

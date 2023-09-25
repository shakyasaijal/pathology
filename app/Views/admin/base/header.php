<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BCP Dashboard <?php if($data['title']) echo '| ' . $data['title']; ?></title>

    <!-- Custom fonts for this template-->
    <link href="/pathology/dashboard/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/pathology/dashboard/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/pathology/dashboard/swal/swal.min.css" rel="stylesheet">
    <link href="/pathology/dashboard/css/custom.admin.css" rel="stylesheet">
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include('../app/Views/admin/base/sidebar.php');?>
        
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include('../app/Views/admin/base/navbar.php');?>
                <div class="container-fluid">
                    <?php include('../app/Views/base/notification.php'); ?>
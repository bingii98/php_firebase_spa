<?php
if (!isset($_SESSION)) session_start();
//if (!isset($_SESSION['_userSignedIn'])) header('Location: login.php');
?>
<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CHB Coffee - Sản phẩm</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://bingii901.com/images/icons/favicon.ico">
    <link href="assets/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor_file/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/notification.css" rel="stylesheet">
</head>

<body id="page-top">
<div class="wrapper">
</div>
<div id="wrapper">
    <!-- Sidebar -->
    <?php include 'component/admin-slidebar.php' ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <!-- Topbar Navbar -->
            <?php include 'component/admin-header.php' ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="card shadow mb-4" style="max-width: 700px;margin: auto;">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Thêm danh mục</h6>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="form-label" for="txt-name">Tên danh mục</label>
                                        <input type="text" class="form-input form-control" id="txt-name">
                                        <label class="form-error" id="error-name"></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="txt-description">Mô tả</label>
                                        <textarea class="form-control form-input" id="txt-description"
                                                  rows="3"></textarea>
                                        <label class="form-error" id="error-description"></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Hoạt động</label>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input form-input" id="switch1">
                                            <label class="custom-control-label" for="switch1"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary form-control" id="btn-add-product-list" type="button">
                                            <strong>Xác nhận</strong></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="vendor_file/jquery/jquery.min.js"></script>
<script src="vendor_file/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor_file/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
<!--<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>-->
<script src="https://www.gstatic.com/firebasejs/7.14.4/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.14.4/firebase-database.js"></script>
<script src="js/notification.js"></script>
<script src="js/ajax/regex.js"></script>
<script src="js/ajax/product-list-add.js"></script>
</body>

</html>

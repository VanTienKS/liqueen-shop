<?php
session_start();
require_once($baseUrl.'../utils/utility.php');
    require_once($baseUrl.'../database/dbhelper.php');
    $user=getUserToken();
    // if($user == null)
    // {
    //         header('Location:'.$baseUrl.' authen/login.php');
    //         die();
    // }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet"type="text/css" href="<?=$baseUrl?>/ass/css/dashboard.css">
    <link rel="stylesheet"type="text/css" href="../../assets/css/admincss.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script src="../../assets/js/coupons.js"></script>
<script src="../../assets/js/supplier.js"></script>
<script src="../../assets/js/enter_coupon.js"></script>

</head>
<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Ban Hang </a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Tìm kiếm" aria-label="Search">
    <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
    <a class="nav-link" href="#">Thoát</a>
</li>
    </ul>
    </nav>

    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class=" sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?=$baseUrl?>">
                                <i class="bi bi-house-fill"></i>
                                DASHBOARD
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href ="<?=$baseUrl?>category">
                                <i class="bi bi-folder"></i>
                                Danh mục sản phẩm
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href ="<?=$baseUrl?>product">
                                <i class="bi bi-folder"></i>
                                sản phẩm
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href ="<?=$baseUrl?>order">
                                <i class="bi bi-folder"></i>
                                Quản lý đơn hàng
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href ="<?=$baseUrl?>feedback">
                                <i class="bi bi-folder"></i>
                                Quản lý phản hồi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href ="<?=$baseUrl?>user">
                                <i class="bi bi-folder"></i>
                                Quản lý người dùng
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href ="<?=$baseUrl?>discount">
                                <i class="bi bi-folder"></i>
                                Mã giảm giá
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href ="<?=$baseUrl?>supplier">
                                <i class="bi bi-folder"></i>
                                Nhà cung cấp
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href ="<?=$baseUrl?>enter_coupon">
                                <i class="bi bi-folder"></i>
                                Phiếu nhập
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">


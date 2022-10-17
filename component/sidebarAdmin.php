<?php
session_start();
if (!$_SESSION['isLogin']) {
    header("location: ../index.php");
} else {
    include('../db.php');
}
?>
<!Doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/fee4f29424.js" crossorigin="anonymous"></script>
    <link href="../gaya.css" rel="stylesheet">
    <title>Dashboard!</title>
    <style>
    * {
        font-family: "Poppins";
    }

    .side-bar {
        width: 260px;
        background-color: #15282f;
        min-height: 100vh;
    }

    a {
        padding-left: 10px;
        font-size: 13px;
        text-decoration: none;
        color: white;
    }

    .header {
        padding: 0px 20px;
    }

    .menu i {
        padding-left: 20px;
    }

    .menu .content-menu {
        padding: 9px 7px;
    }

    .isActive {
        background-color: #071853 !important;
        border-right: 8px solid #010E2F;
    }

    i {
        color: white;
    }

    .white {
        color: white;
    }
    </style>
</head>

<body>
    <aside>
        <div class="d-flex">
            <div class="side-bar">
                <div class="header">
                    <h2 class="text-light text-center pt-2"
                        style="font-style: oblique;text-shadow: -2px -2px 0 #000, 2px -2px 0 #000, -2px 2px 0 #000, 2px 2px 0 #000;">
                        Perpustakaan <br> Admin</h2>

                </div>
                <hr class="white">
                <div class="menu">
                    <div class="content-menu">
                        <i class="fa fa-dashboard"></i>
                        <a href="./dashboardAdminPage.php" style="font-weight:600">&nbspDashboard Admin</a>
                    </div>
                    <div class="content-menu">
                        <i class="fa fa-user"></i>
                        <a href="./profileAdminPage.php" style="font-weight:600">&nbsp&nbspProfile Admin</a>
                    </div>
                    <div class="content-menu">
                        <i class="fa fa-book"></i>
                        <a href="./peminjamanAdminPage.php" style="font-weight:600">&nbsp&nbspPeminjaman User</a>
                    </div>
                    <div class="content-menu">
                        <i class="far fa-comments"></i>
                        <a href="./adminKritikSaranPage.php" style="font-weight:600">&nbspKritik & Saran[admin]</a>
                    </div>

                    <hr class="white">
                </div>
                <div class="menu">
                    <div class="content-menu">
                        <i class="fa fa-sign-out"></i>
                        <a href="../process/logoutProcess.php" style="font-weight:600">&nbspLogout</a>
                    </div>
                </div>
            </div>
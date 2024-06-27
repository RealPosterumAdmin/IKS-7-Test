<?php
?>

<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    $_SESSION['msg'] = "Вход необходим в целях безопасности.";
    header('Location: login.php');
    exit;
}
include "php/classes/DatabaseClass.php";
include "php/classes/PostsClass.php";
if (isset($_GET['id'])){
    $db = new DatabaseClass();
    $post_conrtol = new PostsClass($db);
    $result = $post_conrtol->view($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8" />
    <title>Posts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
    <!-- Quill css -->
    <link href="assets/css/vendor/quill.core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/vendor/quill.snow.css" rel="stylesheet" type="text/css" />

    <link href="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-2.0.5/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/date-1.5.2/r-3.0.2/sc-2.4.1/sb-1.7.1/sr-1.4.1/datatables.min.css" rel="stylesheet">
</head>

<body class="loading" data-layout="topnav" data-layout-config='{"layoutBoxed":false,"darkMode":false,"showRightSidebarOnStart": false}'>
<!-- Begin page -->
<div class="wrapper">
    <div class="content-page">
        <div class="content">
            <!-- Topbar Start -->
            <div class="navbar-custom topnav-navbar">
                <div class="container-fluid">

                    <!-- LOGO -->
                    <a href="" class="topnav-logo">
                                <span class="topnav-logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" height="16">
                                </span>
                        <span class="topnav-logo-sm">
                                    <img src="assets/images/logo_sm_dark.png" alt="" height="16">
                                </span>
                    </a>
                    <ul class="list-unstyled topbar-menu float-end mb-0">

                        <li class="notification-list">
                            <a class="nav-link end-bar-toggle" href="php/main.php?logout">
                                <i class="dripicons-power noti-icon"></i>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
            <!-- end Topbar -->

            <br>

            <div class="content-page">
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <h1>
                            <?php echo($result[0]['title']);?>
                        </h1>

                        <?php echo($result[0]['content']);?>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- container -->
    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <script>document.write(new Date().getFullYear())</script> © Hyper - Coderthemes.com
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->
<!-- bundle -->
<script src="assets/js/vendor.min.js"></script>
<script src="assets/js/app.min.js"></script>
<!-- plugin js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-2.0.5/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/date-1.5.2/r-3.0.2/sc-2.4.1/sb-1.7.1/sr-1.4.1/datatables.min.js"></script>
</script>


</body>
</html>


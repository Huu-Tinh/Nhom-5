<?php
session_start();
ob_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
    <?
    include './includes/pdo.php';
    include './pages/user/user.php';
    include './pages/categori/categori.php';
    include './pages/product/product.php';
    include './pages/comment/comment.php';
    if (isset($_SESSION['admin'])) {
    ?>
        <!--  Body Wrapper -->
        <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
            <?php
            include './includes/sidebar.php'
            ?>
            <!--  Main wrapper -->
            <div class="body-wrapper">
            <?
        }
            ?>

            <?php
            include './includes/header.php';

            $action = 'home';
            if (isset($_GET['act'])) {
                $action = $_GET['act'];
            }
            if (!isset($_SESSION['admin'])) {
                $action = 'login';
            }

            switch ($action) {
                case 'home':
                    include './pages/home.php';
                    break;
                case 'login':
                    include './includes/login.php';
                    break;
                case 'froms':
                    include './pages/forms.php';
                    break;

                case 'user':
                    switch ($_GET['get']) {
                        case 'list':
                            include './pages/user/listUser.php';
                            break;
                        case 'add':
                            include './pages/user/add.php';
                            break;
                        case 'update':
                            include './pages/user/update.php';
                            break;

                        default:
                            // include './pages/user/listUser.php';
                            break;
                    }
                    break;
                case 'categori':
                    switch ($_GET['get']) {

                        case 'list':
                            include './pages/categori/listCategori.php';
                            break;
                        case 'add':
                            include './pages/categori/add.php';
                            break;
                        case 'update':
                            include './pages/categori/update.php';
                            break;

                        default:

                            break;
                    }
                    break;

                case 'comment':
                    switch ($_GET['get']) {

                        case 'list':
                            include './pages/comment/listComment.php';
                            break;
                        
                        

                        default:

                            break;
                    }
                    break;

                case 'product':
                    switch ($_GET['get']) {
                        case 'list':
                            include './pages/product/listProduct.php';
                            break;
                        case 'add':
                            include './pages/product/add.php';
                            break;
                        case 'update':
                            include './pages/product/update.php';
                            break;
                        case 'delete':
                            include './pages/product/delete.php';
                            break;
                        default:

                            break;
                    }
                    break;

                case 'order':
                    switch ($_GET['get']) {
                        case 'list':
                            include './pages/order/listOrder.php';
                            break;
                        case 'add':
                            include './pages/order/add.php';
                            break;
                        case 'update':
                            include './pages/order/update.php';
                            break;

                        default:

                            break;
                    }
                    break;
                default:
                    include './pages/home.php';
                    break;
            }


            ?>
            </div>
        </div>
        <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/sidebarmenu.js"></script>
        <script src="../assets/js/app.min.js"></script>
        <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
        <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
        <script src="../assets/js/dashboard.js"></script>
</body>

</html>
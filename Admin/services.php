<?php
include 'head.php';
if ($_GET['do'] == 'delete') {
    if (isset($_GET['serv'])) {
        if (!empty($_GET['serv'])) {
            $stmt = $con->prepare("SELECT * FROM `offers` WHERE `OffersService` = '" . $_GET['serv'] . "'");
            $stmt->execute();
            $ddoffers = $stmt->fetchAll();
            foreach ($ddoffers as $x) {
                $stmt = $con->prepare("DELETE FROM `offers` WHERE `OffersID` = :zid");
                $stmt->bindParam(":zid", $x['OffersID']);
                $stmt->execute();
            }
            $stmt = $con->prepare("DELETE FROM `services` WHERE `id_services` = :zid");
            $stmt->bindParam(":zid", $_GET['serv']);
            $stmt->execute();
            $url = "services.php";
            header('Location: ' . $url);
        } else {
            $url = "services.php";
            header('Location: ' . $url);
            exit();
        }
    } else {
        $url = "services.php";
        header('Location: ' . $url);
        exit();
    }
}
?>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="">
                            <img src="images/logo.png" alt="" style="width: auto; height:40px;">
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt" style="color:tomato;"></i>الرئيسية</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-chart-bar"></i>الخدمات</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-table"></i>العروض</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="far fa-check-square"></i>الشكاوي</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->


        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="#" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">محمد مصطفي</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="#" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">محمد مصطفي</a>
                                                    </h5>
                                                    <span class="email">johndoe@example.com</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>الصفحة الرئيسية</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>الاعدادات</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>الفواتير</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="#">
                                                    <i class="zmdi zmdi-power"></i>تسجيل الخروج</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MENU SIDEBAR-->
            <aside class="menu-sidebar d-none d-lg-block">
                <div class="logo">
                    <a href="#">
                        <img src="images/logo.png" alt="" style="width: auto; height:40px;" />
                    </a>
                </div>
                <div class="menu-sidebar__content js-scrollbar1">
                    <nav class="navbar-sidebar">
                        <ul class="list-unstyled navbar__list">
                            <li class="active has-sub">
                                <a class="js-arrow" href="index.php">
                                    <i class="fas fa-tachometer-alt"></i>الرئيسية </a>
                            </li>
                            <li>
                                <a href="services.php">
                                    <i class="fas fa-chart-bar"></i>الخدمات</a>
                            </li>
                            <li>
                                <a href="offers.php">
                                    <i class="fas fa-table"></i>العروض</a>
                            </li>
                            <li>
                                <a href="complaints.php">
                                    <i class="far fa-check-square"></i>الشكاوي</a>
                            </li>

                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END MENU SIDEBAR-->
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row ">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h2 class="bg-color-9 d-inline-block font-700 font-color-2 mb-lg-0 mb-4 px-4 py-2">الخدمات </h2>

                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2 mb-5 ">
                                        <thead>
                                            <tr>
                                                <th>id </th>
                                                <th>عنوان الخدمة</th>
                                                <th> id المستخدم</th>
                                                <th>المدة</th>
                                                <th>تاريخ الاضافة</th>
                                                <th>السعر</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $stmt = $con->prepare("SELECT * FROM `services`");
                                            $stmt->execute();
                                            $services = $stmt->fetchAll();
                                            foreach ($services as $x) {
                                                ?>
                                                <tr class="tr-shadow">
                                                    <td>
                                                        <?= ($x['id_services']) ?>
                                                    </td>
                                                    <td><a href="../services.php?singl=<?= ($x['id_services']) ?>" target="_blank"><?= ($x['service_title']) ?></a></td>
                                                    <td>
                                                        <span class="block-email"><a href="../profile.php?user=<?= ($x['user_id']) ?>" target="_blank"><?= ($x['user_id']) ?></a></span>
                                                    </td>
                                                    <td class="desc"><?php
                                                                        if ($x['service_needTime'] == 1) {
                                                                            echo "أقل من اسبوع";
                                                                        } elseif ($x['service_needTime'] == 2) {
                                                                            echo "من اسبوع الى اسبوعين";
                                                                        } elseif ($x['service_needTime'] == 3) {
                                                                            echo "من 2 اسبوع الى شهر";
                                                                        } elseif ($x['service_needTime'] == 4) {
                                                                            echo "من شهر الى 3 شهور";
                                                                        } else {
                                                                            echo "أكثر من 3 شهور";
                                                                        }
                                                                        ?></td>
                                                    <td><?= ($x['service_time']) ?></td>

                                                    <td>$ <?= ($x['service_money']) ?></td>
                                                    <td>
                                                        <div class="table-data-feature">
                                                            <a class="item" data-toggle="tooltip" data-placement="top" title="مسح" href="?do=delete&serv=<?= ($x['id_services']) ?>">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="spacer"></tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>



    <?php
    include 'footer.php';
    ?>
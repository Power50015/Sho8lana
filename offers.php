<?php
ob_start();
session_start();
$pageTitle = 'الخدمات';
include 'init.php';
include $tempDir . 'header.php';
if (isset($_GET['do'])) {
    if (isset($_SESSION['Username'])) {
        if ($_GET['do'] == 'manage') {
            if (isset($_GET['filt'])) {
                if ($_GET['filt'] == 'all') {
                    try {
                        $stmt = $con->prepare("SELECT * FROM `offers` WHERE `OffersUser` = '" . $_SESSION['ID'] . "' ORDER BY `OffersTime` DESC");
                        $stmt->execute();
                        $offers = $stmt->fetchAll();
                    } catch (Exception $e) {
                        $offers = array();
                    }
                    ?>
                    <div class="container-fluid pt-5 position-relative">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">عنوان الخدمه</th>
                                    <th scope="col">تاريخ الإضافه</th>
                                    <th scope="col">الحاله</th>
                                    <th scope="col">حذف</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($offers as $x) {
                                    ?>
                                    <tr>
                                        <th scope="row"><a href="services.php?singl=<?= ($x['OffersService']) ?>"><?= ($x['OffersService']) ?></a></th>
                                        <td><?= ($x['OffersTime']) ?></td>
                                        <td>
                                            <?php
                                            if ($x['OffersStat'] == 0) {
                                                echo "بنتظار الرد";
                                            } elseif ($x['OffersStat'] == 1) {
                                                echo "عروض تحت الانشاء";
                                            } elseif ($x['OffersStat'] == 2) {
                                                echo "عروض منتهيه";
                                            }
                                            ?></td>
                                        <?php
                                        if ($x['OffersStat'] == 0) {
                                            ?>
                                            <td><a href="offers.php?do=delete&serv=<?= ($x['OffersID']) ?>" class="btn btn-danger">حذف</a></td>
                                        <?php
                                    } else {
                                        ?>
                                            <td></td>
                                        <?php
                                    }
                                    ?>

                                    </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                <?php
            } elseif ($_GET['filt'] == 'making') {
                try {
                    $stmt = $con->prepare("SELECT * FROM `offers` WHERE `OffersUser` = '" . $_SESSION['ID'] . "' AND OffersStat =1 ORDER BY `OffersTime` DESC");
                    $stmt->execute();
                    $offers = $stmt->fetchAll();
                } catch (Exception $e) {
                    $offers = array();
                }
                ?>
                    <div class="container pt-5 position-relative">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">عنوان الخدمه المطلوبه</th>
                                    <th scope="col">تاريخ الإضافه</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($offers as $x) {
                                    ?>
                                    <tr>
                                        <th scope="row"><a href="services.php?singl=<?= ($x['OffersService']) ?>"><?= ($x['OffersService']) ?></a></th>
                                        <td><?= ($x['OffersTime']) ?></td>
                                    </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                <?php

            } elseif ($_GET['filt'] == 'finsh') {

                try {
                    $stmt = $con->prepare("SELECT * FROM `offers` WHERE `OffersUser` = '" . $_SESSION['ID'] . "' AND OffersStat = 2 ORDER BY `OffersTime` DESC");
                    $stmt->execute();
                    $offers = $stmt->fetchAll();
                } catch (Exception $e) {
                    $offers = array();
                }
                ?>
                    <div class="container pt-5 position-relative">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">عنوان الخدمه المطلوبه</th>
                                    <th scope="col">تاريخ الإضافه</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($offers as $x) {
                                    ?>
                                    <tr>
                                        <th scope="row"><a href="services.php?singl=<?= ($x['OffersService']) ?>"><?= ($x['OffersService']) ?></a></th>
                                        <td><?= ($x['OffersTime']) ?></td>
                                    </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                <?php

            } elseif ($_GET['filt'] == 'cansel') {

                try {
                    $stmt = $con->prepare("SELECT * FROM `offers` WHERE `OffersUser` = '" . $_SESSION['ID'] . "' AND OffersStat =0 ORDER BY `OffersTime` DESC");
                    $stmt->execute();
                    $offers = $stmt->fetchAll();
                } catch (Exception $e) {
                    $services = array();
                }
                ?>
                    <div class="container pt-5 position-relative">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">عنوان الخدمه المطلوبه</th>
                                    <th scope="col">تاريخ الإضافه</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($offers as $x) {
                                    ?>
                                    <tr>
                                        <th scope="row"><a href="services.php?singl=<?= ($x['OffersService']) ?>"><?= ($x['OffersService']) ?></a></th>
                                        <td><?= ($x['OffersTime']) ?></td>
                                    </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                <?php

            } else {
                $url = "offers.php?do=manage&filt=all";
                header('Location: ' . $url);
                exit();
            }
        } else {
            $url = "offers.php?do=manage&filt=all";
            header('Location: ' . $url);
            exit();
        }
    } elseif ($_GET['do'] == 'delete') {
        if (isset($_GET['serv'])) {
            if (!empty($_GET['serv'])) {
                if (cheak('*', '`offers`', "`OffersID` = '" . $_GET['serv'] . "' AND `OffersUser` = '" . $_SESSION['ID'] . "'")) {
                    if (cheak('*', '`offers`', "`OffersID` = '" . $_GET['serv'] . "' AND `OffersStat` = 0")) {
                        $stmt = $con->prepare("SELECT * FROM `offers` WHERE `OffersService` = '" . $_GET['serv'] . "'");
                        $stmt->execute();
                        $ddoffers = $stmt->fetchAll();
                        foreach ($ddoffers as $x) {
                            $stmt = $con->prepare("DELETE FROM `offers` WHERE `OffersID` = :zid");
                            $stmt->bindParam(":zid", $x['OffersID']);
                            $stmt->execute();
                        }
                        $stmt = $con->prepare("DELETE FROM `offers` WHERE `OffersID` = :zid");
                        $stmt->bindParam(":zid", $_GET['serv']);
                        $stmt->execute();
                        $url = "offers.php?do=manage&filt=all";
                        header('Location: ' . $url);
                    } else {
                        $url = "offers.php?do=manage&filt=all";
                        header('Location: ' . $url);
                        exit();
                    }
                } else {
                    $url = "offers.php?do=manage&filt=all";
                    header('Location: ' . $url);
                    exit();
                }
            } else {
                $url = "offers.php?do=manage&filt=all";
                header('Location: ' . $url);
                exit();
            }
        } else {
            $url = "offers.php?do=manage&filt=all";
            header('Location: ' . $url);
            exit();
        }
    } else {
        header('Location: offers.php');
        exit();
    }
} else {
    header('Location: sing.php');
    exit();
}
}
include $tempDir . 'footer.php';
if (isset($succesMsg)) {
    header("refresh:2;url='services.php'");
    exit();
}
if (isset($OffersuccesMsg)) {
    $url = 'services.php?singl=' . $ServicesRow['id_services'];
    header("refresh:1;url=$url");
    exit();
}
ob_end_flush();

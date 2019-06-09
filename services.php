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
                   try{
                       $stmt = $con->prepare("SELECT * FROM `services` WHERE `user_id` = " . $_SESSION['ID'] . " ORDER BY `service_time` DESC");
                    $stmt->execute();
                    $services = $stmt->fetchAll();}
                    catch (Exception $e){
                        $services=array();
                    }
?>
<div class="container pt-5 position-relative">
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">عنوان الخدمه المطلوبه</th>
            <th scope="col">تاريخ الإضافه</th>
            <th scope="col">الحاله</th>
            <th scope="col">حذف</th>
            </tr>
        </thead>
        <tbody>
            <?php
                    foreach ($services as $x) {
?>
    <tr>
    <th scope="row"><a href="services.php?singl=<?= ($x['id_services']) ?>"><?= ($x['service_title']) ?></a></th>
    <td><?= ($x['service_time']) ?></td>
    <td><?= ($x['services_stat']) ?></td>
      <?php
                        if ($x['services_stat'] == 0) {
?>
          <td><a href="services.php?do=delete&serv=<?= ($x['id_services']) ?>" class="btn btn-danger">حذف</a></td>
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
                }elseif($_GET['filt'] == 'making'){
                   try{
                    $stmt = $con->prepare("SELECT * FROM `services` WHERE `user_id` = " . $_SESSION['ID'] . " AND services_stat =1 ORDER BY `service_time` DESC");
                    $stmt->execute();
                    $services = $stmt->fetchAll();
                   }catch (Exception $e){
                        $services=array();
                    } 
?>
<div class="container pt-5 position-relative">
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">عنوان الخدمه المطلوبه</th>
            <th scope="col">تاريخ الإضافه</th>
            <th scope="col">الحاله</th>
            </tr>
        </thead>
        <tbody>
            <?php
                    foreach ($services as $x) {
?>
    <tr>
    <th scope="row"><a href="services.php?singl=<?= ($x['id_services']) ?>"><?= ($x['service_title']) ?></a></th>
    <td><?= ($x['service_time']) ?></td>
    <td><?= ($x['services_stat']) ?></td>
    </tr>
<?php
                    }
?>
        </tbody>
    </table>
</div>
<?php

                }elseif($_GET['filt'] == 'finsh'){
                    
                    try{$stmt = $con->prepare("SELECT * FROM `services` WHERE `user_id` = " . $_SESSION['ID'] . " AND services_stat = 2 ORDER BY `service_time` DESC");
                    $stmt->execute();
                    $services = $stmt->fetchAll();}
                    catch (Exception $e){
                        $services=array();
                    } 
?>
<div class="container pt-5 position-relative">
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">عنوان الخدمه المطلوبه</th>
            <th scope="col">تاريخ الإضافه</th>
            <th scope="col">الحاله</th>
            </tr>
        </thead>
        <tbody>
            <?php
                    foreach ($services as $x) {
?>
    <tr>
    <th scope="row"><a href="services.php?singl=<?= ($x['id_services']) ?>"><?= ($x['service_title']) ?></a></th>
    <td><?= ($x['service_time']) ?></td>
    <td><?= ($x['services_stat']) ?></td>
    </tr>
<?php
                    }
?>
        </tbody>
    </table>
</div>
<?php

                }elseif($_GET['filt'] == 'cansel'){
                    
                    try{$stmt = $con->prepare("SELECT * FROM `services` WHERE `user_id` = " . $_SESSION['ID'] . " AND services_stat =3 ORDER BY `service_time` DESC");
                    $stmt->execute();
                    $services = $stmt->fetchAll();}catch (Exception $e){
                        $services=array();
                    } 
?>
<div class="container pt-5 position-relative">
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">عنوان الخدمه المطلوبه</th>
            <th scope="col">تاريخ الإضافه</th>
            <th scope="col">الحاله</th>
            </tr>
        </thead>
        <tbody>
            <?php
                    foreach ($services as $x) {
?>
    <tr>
    <th scope="row"><a href="services.php?singl=<?= ($x['id_services']) ?>"><?= ($x['service_title']) ?></a></th>
    <td><?= ($x['service_time']) ?></td>
    <td><?= ($x['services_stat']) ?></td>
    </tr>
<?php
                    }
?>
        </tbody>
    </table>
</div>
<?php

                } else {
                    $url = "services.php?do=manage&filt=all";
                    header('Location: ' . $url);
                    exit();
                }
            } else {
                $url = "services.php?do=manage&filt=all";
                header('Location: ' . $url);
                exit();
            }
        } elseif ($_GET['do'] == 'add') {
?>
<header id='fullHeader'>
    <div class="over"></div>
    <div class="container pt-5 position-relative">
        <h2 class="bg-color-3 d-inline-block mx-5 px-4 py-2 f-30 font-cairo text-light">اضافه خدمه جديده</h2>
        <div class="row justify-content-center mt-3">
            <form class="login col-lg-6 col-sm-12 col-xs-12 d-block p-5 mt-5 rounded mb-5" action="?do=insert" method="POST">
                <div class="form-group pt-3 pb-2">
                    <input type="text" name="adsName" required class="form-control rounded-0 px-3 py-3 font-cairo" placeholder="عنوان المشروع">
                </div>
                <select name="cats" required class="custom-select my-1 mr-sm-2 rounded-0 px-3" id="inlineFormCustomSelectPref">
                    <option selected disabled>أختر القسم </option>
                    <?php
            $stmt = $con->prepare("SELECT * FROM `cats` WHERE `CatMain` IS NULL");
            $stmt->execute();
            $cats = $stmt->fetchAll();
            foreach ($cats as $x) {
                echo "<option value='" . $x['CatID'] . "'>" . $x['CatName'] . "</option>";
                $stmt2 = $con->prepare("SELECT * FROM `cats` WHERE `CatMain` = " . $x['CatID']);
                $stmt2->execute();
                $subCats = $stmt2->fetchAll();
                foreach ($subCats as $y) {
                    echo "<option value='" . $y['CatID'] . "'>  -- " . $y['CatName'] . "</option>";
                }
            }
?>
                </select>
                <div class="form-group pt-4">
                    <textarea required name="det" class="form-control rounded-0 px-3 py-3 font-cairo h-500" placeholder="تفاصيل المشروع"></textarea>
                </div>
                <div class="form-group pt-3 pb-2">
                    <input type="number" name="salry" required class="form-control rounded-0 px-3 py-3 font-cairo" placeholder="المزانيه المتوقعه" min="10" max="5000">
                </div>
                <h4>مده التسليم</h4>
                <div>
                    <input type="radio" id="radio01" name="time" value="1" checked />
                    <label for="radio01" class="font-cairo f-18 font-color-4">
                        <span class="m-3"></span>أقل من اسبوع
                    </label>
                </div>
                <div>
                    <input type="radio" id="radio02" name="time" value="2" />
                    <label for="radio02" class="font-cairo f-18 font-color-4">
                        <span class="m-3"></span>من 1 أسبوع الى 2 اسبوع
                    </label>
                </div>
                <div>
                    <input type="radio" id="radio03" name="time" value="3" />
                    <label for="radio03" class="font-cairo f-18 font-color-4">
                        <span class="m-3"></span>من 2 أسبوع الى شهر
                    </label>
                </div>
                <div>
                    <input type="radio" id="radio04" name="time" value="4" />
                    <label for="radio04" class="font-cairo f-18 font-color-4">
                        <span class="m-3"></span>من شهر الى 3 شهور
                    </label>
                </div>
                <div>
                    <input type="radio" id="radio05" name="time" value="5" />
                    <label for="radio05" class="font-cairo f-18 font-color-4">
                        <span class="m-3"></span>أكثر من 3 شهور
                    </label>
                </div>
                <h4>ملفات توضيحيه</h4>
                <div class="form-group pt-3 mb-4">
                    <input type="file" name="file" id="file" class="input-file">
                    <label for="file" class="btn btn-tertiary js-labelFile w-100 ">
                        <i class="icon fa fa-check"></i>
                        <span class="js-fileName">اختر ملف للرفع</span>
                    </label>
                </div>
                <input type="submit" value="انشر الأن" name="add" class="btn btn-danger d-block w-100 mb-0 py-2 font-cairo f-18">
            </form>
        </div>
    </div>
</header>

<?php
        } elseif ($_GET['do'] == 'insert') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $adsName    = $_POST['adsName'];
                $cats       = $_POST['cats'];
                $det        = $_POST['det'];
                $price      = $_POST['salry'];
                $time       = $_POST['time'];
                $formErrors = array();
                if (empty($adsName)) {
                    $formErrors[] = 'لا يمكن ترك الاسم فارغ</strong>';
                }
                if (empty($det)) {
                    $formErrors[] = 'لا يمكن ترك الوصف فارغ';
                }
                if (empty($price)) {
                    $formErrors[] = 'لا يمكن ترك السعر فارغ';
                }
                if ($cats == 0) {
                    $formErrors[] = 'يجب اختيار قسم ';
                }
                foreach ($formErrors as $error) {
                    echo '<div class="alert alert-danger">' . $error . '</div>';
                }
                if (empty($formErrors)) {
                    $stmt = $con->prepare("INSERT INTO `services` (`id_services`, `service_title`, `service_des`, `service_needTime`, `service_time`, `service_money`, `sections_services`, `user_id`) VALUES  
                    (:zid, :zname, :zdes, :ztime, now(), :zprice, :zcats , :zuser)");
                    $stmt->execute(array(
                        'zid' => randomString(11),
                        'zname' => $adsName,
                        'zdes' => $det,
                        'ztime' => $time,
                        'zprice' => $price,
                        'zcats' => $cats,
                        'zuser' => $_SESSION['ID']
                    ));
                    $succesMsg = "تم اضافه الخدمه المطلوبه و سيتم تحويلك لصفحه الخدمات بعد 1 ثانيه";
?>
<div class="alert m-0 rounded-0 alert-primary" role="alert">
    <?= ($succesMsg) ?>
    <br />
</div>
<?php
                }
            } else {
                echo "<div class='container'>";
                $theMsg = '<div class="alert alert-danger">Sorry You Cant Browse This Page Directly</div>';
                echo "</div>";
            }
        } elseif ($_GET['do'] == 'delete') {
            if (isset($_GET['serv'])) {
                if (!empty($_GET['serv'])) {
                    if (cheak('*', '`services`', "`id_services` = '" . $_GET['serv'] . "' AND `user_id` = '" . $_SESSION['ID'] . "'")) {
                        if (cheak('*', '`services`', "`id_services` = '" . $_GET['serv'] . "' AND `services_stat` = 0")) {
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
                            $url = "services.php?do=manage&filt=all";
                            header('Location: ' . $url);
                        } else {
                            $url = "services.php?do=manage&filt=all";
                            header('Location: ' . $url);
                            exit();
                        }
                    } else {
                        $url = "services.php?do=manage&filt=all";
                        header('Location: ' . $url);
                        exit();
                    }
                } else {
                    $url = "services.php?do=manage&filt=all";
                    header('Location: ' . $url);
                    exit();
                }
            } else {
                $url = "services.php?do=manage&filt=all";
                header('Location: ' . $url);
                exit();
            }
        } else {
            header('Location: services.php');
            exit();
        }
    } else {
        header('Location: sing.php');
        exit();
    }
} elseif (isset($_GET['singl'])) {
    if (!empty($_GET['singl'])) {
        if (cheak('*', '`services`', '`id_services` = "' . $_GET['singl'] . '"')) {
            $stmt = $con->prepare("SELECT * FROM `services` WHERE  `id_services`  = ?");
            $stmt->execute(array(
                $_GET['singl']
            ));
            $ServicesRow = $stmt->fetch();
            $stmt        = $con->prepare("SELECT * FROM `cats` WHERE  `CatID`  = ?");
            $stmt->execute(array(
                $ServicesRow['sections_services']
            ));
            $CatRow = $stmt->fetch();
            $stmt   = $con->prepare("SELECT * FROM `users` WHERE  `User_id`  = ?");
            $stmt->execute(array(
                $ServicesRow['user_id']
            ));
            $UserRow = $stmt->fetch();
            $stmt    = $con->prepare("SELECT * FROM `offers` WHERE  `OffersService`  = ?");
            $stmt->execute(array(
                $ServicesRow['id_services']
            ));
            $OffersRow = $stmt->fetchAll();
            $TimeItNeed;
            if ($ServicesRow['service_needTime'] == 1) {
                $TimeItNeed = 'أقل من اسبوع';
            } elseif ($ServicesRow['service_needTime'] == 2) {
                $TimeItNeed = 'من 1 أسبوع الى 2 اسبوع';
            } elseif ($ServicesRow['service_needTime'] == 3) {
                $TimeItNeed = 'من 2 أسبوع الى شهر';
            } elseif ($ServicesRow['service_needTime'] == 4) {
                $TimeItNeed = 'من شهر الى 3 شهور';
            } elseif ($ServicesRow['service_needTime'] == 5) {
                $TimeItNeed = 'أكثر من 3 شهور';
            }
            if ($ServicesRow['services_stat'] == 0) {
                $services_stat = '<div class="col-4">
                            <h6 class="text-info"><i class="fas fa-check-circle "></i> مرحله تلقي العروض</h6>
                        </div>
                        <div class="col-4">
                            <h6 class=""><i class="fas fa-arrow-alt-circle-left"></i> مرحله التنفيذ</h6>
                        </div>
                        <div class="col-4">
                            <h6 class=""><i class="fas fa-dot-circle"></i> مرحله التسليم</h6>
                        </div>';
            } elseif ($ServicesRow['services_stat'] == 1) {
                $services_stat = '<div class="col-4">
                            <h6 class="text-success"><i class="fas fa-check-circle "></i> مرحله تلقي العروض</h6>
                        </div>
                        <div class="col-4">
                            <h6 class="text-info"><i class="fas fa-arrow-alt-circle-left"></i> مرحله التنفيذ</h6>
                        </div>
                        <div class="col-4">
                            <h6 class=""><i class="fas fa-dot-circle"></i> مرحله التسليم</h6>
                        </div>';
            } else {
                $services_stat = '<div class="col-4">
                            <h6 class="text-success"><i class="fas fa-check-circle "></i> مرحله تلقي العروض</h6>
                        </div>
                        <div class="col-4">
                            <h6 class="text-success"><i class="fas fa-arrow-alt-circle-left"></i> مرحله التنفيذ</h6>
                        </div>
                        <div class="col-4">
                            <h6 class="text-success"><i class="fas fa-dot-circle"></i> مرحله التسليم</h6>
                        </div>';
            }
            if (isset($_GET['offerdo'])) {
                if (isset($_SESSION['Username'])) {
                    $OfferDo = $_GET['offerdo'];
                    if ($OfferDo == 'Insert') {
                        if (!($ServicesRow['user_id'] == $_SESSION['ID'])) {
                            $stmt = $con->prepare("SELECT `OffersUser` FROM `offers` WHERE  `OffersService`  = ?");
                            $stmt->execute(array(
                                $ServicesRow['id_services']
                            ));
                            $UserOffersID = $stmt->fetchAll();
                            if (!in_array($_SESSION['ID'], array_column($UserOffersID, 'OffersUser'))) {
                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                    $det        = $_POST['offerdes'];
                                    $price      = $_POST['salry'];
                                    $time       = $_POST['time'];
                                    $formErrors = array();
                                    if (empty($det)) {
                                        $formErrors[] = 'لا يمكن ترك الوصف فارغ';
                                    }
                                    if (empty($price)) {
                                        $formErrors[] = 'لا يمكن ترك السعر فارغ';
                                    }
                                    foreach ($formErrors as $error) {
                                        echo '<div class="alert alert-danger">' . $error . '</div>';
                                    }
                                    if (empty($formErrors)) {
                                        $stmt = $con->prepare("INSERT INTO 
`offers` (`OffersID`, `OffersDed`, `OffersTime`, `PriceOffers`, `OffersService`, `OffersUser`, `OffersNeedTime`) VALUES  
          (:zid,  :zdes, now(), :zprice, :zserve , :zuser, :ztime)");
                                        $stmt->execute(array(
                                            'zid' => randomString(11),
                                            'zdes' => $det,
                                            'zprice' => $price,
                                            'zserve' => $ServicesRow['id_services'],
                                            'zuser' => $_SESSION['ID'],
                                            'ztime' => $time
                                        ));
                                        $OffersuccesMsg = "تم اضافه العرض المطلوبه و سيتم تحويلك لصفحه الخدمه بعد 1 ثانيه";
?>
            <div class="alert m-0 rounded-0 alert-primary" role="alert">
                <?= ($OffersuccesMsg) ?>
            <br />
            </div>
        <?php
                                    }
                                }
                            } else {
                                $url = 'Location:services.php?singl=' . $ServicesRow['id_services'];
                                header($url);
                                exit();
                            }
                        } else {
                            $url = 'Location:services.php?singl=' . $ServicesRow['id_services'];
                            header($url);
                            exit();
                        }
                    }
                }
            }
?>
<header class="d-flex h-500">
    <div class="over"></div>
    <div class="container position-relative align-self-center text-left">
        <div class="d-inline-block font-color-2 bg-color-6 px-4 py-3 font-700">
            <h4 class="pb-2 font-700">
                <?= ($ServicesRow['service_title']) ?>
            </h4>
            <h5 class="d-inline float-left"><i class="fas fa-paperclip"></i>
                <?= ($CatRow['CatName']) ?>
            </h5>
            <h5 class="d-inline pl-3"><i class="fas fa-calendar"></i>
                <?= ($ServicesRow['service_time']) ?>
            </h5>
        </div>
    </div>
</header>
<main class="bg-color-12">
    <div class="container">
        <div class="row py-5">
            <div class="col-12 col-md-8">
                <section class="bg-color-7">
                    <div class="row py-3 text-center">
                        <?= ($services_stat) ?>
                    </div>
                </section>
                <section class="mt-3 bg-color-7">
                    <h6 class="font-700 f-18 font-color-3 p-3 border-bottom border-color-1">تفاصيل المشروع</h6>
                    <p class="font-color-3 p-3">
                        <?= ($ServicesRow['service_des']) ?>
                    </p>
                </section>
                <section class="mt-3 bg-color-7">
                    <?php
            if (isset($_SESSION['ID'])) {
                if (!($ServicesRow['user_id'] == $_SESSION['ID'])) {
                    $stmt = $con->prepare("SELECT `OffersUser` FROM `offers` WHERE  `OffersService`  = ?");
                    $stmt->execute(array(
                        $ServicesRow['id_services']
                    ));
                    $UserOffersID = $stmt->fetchAll();
                    if (!in_array($_SESSION['ID'], array_column($UserOffersID, 'OffersUser'))) {
?>
                    <form action="?singl=<?= ($ServicesRow['id_services']) ?>&offerdo=Insert" method="POST">
                        <h6 class="font-700 f-18 font-color-3 p-3 border-bottom border-color-1 mb-0">اضف عرضك الأن</h6>
                        <textarea class="h-200 w-100" placeholder="اكتب عرضك هنا" name="offerdes" required></textarea>
                        <div class="form-group pt-3 pb-2">
                            <input type="number" name="salry" required class="form-control rounded-0 px-3 py-3 font-cairo" placeholder="المزانيه المتوقعه" min="10" max="5000">
                        </div>
                        <h4>مده التسليم</h4>
                        <div>
                            <input type="radio" id="radio01" name="time" value="1" checked />
                            <label for="radio01" class="font-cairo f-18 font-color-4">
                                <span class="m-3"></span>أقل من اسبوع
                            </label>
                        </div>
                        <div>
                            <input type="radio" id="radio02" name="time" value="2" />
                            <label for="radio02" class="font-cairo f-18 font-color-4">
                                <span class="m-3"></span>من 1 أسبوع الى 2 اسبوع
                            </label>
                        </div>
                        <div>
                            <input type="radio" id="radio03" name="time" value="3" />
                            <label for="radio03" class="font-cairo f-18 font-color-4">
                                <span class="m-3"></span>من 2 أسبوع الى شهر
                            </label>
                        </div>
                        <div>
                            <input type="radio" id="radio04" name="time" value="4" />
                            <label for="radio04" class="font-cairo f-18 font-color-4">
                                <span class="m-3"></span>من شهر الى 3 شهور
                            </label>
                        </div>
                        <div>
                            <input type="radio" id="radio05" name="time" value="5" />
                            <label for="radio05" class="font-cairo f-18 font-color-4">
                                <span class="m-3"></span>أكثر من 3 شهور
                            </label>
                        </div>
                        <h4>ملفات توضيحيه</h4>
                        <div class="form-group pt-3 mb-4">
                            <input type="file" name="file" id="file" class="input-file">
                            <label for="file" class="btn btn-tertiary js-labelFile w-100 rounded-0">
                                <i class="icon fa fa-check"></i>
                                <span class="js-fileName">اختر ملف للرفع</span>
                            </label>
                        </div>
                        <input type="submit" value="اضف الان" class="btn btn-danger d-block w-100 mb-0 py-2 font-cairo f-18 ">
                    </form>
                    <?php
                    }
                }
            }
?>
                    <h6 class="font-700 f-18 font-color-3 p-3 border-bottom border-color-1">العروض المقدمه</h6>
                    <?php
            foreach ($OffersRow as $x) {
                $stmt = $con->prepare("SELECT * FROM `users` WHERE  `User_id`  = ?");
                $stmt->execute(array(
                    $x['OffersUser']
                ));
                $UserOffersRow = $stmt->fetch();
                $TimeOfferNeed;
                if ($x['OffersNeedTime'] == 1) {
                    $TimeOfferNeed = 'أقل من اسبوع';
                } elseif ($x['OffersNeedTime'] == 2) {
                    $TimeOfferNeed = 'من 1 أسبوع الى 2 اسبوع';
                } elseif ($x['OffersNeedTime'] == 3) {
                    $TimeOfferNeed = 'من 2 أسبوع الى شهر';
                } elseif ($x['OffersNeedTime'] == 4) {
                    $TimeOfferNeed = 'من شهر الى 3 شهور';
                } elseif ($x['OffersNeedTime'] == 5) {
                    $TimeOfferNeed = 'أكثر من 3 شهور';
                }
?>
                    <div class="row p-2 border-bottom border-color-1 mb-3">
                        <div class="col-5 mb-2 col-sm-3">
                            <a class="hover2" href="profile.php?user=<?= ($x['OffersUser']) ?>">
                            <img class="w-100 rounded-circle" src="upload/avatars/<?= ($UserOffersRow['User_Img']) ?>"></a>
                        </div>
                        <div class="col-18 col-sm-9 mt-3">
                            <a class="hover2" href="profile.php?user=<?= ($x['OffersUser']) ?>">
                                <h3 class="font-700 f-18 font-color-3 "><?= ($UserOffersRow['User_name']) ?></h3>
                            </a>
                            <h5 class="font-700 f-18 font-color-3">تاريخ اضافه العرض : <?= ($x['OffersTime']) ?></h5>
                            <h5 class="font-700 f-18 font-color-3"> المده المتوقعه : <?= ($TimeOfferNeed) ?>   </h5>
                            <h5 class="font-700 f-18 font-color-3"> المبلغ المتوقع : <?= ($x['PriceOffers']) ?>$</h5>
                        </div>
                        <div class="col-12">
                            <?php
                if (isset($_SESSION['ID'])) {
                    if (($ServicesRow['user_id'] == $_SESSION['ID'])) {
                        if ($ServicesRow['services_stat'] == 0) {
?>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">اختيار العرض </button>
                            <!-- Button trigger modal -->
                            <a href="massega.php?to=<?=($x['OffersUser'])?>" class="btn btn-primary">ارسل رساله </a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-left">
                                            هل تريد التعاقد و اختيار العرض التالي ؟
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-primary">نعم</a>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">لا</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
?>
                        </div>
                        <p class="font-color-3 p-3 pb-1"><?= ($x['OffersDed']) ?></p>
                    </div>
                        <?php
            }
?>
                </section>
            </div>
            <div class="col-12 col-md-4">
                <aside class="bg-color-7 pb-3">
                    <h6 class="font-700 f-18 font-color-3 p-3 border-bottom border-color-1">تفاصيل المشروع</h6>
                    <h6 class="font-700 f-18 font-color-3  pl-1">الميزانيه : $
                        <?= ($ServicesRow['service_money']) ?>
                    </h6>
                    <h6 class="font-700 f-18 font-color-3 pl-1 "> المدة المتوقعه :
                        <?= ($TimeItNeed) ?>
                    </h6>
                    <h6 class="font-700 f-18 font-color-3 pl-1 border-bottom border-color-1 pb-2">العروض المقدمه :
                        <?= ($TimeItNeed) ?>
                    </h6>
                    <h6 class="font-700 f-18 font-color-3 p-3 ">صاحب المشروع</h6>
                    <div class="row  border-bottom border-color-1 pb-2">
                        <div class="col-5 pl-4">
                            <a class="hover2" href="profile.php?user=<?= ($ServicesRow['user_id']) ?>"><img class="w-100 rounded-circle" src="upload/avatars/<?= ($UserRow['User_Img']) ?>"></a>
                        </div>
                        <div class="col-7 mt-3">
                            <a class="hover2" href="profile.php?user=<?=($UserRow['User_id'])?>">
                                <h3 class="font-700 f-18 font-color-3 ">
                                    <?= ($UserRow['User_name']) ?>
                                </h3>
                            </a>
                        </div>
                    </div>
                    <?php
            if ($ServicesRow['services_stat'] != 0) {
                $stmt = $con->prepare("SELECT * FROM `offers` WHERE  `OffersService`  = ?");
                $stmt->execute(array(
                    $ServicesRow['id_services']
                ));
                $ACCOffer = $stmt->fetch();
                $stmt     = $con->prepare("SELECT `User_name`,`User_Img` FROM `users` WHERE  `User_id`  = ?");
                $stmt->execute(array(
                    $ACCOffer['OffersUser']
                ));
                $ACCUser = $stmt->fetch();
?>
                    <h6 class="font-700 f-18 font-color-3 p-3 ">المستقل المقبول</h6>
                    <div class="row">
                        <div class="col-5 pl-4">
                            <a class="hover2" href="profile.php?user=<?= ($ACCOffer['OffersUser']) ?>"><img class="w-100 rounded-circle" src="upload/avatars/<?= ($ACCUser['User_Img']) ?>"></a>
                        </div>
                        <div class="col-7 mt-3">
                            <a class="hover2" href="profile.php?user=<?= ($ACCOffer['OffersUser']) ?>">
                                <h3 class="font-700 f-18 font-color-3 ">
                                    <?= ($ACCUser['User_name']) ?>
                                </h3>
                            </a>
                        </div>
                    </div>
                    <?php
            }
?>
                </aside>
            </div>
        </div>
    </div>
</main>
<?php
        } else {
            header('Location: services.php');
            exit();
        }
    } else {
        header('Location: services.php');
        exit();
    }
} else {
    $MysqlStat     = "SELECT * FROM `services` WHERE `services_stat` = 0 ";
    $MysqlStatCont = "SELECT COUNT(*) FROM `services` WHERE `services_stat` = 0 ";
    if (isset($_GET['cats'])) {
        if (is_array($_GET['cats'])) {
            $catsStat = "(`sections_services` = ";
            foreach ($_GET['cats'] as $s) {
                $catsStat = $catsStat . $s . " OR `sections_services` = ";
            }
            $catsStat      = $catsStat . $_GET['cats'][0] . ")";
            $MysqlStat     = $MysqlStat . " AND" . $catsStat;
            $MysqlStatCont = $MysqlStatCont . " AND" . $catsStat;
        } else {
            $stmt = $con->prepare("SELECT * FROM `cats` WHERE `CatID` = " . $_GET['cats']);
            $stmt->execute();
            $cats = $stmt->fetch();
            if ($cats['CatMain'] == NULL) {
                $stmt = $con->prepare("SELECT * FROM `cats` WHERE `CatMain` = " . $_GET['cats']);
                $stmt->execute();
                $cats     = $stmt->fetchAll();
                $catsStat = "(`sections_services` = ";
                foreach ($cats as $s) {
                    $catsStat    = $catsStat . $s['CatID'] . " OR `sections_services` = ";
                    $catsArray[] = $s['CatID'];
                }
                $catsStat      = $catsStat . $_GET['cats'] . ")";
                $MysqlStat     = $MysqlStat . " AND" . $catsStat;
                $MysqlStatCont = $MysqlStatCont . " AND" . $catsStat;
            } else {
                $catsArray[0]  = "";
                $catsArray[1]  = $_GET['cats'];
                $catsStat      = "`sections_services` = " . $_GET['cats'];
                $MysqlStat     = $MysqlStat . " AND" . $catsStat;
                $MysqlStatCont = $MysqlStatCont . " AND" . $catsStat;
            }
        }
    }
    if (isset($_GET['time'])) {
        if ($_GET['time'] != "0") {
            $MysqlStat     = $MysqlStat . " AND `service_needTime` = '" . $_GET['time'] . "' ";
            $MysqlStatCont = $MysqlStatCont . " AND `service_needTime` = '" . $_GET['time'] . "' ";
        }
    }
    if (isset($_GET['money'])) {
        $_GET['money'] = str_replace("$", "", $_GET['money']);
        $_GET['money'] = str_replace(" ", "", $_GET['money']);
        $pieces        = explode("-", $_GET['money']);
        $pieces[0]     = (int) $pieces[0];
        $pieces[1]     = (int) $pieces[1];
        $MysqlStat     = $MysqlStat . "AND `service_money` BETWEEN " . $pieces[0] . " AND " . $pieces[1];
        $MysqlStatCont = $MysqlStatCont . "AND `service_money` BETWEEN " . $pieces[0] . " AND " . $pieces[1];
    }
?>
<header class="d-flex h-500">
    <div class="over"></div>
    <div class="container position-relative align-self-center text-center">
        <h1 class="d-inline font-color-2 bg-color-6 px-4 font-700">تصفح الإعلانات</h1>
    </div>
</header>
<main class="bg-color-7 services">
    <div class="container">
        <div class="row">
            <aside class="col-md-4 col-12 my-5">
                <div class="rounded bg-color-2 text-center pt-5">
                    <h3 class="d-inline-block font-color-2 bg-color-9 px-4 py-2 font-700 mb-5">الأقسام</h3>
                    <form id="accordion" action="?" method="GET">
                        <?php
    $stmt = $con->prepare("SELECT * FROM `cats` WHERE `CatMain` IS NULL");
    $stmt->execute();
    $cats = $stmt->fetchAll();
    foreach ($cats as $x) {
        echo '<div class="card-header border-0" id="headingOne">';
        echo '<h5 class="mb-0">';
        $randomBtn = randomName();
        echo '<a class="font-color-2 rounded f-18 bg-color-3 px-5 font-700 hover" data-toggle="collapse" data-target="#' . $randomBtn . '" aria-expanded="true" aria-controls="' . $randomBtn . '" href="#">' . $x['CatName'] . '<i class="fas fa-caret-down"></i></a>';
        echo '</h5></div>';
        $stmt2 = $con->prepare("SELECT * FROM `cats` WHERE `CatMain` = " . $x['CatID']);
        $stmt2->execute();
        $subCats    = $stmt2->fetchAll();
        $randomBtn2 = randomName();
        echo '<div id="' . $randomBtn . '" class="collapse " aria-labelledby="headingOne" data-parent="#accordion"><div class="card-body">';
        foreach ($subCats as $y) {
            echo '<div class="form-check"><input class="form-check-input" type="checkbox" name="cats[]" value="' . $y['CatID'] . '" id="' . $randomBtn2;
            if (is_array($_GET['cats'])) {
                if (in_array($y['CatID'], $_GET['cats'])) {
                    echo '" checked >';
                }
            } else {
                if (isset($catsArray)) {
                    if (in_array($y['CatID'], $catsArray)) {
                        echo '" checked >';
                    } else {
                        echo '">';
                    }
                } else {
                    echo '">';
                }
            }
            echo '<label class="form-check-label font-color-4" for="' . $randomBtn2 . '">' . $y['CatName'] . '</label></div>';
        }
        echo '</div></div>';
    }
?>
                        <h6 class="font-color-1 pt-3">مده التسليم</h6>
                        <div class="text-left">
                            <div>

                                <input type="radio" id="radio00" name="time" value="0" <?php
    if (!isset($_GET['time'])) {
        echo "checked";
    } else if ($_GET['time'] == "0") {
        echo "checked";
    }
?> />
                                <label for="radio00" class="font-cairo f-18 font-color-4">
                                    <span class="m-3"></span>أي وقت
                                </label>
                            </div>
                            <div>
                                <input type="radio" id="radio01" name="time" value="1" <?php
    if (isset($_GET['time'])) {
        if ($_GET['time'] == "1") {
            echo "checked";
        }
    }
?> />
                                <label for="radio01" class="font-cairo f-18 font-color-4">
                                    <span class="m-3"></span>أقل من اسبوع
                                </label>
                            </div>
                            <div>
                                <input type="radio" id="radio02" name="time" value="2" <?php
    if (isset($_GET['time'])) {
        if ($_GET['time'] == "2") {
            echo "checked";
        }
    }
?> />
                                <label for="radio02" class="font-cairo f-18 font-color-4">
                                    <span class="m-3"></span>من 1 أسبوع الى 2 اسبوع
                                </label>
                            </div>
                            <div>
                                <input type="radio" id="radio03" name="time" value="3" <?php
    if (isset($_GET['time'])) {
        if ($_GET['time'] == "3") {
            echo "checked";
        }
    }
?> />
                                <label for="radio03" class="font-cairo f-18 font-color-4">
                                    <span class="m-3"></span>من 2 أسبوع الى شهر
                                </label>
                            </div>
                            <div>
                                <input type="radio" id="radio04" name="time" value="4" <?php
    if (isset($_GET['time'])) {
        if ($_GET['time'] == "4") {
            echo "checked";
        }
    }
?> />
                                <label for="radio04" class="font-cairo f-18 font-color-4">
                                    <span class="m-3"></span>من شهر الى 3 شهور
                                </label>
                            </div>
                            <div>
                                <input type="radio" id="radio05" name="time" value="5" <?php
    if (isset($_GET['time'])) {
        if ($_GET['time'] == "5") {
            echo "checked";
        }
    }
?> />
                                <label for="radio05" class="font-cairo f-18 font-color-4">
                                    <span class="m-3"></span>أكثر من 3 شهور
                                </label>
                            </div>
                        </div>
                        <div class="sidebar_widget">
                            <h6 class="font-color-1 py-3">المبلغ المطلوب</h6>
                            <div class="price-range">
                                <ul class="p-0 px-5">
                                    <li class="range d-block">
                                        <div id="range-price" class="range-box"></div>
                                        <input dir="ltr" type="text" id="price" class="price-box font-cairo f-18 font-color-4 bg-none" readonly name="money" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <input type="submit" value="ابحث" class="rounded-0 btn btn-danger d-block w-100 py-2  font-cairo f-18">
                    </form>
                </div>
            </aside>
            <section class="col-12 col-md-8 my-5">
                <?php
    try {
        $stmt = $con->prepare($MysqlStatCont);
        $stmt->execute();
        $total    = $stmt->fetchColumn();
        $limit    = 7;
        $pages    = ceil($total / $limit);
        $page     = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
            'options' => array(
                'default' => 1,
                'min_range' => 1
            )
        )));
        $offset   = ($page - 1) * $limit;
        $start    = $offset + 1;
        $end      = min(($offset + $limit), $total);
        $prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&rsaquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&rsaquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&rsaquo;</span>';
        $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&laquo;</a> <a href="?page=' . $pages . '" title="Last page">&laquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&laquo;</span>';
        $ItemLIM  = $MysqlStat . ' ORDER BY `service_time` DESC LIMIT :limit OFFSET :offset ';
        $stmt     = $con->prepare($ItemLIM);
        if ($total != 0) {
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
        }
        if ($stmt->rowCount() > 0) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $iterator = new IteratorIterator($stmt);
            foreach ($iterator as $row) {
                $stx        = 'SELECT COUNT(*) FROM `offers` WHERE `OffersService` = "' . $row['id_services'] . '"';
                $OffersStmt = $con->prepare($stx);
                $OffersStmt->execute();
                $totalOffers = $OffersStmt->fetchColumn();
                $stI         = 'SELECT `User_name`, `User_Img` FROM `users` WHERE `User_id` = "' . $row['user_id'] . '"';
                $stI         = $con->prepare($stI);
                $stI->execute();
                $UserPro = $stI->fetch();
                echo '<a class="bg-color-2 rounded row mb-3" href="services.php?singl=' . $row['id_services'] . '">';
                echo '<div class="col-md-9 col-12 pt-3"> <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">' . $row['service_title'] . '</h6>';
                echo '<div><h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700 mr-2">' . $row['service_time'] . '</h6>';
                echo '<h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700 mr-2"> العروض ' . $totalOffers . '</h6>';
                echo '<h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700 mr-2">' . $UserPro['User_name'] . '</h6></div>';
                echo '<p class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3">' . substr($row['service_des'], 0, 190) . '....</p></div><div class="col-3 h-200 py-3 d-md-block d-none">';
                echo '<img src="upload\avatars\\' . $UserPro['User_Img'] . '" class="h-100 w-100 rounded-circle"></div></a>';
            }
            echo '<div id="paging"><p>', $nextlink, ' الصفحه ', $page, ' من ', $pages, ' صفحه, يعرض ', $total, ' خدمه ', $prevlink, ' </p></div>';
        } else {
            echo '<p>لا يوجد نتائج للعرض</p>';
        }
    }
    catch (Exception $e) {
        echo '<p>', $e->getMessage(), '</p>';
    }
?>
            </section>
        </div>
    </div>
</main>
<?php
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
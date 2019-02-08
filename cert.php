<?php
ob_start();
session_start();
include 'init.php';
$pageTitle = 'الشهادات';
include $tempDir . 'header.php';
if (isset($_GET['cert'])) {
    if (!empty($_GET['cert'])) {
        if (cheak('`User_id`', '`users`', '`User_id` = "' . $_GET['cert'] . '"')) {
            $stmt = $con->prepare("SELECT * FROM `cert` WHERE `CertUser` = '" . $_GET['cert'] . "'");
            $stmt->execute();
            $certs = $stmt->fetchAll();
            if(isset($_SESSION['ID'])){
                    if( $_GET['cert'] == $_SESSION['ID'] ){ echo "<div class='mt-4 container'><a class='btn btn-primary btn-lg rounded-0 btn-block bg-color-2' href='cert.php?do=add'>إضافه شهادة</a></div>";
                    }}echo '<div class="mb-5"> <div class="container"> <div class="row">';
            foreach ($certs as $x) {
?>

            <div class="col-12">
                <h1 class="bg-color-9 font-700 font-color-2 mt-4 px-3 py-2 f-24 pr-5 mb-0">
                <?= ($x['CertTitle'])?></h1>
                <?php 
                if(isset($_SESSION['ID'])){
                    if( $_GET['cert'] == $_SESSION['ID'] ){ 
                    echo '<div class="row text-center">';
                    echo '<div class="col-6 pr-0">';
                    echo '<a href="cert.php?do=edit&certs='.$x['CertID'].'" class="d-block col-12 bg-secondary font-700 font-color-2 hover2 py-2">تعديل</a>';
                    echo '</div>';
                    echo '<div class="col-6 pl-0">';
                    echo '<a href="cert.php?do=delete&certs='.$x['CertID'].'" class="d-block col-12 bg-dark font-700 font-color-2 hover2 py-2">حذف</a>';
                    echo '</div>';
                    echo '</div>';
                    } 
                } ?>
            </div>
            <a class="col-12 link-hover h-max-600 position-relative" href="<?= ($x['Certlink']) ?>">
                <div class="w-100 h-100">
                    <img src="upload/cert/<?= ($x['Certimg']) ?>" class="w-100 h-100">
                </div>
            </a>   
<?php
            }
            echo "</div></div></div>";
        } else {
            header('Location: index.php');
            exit();
        }
    } else {
        header('Location: index.php');
        exit();
    }
} elseif (isset($_GET['do'])) {
    if (isset($_SESSION['Username'])) {
        if ($_GET['do'] == 'add') {
?>
<header id='fullHeader'>
    <div class="over"></div>
    <div class="container pt-5 position-relative">
        <h2 class="bg-color-3 d-inline-block mx-5 px-4 py-2 f-30 font-cairo text-light">اضافه شهاده جديده</h2>
        <div class="row justify-content-center mt-3">
            <form class="login col-lg-6 col-sm-12 col-xs-12 d-block p-5 mt-5 rounded mb-5" action="?do=insert" method="POST" enctype="multipart/form-data">
                <div class="form-group pt-3 pb-2">
                    <input type="text" name="name" required class="form-control rounded-0 px-3 py-3 font-cairo" placeholder="عنوان الشهاده">
                </div>
                <h4>صوره الشهاده</h4>
                <div class="form-group pt-3 mb-4">
                    <input type="file" name="workimg" id="file" class="input-file" required>
                    <label for="file" class="btn btn-tertiary js-labelFile w-100 ">
                        <i class="icon fa fa-check"></i>
                        <span class="js-fileName">اختر صوره للرفع</span>
                    </label>
                </div>
                <div class="form-group pt-3 pb-2">
                    <input type="url" name="carturl" class="form-control rounded-0 px-3 py-3 font-cairo" placeholder="رابط الشهاده">
                </div>
                <input type="submit" value="انشر الأن" class="btn btn-danger d-block w-100 mb-0 py-2 font-cairo f-18">
            </form>
        </div>
    </div>
</header>
<?php
        } elseif ($_GET['do'] == 'insert') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $formErrors              = array();
                $name                    = $_POST['name'];
                $carturl                 = $_POST['carturl'];
                // Upload Variables
                $workimgName             = $_FILES['workimg']['name'];
                $workimgSize             = $_FILES['workimg']['size'];
                $workimgTmp              = $_FILES['workimg']['tmp_name'];
                $workimgType             = $_FILES['workimg']['type'];
                // List Of Allowed File Typed To Upload
                $workimgAllowedExtension = array(
                    "jpeg",
                    "jpg",
                    "png"
                );
                // Get Avatar Extension
                $tmp                     = explode('.', $workimgName);
                $file_extension          = end($tmp);
                $workimgExtension        = strtolower($file_extension);
                if (empty($workimgName)) {
                    $formErrors[] = 'يجب وضع صوره';
                }
                if (!empty($workimgName) && !in_array($workimgExtension, $workimgAllowedExtension)) {
                    $formErrors[] = 'الامتداد غير مسموح';
                }
                if ($workimgSize > 8194304) {
                    $formErrors[] = 'الصوره لا يجب ان تزيد عن 4 ميجا';
                }
                if (empty($name)) {
                    $formErrors[] = 'لا يمكن ترك الاسم فارغ';
                }
                foreach ($formErrors as $error) {
                    echo '<div class="alert alert-danger">' . $error . '</div>';
                }
                if (empty($formErrors)) {
                    do {
                        $workimg = randomString() . '_' . $workimgName;
                    } while (cheak('`Certimg`', '`cert`', "`Certimg` = '$workimg'"));
                    do {
                        $CertID = randomString(11);
                    } while (cheak('`CertID`', '`cert`', "`CertID` = '$WorkID'"));
                    move_uploaded_file($workimgTmp, "upload\cert\\" . $workimg);
                    $stmt = $con->prepare("INSERT INTO `cert` (`CertID`, `CertTitle`, `Certimg`, `Certlink`, `CertUser`) VALUES  
                                            (:zid, :zname, :zimg, :zurl, :zuser)");
                    $stmt->execute(array(
                        'zid' => $CertID,
                        'zname' => $name,
                        'zimg' => $workimg,
                        'zurl' => $carturl,
                        'zuser' => $_SESSION['ID']
                    ));
                    $url = "cert.php?cert=" . $_SESSION['ID'];
                    header('Location: ' . $url);
                    exit();
                }
            } else {
                header('Location: index.php');
                exit();
            }
        } elseif ($_GET['do'] == 'edit') {
            if (isset($_GET['certs'])) {
                if (!empty($_GET['certs'])) {
                    if (cheak('*', '`cert`', "`CertID` = '" . $_GET['certs'] . "' AND `CertUser` = '" . $_SESSION['ID'] . "'")) {
                        $stmt = $con->prepare("SELECT * FROM `cert` WHERE `CertID` = '" . $_GET['certs'] . "' AND `CertUser` = '" . $_SESSION['ID'] . "'");
                        $stmt->execute();
                        $works = $stmt->fetch();
?>
                        
<header id='fullHeader'>
    <div class="over"></div>
    <div class="container pt-5 position-relative">
        <h2 class="bg-color-3 d-inline-block mx-5 px-4 py-2 f-30 font-cairo text-light">تعديل بيانات الشهادة</h2>
        <div class="row justify-content-center mt-3">
            <form class="login col-lg-6 col-sm-12 col-xs-12 d-block p-5 mt-5 rounded mb-5" action="?do=update" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="portid" required value="<?= ($works['CertID']) ?>"/>
                <div class="form-group pt-3 pb-2">
                    <input type="text" name="portname"  class="form-control rounded-0 px-3 py-3 font-cairo" value="<?= ($works['CertTitle']) ?>" >
                </div>
                <h4>صوره المشروع</h4>
                <div class="form-group pt-3 mb-4">
                    <input type="hidden" name="proimg" required value="<?= ($works['Certimg']) ?>"/>
                    <input type="file" name="workimg" id="file"  class="input-file">
                    <label for="file" class="btn btn-tertiary js-labelFile w-100 ">
                        <i class="icon fa fa-check"></i>
                        <span class="js-fileName">اختر صوره للرفع</span>
                    </label>
                </div>
                <div class="form-group pt-3 pb-2">
                    <input type="url" name="workurl" class="form-control rounded-0 px-3 py-3 font-cairo" placeholder="رابط الشهاده" value=<?= ($works['Certlink']) ?>>
                </div>
                <input type="submit" value="عدل الان" class="btn btn-danger d-block w-100 mb-0 py-2 font-cairo f-18">
            </form>
        </div>
    </div>
</header>
                        <?php
                    } else {
                        header('Location: index.php');
                        exit();
                    }
                }
            }
        } elseif ($_GET['do'] == 'update') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $formErrors = array();
                $portid     = $_POST['portid'];
                $name       = $_POST['portname'];
                $workurl    = $_POST['workurl'];
                $proimg     = $_POST['proimg'];
                $oldFile    = "upload\cert\\" . $proimg;
                if (isset($_FILES['workimg'])) {
                    if (!empty($_FILES['workimg'])) {
                        if (!empty($_FILES['workimg']['name'])) {
                            // Upload Variables
                            $workimgName             = $_FILES['workimg']['name'];
                            $workimgSize             = $_FILES['workimg']['size'];
                            $workimgTmp              = $_FILES['workimg']['tmp_name'];
                            $workimgType             = $_FILES['workimg']['type'];
                            // List Of Allowed File Typed To Upload
                            $workimgAllowedExtension = array(
                                "jpeg",
                                "jpg",
                                "png"
                            );
                            // Get Avatar Extension
                            $tmp                     = explode('.', $workimgName);
                            $file_extension          = end($tmp);
                            $workimgExtension        = strtolower($file_extension);
                            if (!empty($workimgName) && !in_array($workimgExtension, $workimgAllowedExtension)) {
                                $formErrors[] = 'الامتداد غير مسموح';
                            }
                            if ($workimgSize > 8194304) {
                                $formErrors[] = 'الصوره لا يجب ان تزيد عن 8 ميجا';
                            }
                            if (empty($formErrors)) {
                                do {
                                    $workimg = randomString() . '_' . $workimgName;
                                } while (cheak('`PortfoiloImg`', '`portfoilo`', "`PortfoiloImg` = '$workimg'"));
                                $proimg = $workimg;
                            }
                        }
                    }
                }
                if (empty($name)) {
                    $formErrors[] = 'لا يمكن ترك الاسم فارغ';
                }
                foreach ($formErrors as $error) {
                    echo '<div class="alert alert-danger">' . $error . '</div>';
                }
                if (empty($formErrors)) {
                    if ($proimg == $workimg) {
                        move_uploaded_file($workimgTmp, "upload\cert\\" . $workimg);
                    }
                    $stmt = $con->prepare("UPDATE `cert` SET `CertTitle` = ?, `Certlink` = ?, `Certimg` = ? WHERE `CertID` = ?");
                    $stmt->execute(array(
                        $name,
                        $workurl,
                        $proimg,
                        $portid
                    ));
                    unlink($oldFile) or die("Couldn't delete file");
                    $url = "cert.php?cert=" . $_SESSION['ID'];
                    header('Location: ' . $url);
                    exit();
                }
            } else {
                header('Location: index.php');
                exit();
            }
        } elseif ($_GET['do'] == 'delete') {
            if (isset($_GET['certs'])) {
                if (!empty($_GET['certs'])) {
                    if (cheak('*', '`cert`', "`CertID` = '" . $_GET['certs'] . "' AND `CertUser` = '" . $_SESSION['ID'] . "'")) {
                        $stmt = $con->prepare("DELETE FROM `cert` WHERE `CertID` = :zid");
                        $stmt->bindParam(":zid", $_GET['certs']);
                        $stmt->execute();
                        $url = "cert.php?cert=" . $_SESSION['ID'];
                        header('Location: ' . $url);
                    } else {
                        $url = "cert.php?cert=" . $_SESSION['ID'];
                        header('Location: ' . $url);
                        exit();
                    }
                } else {
                    $url = "cert.php?cert=" . $_SESSION['ID'];
                    header('Location: ' . $url);
                    exit();
                }
            } else {
                $url = "cert.php?cert=" . $_SESSION['ID'];
                header('Location: ' . $url);
                exit();
            }
        } else {
            header('Location: index.php');
            exit();
        }
    }
} else {
    header('Location: index.php');
    exit();
}
?>
<?php
include $tempDir . 'footer.php';
ob_end_flush();
?>
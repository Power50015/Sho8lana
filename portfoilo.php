<?php
ob_start();
session_start();
include 'init.php';
$pageTitle = 'الاعمال السابقه';
include $tempDir . 'header.php';
if (isset($_GET['prot'])) {
    if (!empty($_GET['prot'])) {
        if (cheak('`User_id`', '`users`', '`User_id` = "' . $_GET['prot'] . '"')) {
            $stmt = $con->prepare("SELECT * FROM `portfoilo` WHERE `PortfoiloUser` = '" . $_GET['prot'] . "'ORDER BY `PortfoiloDate` DESC");
            $stmt->execute();
            $portfoilo = $stmt->fetchAll();
            if(isset($_SESSION['ID'])){
                    if( $_GET['prot'] == $_SESSION['ID'] ){ 
            echo "<div class='mt-4 container'><a class='btn btn-primary btn-lg rounded-0 btn-block bg-color-2' href='portfoilo.php?do=add'>إضافه مشروع</a></div>";
                    }}foreach ($portfoilo as $x) {
?>
<div class="port_grid_section mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="bg-color-9 font-700 font-color-2 mt-4 px-3 py-2 f-24 pr-5 mb-0">
                <?= ($x['PortfoiloTitle']) ?></h1>
            </div>
            <a class="col-12 link-hover h-max-600 position-relative" href="portfoilo.php?work=<?= ($x['PortfoiloID']) ?>">
                <div class="over h-100"></div>
                <div class="w-100 h-100">
                    <img src="upload/port/<?= ($x['PortfoiloImg']) ?>" class="w-100 h-100">
                </div>
            </a>
        </div>
    </div>
</div>
            
<?php
            }
        } else {
            header('Location: index.php');
            exit();
        }
    } else {
        header('Location: index.php');
        exit();
    }
} elseif (isset($_GET['work'])) {
    if (!empty($_GET['work'])) {
        if (cheak('*', '`portfoilo`', '`PortfoiloID` = "' . $_GET['work'] . '"')) {
            $stmt = $con->prepare("SELECT * FROM `portfoilo` WHERE `PortfoiloID` = '" . $_GET['work'] . "'");
            $stmt->execute();
            $work = $stmt->fetch();
            $stmt = $con->prepare("SELECT `User_name` FROM `users` WHERE `User_id` = '" . $work['PortfoiloUser'] . "'");
            $stmt->execute();
            $user = $stmt->fetch();
?>
        <!-- port_img_section start -->
<div class="port_img_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="bg-color-9 font-700 font-color-2 mt-4 px-3 py-2 f-24 pr-5 mb-0"><?= ($work['PortfoiloTitle']) ?></h1>
            </div>
            <div class="col-12 mb-3">
                <img src="upload/port/<?= ($work['PortfoiloImg']) ?>" class="w-100 h-max-600">
            </div>
            <div class="col-12 col-md-3">
                <div class="row">
                   <div class="col-12 mb-3">
                       <h4 class="font-color-3 py-2">تفاصيل المشروع</h4>
                       <h6 class="font-color-3 py-2 ">بواسطه : <a href="profile.php?user=<?= ($work['PortfoiloUser']) ?>"><?= ($user['User_name']) ?></a></h6>
                       <h6 class="font-color-3 py-2 ">تاريخ العمل : <?= ($work['PortfoiloDate']) ?></h6>
                       <h6 class="font-color-3 py-2 ">رابط المشروع : <a href="<?= ($work['PortfoiloUrl']) ?><"><?= ($work['PortfoiloUrl']) ?></a></h6>
                       <?php
            if (isset($_SESSION['Username'])) {
                if ($work['PortfoiloUser'] == $_SESSION['ID']) {
?>
                       <a href="portfoilo.php?do=edit&works=<?= ($work['PortfoiloID']) ?>" class="btn btn-dark">تعديل</a>
                       <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">حذف</button>
                       <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">هل انت متاكد من حذف المشروع</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        في حاله الموافقه سيتم مسح المشروع من قاعده البيانات
      </div>
      <div class="modal-footer">
        <a href="portfoilo.php?do=delete&works=<?= ($work['PortfoiloID']) ?>" class="btn btn-primary">نعم</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">لا</button>
      </div>
    </div>
  </div>
</div>
                       <?php
                }
            }
?>
                   </div>
                </div>
            </div>
            <div class="col-12 col-md-9">
            <p><?= ($work['PortfoiloDes']) ?></p>
            </div>
        </div>
    </div>
</div>
        <?php
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
        <h2 class="bg-color-3 d-inline-block mx-5 px-4 py-2 f-30 font-cairo text-light">اضافه مشروع جديد</h2>
        <div class="row justify-content-center mt-3">
            <form class="login col-lg-6 col-sm-12 col-xs-12 d-block p-5 mt-5 rounded mb-5" action="?do=insert" method="POST" enctype="multipart/form-data">
                <div class="form-group pt-3 pb-2">
                    <input type="text" name="name" required class="form-control rounded-0 px-3 py-3 font-cairo" placeholder="عنوان المشروع">
                </div>
                <h4>صوره المشروع</h4>
                <div class="form-group pt-3 mb-4">
                    <input type="file" name="workimg" id="file" class="input-file" required>
                    <label for="file" class="btn btn-tertiary js-labelFile w-100 ">
                        <i class="icon fa fa-check"></i>
                        <span class="js-fileName">اختر صوره للرفع</span>
                    </label>
                </div>
                <div class="form-group pt-4">
                    <textarea required name="det" class="form-control rounded-0 px-3 py-3 font-cairo h-500" placeholder="تفاصيل المشروع"></textarea>
                </div>
                <div class="form-group pt-3 pb-2">
                    <input type="url" name="workurl" class="form-control rounded-0 px-3 py-3 font-cairo" placeholder="رابط المشروع">
                </div>
                <div class="form-group pt-3 pb-2">
                    <input type="date" name="date" required class="form-control rounded-0 px-3 py-3 font-cairo" >
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
                $det                     = $_POST['det'];
                $workurl                 = $_POST['workurl'];
                $time                    = $_POST['date'];
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
                if ($workimgSize > 4194304) {
                    $formErrors[] = 'الصوره لا يجب ان تزيد عن 4 ميجا';
                }
                if (empty($name)) {
                    $formErrors[] = 'لا يمكن ترك الاسم فارغ';
                }
                if (empty($det)) {
                    $formErrors[] = 'لا يمكن ترك الوصف فارغ';
                }
                if (empty($time)) {
                    $formErrors[] = 'لا يمكن ترك السعر فارغ';
                }
                foreach ($formErrors as $error) {
                    echo '<div class="alert alert-danger">' . $error . '</div>';
                }
                if (empty($formErrors)) {
                    do {
                        $workimg = randomString() . '_' . $workimgName;
                    } while (cheak('`PortfoiloImg`', '`portfoilo`', "`PortfoiloImg` = '$workimg'"));
                    do {
                        $WorkID = randomString(11);
                    } while (cheak('`PortfoiloID`', '`portfoilo`', "`PortfoiloID` = '$WorkID'"));
                    move_uploaded_file($workimgTmp, "upload\port\\" . $workimg);
                    $stmt = $con->prepare("INSERT 
INTO `portfoilo` (`PortfoiloID`, `PortfoiloTitle`, `PortfoiloDes`, `PortfoiloDate`, `PortfoiloImg`, `PortfoiloUrl`, `PortfoiloUser`) VALUES  
                    (:zid, :zname, :zdes, :ztime, :zimg, :zurl, :zuser)");
                    $stmt->execute(array(
                        'zid' => $WorkID,
                        'zname' => $name,
                        'zdes' => $det,
                        'ztime' => $time,
                        'zimg' => $workimg,
                        'zurl' => $workurl,
                        'zuser' => $_SESSION['ID']
                    ));
                    $url = "portfoilo.php?work=" . $WorkID;
                    header('Location: ' . $url);
                    exit();
                }
            } else {
                header('Location: index.php');
                exit();
            }
        } elseif ($_GET['do'] == 'edit') {
            if (isset($_GET['works'])) {
                if (!empty($_GET['works'])) {
                    if (cheak('*', '`portfoilo`', "`PortfoiloID` = '" . $_GET['works'] . "' AND `PortfoiloUser` = '" . $_SESSION['ID'] . "'")) {
                        $stmt = $con->prepare("SELECT * FROM `portfoilo` WHERE `PortfoiloID` = '" . $_GET['works'] . "' AND `PortfoiloUser` = '" . $_SESSION['ID'] . "'");
                        $stmt->execute();
                        $works = $stmt->fetch();
?>
                        
<header id='fullHeader'>
    <div class="over"></div>
    <div class="container pt-5 position-relative">
        <h2 class="bg-color-3 d-inline-block mx-5 px-4 py-2 f-30 font-cairo text-light">تعديل المشروع</h2>
        <div class="row justify-content-center mt-3">
            <form class="login col-lg-6 col-sm-12 col-xs-12 d-block p-5 mt-5 rounded mb-5" action="?do=update" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="portid" required value="<?= ($works['PortfoiloID']) ?>"/>
                <div class="form-group pt-3 pb-2">
                    <input type="text" name="portname"  class="form-control rounded-0 px-3 py-3 font-cairo" value="<?= ($works['PortfoiloTitle']) ?>" >
                </div>
                <h4>صوره المشروع</h4>
                <div class="form-group pt-3 mb-4">
                    <input type="hidden" name="proimg" required value="<?= ($works['PortfoiloImg']) ?>"/>
                    <input type="file" name="workimg" id="file"  class="input-file">
                    <label for="file" class="btn btn-tertiary js-labelFile w-100 ">
                        <i class="icon fa fa-check"></i>
                        <span class="js-fileName">اختر صوره للرفع</span>
                    </label>
                </div>
                <div class="form-group pt-4">
                    <textarea required name="det" class="form-control rounded-0 px-3 py-3 font-cairo h-500" placeholder="تفاصيل المشروع"><?= ($works['PortfoiloDes']) ?></textarea>
                </div>
                <div class="form-group pt-3 pb-2">
                    <input type="url" name="workurl" class="form-control rounded-0 px-3 py-3 font-cairo" placeholder="رابط المشروع" value=<?= ($works['PortfoiloUrl']) ?>>
                </div>
                <div class="form-group pt-3 pb-2">
                    <input type="date" name="date" required class="form-control rounded-0 px-3 py-3 font-cairo" value=<?= ($works['PortfoiloDate']) ?> >
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
                $det        = $_POST['det'];
                $workurl    = $_POST['workurl'];
                $time       = $_POST['date'];
                $proimg     = $_POST['proimg'];
                $oldFile    = "upload\port\\" . $proimg;
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
                            if ($workimgSize > 4194304) {
                                $formErrors[] = 'الصوره لا يجب ان تزيد عن 4 ميجا';
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
                if (empty($det)) {
                    $formErrors[] = 'لا يمكن ترك الوصف فارغ';
                }
                if (empty($time)) {
                    $formErrors[] = 'لا يمكن ترك السعر فارغ';
                }
                foreach ($formErrors as $error) {
                    echo '<div class="alert alert-danger">' . $error . '</div>';
                }
                if (empty($formErrors)) {
                    if ($proimg == $workimg) {
                        move_uploaded_file($workimgTmp, "upload\port\\" . $workimg);
                    }
                    $stmt = $con->prepare("UPDATE `portfoilo` SET `PortfoiloTitle` = ?, `PortfoiloDes` = ?, `PortfoiloDate` = ?, `PortfoiloUrl` = ?, `PortfoiloImg` = ? WHERE `PortfoiloID` = ?");
                    $stmt->execute(array(
                        $name,
                        $det,
                        $time,
                        $workurl,
                        $proimg,
                        $portid
                    ));
                    unlink($oldFile) or die("Couldn't delete file");
                    $url = "portfoilo.php?work=" . $portid;
                    header('Location: ' . $url);
                    exit();
                }
            } else {
                header('Location: index.php');
                exit();
            }
        } elseif ($_GET['do'] == 'delete') {
            if (isset($_GET['works'])) {
                if (!empty($_GET['works'])) {
                    if (cheak('*', '`portfoilo`', "`PortfoiloID` = '" . $_GET['works'] . "' AND `PortfoiloUser` = '" . $_SESSION['ID'] . "'")) {
                        $stmt = $con->prepare("DELETE FROM `portfoilo` WHERE `PortfoiloID` = :zid");
                        $stmt->bindParam(":zid", $_GET['works']);
                        $stmt->execute();
                        $url = "portfoilo.php?prot=" . $_SESSION['ID'];
                        header('Location: ' . $url);
                    } else {
                        $url = "portfoilo.php?prot=" . $_SESSION['ID'];
                        header('Location: ' . $url);
                        exit();
                    }
                } else {
                    $url = "portfoilo.php?prot=" . $_SESSION['ID'];
                    header('Location: ' . $url);
                    exit();
                }
            } else {
                $url = "portfoilo.php?prot=" . $_SESSION['ID'];
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
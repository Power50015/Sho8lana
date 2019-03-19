<?php
ob_start(); // Start Out But Puffering
session_start(); // Start Section 
include 'init.php'; // Include init.php File
$pageTitle = 'الرئيسيه'; // Page Name
if (!isset($_SESSION['Username'])) { // Cheak if User is loging in Website
    header('Location: login.php'); // Redirect To Dashboard Page
    exit();
}
// Get User Data From DB
$stmt = $con->prepare("SELECT  * FROM  `users` WHERE `User_id` = ? AND `User_name` = ?");
$stmt->execute(array( $_SESSION['ID'], $_SESSION['Username']));
$row = $stmt->fetch();

// Update User Data Useing POST METHOD
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_POST['des'])) { // Updata Name ,Des or Img
        $username = $_POST['username']; // Get User Name 
        $username = filter_var($username, FILTER_SANITIZE_STRING); // Filter User input
        $userDes  = $_POST['userDes']; // Get User Des
        $userDes  = filter_var($userDes, FILTER_SANITIZE_STRING); // Filter User Des
        if ($username == '' || $username == NULL) { // Cheak if The name = To NULL
            $username = $_SESSION['Username'];
        } else { 
            $smallCap = strtolower($username);

            if (strlen($username) < 4) { // Cheak if Name leng < 4 
                $formErrors[] = 'يجب ان يزيد اسم المستخدم عن 4 حروف';
            }
            $username = substr($username, 0, 50);
            if (cheak("`User_name`", "`users`", "`User_name` = '$username' OR `User_name` = '$smallCap'")) { // If The User Name Is issest in DataBase
                $formErrors[] = 'اسم المستخدم موجود بالفعل في قاعده البيانات ';
            }
        }
        if ($userDes == '' || $userDes == NULL) { // Cheak if The UserDes = To NULL
            $userDes = $row['User_Des'];
        } else {
            if (strlen($userDes) < 10) {
                $formErrors[] = 'يجب ان يزيد الوصف عن 10 حروف';
            } else {
                $userDes = substr($userDes, 0, 600);
            }
        }
        // Check If There's No Error Proceed The User Add
        if (empty($formErrors)) {
            // Update The Database With This Info
            $stmt = $con->prepare("UPDATE users SET `User_name` = ?, `User_Des` = ? WHERE `User_id` = ?");
            $stmt->execute(array(
                $username,
                $userDes,
                $_SESSION['ID']
            ));
            if ($stmt) {
                $_SESSION['Username'] = $username;
                $row['User_Des']      = $userDes;
            }
        } else {
            echo "<script>";
            foreach ($formErrors as $errors) {
                echo "alert('" . $errors . " '); ";
            }
            echo "</script>";
        }
    }
    if (isset($_POST['website'])) {
        $UserWeb = $_POST['webUrl'];
        $UserWeb = filter_var($UserWeb, FILTER_VALIDATE_URL);
        if ($UserWeb == '' || $UserWeb == NULL) {
            $UserWeb = $row['User_Site'];
        }
        $stmt = $con->prepare("UPDATE users SET `User_Site` = ? WHERE `User_id` = ?");
        $stmt->execute(array(
            $UserWeb,
            $_SESSION['ID']
        ));
        header("Refresh:0");
    }
    if (isset($_POST['paybal'])) {
        $paybalUrl = $_POST['paybalUrl'];
        $paybalUrl = filter_var($paybalUrl, FILTER_SANITIZE_EMAIL);
        if ($paybalUrl == '' || $paybalUrl == NULL) {
            $UserWeb = $row['User_paypal'];
        }
        $stmt = $con->prepare("UPDATE users SET `User_paypal` = ? WHERE `User_id` = ?");
        $stmt->execute(array(
            $paybalUrl,
            $_SESSION['ID']
        ));
        header("Refresh:0");
    }
    if (isset($_POST['avatarBtn'])) {
        // Upload Variables
        $avatarName             = $_FILES['avatar']['name'];
        $avatarSize             = $_FILES['avatar']['size'];
        $avatarTmp              = $_FILES['avatar']['tmp_name'];
        $avatarType             = $_FILES['avatar']['type'];
        // List Of Allowed File Typed To Upload
        $avatarAllowedExtension = array(
            "jpeg",
            "jpg",
            "png"
        );
        // Get Avatar Extension
        $tmp                    = explode('.', $avatarName);
        $file_extension         = end($tmp);
        $avatarExtension        = strtolower($file_extension);
        if (empty($avatarName)) {
            $formErrors[] = 'Avatar Is <strong>Required</strong>';
        }
        if (!empty($avatarName) && !in_array($avatarExtension, $avatarAllowedExtension)) {
            $formErrors[] = 'This Extension Is Not <strong>Allowed</strong>';
        }
        if ($avatarSize > 4194304) {
            $formErrors[] = 'Avatar Cant Be Larger Than <strong>4MB</strong>';
        }
        // Check If There's No Error Proceed The Update Operation
        if (empty($formErrors)) {
            $myFile = $_SESSION['ProfileImg'];
            do {
                $avatar = randomString() . '_' . $avatarName;
            } while (cheak('`User_Img`', 'users', "`User_Img` = '$avatar'"));
            move_uploaded_file($avatarTmp, "upload\avatars\\" . $avatar);
            $stmt = $con->prepare("UPDATE users SET `User_Img` = ? WHERE `User_id` = ?");
            $stmt->execute(array(
                $avatar,
                $_SESSION['ID']
            ));
            $_SESSION['ProfileImg'] = "upload/avatars/" . $avatar;
            if ($myFile != "upload/avatars/0.jpg") {
                if (isset($_FILES[$myFile])) {
                    unlink($myFile) or die("Couldn't delete file");
                }
            }
        }
    }
}

include $tempDir . 'header.php';
?>
<header class="d-flex h-500">
    <div class="over"></div>
    <div class="container position-relative align-self-center text-center">
        <h1 class="d-inline font-color-2 bg-color-6 px-4 font-700">لوحة التحكم</h1> 
    </div>
</header>
<!--Start info Section -->
<section class="personal-info bg-color-8 py-5">
    <div class="container">
        <div class="row px-5 mb-0">
           <!--Start Img Section -->
            <div class="personal-img position-relative col-lg-3 col-sm-12 p-0 mr-lg-4" data-toggle="modal" data-target="#personal-img">
                <div class="over h-100"></div>
                <img src="<?= ($_SESSION['ProfileImg']) ?>" class="rounded w-100 h-100 position-relative" alt="...">
            </div>
            <!--End Img Section -->
            <!--Start Name Section -->
            <div class="col-lg-8 col-sm-12 mt-5 text-sm-center text-lg-left" data-toggle="modal" data-target="#personal-name">
                <h2 class="hover2 bg-color-2 d-inline rounded font-700 font-color-2 mb-lg-0 mb-4 px-3 py-1"><?= ($_SESSION['Username']) ?></h2>
                <p  class="hover2 bg-color-2 d-block rounded font-700 font-color-2 mt-4 p-4 pb-0 text-center"><?= ($row['User_Des']) ?></p>
            </div>
            <!--End Name Section -->
        </div>
        <div class="row">
           <!--Start Btns Section -->
            <div class="col-lg-4 col-sm-12" data-toggle="modal" data-target="#website">
                <h5 class="hover font-color-2 bg-color-9 px-4 font-700 mt-lg-5 py-3 text-center mb-3">الموقع الشخصي</h5>
            </div>
            <!--End Btns Section -->
            <!--Start Btns Section -->
            <div class="col-lg-4 col-sm-12" data-toggle="modal" data-target="#paybal">
               <h5 class="hover font-color-2 bg-color-9 px-4 font-700 mt-lg-5 py-3 text-center mb-3">paybal</h5>
            </div>
            <!--End Btns Section -->
            <!--Start Btns Section -->
            <a href="#" class="col-lg-4 col-sm-12 hover">
                <h5 class="hover font-color-2 bg-color-9 px-4 font-700 mt-lg-5 py-3 text-center mb-3">الرصيد</h5>
            </a>
            <!--End Btns Section -->
        </div>
    </div>
</section>
<!--End info Section -->

<!--Start certfcate Section -->
<section class="w-100 bg-color-7 certfcate">
    <div class="container py-5">
       <h2 class="bg-color-9 d-inline-block font-700 font-color-2 mb-lg-0 mb-4 px-4 py-2">المهارات</h2>
       <div>
       <?php
            $stmt = $con->prepare("SELECT `user_skillID` FROM `user_skill` WHERE `userID_skill` = '" .  $_SESSION['ID'] . "'");
            $stmt->execute();
            $skills = $stmt->fetchAll();
            $numItems = count($skills);
            $j = 0;
            if ($numItems > 0){$SQLSection = "(`SkillID` != ";}
            else {$SQLSection = "(1)";}
            foreach($skills as $x){
                if(++$j === $numItems) {
                    $SQLSection = $SQLSection . $x['user_skillID'] . " )";
                    }
                    else{
                        $SQLSection = $SQLSection . $x['user_skillID'] . " AND `SkillID` != ";
                    }
            }
            try {
                $stmt = $con->prepare("SELECT * FROM `skills` WHERE " .  $SQLSection);
                        $stmt->execute();
                        $skillSelect = $stmt->fetchAll();
                }catch (Exception $e) {
                $skillSelect;
            }
       ?>
       <button type='button' data-toggle='modal' data-target='#exampleModal995' class='btn-add hover'><i class='fas fa-plus'></i></button>
       <!-- Modal -->
<div class="modal fade" id="exampleModal995" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="modal-content" action="skill.php?do=insert" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">اضف مهارتك</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <select class="btn-block" name="name">
        <?php
        foreach($skillSelect as $z){
            echo '<option value="'.$z['SkillID'].'">'.$z['SkillName'].'</option>';
        }
        ?>
        </select>
      </div>
      <div class="modal-footer">
        <input type="submit" value="اضف" name="add" class="btn btn-primary btn-block">
      </div>
    </form>
  </div>
</div>
                        
          <a href="skill.php?skills=<?=($_SESSION['ID'])?>" class="font-color-3 font-700 f-18">عرض الكل</a>
       </div>
       <div class="row justify-content-center mb-5 mt-3">
<?php
  $stmt = $con->prepare("SELECT `user_skillID` FROM `user_skill` WHERE `userID_skill` = '" .$_SESSION['ID'] . "'");
            $stmt->execute();
            $skills = $stmt->fetchAll();
            $numItems = count($skills);
            $j = 0;
            $SQLSection = "(`SkillID` = ";
            foreach($skills as $x){
                if(++$j === $numItems) {
                    $SQLSection = $SQLSection . $x['user_skillID'] . " )";
                    }
                    else{
                        $SQLSection = $SQLSection . $x['user_skillID'] . " OR `SkillID` = ";
                    }
                    
            }
            try{$stmt = $con->prepare("SELECT * FROM `skills` WHERE " .  $SQLSection . " LIMIT 6");
            $stmt->execute();
            $skill = $stmt->fetchAll();
    foreach ($skill as $x) {
        echo '<div class="col-6 col-md-2 mb-2 mt-2">';
        echo '<img src="upload\skills\\'.$x['SkillImg'].'" class="w-100 h-100" alt="'.$x['SkillName'].'" title="'.$x['SkillName'].'"/>';
        echo '</div>';
    }
               }catch (Exception $e) {
                $skill;
            }
           
?>
       
                  
            </div>
       <hr class="bg-color-3 mb-5">
       <h2 class="bg-color-9 d-inline-block font-700 font-color-2 mb-lg-0 mb-4 px-4 py-2">الشهادات</h2>
       <div>
         <a href="cert.php?do=add" class="btn-add"><i class="fas fa-plus"></i></a>
         <a href="cert.php?cert=<?=($_SESSION['ID'])?>" class="font-color-3 font-700 f-18">عرض الكل</a>
        </div>
       <div class="row justify-content-center mb-5 mt-3">
       <?php 
            $stmt = $con->prepare("SELECT * FROM `cert` WHERE `CertUser` = '" .$_SESSION['ID'] . "' LIMIT 4");
            $stmt->execute();
            $certs = $stmt->fetchAll();
            foreach ($certs as $x) {
       ?>
           <div class="col-sm-4 col-12 mb-2 mt-2">
            <div class="bg-color-1 text-center">
                <h4 class="bg-color-5 p-2 text-center font-color-2 font-700"><?= ($x['CertTitle'])?></h4>
                <div class="w-100 h-100">
                    <img src="upload/cert/<?= ($x['Certimg']) ?>" class="w-100 h-200">
                </div>
                <a class="w-100 fas fa-download font-color-3 bg-color-5 p-2 px-4 f-30 text-center font-700" href="<?= ($x['Certlink'])?>"></a>
            </div>
           </div>
           <?php
            }
            ?>

       </div>
    </div>
</section>
<!--End certfcate Section -->
<!--Start dashbord Section -->
<section class="w-100 bg-color-2 dashbord">
   <div class="container pb-4">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="text-center mt-5 rounded bg-color-8 p-1 mb-4">
                <?php 
                
                $sql = "SELECT count(*) FROM `services` WHERE (`services_stat` = 0 OR `services_stat` = 1 OR `services_stat` = 2) AND `user_id` = '" .  $_SESSION['ID'] ."'"; 
                $result = $con->prepare($sql);
                $result->execute(); 
                $number_of_rows = $result->fetchColumn(); 
?>
                    <a href="services.php?do=manage&filt=all" class="hover2 d-block py-5 font-700 f-30 font-color-3">الخدمات <span><?=($number_of_rows)?></span></a>
                    <a href="services.php?do=add" class="btn btn-lg btn-block mt-3 mb-0 font-color-2 bg-color-9">اضافه خدمه جديده</a>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="text-center mt-5 rounded bg-color-8 p-1 mb-4">
                <?php 
                
                $sql = "SELECT count(*) FROM `offers` WHERE (`OffersStat` = 0 OR `OffersStat` = 1 OR `OffersStat` = 2) AND `OffersUser` = '" .  $_SESSION['ID'] ."'"; 
                $result = $con->prepare($sql);
                $result->execute(); 
                $number_of_rows = $result->fetchColumn(); 
?>
                    <a href="#" class="hover2 d-block py-5 font-700 f-30 font-color-3">العروض <span><?=($number_of_rows)?></span></a>
                    <a href="services.php" class="btn btn-lg btn-block mt-3 mb-0 font-color-2 bg-color-9">تصفح العروض</a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
               <div class="text-center my-3 bg-color-8 p-1">
               <?php 
                
                $sql = "SELECT count(*) FROM `offers` WHERE (`OffersStat` = 1 ) AND `OffersUser` = '" .  $_SESSION['ID'] ."'"; 
                $result = $con->prepare($sql);
                $result->execute(); 
                $number_of_rows = $result->fetchColumn(); 
?>
                   <a href="#" class="hover2 d-block py-2 font-700 f-24 font-color-3">عروض تحت الانشاء <span><?=($number_of_rows)?></span></a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
               <div class="text-center my-3 bg-color-8 p-1">
                              <?php 
                
                $sql = "SELECT count(*) FROM `offers` WHERE (`OffersStat` =2 ) AND `OffersUser` = '" .  $_SESSION['ID'] ."'"; 
                $result = $con->prepare($sql);
                $result->execute(); 
                $number_of_rows = $result->fetchColumn(); 
?>
                   <a href="#" class="hover2 d-block py-2 font-700 f-24 font-color-3">عروض منتهيه <span><?=($number_of_rows)?></span></a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
               <div class="text-center my-3 bg-color-8 p-1">
                              <?php 
                
                $sql = "SELECT count(*) FROM `offers` WHERE (`OffersStat` = 0 ) AND `OffersUser` = '" .  $_SESSION['ID'] ."'"; 
                $result = $con->prepare($sql);
                $result->execute(); 
                $number_of_rows = $result->fetchColumn(); 
?>
                   <a href="#" class="hover2 d-block py-2 font-700 f-24 font-color-3">عروض بأنتظار الرد <span><?=($number_of_rows)?></span></a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
               <div class="text-center my-3 bg-color-8 p-1">
               <?php 
                $sql = "SELECT count(*) FROM `services` WHERE services_stat = 1 AND `user_id` = '" .  $_SESSION['ID'] ."'"; 
                $result = $con->prepare($sql); 
                $result->execute(); 
                $number_of_rows = $result->fetchColumn(); 
?>
                   <a href="services.php?do=manage&filt=making" class="hover2 d-block py-2 font-700 f-24 font-color-3">خدمات تحت الانشاء <span><?=($number_of_rows)?></span></a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
               <div class="text-center my-3 bg-color-8 p-1">
                <?php 
                $sql = "SELECT count(*) FROM `services` WHERE services_stat = 2 AND `user_id` = '" .  $_SESSION['ID'] ."'"; 
                $result = $con->prepare($sql); 
                $result->execute(); 
                $number_of_rows = $result->fetchColumn(); 
?>
                   <a href="services.php?do=manage&filt=finsh" class="hover2 d-block py-2 font-700 f-24 font-color-3">الخدمات منتهيه <span><?=($number_of_rows)?></span></a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
               <div class="text-center my-3 bg-color-8 p-1">
                               <?php 
                $sql = "SELECT count(*) FROM `services` WHERE services_stat = 0 AND `user_id` = '" .  $_SESSION['ID'] ."'"; 
                $result = $con->prepare($sql); 
                $result->execute(); 
                $number_of_rows = $result->fetchColumn(); 
?>
                   <a href="services.php?do=manage&filt=cansel" class="hover2 d-block py-2 font-700 f-24 font-color-3">خدمات بأنتظار الرد <span><?=($number_of_rows)?></span></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End dashbord Section -->
<!--Start Portfoilo Section -->
<section class="w-100 bg-color-7 portfoilo">
    <div class="container py-5">
       <h2 class="bg-color-9 d-inline-block font-700 font-color-2 mb-lg-0 mb-4 px-4 py-2">أعمال سابقه</h2>
       <div>
          <a href="portfoilo.php?do=add" class="btn-add"><i class="fas fa-plus"></i></a>
          <a href="portfoilo.php?prot=<?= ($_SESSION['ID']) ?>" class="font-color-3 font-700 f-18">عرض الكل</a>
       </div>
       <div class="row">
       <?php 
        $stmtpo = $con->prepare("SELECT * FROM `portfoilo` WHERE `PortfoiloUser` = '" . $_SESSION['ID'] . "'ORDER BY `PortfoiloDate` DESC LIMIT 4");
        $stmtpo->execute();
        $portfoilo = $stmtpo->fetchAll();
        foreach ($portfoilo as $po) {
        ?>
           <div class="col-lg-3 col-sm-5">
              <div class="mb-2 mt-2 bg-color-1 text-center p-2 pb-3">
                  <img src="upload/port/<?= ($po['PortfoiloImg']) ?>" class="w-100 h-200">
                  <h4 class="m-3 bg-color-5 p-2 text-center font-color-3 font-700 f-18"><?= ($po['PortfoiloTitle']) ?></h4>
                  <a class="font-color-3 bg-color-5 p-1 f-18 px-4 text-center font-700" href="portfoilo.php?work=<?= ($po['PortfoiloID']) ?>">المزيد</a>
              </div>
           </div>
       <?php 
       }
       ?>
           </div>
       </div>
    
</section>
<!--End Portfoilo Section -->

<!-- Start Modals -->
<!-- Start personal-img Model -->
<div class="modal fade" id="personal-img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content pb-0">
            <img src="<?= ($_SESSION['ProfileImg']) ?>" class="w-100 h-max-600" alt="your Img">
            <form class="form-group pt-3 mb-0" action="<?= ($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
                <input type="file" name="avatar" id="file" class="input-file" />
                <label for="file" class="btn btn-tertiary js-labelFile">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName">اختر الصوره للرفع</span>
                </label>
                <input type="submit" name="avatarBtn" value="اضغط للرفع" class="btn btn-secondary btn-lg btn-block mt-3 mb-0 rounded-0">
            </form>
        </div>
    </div>
</div>
<!-- End personal-img Model -->

<!-- Start personal-Des Model -->
<div class="modal fade" id="personal-name" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content pb-0">
            <form class="form-group pt-3 mb-0 container" action="<?= ($_SERVER['PHP_SELF']) ?>" method="POST">
                <input type="name" name="username" class="w-100  my-3" placeholder="<?= ($_SESSION['Username']) ?>"/>
                <textarea class="w-100 h-500 my-4" name="userDes" placeholder="<?= ($row['User_Des']) ?>"></textarea>
                <input type="submit" name="des" value="اضغط للرفع" class="btn btn-secondary btn-lg btn-block mt-3 mb-3 rounded-0">
            </form>
        </div>
    </div>
</div>
<!-- End personal-Des Model -->

<!-- Start WebSite Model -->
<?php
if ($row['User_Site'] != NULL) {
    $website = $row['User_Site'];
} else {
    $website = 'for exmple >> Powerware.site';
}
?>
<div class="modal fade" id="website" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content pb-0">
            <form class="form-group pt-3 mb-0 container" action="<?= ($_SERVER['PHP_SELF']) ?>" method="POST">
                <input type="url" name="webUrl" class="w-100 my-3" placeholder="<?= ($website) ?>"/>
                <input type="submit" name="website" value="اضغط للرفع" class="btn btn-secondary btn-lg btn-block mt-3 mb-3 rounded-0">
            </form>
        </div>
    </div>
</div>
<!-- End WebSite Model -->
<!-- Start Paybal Model -->
<?php
if ($row['User_paypal'] != NULL) {
    $paybal = $row['User_paypal'];
} else {
    $paybal = 'for exmple >> Power@power.power';
}
?>
<div class="modal fade" id="paybal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content pb-0">
            <form class="form-group pt-3 mb-0 container" action="<?= ($_SERVER['PHP_SELF']) ?>" method="POST">
                <input type="email" name="paybalUrl" class="w-100 my-3" placeholder="<?= ($paybal) ?>"/>
                <input type="submit" name="paybal" value="اضغط للرفع" class="btn btn-secondary btn-lg btn-block mt-3 mb-3 rounded-0">
            </form>
        </div>
    </div>
</div>
<!-- End WebSite Model -->
<!-- End Modals -->
<?php
include $tempDir . 'footer.php';
ob_end_flush();
?>
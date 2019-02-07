<?php 

    session_start();

    include 'init.php';

    $pageTitle = 'الاعمال السابقه';

    include $tempDir . 'header.php';

    if(isset($_GET['prot'])){
        if(!empty($_GET['prot'])){
            if(cheak('`User_id`', '`users`', '`User_id` = "' . $_GET['prot'] .'"')){
                $stmt = $con->prepare("SELECT * FROM `portfoilo` WHERE `PortfoiloUser` = '" . $_GET['prot']. "'");
                $stmt->execute();
                $portfoilo = $stmt->fetchAll();
                foreach ($portfoilo as $x) {
                    ?>


<?php
                }
            }else {
                //RED
            }
        }else {
            //RED
        }
    }elseif(isset($_GET['work'])){
        if(!empty($_GET['work'])){
            if(cheak('*', '`portfoilo`', '`PortfoiloID` = "' . $_GET['work'] .'"')){
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
                <h1 class="bg-color-9 font-700 font-color-2 mt-4 px-3 py-2 f-24 pr-5 mb-0"><?=($work['PortfoiloTitle'])?></h1>
            </div>
            <div class="col-12 mb-3">
                <img src="upload/port/<?=($work['PortfoiloImg'])?>" class="w-100 h-max-600">
            </div>
            <div class="col-12 col-md-3">
                <div class="row">
                   <div class="col-12 mb-3">
                       <h4 class="font-color-3 py-2">تفاصيل المشروع</h4>
                       <h6 class="font-color-3 py-2 ">بواسطه : <a href="profile.php?user=<?= ($work['PortfoiloUser']) ?>"><?=($user['User_name'])?></a></h6>
                       <h6 class="font-color-3 py-2 ">تاريخ العمل : <?=($work['PortfoiloDate'])?></h6>
                       <h6 class="font-color-3 py-2 ">رابط المشروع : <a href="<?=($work['PortfoiloUrl'])?><"><?=($work['PortfoiloUrl'])?></a></h6>
                       <?php if (isset($_SESSION['Username'])) { if($work['PortfoiloUser'] == $_SESSION['ID']) { ?>
                       <a href="#" class="btn btn-dark">تعديل</a>
                       <a href="#" class="btn btn-danger">حذف</a>
                       <?php }} ?>
                   </div>
                </div>
            </div>
            <div class="col-12 col-md-9">
            <p><?=($work['PortfoiloDes'])?></p>
            </div>
        </div>
    </div>
</div>
        <?php
            }else{
                //RED
            }
        }else {
            //RED
        }
    }elseif(isset($_GET['do'])){

        if (isset($_SESSION['Username'])) {

		if ($_GET['do'] == 'add') {
?>
<header id='fullHeader'>
    <div class="over"></div>
    <div class="container pt-5 position-relative">
        <h2 class="bg-color-3 d-inline-block mx-5 px-4 py-2 f-30 font-cairo text-light">اضافه مشروع جديد</h2>
        <div class="row justify-content-center mt-3">
            <form class="login col-lg-6 col-sm-12 col-xs-12 d-block p-5 mt-5 rounded mb-5" action="?do=Insert" method="POST">
                <div class="form-group pt-3 pb-2">
                    <input type="text" name="adsName" required class="form-control rounded-0 px-3 py-3 font-cairo" placeholder="عنوان المشروع">
                </div>
                <h4>صوره المشروع</h4>
                <div class="form-group pt-3 mb-4">
                    <input type="file" name="file" id="file" class="input-file">
                    <label for="file" class="btn btn-tertiary js-labelFile w-100 ">
                        <i class="icon fa fa-check"></i>
                        <span class="js-fileName">اختر ملف للرفع</span>
                    </label>
                </div>
                <input type="submit" value="انشر الأن" name="add" class="btn btn-danger d-block w-100 mb-0 py-2 font-cairo f-18">
                <div class="form-group pt-4">
                    <textarea required name="det" class="form-control rounded-0 px-3 py-3 font-cairo h-500" placeholder="تفاصيل المشروع"></textarea>
                </div>
                <div class="form-group pt-3 pb-2">
                    <input type="date" name="date" required class="form-control rounded-0 px-3 py-3 font-cairo" placeholder="المزانيه المتوقعه" min="10" max="5000">
                </div>
                
            </form>
        </div>
    </div>
</header>
<?php

		} elseif ($_GET['do'] == 'insert') {


		} elseif ($_GET['do'] == 'edit') {


		} elseif ($_GET['do'] == 'update') {


		} elseif ($_GET['do'] == 'delete') {


		} else {
            //RED
        }
    }

    }else {
        //RED
    }
?>
<?php
    include $tempDir . 'footer.php';
?>
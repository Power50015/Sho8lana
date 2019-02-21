<?php 

    session_start();

    include 'init.php';

    $pageTitle = 'الصفحة الشخصية';

    include $tempDir . 'header.php';

    
?>
<header id='fullHeader'>
    <div class="over"></div>
</header>
<section class="personal-info bg-color-8 py-5">
    <div class="container">
        <div class="row px-5 mb-0">
            <!--Start Name Section -->
            <div class="col-lg-8 col-sm-12  text-sm-center text-lg-left" data-toggle="modal" data-target="#personal-name">
                
                <p  class="hover2 bg-color-2 d-block rounded font-700 font-color-2  p-4 pb-0 text-center"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                <h2 class="bg-color-9 d-inline-block font-700 font-color-2 mt-4 mb-lg-0 mb-4 px-4 py-2"> الشهادات </h2>
                <div class="mt-2">
                <a href="" class="font-color-3 font-700 f-18 ">عرض الكل</a> 
                </div>
            </div>
            
            <!--End Name Section -->
            <!--Start Img Section -->
            <div class="personal-img position-relative col-lg-3 col-sm-12 p-0 mr-lg-4" data-toggle="modal" data-target="#personal-img">
                <div class="over h-100"></div>
                <img src="<?= ($_SESSION['ProfileImg']) ?>" class="rounded w-100 h-100 position-relative" alt="...">
            </div>
            <!--End Img Section -->
        </div>
        
    </div>
</section>


<div class="container">
<div class="row px-5 mb-0 ">
    <div class="col-lg-8  col-sm-12 ">
        
        <div class="row justify-content-center ">
       <?php 
            $stmt = $con->prepare("SELECT * FROM `cert` WHERE `CertUser` = '" .$_SESSION['ID'] . "' LIMIT 4");
            $stmt->execute();
            $certs = $stmt->fetchAll();
            foreach ($certs as $x) {
       ?>
           <div class="col-sm-4 col-12 mb-2">
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
         
        <h2 class="bg-color-9 d-inline-block font-700 font-color-2 mt-4 mb-lg-0 mb-4 px-4 py-2"> المهارات  </h2>
            <div class="mt-2">
            <a href="" class="font-color-3 font-700 f-18 ">عرض الكل</a> 
            </div>

   </div>
    <div class="col-lg-3 col-sm-12">
        <h2 class="hover2  font-color-2   bg-color-2 px-4 font-700 mb-lg-0 mb-3 px-3 py-3"><?= ($_SESSION['Username']) ?></h2>
        <h5 class="hover2  font-color-2   bg-color-2 px-4 font-700 mt-lg-4 py-3  mb-3"><i class="fas fa-tv"></i> الموقع الشخصي</h5>
        <h5 class="hover2  font-color-2   bg-color-2 px-4 font-700 mt-lg-4 py-3  mb-3"> <i class="fas fa-star"></i> تقييم  %100</h5>
        
    </div>
    </div>
</div>

<div class="container">
<div class="row px-5 mb-5 ">
    <div class="col">
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
        
        <h2 class="bg-color-9 d-inline-block font-700 font-color-2 mt-4 mb-lg-0 mb-4 px-4 py-2"> الأعمال السابقة  </h2>
            <div class="mt-2">
            <a href="" class="font-color-3 font-700 f-18 ">عرض الكل</a> 
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
</div>


<?php
    include $tempDir . 'footer.php';
?>
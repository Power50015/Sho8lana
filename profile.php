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
            <h2 class="bg-color-9 d-inline-block font-700 font-color-2 mt-4 mb-lg-0 mb-4 px-4 py-2">المهارات</h2><br>  
            <a href="" class="font-color-3 font-700 f-18 ">عرض الكل</a>    
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


<?php
    include $tempDir . 'footer.php';
?>
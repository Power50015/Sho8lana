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
            
            <div class="col-lg-8 col-sm-12  text-sm-center text-lg-left" data-toggle="modal" data-target="#personal-name">
                
                <p  class="hover2 bg-color-2 d-block rounded font-700 font-color-2  p-4 pb-0 text-center"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                <h2 class="bg-color-9 d-inline-block font-700 font-color-2 mt-4 mb-lg-0 mb-4 px-4 py-2"> الشهادات </h2>
                <div class="mt-2">
                <a href="" class="font-color-3 font-700 f-18 ">عرض الكل</a> 
                </div>
            </div>
            
            
           
            <div class="personal-img position-relative col-lg-3 col-sm-12 p-0 mr-lg-4" data-toggle="modal" data-target="#personal-img">
                <div class="over h-100"></div>
                <img src="upload\2.jpg" class="rounded w-100 h-100 position-relative" alt="...">
            </div>
           
        </div>
        
    </div>
</section>


<div class="container">
<div class="row px-5 mb-0 ">
    <div class="col-lg-8  col-sm-12 ">
    
        
         
        <h2 class="bg-color-9 d-inline-block font-700 font-color-2 mt-4 mb-lg-0 mb-4 px-4 py-2"> المهارات  </h2>
            <div class="mt-2">
            <a href="" class="font-color-3 font-700 f-18 ">عرض الكل</a> 
            </div>

   </div>
    <div class="col-lg-3 col-sm-12">
        <h2 class="hover2  font-color-2   bg-color-2 px-4 font-700 mb-lg-0 mb-3 px-3 py-3">Nora Emam</h2>
        <h5 class="hover2  font-color-2   bg-color-2 px-4 font-700 mt-lg-4 py-3  mb-3"><i class="fas fa-tv"></i> الموقع الشخصي</h5>
        <h5 class="hover2  font-color-2   bg-color-2 px-4 font-700 mt-lg-4 py-3  mb-3"> <i class="fas fa-star"></i> تقييم  %100</h5>
        
    </div>
    </div>
</div>

<div class="container">
<div class="row px-5 mb-5 ">
    <div class="col">
        <div class="row">
            <div class="col-2">
                <img src="upload\skills\php.jpg" class="rounded w-100 h-100 position-relative" alt="...">
            </div>
            <div class="col-2">
                <img src="upload\skills\js.jpg" class="rounded w-100 h-100 position-relative" alt="...">
            </div>
            <div class="col-2">
                <img src="upload\skills\joomla.jpg" class="rounded w-100 h-100 position-relative" alt="...">
            </div>
            <div class="col-2">
                <img src="upload\skills\html.jpg" class="rounded w-100 h-100 position-relative" alt="...">
            </div>
        </div>
       
        <h2 class="bg-color-9 d-inline-block font-700 font-color-2 mt-4 mb-lg-0 mb-4 px-4 py-2"> الأعمال السابقة  </h2>
            <div class="mt-2">
            <a href="" class="font-color-3 font-700 f-18 ">عرض الكل</a> 
            </div>
       
    </div>
</div>


<?php
    include $tempDir . 'footer.php';
?>
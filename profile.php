<?php 

    session_start();

    include 'init.php';

    $pageTitle = 'الصفحة الشخصية';

    include $tempDir . 'header.php';

    
?>
<header id='fullHeader'>
    <div class="over"></div>
</header>
<section class="main py-5">
    <div class="container">
        <div class="row px-5 mb-0">
            
            <div class="col-lg-8 col-sm-12  text-sm-center text-lg-left" data-toggle="modal" data-target="#personal-name">
                
                <p  class="hover2 bg-color-2 d-block rounded font-700 font-color-2  p-4 pb-0 text-center"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                <h2 class="bg-color-9 d-inline-block font-700 font-color-2 mt-5 mb-lg-0 mb-4 px-4 py-2"> الشهادات </h2>
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

<section>
<div class="container">
<div class="row px-5 mb-0 ">
    <div class="col-lg-8  col-sm-12 ">
        
           <div class="row">
            <div class="col-5">
                <img src="upload\cert\1_iS3XhLC8QzdOG8eyHtRG2Q.png" class="rounded w-100 h-100 position-relative" alt="...">
            </div>
            <div class="col-5">
                <img src="upload\cert\aEjyMx7KrJ_certificate.jpg" class="rounded w-100 h-100 position-relative" alt="...">
            </div>
           
           
        </div>
        
         
        

   </div>
    <div class="col-lg-3 col-sm-12">
        <h2 class="hover2  font-color-2   bg-color-2 px-4 font-700 mb-lg-0 mb-3 py-3">Nora Emam</h2>
        <div class="mt-4  ">
        <a type="link" class="hover2  font-color-2 f-20 text-white  bg-color-2 px-4 font-700  py-3" data-toggle="modal" data-target="#exampleModal">
        <i class="fas fa-tv"></i>   الموقع الشخصي
        </a>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <input type="text" class="form-control" placeholder="/http://powerware.site" aria-label="/http://powerware.site" aria-describedby="basic-addon1">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary "  data-dismiss="modal"> اضغط للرفع </button>
      </div>
    </div>
  </div>
</div>
        
        </div>   
    
                  
        <h5 class="hover2  font-color-2   bg-color-2 px-4 font-700 mt-lg-4 py-3  mb-3"> <i class="fas fa-star"></i> تقييم  %100</h5>
        
    </div>
    </div>
</div>
</section>
<section>
<div class="container">
<div class="row px-5 mb-5 ">
    <div class="col">
        <h2 class="bg-color-9 d-inline-block font-700 font-color-2 mt-4 mb-lg-0 mb-4 px-4 py-2"> المهارات  </h2>
            <div class="mt-2">
            <a href="" class="font-color-3 font-700 f-18 ">عرض الكل</a> 
            </div>
        <div class="row mt-3">
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
            <div class="col-2">
                <img src="upload\skills\css.jpg" class="rounded w-100 h-100 position-relative" alt="...">
            </div>
        </div>
       
        <h2 class="bg-color-9 d-inline-block font-700 font-color-2 mt-5 mb-lg-0 mb-4 px-4 py-2"> الأعمال السابقة  </h2>
            <div class="mt-2">
            <a href="" class="font-color-3 font-700 f-18 ">عرض الكل</a> 
            </div>
        
            <div class="row mt-3 mb-5">
            <div class="col-3 ">
                <img src="upload\port\sRIB63W76n_3.jpg" class="rounded w-100 h-100 position-relative" alt="...">
                <h6 class="hover font-color-2 bg-color-9 px-4 font-700  py-3 text-center mb-3">  تصميم business card </h6>
            </div>
            <div class="col-3 ">
                <img src="upload\port\nMNMlUSB2T_M.jpg" class="rounded w-100 h-100 position-relative" alt="...">
                <h6 class="hover font-color-2 bg-color-9 px-4 font-700  py-3 text-center mb-3"> تصميم فلاير وبورشور  </h6>
            </div>
            <div class="col-3 ">
                <img src="upload\port\1st8t43VcK_5.jpg" class="rounded w-100 h-100 position-relative" alt="...">
                <h6 class="hover font-color-2 bg-color-9 px-4 font-700  py-3 text-center mb-3">  تصميم business card </h6>
            </div>
             <div class="col-3 ">
                <img src="upload\port\1W98zV3mt2_3s0xYRTHjG_402813-Zs0Y8-1531561227-Login-Form-1.0.png" class="rounded w-100 h-100 position-relative" alt="...">
                <h6 class="hover font-color-2 bg-color-9 px-4 font-700  py-3 text-center mb-3">  تصميم website </h6> 
            </div>
           
        </div>
            

       
    </div>
</div>
    </div>
</section>

<?php
    include $tempDir . 'footer.php';
?>
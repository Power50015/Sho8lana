<?php 

    session_start();

    include 'init.php';

    $pageTitle = 'تواصل معنا ';

    include $tempDir . 'header.php';

    
?>
<header class="d-flex h-500">
    <div class="over"></div>
    <div class="container position-relative align-self-center text-center">
        <h1 class="d-inline font-color-2 bg-color-6 px-4 font-700">معلومات عنا  </h1> 
    </div>
</header>

<!-- information about us-->
<section class="bg-color-7">
<div class="container ">
<div class="row ">
 <h2 class="bg-color-3 d-inline-block mt-5 px-3 py-1 f-30 font-cairo text-light">نشكركم علي العمل معنا </h2>
</div>
<div class="row mt-5 ">
    <div class="col-lg-8 col-sm-12 ">
    
    <h5> .هذا عبارة عن مشروع تخرج مقدم كمتطلب لنيل درجة البكالريوس.هذا عبارة عن مشروع تخرج مقدم كمتطلب لنيل درجة البكالريوس</h5>
    
    </div>
    <div class="col-lg-3 col-sm-12  mb-5">
        <input type="submit" value="تواصل معنا "  name="contact us" class="bg-color-3 d-inline-block px-3 py-1 f-30 font-cairo text-light">
    </div>
    </div>
</div>

</section>

<!-- start owl-carosel-->
<section class="bg-color-12">
<div class="container">
     <h2 class="bg-color-3 d-inline-block mt-5 px-3 py-1 f-30 font-cairo text-light"> الفريق </h2>
    
    
<div class="owl-carousel owl-theme ">
    
    <div class="item">
        <div class="card" style="">
        <img src="upload\1.jpg" class="card-img-top" alt="">
        <div class="card-body text-center bg-color-11">
        <h5 class="card-title">محمد مصطفي </h5>
        <p class="card-text">مبرمج</p>
        </div>
        </div>
    </div>
    
     <div class="item">
        <div class="item">
        <div class="card" style="width: 18rem;">
        <img src="upload\7.jpg" class="card-img-top" alt="">
        <div class="card-body text-center bg-color-11">
        <h5 class="card-title">فوزية محمد </h5>
        <p class="card-text">مصممة مواقع </p>
        </div>
        </div>
    </div>
    
    </div>
    
    <div class="item">
        <div class="card" style="width: 18rem;">
        <img src="upload\3.jpg" class="card-img-top" alt="">
        <div class="card-body text-center bg-color-11">
        <h5 class="card-title">محمد عاطف </h5>
        <p class="card-text">مصمم</p>
        </div>
        </div>
    </div>
    
   
        <div class="item">
        <div class="card" style="width: 18rem;">
        <img src="upload\4.jpg" class="card-img-top" alt="">
        <div class="card-body text-center bg-color-11">
        <h5 class="card-title">مصطفي محمود </h5>
        <p class="card-text">محلل مواقع</p>
        </div>
        </div>
        </div>
   
    
   
        <div class="item">
        <div class="card" style="width: 18rem;">
        <img src="upload\5.jpg" class="card-img-top" alt="">
        <div class="card-body text-center bg-color-11">
        <h5 class="card-title">ايثاراحمد  </h5>
        <p class="card-text">مصممة مواقع </p>
        </div>
        </div>
        </div>
   
    
    
        <div class="item">
        <div class="card" style="width: 18rem;">
        <img src="upload\6.jpg" class="card-img-top" alt="">
        <div class="card-body text-center bg-color-11">
        <h5 class="card-title"> اسراء محمود </h5>
        <p class="card-text">محلله مواقع </p>
        </div>
        </div>
        </div>
    
    
     <div class="item">
        <div class="card" style="width: 18rem;">
        <img src="upload\2.jpg" class="card-img-top" alt="">
        <div class="card-body text-center bg-color-11">
        <h5 class="card-title">نورهان امام </h5>
        <p class="card-text">مصممة مواقع </p>
        </div>
        </div>
    </div>   
   
        
    
</div>
    <div class="row justify-content-center ml-5">
    <div class="col-6 ">
    <input type="submit" value="تواصل معنا " name="login" class="btn btn-danger d-block w-50 mb-3 py-2 font-cairo f-18 " >
    </div> 
    </div>
        </div>
</section>
<!-- end owl-carosel-->


<!-- form message -->
<section class="bg-color-8">
<div class="container">
     <h2 class="bg-color-3 d-inline-block mt-5 px-3 py-1 f-30 font-cairo text-light"> لإرسال رسالة  </h2>
<form >
<div class="row ml-5 mt-5">
    <div class="col-5">
    <input type="name" name="name" required class="bg-color-12 form-control rounded-0 px-3 py-3 f-18 font-cairo text-white" aria-describedby="nameHelp" placeholder="الأسم ">
    </div>
    <div class="col-5">
    <input type="email" name="email" required class="bg-color-12 form-control rounded-0 px-3 py-3 font-cairo f-18 text-white" aria-describedby="emailHelp" placeholder="البريد الإلكتروني ">
    </div>
</div>
<div class="row ml-5 mt-5">
    <div class="col-10">
    <textarea class="bg-color-12 form-control rounded-0 px-3 py-3 font-cairo f-18 text-white " aria-label="massage" placeholder="رسالة "></textarea> 
</div>
    </div>
<div class="row justify-content-center ml-5 mt-5">
    <div class="col-6">
    <input type="submit" value="إرسال" name="login" class="btn btn-danger d-block w-50 mb-3 py-2 font-cairo f-18 " >
</div>
    </div>
    </form>
    </div>
</section>
<!-- end form -->
<?php
    include $tempDir . 'footer.php';
?>
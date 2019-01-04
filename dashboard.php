<?php 

    session_start();

    include 'init.php';

    $pageTitle = 'الرئيسيه';
    
    include $tempDir . 'header.php';

    if (! isset($_SESSION['Username'])) {
        header('Location: login.php'); // Redirect To Dashboard Page
        exit();
    }

?>
<header class="d-flex h-500">
    <div class="over"></div>
    <div class="container position-relative align-self-center text-center">
        <h1 class="d-inline font-color-2 bg-color-6 px-4 font-700">لوحة التحكم</h1> 
    </div>
</header>
<!--Start info Section -->
<section class="personal-info py-5">
    <div class="container">
        <div class="row px-5 mb-0">
           <!--Start Img Section -->
            <div class="personal-img position-relative col-lg-3 col-sm-12 p-0 mr-lg-4" data-toggle="modal" data-target="#personal-img">
                <div class="over h-100"></div>
                <img src="upload/1.jpg" class="rounded w-100 h-100 position-relative" alt="...">
            </div>
            <!--End Img Section -->
            <!--Start Name Section -->
            <div class="col-lg-8 col-sm-12 mt-5 text-sm-center text-lg-left" data-toggle="modal" data-target="#personal-name">
                <h2 class="hover bg-color-2 d-inline rounded font-700 font-color-2 mb-lg-0 mb-4 px-3 py-1">محمد مصطفي</h2>
                <p  class="hover bg-color-2 d-block rounded font-700 font-color-2 mt-4 p-4 pb-0 text-center">نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي </p>
            </div>
            <!--End Name Section -->
        </div>
        <div class="row justify-content-between">
           <!--Start Btns Section -->
            <div class="hover col-lg-3 col-sm-12 font-color-2 bg-color-3 px-4 font-700 mt-lg-5 py-3 text-center mb-3" data-toggle="modal" data-target="#website">
                الموقع الشخصي
            </div>
            <!--End Btns Section -->
            <!--Start Btns Section -->
            <div class="hover col-lg-3 col-sm-12 font-color-2 bg-color-3 px-4 font-700 mt-lg-5 py-3 text-center mb-3" data-toggle="modal" data-target="#paybal">
                paybal
            </div>
            <!--End Btns Section -->
            <!--Start Btns Section -->
            <a href="#" class="hover col-lg-3 col-sm-12 font-color-2 bg-color-3 px-4 font-700 mt-lg-5 py-3 text-center d-block mb-3">
                الرصيد
            </a>
            <!--End Btns Section -->
        </div>
    </div>
</section>
<!--End info Section -->
<!--Start certfcate Section -->
<section class="h-200 w-100 bg-color-7"></section>
<!--End certfcate Section -->


<!-- Start Modals -->

<!-- Start personal-img Model -->
<div class="modal fade" id="personal-img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content pb-0">
            <img src="upload/1.jpg" class="w-100" alt="your Img">
            <form class="form-group pt-3 mb-0">
                <input type="file" name="file" id="file" class="input-file">
                <label for="file" class="btn btn-tertiary js-labelFile">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName">اختر الصوره للرفع</span>
                </label>
                <input type="submit" name="submit" value="اضغط للرفع" class="btn btn-secondary btn-lg btn-block mt-3 mb-0 rounded-0">
            </form>
        </div>
    </div>
</div>
<!-- End personal-img Model -->

<!-- Start personal-img Model -->
<div class="modal fade" id="personal-name" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content pb-0">
            <form class="form-group pt-3 mb-0 container">
               <input type="name" name="username" class="w-100  my-3" placeholder="اضف اسمك هنا" required/>
                <textarea class="w-100 h-500 my-4" placeholder="اضف نبذه شخصيه عنك"></textarea>
                <input type="submit" name="submit" value="اضغط للرفع" class="btn btn-secondary btn-lg btn-block mt-3 mb-3 rounded-0">
            </form>
        </div>
    </div>
</div>
<!-- End personal-img Model -->

<!-- Start WebSite Model -->
<div class="modal fade" id="website" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content pb-0">
            <form class="form-group pt-3 mb-0 container">
                <input type="url" name="website" class="w-100 my-3" placeholder="for exmple >> Powerware.site "/>
                <input type="submit" name="submit" value="اضغط للرفع" class="btn btn-secondary btn-lg btn-block mt-3 mb-3 rounded-0">
            </form>
        </div>
    </div>
</div>
<!-- End WebSite Model -->
<!-- Start Paybal Model -->
<div class="modal fade" id="paybal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content pb-0">
            <form class="form-group pt-3 mb-0 container">
                <input type="email" name="paybal" class="w-100 my-3" placeholder="for exmple >> Power@power.power "/>
                <input type="submit" name="submit" value="اضغط للرفع" class="btn btn-secondary btn-lg btn-block mt-3 mb-3 rounded-0">
            </form>
        </div>
    </div>
</div>
<!-- End WebSite Model -->

<!-- End Modals -->
<?php
    include $tempDir . 'footer.php';
?>
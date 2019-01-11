<?php 

    session_start();

    if (isset($_SESSION['Username'])) {
        header('Location: dashboard.php'); // Redirect To Dashboard Page
        exit();
    }

    include 'init.php';

    $pageTitle = 'الرئيسيه';
    
    include $tempDir . 'header.php';

?>
<!-- But Your Code Here -->
<!-- Start The Header Section -->
<header id='fullHeader'>
    <div class="over"></div>
    <div class="container position-relative d-flex align-items-center font-cairo">
        <h1 class="font-color-2 f-70 font-700" id="typed"></h1>
    </div>
</header>
<!-- End The Header Section -->
<!-- Start Search Bar Section -->
<section class=" container">
    <form class="bg-color-10 py-3 mb-5 rounded" id="indexSearch">
        <h2 class="text-center font-700 font-color-2 font-700 f-30 mb-5"><span class="font-color-1 f-48">إبحث</span> عن خدمات لتنجزها</h2>
        <div class="row">
            <div class="col-1"></div>
            <select required class="btn text-white bg-color-2 w-100 font-cairo f-18 col-4" id="inlineFormCustomSelectPref">
                <option selected disabled>أختر القسم </option>
                <option value="1">برمجه</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <div class="col-6">
                <input type="submit" value="إبحث" name="signup" class="btn text-white bg-color-2 w-100 font-cairo f-24">
            </div>
            <div class="col-1"></div>
        </div>
    </form>
</section>
<!-- End Search Bar Section -->
<!-- Start About Section -->
<section class="of-y-x">
    <div class=" container">
        <h2 class="bg-color-9 d-inline-block font-700 font-color-2 mb-5 mb-4 px-3 py-2 f-24 pr-5">لماذا نحن</h2>
        <div class="row">
            <div class="col-md-8 col-sm-12 mt-3">
                <div class="row">
                    <div class="col-lg-6 col-sm-12 p-0 font-color-3 text-center">
                        <div class="bg-color-11 m-1 p-2">
                            <div class="py-3"><i class="fas fa-walking f-30 border1 rounded-circle px-3 py-2"></i></div>
                            <h5 class="f-18 font-700">نفذ مشاريعك بسهوله </h5>
                            <p class="f-18">اطرح مشروعك واترك مهمة تنفيذه لأفضل خبراء الوطن العرب</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 p-0 font-color-3 text-center">
                        <div class="bg-color-11 m-1 p-2">
                            <div class="py-3"><i class="fas fa-handshake f-30 border1 rounded-circle px-3 py-2"></i></div>
                            <h5 class="f-18 font-700"> وظف افضل المستقلين </h5>
                            <p class="f-18">زر ملفات المستقلين ,اطلع علي أعمالهم السابقة وظف الافضل </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-12 mb-5 p-0 font-color-3 text-center">
                        <div class="bg-color-11 m-1 p-2">
                            <div class="py-3"><i class="fab fa-amazon-pay f-30 border1 rounded-circle px-3 py-2"></i></div>
                            <h5 class="f-18 font-700">ادفع بكل أريحية</h5>
                            <p class="f-18"> لن تدفع سوى مقابل<br>مايتم إنجازه من وظائف</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 mb-5 p-0 font-color-3 text-center">
                        <div class="bg-color-11 m-1 p-2">
                            <div class="py-3"><i class="fas fa-fighter-jet f-30 border1 rounded-circle px-3 py-2"></i></div>
                            <h5 class="f-18 font-700">انجز أعمالك بسرعه</h5>
                            <p class="f-18">اختر أفضل المستقلين وأرسل له الوظيفة مباشرة</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-sm-none d-md-block">
                <img class="h-100 position-absolute" src="layout/img/lady.png" alt="man" draggable="false">
            </div>
        </div>
    </div>
</section>
<!-- End About Section Section -->
<!-- Start How it's Work Section Section -->
<section class="bg-color-4 how d-none d-md-block">
    <div class=" container pt-5 pb-5">
        <h2 class="bg-color-9 d-inline-block font-700 font-color-2 mb-5 mb-4 px-3 py-2 f-24 pr-5">كيف يعمل الموقع</h2>
        <div class="row position-relative">
            <div class="position-relative" id="canter-ul">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="font-color-4 my-btn" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">
                        <i class="fas fa-address-card f-30 border2 rounded-circle px-2 py-2"></i>
                    </a>
                    <a class="font-color-4 my-btn" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">
                        <i class="fas fa-calendar-plus f-30 border2 rounded-circle px-2 py-2"></i>
                    </a>
                    <a class="font-color-4 my-btn" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">
                        <i class="fas fa-clipboard-check f-30 border2 rounded-circle px-2 py-2"></i>
                    </a>
                    <a class="font-color-4 mb-5" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">
                        <i class="fas fa-diagnoses f-30 border2 rounded-circle px-2 py-2"></i>
                    </a>
                </div>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active item1" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                    <div class="mb-5 p-0 font-color-3 text-center">
                        <div class="bg-color-11 m-1 col-5 p-3 rounded">
                            <h5 class="f-20 font-700">قم بتسجيل الدخول</h5>
                            <p class="f-18">إذا كانت هذه اول مرة لك على الموقع فعليك بتسجيل الدخول لأول مره</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane position-absolute fade item2" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                    <div class="mb-5 p-0 font-color-3 text-center">
                        <div class="bg-color-11 m-1 col-5 p-3 rounded">
                            <h5 class="f-20 font-700">أضف المشروع</h5>
                            <p class="f-18">إذا كانت هذه اول مرة لك على الموقع فعليك بتسجيل الدخول لأول مره</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane position-absolute fade item3" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                    <div class="mb-5 p-0 font-color-3 text-center">
                        <div class="bg-color-11 m-1 col-5 p-3 rounded">
                            <h5 class="f-20 font-700">أختر العرض</h5>
                            <p class="f-18">إذا كانت هذه اول مرة لك على الموقع فعليك بتسجيل الدخول لأول مره</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane position-absolute fade item4" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                    <div class="mb-5 p-0 font-color-3 text-center">
                        <div class="bg-color-11 m-1 col-5 p-3 rounded">
                            <h5 class="f-20 font-700">استلم المشروع</h5>
                            <p class="f-18">إذا كانت هذه اول مرة لك على الموقع فعليك بتسجيل الدخول لأول مره</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End How it's Work Section Section -->
<section class="h-200">

</section>
<?php
    include $tempDir . 'footer.php';
?>
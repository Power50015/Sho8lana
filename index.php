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
    <form class="bg-color-10 py-3 mb-5 rounded" id="indexSearch" action="services.php?read=<?=($_GET['cats'])?>" method="get">
        <h2 class="text-center font-700 font-color-2 font-700 f-30 mb-5"><span class="font-color-1 f-48">إبحث</span> عن خدمات لتنجزها</h2>
        <div class="row">
            <div class="col-1"></div>
            <select name="cats" required class="btn text-white bg-color-2 w-100 font-cairo f-18 col-4" id="inlineFormCustomSelectPref">
                <option selected disabled>أختر القسم </option>
                <?php 
                    $stmt = $con->prepare("SELECT * FROM `cats` WHERE `CatMain` IS NULL");
                    $stmt->execute();
                    $cats = $stmt->fetchAll();
                    foreach($cats as $x) {
                        echo "<option value='" . $x['CatID'] . "'>" . $x['CatName'] . "</option>";
                        $stmt2 = $con->prepare("SELECT * FROM `cats` WHERE `CatMain` = " . $x['CatID']);
                        $stmt2->execute();
                        $subCats = $stmt2->fetchAll();
                        foreach($subCats as $y) {
                            echo "<option value='" . $y['CatID'] . "'>  -- " . $y['CatName'] . "</option>";
                        }
                    }

                ?>
            </select>
            <div class="col-6">
                <input type="submit" value="إبحث"class="btn text-white bg-color-2 w-100 font-cairo f-24">
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
            <div class="tab-content col-4 offset-2" id="nav-tabContent">
                <div class="tab-pane fade show active item1 position-relative" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                    <div class="mb-5 p-0 font-color-3 text-center bg-color-11 m-1 col-10 p-3 rounded">
                        <h5 class="f-20 font-700">قم بتسجيل الدخول</h5>
                        <p class="f-18">إذا كانت هذه اول مرة لك على الموقع فعليك بتسجيل الدخول لأول مره</p>
                    </div>
                </div>
                <div class="tab-pane fade item3 position-relative" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                    <div class="mb-5 p-0 font-color-3 text-center bg-color-11 m-1 col-10 p-3 rounded">
                        <h5 class="f-20 font-700">أختر العرض</h5>
                        <p class="f-18">إذا كانت هذه اول مرة لك على الموقع فعليك بتسجيل الدخول لأول مره</p>
                    </div>
                </div>
            </div>
            <div class="col-2" id="canter-ul">
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
            <div class="tab-content col-4" id="nav-tabContent">
                <div class="tab-pane fade item2 position-relative" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                    <div class="mb-5 p-0 font-color-3 text-center bg-color-11 m-1 col-10 p-3 rounded">
                        <h5 class="f-20 font-700">أضف المشروع</h5>
                        <p class="f-18">إذا كانت هذه اول مرة لك على الموقع فعليك بتسجيل الدخول لأول مره</p>
                    </div>
                </div>
                <div class="tab-pane fade item4 position-relative" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                    <div class="mb-5 p-0 font-color-3 text-center bg-color-11 m-1 col-10 p-3 rounded">
                        <h5 class="f-20 font-700">استلم المشروع</h5>
                        <p class="f-18">إذا كانت هذه اول مرة لك على الموقع فعليك بتسجيل الدخول لأول مره</p>
                    </div>
                </div>
            </div>
            <a href="sing.php" class="btn btn-lg btn-block mt-3 mb-0 font-color-2 bg-color-3 hover">سجل دخولك لاول مره الان من هنا</a>
        </div>
    </div>
</section>
<!-- End How it's Work Section Section -->
<!-- Start Offers Section Section -->
<section class="index-offers font-color-3">
    <div class=" container pt-5">
        <h2 class="bg-color-9 d-inline-block font-700 font-color-2 mb-3 mb-4 px-3 py-2 f-24 pr-5">اجدد المشاريع</h2>
        <p>تصفح مشاريعك و اضف عروضك على المشروع المناسب لك</p>
        <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active f-20" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">برمجه</a>
            </li>
            <li class="nav-item">
                <a class="nav-link f-20" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">ترجمه</a>
            </li>
            <li class="nav-item">
                <a class="nav-link f-20" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">تسويق</a>
            </li>
        </ul>
        <div class="tab-content bg-color-7 mb-5" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row pt-3">
                    <div class="col-md-7 col-sm-10 offset-md-1">
                        <a href="#"><h3 class="pl-3 font-700">تصميم موقع تجارى</h3></a>
                        <h6 class="d-inline-block pl-3 font-700"><i class="far fa-grin-wink"></i> يوسف جو</h6>
                        <h6 class="d-inline-block ml-4 font-700"><i class="far fa-clone"></i> 3 عروض</h6>
                        <p class="w-100 bg-color-8 mt-3">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف</p>
                    </div>
                    <div class="col-3 order-img d-md-block d-none">
                        <img class="w-100 mx-4 rounded-circle" src="upload/3c1f3f3aead0ac7e009ee9952e131647.png">
                    </div>
                </div>
                <hr class="m-5">
                <div class="row pt-3">
                    <div class="col-md-7 col-sm-10 offset-md-1">
                        <a href="#"><h3 class="pl-3 font-700">تصميم موقع تجارى</h3></a>
                        <h6 class="d-inline-block pl-3 font-700"><i class="far fa-grin-wink"></i> يوسف جو</h6>
                        <h6 class="d-inline-block ml-4 font-700"><i class="far fa-clone"></i> 3 عروض</h6>
                        <p class="w-100 bg-color-8 mt-3">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف</p>
                    </div>
                    <div class="col-3 order-img d-md-block d-none">
                        <img class="w-100 mx-4 rounded-circle" src="upload/3c1f3f3aead0ac7e009ee9952e131647.png">
                    </div>
                </div>
                <hr class="m-5">
                <div class="row pt-3">
                    <div class="col-md-7 col-sm-10 offset-md-1">
                        <a href="#"><h3 class="pl-3 font-700">تصميم موقع تجارى</h3></a>
                        <h6 class="d-inline-block pl-3 font-700"><i class="far fa-grin-wink"></i> يوسف جو</h6>
                        <h6 class="d-inline-block ml-4 font-700"><i class="far fa-clone"></i> 3 عروض</h6>
                        <p class="w-100 bg-color-8 mt-3">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف</p>
                    </div>
                    <div class="col-3 order-img d-md-block d-none">
                        <img class="w-100 mx-4 rounded-circle" src="upload/3c1f3f3aead0ac7e009ee9952e131647.png">
                    </div>
                </div>
                <hr class="mx-5 mb-0 pb-0">
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
        </div>
        <a href="sing.php" class="btn btn-lg btn-block mt-3 mb-5 text-white bg-color-3 hover">تصفح جميع المشاريع</a>
    </div>
</section>
<!-- End Offers Section Section -->
<?php
    include $tempDir . 'footer.php';
?>
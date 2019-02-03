<?php 

    session_start();

    include 'init.php';

    $pageTitle = 'الإعلانات';

    include $tempDir . 'header.php';

    echo $_GET['money'];
    echo "<br>";
    $_GET['money'] = str_replace("$","",$_GET['money']);
    $_GET['money'] = str_replace(" ","",$_GET['money']);
    echo "<br>";
    $pieces = explode("-", $_GET['money']);
    $num1 = $pieces[0] ;
    $pieces[0] = (int)$pieces[0];
    var_dump($pieces[0]);
?>
<header class="d-flex h-500">
    <div class="over"></div>
    <div class="container position-relative align-self-center text-center">
        <h1 class="d-inline font-color-2 bg-color-6 px-4 font-700">تصفح الإعلانات</h1>
    </div>
</header>
<main class="bg-color-7 services">
    <div class="container">
        <div class="row">
            <aside class="col-md-4 col-12 my-5">
                <div class="rounded bg-color-2 text-center pt-5">
                    <h3 class="d-inline-block font-color-2 bg-color-9 px-4 py-2 font-700 mb-5">الأقسام</h3>
                    <form id="accordion" action="?<?=($_GET['cats'])?>" method="GET">
                        <div class="card-header border-0" id="headingOne">
                            <h5 class="mb-0">
                                <a class="font-color-2 rounded f-18 bg-color-3 px-5 font-700 hover" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" href="#">
                                    برمجه
                                    <i class="fas fa-caret-down"></i></a>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="cats[]" value="1" id="defaultCheck1">
                                    <label class="form-check-label font-color-4" for="defaultCheck1">
                                        Default checkbox
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="cats[]" value="2" id="defaultCheck2">
                                    <label class="form-check-label font-color-4" for="defaultCheck2">
                                        Default checkbox
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-header border-0" id="headingTwo">
                            <h5 class="mb-0">
                                <a class="font-color-2 rounded f-18 bg-color-3 px-5 font-700 hover collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" href="#">
                                    Collapsible
                                    <i class="fas fa-caret-down"></i></a>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                Anim
                            </div>
                        </div>
                        <div class="card-header border-0" id="headingThree">
                            <h5 class="mb-0">
                                <a class="font-color-2 rounded f-18 bg-color-3 px-5 font-700 hover collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" href="#">
                                    Collapsibl3
                                    <i class="fas fa-caret-down"></i></a>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                sustainable .
                            </div>
                        </div>

                        <h6 class="font-color-1 pt-3">مده التسليم</h6>
                        <div class="text-left">
                            <div>
                                <input type="radio" id="radio00" name="time" value="0" checked />
                                <label for="radio00" class="font-cairo f-18 font-color-4">
                                    <span class="m-3"></span>أي وقت
                                </label>
                            </div>
                            <div>
                                <input type="radio" id="radio01" name="time" value="1" />
                                <label for="radio01" class="font-cairo f-18 font-color-4">
                                    <span class="m-3"></span>أقل من اسبوع
                                </label>
                            </div>
                            <div>
                                <input type="radio" id="radio02" name="time" value="2" />
                                <label for="radio02" class="font-cairo f-18 font-color-4">
                                    <span class="m-3"></span>من 1 أسبوع الى 2 اسبوع
                                </label>
                            </div>
                            <div>
                                <input type="radio" id="radio03" name="time" value="3" />
                                <label for="radio03" class="font-cairo f-18 font-color-4">
                                    <span class="m-3"></span>من 2 أسبوع الى شهر
                                </label>
                            </div>
                            <div>
                                <input type="radio" id="radio04" name="time" value="4" />
                                <label for="radio04" class="font-cairo f-18 font-color-4">
                                    <span class="m-3"></span>من شهر الى 3 شهور
                                </label>
                            </div>
                            <div>
                                <input type="radio" id="radio05" name="time" value="5" />
                                <label for="radio05" class="font-cairo f-18 font-color-4">
                                    <span class="m-3"></span>أكثر من 3 شهور
                                </label>
                            </div>
                        </div>
                        <div class="sidebar_widget">
                            <h6 class="font-color-1 py-3">المبلغ المطلوب</h6>
                            <div class="price-range">
                                <ul class="p-0 px-5">
                                    <li class="range d-block">
                                        <div id="range-price" class="range-box"></div>
                                        <input dir="ltr" type="text" id="price" class="price-box font-cairo f-18 font-color-4 bg-none" readonly name="money"/>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <input type="submit" class="rounded-0 btn btn-danger d-block w-100 py-2  font-cairo f-18">
                    </form>
                </div>
            </aside>
            <section class="col-12 col-md-8 my-5">
                <a class="bg-color-2 rounded row mb-3" href="#">
                    <div class="col-md-9 col-12 pt-3">
                        <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">تطبيق متجر</h6>
                        <div>
                            <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">11-2-2019</h6>
                            <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">Ahmed bkr</h6>
                            <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">15 عرض</h6>
                        </div>
                        <p class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3">هذا النص هو مثال لنص يمكن أن يستبدل في 100 نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث ي ......</p>
                    </div>
                    <div class="col-3 h-200 py-3 d-md-block d-none">
                        <img src="upload/1.jpg" class="h-100 w-100 rounded-circle">
                    </div>
                </a>
                <a class="bg-color-2 rounded row mb-3" href="#">
                    <div class="col-md-9 col-12 pt-3">
                        <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">تطبيق متجر</h6>
                        <div>
                            <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">11-2-2019</h6>
                            <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">Ahmed bkr</h6>
                            <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">15 عرض</h6>
                        </div>
                        <p class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3">هذا النص هو مثال لنص يمكن أن يستبدل في 100 نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث ي ......</p>
                    </div>
                    <div class="col-3 h-200 py-3 d-md-block d-none">
                        <img src="upload/1.jpg" class="h-100 w-100 rounded-circle">
                    </div>
                </a>
                <a class="bg-color-2 rounded row mb-3" href="#">
                    <div class="col-md-9 col-12 pt-3">
                        <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">تطبيق متجر</h6>
                        <div>
                            <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">11-2-2019</h6>
                            <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">Ahmed bkr</h6>
                            <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">15 عرض</h6>
                        </div>
                        <p class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3">هذا النص هو مثال لنص يمكن أن يستبدل في 100 نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث ي ......</p>
                    </div>
                    <div class="col-3 h-200 py-3 d-md-block d-none">
                        <img src="upload/1.jpg" class="h-100 w-100 rounded-circle">
                    </div>
                </a>
                <a class="bg-color-2 rounded row mb-3" href="#">
                    <div class="col-md-9 col-12 pt-3">
                        <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">تطبيق متجر</h6>
                        <div>
                            <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">11-2-2019</h6>
                            <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">Ahmed bkr</h6>
                            <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">15 عرض</h6>
                        </div>
                        <p class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3">هذا النص هو مثال لنص يمكن أن يستبدل في 100 نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث ي ......</p>
                    </div>
                    <div class="col-3 h-200 py-3 d-md-block d-none">
                        <img src="upload/1.jpg" class="h-100 w-100 rounded-circle">
                    </div>
                </a>
                <a class="bg-color-2 rounded row mb-3" href="#">
                    <div class="col-md-9 col-12 pt-3">
                        <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">تطبيق متجر</h6>
                        <div>
                            <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">11-2-2019</h6>
                            <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">Ahmed bkr</h6>
                            <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">15 عرض</h6>
                        </div>
                        <p class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3">هذا النص هو مثال لنص يمكن أن يستبدل في 100 نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث ي ......</p>
                    </div>
                    <div class="col-3 h-200 py-3 d-md-block d-none">
                        <img src="upload/1.jpg" class="h-100 w-100 rounded-circle">
                    </div>
                </a>
                <a class="bg-color-2 rounded row mb-3" href="#">
                    <div class="col-md-9 col-12 pt-3">
                        <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">تطبيق متجر</h6>
                        <div>
                            <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">11-2-2019</h6>
                            <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">Ahmed bkr</h6>
                            <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">15 عرض</h6>
                        </div>
                        <p class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3">هذا النص هو مثال لنص يمكن أن يستبدل في 100 نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث ي ......</p>
                    </div>
                    <div class="col-3 h-200 py-3 d-md-block d-none">
                        <img src="upload/1.jpg" class="h-100 w-100 rounded-circle">
                    </div>
                </a>
                <a class="bg-color-2 rounded row mb-3" href="#">
                    <div class="col-md-9 col-12 pt-3">
                        <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">تطبيق متجر</h6>
                        <div>
                            <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">11-2-2019</h6>
                            <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">Ahmed bkr</h6>
                            <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">15 عرض</h6>
                        </div>
                        <p class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3">هذا النص هو مثال لنص يمكن أن يستبدل في 100 نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث ي ......</p>
                    </div>
                    <div class="col-3 h-200 py-3 d-md-block d-none">
                        <img src="upload/1.jpg" class="h-100 w-100 rounded-circle">
                    </div>
                </a>
                <a class="bg-color-2 rounded row mb-3" href="#">
                    <div class="col-md-9 col-12 pt-3">
                        <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">تطبيق متجر</h6>
                        <div>
                            <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">11-2-2019</h6>
                            <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">Ahmed bkr</h6>
                            <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">15 عرض</h6>
                        </div>
                        <p class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3">هذا النص هو مثال لنص يمكن أن يستبدل في 100 نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث ي ......</p>
                    </div>
                    <div class="col-3 h-200 py-3 d-md-block d-none">
                        <img src="upload/1.jpg" class="h-100 w-100 rounded-circle">
                    </div>
                </a>
            </section>
        </div>
    </div>
</main>
<?php
    include $tempDir . 'footer.php';
?>
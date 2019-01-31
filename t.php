<?php 

    session_start();

    include 'init.php';

    $pageTitle = 'الإعلانات';

    include $tempDir . 'header.php';

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
            <aside class="col-md-3 col-12 my-5">
                <div class="rounded bg-color-2 text-center pt-5">
                    <h3 class="d-inline-block font-color-2 bg-color-9 px-4 py-2 font-700 mb-5">الأقسام</h3>
                    <div id="accordion">
                        <div class="">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <a class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" href="#">
                                        Collapsible Group Item #1
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    VHS.
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" href="#">
                                        Collapsible Group Item #2
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    Anim
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" href="#">
                                        Collapsible Group Item #3
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                    sustainable .
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <section class="col-12 col-md-9 my-5">
                <div class="bg-color-2 rounded row mb-3 ">
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
                </div>
                <div class="bg-color-2 rounded row mb-3 ">
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
                </div>
                <div class="bg-color-2 rounded row mb-3 ">
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
                </div>
                <div class="bg-color-2 rounded row mb-3 ">
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
                </div>
                <div class="bg-color-2 rounded row mb-3 ">
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
                </div>
                <div class="bg-color-2 rounded row mb-3 ">
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
                </div>
                <div class="bg-color-2 rounded row mb-3 ">
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
                </div>
                <div class="bg-color-2 rounded row mb-3 ">
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
                </div>
            </section>
        </div>
    </div>
</main>
<?php
    include $tempDir . 'footer.php';
?>
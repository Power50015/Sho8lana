<?php 

    session_start();

    include 'init.php';

    $pageTitle = 'الإعلانات';

    include $tempDir . 'header.php';

    
?>
<header class="d-flex h-500">
    <div class="over"></div>
    <div class="container position-relative align-self-center text-left">
        <div class="d-inline-block font-color-2 bg-color-6 px-4 py-3 font-700">
            <h4 class="pb-2 font-700">شعار مشروع بتصميم مبتكر و ابداعي </h4>
            <h5 class="d-inline"><i class="fas fa-paperclip"></i> تصميم شعارات </h5>
            <h5 class="d-inline pl-3"><i class="fas fa-calendar"></i> 11-2-2019 </h5>
        </div>
    </div>
</header>
<main class="bg-color-12">
    <div class="container">
        <div class="row py-5">
            <div class="col-12 col-md-8">
                <section class="bg-color-7">
                    <div class="row py-3 text-center">
                        <div class="col-4">
                            <h6 class="text-success"><i class="fas fa-check-circle "></i> مرحله تلقي العروض</h6>
                        </div>
                        <div class="col-4">
                            <h6 class="text-info"><i class="fas fa-arrow-alt-circle-left"></i> مرحله التنفيذ</h6>
                        </div>
                        <div class="col-4">
                            <h6 class=""><i class="fas fa-dot-circle"></i> مرحله التسليم</h6>
                        </div>
                    </div>
                </section>
                <section class="mt-3 bg-color-7">
                    <h6 class="font-700 f-18 font-color-3 p-3 border-bottom border-color-1">تفاصيل المشروع</h6>
                    <p class="font-color-3 p-3">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                        إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
                        ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.
                        هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.

                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                        إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
                        ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.
                        هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.</p>
                </section>
                <section class="mt-3 bg-color-7">
                    <form>
                        <h6 class="font-700 f-18 font-color-3 p-3 border-bottom border-color-1 mb-0">اضف عرضك الأن</h6>
                        <textarea class="h-200 w-100" placeholder="اكتب عرضك هنا"></textarea>
                        <div class="form-group pt-3 pb-2">
                            <input type="number" name="salry" required class="form-control rounded-0 px-3 py-3 font-cairo" placeholder="المزانيه المتوقعه" min="10" max="5000">
                        </div>
                        <h4>مده التسليم</h4>
                        <div>
                            <input type="radio" id="radio01" name="time" value="1" checked />
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
                        <h4>ملفات توضيحيه</h4>
                        <div class="form-group pt-3 mb-4">
                            <input type="file" name="file" id="file" class="input-file">
                            <label for="file" class="btn btn-tertiary js-labelFile w-100 rounded-0">
                                <i class="icon fa fa-check"></i>
                                <span class="js-fileName">اختر ملف للرفع</span>
                            </label>
                        </div>
                        <input type="submit" value="اضف الان" name="add" class="btn btn-danger d-block w-100 mb-0 py-2 font-cairo f-18 ">
                    </form>
                    <h6 class="font-700 f-18 font-color-3 p-3 border-bottom border-color-1">العروض المقدمه</h6>
                    <div class="row p-2 border-bottom border-color-1 mb-3">
                        <div class="col-2">
                            <a class="hover2" href="#"><img class="w-100 rounded-circle" src="upload/2.jpg"></a>
                        </div>
                        <div class="col-5 mt-3">
                            <a class="hover2" href="#">
                                <h3 class="font-700 f-18 font-color-3 ">Power Mostafa </h3>
                            </a>
                           <h5 class="font-700 f-18 font-color-3">تاريخ اضافه العرض : 11-2-2019</h5>
                            <h5 class="font-700 f-18 font-color-3"> المده المتوقعه : اقل من اسبوع </h5>
                            <h5 class="font-700 f-18 font-color-3"> المبلغ المتوقع : 170$</h5>
                        </div>
                        <div class="col-5 mt-3 text-right">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">اختيار العرض </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-left">
                                            هل تريد التعاقد و اختيار العرض التالي ؟
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-primary">نعم</a>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">لا</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="font-color-3 p-3 pb-1">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                            إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
                            ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.
                            هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.

                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                            إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
                            ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.
                            هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.</p>
                    </div>
                    <div class="row p-2 border-bottom border-color-1 mb-3">
                        <div class="col-2">
                            <a class="hover2" href="#"><img class="w-100 rounded-circle" src="upload/photo_2018-12-21_17-40-36.jpg"></a>
                        </div>
                        <div class="col-5 mt-3">
                            <a class="hover2" href="#">
                                <h3 class="font-700 f-18 font-color-3 ">Power Mostafa </h3>
                            </a>
                            <h5 class="font-700 f-18 font-color-3">تاريخ اضافه العرض : 11-2-2019</h5>
                            <h5 class="font-700 f-18 font-color-3"> المده المتوقعه : اقل من اسبوع </h5>
                            <h5 class="font-700 f-18 font-color-3"> المبلغ المتوقع : 17$</h5>
                        </div>
                        <div class="col-5 mt-3 text-right">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">اختيار العرض التالى </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-left">
                                            هل تريد التعاقد و اختيار العرض التالي ؟
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-primary">نعم</a>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">لا</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="font-color-3 p-3 pb-1">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                            إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
                            ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.
                            هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.

                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                            إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
                            ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.
                            هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.</p>
                    </div>
                </section>
            </div>
            <div class="col-12 col-md-4">
                <aside class="bg-color-7 pb-3">
                    <h6 class="font-700 f-18 font-color-3 p-3 border-bottom border-color-1">تفاصيل المشروع</h6>
                    <h6 class="font-700 f-18 font-color-3  pl-1">الميزانيه $150</h6>
                    <h6 class="font-700 f-18 font-color-3 pl-1 ">مده التنفيذ 9 ايام</h6>
                    <h6 class="font-700 f-18 font-color-3 pl-1 border-bottom border-color-1 pb-2">العروض المقدمه</h6>
                    <h6 class="font-700 f-18 font-color-3 p-3 ">صاحب المشروع</h6>
                    <div class="row">
                        <div class="col-5 pl-4">
                            <a class="hover2" href="#"><img class="w-100 rounded-circle" src="upload/1.jpg"></a>
                        </div>
                        <div class="col-7 mt-3">
                            <a class="hover2" href="#">
                                <h3 class="font-700 f-18 font-color-3 ">Power Mostafa </h3>
                            </a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</main>
<?php
    include $tempDir . 'footer.php';
?>
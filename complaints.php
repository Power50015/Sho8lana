<?php 

    session_start();

    include 'init.php';

    $pageTitle = 'الشكاوي ';

    include $tempDir . 'header.php';

    
?>

<header id='fullHeader'>
    <div class="over"></div>
    <div class="container pt-5 position-relative">
        <h2 class="bg-color-3 d-inline-block px-3 py-1 f-30 font-cairo text-light"> اترك شكوي </h2> 
            <div class="row justify-content-center mt-3">
                <form class="login col-lg-6 col-sm-12 col-xs-12 d-block p-5 mt-5 rounded mb-5" >
                    <div class="form-group pt-4 pb-5 ">
                       <textarea class="form-control rounded-0 px-3 py-3 font-cairo" aria-label="massage" placeholder="رسالة "></textarea> 
                    </div>
                    <input type="submit" value="ارسال" name="login" class="btn btn-danger d-block w-100 mb-3 py-2 font-cairo f-18 " >
                </form>
            </div>
    </div>  
</header>


<?php
    include $tempDir . 'footer.php';
?>
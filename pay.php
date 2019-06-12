<?php 

    session_start();

    include 'init.php';

    $pageTitle = '';

    include $tempDir . 'header.php';

    
?>

<section class="bg-color-7 ">
<div class="container ">
<div class="row justify-content-center">
    <div class="col-5  mt-5 mb-3">
        <h6>لقد تمت عملية الدفع بنجاح  </h6>
    </div>
    </div>
    <div class="row justify-content-center">
    <div class="col-5">
     <input type="submit" value="التحويل للصفحة الرئيسية " name="login" class="btn btn-danger d-block w-50 mb-5 py-2 font-cairo f-18 " >
    </div>
    </div>
    </div>
</section>

<?php
    include $tempDir . 'footer.php';
?>
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
        <h1 class="d-inline font-cairo font-color-2 bg-color-6 px-4 font-700">لوحة التحكم</h1> 
    </div>
</header>
<section class="personal-info py-5">
    <div class="container">
        <div class="row">
            <div class="personal-img position-relative col-md-4 col-sm-12 p-0" type="button" data-toggle="modal" data-target="#personal-img">
                <div class="over h-100"></div>
                <img src="upload/1.jpg" class="rounded w-100 h-100 position-relative" alt="...">
            </div>
        </div>
    </div>
</section>
<!-- Start Modal -->
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
<!-- End Modal -->
<?php
    include $tempDir . 'footer.php';
?>
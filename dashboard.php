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
        <div class="personal-img position-relative" type="button" data-toggle="modal" data-target="#personal-img">
            <img src="upload/1.jpg" class="rounded w-100 h-100" alt="...">
        </div>
        <!-- Start Modal -->
        <div class="modal fade" id="personal-img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <img src="upload/1.jpg" class="w-100" alt="your Img">
                <form class="container mt-3">
                    <input type="file" name="fileToUpload">
                    <input type="submit" value="Upload Image" name="submit">
                </form>
            </div>
        </div>
        <!-- End Modal -->
    </div>
</section>
<?php
    include $tempDir . 'footer.php';
?>
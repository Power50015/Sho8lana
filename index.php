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
<section class="about-us">
    <form class="bg-color-10 container h-200">
        <h2 class="text-center font-700 font-color-2"><span class="font-color-1 f-30">إبحث</span> عن خدمات لتنجزها</h2>
        <div class="row">
            <input type="submit" 
            value="إبحث" 
            name="signup" 
            class="btn btn-danger d-block w-100 mb-3 py-2 font-cairo f-18" >
        </div>
    </form>
</section>
<!-- End Search Bar Section -->
<?php
    include $tempDir . 'footer.php';
?>
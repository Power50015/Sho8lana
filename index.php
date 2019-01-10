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
<?php
    include $tempDir . 'footer.php';
?>
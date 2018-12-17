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
    <header>
        <div class="over"></div>
        <div class="container position-relative">
            <div class="d-flex align-items-center"><span>إنجز</span> مشريعك </div>
        </div>
    </header>
<?php
    include $tempDir . 'footer.php';
?>
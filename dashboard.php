<?php 

    session_start();

    include 'init.php';

    $pageTitle = 'الرئيسيه';
    
    include $tempDir . 'header.php';

    if (! isset($_SESSION['Username'])) {
        header('Location: login.php'); // Redirect To Dashboard Page
        exit();
    }
    echo $_SESSION['Username'].'<br>';
    echo $_SESSION['ID'];
?>

<?php
    include $tempDir . 'footer.php';
?>
<?php 

    session_start();

    if (isset($_SESSION['Username'])) {
        header('Location: dashboard.php'); // Redirect To Dashboard Page
        exit();
    }

    include 'init.php';

    $pageTitle = 'من نحن';
    
    include $tempDir . 'header.php';

?>

<?php
    include $tempDir . 'footer.php';
?>
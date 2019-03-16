<?php 
    ob_start();
    session_start();

    include 'init.php';

    $pageTitle = 'الشكاوي ';

    include $tempDir . 'header.php';

    if (!isset($_SESSION['Username'])) { // Cheak if User is loging in Website
    header('Location: login.php'); // Redirect To Dashboard Page
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $msg = $_POST['msg'];
    do {
        $CombID = randomString(11);
    } while (cheak('`comblaint_id`', '`comblaints`', "`comblaint_id` = '$CombID'"));
    $stmt = $con->prepare("INSERT INTO `comblaints` (`comblaint_id`, `comblaint_des`, `comblaint_user`) VALUES  
    ('".$CombID."', '".$msg."','".$_SESSION['ID']."')");
    $stmt->execute();
    header('Location: complaints.php#');
    exit();
}
?>
<header id='fullHeader'>
    <div class="over"></div>
    <div class="container pt-5 position-relative">
        <h2 class="bg-color-3 d-inline-block px-3 py-1 f-30 font-cairo text-light"> اترك شكوي </h2> 
            <div class="row justify-content-center mt-3">
                <form class="login col-lg-6 col-sm-12 col-xs-12 d-block p-5 mt-5 rounded mb-5" action="<?= ($_SERVER['PHP_SELF']) ?>" method="POST">
                    <div class="form-group pt-4 pb-5 ">
                       <textarea required class="form-control rounded-0 px-3 py-3 font-cairo" aria-label="massage" placeholder="رسالة " name="msg"></textarea> 
                    </div>
                    <input type="submit" value="ارسال" name="login" class="btn btn-danger d-block w-100 mb-3 py-2 font-cairo f-18 " >
                </form>
            </div>
    </div>  
</header>
<?php
    include $tempDir . 'footer.php';
    ob_end_flush();
?>
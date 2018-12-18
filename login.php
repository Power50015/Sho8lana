<?php 

    session_start();

    if (isset($_SESSION['Username'])) {
        header('Location: dashboard.php'); // Redirect To Dashboard Page
        exit();
    }

    include 'init.php';

    $pageTitle = 'تسجيل الدخول';
    
    include $tempDir . 'header.php';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$userEmail = $_POST['email'];
		$password = $_POST['password'];
		// Check If The User Exist In Database
		$stmt = $con->prepare("SELECT 
									`User_id`, `name`
								FROM 
                                    `users` 
								WHERE 
                                    `E-mail` = ? 
								AND 
                                    `passowrd` = ? ");
		$stmt->execute(array($userEmail, $password));
		$row = $stmt->fetch();
		$count = $stmt->rowCount();
		// If Count > 0 This Mean The Database Contain Record About This Username
		if ($count > 0) {
			$_SESSION['Username'] = $row['name']; // Register Session Name
			$_SESSION['ID'] = $row['User_id']; // Register Session ID
			header('Location: dashboard.php'); // Redirect To Dashboard Page
			exit();
		}
	}
?>

<!-- But Yur Code Here -->

<header>
 <!--<div class="over"></div>-->

<div class="container ">
            <div class="row">
                <div class="col-md-3">
                    <h2 ><span class="badge badge-danger "> تسجيل الدخول </span></h2> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 ">
                    <div class="loginbox">
                    <form class="container login" action="<?=($_SERVER['PHP_SELF'])?>" method="POST">
                        <div class="form-group ">
                            <input type="email" name="email" class="form-control login" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="البريد الإلكتروني ">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="الرقم السري">
                        </div>
                        <div class="form-group">
                            <a href="#"> هل نسيت كلمة السر؟</a>
                        </div>
                         <button type="تسجيل الدخول" class="btn btn-danger" style="width:20rem">تسجيل الدخول</button>
                    </form>
                    </div>
                </div>
           </div>

    
<?php
    include $tempDir . 'footer.php';
?>
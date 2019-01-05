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
        $password  = $_POST['password'];
        $userEmail = filter_var($userEmail, FILTER_SANITIZE_EMAIL);
        
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
        } else {
            $loginError = "";
        }
    }
?>

<!-- But Yur Code Here -->

<header id='fullHeader'>
    <div class="over"></div>
    <div class="container pt-5 position-relative">
        <h2 class="bg-color-3 d-inline-block px-3 py-1 f-30 font-cairo text-light">تسجيل الدخول</h2> 
            <div class="row justify-content-center mt-3">
                <form class="login col-lg-6 col-sm-12 col-xs-12 d-block p-5 mt-5 rounded mb-5" action="<?=($_SERVER['PHP_SELF'])?>" method="POST">
                    <div class="form-group pt-3 pb-2">
                        <input type="email" name="email" required class="form-control rounded-0 px-3 py-3 font-cairo" aria-describedby="emailHelp" placeholder="البريد الإلكتروني ">
                    </div>
                    <div class="form-group pt-4">
                        <input type="password" name="password" required class="form-control rounded-0 px-3 py-3 font-cairo" placeholder="الرقم السري">
                    </div>
                    <?php if(isset($loginError)){?>
                        <div class="alert alert-danger m-0 p -0 rounded-0" role="alert">
                            هناك خطاء في البريد الالكترونى او كلمه السر 
                        </div>
                    <?php
                        }
                    ?>
                    <div class="form-group pt-4 pb-5">
                        <a href="#" class="font-cairo"> هل نسيت كلمة السر؟</a>
                    </div>
                    <input type="submit" value="تسجيل الدخول" name="login" class="btn btn-danger d-block w-100 mb-3 py-2 font-cairo f-18" >
                </form>
            </div>
    </div>  
</header>
    
<?php
    include $tempDir . 'footer.php';
?>
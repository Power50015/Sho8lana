<?php 

    session_start();

    if (isset($_SESSION['Username'])) {
        header('Location: dashboard.php'); // Redirect To Dashboard Page
        exit();
    }

    include 'init.php';

    $pageTitle = 'تسجيل الدخول';

    include $tempDir . 'header.php';

?>

<!-- But Yur Code Here -->

<header>
    <div class="over"></div>
    <div class="container pt-5 position-relative">
        <h2 class="bg-color-3 d-inline-block px-3 py-1 f-30 font-cairo text-light">أنشاء حساب جديد</h2> 
            <div class="row justify-content-center mt-3">
                <form class="login col-lg-6 col-sm-12 col-xs-12 d-block p-5 mt-5 rounded mb-5" action="<?=($_SERVER['PHP_SELF'])?>" method="POST">
                    <div class="form-group pt-1 pb-2">
                        <input type="name" name="name" required class="form-control rounded-0 px-3 py-3 font-cairo" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="الأسم ">
                    </div>
                    <div class="form-group pt-1 pb-2">
                        <input type="email" name="email" required class="form-control rounded-0 px-3 py-3 font-cairo" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="البريد الإلكتروني ">
                    </div>
                    <div class="form-group pt-2">
                        <input type="password" name="password" required class="form-control rounded-0 px-3 py-3 font-cairo" id="exampleInputPassword1" placeholder="الرقم السري">
                    </div>
                    <div class="form-group pt-1">
                        <input type="confirm password" name="confirm password" required class="form-control rounded-0 px-3 py-3 font-cairo" id="exampleInputPassword1" placeholder="اعادة كتابة الرقم السري">
                    </div>
                    <?php if(isset($loginError)){?>
                        <div class="alert alert-danger m-0 p -0 rounded-0" role="alert">
                            هناك خطاء في البريد الالكترونى او كلمه السر 
                        </div>
                    <?php
                        }
                    ?>
                    <div class="pt-5">
                    <button type="تسجيل الدخول" class="btn btn-danger d-block w-100 mb-3 py-2  font-cairo f-18">أنشاء حساب الأن</button>
                     </div>   
                </form>
            </div>
    </div>  
</header>
    
<?php
    include $tempDir . 'footer.php';
?>
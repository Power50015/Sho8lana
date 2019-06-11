<?php

ob_start();

session_start();

if (isset($_SESSION['Username'])) {
    header('Location: dashboard.php'); // Redirect To Dashboard Page
    exit();
}

include 'init.php';

$pageTitle = 'تسجيل الدخول';

include $tempDir . 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username     = $_POST['name'];
    $email         = $_POST['email'];
    $password     = $_POST['password1'];
    $password2     = $_POST['password2'];

    if (isset($username)) {

        $username = filter_var($username, FILTER_SANITIZE_STRING);

        $smallCap = strtolower($username);

        if (strlen($username) < 4) {

            $formErrors[] = 'يجب ان يزيد اسم المستخدم عن 4 حروف';
        }
        if (isset($password) && isset($password2)) {

            if (empty($password)) {

                $formErrors[] = 'عليك كتابه كلمه السر';
            }

            if (sha1($password) !== sha1($password2)) {

                $formErrors[] = 'كلمه السر غير متطابقه';
            }
            if (strlen($password) < 10) {

                $formErrors[] = 'يجب الا تقل كلمه السر عن 10 رموز';
            }
        }

        if (isset($email)) {

            $email = filter_var($email, FILTER_SANITIZE_EMAIL);

            if (filter_var($email, FILTER_VALIDATE_EMAIL) != true) {

                $formErrors[] = 'البريد الالكترونى غير صحيح';
            }
            if (cheak("`User_E-mail`", "`users`", "`User_E-mail` = '$email'")) {
                $formErrors[] = 'البريد الالكترونى موجود بالفعل في قاعده البيانات ';
            }
        }
        if (cheak("`User_name`", "`users`", "`User_name` = '$username' OR `User_name` = '$smallCap'")) {
            $formErrors[] = 'اسم المستخدم موجود بالفعل في قاعده البيانات ';
        }
    }

    // Check If There's No Error Proceed The User Add

    if (empty($formErrors)) {

        // Insert User info In Database

        // Create Id

        do {
            $userId = randomString();
        } while (cheak('`User_id`', 'users', "`User_id` = '$userId'"));

        $userDes = " اضف وصف لنفسك";

        $stmt = $con->prepare("INSERT INTO 
                                        users(`User_id`, `User_name`, `User_passowrd`, `User_E-mail`, `User_Des`, `User_Img`)
                                    VALUES(:sidu, :suser, :spass, :smail, '$userDes', '0.jpg')");
        $stmt->execute(array(
            'sidu'  => $userId,
            'suser' => $username,
            'spass' => $password,
            'smail' => $email

        ));

        // Echo Success Message

        $succesMsg = "لقد اصبحت عضو في الموقع الان";
    }
}

?>

<!-- But Yur Code Here -->

<header id='fullHeader'>
    <div class="over"></div>
    <div class="container pt-5 position-relative">
        <h2 class="bg-color-3 d-inline-block px-3 py-1 f-30 font-cairo text-light">أنشاء حساب جديد</h2>
        <div class="row justify-content-center mt-3">
            <form class="login col-lg-6 col-sm-12 col-xs-12 d-block p-5 mt-5 rounded mb-5" action="<?= ($_SERVER['PHP_SELF']) ?>" method="POST">
                <div class="form-group pt-1 pb-2">
                    <input type="name" name="name" required class="form-control rounded-0 px-3 py-3 font-cairo" aria-describedby="emailHelp" placeholder="الأسم" pattern=".{4,}" title="يجب ان لا يقل اسم المستخدم عن 4 حروف" />
                </div>
                <div class="form-group pt-1 pb-2">
                    <input type="email" name="email" required class="form-control rounded-0 px-3 py-3 font-cairo" aria-describedby="emailHelp" placeholder="البريد الإلكتروني" minlength="7" />
                </div>
                <div class="form-group pt-2">
                    <input type="password" name="password1" required class="form-control rounded-0 px-3 py-3 font-cairo" placeholder="الرقم السري" minlength="10" title="يجب ان لا يقل الرقم السى عن 10 حروف" />
                </div>
                <div class="form-group pt-1">
                    <input type="password" name="password2" required class="form-control rounded-0 px-3 py-3 font-cairo" placeholder="اعادة كتابة الرقم السري" minlength="10" />
                </div>
                <?php if (isset($formErrors)) {
                    foreach ($formErrors as $errors) {
                        ?>
                        <div class="alert alert-danger m-0 mt-3 rounded-0" role="alert">
                            <?= ($errors) ?>
                        </div>
                    <?php }
            } ?>
                <?php
                if (isset($succesMsg)) {
                    $_SESSION['Username'] = $username; // Register Session Name
                    $_SESSION['ID'] = $userId; // Register Session ID
                    $_SESSION['ProfileImg'] = "upload/avatars/0.jpg";

                    ?>
                    <div class="alert m-0 rounded-0 alert-primary" role="alert">
                        <?= ($succesMsg) ?>
                        <br />
                        و سيتم تحويلك الى الموقع بعد 5 ثوانى
                    </div>
                <?php
            }
            ?>
                <div class="pt-5">
                    <input type="submit" value="أنشاء حساب الأن" name="signup" class="btn btn-danger d-block w-100 mb-3 py-2  font-cairo f-18">
                </div>
            </form>
        </div>
    </div>
</header>

<?php
include $tempDir . 'footer.php';
if (isset($succesMsg)) {
    header("refresh:5;url='dashboard.php'");
    exit();
}
ob_end_flush();
?>
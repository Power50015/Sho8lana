<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once 'config.php';
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
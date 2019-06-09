<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once 'functions.php';
include_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username     =     $_POST['name'];
    $email         =    $_POST['email'];
    $password     =     $_POST['password1'];
    $password2     =    $_POST['password2'];
    $json = array();

    if (isset($username)) {

        $username = filter_var($username, FILTER_SANITIZE_STRING);

        $smallCap = strtolower($username);
        if (cheak("`User_name`", "`users`", "`User_name` = '$username' OR `User_name` = '$smallCap'")) {
            array_push($json, array('key' => false));
            array_push($json, array('msg' => 'اسم المستخدم موجود في قاعده البيانات'));
            $formErrors[] = "false";
        } elseif (cheak("`User_E-mail`", "`users`", "`User_E-mail` = '$email'")) {
            array_push($json, array('key' => false));
            array_push($json, array('msg' => 'البريد المستخدم موجود في قاعده البيانات'));
            $formErrors[] = "false";
        } elseif ($password != $password2) {
            array_push($json, array('key' => false));
            array_push($json, array('msg' => 'كلمه السر غير متطابقه'));
            $formErrors[] = "false";
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
        array_push($json, array('key' => true));
        array_push($json, array('msg' => 'تم الإضافه'));
    }
    echo json_encode($json);
}

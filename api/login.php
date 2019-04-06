<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userEmail = $_POST['email'];
    $password  = $_POST['password'];
    $userEmail = filter_var($userEmail, FILTER_SANITIZE_EMAIL);

    // Check If The User Exist In Database
    $stmt = $con->prepare("SELECT 
									`User_id`, `User_name`, `User_Img`
								FROM 
                                    `users` 
								WHERE 
                                    `User_E-mail` = ? 
								AND 
                                    `User_passowrd` = ? ");
    $stmt->execute(array($userEmail, $password));
    $row = $stmt->fetch();
    $count = $stmt->rowCount();
    $json = array();

    // If Count > 0 This Mean The Database Contain Record About This Username
    if ($count > 0) {
        $_SESSION['Username'] = $row['User_name']; // Register Session Name
        $_SESSION['ID'] = $row['User_id']; // Register Session ID
        $_SESSION['ProfileImg'] = "upload/avatars/" . $row['User_Img'];
        $json = array('key' => true);
        echo json_encode($json);
    } else {
        $json = array('key' => false);
        echo json_encode($json);
    }
}
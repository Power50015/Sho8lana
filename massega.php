<?php
ob_start();
session_start();
include 'init.php';
if (isset($_SESSION['ID'])) {
    if (isset($_GET['to'])) {
        $pageTitle = 'الرسائل';
        include $tempDir . 'header.php';
        if (!empty($_GET['to'])) {
            if (cheak('*', '`users`', '`User_id` = "' . $_GET['to'] . '"')) {
                    $stmt = $con->prepare("SELECT * FROM `msgs` WHERE " . '(`msgsFrom` = "' . $_GET['to'] . '" AND `msgsTo` = "' . $_SESSION['ID'] . '") OR (`msgsFrom` = "' . $_SESSION['ID'] . '" AND `msgsTo` = "' . $_GET['to'] . '") ORDER BY `msgs`.`msgsTime` ASC');
                    $stmt->execute();
                    $msg  = $stmt->fetchAll();
                    $stmt = $con->prepare("SELECT `User_name`,`User_Img` FROM `users` WHERE `User_id` = '" . $_GET['to'] . "'");
                    $stmt->execute();
                    $msgUser = $stmt->fetch();
                    echo "<div class='my-4 container'>";
                    echo "<div class='msg px-3'>";
                    foreach ($msg as $x) {
                        if ($x['msgsFrom'] == $_SESSION['ID']) {
?>
                                <div class= 'row bg-color-4 mb-2' >
                                    <div class="col-9 col-md-10 pr-5 pt-2">
                                        <h4 class="font-color-2"><?= ($_SESSION['Username']) ?></h4>
                                        <p  class="font-color-2"><?= ($x['msgsText']) ?></p>
                                        <h6 class="font-color-2"><?= ($x['msgsTime']) ?></h6>
                                    </div>
                                    <div class='col-3 col-md-2'>
                                        <img src="<?= ($_SESSION['ProfileImg']) ?>" class="h-200 w-100 d-none d-md-block rounded-circle">
                                    </div>
                                </div>
                                <?php
                        } else {
?>  
                            <div class= 'row bg-color-5 mb-2'>
                                <div class='col-3 col-md-2'>
                                    <a href="#"><img src="upload/avatars/<?= ($msgUser['User_Img']) ?>" class="w-100 h-200 d-none d-md-block rounded-circle"></a>
                                </div>
                                <div class="col-9 col-md-10 pr-5 pt-2">
                                        <a href="#"><h4 class="font-color-2"><?= ($msgUser['User_name']) ?></h4></a>
                                        <p  class="font-color-2"><?= ($x['msgsText']) ?></p>
                                        <h6 class="font-color-2"><?= ($x['msgsTime']) ?></h6>
                                </div>
                            </div>
                        <?php
                        }
                    }
                    echo "</div>";
?>
                    <form class="" method="POST">
                    <input required type="hidden" value="<?= ($_GET['to']) ?>" id="id-send">
                        <textarea required class="w-100 h-200" id="msg" name="msgTxt"></textarea>
                        <div class="">
                            <input type="submit" value="ارسل" name="send-msg" id="send-msg" class="btn btn-danger d-block w-100 mb-3 py-2  font-cairo f-18" >
                        </div> 
                    </form>
                    
                        <?php
                    include $tempDir . 'footer.php';
            } else {
                header('Location: index.php');
                exit();
            }
        } else {
            header('Location: index.php');
            exit();
        }
    } elseif (isset($_GET['do'])) {
        if (!empty($_GET['do'])) {
            if ($_GET['do'] == 'send') {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $msgTxt = $_POST['m'];
                    $msgTo  = $_POST['i'];
                    if (!empty($msgTxt)) {
                        $SQLSS = "INSERT INTO `msgs` (`masgsID`, `msgsText`, `msgsFrom`, `msgsTo`) VALUES ('" . randomString(11) . "', '" . $msgTxt . "', '" . $_SESSION['ID'] . "','" . $msgTo . "')";
                        $stmt  = $con->prepare($SQLSS);
                        $stmt->execute();
                    }
                }
            } elseif ($_GET['do'] == 'res') {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $stmt = $con->prepare("SELECT * FROM `msgs` WHERE " . '(`msgsFrom` = "' . $_GET['user'] . '" AND `msgsTo` = "' . $_SESSION['ID'] . '") OR (`msgsFrom` = "' . $_SESSION['ID'] . '" AND `msgsTo` = "' . $_GET['user'] . '") ORDER BY `msgs`.`msgsTime` ASC');
                    $stmt->execute();
                    $msg = $stmt->fetchAll();
                    foreach ($msg as $x) {
                        if ($x['msgsFrom'] == $_SESSION['ID']) {
                            $stmt = $con->prepare("SELECT `User_name`,`User_Img` FROM `users` WHERE `User_id` = '" . $x['msgsTo'] . "'");
                            $stmt->execute();
                            $msgUser = $stmt->fetch();
?>
                            
                                <div class= 'row bg-color-4 mb-2' >
                                    <div class="col-9 col-md-10 pr-5 pt-2">
                                        <h4 class="font-color-2"><?= ($_SESSION['Username']) ?></h4>
                                        <p  class="font-color-2"><?= ($x['msgsText']) ?></p>
                                        <h6 class="font-color-2"><?= ($x['msgsTime']) ?></h6>
                                    </div>
                                    <div class='col-3 col-md-2'>
                                        <img src="<?= ($_SESSION['ProfileImg']) ?>" class="w-100 h-200 d-none d-md-block rounded-circle">
                                    </div>
                                </div>
                                <?php
                        } else {
                            $stmt = $con->prepare("SELECT `User_name`,`User_Img` FROM `users` WHERE `User_id` = '" . $x['msgsFrom'] . "'");
                            $stmt->execute();
                            $msgUser = $stmt->fetch();
?>  
                            <div class= 'row bg-color-5 mb-2'>
                                <div class='col-3 col-md-2'>
                                    <a href="#"><img src="upload/avatars/<?= ($msgUser['User_Img']) ?>" class="w-100 d-none d-md-block h-200 rounded-circle"></a>
                                </div>
                                <div class="col-9 col-md-10 pr-5 pt-2">
                                        <a href="#"><h4 class="font-color-2"><?= ($msgUser['User_name']) ?></h4></a>
                                        <p  class="font-color-2"><?= ($x['msgsText']) ?></p>
                                        <h6 class="font-color-2"><?= ($x['msgsTime']) ?></h6>
                                </div>
                            </div>
                        <?php
                        }
                    }
                } else {
                    // isset($_GET['to']
                    header('Location: index.php');
                    exit();
                }
            }
        } else {
            header('Location: index.php');
            exit();
        }
    } else {
        $pageTitle = 'الرسائل';
        include $tempDir . 'header.php';
        echo "<div class='my-4 container'>";
        echo "<div class=' px-3 msg2'>";
        $stmt = $con->prepare("SELECT * FROM `msgs` WHERE " . '( `msgsTo` = "' . $_SESSION['ID'] . '") OR (`msgsFrom` = "' . $_SESSION['ID'] . '") ORDER BY `msgs`.`msgsTime` ASC');
        $stmt->execute();
        $msg = $stmt->fetchAll();
        foreach ($msg as $x) {
            if ($x['msgsFrom'] == $_SESSION['ID']) {?>
            <div class= 'row bg-color-4 mb-2' >
                                    <div class="col-9 col-md-10 pr-5 pt-2">
                                        <h4 class="font-color-2"><?= ($_SESSION['Username']) ?></h4>
                                        <p  class="font-color-2"><?= ($x['msgsText']) ?></p>
                                        <h6 class="font-color-2"><?= ($x['msgsTime']) ?></h6>
                                    </div>
                                    <div class='col-3 col-md-2'>
                                        <img src="<?= ($_SESSION['ProfileImg']) ?>" class="w-100 h-200 d-none d-md-block rounded-circle">
                                    </div>
                                </div>
                                <?php

            } else {
                $stmt = $con->prepare("SELECT `User_name`,`User_Img` FROM `users` WHERE `User_id` = '" . $x['msgsFrom'] . "'");
                $stmt->execute();
                $msgUser = $stmt->fetch();
?>  
                            <div class= 'row bg-color-5 mb-2'>
                                <div class='col-3 col-md-2'>
                                    <a href="massega.php?to=<?= ($x['msgsFrom']) ?>"><img src="upload/avatars/<?= ($msgUser['User_Img']) ?>" class="w-100 d-none d-md-block h-200 rounded-circle"></a>
                                </div>
                                <div class="col-9 col-md-10 pr-5 pt-2">
                                        <a href="massega.php?to=<?= ($x['msgsFrom']) ?>"><h4 class="font-color-2"><?= ($msgUser['User_name']) ?></h4></a>
                                        <p  class="font-color-2"><?= ($x['msgsText']) ?></p>
                                        <h6 class="font-color-2"><?= ($x['msgsTime']) ?></h6>
                                </div>
                            </div>
            <?php
            }
        }
        echo '</div></div>';
        include $tempDir . 'footer.php';
    }
} else {
    header('Location: index.php');
    exit();
}
ob_end_flush();
?>
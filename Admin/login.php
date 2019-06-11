<?php
include 'head.php';
if ($_GET['do'] == 'delete') {
    if (isset($_GET['serv'])) {
        if (!empty($_GET['serv'])) {
            $stmt = $con->prepare("SELECT * FROM `offers` WHERE `OffersService` = '" . $_GET['serv'] . "'");
            $stmt->execute();
            $ddoffers = $stmt->fetchAll();
            foreach ($ddoffers as $x) {
                $stmt = $con->prepare("DELETE FROM `offers` WHERE `OffersID` = :zid");
                $stmt->bindParam(":zid", $x['OffersID']);
                $stmt->execute();
            }
            $stmt = $con->prepare("DELETE FROM `services` WHERE `id_services` = :zid");
            $stmt->bindParam(":zid", $_GET['serv']);
            $stmt->execute();
            $url = "services.php";
            header('Location: ' . $url);
        } else {
            $url = "login.php";
            header('Location: ' . $url);
            exit();
        }
    } else {
        $url = "login.php";
        header('Location: ' . $url);
        exit();
    }
}
?>

<header class="#E5E5E5">
    <div class="container">
    <h2 class="bg-color-9 d-inline-block font-700 font-color-2 mb-lg-0 mb-4 px-4 py-2">تسجيل الدخول </h2>
        <div class="row justify-content-center mt-3">
            <form class="login col-lg-6 col-sm-12 col-xs-12 d-block p-5 mt-5 rounded mb-5">
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
    include 'footer.php';
    ?>
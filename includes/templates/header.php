<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title><?=(getTitle())?></title>

        <!--Fonts-->
        <link rel = "stylesheet" href = "<?=($cssDir)?>all.min.css"/>
        <link rel = "stylesheet" href="https://fonts.googleapis.com/css?family=Cairo:400,600,700|Changa:400,500,600,700">

        <link rel = "stylesheet" href = "<?=($cssDir)?>bootstrap.rtl.min.css" />
        <link rel = "stylesheet" href = "<?=($cssDir)?>main.css" />

    </head>
    <body dir='rtl' >
        <!--Start Nav Bar -->
        <nav class="navbar navbar-expand-lg navbar-light font-changa f-18">
            <div class="container">
                <a class="navbar-brand" href="index.php"><img src="<?=($imgDir)?>logo.png" class="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto font-700">
                        <li class="nav-item active-link">
                            <a class="nav-link" href="index.php">الرئيسيه <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                        
                            <a class="nav-link" href="services.php?do=add">أضف خدمه<i class="fas fa-plus px-2"></i></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="ads.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                الإعلانات
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php 
                                    $stmt = $con->prepare("SELECT * FROM `cats` WHERE `CatMain` IS NULL");
                                    $stmt->execute();
                                    $cats = $stmt->fetchAll();
                                    foreach($cats as $x) {
                                        echo '<a class="dropdown-item" href="http://localhost/sho8lana/services.php?cats=' . $x['CatID'] . '">-' . $x['CatName'] . "</a>";
                                        $stmt2 = $con->prepare("SELECT * FROM `cats` WHERE `CatMain` = " . $x['CatID']);
                                        $stmt2->execute();
                                        $subCats = $stmt2->fetchAll();
                                        foreach($subCats as $y) {
                                            echo '<a class="dropdown-item" href="http://localhost/sho8lana/services.php?cats=' . $y['CatID'] . '">--' . $y['CatName'] . "</a>";
                                        }
                                    }
                                ?>
                            </div>
                        </li>
                    </ul>

                    <?php 
                        if (! isset($_SESSION['Username'])) {
                    ?>

                    <div class="dropdown form-inline my-2 my-lg-0">
                        <a class="nav-link f-24 font-color-1 boder" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-align-center"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="login.php">
                                <i class="fas fa-user-check"></i>
                                <span class="pl-1"> تسجيل الدخول </span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="sing.php">
                                <i class="fas fa-user-edit"></i>
                                <span class="pl-1"> حساب جديد </span>
                            </a>
                        </div>
                    </div>
                    
                    <?php 
                        }else {
                    ?>

                    <div class="dropdown form-inline my-2 my-lg-0">
                        <a class="pr-3 pl-3 f-30 font-color-1" href="#"><i class="far fa-bell"></i></a>
                        <a class="pr-3 pl-3 f-30 font-color-1" href="#"><i class="far fa-envelope"></i></a>
                        <a class="nav-link f-24 font-color-1 boder" href="ads.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-align-center"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item p-1" href="#">
                                <div class="profile-link">
                                    <img src ="<?=($_SESSION['ProfileImg'])?>" class="profile-img">
                                    <span class="pl-2"><?=($_SESSION['Username'])?></span>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="dashboard.php">
                                <i class="fas fa-info-circle"></i>
                                <span class="pl-1"> لوحه التحكم  </span>
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-dollar-sign"></i>
                                <span class="pl-1"> الرصيد </span>
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-sliders-h"></i>
                                <span class="pl-1"> الاعدادات </span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">
                                <i class="fas fa-sign-out-alt"></i>
                                <span class="pl-1"> خروج </span>
                            </a>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </nav>
        <!--End Nav Bar -->
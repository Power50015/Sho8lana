<?php

/*
================================================
== Template Page
================================================
*/

ob_start(); // Output Buffering Start

session_start();

$pageTitle = 'الخدمات';

/*if (isset($_SESSION['Username'])) {*/

include 'init.php';

include $tempDir . 'header.php';

if (isset($_GET['do'])) {
    //To do GET Request Work you Must Be A User
    if (isset($_SESSION['Username'])) {
        
        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
        
        if ($do == 'Manage') {
            
            
            
        } elseif ($do == 'add') {
            
?>
        <header id='fullHeader'>
            <div class="over"></div>
            <div class="container pt-5 position-relative">
                <h2 class="bg-color-3 d-inline-block mx-5 px-4 py-2 f-30 font-cairo text-light">اضافه خدمه جديده</h2> 
                    <div class="row justify-content-center mt-3">
                        <form class="login col-lg-6 col-sm-12 col-xs-12 d-block p-5 mt-5 rounded mb-5" action="?do=Insert" method="POST">
                            <div class="form-group pt-3 pb-2">
                                <input type="text" name="adsName" required class="form-control rounded-0 px-3 py-3 font-cairo" placeholder="عنوان المشروع">
                            </div>
                            <select name="cats" required class="custom-select my-1 mr-sm-2 rounded-0 px-3" id="inlineFormCustomSelectPref">
                                <option selected disabled>أختر القسم </option>
                                <?php
            $stmt = $con->prepare("SELECT * FROM `cats` WHERE `CatMain` IS NULL");
            $stmt->execute();
            $cats = $stmt->fetchAll();
            foreach ($cats as $x) {
                echo "<option value='" . $x['CatID'] . "'>" . $x['CatName'] . "</option>";
                $stmt2 = $con->prepare("SELECT * FROM `cats` WHERE `CatMain` = " . $x['CatID']);
                $stmt2->execute();
                $subCats = $stmt2->fetchAll();
                foreach ($subCats as $y) {
                    echo "<option value='" . $y['CatID'] . "'>  -- " . $y['CatName'] . "</option>";
                }
            }
?>
                            </select>
                            <div class="form-group pt-4">
                                <textarea required name="det" class="form-control rounded-0 px-3 py-3 font-cairo h-500" placeholder="تفاصيل المشروع"></textarea>
                            </div>
                            <div class="form-group pt-3 pb-2">
                                <input type="number" name="salry" required class="form-control rounded-0 px-3 py-3 font-cairo" placeholder="المزانيه المتوقعه" min="10" max="5000">
                            </div>
                            <h4>مده التسليم</h4>
		                    <div>
			                     <input type="radio" id="radio01" name="time" value="1"  checked />
			                     <label for="radio01" class="font-cairo f-18 font-color-4" >
                                    <span class="m-3"></span>أقل من اسبوع
                                 </label>
                            </div>
                            <div>
			                     <input type="radio" id="radio02" name="time" value="2" />
			                     <label for="radio02" class="font-cairo f-18 font-color-4" >
                                    <span class="m-3"></span>من 1 أسبوع الى 2 اسبوع
                                 </label>
                            </div>
                            <div>
			                     <input type="radio" id="radio03" name="time" value="3" />
			                     <label for="radio03" class="font-cairo f-18 font-color-4" >
                                    <span class="m-3"></span>من 2 أسبوع الى شهر
                                 </label>
                            </div>
                            <div>
			                     <input type="radio" id="radio04" name="time" value="4" />
			                     <label for="radio04" class="font-cairo f-18 font-color-4" >
                                    <span class="m-3"></span>من شهر الى 3 شهور
                                 </label>
                            </div>
                            <div>
			                     <input type="radio" id="radio05" name="time" value="5" />
			                     <label for="radio05" class="font-cairo f-18 font-color-4" >
                                    <span class="m-3"></span>أكثر من 3 شهور
                                 </label>
                            </div>
                            <h4>ملفات توضيحيه</h4>
                            <div class="form-group pt-3 mb-4">
                                <input type="file" name="file" id="file" class="input-file">
                                <label for="file" class="btn btn-tertiary js-labelFile w-100 ">
                                    <i class="icon fa fa-check"></i>
                                    <span class="js-fileName">اختر ملف للرفع</span>
                                </label>
                            </div>
                            <?php
            if (isset($loginError)) {
?>
                            <div class="alert alert-danger m-0 p -0 rounded-0" role="alert">
                                هناك خطاء  
                            </div>
                            <?php
            }
?>
                            <input type="submit" value="انشر الأن" name="add" class="btn btn-danger d-block w-100 mb-0 py-2 font-cairo f-18">
                        </form>
                    </div>
            </div>  
        </header>

        <?php
        } elseif ($do == 'Insert') {
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $adsName = $_POST['adsName'];
                $cats    = $_POST['cats'];
                $det     = $_POST['det'];
                $price   = $_POST['salry'];
                $time    = $_POST['time'];
                
                // Validate The Form
                
                $formErrors = array();
                
                if (empty($adsName)) {
                    $formErrors[] = 'لا يمكن ترك الاسم فارغ</strong>';
                }
                
                if (empty($det)) {
                    $formErrors[] = 'لا يمكن ترك الوصف فارغ';
                }
                
                if (empty($price)) {
                    $formErrors[] = 'لا يمكن ترك السعر فارغ';
                }
                
                if ($cats == 0) {
                    $formErrors[] = 'يجب اختيار قسم ';
                }
                
                // Loop Into Errors Array And Echo It
                
                foreach ($formErrors as $error) {
                    echo '<div class="alert alert-danger">' . $error . '</div>';
                }
                
                // Check If There's No Error Proceed The Update Operation
                
                if (empty($formErrors)) {
                    
                    // Insert Userinfo In Database
                    
                    $stmt = $con->prepare("INSERT INTO `services` (`id_services`, `service_title`, `service_des`, `service_needTime`, `service_time`, `service_money`, `sections_services`, `user_id`) VALUES  
                    (:zid, :zname, :zdes, :ztime, now(), :zprice, :zcats , :zuser)");
                    
                    $stmt->execute(array(
                        'zid' => randomString(11),
                        'zname' => $adsName,
                        'zdes' => $det,
                        'ztime' => $time,
                        'zprice' => $price,
                        'zcats' => $cats,
                        'zuser' => $_SESSION['ID']
                    ));
                    
                    
                    // Echo Success Message
                    
                    $theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Inserted</div>';
                    
                }
                
            } else {
                
                echo "<div class='container'>";
                
                $theMsg = '<div class="alert alert-danger">Sorry You Cant Browse This Page Directly</div>';
                
                echo "</div>";
                
            }
            
        } elseif ($do == 'Delete') {
            
            
        } else {
            
            header('Location: services.php');
            
            exit();
        }
        
    } else {
        
        header('Location: sing.php');
        
        exit();
    }
} elseif (isset($_GET['cats'])) {
    
    
} elseif (isset($_GET['singl'])) {

    
    
}else {
?>
    <header class="d-flex h-500">
    <div class="over"></div>
    <div class="container position-relative align-self-center text-center">
        <h1 class="d-inline font-color-2 bg-color-6 px-4 font-700">تصفح الإعلانات</h1>
    </div>
</header>
<main class="bg-color-7 services">
    <div class="container">
        <div class="row">
            <aside class="col-md-4 col-12 my-5">
                <div class="rounded bg-color-2 text-center pt-5">
                    <h3 class="d-inline-block font-color-2 bg-color-9 px-4 py-2 font-700 mb-5">الأقسام</h3>
                    <form id="accordion" action="?<?= ($_GET['cats']) ?>" method="GET">
                            <?php
                                $stmt = $con->prepare("SELECT * FROM `cats` WHERE `CatMain` IS NULL");
                                $stmt->execute();
                                $cats = $stmt->fetchAll();
                                foreach ($cats as $x) {
                                    echo '<div class="card-header border-0" id="headingOne">';
                                    echo '<h5 class="mb-0">';
                                    $randomBtn = randomName();
                                    echo '<a class="font-color-2 rounded f-18 bg-color-3 px-5 font-700 hover" data-toggle="collapse" data-target="#'.$randomBtn.'" aria-expanded="true" aria-controls="'.$randomBtn.'" href="#">'.$x['CatName'].'<i class="fas fa-caret-down"></i></a>';
                                    echo '</h5></div>';
                                    $stmt2 = $con->prepare("SELECT * FROM `cats` WHERE `CatMain` = " . $x['CatID']);
                                    $stmt2->execute();
                                    $subCats = $stmt2->fetchAll();
                                    $randomBtn2 = randomName();
                                    echo '<div id="'.$randomBtn.'" class="collapse " aria-labelledby="headingOne" data-parent="#accordion"><div class="card-body">';
                                    foreach ($subCats as $y) {
                                        echo '<div class="form-check"><input class="form-check-input" type="checkbox" name="cats[]" value="'.$y['CatID'].'" id="'.$randomBtn2.'">';
                                        echo '<label class="form-check-label font-color-4" for="'.$randomBtn2.'">'.$y['CatName'].'</label></div>';
                                    }
                                    echo '</div></div>';
                                }
                            ?>
                        <h6 class="font-color-1 pt-3">مده التسليم</h6>
                        <div class="text-left">
                            <div>
                                <input type="radio" id="radio00" name="time" value="0" checked />
                                <label for="radio00" class="font-cairo f-18 font-color-4">
                                    <span class="m-3"></span>أي وقت
                                </label>
                            </div>
                            <div>
                                <input type="radio" id="radio01" name="time" value="1" />
                                <label for="radio01" class="font-cairo f-18 font-color-4">
                                    <span class="m-3"></span>أقل من اسبوع
                                </label>
                            </div>
                            <div>
                                <input type="radio" id="radio02" name="time" value="2" />
                                <label for="radio02" class="font-cairo f-18 font-color-4">
                                    <span class="m-3"></span>من 1 أسبوع الى 2 اسبوع
                                </label>
                            </div>
                            <div>
                                <input type="radio" id="radio03" name="time" value="3" />
                                <label for="radio03" class="font-cairo f-18 font-color-4">
                                    <span class="m-3"></span>من 2 أسبوع الى شهر
                                </label>
                            </div>
                            <div>
                                <input type="radio" id="radio04" name="time" value="4" />
                                <label for="radio04" class="font-cairo f-18 font-color-4">
                                    <span class="m-3"></span>من شهر الى 3 شهور
                                </label>
                            </div>
                            <div>
                                <input type="radio" id="radio05" name="time" value="5" />
                                <label for="radio05" class="font-cairo f-18 font-color-4">
                                    <span class="m-3"></span>أكثر من 3 شهور
                                </label>
                            </div>
                        </div>
                        <div class="sidebar_widget">
                            <h6 class="font-color-1 py-3">المبلغ المطلوب</h6>
                            <div class="price-range">
                                <ul class="p-0 px-5">
                                    <li class="range d-block">
                                        <div id="range-price" class="range-box"></div>
                                        <input dir="ltr" type="text" id="price" class="price-box font-cairo f-18 font-color-4 bg-none" readonly name="money"/>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <input type="submit" value="ابحث" class="rounded-0 btn btn-danger d-block w-100 py-2  font-cairo f-18">
                    </form>
                </div>
            </aside>
            <section class="col-12 col-md-8 my-5">
                <?php
                   /* $stmt = $con->prepare("SELECT * FROM `cats` WHERE `CatMain` IS NULL");
                    $stmt->execute();
                    $cats = $stmt->fetchAll();
                    foreach ($cats as $x) {

                    }*/
                    try {

    // Find out how many items are in the table
        $stmt = $con->prepare('SELECT COUNT(*) FROM `services` WHERE `services_stat` = 0');
        $stmt->execute();
        $total = $stmt->fetchColumn();
        //$total = $dbh->query('SELECT COUNT(*) FROM `services` WHERE `services_stat` = 0')->fetchColumn();

    // How many items to list per page
    $limit = 10;

    // How many pages will there be
    $pages = ceil($total / $limit);

    // What page are we currently on?
    $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
        'options' => array(
            'default'   => 1,
            'min_range' => 1,
        ),
    )));

    // Calculate the offset for the query
    $offset = ($page - 1)  * $limit;

    // Some information to display to the user
    $start = $offset + 1;
    $end = min(($offset + $limit), $total);

    // The "back" link
    $prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&rsaquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&rsaquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&rsaquo;</span>';

    // The "forward" link
    $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&laquo;</a> <a href="?page=' . $pages . '" title="Last page">&laquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&laquo;</span>';

   
    // Prepare the paged query
    $stmt = $con->prepare('SELECT * FROM `services` ORDER BY `service_time` DESC LIMIT :limit OFFSET :offset ');

    // Bind the query params
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    // Do we have any results?
    if ($stmt->rowCount() > 0) {
        // Define how we want to fetch the results
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $iterator = new IteratorIterator($stmt);

        // Display the results
        foreach ($iterator as $row) {
            $stx = 'SELECT COUNT(*) FROM `offers` WHERE `OffersService` = "' . $row['id_services'] . '"';
            $OffersStmt = $con->prepare($stx);
            $OffersStmt->execute();
            $totalOffers = $OffersStmt->fetchColumn();
            $stI = 'SELECT `User_Img` FROM `users` WHERE `User_id` = "' . $row['user_id'] . '"';
            $stI = $con->prepare($stI);
            $stI->execute();
            $MyImg = $stI->fetch();
            echo '<a class="bg-color-2 rounded row mb-3" href="services.php?singl='.$row['id_services'].'">';
            echo '<div class="col-md-9 col-12 pt-3"> <h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700">' .$row['service_title'].'</h6>';
            echo '<div><h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700 mr-2">' .$row['service_time'] . '</h6>';
            echo '<h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700 mr-2">' .$totalOffers . '</h6>';
            echo '<h6 class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3 font-700 mr-2">' .$row['service_time'] . '</h6></div>';
            echo '<p class="f-18 d-inline-block bg-color-5 px-3 py-1 font-color-3">' .substr($row['service_des'],0, 190) . '....</p></div><div class="col-3 h-200 py-3 d-md-block d-none">';
            echo '<img src="upload\avatars\\'.$MyImg['User_Img'].'" class="h-100 w-100 rounded-circle"></div></a>';
        }
         // Display the paging information
            echo '<div id="paging"><p>', $nextlink, ' الصفحه ', $page, ' من ', $pages, ' صفحه, يعرض ',  $total, ' خدمه ', $prevlink, ' </p></div>';

    } else {
        echo '<p>لا يوجد نتائج للعرض</p>';
    }

} catch (Exception $e) {
    echo '<p>', $e->getMessage(), '</p>';
}
?> 
            </section>
        </div>
    </div>
</main>
    <?php
    /*
    header('Location: services.php');
    
    exit();*/
}
include $tempDir . 'footer.php';

ob_end_flush(); // Release The Output
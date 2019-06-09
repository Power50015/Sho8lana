<?php

ob_start();

session_start();

include 'init.php';

$pageTitle = 'الصفحة الشخصية';

include $tempDir . 'header.php';
if (isset($_GET['user'])) {
    if (cheak('`User_id`', '`users`', '`User_id` = "' . $_GET['user'] . '"')) {
        ?>
        <header id='fullHeader'>
            <div class="over"></div>
        </header>
        <section class="main py-5">
            <div class="container">
                <div class="row px-5 mb-0">

                    <div class="col-lg-8 col-sm-12  text-sm-center text-lg-left" data-toggle="modal" data-target="#personal-name">
                        <?php
                        $stmt   = $con->prepare("SELECT `User_id`,`User_name`,`User_Site`,`User_Des`,`User_Img` FROM `users` WHERE  `User_id`  = ?");
                        $stmt->execute(array(
                            $_GET['user']
                        ));
                        $UserRow = $stmt->fetch();
                        ?>
                        <p class="hover2 bg-color-2 d-block rounded font-700 font-color-2  p-4 pb-0 text-center"> <?php
                                                                                                                    if ($UserRow['User_Des'] != " اضف وصف لنفسك") {
                                                                                                                        echo $UserRow['User_Des'];
                                                                                                                    } else { } ?></p>
                        <h2 class="bg-color-9 d-inline-block font-700 font-color-2 mt-5 mb-lg-0 mb-4 px-4 py-2"> الشهادات </h2>
                        <div class="mt-2">
                            <a href="cert.php?cert=<?= ($_GET['user']) ?>" class="font-color-3 font-700 f-18 ">عرض الكل</a>
                        </div>
                    </div>
                    <div class="personal-img position-relative col-lg-3 col-sm-12 p-0 mr-lg-4" data-toggle="modal" data-target="#personal-img">
                        <div class="over h-100"></div>
                        <img src="upload/avatars/<?= ($UserRow['User_Img']) ?>" class="rounded w-100 h-100 position-relative" alt="...">
                    </div>



                </div>

            </div>
        </section>

        <section>
            <div class="container">
                <div class="row px-5 mb-0 ">
                    <div class="col-lg-8  col-sm-12 ">

                        <div class="row">
                            <?php
                            $stmt = $con->prepare("SELECT * FROM `cert` WHERE `CertUser` = '" . $_GET['user'] . "' LIMIT 2");
                            $stmt->execute();
                            $certs = $stmt->fetchAll();
                            foreach ($certs as $x) {
                                ?>
                                <div class="col-5">
                                    <img src="upload\cert\<?= ($x['Certimg']) ?>" class="rounded w-100 h-100 position-relative" alt="...">
                                </div>
                            <?php } ?>
                        </div>




                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <h2 class="hover2  font-color-2  bg-color-2 px-4 font-700 mb-lg-0 mb-3 py-3"><?= ($UserRow['User_name']) ?></h2>
                        <div class="mt-4  ">
                            <a type="link" class="hover2  font-color-2 f-20 text-white  bg-color-2 px-4 font-700  py-3" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-tv"></i> الموقع الشخصي
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" class="form-control" value="<?= ($UserRow['User_Site']) ?>" placeholder="<?= ($UserRow['User_Site']) ?>" aria-label="/http://powerware.site" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <h5 class="hover2  font-color-2   bg-color-2 px-4 font-700 mt-lg-4 py-3  mb-3"> <i class="fas fa-star"></i> تقييم %100</h5>

                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row px-5 mb-5 ">
                    <div class="col">
                        <h2 class="bg-color-9 d-inline-block font-700 font-color-2 mt-4 mb-lg-0 mb-4 px-4 py-2"> المهارات </h2>
                        <div class="mt-2">
                            <a href="skill.php?skills=<?= ($_GET['user']) ?>" class="font-color-3 font-700 f-18 ">عرض الكل</a>
                        </div>
                        <div class="row mt-3">
                            <?php
                            $stmt = $con->prepare("SELECT `user_skillID` FROM `user_skill` WHERE `userID_skill` = '" . $_SESSION['ID'] . "'");
                            $stmt->execute();
                            $skills = $stmt->fetchAll();
                            $numItems = count($skills);
                            $j = 0;
                            $SQLSection = "(`SkillID` = ";
                            foreach ($skills as $x) {
                                if (++$j === $numItems) {
                                    $SQLSection = $SQLSection . $x['user_skillID'] . " )";
                                } else {
                                    $SQLSection = $SQLSection . $x['user_skillID'] . " OR `SkillID` = ";
                                }
                            }
                            try {
                                $stmt = $con->prepare("SELECT * FROM `skills` WHERE " .  $SQLSection . " LIMIT 6");
                                $stmt->execute();
                                $skill = $stmt->fetchAll();
                                foreach ($skill as $x) {
                                    ?>
                                    <div class="col-2">
                                        <img src="upload\skills\<?= ($x['SkillImg']) ?>" class="rounded w-100 h-100 position-relative" alt="<?= ($x['SkillName']) ?>" title="<?= ($x['SkillName']) ?>" />
                                    </div>
                                <?php
                            }
                        } catch (Exception $e) {
                            $skill;
                        }

                        ?>


                        </div>

                        <h2 class="bg-color-9 d-inline-block font-700 font-color-2 mt-5 mb-lg-0 mb-4 px-4 py-2"> الأعمال السابقة </h2>
                        <div class="mt-2">
                            <a href="portfoilo.php?prot=<?= ($_GET['user']) ?>" class="font-color-3 font-700 f-18 ">عرض الكل</a>
                        </div>
                        <div class="row mt-3 mb-5">
                            <?php
                            $stmtpo = $con->prepare("SELECT * FROM `portfoilo` WHERE `PortfoiloUser` = '" . $_GET['user'] . "'ORDER BY `PortfoiloDate` DESC LIMIT 4");
                            $stmtpo->execute();
                            $portfoilo = $stmtpo->fetchAll();
                            foreach ($portfoilo as $po) {
                                ?>
                                <div class="col-3 ">
                                    <img src="upload/port/<?= ($po['PortfoiloImg']) ?>" class="rounded w-100 h-100 position-relative" alt="...">
                                    <h6 class="hover font-color-2 bg-color-9 px-4 font-700  py-3 text-center mb-3"><?= ($po['PortfoiloTitle']) ?> </h6>
                                </div>
                            <?php } ?>

                        </div>



                    </div>
                </div>
            </div>
        </section>

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
ob_end_flush();
?>
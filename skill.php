<?php
ob_start();
session_start();
include 'init.php';
$pageTitle = 'المهارات';
include $tempDir . 'header.php';
if (isset($_GET['skills'])) {
    if (!empty($_GET['skills'])) {
        if (cheak('`User_id`', '`users`', '`User_id` = "' . $_GET['skills'] . '"')) {
            $stmt = $con->prepare("SELECT `user_skillID` FROM `user_skill` WHERE `userID_skill` = '" . $_GET['skills'] . "'");
            $stmt->execute();
            $skills = $stmt->fetchAll();
            $numItems = count($skills);
            $j = 0;
            $SQLSection = "(`SkillID` = ";
            foreach($skills as $x){
                if(++$j === $numItems) {
                    $SQLSection = $SQLSection . $x['user_skillID'] . " )";
                    }
                    else{
                        $SQLSection = $SQLSection . $x['user_skillID'] . " OR `SkillID` = ";
                    }
                    
            }
            $stmt = $con->prepare("SELECT * FROM `skills` WHERE " .  $SQLSection);
            $stmt->execute();
            $skill = $stmt->fetchAll();
            if(isset($_SESSION['ID'])){
                    if( $_GET['skills'] == $_SESSION['ID'] ){ 
                        $numItems = count($skills);
            $j = 0;
            $SQLSection = "(`SkillID` != ";
            foreach($skills as $x){
                if(++$j === $numItems) {
                    $SQLSection = $SQLSection . $x['user_skillID'] . " )";
                    }
                    else{
                        $SQLSection = $SQLSection . $x['user_skillID'] . " AND `SkillID` != ";
                    }
                    
            }
                        $stmt = $con->prepare("SELECT * FROM `skills` WHERE " .  $SQLSection);
                        $stmt->execute();
                        $skillSelect = $stmt->fetchAll();
                        echo "<div class='mt-4 container'><button type='button' data-toggle='modal' data-target='#exampleModal1' class='btn btn-primary btn-lg rounded-0 btn-block bg-color-2'>إضافه مهاره</button></div>";
                        ?>
                        <!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="modal-content" action="?do=insert" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">اضف مهارتك</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <select class="btn-block" name="name">
        <?php
        foreach($skillSelect as $z){
            echo '<option value="'.$z['SkillID'].'">'.$z['SkillName'].'</option>';
        }
        ?>
        </select>
      </div>
      <div class="modal-footer">
        <input type="submit" value="اضف" name="add" class="btn btn-primary btn-block">
      </div>
    </form>
  </div>
</div>
                        <?php
                    }
                }
                echo'<div class="mb-5">
                        <div class="container">
                            <div class="row">';
                    foreach ($skill as $x) {
?>
            <div class="col-6 col-md-3 my-5"><?php

            if (isset($_SESSION['Username'])) {
                if( $_GET['skills'] == $_SESSION['ID'] ){
                    echo' <button type="button"  class="w-100 btn btn-lg btn-block btn-outline-danger" data-toggle="modal" data-target="#exampleModal2">حذف</button>';
                ?>
                <!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">اضف مهارتك</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
متاكد من انه       سيتم حذف المهاره من صفحتك الشخصيه
      </div>
      <div class="modal-footer">
        <a href="?do=delete&mys=<?=($x['SkillID'])?>" class="btn btn-primary">نعم</a>
      </div>
    </div>
  </div>
</div>
                <?php
                }
            }
            ?>
                <img src="upload\skills\<?=($x['SkillImg'])?>" class="w-100 h-100" alt="<?=($x['SkillName'])?>" title="<?=($x['SkillName'])?>"/>
            </div>    
<?php
            }
            echo "</div></div></div>";
        } else {
            header('Location: index.php');
            exit();
        }
    } else {
        header('Location: index.php');
        exit();
    }
} elseif (isset($_GET['do'])) {
    if (isset($_SESSION['Username'])) {
        if ($_GET['do'] == 'insert') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $_POST['name'];
                $stmt = $con->prepare("INSERT INTO `user_skill` (`user_skillID`, `userID_skill`) VALUES (:zid, :zuser)");
                    $stmt->execute(array(
                        'zid' => $name,
                        'zuser' => $_SESSION['ID']
                    ));
                    $url = "skill.php?skills=" . $_SESSION['ID'];
                    header('Location: ' . $url);
                    exit();
                }
            }elseif ($_GET['do'] == 'delete') {
            if (isset($_GET['mys'])) {
                if (!empty($_GET['mys'])) {
                    if (cheak('*', '`user_skill`', "`user_skillID` = '" . $_GET['mys'] . "' AND `userID_skill` = '" . $_SESSION['ID'] . "'")) {
                        $stmt = $con->prepare("DELETE FROM `user_skill` WHERE `user_skillID` = :zid");
                        $stmt->bindParam(":zid", $_GET['mys']);
                        $stmt->execute();
                        $url = "skill.php?skills=" . $_SESSION['ID'];
                        header('Location: ' . $url);
                    } else {
                        $url = "skill.php?skills=" . $_SESSION['ID'];
                        header('Location: ' . $url);
                        exit();
                    }
                } else {
                    $url = "skill.php?skills=" . $_SESSION['ID'];
                    header('Location: ' . $url);
                    exit();
                }
            } else {
                $url = "skill.php?skills=" . $_SESSION['ID'];
                header('Location: ' . $url);
                exit();
            }
        }
            }  else {
            header('Location: index.php');
            exit();
        }
    }else {
    header('Location: index.php');
    exit();
}
?>
<?php
include $tempDir . 'footer.php';
ob_end_flush();
?>
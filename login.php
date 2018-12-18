<?php 
    include 'init.php';

    $pageTitle = 'تسجيل الدخول';
    
    include $tempDir . 'header.php';
?>

<!-- But Yur Code Here -->

<header>
 <div class="over"></div>

<div class="container ">
            <div class="row ">
                <div class="col-md-3 c">
                    <h2 ><span class="badge badge-danger "> تسجيل الدخول </span></h2> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 ">
                    <div class="loginbox">
                    <form class="container login">
                        <div class="form-group ">
                            <input type="email" class="form-control login" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="البريد الإلكتروني ">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="الرقم السري">
                        </div>
                        <div class="form-group">
                            <a href="#"> هل نسيت كلمة السر؟</a>
                        </div>
                         <button type="تسجيل الدخول" class="btn btn-danger" style="width:20rem">تسجيل الدخول</button>
                    </form>
                    </div>
                </div>
           </div>

    
<?php
    include $tempDir . 'footer.php';
?>
<?php

	/*
	================================================
	== Template Page
	================================================
	*/

	ob_start(); // Output Buffering Start

	session_start();

	$pageTitle = 'الخدمات';

	if (isset($_SESSION['Username'])) {

        include 'init.php';
        
        include $tempDir . 'header.php';

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
                                <option value="1">برمجه</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
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
                            <?php if(isset($loginError)){?>
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
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $adsName = $_POST['adsName'];
                $cats = $_POST['cats'];
                $det = $_POST['det'];
                $price = $_POST['salry'];
                $time = $_POST['time'];

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

				foreach($formErrors as $error) {
					echo '<div class="alert alert-danger">' . $error . '</div>';
				}

                // Check If There's No Error Proceed The Update Operation

				if (empty($formErrors)) {

					// Insert Userinfo In Database

					$stmt = $con->prepare("INSERT INTO `services` (`id_services`, `service_title`, `service_des`, `service_needTime`, `service_time`, `service_money`, `sections_services`, `user_id`) VALUES  
                    (:zid, :zname, :zdes, :ztime, now(), :zprice, :zcats , :zuser)");

                    $stmt->execute(array(
                        'zid' => randomString(11),
						'zname' 	=> $adsName,
                        'zdes' 	    => $det,
                        'ztime'      => $time,
						'zprice' 	=> $price,
						'zcats' 	=> $cats,
						'zuser' 	=> $_SESSION['ID']
                        )
                );
                    

					// Echo Success Message

					$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Inserted</div>';

                }
                
            }else {

                echo "<div class='container'>";

                $theMsg = '<div class="alert alert-danger">Sorry You Cant Browse This Page Directly</div>';
    
                echo "</div>";

            }

		} elseif ($do == 'Edit') {


		} elseif ($do == 'Update') {


		} elseif ($do == 'Delete') {


		}

        include $tempDir . 'footer.php';

	} else {

		header('Location: sing.php');

		exit();
	}

	ob_end_flush(); // Release The Output

?>
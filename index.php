<?php 

    session_start();

    if (isset($_SESSION['Username'])) {
        header('Location: dashboard.php'); // Redirect To Dashboard Page
        exit();
    }

    include 'init.php';

    $pageTitle = 'الرئيسيه';
    
    include $tempDir . 'header.php';

?>
<!-- But Your Code Here -->
    <header>
        <!-- section 1-->
        <div class="over"></div>
        <div class="container position-relative">
            <div class="d-flex align-items-center font-cairo">
            <p class="font-color-2 f-70"> <span class="font-color-1 f-85 ">انجز </span>مشاريعك <br> بالاعتماد على <br> توظيف مستقلين <br> محترفين </p> 
            </div>
        </div>
        <!-- section 2-->
        <div class="bg-light">
            <div class="container ">
               
            <div class="row">
                <div class="col c">
                    <h2 ><span class="badge badge-danger "> لماذا نحن </span></h2>
                </div>
            </div>
            <div class="row c">
                <div class="col-md-7">
                    <div class="row">
                       <div class="col "> 
                         <div class="card form-1 " style="width: 16rem;">
                         <i class="fas fa-walking icon2 "></i>
                         <div class="card-body">
                         <h5 class="card-title text-center">نفذمشاريعك بسهوله </h5>
                         <p class="card-text text-center">اطرح مشروعك واترك مهمة تنفيذه لأفضل خبراء الوطن العرب
                         </div>
                         </div>  
                       </div>
                       <div class="col">
                         <div class="card form-1" style="width: 16rem;">
                         <i class="fas fa-handshake icon2 "></i>
                         <div class="card-body">
                         <h5 class="card-title text-center ">وظُف أفضل المستقلين </h5>
                         <p class="card-text  text-center">زر ملفات المستقلين ,اطلع علي أعمالهم السابقة وظف الافضل </p>
                         </div>
                         </div>
                       </div>    
                   </div> 
                    <div class="row c">
                       <div class="col ">
                          <div class="card form-1" style="width: 16rem;">
                          <i class="fab fa-amazon-pay icon2"></i>
                          <div class="card-body">
                          <h5 class="card-title text-center ">ادفع بكل أريحية  </h5>
                          <p class="card-text  text-center">  لن تدفع سوى مقابل مايتم إنجازه من وظائف </p>
                          </div>
                          </div>
                       </div>
                       <div class="col ">
                          <div class="card form-1" style="width: 16rem;">
                          <i class="fas fa-fighter-jet icon2"></i>
                          <div class="card-body">
                          <h5 class="card-title text-center">انجز أعمالك بسرعه  </h5>
                          <p class="card-text text-center">اختر أفضل المستقلين وأرسل له الوظيفة مباشرة   </p>
                          </div>
                          </div>
                       </div>  
                    </div>
                </div>
                
                
                
                <div class="col-md-4">
                     <img src="<?=($imgDir)?>lady.png" width="560" height="450" alt="">
                </div>
            
            </div>
        
        </div>
            
        </div>
       
        
        
        
        
        
        
         <div class="container">
         <div class="box">
                <p class="font-color-2 f-10 font-cairo text-center"> <span class="font-color-1 f-30">إبحث</span>عن خدمات لتنجزها  </p> 
                    <form>
                        
                        <div class="row">
                        <div class="col">
                        <div class="form-group">
                           <select class="form-control bg-dark font-color-2 " id="exampleFormControlSelect1">
                           <option >القسم/option>
                           <option>برمجة </option>
                           <option>تسويق </option>
                           <option>ترجمة</option>
                           <option>تصميم</option>
                           </select>
                           </div>
                        </div>
                        <div class="col">
                              <button type="إبحث" class="btn btn-dark font-color-2">إبحث</button>

                        </div>
                </div>  
             </form>
        </div>
        
        </div> 
        
    </header>
<?php
    include $tempDir . 'footer.php';
?>
<div class="clearfix"></div>
   <footer class=" bg-color-4">
    <div class="container">
        <div class="row text-white text-center text-md-left py-5 py-md-0">
                    <div class="col-lg-3 col-md-6 col-sm-12 py-md-5 pl-md-3">
                    <h2 class="f-30">شغلانه</h2>
                       <ul class="list-unstyled">
                           <li><a href="about.php" class=" text-white">من نحن</a></li>
                           <li><a href="#" class="text-white">تواصل معنا</a></li>
                           <li><a href="#" class="text-white">سياسه الاستخدام</a></li>
                           <li><a href="#" class="text-white">كيف تضمن حقك</a></li>
                           <li><a href="#" class="text-white">الشكاوي</a>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 py-md-5 px-md-2">
                    <h2 class="f-30">اقسام الموقع</h2>   
                       <ul class="list-unstyled"> 
                          <li><a href="#" class="text-white">برمجه</a></li>
                          <li><a href="#" class="text-white">تصميم</a></li>
                          <li><a href="#" class="text-white">تسويق</a></li>
                          <li><a href="#" class="text-white">خدمات ترجمه</a></li>
                          <li><a href="#" class="text-white">خدمات اخري</a></li>
                        </ul>
                    </div>
                   <div class="col-lg-3 col-md-6 col-sm-12 py-md-5 px-md-2">
                   <h2 class="f-30">وسائل الدفع</h2>
                        <ul class="list-unstyled"> 
                          <li><a href="https://www.paypal.com/us/home" class="text-white f-3" ><i class="fab fa-cc-paypal"></i></a></li> 
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 py-md-5 px-md-2">   
                    <h2 class="f-30">تابعنا</h2>
                        <ul class="p-0">
                           <li class=" d-inline"><a href="https://fb.com" class="text-white mr-2 f-2" ><i class="fab fa-facebook"></i></a></li>
                           <li class="d-inline"><a href="https://twitter.com" class="text-white mr-2 f-2 " ><i class="fab fa-twitter-square"></i></a></li>
                           <li class="d-inline" ><a href="https://instagram.com" class="text-white f-2" ><i class="fab fa-instagram"></i></a></li>
                        
                        </ul>
                    </div>
          </div> 
     </div>
    
     <div class="copyright w-100 bg-color-5 text-white" >
       <div class="container py-3">
          حقوق الملكية 2019 
       </div>
     </div>
    
</footer>  
                    
       
        <script src = "<?=($jsDir)?>jquery.js" ></script>
        <script src = "<?=($jsDir)?>jquery-ui.min.js" ></script>
        <script src = "<?=($jsDir)?>popper.min.js" ></script>
        <script src = "<?=($jsDir)?>bootstrap.min.js" ></script>
        <!--Upload Btn Plg-->
        <script src = "<?=($jsDir)?>input-file.js" ></script>
        
        <!--Typed.js is a library that types Plg-->
        <script src = "<?=($jsDir)?>typed.min.js" ></script>
        <!--My Js-->
        <script src = "<?=($jsDir)?>main.js" ></script>
        <script>
        <?php 
            $MinNum = 10;
            $MaxNum = 4500;
         if (isset($_GET['money'])) {
            $_GET['money'] = str_replace("$", "", $_GET['money']);
            $_GET['money'] = str_replace(" ", "", $_GET['money']);
            $pieces        = explode("-", $_GET['money']);
            $pieces[0]     = (int) $pieces[0];
            $pieces[1]     = (int) $pieces[1];
            $MinNum = $pieces[0];
            $MaxNum = $pieces[1];
        }
        ?>
         $("#range-price").slider({
        range: true,
        min: 10,
        max: 5000,
        values: [<?=($MinNum)?>, <?=($MaxNum)?>],
        slide: function (event, ui) {
            $("#price").val("$" + ui.values[0] + " - " + " $" + ui.values[1]);
        }
    });

    $("#price").val("$" + $("#range-price").slider("values", 0) +
        " - " + " $" + $("#range-price").slider("values", 1));
        </script>

    </body>
</html>
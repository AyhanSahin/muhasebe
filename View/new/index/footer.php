   <footer id="footer-block"> 
       <?php $foter = $this->help("footer");
    $x = $foter->deneme(); 
    $sm = $foter->sosyal();
    ?> 
            <div class="social">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="socials">
                    
                                <a  target="_new"href="<?php echo $sm->facebook;?>"><i class="fa fa-facebook"></i></a>
                                <a target="_new" href="<?php echo $sm->twitter;?>"><i class="fa fa-twitter"></i></a>
                                <a  target="_new"href="<?php echo $sm->instagram;?>"><i class="fa fa-instagram"></i></a>
                                <a target="_new" href="<?php echo $sm->google;?>"><i class="fa fa-youtube"></i></a>
                            </div>   
                        </div>
                        <div class="col-md-6">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-information">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="header-footer">
                                <h3>HAKKIMIZDA</h3>
                            </div>
                            <ul class="footer-categories list-unstyled">
                                <li><a target="_new" href="<?php SELF::go("sozlesmeler/hakkimizda") ?>">Hakkımızda</a></li>
                                <li><a target="_new" href="<?php SELF::go("sozlesmeler/gizlilik") ?>">Gizlilik Politikası</a></li>
                                <li><a target="_new" href="<?php SELF::go("sozlesmeler/kisisel_Verilerin_Korunmasi") ?>">Çerez Politikası</a></li>

                            </ul>
                        </div>
                        <div class="col-md-3">
                            <div class="header-footer">
                                <h3>SÖZLEŞMELER</h3>
                            </div>
                            <ul class="footer-categories list-unstyled">
                                <li><a target="_new" href="<?php SELF::go("sozlesmeler/kurumsal") ?>">Satıcı Sözleşmesi</a></li>
                                <li><a target="_new" href="<?php SELF::go("sozlesmeler/bireysel") ?>">Kullanıcı Sözleşmesi</a></li>                
                                <li><a target="_new" href="<?php SELF::go("sozlesmeler/mesafeli") ?>">Mesafeli Satış Sözleşmesi</a></li>
                                <li><a target="_new" href="<?php SELF::go("sozlesmeler/iptal_ve_iade") ?>">İptal ve İade Koşulları </a></li>

                            </ul>
                        </div>
                        <div class="col-md-3">
                              <div class="header-footer">
                                <h3>ÖDEME YÖNTEMLERİ</h3>
                            </div>
                            <ul class="footer-payments pull-left">
                                <li><img src="<?php echo SKIN ; ?>new/img/payment-maestro.jpg" alt="payment" /></li>
                                <li><img src="<?php echo SKIN ; ?>new/img/payment-visa.jpg" alt="payment" /></li>
                                <li><img src="<?php echo SKIN ; ?>new/img/payment-american-express.jpg" alt="payment" /></li>
                                <li><img src="<?php echo SKIN ; ?>new/img/iyzico.jpg" alt="payment" /></li>
                            </ul>


                        </div>
                        <div class="col-md-3">
                            <div class="header-footer">
                                <h3>İLETİŞİM</h3>
                            </div>
                            <p><strong>Telefon: <?php  echo $x->telefon; ?></strong><br>
                                <strong>Email: </strong><?php  echo $x->email; ?></p>
                            <p><strong><?php echo $_SERVER["HTTP_HOST"]; ?></strong><br></p>
                            
                        </div>
                    </div>
                </div>
            </div>

      
        </footer>
        <!-- End Section footer -->

        <script src="<?php echo SKIN ; ?>new/js/vendor/jquery.easing.1.3.js"></script>
        <script src="<?php echo SKIN ; ?>new/js/vendor/bootstrap.js"></script>

        <script src="<?php echo SKIN ; ?>new/js/vendor/jquery.flexisel.js"></script>
        <script src="<?php echo SKIN ; ?>new/js/vendor/wow.min.js"></script>
        <script src="<?php echo SKIN ; ?>new/js/vendor/jquery.transit.js"></script>
       
        <script src="<?php echo SKIN ; ?>new/js/vendor/jquery.jPages.js"></script>
        <script src="<?php echo SKIN ; ?>new/js/vendor/owl.carousel.js"></script>

        <script src="<?php echo SKIN ; ?>new/js/vendor/responsiveslides.min.js"></script>
        <script src="<?php echo SKIN ; ?>new/js/vendor/jquery.elevateZoom-3.0.8.min.js"></script>

        <!-- jQuery REVOLUTION Slider  -->
        <script type="text/javascript" src="<?php echo SKIN ; ?>new/js/vendor/jquery.themepunch.plugins.min.js"></script>
        <script type="text/javascript" src="<?php echo SKIN ; ?>new/js/vendor/jquery.themepunch.revolution.min.js"></script>
        <script type="text/javascript" src="<?php echo SKIN ; ?>new/js/vendor/jquery.scrollTo-1.4.2-min.js"></script>

        
      <link rel="stylesheet" type="text/css" href="<?php echo SKIN ; ?>source/semantic.min.css">
 
<script src="<?php echo SKIN ; ?>source/semantic.min.js"></script>          
        
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
        <!-- Custome Slider  -->
        <script src="<?php echo SKIN ; ?>new/js/main.js"></script>
        <script src="<?php echo SKIN ; ?>new/js/libs.js"></script>


<script>
    function addProductNotice(title, thumb, text, type) {
        
        $.jGrowl.defaults.closer = false;
        //Stop jGrowl
        //$.jGrowl.defaults.sticky = true;
        var tpl = thumb + '<h3>'+text+'</h3>';
        $.jGrowl(tpl, {		
                life: 4000,
                header: title,
                speed: 'slow',
                theme: type
        });
        
        
    }
    function sepetupdate(){
        $.post( "<?php SELF::go('index/sepetreplace'); ?>", function( data ) {
             $( "#headcartref" ).html( data );
           }); 
        
         
    } 
function removecls(){$('.sepetekleniyor').removeClass("sptok"); }
    function cartadd(id,resim){
        $('.sepetekleniyor').addClass("sptok");
        var myKeyVals = { uid : id , resim : resim};

            var url = "<?php SELF::go('index/indexsepetekle'); ?>";
          $.post( url , myKeyVals)
        .done(function( sonuc ) {
      
            if(sonuc != 2){
                 addProductNotice(sonuc, '<img src="'+resim+'" alt="">', '<h3>Ürün sepete eklendi</h3>', 'success');
         
            sepetupdate();
         
            }

            else if(sonuc == 2) {
                addProductNotice('', '<img src="'+resim+'" alt="">', '<h3>Yeterli ürün stoğu bulunmamaktadır. </h3>', 'error');
            }
            else { addProductNotice('', '<img src="'+resim+'" alt="">', '<h3>Sepete eklenirken, Sorun Oluştu </h3>', 'error');}
          window.setTimeout( removecls, 1000 ); // 5 seconds
           });        
    }
	var wishlist = {
		'add': function(id,resim,baslik) {
               
                favekle(id,resim,baslik);
                
                
                    //// login olmuşmu kontrol et 
                    // daha onceden eklimi kantrol et
                    
                    // logınse ve daha onceden eklenmemısse ekle
		}
	}
        
     
      function favekle(id,resim,baslik){
            var url = "<?php SELF::go('user/favekle/ilan_id/'); ?>"+id;
          $.post( url)
  .done(function( sonuc ) {
      
     if(sonuc == 1){
addProductNotice(baslik, '<img src="' +resim+ '" alt="">', '<h3>  added to Favorite</h3>', 'success');
  
     }
     
     else if(sonuc == 2){
	addProductNotice(baslik, '<img src="' +resim+ '" alt="">', '<h3>  Added before</h3>', 'error');

     }
        else if(sonuc == 3){
addProductNotice(baslik, '<img src="' +resim+ '" alt="">','<h3><a href="<?php SELF::go('user/login');?>"><i class="fa fa-pencil-square-o"></i> Login</a> or <a href="<?php SELF::go('user/kayit');?>"><i class="fa fa-user"></i> Register</a></h3>', 'error');

     }
  });        
    }
           
</script>
        
               <div class="cookie-info" style="height: 102px; width: 340px; border-radius: 4px; background-color: rgb(0, 0, 0); z-index: 9999; position: fixed; left: 20px; bottom: 18px;">
                    <img onclick="arbtcookie()" src="<?php echo SKIN ; ?>web/images/close.png" style="position: absolute; top: 0px; right: 0px; padding: 8px; cursor: pointer;">
                        <div class="text" style="font-family: Helvetica; font-size: 12px; line-height: 1.25; text-align: left; color: rgb(255, 255, 255); padding-top: 24px; padding-left: 16px; padding-right: 24px; margin-bottom: 8px;">
                            <span>Alışveriş deneyiminizi iyileştirmek için yasal düzenlemelere uygun çerezler (cookies) kullanıyoruz. Detaylı bilgiye </span>
                            <a class="link" href="https://honaz.otomobilpazaryeri.com/sozlesmeler/kisisel_Verilerin_Korunmasi" target="_blank" rel="nofollow" style="font-family: Helvetica; font-size: 11px; font-weight: bold; text-align: left; color: rgb(255, 255, 255); text-decoration: underline;">Gizlilik ve Çerez Politikası</a>
                            <br>
                            <span> sayfamızdan erişebilirsiniz.</span>
                        </div>
                </div>
    </body>
</html>
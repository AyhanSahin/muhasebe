 <?php 
  $alici = $this->session->get("user_id");
 $uye = $cls->uyeadres($alici); 
 

 ?>
 
     
      <script type="text/javascript">
        var asd = 1;
     $( document ).ready(function() {
    $(".responsive").hide();
    
    $("#gz").click(function(){
   if(asd == 1){
      $(".responsive").show();  
      asd = 2;
  }
  else{
      $(".responsive").hide();
      asd = 1;
  }
   
        
    });
});   
       
        
         $( window ).on( "load", function() {
        <?php if(!$uye) { echo "$('.demo').hide();"; } ?>
    });
        var kb;
    function kaydet(){
        if(kb==1){ return false;}
        var Adres = $("#Adres").val();
        var il = $("#il").val();
        var ilce = $("#ilce").val();
        var mahalle = $("#mahalle").val();
        var user = <?php echo $alici; ?>;
        
        if(!il || !ilce || !Adres){
           $("#mesaj").html('<div class="alert alert-danger" role="alert">Eksik alanları doldurununz</div>');
            return false;
        }
        else{
            $.ajax({
            method: "POST",
            url: "<?php echo self::go('user_ajax/uyeadreskaydet'); ?>",
            data: { adres: Adres, ilid:il,ilceid:ilce,mahalleid:mahalle,user_id:user}
            }).done(function(a) {
        if(a==1){
            kb = a;
            $('.demo').show();
            $("#mesaj").html('<div class="alert alert-success" role="alert">Başarılı</div>');
      setTimeout(function(){ location.reload();}, 1000);
        }
        else{
            $("#mesaj").html('<div class="alert alert-danger" role="alert">Kayıt başarısız oldu</div>');
        }
              }); 
        }
    }
 
    function ilce_getir(e){
        $.ajax({
          method: "POST",
          url: "<?php echo self::go('user_ajax/ilce'); ?>",
          data: { id: e}
        })
         .done(function( html ) {
            $( "#ilce" ).html( html );
     
          }); 
    }
    function mahallex(e){
        $.ajax({
          method: "POST",
          url: "<?php echo self::go('user_ajax/mahalle'); ?>",
          data: { id: e}
        })
         .done(function( html ) {
    $( "#mahalle" ).html( html );
          });
  }   

</script>
        <section>
            <div class="second-page-container">
                <div class="block">
                    <div class="container">
                        <div id="mesaj"></div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="row">
                                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="block-form box-border wow fadeInLeft" data-wow-duration="1s">
                                            <h3><i class="fa fa-truck"></i> Teslimat adresiniz</h3>
                                            <hr>
                                        
                                                <div class="row">
                                                    
                                           
                                                    
                                                    <div class="col-md-12">
                                                        <label>Your Country</label>
      <select id="il" class="form-control multipleSelect"  data-live-search="true"  onchange="ilce_getir(this.value)">
          <option>Seçiniz</option>
        <?php $ils = $cls->il();
        foreach($ils as $il): ?>
           <option value="<?php echo $il->id; ?>" <?php if($uye->il_id == $il->id) echo 'selected'; ?>><?php echo $il->il_adi; ?></option>     
    <?php endforeach; ?>
     </select>
    </div>
        <div class="col-md-12">
            <label>Your Region</label>
      <select id="ilce" class="form-control" onchange="mahallex(this.value)">
       <?php 
       if($uye->il_id):
       $ilces = $cls->ilce_x($uye->il_id); 
    foreach($ilces as $ilce): ?>
  <option value="<?php echo $ilce->id; ?>" <?php if($uye->ilce_id == $ilce->id) echo 'selected'; ?>><?php echo $ilce->ilce_adi; ?></option>     
    <?php endforeach;  endif; ?>

      </select>
           </div>
                                                    
                                                    
        <div class="col-md-12">
            <label> <?php echo " _ "; ?></label>
      <select id="mahalle" class="form-control">
 <?php 
if($uye->mah_id):
        $mh = $cls->mahalle_x($uye->mah_id);  
  
     ?>
 <option value="<?php echo trim($mh->id); ?>"><?php echo $mh->mahalle; ?> / <?php echo $mh->semt; ?></option>     
    <?php 
    
endif;?>   
      </select>
      
           </div>  

        
        <div class="col-md-12">
            <label>Adres</label>
    <input type="text" class="form-control" id="Adres" value="<?php echo $uye->adres; ?>" placeholder="1234 Main St" autocomplete="nope" />
         </div>
                                                    
                                                    
                                                    
                            <div class="col-md-12">
                                
            <button id="kayit" class="btn-default-1"  onclick="kaydet()" >Adres Güncelle</button> 
                           
                            </div>
                        </div>                                    
                
                </div>
            </article>
        </div>
    </div>
                        
 <?php   
 
 $taksit = 12;
 $length = 10;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
     

 $kur = $this->help("kur");                       
 $sepet = $this->session->sepet_get();
$sayac = 0; $toplam = 0;
foreach ($sepet as $key ) { 
    $ilanid = $key["id"];
    
     $ilan = $api::ilangoster($ilanid); 
 $taksitx = $cls->kategoritaksit($ilan->kategori);
     if($taksitx && $taksitx < $taksit){
        $taksit =  $taksitx;
     }
     
     // taksit kategori kontrol edilip en küçük olan baz alınır
     //
     //  KOD BURAYA YAZILACAK
     //
 
   for($i=0;$i<$key["adet"];$i++){
   
   if($key["kur"] == "TL"){
    
        $tl =  $key["fiyat"] ;
    }
    if($key["kur"] == "USD"){

        $tl =  ceil($key["fiyat"] * $kur->DolarSatis); 
    }
    if($key["kur"] == "EURO"){

        $tl =  ceil($key["fiyat"] * $kur->EuroSatis);
    }
    if($key["kur"] == "GBP"){

        $tl =  ceil($key["fiyat"] * $kur->GbpSatis);
    }    

  $toplam = $tl + $toplam;
  $ilanx[$sayac]["id"] =  $ilanid ;
  $ilanx[$sayac]["ad"] =  $key["baslik"] ;  
  $ilanx[$sayac]["fiyat"] =  $tl ;
  $ilanx[$sayac]["k1"] =  $cls->katgid($ilan->k1)->kategori_adi ;
  $ilanx[$sayac]["k2"] =  $cls->katgid($ilan->k2)->kategori_adi ;
  $ilanx[$sayac]["setSubMerchantKey"] =  SELF::api("user/pazaryeriilan")::saticipkey($ilan->user_id);  
  $ilanx[$sayac]["setSubMerchantPrice"] =  SELF::api("user/pazaryeriilan")::komisyon($tl);      
       
       
  $sayac++;
  
  

}
    
}

 
 if($taksit > 1 && $taksit <= 3){
     
  $taksit = array(1 , 2);  
 }
 elseif($taksit > 3 && $taksit <= 6){
     
  $taksit = array(2, 3, 6);  
 }
         
 elseif($taksit > 6 && $taksit <= 9){
     
  $taksit = array(2, 3, 6, 9);  
 }  
 
  elseif($taksit > 9 && $taksit <= 12){
     
  $taksit = array(2, 3, 6, 9 , 12);  
 } 
 else $taksit = array(1);  
 ?>                      
                        
                        
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" style="display: none">
                                <div class="row">
                                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="block-form box-border wow fadeInLeft" data-wow-duration="1s">
                                            <h3><i class="fa fa-tag"></i>İNDİRİM KODU</h3>
                                            <hr>
                                            <form action="#" method="post">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Kod</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="submit"  value="Apply Coupon"  class="btn-default-1">
                                                    </div>
                                                </div>                                    
                                            </form>
                                        </div>
                                    </article>
                  
                                </div>
                            </div>
           <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
                                <div class="row">
                                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">          
                                            <br>
<div style="demo">


 
<?php

 
    if($uye){
     // if($odeme->iyzico == 1 and $uye){
       $userdetay = $api::userdetay($alici);

       $iyzipayapi = new stdClass();	

      global $iyzipayapi ;
     
      $iyzipayapi = $api::iyzico(); 
      $iyzipayapi->aliciid = $alici;
      $iyzipayapi->adet =  $sayac  ;
      $iyzipayapi->toplamfiyat =  $toplam;
      $iyzipayapi->ilanx =  $ilanx;
      $iyzipayapi->sipno =  $randomString;
      $iyzipayapi->il =  $cls->ilismi($uye->il_id);
      $iyzipayapi->ilce = $cls->ilceismi($uye->ilce_id);  
      $iyzipayapi->adres = $cls->mahismi($uye->mah_id)->mahalle ." / ".$uye->adres;
   
 
      $iyzipayapi->email =  $userdetay->email;
      $iyzipayapi->name =  $userdetay->name;
      $iyzipayapi->surname =  $userdetay->surname;
      $iyzipayapi->tel =  $userdetay->mobilePhone;
      $iyzipayapi->tc =   $userdetay->tcNo;
      $iyzipayapi->setRegistrationDate =  $userdetay->uyelikdate;
      $iyzipayapi->tkst =  $taksit;
 




     $iyzipayapi->calbackuri =  SITE."/ilan/gavodemeiyzico/ilan_id/$ilanid/tutar/$toplamtutar/adet/$adet/user_id/$alici";
     //var_dump($iyzipayapi);
    //exit;

     $this->FileIn("iyzipay/samples/gavodeme");

        ?>


        <div class="col-md-12">

     <label style=" cursor: pointer" for="gz">(ALIŞ VERİŞE DEVAM ETMEK İÇİN ONAYLAMINIZ GEREKMEKTEDİR) OKUDUM, ONAYLADIM </label>
        <a href="<?php echo self::go('user_ajax/pazaryeri_alici_anlasma'); ?>" target="new"  class="form-control"> 
            <input type="checkbox" name="gz" id="gz" >Sanal Platform Kullanım Çerçeve Sözleşmesi</a>


        </div> 

      <div class="col-md-12">

<?php //var_dump($iyzipayapi);  ?>
    <div id="iyzipay-checkout-form" class="responsive"></div>

    </div>







    <?php   }  ?>

 

   

			
    
    </div>   
              
                                        
                       </article> 
                                     </div>
                </div>
                    </div>
                </div>
            </div>
    </section>
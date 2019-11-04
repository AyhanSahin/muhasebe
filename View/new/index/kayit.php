<script>
       $( document ).ready(function() {
    $('.multipleSelect').fastselect();




if (typeof navigator.cookieEnabled == "undefined" || !navigator.cookieEnabled) {
alert("Tarayıcınız cookie (çerez) ayarlarından, site için çerezleri kabul etmesi için izin vermelisiniz.");

}


});
  
 function goster(){
     $('#sifremiunuttum').modal('show');
}
 

function mailgonder(){
    var email = $("#email").val();
    
    $.ajax({
        method: "POST",
        url: "<?php SELF::go('user_ajax/usersifre') ?>",
        data: { email: email},
        beforeSend: function() {
              $(".preload").show();
           }
})
  .done(function( msg ) {
      if(msg==1){
          
          alert("Şifreniz mail adresine gönderildi.");
      }
      else {alert("Sorun Oluştu.! Daha sonra tekrar deneyiniz.");}
    
          $(".preload").hide(); 
     $('#sifremiunuttum').modal('hide');
     
  });
    
} 
  
  
  
  
  
  
  
  
  
  
  
  
 function ilcex(e){
        $.ajax({
          method: "POST",
          url: "<?php echo self::go('user_ajax/ilce'); ?>",
          data: { id: e}
        })
         .done(function( html ) {
            $( "#ilce" ).html( html );
    
     $( "#mahalle" ).html(" <option value=''>Mahalle Semt</option>");
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
       // $("#map_canvas").css( 'display', 'block' );
   
    
    
    
          });
          
          
          
          
    }         
          
          
          
          
          
          
          
          var a = 2;
  function recaptcha(){
      $.when( $.ajax({method: "POST",url: "<?php self::go('ayhanxx/recaptcha'); ?>"
      }).then(function( xxx ) {
      
           $("#cimage").html("");
          $("#cimage").html(xxx);
         
       
    
        })) 
  }  
/*  
  $( document ).ajaxStop(function() {
  $( ".log" ).text( "Triggered ajaxStop handler." );
});
  
  */
 
 
 
  function captcha(cp){ 
      
  return $("#captchahata").html("");
   $.ajax({method: "POST",url: "<?php self::go('ilan/captcha'); ?>",
       data: { captcha:cp }})
    
}          
          
  function emailkontrolk(em) {
      
$("#emailhata1").html("");
  $.ajax({method: "POST",url: "<?php self::go('ilan/mailkontrol'); ?>",
       data: { e_mail:em }}).then(function( xxx ) {
       if(xxx == 2){
          $("#emailhata1").html("<span style='color:red' >Bu email adresi daha önce kullanılmış</span>");
            $('#inputEMail').addClass('hata');
           a = 2;
       }
       
    
        })
}      
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
} 
      
    $(document).ready(function() {
       $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
          

}); var mailokx = 2 
function gonder() {
   // e.preventDefault();
    $("#inputPassword1hata").html("");
    
    var first_name = $('#inputFirstName').val();
    var last_name = $('#inputLastName').val();
    var email = $('#inputEMail').val();
    var inputPassword1 = $('#inputPassword1').val();
      var inputPhone = $('#inputPhone').val();
      var guvenlik = $('#guvenlik').val();
      
var isletme  = $('#isletme').val(); 
var unvan = $('#unvan').val();
var  il = $('#il').val();
var ilce = $('#ilce').val();
var  mahalle = $('#mahalle').val();
var  adres = $('#adres').val();
var   tc = $('#tc').val();
var   vergiD = $('#vergiD').val();
var   vergiNo = $('#vergiNo').val();
var   sabitTel1   = $('#sabitTel1').val();
  var   faaliyet   = $('#faaliyet').val();
  var mailok = 2;
 
  

    $(".form-control").removeClass('hata');

    if (first_name.length < 1) {
        a = 2; 
      $('#inputFirstName').addClass('hata');$('#inputFirstName').focus();
      return false;
    }
   
    if (last_name.length < 1) {
        a = 2; 
      $('#inputLastName').addClass('hata');$('#inputLastName').focus();
      return false;
    }
    
        
       if (email.length < 1) {
        a = 2; 
      $('#inputEMail').addClass('hata');$('#inputEMail').focus();
      return false;
    } 
    else {
        var def = validateEmail(email);
    /* console.log(def);*/
     
      if (!def) {
          a = 2; 
        $('#inputEMail').addClass('hata');$('#inputEMail').focus();
        return false;
      }
      else { 
          $("#emailhata1").html("");
          

       
      $.when($.ajax({method: "POST",url: "<?php self::go('ilan/mailkontrol'); ?>",
       data: { e_mail:email }})).then(function( xxx ) {
       if(xxx == 2){
          $("#emailhata1").html("<span style='color:red' >Bu email adresi daha önce kullanılmış</span>");
            $('#inputEMail').addClass('hata');
            $('#inputEMail').focus();
           a = 2;  mailokx = 2;
           return false;
       }else {a=1; mailokx = 1}

       
    
        });   
          
       
          
        
      }
     
    }
   
    
    
    
        if (!isletme) {
        a = 2; 
      $('#isletme').addClass('hata');$('#isletme').focus();
      return false;
    }  
    if (!unvan) {
        a = 2; 
      $('#unvan').addClass('hata');$('#unvan').focus();
      return false;
    }    
    if (!il) {
        a = 2; 
      $('#il').addClass('hata');$('#il').focus();
      return false;
    }    
    if (!ilce) {
        a = 2; 
      $('#ilce').addClass('hata');$('#ilce').focus();
      return false;
    }     
     if (!mahalle) {
        a = 2; 
      $('#mahalle').addClass('hata');$('#mahalle').focus();
      return false;
    }  
  
     if (!adres) {
        a = 2; 
      $('#adres').addClass('hata'); $('#adres').focus();
      return false;
    }     
    if (!faaliyet) {
        a = 2; 
      $('.fstControls').addClass('hata');
      return false;
    }else {$(".fstControls").removeClass('hata');}
  
      if (tc.length !== 11) {
        a = 2; 
      $('#tc').addClass('hata');
      $('#tc').focus();
      return false;
    }  
  
     if (vergiD == ""  && (isletme != "Ev Hanımı")) {
        a = 2; 
      $('#vergiD').addClass('hata'); $('#vergiD').focus();
      return false;
    }   
  
      if (vergiNo == "" && isletme == "Limited veya Anonim Şirketi" && vergiNo.length !== 10) {
        a = 2; 
      $('#vergiNo').addClass('hata');$('#vergiNo').focus();
      return false;
    }  
       if (sabitTel1 == "" &&  (isletme != "Ev Hanımı")) {
        a = 2; 
      $('#sabitTel1').addClass('hata');$('#sabitTel1').focus();
      return false;
    } 
    

    if (inputPassword1.length < 8) {
        a = 2; 
      $('#inputPassword1').addClass('hata');$('#inputPassword1').focus();
     $("#inputPassword1hata").html("<span style='color:red' >Şifre en az 8 karakterden oluşmalı</span>");
return false;
    } 

       
  if ($("#secim2").is(":checked") == false){
            a = 2;
            $('.checkbox').addClass('hata');
            return false;
        }else{
            $('.checkbox').removeClass('hata');
           
            a = 1;
        
        
        
    }     
    $("#captchahata").html("");
$.when($.ajax({method: "POST",url: "<?php self::go('ilan/captcha'); ?>",
       data: { captcha:guvenlik }})).then(function(xxx){
        

           if(xxx == 2){
        $("#captchahata").html("<span style='color:red' >Guvenlik kodunu kontrol ediniz.</span>");
        $('#guvenlik').addClass('hata');
        a = 2; }
    else {if(a==1 && mailokx == 1) { $('#first_form').submit(); }}
         
        
        
       } );

  }
</script>
<style>
    .hata {border:2px solid red !important;}
    
</style>    
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<section>
            <div class="second-page-container">
                <div class="block">
                    <div class="container">
                        <div class="header-for-light">
                            <h1 class="wow fadeInRight animated" data-wow-duration="1s"><a href="<?php self::go("index/home"); ?>" >ANA SAYFA </a><span>  Satıcı Olamak istiyorum</span></h1>
                        </div>
                        <div class="row">
                            <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="block-form box-border wow fadeInLeft animated" data-wow-duration="1s">
                                    <h3><i class="fa fa-user"></i>Kişisel bilgi</h3>
                                    <hr>
<form id="first_form" class="form-horizontal" role="form" method="post" action="<?php self::go('user/uyekayit'); ?>">
    <div class="form-group">
        <label for="inputFirstName" class="col-sm-3 control-label">First Name:<span class="text-error">*</span></label>
        <div class="col-sm-9">
            <input type="hidden" name="registrationType" value="KURUMSAL" />
            <input type="text"   name="name" placeholder="Adınız"  class="form-control" id="inputFirstName">
        </div>
    </div>
    <div class="form-group">
        <label for="inputLastName" class="col-sm-3 control-label">Last Name:<span class="text-error">*</span></label>
        <div class="col-sm-9">
            <input type="text" placeholder="Soyadınız"  name="surname"   class="form-control" id="inputLastName">
        </div>
    </div>
<div class="form-group">
        <label for="inputEMail" class="col-sm-3 control-label">E-Mail:<span class="text-error">*</span></label>
    <div class="col-sm-9">
        <input name="email"  placeholder="Email Adresiniz"  type="email" class="form-control" id="inputEMail">
         <div id="emailhata1">
        </div>
    </div>
</div>
    <div class="form-group">
        <label for="inputPhone" class="col-sm-3 control-label">Phone:</label>
        <div class="col-sm-9">
<input type="phone" class="form-control bfh-phone" name="mobilePhone"  placeholder="Telefon Numaranız" id="inputPhone"  value="" autocomplete="off">
        </div>
    </div>


  
  
  
  
    
    <div class="form-group">
        <label for="isletme" class="col-sm-3 control-label">İşletme Türü:</label>
        <div class="col-sm-9">
<select class="form-control" id="isletme"  name="ituru">
<option value="" >İşletme Türü</option>

<option value="Şahıs Şirketi">Şahıs Şirketi</option>
<option value="Limited veya Anonim Şirketi">Limited veya Anonim Şirketi</option>
<option value="Ev Hanımı">Ev Hanımı</option>
</select>
        </div>
    </div>    
    
    
    
     <div class="form-group">
        <label for="unvan" class="col-sm-3 control-label">Ticari Ünvan:</label>
        <div class="col-sm-9">
<input type="text" name="companyName"  class="form-control" placeholder="Ticari Ünvan" id="unvan"> 
        </div>
    </div>   
    
    
    
    
    <div class="form-group">
        <label for="il" class="col-sm-3 control-label">Şehir:</label>
        <div class="col-sm-9">

<select class="form-control" id="il" onchange="ilcex(this.value)" name="il" >
   <option value="">il seçiniz </option>
            <?php   foreach ($il as $il) : ?>

<option value="<?php echo $il->id; ?> "><?php echo $il->il_adi; ?></option>
                <?php    endforeach; ?>
</select>


        </div>
    </div>    
    
    
    
    
    
    
    
    <div class="form-group">
        <label for="ilce" class="col-sm-3 control-label">İlçe:</label>
        <div class="col-sm-9">

<select class="form-control" id="ilce"  onchange="mahallex(this.value);"  name="ilce" >
<option>İlçe Seçiniz</option>

</select>


        </div>
    </div>    
    
    
    
    
    
    
    <div class="form-group">
        <label for="mahalle" class="col-sm-3 control-label">Mahalle:</label>
        <div class="col-sm-9">
<select class="form-control" name="mahalle" id="mahalle">
<option>Mahalle</option>

</select>
        </div>
    </div>    
    
    
    <div class="form-group">
        <label for="adres" class="col-sm-3 control-label">Adres:</label>
        <div class="col-sm-9">
<textarea class="form-control" placeholder="Adres detayı" id="adres"  name="address"></textarea>
        </div>
    </div>       
    
    
    
    
     <div class="form-group">
        <label for="faaliyet" class="col-sm-3 control-label">Faaliyet:</label>
        <div class="col-sm-9">
            <select class="form-control multipleSelect" id="faaliyet"   name="category" multiple="multiple" data-live-search="true"  >
                                <?php foreach($sql->ilanktg() as $ktg): ?>
                                <option value="<?php echo $ktg->id; ?>"><?php echo $ktg->kategori_adi; ?></option>     
                              <?php endforeach; ?>
                                </select>        </div>
    </div>     
    

 
    
    
    
    
    
    

    <div class="form-group">
        <label for="tc" class="col-sm-3 control-label">TC No:</label>
        <div class="col-sm-9">
<input type="text" class="form-control"  name="tcNo" pattern="[0-9]{11}"  id="tc" placeholder="Tc Kimlik Numaranız">
        </div>
    </div>        
    
    <div class="form-group">
        <label for="vergiD" class="col-sm-3 control-label">Vergi Dairsi:</label>
        <div class="col-sm-9">
<input type="text" class="form-control"   name="vergiD" title="vergi dairesini giriniz." id="vergiD" placeholder="vergi dairesini giriniz.">
        </div>
    </div>        
        
    <div class="form-group">
        <label for="vergiNo" class="col-sm-3 control-label">Vergi No:</label>
        <div class="col-sm-9">
<input type="text" class="form-control"  id="vergiNo" name="vergiNo"   placeholder="Ticari unvanınıza ait 10 haneli vergi numaranızı giriniz.">
        </div>
    </div>            
    
    <div class="form-group">
        <label for="sabitTel1" class="col-sm-3 control-label">Sabit Tel:</label>
        <div class="col-sm-9">
<input type="text" class="form-control" id="sabitTel1" name="sabitTel1"  placeholder="Sabit Telefon Numaranız 1">
        </div>
    </div>        
    
    
     <hr>
   <div class="form-group" id="show_hide_password">
        <label for="inputPassword1" class="col-sm-3 control-label">Password: <span class="text-error">*</span></label>
        <div class="col-sm-7">
            <input type="password" name="password" class="form-control" id="inputPassword1">
        </div>
        <div style="padding: 11px 20px; font-size: x-large;"  class="col-sm-2"> 
<a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
</div>
        <div class="col-sm-3"></div>
                <div id="inputPassword1hata"  class="col-sm-9">
        </div>

</div>

            <div class="form-group">
        <label for="inputGuvenlik" class="col-sm-3 control-label">Captcha:</label>

<div class="col-sm-2" id="cimage">
<img src="<?php SELF::go('ayhanxx/captcha'); ?>" ></img>
</div>

<div class="col-sm-1">
<i class="fa fa-refresh" onclick="recaptcha()" style="cursor:pointer"></i>                                        
</div> 

        <div class="col-sm-6">
<input type="text" class="form-control" id="guvenlik" name="guvenlik"  placeholder="Resimdeki karakterleri yazınız" id="inputGuvenlik"  value="" autocomplete="off">
<div id="captchahata">

</div> 
        </div>
    </div>                                 






<div class="form-group">
<div class="col-sm-offset-3 col-sm-9">
<div class="checkbox">
<label>
<input id="secim2" type="checkbox"> 
<small>
<a href="<?php echo SITE; ?>/sozlesmeler/kurumsal" rel="nofollow" target="_blank">Kurumsal Üyelik Sözleşmesi</a>'ni ve  <a href="<?php echo SITE; ?>/sozlesmeler/gizlilik" rel="nofollow" target="_blank">Gizlilik Politikası</a>'nı  kabul ediyorum.</small>
</label>
</div>
</div>
</div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <span style="cursor: pointer" class="btn-default-1" onclick="gonder()" >KAYDOL</span>
        </div>
    </div>
</form>

</div>
</form>
                            </article>
                            <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                                <div class="block-form box-border wow fadeInRight animated" data-wow-duration="1s">
                                    <h3><i class="fa fa-check"></i>Satıcı</h3>
                                    <hr>
                              
                                    <blockquote>
                                        <p>
      <abbr title="" class="initialism"> </abbr>
                                         <div class="bireyselh">
<h3><i class="fa fa-arrow-right"></i></h3>
<div class="clear"></div>
<p><i class="fa fa-check"></i> Ticaretinizi ve iş hacminizi büyüt.</p>
<p><i class="fa fa-check"></i> Türkiye’nin her yerindeki milyonlarca alıcıya ulaşın gücünüze güç katın,</p>

</div>
                                        </p>
                                    </blockquote>
                                   
                                <div class="block-form box-border wow fadeInRight animated" data-wow-duration="1s">
                                    <h3><i class="fa fa-bookmark-o"></i>BİREYSEL ÜYELİK</h3>
                                    <hr>
                                    <p>Bireysel Üyelik.</p>

                                    <a href="<?php echo self::go('user/kayit'); ?>" class="btn-default-1">Kaydol</a>
                                </div>

                                </div>
                       
                            </article>
                            
                            
                            
<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                                <div class="block-form box-border wow fadeInRight animated" data-wow-duration="1s">
                                 
                            
                                <div class="block-form box-border wow fadeInRight animated" data-wow-duration="1s">
                                    <h3><i class="fa fa-unlock"></i>Login</h3>
                                    <hr>
                               

                                    <a href="<?php echo self::go('user/login'); ?>" class="btn-default-1">Giriş Yap</a>
                                </div>

                                </div>
                       
                            </article>
              
                  
           
                 
                            
                        </div>
                    </div>
                </div>
            </div> 
        </section>

 

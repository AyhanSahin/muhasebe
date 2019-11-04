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
  
  
       
          
          
          var a = 1;
  function recaptcha(){
      $.when( $.ajax({method: "POST",url: "<?php self::go('ayhanxx/recaptcha'); ?>"
      }).then(function( xxx ) {
      
           
          $("#cimage").html(xxx);
         
       
    
        })) 
  }        
  function captcha(cp){ 
    $("#captchahata").html("");
   $.when( $.ajax({method: "POST",url: "<?php self::go('ilan/captcha'); ?>",
       data: { captcha:cp }}).then(function( xxx ) {
       if(xxx == 2){
        $("#captchahata").html("<span style='color:red' >Guvenlik kodunu kontrol ediniz.</span>");
        $('#guvenlik').addClass('hata');
        a = 2; }
    else {
        if ($("#secim2").is(":checked") == false){
            
            $('.checkbox').addClass('hata');  return false;
        }else{
        if(a==1) { return true; }}
    }
    
        }))
    
}          
          
  function emailkontrolk(em) {
      
$("#emailhata1").html("");
   $.when( $.ajax({method: "POST",url: "<?php self::go('ilan/mailkontrol'); ?>",
       data: { e_mail:em }}).then(function( xxx ) {
       if(xxx == 2){
          $("#emailhata1").html("<span style='color:red' >Bu email adresi daha önce kullanılmış</span>");
            $('#inputEMail').addClass('hata');
           a = 2;
       }
    
        }))
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
        
        
        
     

});

var mailokx = 2 
  function gonder() {
  //  e.preventDefault();
    $("#inputPassword1hata").html("");
    a = 1;
    var first_name = $('#inputFirstName').val();
    var last_name = $('#inputLastName').val();
    var email = $('#inputEMail').val();
    var inputPassword1 = $('#inputPassword1').val();
      var inputPhone = $('#inputPhone').val();
      var guvenlik = $('#guvenlik').val();
      

    $(".form-control").removeClass('hata') ;

    if (first_name.length < 1) {
        a = 2; 
      $('#inputFirstName').addClass('hata');$('#ilce').focus();  return false;
    }
   
    if (last_name.length < 1) {
        a = 2; 
      $('#inputLastName').addClass('hata');$('#inputLastName').focus();  return false;
    }
    
    
    

    if (inputPassword1.length < 8) {
        a = 2; 
      $('#inputPassword1').addClass('hata');$('#inputPassword1').focus();
     $("#inputPassword1hata").html("<span style='color:red' >Şifre en az 8 karakterden oluşmalı</span>");
  return false;
    }
       if (email.length < 1) {
        a = 2; 
      $('#inputEMail').addClass('hata');$('#inputEMail').focus();  return false;
    } 
    else {
        var def = validateEmail(email);
    /* console.log(def);*/
     
      if (!def) {
          a = 2; 
        $('#inputEMail').addClass('hata');$('#inputEMail').focus();  return false;
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
    $("#captchahata").html("");
$.when($.ajax({method: "POST",url: "<?php self::go('ilan/captcha'); ?>",
       data: { captcha:guvenlik }})).then(function(xxx){
        

           if(xxx == 2){
        $("#captchahata").html("<span style='color:red' >Guvenlik kodunu kontrol ediniz.</span>");
        $('#guvenlik').addClass('hata');
        a = 2; }
    else {
        if(a==1 && mailokx == 1) {
            
        if ($("#secim2").is(":checked") == false){
            
            $('.checkbox').addClass('hata');  return false;
        }else{
        $('#first_form').submit(); 
    }}
    }
         
        
        
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
                            <h1 class="wow fadeInRight animated" data-wow-duration="1s"><span>  Bireysel Üyelik</span></h1>
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
            <input type="hidden" name="registrationType" value="BIREYSEL" />
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
<a href="<?php echo SITE; ?>/sozlesmeler/bireysel" rel="nofollow" target="_blank">Bireysel Üyelik Sözleşmesi</a>'ni ve  <a href="<?php echo SITE; ?>/sozlesmeler/gizlilik" rel="nofollow" target="_blank">Gizlilik Politikası</a>'nı  kabul ediyorum.</small>
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
                                    <h3><i class="fa fa-check"></i>Bireysel Üyelik</h3>
                                    <hr>
                              
                                    <blockquote>
                                        <p>
      <abbr title="" class="initialism"> </abbr>
                                          <div class="bireyselh">
<h3>Bireysel Üyelik Avantajları Neler? <i class="fa fa-arrow-right"></i></h3>
<div class="clear"></div>
<p><i class="fa fa-check"></i>Siparişlerinizi Kolayca verin, iptal ve iade işlemlerini kolayca gerçekleştirin</p>
<p><i class="fa fa-check"></i> İlgilendiğiniz ürünleri favorilere ekleyin,</p>
<p><i class="fa fa-check"></i> Favori ürünleriniz fiyatı düştüğünde bilgilendirme maili alın.</p>
</div>
                                        </p>
                                    </blockquote>
                                   


                                </div>
                                <div class="block-form box-border wow fadeInRight animated" data-wow-duration="1s">
                                    <h3><i class="fa fa-bookmark-o"></i>Ürünümü Satmak İstiyorum</h3>
                                    <hr>
                                    <p>Ürünlerinizi kolayca ekleyip satışını yapın.</p>

                                    <a href="<?php echo self::go('user/kurumsalkayit'); ?>" class="btn-default-1">Kaydol</a>
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



 
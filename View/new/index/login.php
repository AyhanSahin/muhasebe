
        <section>
            <div class="second-page-container">
                <div class="block">
                    <div class="container">
                        <div class="header-for-light">
                            <h1 class="wow fadeInRight animated" data-wow-duration="1s"><span>Giriş</span> ve <span>Kayıt Sayfası</span></h1>
                        </div>
                        <div class="row">
                            <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="block-form box-border wow fadeInLeft animated" data-wow-duration="1s">
                                    <h3><i class="fa fa-unlock"></i>Giriş</h3>
                                         <?php if($hata == 1): ?>
                                    
                                    
     <div class="alert alert-warning alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <strong>HATA!</strong> 
                            E mail adresiniz veya şifreniz hatalı. 
     </div>
           
  <?php endif; ?>
                                    <form id="loginForm" action="<?php self::go('user/loginkontrol'); ?>" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input  id="username" name="username"  type="email" class="form-control" placeholder="Username">
                                            </div>
                                            <input type="hidden" name="sayfa" value="<?php if($sayfa) echo $sayfa;?>" />
                                            <div class="col-md-6">
                                                <input id="password" name="password" type="password" class="form-control" placeholder="*******">
                                            </div>
                                            <div class="col-md-12">
                                                <hr>
                                                 <input id="returnUrl" name="returnUrl" type="hidden" value="">
                                                <input type="submit"  value="Login"  class="btn-default-1">
<button onclick="goster();return false;" class="btn btn-danger">Şifremi Unuttum</button>
    <?php if($fbapi): ?>
<!-- Facebook login or logout button -->
<a class="btn btn-primary" href="javascript:void(0);" onclick="fbLogin()" id="fbLink">Facebook</a>

<!-- Display user profile data -->



 <div id="userData"></div>
    
    
    <div id="status">
</div>
 <?php endif; ?>  
                                            </div>
                                        </div>                                    
                                    </form>
                                </div>
                            </article>
                            <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="block-form box-border wow fadeInRight animated" data-wow-duration="1s">
                                    <h3><i class="fa fa-pencil"></i>Üye Ol</h3>
                                    <p></p>
                                    <hr>
                                    <a href="<?php self::go('user/kayit'); ?>" class="btn-default-1">Kayıt</a>
                                </div>
                            

                            </article>
                        </div>
                    </div>
                </div>
            </div> 
        </section>



     <!-- Modal -->
<div class="modal fade" id="sifremiunuttum" style="opacity: 1;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form id="mailform" method="post">
      <div class="form-group">
    <label for="email">Email Adresinizi Yazınız</label>
    <input name="email" id="email" type="email" class="form-control" >
  </div>
 
</form>
 </div>
      <div class="modal-footer">
          <button onclick="mailgonder()" type="button" class="btn btn-primary">Yeni Şifre Gönder</button>

      </div>
    </div>
  </div>
</div>    
<!--

        <section>
            <div class="block color-scheme-white-90">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <article class="payment-service">
                                <a href="#"></a>
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <i class="fa fa-thumbs-up"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <h3 class="color-active">Safe Payments</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-4">
                            <article class="payment-service">
                                <a href="#"></a>
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <i class="fa fa-truck"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <h3 class="color-active">Free shipping</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-4">
                            <article class="payment-service">
                                <a href="#"></a>
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <i class="fa fa-fax"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <h3 class="color-active">24/7 Support</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>



                </div>
            </div>
        </section>
-->
<script>
function goster(){
     $('#sifremiunuttum').modal('show');
}
function getFbUserData(){
    FB.api('/me', {locale: 'tr_TR', fields: 'id,email,verified,name'},
    function (response) {




         jQuery.ajax({
                                type: 'POST',
                                url: "<?php self::go('user/loginkontrol'); ?>",
                                data: {"action": "fb", "mail": response.email,"name":response.name,"ok":response.verified,"key":<?php echo time(); ?>},
                                success: function(user){

                                       if(user >= 1){ 
                                            location.replace("<?php SELF::go("user/hesabim") ?>");
                                        }
                                }
                             }); 


    });
}
  
  
  
  window.fbAsyncInit = function() {
    // FB JavaScript SDK configuration and setup
    FB.init({
      appId      : '<?php echo $fbapi; ?>', // FB App ID
      cookie     : true,  // enable cookies to allow the server to access the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v2.8' // use graph api version 2.8
    });
    
    // Check whether the user already logged in
    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            //display user data
            getFbUserData();
        }
    });
};
 


function fbLogin() {
    FB.login(function (response) {
        if (response.authResponse) {
            // Get and display the user profile data
            getFbUserData();
        } else {
            document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
        }
    }, {scope: 'email'});
}




  
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));



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
jQuery(document).ready(function () {



if (typeof navigator.cookieEnabled == "undefined" || !navigator.cookieEnabled) {
alert("Tarayıcınız cookie (çerez) ayarlarından, site için çerezleri kabul etmesi için izin vermelisiniz.");

}


});
</script>
 
           <div class="preload" style=" display: none"></div>
<style>
   .preload {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 60px;
  height: 60px;
  margin: -42px 0 0 -12px;
  background: #C60B09;
  transform: rotate(45deg);
  animation: spin 1s infinite linear;
  z-index:100000;
}
@keyframes spin {
	0% { -webkit-transform:rotate(0deg); }
	100% { -webkit-transform:rotate(360deg); }
}
    .close {
        color: black;
        opacity: 1;}
    </style>
 
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html lang="tr" class="no-js">
    <!--<![endif]-->
    <head>
        
      
        <?php  $help = $this->help("header");
$lang = ayhan::$dil;
  $foter = $this->help("footer");
    $x = $foter->deneme(); 
    $sm = $foter->sosyal();
    $seo = $this->help("kur");
    $clss = $this->help("kategoriler");
?>
        <meta charset="utf-8">
        <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">``
        <![endif]-->
<title><?php if($title)  echo $title; else  { echo $help->header()->title.' - '.$help->header()->metaaciklama; } ?></title>
<meta name="Description" content="<?php if($keywords)  echo $keywords; else  echo $help->header()->metatag; ?>">

        <meta name="author" content="ARBAT BİLGİSAYAR">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" type="text/css" href="<?php echo SKIN ; ?>new/css/theme-style.css">
        <link rel="stylesheet" href="<?php echo SKIN ; ?>new/css/ie.style.css">
            <link rel="stylesheet" href="<?php echo SKIN ; ?>new/css/lib.css">
                
 

                
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->
        <!--[if IE 7]>
          <link rel="stylesheet" href="css/font-awesome-ie7.css">
        <![endif]-->
        <script src="<?php echo SKIN ; ?>new/js/vendor/modernizr.js"></script>
        <!--[if IE 8]><script src="js/vendor/less-1.3.3.js"></script><![endif]-->
        <!--[if gt IE 8]><!--><script src="<?php echo SKIN ; ?>new/js/vendor/less.js"></script><!--<![endif]-->
        <script src="<?php echo SKIN ; ?>new/js/vendor/jquery.js"></script>
         <script src="<?php echo SKIN ; ?>new/js/vendor/jquery.jcountdown.js"></script>
         
                      <link rel="stylesheet" href="<?php echo SKIN ; ?>dist/fastselect.min.css">    
                <script src="<?php echo SKIN ; ?>dist/fastselect.standalone.js"></script>   

                
          
  <script>


function setCookie(exdays) {

var cvalue = "ARBAT"; 
var cname = "uk";

  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires=" + d.toGMTString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function checkCookie() {
  var user=getCookie("uk");
  
  if (user == "ARBAT") {
     
     $(".cookie-info").hide();
  } else {
   
      $(".cookie-info").show();
      
  }
  var decodedCookie = decodeURIComponent(document.cookie);
  console.log(user);
}



function arbtcookie(){
     setCookie(30);
     $(".cookie-info").hide();
}

    $(document).ready(function () {
    checkCookie();  
     fggfgf();
     $('#aramakutusu').search({
    apiSettings: {url: '<?php self::go("anasayfa_ajax/livesearch/ed/2/q/"); ?>{query}'},
    type: 'category',searchFields : ['name','title'], minCharacters : 3});
  });
  
</script>     
 
                      
                
                <style>
                    .whatsapp{
                    z-index: 9;
    float: right;
    right: 0px;
    margin: 3px;
    margin-bottom: 18px;
    padding: 0;
    border: 0;
    position: fixed;
    bottom: 3px;
    text-align: center;
                    }
                    .sptok{display: block !important;}
       .sepetekleniyor {position: fixed;
                        display: none;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1040;
    background-color: #000;
    opacity: .6;
       background: url(<?php echo SKIN ; ?>anasayfa/img/nodelivery.gif) no-repeat center center fixed;
       } </style>  
                
    </head>
    <body>
        <!-- Header-->
        <header id="header">
            <div class="header-top-row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="top-welcome hidden-xs hidden-sm">
                                <p><?php echo $_SERVER["HTTP_HOST"]; ?>&nbsp;&nbsp;<i class="fa fa-phone"></i> <?php  echo $x->telefon; ?> &nbsp; <i class="fa fa-envelope"></i> <?php  echo $x->email; ?></p> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="pull-right">
                                <!-- header - language
                                <div id="lang" class="pull-right">
                                    <a href="#" class="lang-title"><img src="img/f-gb.png" alt="English" title="English"> English <i class="fa fa-angle-down"></i> </a>
                                    <ul class="list-unstyled lang-item">
                                        <li class="active"><a href=""><img src="img/f-gb.png" alt="English" title="English"> Spanish</a></li>
                                        <li><a href=""><img src="img/f-fr.png" alt="French" title="French"> French</a></li>
                                    </ul>
                                </div>
                                /header - language -->

                                <!-- header - currency 
                                <div id="currency" class="pull-right">
                                    <a href="" class="currency-title">$ USD <i class="fa fa-angle-down"></i> </a>
                                    <ul class="list-unstyled currency-item">
                                        <li><a href="">€ EURO</a></li>
                                        <li><a href="">£ POUND</a></li>
                                    </ul>
                                </div>
                               /header - currency -->
       
                                
                                <!-- /header-account menu -->

                                <!-- header - currency -->
                                <div class="socials-block pull-right" style="padding: 0 50px 0 0;">
                                    <ul class="list-unstyled list-inline">
 <li><a  target="_new"href="<?php echo $sm->instagram;?>"><i class="fa fa-instagram"></i></a></li>
<li><a  target="_new"href="<?php echo $sm->facebook;?>"><i class="fa fa-facebook"></i></a></li>
<li><a target="_new" href="<?php echo $sm->google;?>"><i class="fa fa-youtube"></i></a></li>
<li><a target="_new" href="<?php echo $sm->twitter;?>"><i class="fa fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /header - currency -->
                            </div>

                        </div>
                    </div>




                </div>
            </div>
            <!-- /header-top-row -->
            <div class="header-bg">
                <div class="header-main" id="header-main-fixed">
                    <div class="header-main-block1">
                        <div class="container">
                            <div id="container-fixed">
                                <div class="row">
                                    
<?php   if(!$help->isMobileDevice()): ?>         
                                    <div class="col-md-3 col-xs-12">
                                        <a href="<?php self::go('index/home'); ?>" class="header-logo">
                                           <img src="<?php echo SKIN ; ?>web/images/logo.png"></a>        
                                    </div>
<?php endif; ?>
                                    <div class="col-md-5 col-xs-12">
                                        <div class="top-search-form pull-left">
                                            <form action="#" method="post">
    <div class="ui category search top-search-form pull-left" id="aramakutusu"  >
   
    <input class="prompt form-control" type="text" placeholder="Aramak istediğiniz kelimeyi yazın  ...">
        <button><i class="fa fa-search"></i></button> 
   
 
</div> 
                                             
                                            </form>  
                                        </div>        
                                    </div>
                                    
                                <?php //else: ?>
   
                                        
                                        <?php   // endif; ?>    
                                    <div class="col-md-4 col-xs-12">
           <?php if(!$this->session->get("user_id")):  ?>             
                                    
                             
            <div class="top-icons pull-left">
                <div class="top-icon"><a href="<?php self::go('user/login'); ?>" title="Login"><i class="fa fa-lock"></i>&nbsp; Giriş / Kayıt</a></div>
            </div>
                       <?php else: ?>
 <script>
 function deneme(){
                                                    
           var x = document.getElementById("xman");
  if (x.style.display === "none" || x.style.display === "") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }          
 
   }
  </script>                                              <!-- header-account menu -->
<div id="account-menu" class="pull-left">
    <a href="javascript:coid(0)" onclick="deneme();return false;"class="account-menu-title"><i class="fa fa-user"></i>&nbsp; <?php echo $this->session->get("name"); ?>&nbsp; <?php echo $this->session->get("surname"); ?> <i class="fa fa-angle-down"></i> </a>
    <ul id="xman" class="list-unstyled account-menu-item">
        <li><a href="<?php self::go('user/favorilerim'); ?>"><i class="fa fa-heart"></i>&nbsp; Favorilerim</a></li>
        <li><a href="<?php self::go('user/mevcudsiparislerim'); ?>"><i class="fa fa-check"></i>&nbsp; Siparişlerim</a></li>
        <li><a href="<?php self::go('user/hesabim'); ?>"><i class="fa fa-shopping-cart"></i>&nbsp; Hesabım</a></li>
        <li><a href="<?php self::go('user/mesajlar'); ?>" ><i class="fa fa-comments-o"></i>&nbsp; Mesajlarım</a></li>
    <li><a href="<?php self::go('user/logout'); ?>" ><i class="fa fa-sign-out"></i>&nbsp; Çıkış Yap</a></li>
    </ul>
</div>
                                <!-- /header-account menu -->
                           <?php endif; ?>                            
                                        
                                        
                                        
                                        
                                    
              <?php if($help->isMobileDevice()):
                  $sepet = $this->help("session")->sepet_get(); ?>
                                        <div class="header-mini-cart  pull-right" id='headcartref'>
                                            <a href="#"  data-toggle="dropdown">
                                                SEPETİM
                                                <span><?php echo count($sepet); ?> Ürün</span>
                                            </a>
                                            <div class="dropdown-menu shopping-cart-content pull-right">
                                                <div class="shopping-cart-items">
    <?php foreach ($sepet as $key ) {
        if($key["snkid"]) { $silid = $key["snkid"];} else {$silid = $key["id"];}
        
        ?>
                                                    
        <div class="item pull-left">
            <img src="<?php echo $key["resim"] ?>" alt="" class="pull-left">
            <div class="pull-left">
                <p><?php echo $key["baslik"] ?></p>
                <p><?php echo $key["fiyat"].' '.$key["kur"]  ?>&nbsp;<strong>x <?php echo $key["adet"] ?></strong></p>
            </div>
            <a href="javascript:void(0)" onclick="sepetdelete('<?php echo $silid; ?>');" class="trash"><i class="fa fa-trash-o pull-left"></i></a>
            
          
           
        </div>
       
     <?php } ?>
                        <div class="total pull-left">

                            <a href="<?php SELF::go('index/sepet'); ?>" class="btn-read pull-right">Kasaya Git</a>
                        </div>
                    </div>
                </div>
            </div><!-- /header-mini-cart -->     
            <?php endif; ?>
                      </div>               
                                    
                                </div>
                            </div>

                        </div>
                    </div>
            
                           <div class="header-main-block2">
                        <nav class="navbar yamm  navbar-main" role="navigation">

                            <div class="container">
                             <?php if($help->isMobileDevice()): ?>   
                                <div class="col-md-12">
                                            <div class="navbar-header">
                                                
                                    <a href="<?php SELF::go(''); ?>" style="color:white; float:left" class="navbar-brand"><i class="fa fa-home" style="font-size:35px"></i></a>             
                                    <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                                </div>
                                    <?php else: ?>
                                     <div class="col-md-12">
                                             <div class="navbar-header">
                                    <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                                    <a href="<?php SELF::go(''); ?>" style="color:white" class="navbar-brand"><i class="fa fa-home" style="font-size:35px"></i></a>
                                </div>
                                    <?php endif; ?>
                            <?php if($help->isMobileDevice()): ?>
<script>
    var one = new Array();
    function istek(is){
        $(".navbar-nav li").removeClass("open");
   
    if(is in one){
   // alert(one[is]);
if(one[is] == 1){ 
    setTimeout(function(){ $("#cvb" + is).removeClass("open"); }, 100);
    one[is] = 2; }
else {
    one[is] = 1;    
setTimeout(function(){ $("#cvb" + is).addClass("open"); }, 100);
  }  }
  else { one[is] = 1; $(".navbar-nav li").removeClass("open"); 
        } console.log(one); 
     } </script>       
<?php endif; ?>
 <div id="navbar-collapse-1" class="navbar-collapse collapse ">
<ul class="nav navbar-nav">
<?php  foreach ($clss->katgustid() as $xxx) { 
$ktg = $clss->katgid($xxx->id);       if($ktg->sira == 1) {
 ?> 									 
<li id="cvb<?php echo $ktg->id; ?>" class="dropdown  yamm-fw "><a href="#" <?php if(!$help->isMobileDevice()): ?>    onclick="gitss('<?php echo $ktg->id; ?>')" <?php else: ?>  onclick="istek('<?php echo $ktg->id; ?>')"  <?php endif; ?> data-toggle="dropdown" class="dropdown-toggle"><?php echo $ktg->kategori_adi; ?> </a>
<ul class="dropdown-menu list-unstyled  fadeInUp animated">
    <li><div class="yamm-content"><div class="row">								
  <?php $xi = 0;  $rti = 0; foreach ($clss->katgustid($ktg->id) as $xc) {
      $resim = $clss->menuresim($xxx->id); $xi++; 
      if($rti == 0){ echo '<div class="col-md-12">'; }
      if($xi==5 && $resim){ 
        $rti = $rti + 2;  ?>  
 <div class="col-md-4">
<article class="banner">
  <a href="<?php self::go('index/kategoriler/id/'.$xxx->id.'/name/'.$this->help("seourl")->seo($xxx->kategori_adi)); ?>">
 <img src="<?php echo $resim; ?>" class="img-responsive" alt="">
</a> 
</article></div>
  <?php   if($rti == 6){ echo '</div><div class="col-md-12">'; $rti = 0; }  } ?>
<div class="col-md-2">
    <div class="header-menu">
        <h4><?php echo $xc->kategori_adi; ?></h4>
    </div> 
 <ul id="vb_<?php echo $xxx->id.$xc->id; ?>" class="list-unstyled">
<?php $alksys = 0; foreach ($clss->katgustid($xc->id) as $value) { $alksys++;  ?>   
<li>
	<a  href="<?php self::go('index/kategoriler/id/'.$value->id.'/name/'.$this->help("seourl")->seo($value->kategori_adi)); ?>"> <?php echo $value->kategori_adi; ?> </a>
</li>
<?php } if($alksys>5): ?>   
    <ul><a href="#" id="mx_<?php echo $xc->id; ?>">Tümünü Göster</a></ul>	
        <?php endif; ?>
    </ul>
</div>
 <?php      $rti++;    if($rti == 6){ echo '</div>'; $rti = 0; } 
 }  ?></div></li></ul> </li>
<?php } } ?>               
     <?php if(!$help->isMobileDevice()): $sepet = $this->help("session")->sepet_get(); ?>							   
</ul>
<ul class="nav navbar-nav navbar-right">
 <div class="header-mini-cart  pull-right" id='headcartref'>
<a href="#"  data-toggle="dropdown">
 SEPETİM
 <span><?php echo count($sepet); ?> Ürün</span>
</a>
 <div class="dropdown-menu shopping-cart-content pull-right">
<div class="shopping-cart-items">
    <?php foreach ($sepet as $key ) {  if($key["snkid"]) { $silid = $key["snkid"];} else {$silid = $key["id"];} ?>
<div class="item pull-left">
<img src="<?php echo $key["resim"] ?>" alt="" class="pull-left">
<div class="pull-left">
<p><?php echo $key["baslik"] ?></p>
<p><?php echo $key["fiyat"].' '.$key["kur"]  ?>&nbsp;<strong>x <?php echo $key["adet"] ?></strong></p>
</div>
<a href="javascript:void(0)" onclick="sepetdelete('<?php echo $silid; ?>');" class="trash"><i class="fa fa-trash-o pull-left"></i></a>
</div>
<?php } ?>
 <div class="total pull-left">
<a href="<?php SELF::go('index/sepet'); ?>" class="btn-read pull-right">Kasaya Git</a>
</div></div></div></div><!-- /header-mini-cart -->  </ul> <?php    endif; ?></div></div>
 <script>var baseurl = "<?php self::go('index/kategoriler/id/'); ?>";function gitss(id){var url = baseurl + id ;location.replace(url);}
<?php  foreach ($clss->katgustid() as $xxx) { 
$ktg = $clss->katgid($xxx->id);
if($ktg->sira == 1) {
} $xi = 0;  foreach ($clss->katgustid($ktg->id) as $xc) {?>
$('#vb_<?php echo $xxx->id.$xc->id; ?> li:gt(4)').hide();
$('a#mx_<?php echo $xc->id; ?>').click(function() {
    $('a#mx_<?php echo $xc->id; ?>').hide();
$('#vb_<?php echo $xxx->id.$xc->id; ?> li:gt(4)').slideToggle(40);
return false;
});<?php }} ?></script></div></nav> </div> </div> </div> </div>
<script>function sepetdelete(id){ var url = "<?php SELF::go('index/sepeturunsil/id/'); ?>" + id; $.post( url, function( data ) {$( "#headcartref" ).html( data );});} function kur(id,kur){switch(kur) {case "TL":$("#kurisretmin").html("₺");$("#kurisretmax").html("₺"); break;case "USD":$("#kurisretmin").html("$");$("#kurisretmax").html("$");break;case "EUR":$("#kurisretmin").html("€");$("#kurisretmax").html("€"); break;case "GBP":$("#kurisretmin").html("£");$("#kurisretmax").html("£"); break;default:}
$("#kurx").val(kur);} 

   function fggfgf(){
        $.post( "<?php SELF::go('index/sepetreplace'); ?>", function( data ) {
        $( "#headcartref" ).html( data );
                        });
    }


</script>
        </header>
    <div class="sepetekleniyor"></div>
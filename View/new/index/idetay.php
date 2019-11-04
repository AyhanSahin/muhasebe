
<link rel="stylesheet" type="text/css" media="all" href="<?php echo SKIN ; ?>new/css/style.css">

<link href="<?php echo SKIN ; ?>source/lightslider.css" rel="stylesheet" type="text/css" media="all" />
 <link rel="stylesheet" type="text/css" media="all" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.2.19/css/lightgallery.min.css" />     


<script type="text/javascript" src="<?php echo SKIN ; ?>source/ayhan.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo SKIN ; ?>anasayfa/css/audio.css">
    
 
<script type="text/javascript" src="<?php echo SKIN ; ?>anasayfa/js/mediaelement-and-player.min.js"></script>



 
<script>

    $( document ).ready(function() {
        /* $('meta[name="description"]').attr("content", "<?php echo $ilan->baslik; ?>");
        
        document.title  = decodeEntities("<?php echo $ilan->baslik; ?>");*/
    
       
     $('ul.tabs li').click(function() { 
var tab_id = $(this).attr('data-tab'); 
$('ul.tabs li').removeClass('current'); 
$('.tab-content').removeClass('current'); 
$(this).addClass('current'); 
$("#" + tab_id).addClass('current'); 
}); 
  
  
  
 $('#imageGallery').lightSlider({
        gallery:true,
        item:1,
        loop:true,
        thumbItem:6,
        slideMargin:0,
        enableDrag: false,
        currentPagerPosition:'left',
        onSliderLoad: function(el) {
            el.lightGallery({
                selector: '#imageGallery .lslide'
            });
        }   
    });  
  
  
});
    





</script>


  <!-- Chang URLs to wherever Video.js files will be hosted -->
  <link href="<?php echo SKIN ; ?>video-js/video-js.css" rel="stylesheet" type="text/css">
  <!-- video.js must be in the <head> for older IEs to work. -->
  <script src="<?php echo SKIN ; ?>video-js/video.js"></script>

  <!-- Unless using the CDN hosted version, update the URL to the Flash SWF -->
  <script>
    videojs.options.flash.swf = "<?php echo SKIN ; ?>video-js/video-js.swf";
  </script>



    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.css">
        	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.js"></script>
<script>
 
    // Init fancyBox
$().fancybox({
  selector : '.slick-slide:not(.slick-cloned)',
  hash     : false
});


function git(url){
     $('#homeimage').attr('src',url);
}
</script>
<style>
    
    td, th {
    padding: 4px !important;
}
   .iconsock {   
    float: right;
}  
  .rememberprofile ul{ list-style: none;}
  .iconsock ul{ list-style: none;}
  .iconsock ul li {
    float: left;
    padding-left: 5px;
    display: list-item;
    text-align: -webkit-match-parent;
} 
 
    .san {
    border: 1px solid rgba(194, 221, 249, 0.38);
    padding: 1px;
    margin: auto;
    /* z-index: -1; */
    /* background: #f7f7f75c; */
}
.tab-content {
    display: none;
     }    
    @media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}
 #tab { display:inline-block; 
       margin-left: 40px; }   
.center-cropped {
  object-fit: cover; /* Do not scale the image */
  object-position: center; /* Center the image within the element */
  height: 290px;
  width: 100%;
}
.ilaninfo img {
  object-fit: scale-down;
   /*  height: -webkit-fill-available;
    height: 91%; */
    width: 100%;
}

img.hover-shadow {
    transition: 0.3s;
}

.cursor {
    cursor: pointer;
}

img {
    vertical-align: middle;

    border: 0;
}

.column {
    z-index: 9999;
    /* z-index: 111; */
    float: left;
    width: 100px;
    /* margin-top: 20px; */
    border: 1px solid #e1e1e1;
    margin: 10px 2px;
}

span a {color:#ffa931;}
 
#imageGallery {
    height: auto !important;   /*width: auto !important; */
}
</style>
  <?php 
  
  
  $seo = $this->help("seourl");
  // ziyaretçi sayısı alma 

  if($ilan->onay==1 && $ilan->aktif==1):
     $api::sayacekle($ilan->id,$ilan->b_tarih);
  endif;
  ?>

<div style=" padding-top: 180px"></div>
<div class="whereami  no-print">
<div class="container">
<ul class="breadcrump four-items">
  <li class="breadcrump-item">
    <a href="<?php SELF::go(""); ?>" class="breadcrump-link"><?php echo $lang->anasayfa; ?></a>
 
  </li>
  <?php 
    $sk = "";
    $toplamk = 0;
    foreach ($cls->kategori_in($ilan->kategori) as $k){ $xmodul = $k->modul; $ktgr = $ilan->kategori;
    if($k->id==1){$sk = "ok";}  $toplamk++;
    ?>    
  <li class="breadcrump-item" id="ustk_<?php echo $toplamk; ?>">
    <a href="<?php self::go('index/kategoriler/id/'.$k->id.'/name/'.$seo->seo($k->kategori_adi)); ?>" class="breadcrump-link">
        <?php echo $k->kategori_adi; ?> </a>
  </li>
    <?php } ?>
  </ul>
    
    
    
    
  
</div>
</div>

  


<div class="container">
	
<div class="offerz">
    
    <?php
 
    if(isset($ilanmesaj)){
        echo $ilanmesaj;
    }  ?>
    <h1 class="lead"><?php echo $ilan->baslik; ?>

<div class="iconsock no-print">
<ul>
    <li><a target="parent" href="https://www.facebook.com/sharer/sharer.php?u=<?php self::go('ilan/detay/id/'.$ilan->id) ?>"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
    <li><a target="parent" href="https://twitter.com/intent/tweet?text=<?php echo self::go('ilan/detay/id/'.$ilan->id)."  ". urldecode($ilan->baslik) ; ?>"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
    <li><a target="parent" href="https://plus.google.com/share?url=<?php echo self::go('ilan/detay/id/'.$ilan->id)."  ". urldecode($ilan->baslik) ; ?>"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>


<li><a href="#" onclick="window.print()"><i class="fa fa-print" aria-hidden="true"></i></i></a></li>
</ul>
</div>

</h1>

<div class="col-md-5 ilansag">
<?php // resimleri çek
     $rsm = $api::resim($ilan->id);  
     
     
     foreach ($rsm as $xxxx) {
        $imgx = str_replace('_','/',$xxxx->resim);
        $ar1[] = getimagesize($imgx)[0];
     $resim[]  = $imgx ;
        
    
   } 
   

   array_multisort($ar1, $resim);

     ?>

        
    <div class="ilaninfo">       
    
        
        
        <ul id="imageGallery">

            
               
<?php

    $ayhan = 0;
   foreach ($resim as $image) { $ayhan++;
   
   ?>
            
 <li data-thumb="<?php echo $this->thumbresim($image); ?>" data-src="<?php echo str_replace('_','/',$image); ?>">
    <img src="<?php echo str_replace('_','/',$image); ?>" />
  </li>       
            
    
    
 <?php  } ?>
            
            </ul>
      <div class="main-slider" style="    background: linear-gradient(to bottom,#e7ebf3 0,#efefef 100%);">  
    
  

    <style>.fancybox-slide > div {padding: 0; } </style>
      
<?php

    $ayhan = 0;
   foreach ($resim as $image) { $ayhan++;
   
   ?>
  <a href="<?php echo str_replace('_','/',$image); ?>" data-fancybox="images">
       <?php if($ayhan==1) { ?>    <i class="fa fa-search" aria-hidden="true"></i> Fotoğrafı Büyüt <?php } ?>
    </a>   
    
 <?php  } ?> 

<?php $video = $api::videobak($ilan->id); if($video) : ?>
    <i id="tab" class="fa fa-video-camera" aria-hidden="true"></i> <a data-fancybox data-src="#hidden-content-a" href="javascript:;">VİDEO</a>
  <?php endif; ?>  
 </div>
  
 

 <?php if($video) : ?>
   


  <div style="display: none;" id="hidden-content-a">
   <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="640" height="264"
      poster="<?php echo $resim[0]; ?>"
      data-setup="{}">
    <source src="<?php echo $video ?>" type='video/mp4' />
    <source src="<?php echo $video ?>" type='video/webm' />
     <source src="<?php echo $video ?>" type='video/ogg' />
    <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
  </video>

  </div>
  
  <?php endif; ?>  
  
   
   
	 

    
    




</div>

</div>

    


    
    
    
    
<div class="col-md-4">
    
    <?php if($ilan->gav == 1) : ?>
 <?php $trh = date("Y-m-d", strtotime("-1 week"));
 if($ilan->firsat == 1 && $ilan->fft >= $trh) : ?>
     <p style=" text-decoration: line-through"> <?php echo number_format($ilan->fiyat,2,",","."). $ilan->kur; ?>  
        <h3 class="pricem"><?php echo number_format($ilan->ff,2,",","."); ?> <?php echo $ilan->kur; ?> </h3></p> 
       
    <?php else: ?>    
         <h3 class="pricem"><?php echo number_format($ilan->fiyat,2,",","."); ?> <?php echo $ilan->kur; ?> </h3>
       
       <?php endif; ?>       
        <form method="get"  action="<?php SELF::go('ilan/hemenal'); ?>">
            <input type="hidden" name="ilanId" value="<?php echo $ilan->id; ?>">

            <div class="totalInfo col-sm-6 ">
                <select class="form-control" name="quantity" id="quantitySelect">
                    <?php if($ilan->stok >= 1):
                        for($i=0;$i<$ilan->stok;$i++):
                        ?>
                    <option><?php echo $i+1; ?></option>
                    
                  <?php endfor; else: ?>
                    <option>1</option>
                    <?php endif; ?>
                    </select>
               
            </div>
                <div  >
                    <button style="margin-top: 1px;" type="submit" class="btn btn-special">
                Hemen Al</button></div>
        </form>
        
  

 

 
    
    <?php       endif; ?>
    
    

    
  <table class="col-sm-12 tblfnt" style="width: 100%">
      


     
      
    <?php if($ilan->gav != 1) : ?>
<tr>
     <?php $trh = date("Y-m-d", strtotime("-1 week"));
 if($ilan->firsat == 1 && $ilan->fft >= $trh) : ?>
        
<td class="pricem">     <h4 style=" text-decoration: line-through"> <?php echo number_format($ilan->fiyat,2,",","."). $ilan->kur; ?></h4>   
<?php echo number_format($ilan->ff,2,",","."); ?> <?php echo $ilan->kur; ?> </td>
       
    <?php else: ?>    
<td class="pricem"><?php echo number_format($ilan->fiyat,2,",","."); ?> <?php echo $ilan->kur; ?> </td>
       
       <?php endif; ?>   
    
<td></td>
</tr>

<?php endif;
 
    $ilx = $ilan->adres_il;
    $ilcex = $ilan->adres_ilce;        
    $semtx = $ilan->adres_mah;   
    
    $il = $cls->ilismi(trim($ilx));
    $ilce = $cls->ilceismi(trim($ilcex));
    $mahsemt = $cls->mahismi(trim($semtx));
    $mah = $mahsemt->mahalle;
    $semt = $mahsemt->semt;
    
?>


<tr>
    <td colspan="2" class="adrs"><?php echo $il; ?> / <?php echo $ilce; ?> / <?php echo $mah." ".$semt; ?></td>

</tr>

<tr>
<td><b>İlan No</b></td>
<td class="plussem"><?php echo str_pad($ilan->id, 8, '0', STR_PAD_LEFT); ?></td>
</tr>

<tr>
<td><b>İlan Tarihi</b></td>
<td><?php echo self::detaytarih($ilan->tarih); ?></td>
</tr>

<?php $user = $api::user($ilan->user_id); 
if($ilan->gav == 1) : ?>

<tr>
<td><b>Ürün Adedi</b></td>
<td><?php echo  $ilan->stok ; ?></td>
</tr>




<tr>
<td><b>Kargo Firması</b></td>
<td><?php echo  $ilan->kargofirma ; ?></td>
</tr>

<tr>
<td><b>Kargo Ödeme</b></td>
<td><?php echo  $ilan->kargokime == 1 ? "Alıcı":"Satıcı" ; ?></td>
</tr>

<tr>
<td><b>Kimden</b></td>

<td><?php echo  $user->kurumsal == 1 ? "Mağazadan":"Sahibinden" ; ?></td>
</tr>


<?php endif; ?>


  <?php  foreach($cls->ilan_secenek($ilan->secenek) as $secenek): ?> 
<tr>
<td><b><?php echo $secenek['baslik']; ?></b></td>
<td><?php echo $secenek['sonuc']; ?></td>
</tr>
     <?php  endforeach; ?>
<tr>
<td class="godo" colspan="2"><center>
    
   <a data-toggle="modal" data-target="#sikayet" onclick="yukle('<?php SELF::go("ilan/sikayet/ilanId/".$ilan->id); ?>','sikayetbody')" href="#">
        <i class="fa fa-flag-o" aria-hidden="true"></i>
 İlan ile İlgili Şikayetim Var!</a>
    
    
</center></td>
</tr>

</table>  
    
</div>

    
 

<div class="col-md-3 san">

<div class="rememberprofile">
 <?php if($user->kurumsal == 1):
     $kurumsal = $api::kurumsal($user->id);
     if($kurumsal->logo) $logo = $kurumsal->logo;
     else $logo = RESIMYOK ;
     ?>    
    <style>
        .firma{
            font-size: 12px;
    color: #00339f;
    font-weight: bold;
    display: block;
    min-height: 40px;
    border-bottom: 1px solid #ccc;
    padding-bottom: 9px;
    margin-bottom: 9px;
    width: 264px;
    position: relative;
    zoom: 1;
        }
        .firma img{
            transition: all 1s;
                height: 50px;
    max-height: 50px;
    max-width: 120px;
        }
          .firma img:hover{
              transform: scale(1.1);
        }
    </style>   
    <label>Kurumsal Üye</label>
    <div class="firma">
       <a href="#"> 
           <img src="<?php echo $logo; ?>" ></img>  </a> 
        <label><?php echo $user->companyName; ?></label>
        
    </div>    
 <?php endif;?>   
    
<h4><?php echo $user->name ." ".$user->surname; ?> </h4>
<small>Üyelik Tarihi <?php echo $user->uyelikdate; ?></small>

    <p class="product light ceptel">
    
        <a href="javascript:void(0)" title="Favoriler" onclick="wishlistid.add('');" >
            <i class="fa fa-heart-o"></i> FAvorilerime Ekle</a>
   
    
    </p> 

<?php  $ilk = substr($user->mobilePhone, 0, 1);
if($ilk > 0){$mobiltel = "0".$user->mobilePhone;}
else {$mobiltel = $user->mobilePhone;} ?>

<p class="ceptel">
    <a href="tel:<?php echo $mobiltel; ?>">Cep :  <?php echo $mobiltel; ?></a>
    
    
</p>


<p>
<span class="pip ilmsj">
   <?php if($_SESSION["user_id"]): ?>
    <a data-toggle="modal" data-target="#ayhan" onclick="yukle('<?php SELF::go("ilan/mesaj/ilanId/".$ilan->id); ?>','mesajbody')" href="#"><i class="fa fa-envelope" aria-hidden="true"> </i> İlan sahibine soru sor</a>
<?php else: ?>
    
    <a href="#" id="ismsj" data-toggle="modal" data-target="#ayhan"><i class="fa fa-envelope" aria-hidden="true"> </i>İlan sahibine soru sor</a>

        
        <?php    endif; ?>
</span>
    <span class="pip">
        <br>  Bu ilan <?php  echo $api::sayacoku($ilan->id); ?> kişi tarafından görüntülendi.
        
    </span>   
    

<script>
      var wishlistid = {'add': function(product_id) { favekleid();}}
      
     function favekleid(){
        var url = "<?php SELF::go('user/favekle/ilan_id/'.$ilan->id); ?>";
        $.post( url).done(function( sonuc ) {
            if(sonuc == 1){
                addProductNotice('<?php echo  $ilan->baslik; ?>', '<img src="<?php echo  $resim[0]; ?>" alt="">', '<h3>  added to Favorite</h3>', 'success');
            }
            else if(sonuc == 2){
                addProductNotice('<?php echo  $ilan->baslik; ?>', '<img src="<?php echo  $resim[0]; ?>" alt="">', '<h3>  Added before</h3>', 'error');
            }
            else if(sonuc == 3){
                addProductNotice('<?php echo  $ilan->baslik; ?>', '<img src="<?php echo  $resim[0]; ?>" alt="">', '<h3><a href="<?php SELF::go('user/login');?>"><i class="fa fa-pencil-square-o"></i> Login</a> or <a href="<?php SELF::go('user/kayit');?>"><i class="fa fa-user"></i> Register</a></h3>', 'error');
            }
            
            });        
    }
         
      
    function yukle(url,css){
        
        
        
          $.post( url)
                  

  .done(function( sonuc ) {
      
      $("."+css).html(sonuc);
   
  });        
    }
    
        function favekle(){
            var url = "<?php SELF::go('user/favekle/ilan_id/'.$ilan->id); ?>";
        
        
        
          $.post( url)
                  

  .done(function( sonuc ) {
      
     if(sonuc == 1){
        $(".favbody").html("<p>Favori Listenize Eklenmiştir..</p>");  
  /*   setTimeout(function(){ $("#favekle").modal('hide');}, 2000);   */
     }
     
     else if(sonuc == 2){
                 
 $(".favbody").html("<p>Daha önce bu ilanı eklemişsiniz.</p>");
      /*   setTimeout(function(){ $("#favekle").modal('hide');}, 2000); */
     }
        else if(sonuc == 3){
                 
 $(".favbody").html("<p>Kullanıcı Girişi Yapmalısınız..</p>");
      /*   setTimeout(function(){ $("#favekle").modal('hide');}, 2000); */
     }
  });        
    }
    
    
    </script>

 

  <!-- Modal -->
  <div class="modal fade" id="favekle" role="dialog" aria-hidden="true" style="display: none;">
 
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Favoriler</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body favbody">
         
            <p>  Favori ilanlara ekleniyor .... </p>
             
             
            
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
        </div>
      </div>
    </div>
  </div>
  

  <!-- Modal -->
  <div class="modal fade" id="ayhan" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">MESAJLAŞMA</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body mesajbody">
         
            <p>  <a href="<?php SELF::go('user/kayit'); ?>">Mesaj yazabilmek için üye olmalısınız..</a></p>
             
              <p>Üye iseniz ...  <a href="<?php SELF::go('user/login'); ?>">Giriş yapnız..</a></p>
            
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
        </div>
      </div>
    </div>
  </div>
 



  
  
  
    <div class="modal fade" id="sikayet" role="dialog">
    <div class="modal-dialog">
         <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>  
      <div class="modal-content">
    
        <div class="modal-body sikayetbody" id="sikayet">
         
            
            
        </div>
  
      </div>
    </div>
  </div>
  
  
  <style>
      .mak li{
         
    color: #888888;
    width: 160px;
       display: inline-block;
  margin: 2 10px;
      }
       .selected{
               
               font-weight: bold;
               color :#000 !important;
           }
        
  </style>
  

  

</div>

   <?php 
   /*
$x = $this->help("reklam")->ilan();

    if($x->ilandetay==1):
        $reklambaslik = $x->baslik;
        $kod = $x->kod; ?>  
      
    
<div class="rememberprofile hab">


				
   <!-- <h2><?php echo $reklambaslik ; ?></h2>-->
    <ul class="">
        <li><?php echo html_entity_decode($kod) ; ?></li>
    </ul>

</div>
 <?php endif; */ ?>		   
</div>
    


<div class="col-md-12 merta">


 <ul class="tabs">
    <li class="tab-link current" data-tab="tab1">İlan Detayları</li>
    <li class="tab-link" data-tab="tab2">Konumu</li>
        <li class="tab-link" data-tab="tab3">Özellikler</li>
        <?php if($sk=="ok") { ?>
        <li id="sokak" onclick="skk()" class="tab-link" data-tab="tab4">Sokak Görünümü</li>
        <?php } ?>
  </ul>

  <div id="tab1" class="tab-content current">
<?php echo html_entity_decode($ilan->aciklama); ?>  </div>
	
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUrw-ZHHWaCBbrbswQW7dcL5XoRPsJAN0"></script>  
       
   	
     <style>
    #map{
        height: 500px;
        width: 100%;
        margin: 0px;
        padding: 0px
      }
     </style>   
  
  <div id="tab2" class="tab-content">
     <?php $map = str_replace(":", ",", $ilan->map) ; ?>
<iframe id="map" src = "https://maps.google.com.tr/maps?q=<?php echo $map; ?>&hl=tr-TR;z=14&amp;output=embed" style="border:0"></iframe>

  </div>
 
   <div id="tab3" class="tab-content"> 
 
   <div class="pzellikler">
	
     
   <?php
	 
        
         $kx = explode(",", $ilan->kategori);
         
       $ngruplar  = $cls->kategorigruplar($kx[0]);
       
	$gruplar = $cls->gruplar($ngruplar);
        
        
        
        if($gruplar):
            foreach ($gruplar as $g ){   
            
        ?>
 
        <h5><?php echo $g->grupadi; ?></h5>
    	<ul class="mak">
        
         	<?php
	 $ozellikler = $cls->ozellikler($g->id);
        $array = explode(",", $ilan->ozellik);
   
        
         
         
	foreach ($ozellikler as $o) { 
        
         ?>   
            
       <?php if(in_array($o->id, $array)){  ?>    <li class="selected" ><?php echo $o->ozellik_adi; ?> </li> 
           
	<?php
        } } ?>
        <div class="clearfix"></div>
        </ul> 
     <?php
	} ?>
     

     
     


            <?php endif; ?>





</div>

	</div>

      
     
   
 <?php 
      
      
$r = explode(":", $ilan->map);
$lat = $r[0];
$lng = $r[1];

     
      
      
      ?>
      <style>
   
  #pano {
      width: 100%; height: 500px;
      margin-top:2px;
  }
</style>
  <?php if($sk=="ok") { ?>   
     <div id="tab4" class="tab-content">
         
  
 <?php 
      
      
$r = explode(":", $ilan->map);
$lat = $r[0];
$lng = $r[1];

     
      
      
      ?>
   <div id="pano"></div>
  
         
     </div>
  <?php } ?>			
	</div>
</div></div> 



  <script>
     var x = <?php echo $toplamk; ?> - 2;
  
         $(function() {
    
var i ;
for(i = 0; i < x;i++){
   
   $('#ustk_' + i).hide(); 
    
}
  });   
      
    var map;
var berkeley = new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>);
var sv = new google.maps.StreetViewService();

var panorama;

function initialize() {

    panorama = new google.maps.StreetViewPanorama(document.getElementById('pano'));

    // Set the initial Street View camera to the center of the map
    sv.getPanoramaByLocation(berkeley, 50, processSVData);

    // Look for a nearby Street View panorama when the map is clicked.
    // getPanoramaByLocation will return the nearest pano when the
    // given radius is 50 meters or less.
    google.maps.event.addListener(map, 'click', function (event) {
        sv.getPanoramaByLocation(event.latLng, 50, processSVData);
    });
}

function processSVData(data, status) {
    if (status == google.maps.StreetViewStatus.OK) {
        var marker = new google.maps.Marker({
            position: data.location.latLng,
            map: map,
            title: data.location.description
        });

        panorama.setPano(data.location.pano);
        panorama.setPov({
            heading: 270,
            pitch: 0
        });
        panorama.setVisible(true);

        google.maps.event.addListener(marker, 'click', function () {

            var markerPanoID = data.location.pano;
            // Set the Pano to use the passed panoID
            panorama.setPano(markerPanoID);
            panorama.setPov({
                heading: 270,
                pitch: 0
            });
            panorama.setVisible(true);
        });
        
      
    } else {
        
        $("#sokak").hide();
       // alert('Street View data not found for this location.');
    }
}

initialize();

function skk(){
       
       
     initialize();
         }     

  
    </script>

<style>
    @media screen and (min-width: 900px) {
        .altx{ display: none !important; }
        .altx .btn-holder a {display: none !important;}
    }
    @media screen and (max-width: 900px) {
        .ceptel{ display: none !important; }
    .ilmsj{ display: none !important; }
    .hab{ display: none !important; }
        .lSPager.lSGallery {display: none !important;}
       
    }
    .altx{ 
        background-color: #0000008c;
    width: 102%;
    position: fixed;
    bottom: 0px;
    padding: 0px;
    height: 35px;
    z-index: 1;
    }
.altx .btn-holder {
  justify-content: flex-end;
  display: flex; float: left;
}
.altx .btn-holder a {
    text-align: center;
    position: absolute;
    width: 49%;
    padding: 5px 0px;
    background: #cebc00;
    font-size: 14px;
    border: none;
    color: #fff;
    bottom: 8%;
}
</style>

   <div class="altx">
       
    <div class="btn-holder">
    <a style="    right: 0;" href="tel:<?php echo $mobiltel; ?>" style="right: 3%;"  type="button">ARA</a>
  </div>    
  <div class="btn-holder">
 <?php if($_SESSION["user_id"]): ?>
    <a  style="    left: 0;" data-toggle="modal" data-target="#ayhan" onclick="yukle('<?php SELF::go("ilan/mesaj/ilanId/".$ilan->id); ?>','mesajbody')" href="#">İlan sahibine soru sor</a>
<?php else: ?>
    
        <a  style="    left: 0;" href="#" id="ismsj" data-toggle="modal" data-target="#ayhan">İlan sahibine soru sor</a>

        
        <?php    endif; ?>
  </div>
  </div>
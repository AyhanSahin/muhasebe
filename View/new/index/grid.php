       <?php $ics = "";  $sld = $cls->banner($id);
if($sld){ ?>  
        <section>
            <div class="revolution-container">
                <div class="revolution">
                    <ul class="list-unstyled">	<!-- SLIDE  -->
                    
 
                    
     <?php foreach ($sld as $value): ?>

              
                           <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                            <!-- MAIN IMAGE -->
        <?php  if($value->baslik) {   ?>    
                            <a href="<?php  echo $value->baslik; ?>" target="_new" >
                
                   
                            <img src="<?php  echo $value->link; ?>"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                      </a> 
                    <?php } else {?>
                            
<img src="<?php  echo $value->link; ?>"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
      <?php } ?>
                            
                            <!-- LAYERS -->
                            <div class="tp-caption skewfromrightshort customout"
                                 data-x="20"
                                 data-y="160"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="500"
                                 data-start="300"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="500"
                                 data-endeasing="Power4.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 4">
                                     <?php  if($value->aciklama) {   ?>  
<?php  echo html_entity_decode($value->aciklama); ?>
   <?php } ?>
                            </div>
                          
                            
                 
                            
                           
                        
                        </li>                
                    

    
 <?php endforeach;  ?>         
 
                        
                 
 <div class="revolutiontimer"></div>
                </div>
            </div>
        </section>
<style>.second-page-container {
    padding-top: 0px !important;
}</style>
<?php } ?>   

<section>
    <script>
    $( document ).ready(function() {
    $('.multipleSelect').fastselect();
}); 
</script>
<link rel="stylesheet" href="<?php echo SKIN ; ?>pagination/css/style.css">    
<script src="<?php echo SKIN ; ?>pagination/js/index.js"></script>  

   
            <div class="second-page-container">
                <div class="container">
                    <div class="row">

                        <div class="col-md-9">
                            <div class="block-breadcrumb">
                                <ul class="breadcrumb">
 <li><a href="<?php SELF::go(""); ?>" class="breadcrump-link"><?php echo "ANA SAYFA"; // echo $lang->anasayfa; ?></a></li>
<?php
   $seo = $this->help("seourl");
    $x = 0;
    $ktgr_id = array_reverse($y['id']);
    foreach (array_reverse($y['kategori_adi']) as $k){ 
      
        ?>
   
  <li class="breadcrump-item">
    <a href="<?php self::go('index/kategoriler/id/'.$ktgr_id[$x].'/'.$seo->seo($k)); ?>" class="breadcrump-link"><?php echo $k; ?></a>
  </li>
    <?php $x++; } ?>
                                </ul>
                            </div>

                            <div class="header-for-left">
                                <h3 class="wow fadeInRight animated" data-wow-duration="1s"> <span  style="color: #000"><?php echo $k; ?></span> </h3>

                            </div>
                            <div class="block-products-modes color-scheme-2">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <div class="product-view-mode">
                                            <a href="javascript:void(0)" class="active"><i class="fa fa-th"></i></a>
                                            <a href="javascript:void(0)" onclick="list()"><i class="fa fa-list"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-1">
                                                <label class="pull-right">SIRALAMA</label>
                                            </div>
                                            <div class="col-md-6">
	<select id="liste" class="form-control" onchange="filtre()">
		<option value="f1">Fiyata Göre (Önce En Düşük)</option>
		<option value="f2">Fiyata Göre (Önce En Yüksek)</option>
		<option value="t1">Tarihe Göre (Önce En Eski İlan)</option>
		<option value="t2" selected>Tarihe Göre (Önce En Yeni İlan)</option>
		<option value="a1"> Adrese Göre (A-Z)</option>
		<option value="a2">Adrese Göre (Z-A)</option>
	</select>

                                            </div>
                                   
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
<style>
    .fa-stack {
        width: 1em; 
    }
</style>
                            
                            <div class="row" id="xzxz">
<?php 
$trh = date("Y-m-d", strtotime("-1 week"));
foreach($data->ilan as $gav): 
    $ilx = $gav->adres_il;
    $ilcex = $gav->adres_ilce;        
    $il = $cls->ilismi($ilx);
   $ilce = $cls->ilceismi($ilcex); 
   $seo = $this->help("seourl");
   
 $puan = $api::ilanpuan($gav->id);
 
    
?> 
                                <div class="col-xs-12 col-sm-6 col-md-4 text-center mb-25">
                                    <article class="product light">
<figure class="figure-hover-overlay">                                                                        
    <a href="<?php SELF::go('ilan/detay/id/'.$gav->id.'/'.$seo->seo($gav->baslik)); ?>"  class="figure-href"></a>
<?php  if($gav->firsat == 1 && $gav->fft >= $trh) : ?>  
    <div class="product-sale"><?php echo $this->indirim($gav->ff,$gav->fiyat); ?>% <br></div>
<?php endif; ?>   
   
    <a href="javascript:void(0)" title="Favoriler" onclick="wishlist.add('<?php echo $gav->id; ?>','<?php echo $api::thumbresim($gav->id); ?>','<?php echo $gav->baslik; ?>');"  class="product-wishlist"><i class="fa fa-heart-o"></i></a>
    <img src="<?php echo $api::thumbresim($gav->id); ?>" class="img-overlay img-responsive" alt="">
    <?php if($api::thumbresim2($gav->id)): $resim = $api::thumbresim2($gav->id); ?> 
    <img src="<?php echo $api::thumbresim2($gav->id); ?>" class="img-responsive" alt="">
     <?php else: $resim = $api::thumbresim($gav->id); ?>
    <img src="<?php echo $resim; ?>" class="img-responsive" alt="">
    <?php endif; ?>
</figure>
<div class="product-caption">
    <div class="block-name">
        <a href="#" class="product-name"><?php echo $gav->baslik; ?></a>
        <p class="product-price">
          <?php  if($gav->firsat == 1 && $gav->fft >= $trh) : ?> 
            <span>  <?php  echo number_format($gav->fiyat,2,",",".");  ?> </span> 
        <?php echo number_format($gav->ff,2,",",".");  echo $gav->kur;
        else:  echo number_format($gav->fiyat,2,",",".");   echo $gav->kur;
       endif; ?>
        </p>

    </div>
     <?php if($cls->urunsecenekvarmi($gav->id)):  ?> 
    <div class="product-cart">
<a href="javascript:void(0)" class="shoping" onclick="cartadd('<?php echo $gav->id; ?>','<?php echo $resim; ?>');"><i class="fa fa-shopping-cart"></i> </a>

    </div>
     <?php endif; ?>   
    <div class="product-rating">
        <div class="stars">
 <?php echo $this->help("uhyildiz")->yildiz($puan->puan); ?>
        </div>
        <a href="" class="review"> <?php echo $puan->adet; ?> Yorum</a>
    </div>
</div>

                                    </article>
                                </div>
<?php endforeach; ?>
                            </div>
                                    
               <div class="clear"></div>

<?php if($data->toplam >= 1): ?>
<div class="pagination">
 <div class="pagination content_detail__pagination cdp" actpage="1">
			<a href="#!-1"  onclick="yenile('e');" class="cdp_i">prev</a>
                        <?php for($i=1;$i<=$data->toplam;$i++){ ?>
    
                        <a href="#!<?php echo $i ; ?>" onclick="yenile(<?php echo $i ; ?>);" class="cdp_i"><?php echo $i ; ?></a>
    
<?php } ?>  
                        
 <a href="#!+1" onclick="yenile('a');" class="cdp_i">next</a>                       
                        
			
		
			
		</div>


</div>
<?php endif; ?> 
                        </div>
                        <aside class="col-md-3">

                            <div class="main-category-block ">
                                <div class="main-category-title">
                                    <i class="fa fa-list"></i> KATEGORİ

                                </div>
                            </div>
                            <div class="widget-block">
                                <ul class="list-unstyled ul-side-category">
                                    
<?php


$uyy = array_reverse($y['kategori_adi']); $son = count($uyy);
$x = 0; foreach ($uyy as $k){ 
?>         
                                    
                                    <li>
                                        <a href="<?php self::go('index/kategoriler/id/'.$ktgr_id[$x].'/'.$seo->seo($k)); ?>">
                                         
                                            
<?php $x++; if($x==$son){ ?><i class="fa fa-plus"></i><?php } else { ?>   <i class="fa fa-angle-right"></i><?php } ?><?php echo $k; ?> 
                                        </a>
                                        
                                        
    <?php   }   ?>	   
                                        <ul id="ayh_arbt"  class="sub-category" style="display : block !important;">                                 
                                        
           <?php $alksys=0; foreach ($cls->altkategori($id) as $altktgr){ $alksys++; ?>                              
                                        
    
            <li>
                <a href="<?php self::go('index/kategoriler/id/'.$altktgr->id.'/'.$seo->seo($altktgr->kategori_adi)); ?>"> <?php  echo $altktgr->kategori_adi; ?></a>

            </li>

       				<?php } if($alksys>7): ?>   
                                                                    
                                         
                                                
                                            <a href="#" id="ayh_gzl" style="color:red !important"> Tümünü Göster</a>         
                         </ul>                    	
        <?php endif; ?>
                                        
                                      
                                    
                                    </li>
                           
                                    
                                </ul>

                            </div>
         
                            <div class="widget-title">
                                <i class="fa fa-money"></i> Fiyat Aralığı

                            </div>
                            <div class="widget-block">
                                <div class="row">
                                    <div class="col-md-12" >
                                        
        <button id="b1" onclick="kur('b1','TL')" class="btn btn-light">TL</button>
	<button id="b2" onclick="kur('b2','USD')"  class="btn btn-light">USD</button>
	<button id="b3" onclick="kur('b3','EUR')"  class="btn btn-light">EUR</button>
	<button id="b4" onclick="kur('b4','GBP')"  class="btn btn-light">GBP</button> 
	<input id="kurx" type="hidden" name="kur" value="TL" />
         
                                    </div>
                                    
                                    
                                    <div class="col-md-4" style="padding-right: 1px ! important;">
                                        <div class="input-group">
                                            <span style="font-family: sans-serif;" class="input-group-addon" id="kurisretmin">₺</span>
                                            <input type="text" id="fminx" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4"  style="padding-right: 1px ! important;" >
                                        <div class="input-group">
                                            <span style="font-family: sans-serif;"id="kurisretmax" class="input-group-addon">₺</span>
                                            <input type="text" id="fmaxx" class="form-control" value="">
                                        </div>
                                    </div>
                                    
                                  <div style="padding-left: 1px ! important;" class="col-md-4">
                               
                            <button ctype="button" class="btn btn-primary" onclick="filtre()">Uygula</button> 
                            </div>
                                </div> 
                            </div>
                            
                            <form>
                                <input type="hidden" id="tarih"  value="" />
                             
     <?php   foreach ($cls->modul($id) as $ma){  
    if ($ma->tip == 3){  
    $ms = $cls->secenek($ma->id); 
 if(count($ms) > 1) {
     $cssclass = ' class="multipleSelect" multiple="multiple" data-live-search="true" ';}
     else {$cssclass = ' class="multipleSelect" data-max-options="1" ';}    ?>  
  
    
                   
                            <div class="widget-block">
                                
      <select  placeholder="<?php echo $ma->adi; ?>" name="<?php echo $ma->id; ?>" id="secenek<?php echo $ma->id ; ?>" <?php echo $cssclass; ?>>
        <?php foreach  ($ms as $s){  ?>
        <option value="<?php echo $s->id; ?>" ><?php echo $s->adi; ?></option>	
        <?php } ?>    
     </select>
          
          </div>
     <?php }  ?>       
                           
                        <?php }  ?>           
                            </form>   
                 <div class="widget-block">           
           <input type="hidden" value="" id="fltr" />
<input type="hidden" class="form-control" id="kelime" value="<?php if($this->val->s) echo urldecode($this->val->s); ?>" placeholder="Kelime giriniz."/>
               
                       </div>
             
                        </aside>

                    </div>
                    

                    
                </div> 

                
                
            </div>

    
    
 
        </section>



<script type="text/javascript">
$(document).ready(function(){
    
  $('#ayh_arbt li:gt(6)').hide();   
    
 

$('a#ayh_gzl').click(function() {
    $('a#ayh_gzl').hide();
$('#ayh_arbt li:gt(6)').slideToggle(40);
return false;
});
  
    
    
 $('.multipleSelect').change(function(){
       
        $(".fstActive").removeClass("fstActive"); 
        filtre();
     });
     
     
     
     
});
 
        var fltr = 0;
        var sayfa =1;
        
        function filtre(){
            var liste = $("#liste").val(); 
            $("#fltr").val(1);  
            fltr = 1; 
            var formd = "";
            var il = $("#ilcegetir").val(); 
            var i = $("#ilceler").val(); 
            var fmin =  $("#fminx").val(); 
            var fmax =   $("#fmaxx").val(); 
            var kur =   $("#kurx").val(); 
            var klm =   $("#kelime").val(); 
            var trh =   $("#tarih").val(); 
            var str = $( "form" ).serializeArray();
              jQuery.each( str, function( i, field ) {
     formd += "," + field.name + ":" +field.value;
    });
                     //console.log(formd);
                    // return false;
                    
                    
          $("#sonuc").html('<img src="<?php echo SKIN ; ?>web/images/arbat.gif" alt="Wait" />');
 
                    
                 $.post( "<?php echo SITE ; ?>/anasayfa_ajax_g/kategori",
                 {il:il, kategori : <?php echo $id; ?> ,sayfa: 1,ilce:i,fmn:fmin,fmx:fmax,kur:kur,kelime:klm,tarih:trh ,str:str,liste:liste}).done(function( sonuc ) {
       if($(document).width() < 990){
     $("#kapatx").trigger( "click" );}
      $("#xzxz").html(sonuc);
       $(".view #active").trigger( "click" );
    // $('html, body').animate({scrollTop:0}, 'slow');
 
    
		
  });      
            
                }
     function yenile(s){ 
         if(s=="a"){
             sayfa = sayfa + 1;
                   }
        else if(s=="e"){
                sayfa = sayfa - 1;
                }
        else {sayfa = s;}
        var liste = $("#liste").val();  
    
        if($("#fltr").val() == 1){
            var il = $("#ilcegetir").val(); 
            var i = $("#ilceler").val(); 
            var fmin =  $("#fminx").val(); 
            var fmax =   $("#fmaxx").val(); 
            var kur =   $("#kurx").val(); 
            var klm =   $("#kelime").val(); 
            var trh =   $("#tarih").val(); 
            var str = $( "form" ).serializeArray();
               }
            else {
                var il = ""; 
                var i = ""; 
                var fmin =  ""; 
                var fmax =  ""; 
                var kur =   ""; 
                var klm =   ""; 
                var trh =   "";  
                var str = "";
                   
               }
               
        $("#sonuc").html('<img src="<?php echo SKIN ; ?>web/images/arbat.gif" alt="Wait" />');
      $.post( "<?php echo SITE ; ?>/anasayfa_ajax_g/kategori",
                  
        { il:il,kategori : <?php echo $id; ?> ,sayfa:sayfa,ilce:i,fmn:fmin,fmx:fmax,kur:kur,kelime:klm,tarih:trh ,str:str,liste:liste})

  .done(function( sonuc ) {
      $("#xzxz").html(sonuc);

     $('html, body').animate({scrollTop:0}, 'slow');	
  });
    }
<?php if($this->val->s) { ?> filtre(); <?php } ?>

function list(){
    var xc = '<?php  time(); ?>';
                  $.post( "<?php echo SITE ; ?>/index/liste",
                 {tmi : xc})
                         .done(function( sonuc ) { 
                    if(sonuc == xc){
                        location.reload();
                    }     
            });
    
}

</script>
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
 <li><a href="<?php SELF::go(""); ?>" class="breadcrump-link"><?php echo $lang->anasayfa; ?></a></li>
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

                            <div class="header-for-light">
                                <h1 class="wow fadeInRight animated" data-wow-duration="1s">Short <span>dresses</span></h1>

                            </div>
                            <div class="block-products-modes color-scheme-2">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <div class="product-view-mode">
                                            <a href="javascript:void(0)" class="active"><i class="fa fa-th"></i></a>
                                            <a href="javascript:void(0)" onclick="list()"><i class="fa fa-th-large"></i></a>
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
                                <div class="col-xs-12 col-sm-6 col-md-6 text-center mb-25">
                                    <article class="product light">
<figure class="figure-hover-overlay">                                                                        
    <a href="<?php SELF::go('ilan/detay/id/'.$gav->id.'/'.$seo->seo($gav->baslik)); ?>"  class="figure-href"></a>
<?php  if($gav->firsat == 1 && $gav->fft >= $trh) : ?>  
    <div class="product-sale"><?php echo $this->indirim($av->fiyat,$av->ff); ?>% <br></div>
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
        <span><?php echo number_format($gav->ff,2,",","."); ?></span>
            <?php endif; ?>
            <?php  echo $gav->fiyat; ?> <?php echo $gav->kur; ?>
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


$uyy = array_reverse($y['kategori_adi']); 
$x = 0; foreach ($uyy as $k){ 
?>         
                                    
                                    <li><a href="<?php self::go('index/kategoriler/id/'.$ktgr_id[$x].'/'.$seo->seo($k)); ?>"><i class="fa fa-angle-right"></i><?php echo $k; ?></a>
                                        
                                        
    <?php  $x++; }   ?>	   
                                        <ul class="sub-category" style="display : block !important;">                                 
                                        
           <?php  foreach ($cls->altkategori($id) as $altktgr){ ?>                              
                                        
    
            <li><a href="<?php self::go('index/kategoriler/id/'.$altktgr->id.'/'.$seo->seo($altktgr->kategori_adi)); ?>"> <?php  echo $altktgr->kategori_adi; ?></a>

            </li>

       
                                        
                   <?php  }   ?>                      
                   </ul>                      
                                    </li>
                           
                                    
                                </ul>

                            </div>
                         
                            <div class="widget-title">
                                <i class="fa fa-money"></i> Fiyat Aralığı

                            </div>
                            <div class="widget-block">
                                <div class="row">
                                    <div class="col-md-12" >
                                        
        <button id="b1" onclick="kur('b1','TL')" class="currently currentlysec">TL</button>
	<button id="b2" onclick="kur('b2','USD')"  class="currently">USD</button>
	<button id="b3" onclick="kur('b3','EUR')"  class="currently">EUR</button>
	<button id="b4" onclick="kur('b4','GBP')"  class="currently">GBP</button> 
	<input id="kurx" type="hidden" name="kur" value="TL" />
         
                                    </div>
                                    
                                    
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span style="font-family: sans-serif;" class="input-group-addon" id="kurisretmin">₺</span>
                                            <input type="text" id="fminx" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span style="font-family: sans-serif;"id="kurisretmax" class="input-group-addon">₺</span>
                                            <input type="text" id="fmaxx" class="form-control" value="">
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            
                            <form>
                                <input type="hidden" id="tarih"  value="" />
                             
     <?php   foreach ($cls->modul($id) as $ma){  
    if ($ma->tip == 3){  
    $ms = $cls->secenek($ma->id); 
 if(count($ms) > 2) {
     $cssclass = ' class="multipleSelect" multiple="multiple" data-live-search="true" ';} else {$cssclass = ' class="multipleSelect" data-max-options="1" ';}
    ?>    
    
                            <div class="widget-title">
                                <i class="fa fa-dashboard"></i> <?php echo $ma->adi; ?>

                            </div>
                            <div class="widget-block">
                                
      <select  placeholder="<?php echo $ma->adi; ?>" name="<?php echo $ma->id; ?>" id="secenek<?php echo $ma->id ; ?>" <?php echo $cssclass; ?>>
        <?php foreach  ($ms as $s){  ?>
        <option value="<?php echo $s->id; ?>" ><?php echo $s->adi; ?></option>	
        <?php } ?>    
     </select>
          
         
     <?php }  ?>       
                            </div>
                        <?php }  ?>           
                            </form>   
                 <div class="widget-block">           
           <input type="hidden" value="" id="fltr" />
<input type="text" class="form-control" id="kelime" value="<?php if($this->val->s) echo $this->val->s; ?>" placeholder="Kelime giriniz."/>
               
                       </div>
                            <div class="col-md-12">
                               
                            <button ctype="button" class="btn btn-primary" onclick="filtre()">Filtrele</button> 
                            </div>
                        </aside>

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

                
                
            </div>

    
    
 
        </section>



<script type="text/javascript">
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
                    
                    
          $("#sonuc").html('<img src="http://lastmoment.ir/DesktopModules/eCommerce/images/loading.gif" alt="Wait" />');
 
                    
                 $.post( "<?php echo SITE ; ?>/anasayfa_ajax_g/kategori",
                 {il:il, kategori : <?php echo $id; ?> ,sayfa: 1,ilce:i,fmn:fmin,fmx:fmax,kur:kur,kelime:klm,tarih:trh ,str:str,liste:liste}).done(function( sonuc ) {
       if($(document).width() < 990){
     $("#kapatx").trigger( "click" );}
      $("#xzxz").html(sonuc);
       $(".view #active").trigger( "click" );
     $('html, body').animate({scrollTop:0}, 'slow');
 
    
		
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
               
        $("#sonuc").html('<img src="http://lastmoment.ir/DesktopModules/eCommerce/images/loading.gif" alt="Wait" />');
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
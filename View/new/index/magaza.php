    <script>
    $( document ).ready(function() {
    $('.multipleSelect').fastselect();
}); 
</script>
<link rel="stylesheet" href="<?php echo SKIN ; ?>pagination/css/style.css">    
<script src="<?php echo SKIN ; ?>pagination/js/index.js"></script>  
        <section>
            <div class="second-page-container">
                <div class="container magazailaner">
                    <div class="row col-md-12">
        <style>
    .fa-stack {
        width: 1em; 
    }
.magazascreen {
    overflow: hidden;
    background-size: 100% 100%;
    border-radius: 3px;
}
    .ui-accordion .ui-accordion-content {
        padding: 6px ! important;
    }
   .magazaprofil img {
    height: 100px;
    width: 100px;
    border-radius: 50px;
}
</style>
<div  class=" col-md-12 magazascreen"> <img src="<?php echo $magaza->banner; ?>"></div>

<?php    $seo = $this->help("seourl"); $ktgr_id = array_reverse($y['id']); $uyy = array_reverse($y['kategori_adi']);  ?>

                        <aside class="col-md-3">
                            
 <div class="magazaprofil">
<img src="<?php echo $magaza->logo; ?>">
<h3><?php echo $user->companyName; ?></h3>
<i class="fa fa-phone"></i> <?php echo $user->mobilePhone; ?>
</div>                           
                            
                            
                            <div class="main-category-block ">
                                <div class="main-category-title">
                                    <i class="fa fa-list"></i> KATEGORİ

                                </div>
                            </div>
                                <div class="widget-block">
 <ul class="list-unstyled ul-side-category">
                                    
    <?php 
    $r =  explode(",",$user->category);
    foreach ($r as $xxx) {
        $ktg = $cls->katgid($xxx);
    
    if(12380 != $ktg->id && $ktg->sira == 1) :

                                            ?>                   
     <li><a href="javascript:void(0)">
           <i class="<?php echo $ktg->ikon; ?>"></i>     <?php echo $ktg->kategori_adi; ?> : <?php echo $api::magazailanadet($ktg->id,$user->id); ?> 
            </a>



         <ul  class="sub-category" style="display : block !important;"> 
    <?php  foreach ($cls->katgustid($ktg->id) as $value) {?>

    <?php if($api::magazailanadet($value->id,$user->id) >= 1){ ?>

            <li>
          <a href="javascript:void(0)" onclick="kategorilist('<?php echo $value->id; ?>')">
              <?php echo $value->kategori_adi; ?>
                <?php if($api::ilanadet($value->id) >= 1){ ?> ( <?php echo $api::magazailanadet($value->id,$user->id); ?> ) <?php  } ?>
          </a>
       
</li>

    <?php   }  } ?>  
					
   </ul>                                     
   </li>
 <?php   endif;   } ?>                       
 </ul>

                                  
                                    
                            </div>
 
  
<div class="magazasection">
<h3>Danışmanlarımız</h3>

<span>
<p><?php echo $magaza->danisman; ?></p>
<p><i class="fa fa-phone"></i> <?php echo $magaza->tel; ?></p>
</span>



</div>

<div class="magazasection">
<h3>Hakkımızda</h3>
<p class="aboutmep"><?php echo $magaza->hakkimizda; ?></p>
</div>                        
                   
                        </aside>


                        <div class="col-md-9">
                            <div class="block-breadcrumb">
                                <ul class="breadcrumb">
  <li><a href="<?php SELF::go(""); ?>" class="breadcrump-link"><?php echo "ANA SAYFA"; // echo $lang->anasayfa; ?></a></li>
                                   <?php
 
    $x = 0;
   
    foreach (array_reverse($y['kategori_adi']) as $k){ 
        ?>
    
  <li>
    <a href="<?php self::go('index/kategoriler/id/'.$ktgr_id[$x].'/'.$seo->seo($k)); ?>" class="breadcrump-link"><?php echo $k; ?></a>
  </li>
    <?php $x++; } ?>
                                </ul>
                            </div>

                            <div class="header-for-light">
       <h3 class="wow fadeInRight animated" data-wow-duration="1s"> <span><?php echo $k; ?></span> </h3>

                            </div>
                            <div class="block-products-modes color-scheme-2">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <div class="product-view-mode">
                                            <a href="javascript:void(0)"  class="active" ><i class="fa fa-th"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-1">
                                                <label class="pull-right">SIRALAMA</label>
                                            </div>
                                            <div class="col-md-6">
	<select id="liste" class="form-control" onchange="list(this.value)">
		<option value="f1">Fiyata Göre (Önce En Düşük)</option>
		<option value="f2">Fiyata Göre (Önce En Yüksek)</option>
		<option value="t1">Tarihe Göre (Önce En Eski)</option>
		<option value="t2" selected>Tarihe Göre (Önce En Yeni)</option>
                
	</select>

                                            </div>
                                   
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
  

<div id="xzxz" >
    
    <?php
        
 $data = $api::magazailan(1,$id); 

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
            ?>
           
          
         
 <?php endif; ?>
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
 
                            <div class="block-pagination">
                           
                                                 <div class="clear"></div>

<?php if($data->toplam >= 1): ?>
      <ul class="pagination">
 <div class="pagination content_detail__pagination cdp" actpage="1">
			<a href="#!-1"  onclick="sayfala('e');" class="cdp_i">prev</a>
                        <?php for($i=1;$i<=$data->toplam;$i++){ ?>
    
                        <a href="#!<?php echo $i ; ?>" onclick="sayfala(<?php echo $i ; ?>);" class="cdp_i"><?php echo $i ; ?></a>
    
<?php } ?>  
                        
 <a href="#!+1" onclick="sayfala('a');" class="cdp_i">next</a>                       
                        
			
		
			
		</div>


   </ul>
<?php endif; ?>
                              
                            </div>  
                                                 
</div>                         
                      
                        </div>             
              
                    </div>
                    
                    
                  
                </div>  
            </div>

        </section>

    <script type="text/javascript">
                
  $(function(){  $('#accordion').accordion(); })
var kategori = "";
var liste = "";
function list(listele){
  liste = listele;                
                     //console.log(formd);
                    // return false;
                    
$("#xzxz").html('<img src="<?php echo SKIN ; ?>web/images/arbat.gif" alt="Wait" />');
$.post( "<?php echo SITE ; ?>/anasayfa_ajax_l/magazailan",
{ id:'<?php echo $id; ?>',kategori : kategori ,sayfa: 1,sirala: liste}).done(function( sonuc ) {
      $("#xzxz").html(sonuc);
      $('html, body').animate({  scrollTop: $(".block-products-modes").offset().top    }, 1000);
  });      
}

                function kategorilist(id){
                    
    

                  kategori = id; 
                  
                
                  
                  
                     //console.log(formd);
                    // return false;
                    
                    
          $("#xzxz").html('<img src="<?php echo SKIN ; ?>web/images/arbat.gif" alt="Wait" />');

                    
                 $.post( "<?php echo SITE ; ?>/anasayfa_ajax_l/magazailan",
                  
{ id:'<?php echo $id; ?>',kategori : id ,sayfa: 1,sirala: liste})

  .done(function( sonuc ) {
     
      $("#xzxz").html(sonuc);
     $('html, body').animate({  scrollTop: $(".block-products-modes").offset().top    }, 1000);	
		
  });      
  }
                
var sayfa = 1;

                function sayfala(s){ if(s=="e"){
                    sayfa = sayfa - 1;
                }
                else if(s=="a"){sayfa = sayfa + 1;} 
                else {sayfa = s;}
     
      
  
                    
           $("#xzxz").html('<img src="<?php echo SKIN ; ?>web/images/arbat.gif" alt="Wait" />');

                    
  $.post( "<?php echo SITE ; ?>/anasayfa_ajax_l/magazailan",
                  
{ id:'<?php echo $id; ?>',kategori : kategori ,sayfa: sayfa,sirala: liste})

  .done(function( sonuc ) {
      $('html, body').animate({  scrollTop: $("div.magazailaner").offset().top    }, 1000);
       
      $("#xzxz").html(sonuc);
      
		
  }); }</script> 
<style>
    .widget-block .product-rating .stars {
        font-size : 10px !important;
    color : green !important;}
    .fa-stack {
    
    width: 1em !important;}
</style>
<script>
function gostergizle(){
    
    $(".main-category-items").toggle();
}

</script>
     <?php
     $trh = date("Y-m-d", strtotime("-1 week"));
     $sld = $cls->slider();
        if($sld && !$this->isMobileDevice()): ?> 
        <section>
            <div class="revolution-container">
                <div class="revolution">
                    <ul class="list-unstyled">	<!-- SLIDE  -->
                        
            <?php foreach ($sld as $value): ?>             
                        <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                            <!-- MAIN IMAGE -->
                            <img src="<?php  echo $value->image; ?>"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
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
                        
                        
                 
                    </ul>
                    <div class="revolutiontimer"></div>
                </div>
            </div>
        </section>

        <?php endif; ?>
    
        <section>
            <div>
                <div class="container">
                    <div class="row">
                        
             <?php   if($this->isMobileDevice()): ?>  
                        
                        <style>
                            
                            #header .header-top-row { display: none !important }
                        </style>             
                        
                        
                        <aside class="banner col-md-12">       
  <?php 
 
$x = $this->help("reklam")->anasayfa();

    if($x):
        $reklambaslik = $x->baslik;
        $kod = $x->kod;
    endif; if($x): ?>
   <style>.img-responsive img {display: block; max-width: 100%; height: auto}</style>
                               
    <div class="img-responsive">
 

    <?php echo html_entity_decode($kod) ; ?>
    </div>
<?php endif; ?>	
  </aside>     
     <?php endif; ?>               
                        
                        
                        
                
                        
                        <aside class="col-md-3">
                            <div class="main-category-block ">
                                <div class="main-category-title" style="cursor:pointer"  onclick='gostergizle()'>
                                    <i class="fa fa-list"></i> Kategoriler

                                </div>
                                <div class="main-category-items" <?php if($this->isMobileDevice()) { echo "style='display:none'";} ?>>
                                    <div class="widget-block">
                                        
                                      <?php
 foreach ($cls->katgustid() as $xxx) {
     $ktg = $cls->katgid($xxx->id);
        if(12380 != $ktg->id && $ktg->sira == 1) : ?>   

<ul class="list-unstyled ul-side-category">
    
  <li><a href=""><i class="<?php echo $ktg->ikon; ?>"></i><?php echo $ktg->kategori_adi; ?></a>
            
<ul class="sub-category">
    <?php  foreach ($cls->katgustid($ktg->id) as $value) {?>
<li>
    <a href="<?php self::go('index/kategoriler/id/'.$value->id.'/name/'.$this->help("seourl")->seo($value->kategori_adi)); ?>"><?php echo $value->kategori_adi; ?> <!--?php echo $api::ilanadet($value->id); ?--></span></a>
</li>
 <?php  } ?>   
</ul>

      

        
        
    </li>


</ul>
 <?php endif;  } 
 
 $tekfirsat = $api::firsatnewtek();
 
 ?>
                                    </div>
                                </div>
                            </div>


<?php if($tekfirsat){  ?>
 
    <article class="product light last-sale">
        <figure class="figure-hover-overlay">                                                                        
            <a href="<?php SELF::go('ilan/detay/id/'.$tekfirsat->id.'/'.$this->help("seourl")->seo($tekfirsat->baslik)); ?>"  class="figure-href"></a>
                  <?php if($tekfirsat->firsat == 1 && $tekfirsat->fft >= $trh): ?>
            <div class="product-sale">
                <?php echo $this->indirim($tekfirsat->ff,$tekfirsat->fiyat); ?>% <br>
            </div>
                    <?php endif; ?>
                                                           <div class="product-sale-time"><p class="time"></p></div>
 <a href="javascript:void(0)" title="Favoriler" onclick="wishlist.add('<?php echo $tekfirsat->id; ?>','<?php echo $api::thumbresim($tekfirsat->id); ?>','<?php echo $tekfirsat->baslik; ?>');"  class="product-wishlist"><i class="fa fa-heart-o"></i></a>
                    <img class="img-overlay img-responsive" src="<?php echo $api::thumbresim($tekfirsat->id); ?>" alt="" title="">
                        <?php if($api::thumbresim2($tekfirsat->id)):
                            $resim = $api::thumbresim2($tekfirsat->id); 
                            ?> 
                                       <img src="<?php echo $resim; ?>" class="img-responsive" alt="">
                                           <?php else:
                                               
                                        $resim = $api::thumbresim($tekfirsat->id);        
                                               ?>
                                <img src="<?php echo $resim; ?>" class="img-responsive" alt="">
                                           <?php endif; ?>                                        </figure>
                                                    <div class="product-caption">
                                                    <div class="block-name">
                                                                    <a href="<?php SELF::go('ilan/detay/id/'.$tekfirsat->id.'/'.$this->help("seourl")->seo($tekfirsat->baslik)); ?>" class="product-name"><?php echo $tekfirsat->baslik ; ?></a>
 <?php if($tekfirsat->firsat == 1 && $tekfirsat->fft >= $trh) :  ?>
<p class="product-price">
    <span><?php echo number_format($tekfirsat->fiyat,2,",","."); ?> </span> 
 
</p>  <?php echo number_format($tekfirsat->ff,2,",","."). $tekfirsat->kur; ?> 
       

<?php else:  ?>    
 <p><?php echo number_format($tekfirsat->fiyat,2,",","."); ?> <?php echo $tekfirsat->kur; ?> </p>
 <?php endif; ?>  


                    </div>
             <?php if($tekfirsat->gav && $cls->urunsecenekvarmi($tekfirsat->id)):  ?>                                                
            <div class="product-cart">
<a href="javascript:void(0)" class="shoping" onclick="cartadd('<?php echo $tekfirsat->id; ?>','<?php echo $resim; ?>');"><i class="fa fa-shopping-cart"></i> </a>
            </div>
        </div>
  <?php endif; ?>  
    </article>

                            
                            
                <script>
                        $(function() {

                	<?php 
                       $timestamp =  strtotime(date("Y-m-d", strtotime($tekfirsat->fft)) . " +1 week");
                       $time = date("M j, Y 23:59:59",$timestamp);
                        ?>
                        
                        
                        
                        $(".time").countdown({ 
                            date:  '<?php echo $time; ?>' ,
                            yearsAndMonths: true,
                            leadingZero: true
                        });
                       });
                </script>        
                            
<?php }   $deger = $api::ipuansiralama(5);  
                            if($deger):?>  
                            <div class="widget-title">
                                <i class="fa fa-thumbs-up"></i> En iyiler
                            </div>
                            
                 <?php  
                     foreach ($deger AS $eg): $hit = $api::ilanidtoilan($eg->ilanid);    ?>    
                                                        
                            
                            <div class="widget-block">
                                <div class="row">
                                    <div class="col-md-4 col-sm-2 col-xs-3">
                                        
                <?php if($api::thumbresim2($hit->ilan_id)):?> 
                   <img class="img-responsive" src="<?php echo $api::thumbresim2($hit->id); ?>" class="img-responsive" alt="">
                       <?php else: ?>
            <img class="img-responsive" src="<?php echo $api::thumbresim($hit->id); ?>" class="img-responsive" alt="">
                       <?php endif; ?>                             
                                        
                                
                                    </div>
                                    <div class="col-md-8  col-sm-10 col-xs-9">
                                        <div class="block-name">
<a href="<?php SELF::go('ilan/detay/id/'.$hit->id.'/'.$this->help("seourl")->seo($hit->baslik)); ?>" class="product-name"><?php echo $hit->baslik; ?></a>

 <?php if($hit->firsat == 1 && $hit->fft >= $trh) :  ?>
<p class="product-price">
    <span><?php echo number_format($hit->fiyat,2,",","."); ?> </span> 
 
</p>  <?php echo number_format($hit->ff,2,",","."). $hit->kur; ?> 
       

<?php else:  ?>    
 <p><?php echo number_format($hit->fiyat,2,",","."); ?> <?php echo $hit->kur; ?> </p>
 <?php endif; ?>  

                                        </div>
                                        <div class="product-rating">
  <div class="stars">
            <?php echo $this->help("uhyildiz")->yildiz($eg->puan); ?>
       </div>
   <a href="<?php SELF::go('ilan/detay/id/'.$hit->id.'/'.$this->help("seourl")->seo($hit->baslik)); ?>" class="review hidden-md">  <?php echo $eg->adet; ?> Yorum</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                <?php endforeach; endif;?>    




                        </aside>
                        
                      
                        
                 
                        
                        <div class="col-md-9">
  <?php   if(!$this->isMobileDevice()): ?>   
                            <div class="banner">
  <?php 
 
$x = $this->help("reklam")->anasayfa();

    if($x):
        $reklambaslik = $x->baslik;
        $kod = $x->kod;
    endif; if($x): ?>
   <style>.img-responsive img {display: block; max-width: 100%; height: auto}</style>
                               
    <div class="img-responsive">
 

    <?php echo html_entity_decode($kod) ; ?>
    </div>
<?php endif; ?>	
 </div>
     <?php endif; ?>                          
                            <div class="header-with-icon">
                                <i class="fa fa-tags"></i> <?php echo $lang->anasayfavitrin; ?>
                                <div class="toolbar-for-light" id="nav-summer-sale">
                                    <a href="javascript:;" data-role="prev" class="prev"><i class="fa fa-angle-left"></i></a>
                                    <a href="javascript:;" data-role="next" class="next"><i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                            <div id="owl-summer-sale"  class="owl-carousel">
                                
                             
      <?php  $ayar = $cls->anasayfaayar();  $vitrin = $api::anasayfavitrininew(0,$ayar->vitrin);
       
      if($vitrin): foreach ($vitrin as $av): ?>  
    
      
                                
                                <div class="text-center">
                                    <article class="product light wow fadeInUp">
                                        <figure class="figure-hover-overlay">                                                                        
                                            <a href="<?php SELF::go('ilan/detay/id/'.$av->id.'/'.$this->help("seourl")->seo($av->baslik)); ?>"  class="figure-href"></a>
                                    <?php if($av->firsat == 1 && $av->fft >= $trh): ?>
            <div class="product-sale">
                <?php echo $this->indirim($av->ff,$av->fiyat); ?>% <br>
            </div>
                    <?php endif; ?>                          
 <a href="javascript:void(0)" title="Favoriler" onclick="wishlist.add('<?php echo $av->id; ?>','<?php echo $api::thumbresim($av->id); ?>','<?php echo $av->baslik; ?>');"  class="product-wishlist"><i class="fa fa-heart-o"></i></a>
                    <img src="<?php echo $api::thumbresim($av->id); ?>" class="img-overlay img-responsive" alt="">
                                           <?php if($api::thumbresim2($av->id)):
                           $resim = $api::thumbresim2($av->id);                     
                                               ?> 
                   <img src="<?php echo $resim; ?>" class="img-responsive" alt="">
                       <?php else: 
                           $resim = $api::thumbresim($av->id);
                           ?>
            <img src="<?php echo $resim; ?>" class="img-responsive" alt="">
                       <?php endif; ?>
                                        </figure>
                                        <div class="product-caption">
                                            <div class="block-name">
                                                <a href="<?php SELF::go('ilan/detay/id/'.$av->id.'/'.$this->help("seourl")->seo($av->baslik)); ?>" class="product-name"><?php echo $av->baslik ; ?></a>
 <?php if($av->firsat == 1 && $av->fft >= $trh) :  ?>
<p class="product-price">
    <span><?php echo number_format($av->fiyat,2,",","."); ?> </span> 
  
</p>  <?php echo number_format($av->ff,2,",","."). $av->kur; ?> 
       

<?php else:  ?>    
 <p><?php echo number_format($av->fiyat,2,",","."); ?> <?php echo $av->kur; ?> </p>
 <?php endif; ?>  
                                            </div>
                                            
  <?php if($av->gav  && $cls->urunsecenekvarmi($av->id)):  ?>                                             
                                            
                                            <div class="product-cart">
<a href="javascript:void(0)" class="shoping" onclick="cartadd('<?php echo $av->id; ?>','<?php echo $resim; ?>');"><i class="fa fa-shopping-cart"></i> </a>
                                            </div>
  <?php endif; ?>                                           
                                            
                                        </div>

                                    </article>
                                </div>
                        
        <?php endforeach;endif;?>                        
                            </div>

                            <div class="header-with-icon">
                                <i class="fa fa-male"></i> <?php echo $lang->firsat;  ?>
                                <div class="toolbar-for-light" id="nav-child">
                                    <a href="javascript:;" data-role="prev" class="prev"><i class="fa fa-angle-left"></i></a>
                                    <a href="javascript:;" data-role="next" class="next"><i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                            <div id="owl-child"  class="owl-carousel">
                                 <?php 
    $firsat = $api::firsatnew($ayar->firsat);
    if($firsat):
    foreach ($firsat as $av): ?>
                                <div class="text-center">
                                    <article class="product light wow fadeInUp">
                                        <figure class="figure-hover-overlay">                                                                        
                                            <a href="<?php SELF::go('ilan/detay/id/'.$av->id.'/'.$this->help("seourl")->seo($av->baslik)); ?>"  class="figure-href"></a>
                                         <?php if($av->firsat == 1 && $av->fft >= $trh): ?>
            <div class="product-sale">
                <?php echo $this->indirim($av->ff,$av->fiyat); ?>% <br>
            </div>
                    <?php endif; ?>   
 <a href="javascript:void(0)" title="Favoriler" onclick="wishlist.add('<?php echo $av->id; ?>','<?php echo $api::thumbresim($av->id); ?>','<?php echo $av->baslik; ?>');"  class="product-wishlist"><i class="fa fa-heart-o"></i></a>
                                            <img class="img-overlay img-responsive" src="<?php echo $api::thumbresim($av->id); ?>" alt="" title="">
    <?php if($api::thumbresim2($av->id)):
        $resim = $api::thumbresim2($av->id); ?> 
                   <img src="<?php echo $resim; ?>" class="img-responsive" alt="">
                       <?php else: $resim = $api::thumbresim($av->id); ?>
            <img src="<?php echo $resim; ?>" class="img-responsive" alt="">
                       <?php endif; ?>                                        </figure>
                                        <div class="product-caption">
                                            <div class="block-name">
                                                <a href="<?php SELF::go('ilan/detay/id/'.$av->id.'/'.$this->help("seourl")->seo($av->baslik)); ?>" class="product-name"><?php echo $av->baslik ; ?></a>
 <?php if($av->firsat == 1 && $av->fft >= $trh) :  ?>
<p class="product-price">
    <span><?php echo number_format($av->fiyat,2,",","."); ?> </span> 
  
</p>  <?php echo number_format($av->ff,2,",","."). $av->kur; ?> 
       

<?php else:  ?>    
 <p><?php echo number_format($av->fiyat,2,",","."); ?> <?php echo $av->kur; ?> </p>
 <?php endif; ?>  

                                            </div>
                                            
            <?php if($av->gav && $cls->urunsecenekvarmi($av->id)):  ?>                                 
                    <div class="product-cart">
                        <a href="javascript:void(0)" class="shoping" onclick="cartadd('<?php echo $av->id; ?>','<?php echo $resim; ?>');"><i class="fa fa-shopping-cart"></i> </a>
                    </div>
                <?php endif; ?>                          </div>

                                    </article>
                                </div>
     <?php endforeach;endif; ?>                                 
                            </div>


                            <div class="block-product-tab">
                                <div class="tab-bg"></div>
                                <div class="toolbar-for-light" id="nav-tabs2">
                                    <a href="javascript:;" data-role="prev" class="prev"><i class="fa fa-angle-left"></i></a>
                                    <a href="javascript:;" data-role="next" class="next"><i class="fa fa-angle-right"></i></a>
                                </div>  
                                <ul class="nav nav-pills">
                                    <li class="active"><a href="#new" data-toggle="tab"><?php echo $lang->populerilan; ?></a><div class="header-bottom-line"></div></li>
                                    <li><a href="#featured" data-toggle="tab" class="disabled">Yeniler</a><div class="header-bottom-line"></div></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active animated fadeIn" id="new">
                                        <div id="owl-new2"  class="owl-carousel">
                                            
                                            <?php 

                                                $deger = $api::encokgoruntulenenilanlar($ayar->populer);  

                                                if($deger):
                                                     foreach ($deger->sonuc AS $hit):
$iln = $api::ilanidtoilan($hit->ilan_id);
                                            ?>    
                                            
                                            
                                            <div class="text-center">
                                                <div class="product light">
                                                    
                                                    
                                                    <figure class="figure-hover-overlay">                                                                        
   <a href="<?php SELF::go('ilan/detay/id/'.$hit->ilan_id.'/'.$this->help("seourl")->seo($iln->baslik)); ?>"  class="figure-href"></a>
   <?php if($iln->firsat == 1 && $iln->fft >= $trh): ?>
            <div class="product-sale">
                <?php echo $this->indirim($iln->ff,$iln->fiyat); ?>% <br>
            </div>
                    <?php endif; ?>   
 <a href="javascript:void(0)" title="Favoriler" onclick="wishlist.add('<?php echo $iln->id; ?>','<?php echo $api::thumbresim($iln->id); ?>','<?php echo $iln->baslik; ?>');"  class="product-wishlist"><i class="fa fa-heart-o"></i></a>
                                                        <img src="<?php echo $api::thumbresim($iln->id); ?>" class="img-overlay img-responsive" alt="">
    <?php if($api::thumbresim2($iln->id)):
        $resim = $api::thumbresim2($iln->id);
        ?> 
                   <img src="<?php echo $api::thumbresim2($iln->id); ?>" class="img-responsive" alt="">
                       <?php else:
        $resim = $api::thumbresim($iln->id);                   
                           ?>
            <img src="<?php echo $resim; ?>" class="img-responsive" alt="">
                       <?php endif; ?>                                                    </figure>
                                                    <div class="product-caption">
                                                        <div class="block-name">
    <a href="<?php SELF::go('ilan/detay/id/'.$iln->ilan_id.'/'.$this->help("seourl")->seo($iln->baslik)); ?>" class="product-name"><?php echo $iln->baslik; ?></a>
 <?php  if($iln->firsat == 1 && $iln->fft >= $trh) :  ?>
<p class="product-price">
    <span><?php echo number_format($iln->fiyat,2,",","."); ?> </span> 
  
</p>  <?php echo number_format($iln->ff,2,",","."). $iln->kur; ?> 
       

<?php else:  ?>    
 <p><?php echo number_format($iln->fiyat,2,",","."); ?> <?php echo $iln->kur; ?> </p>
 <?php endif; ?>  
                                                        </div>
       <?php if($iln->gav && $cls->urunsecenekvarmi($hit->ilan_id)):  ?>
                                                        <div class="product-cart">
 <a href="javascript:void(0)" class="shoping" onclick="cartadd('<?php echo $iln->id; ?>','<?php echo $resim; ?>');"><i class="fa fa-shopping-cart"></i> </a>
                                                        </div>
                             <?php endif; ?>

                                                    </div>

                                                </div>
                                            </div>
                                        <?php endforeach; endif;?>
                                        </div>
                                    </div>

                                    <div class="tab-pane animated fadeIn" id="featured">
                                        <div id="owl-featured2"  class="owl-carousel">

                    <?php   $deger = $api::anasayfayeni();  

                         if($deger):
                              foreach ($deger AS $yeni):

                     ?>        

                     
      
                                
                                <div class="text-center">
                                    <article class="product light wow fadeInUp">
                                        <figure class="figure-hover-overlay">                                                                        
                                            <a href="<?php SELF::go('ilan/detay/id/'.$yeni->id.'/'.$this->help("seourl")->seo($yeni->baslik)); ?>"  class="figure-href"></a>
                                            
<?php if($yeni->firsat == 1 && $yeni->fft >= $trh): ?>
            <div class="product-sale">
                <?php echo $this->indirim($yeni->ff,$yeni->fiyat); ?>% <br>
            </div>
                    <?php endif; ?>                                               
<div class="product-new">YENİ</div>
                                            <a href="javascript:void(0)" title="Favoriler" onclick="wishlist.add('<?php echo $yeni->id; ?>','<?php echo $api::thumbresim($yeni->id); ?>','<?php echo $yeni->baslik; ?>');"  class="product-wishlist" ><i class="fa fa-heart-o"></i></a>
                                            <img src="<?php echo $api::thumbresim($yeni->id); ?>" class="img-overlay img-responsive" alt="">
                                           <?php if($api::thumbresim2($yeni->id)):
                $resim = $api::thumbresim2($yeni->id);                               
                                               ?> 
                   <img src="<?php echo $resim; ?>" class="img-responsive" alt="">
                       <?php else: 
                $resim = $api::thumbresim($yeni->id);           
                           ?>
            <img src="<?php echo $resim; ?>" class="img-responsive" alt="">
                       <?php endif; ?>
                                        </figure>
                                        <div class="product-caption">
                                            <div class="block-name">
                                                <a href="<?php SELF::go('ilan/detay/id/'.$yeni->id.'/'.$this->help("seourl")->seo($yeni->baslik)); ?>" class="product-name"><?php echo $yeni->baslik ; ?></a>
 <?php  if($yeni->firsat == 1 && $yeni->fft >= $trh) :  ?>
<p class="product-price">
    <span><?php echo number_format($yeni->fiyat,2,",","."); ?> </span> 
 </p>  <?php echo number_format($yeni->ff,2,",","."). $yeni->kur; ?> 
       

<?php else:  ?>    
 <p><?php echo number_format($yeni->fiyat,2,",","."); ?> <?php echo $yeni->kur; ?> </p>
 <?php endif; ?>  
                                            </div>
                <?php if($yeni->gav && $cls->urunsecenekvarmi($yeni->id)):  ?>      
                   <div class="product-cart">
 <a href="javascript:void(0)" class="shoping" onclick="cartadd('<?php echo $yeni->id; ?>','<?php echo $resim; ?>');"><i class="fa fa-shopping-cart"></i> </a>
                  </div>
                <?php endif; ?>          
                                        </div>

                                    </article>
                                </div>
                        
                     <?php endforeach; endif;?>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        
      
                     
                        
                        <div class="row">
                                
                                <div class="col-md-12">
                               
                                        
     <?php 
 
$x = $this->help("reklam")->anasayfaalt();

    if($x):
        $reklambaslik = $x->baslik;
        $kod = $x->kod;
    endif; if($x): ?>
   <style>.banner img {display: block; max-width: 100%; height: auto; }</style>
                               
    
      <article class="banner">
                                        

    <?php echo html_entity_decode($kod) ; ?>
           </article>
<?php endif; ?>	                                     
                                        
                                        
                                        
                                      
                             
                                </div>
                            </div>   
                        
                    </div>
                </div>  
            </div>

        </section>
<!--
      <section class="partners">
		
            <div class="block color-scheme-dark-90">
                <div class="container">
                    <div class="header-for-dark">
                        <h1 class="wow fadeInRight animated" data-wow-duration="2s">Business <span>partners</span></h1>
                    </div>
                    <div id="owl-partners"  class="owl-carousel">
                        <div class="partner">
                            <img src="img/preview/logo1.png" class="img-responsive" alt="">
                        </div>
                        <div class="partner">
                            <img src="img/preview/logo2.png" class="img-responsive"  alt="">
                        </div>
                        <div class="partner">
                            <img src="img/preview/logo3.png" class="img-responsive"  alt="">
                        </div>
                        <div class="partner">
                            <img src="img/preview/logo4.png" class="img-responsive"  alt="">
                        </div>
                        <div class="partner">
                            <img src="img/preview/logo5.png" class="img-responsive"  alt="">
                        </div>
                        <div class="partner">
                            <img src="img/preview/logo6.png" class="img-responsive"  alt="">
                        </div>
                        <div class="partner">
                            <img src="img/preview/logo7.png" class="img-responsive"  alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="block">
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

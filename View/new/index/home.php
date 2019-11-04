     <?php
     $trh = date("Y-m-d", strtotime("-1 week"));
     $sld = $cls->slider();
$ayar = $cls->anasayfaayar(); 

$tema = $cls->tema(); 
if ($sld): ?> 
 
<!-- End header -->
        <section style='max-height: 400px'>
            <div class="revolution-container">
                <div class="revolution">
                    <ul class="list-unstyled">	<!-- SLIDE  -->
         
                                                
            <?php foreach ($sld as $value): ?>             
                        <li data-transition="fade" data-slotamount="7" data-masterspeed="1500"  >
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
<?php         endif; ?>
        <section>
            <div class="home-category color-scheme-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <article class="home-category-block">
                                <div class="home-category-title">
                           <?php $kg1 =  $cls->temakategori($tema->kategori1); ?>    <i class="<?php echo $kg1->ikon; ?> "></i> <a href=""><?php echo $kg1->kategori_adi; ?></a> 
                                </div>
                                <div class="home-category-option">
                                    <ul class="list-unstyled home-category-list">
                                        <?php $i = 0; foreach ($cls->katgustid($tema->kategori1) as $altkg){ 
                                            $i++; if($i < 9): ?>
                                            
                             <li><a href="<?php self::go('index/kategoriler/id/'.$altkg->id.'/name/'.$this->help("seourl")->seo($altkg->kategori_adi)); ?>"><i class="fa fa-check"></i><?php echo $altkg->kategori_adi; ?></a></li>          
                                     <?php endif;  } ?>
                                        
                                        
                               
                                    </ul>
                                    <img src="<?php echo $tema->altresim1; ?>" class="img-responsive" alt="">
                                </div>
                            </article>

                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <article class="home-category-block">
                                <div class="home-category-title">
                           <?php $kg1 =  $cls->temakategori($tema->kategori2); ?>    <i class="<?php echo $kg1->ikon; ?> "></i> <a href=""><?php echo $kg1->kategori_adi; ?></a> 
                                </div>
                                <div class="home-category-option">
                                    <ul class="list-unstyled home-category-list">
                                        <?php $i = 0;  foreach ($cls->katgustid($tema->kategori2) as $altkg){
                                            $i++; if($i < 9): ?>
                             <li><a href="<?php self::go('index/kategoriler/id/'.$altkg->id.'/name/'.$this->help("seourl")->seo($altkg->kategori_adi)); ?>"><i class="fa fa-check"></i><?php echo $altkg->kategori_adi; ?></a></li>          
                                     <?php endif;  } ?>
                                        
                                        
                               
                                    </ul>
                                    <img src="<?php echo $tema->altresim2; ?>" class="img-responsive" alt="">
                                </div>
                            </article>

                        </div>
                        
                           <div class="col-md-4 col-sm-6 col-xs-12">
                            <article class="home-category-block">
                                <div class="home-category-title">
                           <?php $kg1 =  $cls->temakategori($tema->kategori3); ?>    <i class="<?php echo $kg1->ikon; ?> "></i> <a href=""><?php echo $kg1->kategori_adi; ?></a> 
                                </div>
                                <div class="home-category-option">
                                    <ul class="list-unstyled home-category-list">
                                        <?php $i=0; foreach ($cls->katgustid($tema->kategori3) as $altkg){
                                            $i++; if($i < 9): ?>
                                            
                             <li><a href="<?php self::go('index/kategoriler/id/'.$altkg->id.'/name/'.$this->help("seourl")->seo($altkg->kategori_adi)); ?>"><i class="fa fa-check"></i><?php echo $altkg->kategori_adi; ?></a></li>          
                                     <?php endif;  } ?>
                                        
                                        
                               
                                    </ul>
                                    <img src="<?php echo $tema->altresim3; ?>" class="img-responsive" alt="">
                                </div>
                            </article>

                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </section>
<style>
    
.vfgt { /*max-width: 250px !important;*/}
    .block-chess-banners {
    background-image: url("<?php echo $tema->uaap; ?>");}
    
    #sale-section {
    background-image: url("<?php echo $tema->yurnlr; ?>");}
</style>
<?php  if($tema->urunaktif==1):  ?>
        <section>
            <div class="color-scheme-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <article class="banner">
                                <a href="<?php self::go('index/kategoriler/id/'.$tema->urunresim1_altktg.'/name/'.$this->help("seourl")->seo($cls->kategoriidtoname($tema->urunresim1_altktg))); ?>">
                                    <img src="<?php echo $tema->urunresim1; ?>" class="img-responsive" alt="">
                                </a> 
                            </article>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <article class="banner">
                                <a href="<?php self::go('index/kategoriler/id/'.$tema->urunresim2_altktg.'/name/'.$this->help("seourl")->seo($cls->kategoriidtoname($tema->urunresim2_altktg))); ?>">
                                    <img src="<?php echo $tema->urunresim2; ?>" class="img-responsive" alt="">
                                </a> 
                            </article>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <article class="banner">
                                <a href="<?php self::go('index/kategoriler/id/'.$tema->urunresim3_altktg.'/name/'.$this->help("seourl")->seo($cls->kategoriidtoname($tema->urunresim3_altktg))); ?>">
                                    <img src="<?php echo $tema->urunresim3; ?>" class="img-responsive" alt="">
                                </a> 
                            </article>
                        </div>
                    </div>
                </div>  
            </div>
        </section>
 <?php
 
 endif;
 $deger = $api::ipuansiralama(12);   if($deger):?>  

        <section>
            <div class="block color-scheme-2">
                <div class="container">
                    <div class="header-for-light">
                        <h1 class="wow fadeInRight animated" data-wow-duration="1s">POPULER <span>ÜRÜNLER</span></h1>
                        <div class="toolbar-for-light" id="nav-bestseller">
                            <a href="javascript:;" data-role="prev" class="prev"><i class="fa fa-angle-left"></i></a>
                            <a href="javascript:;" data-role="next" class="next"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div id="owl-bestseller"  class="owl-carousel">
   <?php   foreach ($deger AS $eg): $av = $api::ilanidtoilan($eg->ilanid);    ?>       
                          
                        
                        
                        
            
                        
                        <div class="text-center">
                            <article class="product light">
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
                                                <div class="product-rating">
  <div class="stars">
            <?php echo $this->help("uhyildiz")->yildiz($eg->puan); ?>
       </div>
   <a href="<?php SELF::go('ilan/detay/id/'.$av->id.'/'.$this->help("seourl")->seo($av->baslik)); ?>" class="review hidden-md">  <?php echo $eg->adet; ?> Yorum</a>
                                        </div>
                                 </div>

                            </article>
                        </div>
                
    <?php  endforeach; ?>                    

                    </div>
                </div>
            </div>
        </section>

<?php endif; ?>

<style>
    .banner {
           padding: 1px !important; 
    /*position: relative;*/
     margin: 2px 0 ! important;}
    .banner img {
        width: 98%;
    }
    </style>
 
     <section>
            <div class="block ">
                <div class="container">
                    <div class="row">
                       
                        <article class="col-md-4 col-xs-12 col-sm-12 banner">
                    
                              <a target="new_"href="<?php SELF::go('firsat/kategoriler/id/'.$tema->sol); ?>">  
 <img src="<?php echo $tema->solr; ?>" >
                         </a>     
                              
                        </article>
                            
                        <article class="col-md-8  col-xs-12 col-sm-12 ">
                      <article class="col-md-12  col-xs-12 col-sm-12">
                    
                          
                          <div class="col-md-4  col-xs-6 col-sm-6 banner">
                       <a target="new_"href="<?php SELF::go('firsat/kategoriler/id/'.$tema->s1); ?>">         
 <img src="<?php echo $tema->s1r; ?>" >
                       </a>
                          </div>
                          <div class="col-md-4  col-xs-6 col-sm-6 banner">
                          <a target="new_"href="<?php SELF::go('firsat/kategoriler/id/'.$tema->s2); ?>">      
                              <img src="<?php echo $tema->s2r; ?>" >
                          </a>   
                          </div> 
                               <div class="col-md-4  col-xs-6 col-sm-6 banner">
                                   <a target="new_"href="<?php SELF::go('firsat/kategoriler/id/'.$tema->s3); ?>">  
                              <img src="<?php echo $tema->s3r; ?>">
                                   </a>
                          </div>
                          <div class="col-md-4  col-xs-6 col-sm-6 banner">
                              <a target="new_"href="<?php SELF::go('firsat/kategoriler/id/'.$tema->sa1); ?>">  
                              <img src="<?php echo $tema->sa1r; ?>" >
                              </a> 
                          </div>
                          <div class="col-md-4  col-xs-6 col-sm-6 banner">
                             <a target="new_"href="<?php SELF::go('firsat/kategoriler/id/'.$tema->sa2); ?>">   
                               <img src="<?php echo $tema->sa2r; ?>" >
                             </a> 
                          </div>
                                <div class="col-md-4  col-xs-6 col-sm-6 banner">
                             <a target="new_"href="<?php SELF::go('firsat/kategoriler/id/'.$tema->sa3); ?>">   
                               <img src="<?php echo $tema->sa3r; ?>" >
                             </a> 
                          </div>
                        </article>
                            
                        </article>
                    
                    </div>

                </div>
            </div>
      </section >
 	
 <?php   $firsat = $api::firsatnew($ayar->firsat);
    if($firsat): ?>


<section>
<div class="block color-scheme-2">
                <div class="container">
                    
                 <div class="header-for-light">
                        <h1 class="wow fadeInRight animated" data-wow-duration="1s"><span><?php echo $lang->firsat;  ?></span></h1>
                        <div class="toolbar-for-light" id="nav-child">
                            <a href="javascript:;" data-role="prev" class="prev"><i class="fa fa-angle-left"></i></a>
                            <a href="javascript:;" data-role="next" class="next"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>            
                    
                    
                            <div id="owl-child"  class="owl-carousel">
                                 <?php 
  
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
     <?php endforeach;  ?>                                 
                            </div></div></div>
</section>
<?php  endif; ?> 
  
        <section id="sale-section">
            <div class="block color-scheme-white-90">
                <div class="container">
                    <div class="header-for-light  hidden-xs hidden-sm">
                        <h1 class="wow fadeInRight animated" data-wow-duration="1s">YENİ <span>ÜRÜNLER </span></h1>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="title-block light wow fadeInLeft">

                                <h2>Yeni Eklenen Ürünler</h2>
                                <h1></h1>
                                <p> </p>
                                <div class="text-center">
                                    <div class="toolbar-for-light" id="nav-summer-sale">
                                        <a href="javascript:;" data-role="prev" class="prev"><i class="fa fa-angle-left"></i></a>
                                        <a href="javascript:;" data-role="next" class="next"><i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div id="owl-summer-sale"  class="owl-carousel">
                        
                                   <?php   $deger = $api::anasayfayeni();  

                         if($deger):
                              foreach ($deger AS $yeni): ?>    
                                
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
        </section>
<style>/*.owl-carousel{display: block;}*/</style>



<?php $ayar = $cls->anasayfaayar();
$vitrin = $api::anasayfavitrininew(0,$ayar->vitrin);       
      if($vitrin): ?>

<section>
<div class="block color-scheme-2">
                <div class="container">
                    
                 <div class="header-for-light">
                        <h1 class="wow fadeInRight animated" data-wow-duration="1s"><span><?php echo $lang->onecikan;  ?></span></h1>
                  <div class="toolbar-for-light" id="nav-tabs">
                            <a href="javascript:;" data-role="prev" class="prev"><i class="fa fa-angle-left"></i></a>
                            <a href="javascript:;" data-role="next" class="next"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>            
                    
                    
                            <div id="owl-featured"  class="owl-carousel owl-theme">
                                 <?php 
  
    foreach ($vitrin as $av): ?>
                             
                                
                                
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
                        
     <?php endforeach;  ?>                                 
                            </div></div></div>
</section>
 <?php   endif; ?>  



<?php 
$vitrinx = $api::anasayfavitrininewilan(0,$ayar->vitrin);       
      if($vitrinx): ?>

       <div class="header-with-icon">
                                <i class="fa fa-tags"></i> <?php echo $lang->anasayfavitrin; ?>
                                <div class="toolbar-for-light" id="nav-summer-sale">
                                    <a href="javascript:;" data-role="prev" class="prev"><i class="fa fa-angle-left"></i></a>
                                    <a href="javascript:;" data-role="next" class="next"><i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                            <div id="owl-summer-sale"  class="owl-carousel">
                                
                             
      <?php   foreach ($vitrinx as $av): ?>  
    
      
                                
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
                        
        
                                    
 <?php  endforeach;?>                        
                            </div>

 <?php   endif; ?>  



    <?php 
   $firsat = $api::sonyilanlar(2);
  
    if($firsat): ?>  
<?php $help = $this->help("header");  if(!$help->isMobileDevice()): ?>  

        <section class="block-chess-banners">
            <div class="block">
                <div class="container">
                    <div class="header-for-dark">
                        <h1 class="wow fadeInRight animated" data-wow-duration="2s">SİZİN <span>İÇİN</span></h1>
                    </div>
                    
    <?php 
    foreach ($firsat as $frst): ?>                
                    
                    <div class="row">
                        <div class="col-md-9">
                            <article class="block-chess wow fadeInLeft" data-wow-duration="2s">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="<?php SELF::go('ilan/detay/id/'.$frst->id.'/'.$this->help("seourl")->seo($frst->baslik)); ?>">
                                            <img class="img-responsive vfgt" src="<?php echo $api::thumbresim($frst->id); ?>" alt=""></a>

                                    </div>
                                    <div class="col-md-8">
                                        <div class="chess-caption-right">
                                            <a href="<?php SELF::go('ilan/detay/id/'.$frst->id.'/'.$this->help("seourl")->seo($frst->baslik)); ?>" class="col-name"><?php echo $frst->baslik; ?></a>
                                          
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-3"> 
                            
 <?php if($api::thumbresim2($frst->id)): $resim = $api::thumbresim2($frst->id); 
 else: $resim = $api::thumbresim($frst->id);  endif; ?>
                            
                            <article class="block-chess wow fadeInRight" data-wow-duration="2s">
                                <a href="<?php SELF::go('ilan/detay/id/'.$frst->id.'/'.$this->help("seourl")->seo($frst->baslik)); ?>">
                                    <img class="img-responsive vfgt" src="<?php echo $resim; ?>" alt=""></a>
                            </article>
                        </div>
                    </div> 
          <?php   endforeach; ?>    
               
                
                
                </div>
            </div>
        </section>
<?php endif; ?>
<?php endif; ?>
        <section>
            <div class="block">
          
                    <div class="row">
                                       <?php 
 
$x = $this->help("reklam")->anasayfaalt();

    if($x): $reklambaslik = $x->baslik; ?>
                        <article class="col-md-12">

         
      <?php   $kod = $x->kod; ?>
   <style>.banner img {display: block; max-width: 100%; height: auto; }</style>
                               
    
      <div class="banner">
                                        

    <?php echo html_entity_decode($kod) ; ?>
           </div>
                    
                        </article>
                            
                            <?php endif; ?>	
                    </div>
               
            </div>
        </section>

   
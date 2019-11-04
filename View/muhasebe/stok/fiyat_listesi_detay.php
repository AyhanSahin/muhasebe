<?php $fiyat = $cls->fiyatlistesi($id); ?>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
           <?php INCLUDE TEMA.'/muhasebe/sidebar.php'; ?>
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                             <div class="portlet-title">
                                                <div class="caption">
                                                     
                                                    <span class="caption-subject font-green-haze bold uppercase">Stok -> </span>
                                                    <span class="caption-helper"><a href="<?php SELF::go('stok/fiyat_listesi'); ?>">Fiyat Listesi</a></span>
                                                </div>
                                 <?php if(isset($mesaj)): ?>
                                 <div  class="custom-alerts alert alert-success fade in">
                                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                     <?php echo $mesaj; ?>
                                 </div>
                                 <?php endif; ?>
                                    </div>
                    </div>
                                                 
    <div class="row">

    <div class="col-md-12">
        
        <div class="portlet light bordered">
            <div class="portlet-title">

                <div class="caption">
                    <i class="fa fa-money font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase"><?php echo $fiyat->ad; ?></span>
                </div>
        
       
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn green-haze btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> İşlemler
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="<?php SELF::go('stok/fl_kopya/id/'.$id); ?>"><i class="fa fa-copy"></i> Kopyasını Oluştur </a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="<?php self::go('stok/fl_guncelle/id/'.$id);?>"><i class="fa fa-circle-o-notch"></i> Güncelle </a>
                            </li>
                            <li>
                                <a href="javascript:sil('<?php echo $id; ?>');"><i class="fa fa-trash-o"></i> Sil </a>
                            </li>
                          
                        </ul>
                    </div>
                </div>

                    
                   
        
        
  
                
         
        
        <div style="padding-top: 50px">
               
            
                    </div>
                <div class="col_md-12">
                    
                    <label class="col-md-4">OLUŞTURMA TARİHİ</label>
                    <label class="col-md-8"> : <?php  echo $fiyat->olusturma_tarihi;    ?></label>
                    
                </div>               
            
                <div class="col_md-12">
                    
                    <label class="col-md-4">İNDİRİM UYGULANAN ÜRÜNLER</label>
                    <label class="col-md-8"> : <?php
                    if($fiyat->indirim_uygulama_turu == "S") {echo "Seçilmiş Ürünler";}
                    else if($fiyat->indirim_uygulama_turu == "T"){ echo "Tüm Ürünler"; }
                    else if($fiyat->indirim_uygulama_turu == "K"){ echo "<smal style='color:red'> ".$cls->kategoriad($fiyat->ktg_id)." </smal> Kategorisi"; }
                    ?></label>
                    
                </div>        
                
                
                
                <div class="col_md-12">
                    
                    <label class="col-md-4"> TOPLU İNDİRİM</label>
                    <label class="col-md-8"> : <?php if($fiyat->toplu_indirimmi == 1) { echo $fiyat->toplu_indirim; } else {echo " -- ";}  ?></label>
                    
                </div>                    
               
                
                <div class="col_md-12">
                    
                    <label class="col-md-4"> KULLANAN MÜŞTERİ SAYISI</label>
                    <label class="col-md-8"> : <?php  echo $cls->flkullananmusetri($fiyat->id); ?></label>
                    
                </div>                    
         
        
        
                <p></p>
        
        
       
            <ul class="nav nav-pills">
                <li class="active">
                    <a href="#tab_2_1" data-toggle="tab"> Ürünler </a>
                </li>
                <li>
                    <a href="#tab_2_2" data-toggle="tab"> Kullanan Müşteriler </a>
                </li>
                 
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="tab_2_1">
                    
                    
                <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cubes"></i> Seçili Ürünler </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                        
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> ÜRÜN </th>
                                                    <th> VERGİLER HARİÇ SATIŞ FİYATI </th>
                                                    <th> İNDİRİM </th>
                                                    <th> YENİ FİYAT </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($cls->seciliurunler($fiyat->id)): $i=1; foreach($cls->seciliurunler($fiyat->id) as $urunler): ?>
                                                
                                                <tr>
                                                    <td> <?php echo $i++; ?> </td>
                                                    <td> <?php echo $urunler->ad; ?> </td>
                                                    <td> <?php echo $urunler->v_h_s_f .$urunler->v_h_s_f_kur; ?> </td>
                                                    <td> % <?php if($fiyat->toplu_indirimmi == 1){echo $fiyat->toplu_indirim;}else {echo $urunler->indirim;} ?> </td>
                                                    <td>
                                                         
                                                            <?php if($urunler->indirim){
                                                            echo (float)$urunler->v_h_s_f - (((float)$urunler->v_h_s_f / 100 ) * $urunler->indirim) ; echo " ".$urunler->v_h_s_f_kur; 
                                                            } 
                                                            else if($fiyat->toplu_indirimmi == 1){
                                                                echo (float)$urunler->v_h_s_f - (((float)$urunler->v_h_s_f / 100 ) * $fiyat->toplu_indirim) ; echo " ".$urunler->v_h_s_f_kur; 
                                                            }
                                                            
                                                            ?>
                                                         
                                                    </td>
                                                </tr>
                                                <?php endforeach; 
                                                        endif;
                                                ?>
                                       
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>    
                    
                    
                    
                </div>
                <div class="tab-pane fade" id="tab_2_2">
                    
                   
                    
                            
                <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-users"></i> Kullanan Müşteriler </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                        
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> Kısa Ad </th>
                                                    <th> Ünvan </th>
                                                    <th> Telefon </th>
                                                    <th> E Posta </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             <?php   
                                                if($cls->flkullananmusetriler($fiyat->id)):
                                                    $i=1;
                                                foreach($cls->flkullananmusetriler($fiyat->id) as $musteriler): ?>
                                                
                                                <tr>
                                                    <td> <?php echo $i++; ?> </td>
                                                    <td> <?php echo $musteriler->kisa_ad; ?> </td>
                                                    <td> <?php echo $musteriler->unvan; ?> </td>
                                                    <td> % <?php echo $musteriler->telefon; ?> </td>
                                                    <td> <?php echo $musteriler->eposta ; ?> </td>
                                                </tr>
                                                <?php endforeach;
                                                                endif;?>
                                       
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>    
                    
                    
                </div>
             
             
            </div>
        </div>
  
    </div> 
           </div>  

           

       </div>       
    
    </div>
                    </div>
                </div>
        <script>
            function sil(id){
                    
                    var x = confirm("Silmek istiyormusunuz ? ");
                    if(x==true){
                        
                        $.post( "<?php echo SITE ; ?>/ajaxislemler/flsil", { id: id })
                        .done(function( data ) {
                            if(data==id){

                            location.replace("<?php SELF::go('stok/fiyat_listesi'); ?>");
                            
                            } else {
                                alert("Silme işleminde sorun oluştu");
                            }
                    });          
                        // silme işlemini yap
                    }
                    else {
                        alert("Silme işleminden vazgeçtiniz");
                    }
                    
                }
                
                
       
        </script>
          
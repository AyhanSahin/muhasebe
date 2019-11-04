
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
                                                    
                                                    <span class="caption-subject font-green-haze bold uppercase">STOK</span>
                                                    <span class="caption-helper">Fiyat Listesi</span>
                                                </div>
                                 <?php if($mesaj): ?>
                                 <div  class="custom-alerts alert alert-success fade in">
                                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                     <?php echo $mesaj; ?>
                                 </div>
                                 <?php endif; ?>
                                    </div>
                    </div>
                                                 
<div class="row">

<div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">Fiyat Listesi</span>
                                    </div>
                            
                                    
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                    <button id="sample_editable_1_new" onclick="ekle();" class="btn sbold green"> Yeni Ekle
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="btn-group pull-right">
                                                    <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:yazdir();">
                                                                <i class="fa fa-print"></i> Print </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                                        <div class="row">
                                         
                                            <div class="col-md-6 col-sm-6">
                                                <div id="sample_1_filter" class="dataTables_filter">
                                                    <label>Search:<input type="search" class="form-control input-sm input-small input-inline" placeholder="" aria-controls="sample_1">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-scrollable">
                                            <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                                        <thead>
                                            <tr role="row">
                                                <th class=""> SIRA NO </th>
                                                <th class=""> LİSTE ADI </th>
                                                <th class=""> KAYITLI ÜRÜNLER </th>
                                                <th class="" > OLUŞTURMA TARİHİ </th>
                                                <th class=""> KULLANAN MÜŞTERİ SAYISI </th>
                                                <th class="" > İŞLEMLER
  
        </th>
                                            </tr>
                                        </thead>
                                        <tbody id="sayfa">
                                            
                        <?php
                                $veri = $cls->fl();
                                
                                $i = 0; foreach($veri->veri as $fiyat): $i++;
                        ?>         
    <tr class="gradeX odd sil_<?php echo $fiyat->id; ?>" role="row">
            <td>
                <label>
                   
                    <span><?php echo $i; ?></span>
                </label>
            </td>
            <td class="sorting_1"> <a href="<?php SELF::go('stok/fiyat_listesi_detay/id/'.$fiyat->id) ?>"><?php echo $fiyat->ad; ?> </a></td>
            <td>
                <small> 
                <?php if($fiyat->indirim_uygulama_turu == "S"){ ?>
                 
                <?php   echo "Seçilmiş ürünler " .$cls->seciliurunleradet($fiyat->id);   } 
               else if($fiyat->indirim_uygulama_turu == "K"){ 
                   echo $cls->kategoriad($fiyat->ktg_id)." kategorisine Ait Ürünler" ; } 
               else  {  
                 echo "Tüm Ürünler";  
                 } ?>
                    
               </small>       
                    
            </td>
            <td>
               <span>  <?php echo $fiyat->olusturma_tarihi; ?>  </span>
            </td>
            <td class="center"> <?php echo $cls->flkullananmusetri($fiyat->id); ?> </td>
            <td>
                <div class="btn-group">
                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> İşlem
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="<?php SELF::go('stok/fl_guncelle/id/'.$fiyat->id); ?>">
                                <i class="icon-docs"></i> Güncelle </a>
                        </li>
                       
                        <li>
                            <a href="javascript:sil('<?php echo $fiyat->id;?>')">
                                <i class="icon-ban"></i> Sil </a>
                        </li>
                       
                        <li>
                            <a href="<?php SELF::go('stok/fl_kopya/id/'.$fiyat->id); ?>">
                                <i class="icon-docs"></i> Kopya Oluştur </a>
                        </li>
               
                    </ul>
                </div>
            </td>
        </tr>
                                            
                                            
    <?php endforeach; ?>                                        
                                            
   
                                            
                                            
                                            
                                            </tbody>
                                    </table>
                                        </div>
                                        
 
                                        
                        <div class="row">
                         
                            <div class="col-md-12 col-sm-12">
             <!--
             // sayfalamada kullanılacak js ve css yuklmesi
             
             -->                   
    <link rel="stylesheet" href="<?php echo SKIN ; ?>assets/pagination/css/style.css">    
<script src="<?php echo SKIN ; ?>assets/pagination/js/index.js"></script>                              
                            <div class="block-pagination" style="text-align: center">
                           
                                                 <div class="clear"></div>

                    <?php if($veri->toplam >= 1): ?>
                          <ul class="pagination">
                     <div class="pagination content_detail__pagination cdp" actpage="1">
                                            <a href="#!-1"  onclick="sirala('e');" class="cdp_i">prev</a>
                                            <?php for($i=1;$i<=$veri->sayfa;$i++){ ?>

                                            <a href="#!<?php echo $i ; ?>" onclick="sirala(<?php echo $i ; ?>);" class="cdp_i"><?php echo $i ; ?></a>

                    <?php } ?>  

                     <a href="#!+1" onclick="sirala('a');" class="cdp_i">next</a>                       




                                    </div>


                       </ul>
                    <?php endif; ?>
                              
                            </div>  
                            
                            </div>
                        </div>
                                    </div>
                </div>
                                
                            </div>
                            
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                     
                </div>
            </div>
            
                
                <script>
                    
                    var uid = "";
                    function arsivid(id){
                        uid = id;
                      
                    }
                    function ekle(){
                        location.replace('<?php SELF::go('stok/flekle'); ?>');
                    }
                    var suankisayfa = 1;
                    function sirala(d){
                        
                        if(d=="a"){
                         suankisayfa += 1;    
                        }
                        if(d=="e"){
                         suankisayfa -= 1;
                        }
                        else {suankisayfa = d;}
                        
                 $.post( "<?php echo SITE ; ?>/ajaxislemler/flsayfalama", { sayfa: suankisayfa })
                    .done(function( data ) {

                      $("#sayfa").html(data);

                    });        
                        
                        
                    }
                function yazdir(){
                    var element = $("#sayfa").html();
                    window.print();
                  
                }
                
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
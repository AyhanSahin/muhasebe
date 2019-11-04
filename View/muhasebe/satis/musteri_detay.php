<?php $musteri = $cls->musteri($id); ?>
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
                                                    <i class="icon-diamond font-green-haze"></i>
                                                    <span class="caption-subject font-green-haze bold uppercase">SATIŞLAR</span>
                                                    / <a href="<?php SELF::go("musteri/musteri_listesi");?>"><span class="caption-helper">MÜŞTERİ LİSTESİ</span></a> / <span class="caption-helper">MÜŞTERİ DETAY</span>
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
        
        <div class="portlet light bordered">
                                <div class="portlet-title">
                                     
                                    <div class="caption">
                                        <i class="fa fa-cubes font-green-sharp"></i>
                                        <span class="caption-subject font-green-sharp bold uppercase"><?php echo $musteri->unvan; ?></span>
                                  
                                    </div>
                                    
                                    <div>
                                        
                                          <link href="<?php echo SKIN ; ?>assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo SKIN ; ?>assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css" rel="stylesheet" type="text/css" />                                           
 

        
   
        
            <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo SKIN ; ?>assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js" type="text/javascript"></script>
        <script src="<?php echo SKIN ; ?>assets/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
        <script src="<?php echo SKIN ; ?>assets/global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
              <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo SKIN ; ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <!-- END PAGE LEVEL SCRIPTS -->
        <script>
            function kategorisiz(){
                  $('#sd').val("Kategorisiz");
                $(".mt-clipboard").html("Kategorisiz");
                urunkategoriupdate();
            }
            var kategoriler = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: {
              url: '<?php SELF::go("ajaxislemler/urunkategoriler/".time().".json"); ?>',
              filter: function(list) {
                return $.map(list, function(deger) {
                  return { name: deger }; });
              }
            }



          });
          kategoriler.initialize();

          $('#sd').tagsinput({
          maxTags: 1,
            typeaheadjs: {
              name: 'kategori',
              displayKey: 'name',
              valueKey: 'name',
              source: kategoriler.ttAdapter()
            }
          });
          
         $('.tt-input').on('keypress', function(e){
              if (e.keyCode == 13){
                var kt_ad = $('.tt-input').val();

            $.post( "<?php echo SITE ; ?>/ajaxislemler/urunkategoriekletyp", { name: kt_ad })
             .done(function( data ) {
                 if(data >= 1) {
                    $("#belirt").html( "Yeni Kategori : "+ kt_ad); 
                     
                 };
                 
                $('#sd').val(kt_ad);
                $(".mt-clipboard").html(kt_ad);
                urunkategoriupdate();

             });


              };
            });     
            
            $('.bootstrap-tagsinput').on('typeahead:selected', function(evt, item) {
          
           // $(".bootstrap-tagsinput").tagsinput('remove');
           $(".mt-clipboard").html(item.name);
             $('#sd').val(item.name);
                // do what you want with the item here
                urunkategoriupdate();
            });
             function urunkategoriupdate(){
                var deg =  $('#sd').val();
                var urunid = '<?php echo $musteri->id; ?>';

                     $.post( "<?php echo SITE ; ?>/ajaxislemler/urunkategoriupdate", { urun: urunid ,kategori : deg})
                         .done(function( data ) {
                            $('#small').modal('hide'); 

                         });   


             }           

                                       </script>
                                    </div>
                                       <div class="actions">
                                           <div class="btn-group">
                                               
                                               <button class="btn red">Tahsilat ekle</button>
                                           </div>
                                       </div>
                                    
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn green-haze btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> İşlemler
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="<?php SELF::go('stok/hizmet_urun_kopya/id/'.$id); ?>"><i class="fa fa-copy"></i> Kopyasını Oluştur </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="<?php self::go('stok/hizmet_urun_guncelle/id/'.$id);?>"><i class="fa fa-circle-o-notch"></i> Güncelle </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:sil('<?php echo $id; ?>');"><i class="fa fa-trash-o"></i> Sil </a>
                                                </li>
                                                <li>
                                                    <a data-toggle="modal" href="#basic"> <i class="fa fa-archive"></i> Arşivle </a>
                                                    
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                     
                                    </div> 
        
            
            
            
            
           <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Bu hizmet/ürün kaydını arşivlemek istediğinize emin misiniz?</h4>
                                                </div>
                                                <div class="modal-body"> 
                                                    <p>   Arşivleme işleminin sonucunda:</p>
                                                    <ul><li> Kayıt artık Hizmet ve Ürünler listelerinde görünmeyecek.
           </li><li> Bu hizmet/ürün kaydını içeren faturalar etkilenmeyecek
          </li><li>  Eğer bu hizmet/ürün kaydı bir tekrarlama şablonunda kullanılıyorsa,
             şablon fatura haline geldiğinde hizmet/ürün kaydı arşivden çıkarılacak. 
</li></ul>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">VAZGEÇ</button>
                                                    <button onclick="arsiveal('<?php echo $id; ?>')" type="button" class="btn green">ARŞİVLE</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div> 
            
            
            
                <div class="portlet-title portlet light bordered">
                    <div class="kb col-md-12">
                        <div class="col-md-4"><i class="fa fa-envelope-o"></i> : <?php echo $musteri->eposta; ?></div>
                        <div class="col-md-4"><i class="fa fa-phone"></i> : <?php echo $musteri->telefon ; ?></div>
                        <div class="col-md-4"> <button onclick="tb()" type="button" class="btn green">Tüm Bilgileri Görüntüle</button></div>
                              
             </div> 
                    
<div class="tb col-md-12" style="display: none"> 
                        
                                                   
           <div class="control-label col-md-3 font-green-sharp">FİRMA UNVANI</div>
           <div class="col-md-3"> 
               <?php echo $musteri->unvan; ?>

           </div>
           
    
           <div class="control-label col-md-3 font-green-sharp">KISA İSİM</div>
           <div class="col-md-3"> 
               <?php echo $musteri->kisa_ad; ?>
           </div>
           
           
     <div class="col-md-12"></div>
     
     
           <div class="control-label col-md-3 font-green-sharp">E-POSTA ADRESİ</div>
           <div class="col-md-3">
               
               <?php echo $musteri->eposta; ?>
           </div>
      
         
           
           <div class="control-label col-md-3 font-green-sharp">TELEFON NUMARASI</div>
           <div class="col-md-3">
               <?php echo $musteri->telefon; ?>
            </div>
           
<div class="col-md-12"></div>   

           <div class="control-label col-md-3 font-green-sharp">FAKS NUMARASI</div>
           <div class="col-md-3"> 
               <?php echo $musteri->fax; ?>
            </div>
      
     <div class="col-md-12">   
           <div class="control-label col-md-3 font-green-sharp">AÇIK ADRESİ</div>
           <div class="col-md-9"> 
               <?php echo $musteri->adres; ?>
           </div>
     
     </div> 
  
           <div class="col-md-12"></div> 
        
           
           <div class="control-label col-md-12 font-green-sharp">VERGİ BİLGİLERİ</div>

            
           <div class="control-label col-md-3 font-green-sharp">V.D.</div>
           <div class="col-md-3"> 
               <?php echo $musteri->vergi_dairesi; ?>

           </div>
     
           <div class="control-label col-md-3 font-green-sharp">V.NO</div>
           
            
           
           
           <div class="col-md-3 font-green-sharp"> 
               <?php echo $musteri->vkn_tckn; ?>
           </div>
    <div class="col-md-12"></div> 
           
  <div class="col-md-12">       
           
           <div class="col-md-4 font-green-sharp">IBAN NUMARALARI</div>
           <div class="col-md-8">
               <?php echo $musteri->iban_1; ?>

           </div>
           
       </div>      
           <div class="col-md-12">
               
                <div class="col-md-3"> 
               <?php echo $musteri->iban_2; ?>

           </div>    
              <div class="col-md-3"> 
               <?php echo $musteri->iban_3; ?>

           </div>
               
              <div class="col-md-3"> 
               <?php echo $musteri->iban_4; ?>

           </div>       
        
              <div class="col-md-3"> 
               <?php echo $musteri->iban_5; ?>

           </div>       
               
               
                <div class="col-md-3"> 
               <?php echo $musteri->iban_6; ?>

           </div>             
               
           </div>   
           <div class="col-md-3 font-green-sharp">DÖVİZ KURU</div>
           <div class="col-md-3">
               <?php if($musteri->doviz_a_s=="a") echo "Alış"; else echo "Satış"; ?>

           </div>
      
           
<div class="col-md-12"></div>           
           
           <label class="control-label col-md-3 font-green-sharp">FİYAT LİSTESİ</label>
           
               <?php if($musteri->fl_id >= 1){
                   
                 echo $cls->fiyatlistesi($musteri->fl_id)->ad;
               } else echo "Seçili Fiyat Listesi Yok";?>

            
           <div class="col-md-12" style="text-align:center; background-color: #c0c9d2;"><?php $yetkililer = $cls->yetkililer($musteri->id);  if($musteri->yetkili_adet >= 1 && $yetkililer){ echo "YETKİLİ LİSTESİ"; }?> </div> 
           <div class="col-md-12">
               
              <?php 
              
              if($musteri->yetkili_adet >= 1 && $yetkililer){
                   
                 
               
               
               foreach($yetkililer as $yetkili):
               ?> 
               <div class="col-md-12">
               <div class="col-md-4 font-green-sharp">Ad : </div>  <div class="col-md-8"><?php echo $yetkili->ad; ?></div>
               </div>
               
               <div class="col-md-12">
               <div class="col-md-4 font-green-sharp">E Posta : </div>  <div class="col-md-8"><?php echo $yetkili->eposta; ?></div>
               </div>
               
               <div class="col-md-12">
               <div class="col-md-4 font-green-sharp">Telefon : </div>  <div class="col-md-8"><?php echo $yetkili->telefon; ?></div>
               </div>

               <div class="col-md-12">
               <div class="col-md-4 font-green-sharp">Not : </div>  <div class="col-md-8"><?php echo $yetkili->notu; ?></div>
               </div>

                   
                   <?php endforeach;
              }?>
           </div>            
           
           
           
           
           
           
           
                               
          <div class="col-md-12"> <button onclick="kb()" type="button" class="btn green">Tüm Bilgileri Gizle</button></div>                     
</div>
                        
    
                    </div>
                                        
                    </div>
                </div>                        
                                        
                                           
            
            
                                </div>
                                <div class="portlet-body">
                                    <ul class="nav nav-pills">
                                        <li class="active">
                                            <a href="#tab_2_1" data-toggle="tab"> Stok Geçmişi </a>
                                        </li>
                                        <li>
                                            <a href="#tab_2_2" data-toggle="tab"> Satışlar </a>
                                        </li>
                                       <li>
                                            <a href="#tab_2_3" data-toggle="tab"> Alışlar </a>
                                        </li>    
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="tab_2_1">
                                            <p> tab_2_1 </p>
                                        </div>
                                        <div class="tab-pane fade" id="tab_2_2">
                                            <p>   tab_2_2 </p>
                                        </div>
                                        <div class="tab-pane fade" id="tab_2_3">
                                            <p> tab_2_3 </p>
                                        </div>
                                        <div class="tab-pane fade" id="tab_2_4">
                                            <p>  tab_2_4 </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
    </div>
    </div>
          </div>            </div>
               
        
        <script>
             function kb(){
                 
                $('.tb').hide();
                $('.kb').show();
                
            }           
            function tb(){
                 
                $('.tb').show();
                $('.kb').hide();
                
            }
            function sil(id){
                    
                    var x = confirm("Silmek istiyormusunuz ? ");
                    if(x==true){
                        
                        $.post( "<?php echo SITE ; ?>/ajaxislemler/hizmeturunsil", { id: id })
                        .done(function( data ) {
                            if(data==id){

                            location.replace("<?php SELF::go('stok/hizmet_urun'); ?>");
                            
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
                
                
         function arsiveal(id){
         $('#basic').modal('toggle'); 
    $.post( "<?php echo SITE ; ?>/ajaxislemler/hizmeturunarsiv", { id: id })
                        .done(function( data ) {
                            if(data==id){

                             location.replace("<?php SELF::go('stok/hizmet_urun'); ?>");
                            
                            } else {
                                alert("işleminde sorun oluştu");
                            }
                            });
         
         }       
        </script>
            </div>
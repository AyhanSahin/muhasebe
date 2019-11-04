
        <!-- END PAGE LEVEL PLUGINS -->
<link href="<?php echo SKIN ; ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css">
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
                                                   
                                                    <span class="caption-subject font-green-haze bold uppercase"><a href="<?php SELF::go('stok/hizmet_urun'); ?>">Hizvet && Ürün -> </a></span>
                                                    <span>Hizvet Ürün Ekle</span>
                                                </div>
                                                 
<div class="row">

<div class="portlet light bg-inverse form-fit">
                                   
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form action="<?php SELF::go("stok_kayit/hizmet_urun");?>" class="form-horizontal form-row-seperated" method="post" enctype="multipart/form-data">
            <div class="form-body">
                <div class="form-group">
                    <label class="control-label col-md-3">ADI</label>
                    <div class="col-md-9">
                        <input type="text" placeholder="" name="ad" class="form-control">

                    </div>
                </div>

                   <div class="form-group">
                    <label class="control-label col-md-3">ÜRÜN / STOK KODU</label>
                    <div class="col-md-9">
                        <input type="text" placeholder="" name="sk" class="form-control">

                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">BARKOD NUMARASI</label>
                    <div class="col-md-9">
                        <input type="text" placeholder="" name="bk" class="form-control">

                    </div>
                </div>

    <div class="form-group ">
        <label class="control-label col-md-3">ÜRÜN FOTOĞRAFI</label>
        <div class="col-md-9">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; line-height: 150px;"></div>
                <div>
                    <span class="btn red btn-outline btn-file">
                        <span class="fileinput-new"> Resim Seç </span>
                        <span class="fileinput-exists"> Değiştir </span>
                        <input type="hidden" value="" name="..."><input type="file" name="urun_resmi"> </span>
                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Geri Al </a>
                </div>
            </div>

        </div>
    </div>

        <div class="form-group">
            <label class="control-label col-md-3">KATEGORİ</label>
            <div class="col-md-3">
                <select class="form-control" id="frmktgr" name="urun_kategori_id">
                    <option value="0">Kategorisiz</option>
                    <?php foreach ($cls->urunkategori() as $value) { ?>
                    <option value="<?php echo $value->id; ?>"><?php echo $value->isim; ?></option>
                    <?php } ?>
                </select>
           <a class="btn red btn-outline sbold" data-toggle="modal" href="#modalfk"> YENİ EKLE</a>
            </div>
            <div class="col-md-6"></div>
        </div>
                
                
<div class="modal fade" id="modalfk" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Ürün Kategori Ekleme</h4>
            </div>
            <div class="modal-body"> 
                 <div class="form-group">
                        <label class="control-label col-md-3">Kategori İsmi</label>
                        <div class="col-md-9">
                            <input type="text" id="ktgyeni" placeholder="" class="form-control">

                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Kapat</button>
                <button type="button" onclick="katedoriekle();" class="btn green">Kaydet</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
                
 
<div class="form-group">
    <label class="control-label col-md-3">ALIŞ / SATIŞ BİRİMİ</label>
    <div class="col-md-6">
        <input type="text" name="alis_satis_birimi" >
        <span class="help-block">  <i class="fa fa-info-circle"></i>
              Birim değişikliği geriye dönük olarak faturalara yansır.</span>
    </div>
    <div class="col-md-3">
    </div>
</div>

<div class="form-group">
        <label class="control-label col-md-3">Stok Takibi</label>
        <div class="col-md-9">
           <span class="text"> Yapılsın. </span> <input type="radio" name="takip" value="yes" class="icheck" checked></input>
            <span class="text-left"> Yapılmasın. </span><input type="radio" name="takip"  value="no" class="icheck" ></input>
           <span class="help-block"> <i class="fa fa-info-circle"></i> Bakiye hesaplanırken kullanılır. </span> 
        </div>
    </div> 
                
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>
<script src="<?php echo SKIN ; ?>assets/muhasebe/js/hizmeturun.js" type="text/javascript"></script>  
                                                        
                                                        
        <div class="form-group" id="kssi">
            <div class="col-md-12">
          <label class="control-label col-md-3">BAŞLANGIÇ STOK MİKTARI</label>
          <div class="col-md-6">
              <input type="number" name="stok_miktar" placeholder="" class="form-control">

          </div>
        <div class="col-md-3">
       </div>
          </div>
            <div class="col-md-12">
          <label class="control-label col-md-3">KRİTİK STOK UYARISI</label>
          <div class="col-md-1">
              <input type="checkbox" name="stok_uyarisi" class="form-control md-check" checked>
                  <span class="help-block"> Etkinleştir <span>  
          </div>


          <div class="col-md-3">
              <p>
              <input type="text" name="stok_seviyesi" placeholder="KRİTİK STOK SEVİYESİ" class="form-control">
              </p>
          </div>
           <div class="col-md-5">
       </div>
      </div> 
</div> 
                                                        
            <div class="form-group">
                    <label class="control-label col-md-3">VERGİLER HARİÇ ALIŞ FİYATI</label>
                    <div class="col-md-9">                                            
                        <div class="input-group input-large">
                            <input type="text" name="alisfiyati" value="0,00" class="form-control money" placeholder="">
                                <input type="hidden" id="alisfiyatkur" name="alisfiyatkur" value="TL" >
                            <div class="input-group-btn">
                                <button type="button" class="btn green" tabindex="-1" id="aliskurbtn"><i class="fa fa-try"></i></button>
                                <button type="button" class="btn green dropdown-toggle" data-toggle="dropdown" tabindex="-1" aria-expanded="false">
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                
                                
                        <ul class="dropdown-menu" role="menu">
                         <li>
                           <a href="javascript:pb('TL')">
                             <i class="fa fa-try"></i>
                           </a>
                         </li>
                         <li>
                           <a href="javascript:pb('USD')">
                             <i class="fa fa-usd"></i>
                           </a>
                         </li>
                         <li>
                           <a href="javascript:pb('EUR')">
                             <i class="fa fa-eur"></i>
                           </a>
                         </li>
                         <li>
                           <a href="javascript:pb('GBP')">
                             <i class="fa fa-gbp"></i>
                           </a>
                         </li>
                     </ul>
                              
                            </div>
                        </div>
                       </div>
                   </div>

                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
            <div class="form-group">
                    <label class="control-label col-md-3">VERGİLER HARİÇ SATIŞ FİYATI</label>
                    <div class="col-md-9">                                            
                        <div class="input-group input-large">
                            <input type="text" name="satisfiyati"  value="0,00"  class="form-control money" placeholder="">
                                <input type="hidden" id="satisfiyatkur" name="satisfiyatkur" value="TL" >
                            <div class="input-group-btn">
                                <button type="button" class="btn green" tabindex="-1" id="satiskurbtn"><i class="fa fa-try"></i></button>
                                <button type="button" class="btn green dropdown-toggle" data-toggle="dropdown" tabindex="-1" aria-expanded="false">
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                
                                
                        <ul class="dropdown-menu" role="menu">
                         <li>
                           <a href="javascript:spb('TL')">
                             <i class="fa fa-try"></i>
                           </a>
                         </li>
                         <li>
                           <a href="javascript:spb('USD')">
                             <i class="fa fa-usd"></i>
                           </a>
                         </li>
                         <li>
                           <a href="javascript:spb('EUR')">
                             <i class="fa fa-eur"></i>
                           </a>
                         </li>
                         <li>
                           <a href="javascript:spb('GBP')">
                             <i class="fa fa-gbp"></i>
                           </a>
                         </li>
                     </ul>
                              
                            </div>
                        </div>
                       </div>
                   </div>    
                      
                      
                      
                      
                      
                                                        
                                                        
                                                        
    <div class="form-group">
   <label class="control-label col-md-3">Vergiler KDV </label>
   
   
<div class="col-md-4">
    
    <select class="form-control select2me" onchange="alissatiskontrol()" id="kdv" name="kdv">
     
      <option value="1.18">18 %</option>
      <option value="1.08">8 %</option>
      <option value="1.01">1 %</option>
      <option value="1">0 %</option>
    </select>
</div>
 <div class="col-md-5">
      <div class="input-group-btn">
<button type="button" class="btn green dropdown-toggle" data-toggle="dropdown"  tabindex="-1" id="aliskurbtn">DİĞER VERGİ EKLE</button>
    <i class="fa fa-angle-down"></i>
</button>
                                
                                
    <ul class="dropdown-menu" role="menu">
     <li id="oiv">
       <a href="javascript:dv('ÖİV')">
         ÖİV
       </a>
     </li>
     <li id="aotv">
       <a href="javascript:dv('ALIŞ ÖTV')">
         ALIŞ ÖTV
       </a>
     </li>
     <li id="sotv">
       <a href="javascript:dv('SATIŞ ÖTV')">
         SATIŞ ÖTV
       </a>
     </li>

 </ul>
                              
</div> 
</div>
</div>

                      
                      
   <div class="form-group" id="oilv">
                    <label class="control-label col-md-3">ÖZEL İLETİŞİM VERGİSİ</label>
                    <div class="col-md-9">                                            
                        <div class="input-group input-large">
                            <input type="text" name="oilval" id="oilval"  value="" class="form-control" placeholder="">
                      
                            <div class="input-group-btn">
                                <button type="button" class="btn green" tabindex="-1" >%</button>
                            <button type="button" class="btn badge-danger" tabindex="-1" onclick="oivsil()"> X </button>
                                
                     
                            </div>
                        </div>
                       </div>
                   </div>                     
                      
                      
       <div class="form-group" id="aotvdiv">
                    <label class="control-label col-md-3">ALIŞ ÖTV</label>
                    <div class="col-md-9">                                            
                        <div class="input-group input-large">
                            <input type="text" name="aotvval" id="aotvval" class="form-control " placeholder="">
                                <input type="hidden" name="aotvdurum" id="aotvdurum" value="y">                 
            <div class="input-group-btn">
                <button type="button" class="btn green" tabindex="-1" id="alisotvkurdgr">%</button>

                            
    <button type="button" class="btn green dropdown-toggle" data-toggle="dropdown" tabindex="-1" aria-expanded="false">
                <i class="fa fa-angle-down"></i>
    </button>

    <button type="button" class="btn badge-danger" tabindex="-1"  onclick="aotvsil()"> X </button>

                                
                        <ul class="dropdown-menu" role="menu">
                            
                            <li>
                           <a href="javascript:aotvkuryuzde('%')">
                             %
                           </a>
                         </li>
                         <li id="alisotvtl">
                           <a href="javascript:aotvkuryuzde('TL')">
                             <i class="fa fa-try"></i>
                           </a>
                         </li>
                         
                     </ul>                     
                            
                            
                     
                            </div>
                        </div>
                       </div>
                   </div>   
                      
                      
       <div class="form-group" id="sotvdiv">
                    <label class="control-label col-md-3">SATIŞ ÖTV</label>
                    <div class="col-md-9">                                            
                        <div class="input-group input-large">
                            <input type="text" name="sotvval" id="sotvval" class="form-control money" placeholder="">
                          <input type="hidden" name="sotvdurum" id="sotvdurum" value="y">  
                                <div class="input-group-btn">
                                <button type="button" class="btn green" tabindex="-1" id="satisotvkurdgr">%</button>
                                
  <button type="button" class="btn green dropdown-toggle" data-toggle="dropdown" tabindex="-1" aria-expanded="false">
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                
                     <button type="button" class="btn badge-danger" tabindex="-1"  onclick="sotvsil()"> X </button>
 
                                
                        <ul class="dropdown-menu" role="menu">
                            
                            
 
                   <li>
                           <a href="javascript:sotvkuryuzde('%')">
                             %
                           </a>
                         </li>
                            
                             <li id="satisotvtl">
                           <a href="javascript:sotvkuryuzde('TL')">
                             <i class="fa fa-try"></i>
                           </a>
                         </li>
                        
                     </ul>              
                            </div>
                        </div>
                       </div>
                   </div>                     
                      
                      
                      
          <div class="form-group">
                    <label class="control-label col-md-3">VERGİLER DAHİL ALIŞ FİYATI</label>
                    <div class="col-md-9">                                            
                        <div class="input-group input-large">
                            <input type="text" name="vdalisfiyati"  id="vdalisfiyati" class="form-control money" placeholder="">
                                <input type="hidden" id="vdalisfiyatkur" name="vdalisfiyatkur" value="TRY" >
                            <div class="input-group-btn">
                                <button type="button" class="btn green" tabindex="-1" id="vdaliskurbtn"><i class="fa fa-try"></i></button>
                  
                              
                            </div>
                        </div>
                       </div>
                   </div>
                      
                      
                      
          <div class="form-group">
                    <label class="control-label col-md-3">VERGİLER DAHİL SATIŞ FİYATI</label>
                    <div class="col-md-9">                                            
                        <div class="input-group input-large">
                            <input type="text" name="vdsatisfiyati" id="vdsatisfiyati" class="form-control" placeholder="">
                                <input type="hidden" id="vdsatisfiyatkur" name="vdsatisfiyatkur" value="TRY" >
                            <div class="input-group-btn">
                                <button type="button" class="btn green" tabindex="-1" id="vdsatiskurbtn"><i class="fa fa-try"></i></button>
                                
                            </div>
                        </div>
                       </div>
                   </div>
  <div class="form-group">
                    
                    <div class="col-md-12">                                            
                        <div class="input-group input-large" style="float: right">
                           
                            <button type="submit" class="btn green" target="" >KAYDET</button>
                             
                        </div>
                       </div>
                   </div>
 
                                                </form>
                                                <!-- END FORM-->
                                            </div>
                                        </div>
    
    
    </div>
                        </div>
                    </div>
                </div>
            </div>
                
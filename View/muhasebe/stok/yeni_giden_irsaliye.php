<script>
    
    var ANASAYFA = '<?php echo SITE ; ?>';
    </script>
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
                    <label class="control-label col-md-3">AÇIKLAMA</label>
                    <div class="col-md-9">
                        <input type="text" placeholder="" name="aciklama" class="form-control">

                    </div>
                </div>

                   <div class="form-group">
                    <label class="control-label col-md-3">MÜŞTERİ</label>
                    <div class="col-md-9">
                        
                        
<style>
 
.frmSearch {border: 0px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:1px;border-radius:4px;}
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;z-index: 1}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #90bae4  1px solid;border-radius:4px;}
</style>                        
                          <script>
    $(document).ready(function(){
            $("#search-box").keyup(function(){
                    $.ajax({
                    type: "POST",
                    url: ANASAYFA+"/ajaxislemler/musterigetir",
                    data:'keyword='+$(this).val(),
                    beforeSend: function(){
                            $("#search-box").css("background","#FFF url(<?php echo SKIN.'assets/muhasebe/images/loader.gif' ?>) no-repeat 165px");
                    },
                    success: function(data){
                            $("#suggesstion-box").show();
                            $("#suggesstion-box").html(data);
                            $("#search-box").css("background","#FFF");
                    }
                    });
            });
    });
         
    function selectCountry(val) {
        $("#search-box").val(val);
        $("#suggesstion-box").hide();
        /// buradan il ilçe ve adres bilgilerini al ve alanlara doldur. 
        
    }
  </script>
                         
<div class="frmSearch">
	<input type="text" id="search-box" name="Müşteri" class="form-control"  placeholder="Müşteri Adı" />
	<div id="suggesstion-box"></div>
</div>
<small class="field-content-help-text">
      <i class="fa fa-info-circle"></i>
      Kayıtlı bir müşteri seçebilir veya yeni bir müşteri ismi yazabilirsiniz.
    </small>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">ADRES</label>
                    <div class="col-md-3">
                        <textarea class="form-controls" rows="5" style="width: 100%;"></textarea>

                    </div>
                       <div class="col-md-6">
                       ETİKET EKLE
                <select class="form-control select2me"  name="etiket[]" id="etiket" multiple>
                    
               <?php foreach ($cls->etiket() as $etiket) {?> 
                    <option value="<?php echo $etiket->id; ?>"><?php echo $etiket->ad; ?></option>
                 <?php  } ?>     
                </select>
                    </div>
                </div>

    <div class="form-group ">
 <label class="control-label col-md-3">İL / İLÇE <span class="required"> * </span> </label>
            <div class="col-md-6">
                <label class="control-label col-md-1">İL </label>
                <div class="col-md-5">
                <select class="form-control select2me" onchange="il_ilce(this.value,'ilce')" name="il">
                    <option value="">İl Seçiniz...</option>
               <?php foreach ($cls->illler() as $value) {?> 
                    <option value="<?php echo $value->id; ?>"><?php echo $value->il_adi; ?></option>
                 <?php  } ?>     
                </select>
                </div>
                <label class="control-label col-md-1">İLÇE </label>
                <div class="col-md-5" id="ilce">
                <select class="form-control select2me" name="ilce">
                    <option value="">İl Seçiniz...</option>
                    
                </select>
                </div>

                
            </div>
 <div class="col-md-3"></div>
    </div>

        <div class="form-group">
            
           <div class="col-md-12"> 
                <label class="control-label col-md-3">Düzenleme Tarihi</label>
                <div class="col-md-3">
                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="<?php echo date('d-m-Y'); ?>">
                        <input type="text" class="form-control" readonly="" value="<?php echo date('d-m-Y'); ?>">
                        <span class="input-group-btn">
                            <button class="btn default" type="button">
                                <i class="fa fa-calendar"></i>
                            </button>
                        </span>
                    </div>

                </div>
                <div class="col-md-6"></div>
            </div>
             
            
            <div class="col-md-12"> 
                <p>
                <div class="col-md-3">
                </div>
                <span  id="btn_irsaliyeno_id" onclick="gostergizle('irsaliyeno_id')" class="btn btn-success">          
                    <i class="fa fa-plus"></i>
                    İRSALİYE NO EKLE
                </span>
            
                <span  id="btn_fiilisevtarihi_id" onclick="gostergizle('fiilisevtarihi_id')" class="btn btn-success">          
                    <i class="fa fa-plus"></i>
                    FİİLİ SEVK TARİHİ EKLE
                </span>            
                </p>
            </div>
            
             <div class="col-md-12" id="irsaliyeno_id" style="display:none"> 
                 <label class="control-label col-md-3">İRSALİYE NO</label>
                <div class="col-md-3">
                     <input type="text" placeholder="" name="irsaliye_no" class="form-control">
                    
                </div>
                 
               <div class="col-md-3"></div>
              
                <div class="col-md-3"> <span  class="btn btn-success" onclick="gostergizle('irsaliyeno_id')"><i class="icon-close"></i> </span></div> 
            </div>
            
            <hr class="sayfarengi">
                 <div class="col-md-12"  id="fiilisevtarihi_id" style="display:none"> 
                 <label class="control-label col-md-3">FİİLİ SEVK TARİHİ</label>
                <div class="col-md-3">
                           <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="<?php echo date('d-m-Y'); ?>">
                        <input type="text" class="form-control" readonly="" value="<?php echo date('d-m-Y'); ?>">
                        <span class="input-group-btn">
                            <button class="btn default" type="button">
                                <i class="fa fa-calendar"></i>
                            </button>
                        </span>
                    </div>
                    
                </div>
                 
                 <div class="col-md-3">
                     <input type="text" placeholder="" name="fiili_sevk_saat"   value="<?php echo date('H:i'); ?>"  data-mask="99:99" class="form-control">
                 </div>  
                 <div class="col-md-3">
                     <span  class="btn btn-success" onclick="gostergizle('fiilisevtarihi_id')"><i class="icon-close"></i> </span>
                 </div>  
            </div>    
        
        
        
        
        
        
        </div>
  
                
                
                
                <style>
                    hr.sayfarengi {
  border: 5px solid #f1f4f7;
 /* border-radius: 2px;*/
}
                </style>            
                
                
                
                
                
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
    
    <input type="hidden" name="urunsatirlar" id="urunsatirlar" value="" />
<div class="portlet box blue-sharp">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i> ÜRÜN </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="Gizle" title="Gizle"> </a>
                                        <a href="javascript:;" onclick="temizler()" class="reload" data-original-title="Sıfırla" title="Sıfırla"> </a>
                                        
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    
                                                    <th> Ürün </th>
                                                    <th> Miktar </th>
                                                    <th> Birim </th>
                                                    <th> Sil</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                     
                                            <div id="ekle"> <span onclick="eklegelsin();" class="btn green" target="" >EKLE</span><span onclick="temizler();" class="btn red-haze" target="" >Tümünü Temizle</span></div>    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
</div>
        <script>
            
var copy =   '<tr id="tr_ayhanxcv"><td><select class="form-control select2me" onchange="stokgoster(this.value,\'id_ayhanxcv\');" name="urun_ayhanxcv"  id="pp_ayhanxcv"><option value=""> ... </option><?php foreach ($cls->urun_hizmetler_all() as $urunx): ?><option value="<?php echo $urunx->id ?>"> <?php echo $urunx->ad ?></option><?php endforeach; ?></select><span class="help-block" id="id_ayhanxcv"></span></td><td> <input class="form-control" type="text" name="miktar_ayhanxcv" > </td><td> <input class="form-control" type="text" name="birim_ayhanxcv" id="birim_ayhanxcv"> </td><td> <i class="icon-close" style="cursor:pointer" onclick="silstr(ayhanxcv)"></i> </td></tr>';
$( window ).load(function() {
  eklegelsin();
  etiketstart();
  $("#txtTime").setMask('time').val('hh:mm');
});


</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>
<script src="<?php echo SKIN ; ?>assets/muhasebe/js/hizmeturun.js" type="text/javascript"></script>  
                                                        
                                      
            
      
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
                
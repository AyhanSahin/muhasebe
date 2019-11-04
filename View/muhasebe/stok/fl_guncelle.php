<?php 




$fl = $cls->fldetay($id)[0]; ?>
        <!-- END PAGE LEVEL PLUGINS -->
<link href="<?php echo SKIN ; ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css">
<script>var ANASAYFA = '<?php echo SITE ; ?>';</script> 
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
                                                   
                                                    <span class="caption-subject font-green-haze bold uppercase"><a href="<?php SELF::go('stok/fiyat_listesi'); ?>">Fiyat Listesi -> </a></span>
                                                    <span>Fiyat Listesi Güncelleme Ekranı
                                                    </span>
                                                </div>
                                                 
<div class="row">

<div class="portlet light bg-inverse form-fit">
                                   
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form action="<?php SELF::go("stok_kayit/fiyat_listesi_g");?>" class="form-horizontal form-row-seperated" method="post" enctype="multipart/form-data">
            <div class="form-body">
                <div class="form-group">
                    <label class="control-label col-md-3">LİSTE ADI</label>
                    <div class="col-md-9">
                        <input type="text" placeholder="" value="<?php echo $fl->ad; ?>" name="ad" class="form-control">

                    </div>
                </div>

                   <div class="form-group">
                    <label class="control-label col-md-3">İNDİRİM UYGULANACAK ÜRÜNLER</label>
                    <div class="col-md-9">
              
 <style>
 .btn span.glyphicon {    			
	opacity: 0;				
}
.btn.active span.glyphicon {				
	opacity: 1;				
 }
  .btn span.fa {    			
	opacity: 1;				
}
.btn.active span.fa {				
	opacity: 0;				
 }
 
.input-icon.input-icon-lg>i {
    margin-top: 8px ! important;
}
 </style>
 
 <!--  
 // 
 burada indirim uygulanaca olan secenek js ile click yaptıralacak
 
 şeçili urun = S id = option2  Kategori = K id = option1   Tüm ürünler ise T id = option3
 olarak 
 
 K secili ise Kategori id eşlemesi yapılacak 
 
 
 toplu indirim ise inirim alanı doldurulacak 
 
 
 tüm ürünlerde ise de 
 
 
 seçili ürünlerde ise toplu indirim alanı ve ürünler yerleştirilik 
 
 
 toplu indirim butonu kliklenecek
 
 -->
                        
   
		
		<div class="btn-group" data-toggle="buttons">
			
			<label class="btn btn-success active">
				<input type="radio" name="indirim_uygulama_turu" value="S" id="option2" autocomplete="off" chacked>
				<span class="glyphicon glyphicon-ok"></span> Seçili Ürünler 
			</label>

			<label class="btn btn-primary">
				<input type="radio" name="indirim_uygulama_turu" value="K"  id="option1" autocomplete="off">
				<span class="glyphicon glyphicon-ok"></span> Kategori 
			</label>

			<label class="btn btn-info">
				<input type="radio" name="indirim_uygulama_turu" value="T"  id="option3" autocomplete="off">
				<span class="glyphicon glyphicon-ok"></span> Tüm Ürünler
			</label>

			 
		
	 

</div>            
       
                        
   

                    </div>
                </div>

                
                
       <div class="form-group" id="x_kategori" style="display:none">
            <label class="control-label col-md-3">KATEGORİ</label>
            <div class="col-md-3">
                <select class="form-control" id="frmktgr" name="urun_kategori_id">
                    <?php foreach ($cls->urunkategori() as $value) { ?>
                    <option value="<?php echo $value->id; ?>" <?php if($fl->ktg_id >= 1){ if($fl->ktg_id == $value->id){ echo "selected";}} ?>><?php echo $value->isim; ?></option>
                    <?php } ?>
                </select>
           
            </div>
            <div class="col-md-6"></div>
        </div>              
                
                
                
                
                <div class="form-group">
                    <label class="control-label col-md-3">TOPLU İNDİRİM</label>
                    <div class="col-md-3 ">
                        <div class="input-icon input-icon-lg right tpi">
                            <i class="font-green">%</i>
                            <input type="hidden" name="id" value="<?php echo $fl->id; ?>" />
                            <input type="text" name="toplu_indirim" value="<?php if($fl->toplu_indirimmi == 1) echo $fl->toplu_indirim; ?>"  class="form-control input-medium snumber" placeholder="0">
                        </div>
               

                    </div>
                    
                        <div class="col-md-6">
                             
                            <div class="btn-group scnk" data-toggle="buttons">
                                <label class="btn btn-warning">
                                <input type="checkbox" autocomplete="off" name="toplu_indirimmi" id="topluindirimuygulama" value="1">
                                <span class="fa a fa-square-o"></span><span class="glyphicon glyphicon-ok"></span> Toplu İndirim Uygula
                                </label>
                            </div>

                        </div>
                    
                </div>


                
                
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>
<script src="<?php echo SKIN ; ?>assets/muhasebe/js/fiyatlistesi.js" type="text/javascript"></script>  
                                                        
                                                        
 <div class="form-group" id="urunlist">
    
    
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
                                                    <th> VERGİLER HARİÇ SATIŞ FİYATI </th>
                                                    <th> İNDİRİM </th>
                                                    <th> YENİ FİYAT </th> 
                                                    <th> Sil </th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                     
                                            <div id="ekle"> 
                                                <span onclick="eklegelsin();" class="btn green" target="" >EKLE</span>
                                                <span onclick="temizler();" class="btn red-haze" target="" >Tümünü Temizle</span>
                                            </div>
                                            
                                            
          <?php if($fl->indirim_uygulama_turu == "S"): $i=0; foreach($cls->seciliurunler($fl->id) as $urunler): $i++; ?>
                                            
                                            
                                            <tr id="tr_<?php echo $i ; ?>">
                       <td style="width:250px">
      <select class="form-control select2me" onchange="stokgoster(this.value,'id_<?php echo $i ; ?>');" name="urun_<?php echo $i ; ?>"  id="pp_<?php echo $i ; ?>">
          <option value=""> ... </option>
              <?php foreach ($cls->urun_hizmetler_all() as $urunx): ?>
          <option value="<?php echo $urunx->id ?>" <?php if($urunx->id == $urunler->urun_id){echo "selected"; } ?>> <?php echo $urunx->ad ?></option>
              <?php endforeach; ?>
      </select></td><td> 
<div class="input-icon input-icon-lg right">
     <?php if($urunler->v_h_s_f_kur = "TL"){
         
         echo '<i class="fa fa-try" id="kur_'.$i.'"></i>';
         
     }
     else if($urunler->v_h_s_f_kur = "USD"){
         
         echo '<i class="fa fa-usd  id="kur_'.$i.'"></i>';
         
     }
     else if($urunler->v_h_s_f_kur = "EUR"){
         
         echo '<i class="fa fa-eur id="kur_'.$i.'"></i>';
         
     }
     else if($urunler->v_h_s_f_kur = "GBP"){
         
         echo '<i class="fa fa-gbp id="kur_'.$i.'"></i>';
         
     } ?>
     

    <input type="text" name="vhsf_<?php echo $i ; ?>" value="<?php echo $urunler->v_h_s_f; ?>"  class="form-control input-medium" placeholder="0" disabled>
</div>
                                        </td>
<td>
<div class="input-icon input-icon-lg right">
    <i class="font-green">%</i>
    <input type="text"  name="indirim_<?php echo $i ; ?>" value="<?php echo $urunler->indirim; ?>" onkeyup="yfhspl('<?php echo $i ; ?>')"  class="snumber form-control input-medium" placeholder="0">
</div>
                                        </td> 
<td>
<input class="form-control" type="text" value="<?php if($urunler->indirim){
                                                            echo (float)$urunler->v_h_s_f - (((float)$urunler->v_h_s_f / 100 ) * $urunler->indirim) ; 
                                                            } 
                                                            else if($fl->toplu_indirimmi == 1){
                                                                echo (float)$urunler->v_h_s_f - (((float)$urunler->v_h_s_f / 100 ) * $fl->toplu_indirim) ; 
                                                            }?>" name="yenifiyat_<?php echo $i ; ?>" id="yenifiyat_<?php echo $i ; ?>">
</td>

<td>
    <button type="button" class="btn badge-danger" tabindex="-1"  onclick="silstr('<?php echo $i ; ?>')"> X </button>
</td>
</td>
</tr>

<?php
endforeach; 
endif;
?>
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
</div>

<script src="<?php echo SKIN ; ?>assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
        <script>
            
var copy = '<tr id="tr_ayhanxcv"><td style="width:250px"><select class="form-control select2me" onchange="stokgoster(this.value,\'id_ayhanxcv\');" name="urun_ayhanxcv"  id="pp_ayhanxcv"><option value=""> ... </option><?php foreach ($cls->urun_hizmetler_all() as $urunx): ?><option value="<?php echo $urunx->id ?>"> <?php echo $urunx->ad ?></option><?php endforeach; ?></select></td><td> \n\
<div class="input-icon input-icon-lg right"><i class="fa fa-try" id="kur_ayhanxcv"></i><input type="text" name="vhsf_ayhanxcv"  class="form-control input-medium" placeholder="0" disabled></div></td>\n\
<td><div class="input-icon input-icon-lg right"><i class="font-green">%</i><input type="text"  name="indirim_ayhanxcv" onkeyup="yfhspl(\'ayhanxcv\')"  class="snumber form-control input-medium" placeholder="0"></div></td> \n\
<td><input class="form-control" type="text" name="yenifiyat_ayhanxcv" id="yenifiyat_ayhanxcv"> </td>\n\
<td> <button type="button" class="btn badge-danger" tabindex="-1"  onclick="silstr(\'ayhanxcv\')"> X </button></td></td></tr>';
    $( window ).load(function() {
           
        <?php  if($fl->indirim_uygulama_turu == "S") { ?>
      
    $("#option2").trigger("click");
       
         <?php }
       else if($fl->indirim_uygulama_turu == "K"){ ?>
          
          $("#option1").trigger("click");
        <?php } 
       else if($fl->indirim_uygulama_turu == "T") {
        ?>
          $("#option3").trigger("click");      
        <?php   } 
        
   
         if($fl->toplu_indirimmi == 1){ ?>
            
          $("#topluindirimuygulama").trigger("click");   
            
       <?php  }   ?>
   
              
              
           ix = <?php if(isset($i)) echo $i; else echo 1; ?> 
         
      
                 $('.snumber').mask("###.###.##", {reverse: true});
      
      
    });


</script>


  <div class="form-group">
                    
                    <div class="col-md-12">                                            
                        <div class="input-group input-large" style="float: right">
                           <input type="hidden" name="urunsatirlar" id="urunsatirlar" value="<?php if(isset($i)) echo $i; else echo 1; ?>" />
                            <button type="submit" class="btn green" target="" > GÜNCELLE </button>
                            <label> </label>
                            
                            <button onclick="location.replace('<?php SELF::go('stok/fiyat_listesi') ?>');return false;" class="btn yellow" target="" > VAZGEÇ </button>
                            <button onclick="location.replace('');return false;" class="btn btn-read" target="" > EKRANI YENİLE </button>
                       
                        </div>
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
                
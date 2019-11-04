        <section>
            <div class="second-page-container">
                <div class="block">
                    <div class="container">
                        <div class="header-for-light">
                            <h1 class="wow fadeInRight animated" data-wow-duration="1s"><span> Sepetim</span></h1>
                        </div>

                        
                        
                        <div class="row">
                            <div class="col-md-12">
                                <table class="cart-table table wow fadeInLeft" data-wow-duration="1s">
                                    <thead>
                                        <tr> <th class="card_product_delete">Sil</th>
                                            <th class="card_product_image">Resim</th>
                                            <th class="card_product_name">Kargo</th>
                                       
                                            <th class="card_product_quantity">Adet</th>
                                            <th class="card_product_price">Adet Fiyat</th>
                                            <th class="card_product_total">Toplam</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                <?php  $sepet = $this->session->sepet_get(); 
        $kadet = 0;      
         $tl = 0;
         $usd = 0;
         $euro = 0;
         $gbp = 0;
  $tplmkrg = "";       
foreach ($sepet as $key ) { 
    
    $iid = $key["id"];
    $kargo = "";
    
    if($key["snkid"]){
       $iid = $key["snkid"];  
     $secenekvar = $key["snkid"];   
        $toplam =   $cls->secenekstok($secenekvar); 
    }else{
   $toplam =   $api::ilanidtoilan($iid)->stok; 
    }
   if($api::ilanidtoilan($iid)->korgokime==2){
       $kadet++;
       $kargo = 1;
       $tplmkrg = 1;
   }
   
?>
                 

<tr>
    <td data-th="Ürünü Sil">
        <a href="javascript:void(0)" onclick="sepetdelete('<?php echo $iid; ?>'); location.reload();" class="trash"><i style="font-size:32px;" class="fa fa-trash-o pull-center"></i></a>
</td>
    <td class="card_product_image" data-th="Ürün Resmi">
      <?php //var_dump($cls->urunsecenekadi($key['snkid'])); ?>   
        <a href="<?php SELF::go('ilan/detay/id/'.$key["id"].'/'.$this->help("seourl")->seo($key["baslik"])); ?>">
            <img title="<?php echo $key["baslik"]; if($key["snkid"]){ ?>
            ( <?php echo $cls->urunsecenekadi($key['snkid']) ; } ?> )" alt="<?php echo $key["baslik"]; if($key["snkid"]){ ?>
            ( <?php echo $cls->urunsecenekadi($key['snkid']) ; } ?> )"  src="<?php echo $key["resim"]; ?>">
        </a>
    </td>
    
    <td class="card_product_name" data-th="Kargo"> 
        
           <?php if($kargo == 1){
               echo "<b> ( Kargo Alıcıya Ait ) </b>";
            } else echo "<b> ( Ücretsiz ) </b>";  ?>
            
       
        
    </td> 
 
    <td class="card_product_quantity" data-th="Adet">
<div class="input-group" style="width: 90px;">
          <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number"  data-type="minus" data-field="<?php echo $iid; ?>" data-secenek="<?php  if($key["snkid"]){echo $key["snkid"];} else {echo "a";} ?>">
                  <span class="glyphicon glyphicon-minus"></span>
              </button>
          </span>
    
          <input onkeypress="return false;" type="text" name="<?php echo $iid; ?>" class="form-control input-number" value="<?php echo $key["adet"]; ?>" min="1" max="<?php echo $toplam; ?>">
          
              <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="<?php echo $iid; ?>" data-secenek="<?php  if($key["snkid"]){echo $key["snkid"];}  else {echo "a";}?>">
                  <span class="glyphicon glyphicon-plus"></span>
              </button>
          </span>
</div><a href="#"><i class="icon-trash icon-large"></i> </a>
                                            </td>
                                            <td class="card_product_price" data-th="Adet Fiyat"><?php echo $key["fiyat"].' '.$key["kur"]  ?></td>
                                            <td class="card_product_total" data-th="Toplam"><?php echo ($key["fiyat"] * $key["adet"]).' '.$key["kur"]  ?></td>
                                        </tr>

                                        
<?php

if($key["kur"] == "TL"){
    
    $tl = $tl + ($key["fiyat"] * $key["adet"]);
}
if($key["kur"] == "USD"){
    
    $usd = $usd + ($key["fiyat"] * $key["adet"]);
}
if($key["kur"] == "EURO"){
    
    $euro = $euro + ($key["fiyat"] * $key["adet"]);
}
if($key["kur"] == "GBP"){
    
    $gbp = $gbp + ($key["fiyat"] * $key["adet"]);
}


} 
   $kur = $this->help("kur"); 
               
if($usd > 0){
    
    $tl = $tl + ceil($usd * $kur->DolarSatis);
    
}
if($euro > 0){
    
    $tl = $tl + ceil($euro * $kur->EuroSatis);
    
}
if($gbp > 0){
    
    $tl = $tl + ceil($gbp * $kur->GbpSatis);
    
}


$this->help("session")->set("sepettoplam",$tl);
?>                                       
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        
                                               
                      
                         
                        
                        
                        <div class="row">
                       
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="block-form block-order-total box-border wow fadeInRight" data-wow-duration="1s">
 <ul class="list-unstyled">
 <li class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
 <img height="60" src="<?php echo SKIN ; ?>new/img/dolar.png" />
 </li>
 <li class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
 <img height="60" src="<?php echo SKIN ; ?>new/img/euro.png" />
 </li>
 <li class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
 <img height="60" src="<?php echo SKIN ; ?>new/img/gbp.png" />
 </li>
  
 <li class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
    <?php echo $kur->DolarAlis ; ?> / <?php echo $kur->DolarSatis ; ?>
 </li>
 <li class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
    <?php echo $kur->EuroAlis ; ?> / <?php echo $kur->EuroSatis ; ?>
 </li>
 <li class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
    <?php echo $kur->GbpAlis ; ?> / <?php echo $kur->GbpSatis ; ?>
 </li>
     
 </ul>
<hr style="border: 4px solid #027fdc; border-radius: 5px;"> 
<hr>
                                            <ul class="list-unstyled">
                                                <li>Sepet Toplamı: <strong><?php echo $tl; ?> TL</strong></li>
                                                <li>Kargo Ücreti: <strong><?php if($tplmkrg) { echo " $kadet Adet alıcı ödemeli Kargo Var."; }  ?></strong></li>
                                                
                                                <li><hr></li>
                                                <li class="active"><b>Toplam:</b> <strong><?php echo $tl; ?> TL</strong></li>                                    
                                            </ul>
                                          
<input type="submit"  onclick="location.replace('<?php self::go("index/home"); ?>')"  value="Mağazaya Dön"  class="btn-default-2">
<input type="submit"  value="ÖDEME YAP" onclick="location.replace('<?php self::go("ilan/hemenal"); ?>')"  class="btn-default-2">

                                        </div>
                                    </article>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div> 
        </section>



<!--


        <section>
            <div class="block color-scheme-white-90">
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
<style>
    
    .card_product_quantity {
    width: 70px ! important;
    }
</style>

<script>
                                        
$('.btn-number').click(function(e){
    e.preventDefault();
    secenek = $(this).attr('data-secenek');
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
                updatesepet(fieldName,input.val(),secenek);
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
               
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
                updatesepet(fieldName,input.val(),secenek);
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });




function updatesepet(id,adet,secenek){
    
  
                  $.post( "<?php echo SITE ; ?>/index/sepetsonupdate",
                 {uid : id , uadet : adet,secenek:secenek})
                         .done(function( sonuc ) { 
                    if(sonuc == id){
                        location.reload();
                    }     
            });  
    
}

</script>
                                        
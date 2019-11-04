
    var ibannumber = [2,3,4,5,6];
    var ekliler = [];
    function ekleiban(deger=""){
        if(deger != ""){
           deger = "value='"+deger+"' ";
            
        }
      var id  = ibannumber.splice(0,1);  

        if(id > 1){
            ekliler.push(id);
            ekliler.sort(function(a,b){return a - b});
            ibannumber.sort(function(a,b){return a - b});
            $("#ibanlar").val(ekliler);
            var ekle = '<p id="sil_'+id+'"><a style="float: left" class="btn btn-danger" onclick="siliban(\''+id+'\')"><i class="fa fa-trash"></i></a><input type="text" '+deger+' placeholder="IBAN NUMARASI" id="idiban_'+id+'" name="iban_'+id+'" class="form-control input-medium"><p>';
            $("#ibanekle").append(ekle);
        }
    }

    function siliban(id){
        ibannumber.push(id);
        $("#sil_"+id).remove();
        ekliler.sort(function(a,b){return a - b});
        ibannumber.sort(function(a,b){return a - b});
        ekliler = ekliler.filter(function(ele){ return ele != id;});
        $("#ibanlar").val(ekliler);
    }
    
    
    function il_ilce_secili(id,ilce,div){
        if(id){
            $.post( ANASAYFA+"/ajaxislemler/secili_ilce_getir", { il_id: id,ilce_id:ilce })
            .done(function( data ) {

                $("#"+div).html(data);
                $("#"+div+"_select").select2(); 
            });
        }
        else{
            $("#"+div).html("");
        }
        
    } 
    
    function il_ilce(id,div){
        if(id){
            $.post( ANASAYFA+"/ajaxislemler/ilcegetir", { il_id: id })
            .done(function( data ) {

                $("#"+div).html(data);
                $("#"+div+"_select").select2(); 
            });
        }
        else{
            $("#"+div).html("");
        }
        
    }
    function katedoriekle(){
        var ktgname = $("#ktgyeni").val();
        $.post( ANASAYFA+"/ajaxislemler/kategoriekle", { name: ktgname })
        .done(function( data ) {
            $('#modalfk').modal('toggle');
          $("#frmktgr").html(data);
          $("#ktgyeni").val("");
        });
    }

    function bak(){   
        if($('[name="adres_yd"]').is(':checked')){

            $(".il_ilce").hide();

        }
        else {$(".il_ilce").show();}
    }

    function xbak(tg){

        if(tg=="t"){
           $(".vd").show();
        }
        else if(tg=="g"){
            $(".vd").hide();
        }
    }
    function abak(){   
        if($('[name="acilisbakiyesivarmi"]').is(':checked')){

            $(".abv").show();

        }
        else {$(".abv").hide();}
    }
    
    function pb(p){
        // para birimi
        
        if(p=='TL'){
            $("#kurbtn").html('<i class="fa fa-try"></i>');
            $("#fiyatkur").val('TL'); 
        }
        else if(p=='USD'){
             $("#kurbtn").html('<i class="fa fa-usd"></i>');
             $("#fiyatkur").val('USD'); 
        }
        else if(p=='EUR'){
             $("#kurbtn").html('<i class="fa fa-eur"></i>');
             $("#fiyatkur").val('EUR'); 
        }
        else if(p=='GBP'){
             $("#kurbtn").html('<i class="fa fa-gbp"></i>');
             $("#fiyatkur").val('GBP'); 
        }
    }
    var yetkilinumber = [1,2,3,4,5,6];
    var yekliler = [];
    function ekleyetkili(){
        
      var id  = yetkilinumber.splice(0,1);  
        
        if(id >= 1){
            yekliler.push(id); 
            yekliler.sort(function(a,b){return a - b});
            yetkilinumber.sort(function(a,b){return a - b});
            $("#yekliler_adet").val(yekliler);
            var ekle = '<div class="form-group y'+id+'"><div class="col-md-3">\n\
<input type="text" name="yad_'+id+'" placeholder="YETKİLİ KİŞİNİN ADI" class="form-control input-medium"></div>\n\
<div class="col-md-3"><input type="text" name="yposta_'+id+'"  placeholder="E-POSTA" class="form-control input-medium"></div>\n\
<div class="col-md-2"><input type="text" name="ytel_'+id+'"  placeholder="TELEFON" class="form-control input-small"></div>\n\
<div class="col-md-3"><input type="text" name="ynot_'+id+'"  placeholder="NOTLAR" class="form-control input-medium"></div>\n\
<div class="col-md-1"><a style="float: none" class="btn btn-danger" onclick="silyetkili(\''+id+'\')"><i class="fa fa-trash"></i></a></div>';
            $("#yekliler").append(ekle);
        }
    }

    function silyetkili(id){
        yetkilinumber.push(id);
        $(".y"+id).remove();
        yekliler.sort(function(a,b){return a - b});
        yetkilinumber.sort(function(a,b){return a - b});
        yekliler = yekliler.filter(function(ele){ return ele != id;});
        $("#yekliler_adet").val(yekliler);
    }
    
// Jquery Dependency
$(window).load(function(){
    
    $("input[data-type='currency']").on({
    keyup: function() {
      
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
});
});



function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".")
}


function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.
  
  // get input value
  var input_val = input.val();
  
  // don't validate empty input
  if (input_val === "") { return; }
  
  // original length
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");
    
  // check for decimal
  if (input_val.indexOf(",") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(",");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);
    
    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
      right_side += "00";
    }
    
    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = left_side + "," + right_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = input_val;
    
    // final formatting
    if (blur === "blur") {
      input_val += ",00";
    }
  }
  
  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}

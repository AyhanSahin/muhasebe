  function katedoriekle(){
    var ktgname = $("#ktgyeni").val();
    $.post( ANASAYFA+"/ajaxislemler/urunkategoriekle", { name: ktgname })
    .done(function( data ) {
        $('#modalfk').modal('toggle');
      $("#frmktgr").html(data);
      $("#ktgyeni").val("");
    });
}
  function formatMoney(n) {
    return parseFloat(n).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1.').replace(/\.(\d+)$/,',$1');
}

    function alissatiskontrol(){
        
        hesaplaalisfiat();
        hesaplasatisfiat();
        

    }
  function hesaplaalisfiat(){
        var alisfiyat =  $('[name="alisfiyati"]').val();
     alisfiyat =  alisfiyat.replace(".","");
     alisfiyat =  alisfiyat.replace(",",".");
     alisfiyat  = (parseFloat(alisfiyat) * $("#kdv").val()) ;
        if($("#oilval").val() >= 1){
            // özel iletişim vergisi var ise
            alisfiyat = alisfiyat * (1 + ($("#oilval").val() / 100));
        }
        if($("#aotvval").val() >= 1){
           if($("#aotvdurum").val() == "y"){ 
                // özel tüketim vergisi var ise
                alisfiyat = alisfiyat * (1 + ($("#aotvval").val() / 100));
            }
            else if($("#aotvdurum").val() == "t"){
                alisfiyat = ( alisfiyat  +  parseFloat($("#aotvval").val()) ); 
         
            }
                
       } 
     
    alisfiyat  =  formatMoney(Number(alisfiyat.toFixed(2)));
    $("#vdalisfiyati").val(alisfiyat);  
      
  }
    function hesaplasatisfiat(){
        var  x;  
     x =  $('[name="satisfiyati"]').val();
     x =  x.replace(".","");
     x =  x.replace(",",".");
     x  = (parseFloat(x) * $("#kdv").val()) ;
      
        if($("#sotvval").val() >= 1){
            
           if($("#sotvdurum").val() == "y"){ 
                // özel tüketim vergisi var ise
                x = x * (1 + ($("#sotvval").val() / 100));
            }
            else if($("#sotvdurum").val() == "t"){
                
                x = ( x  +  parseFloat($("#sotvval").val()) ); 
                
         
            }
                
       } 
     
    x  =  formatMoney(Number(x.toFixed(2)));
    $("#vdsatisfiyati").val(x);  
      
  }
  $( document ).ready(function() {
          $("#oilv").hide();
          $("#aotvdiv").hide(); 
          $("#sotvdiv").hide(); 
          $('.money').mask("#.##0,00", {reverse: true});

  $('[name="satisfiyati"]').keyup(function(){
            
            hesaplasatisfiat();
            
        })
        $('[name="alisfiyati"]').keyup(function(){
            
            hesaplaalisfiat();
            
        })
        
        $('[name="oilval"]').keyup(function(){
            // özel iletişim vergisi 
            hesaplaalisfiat();
            
        })
        
        $('[name="aotvval"]').keyup(function(){
            // alış ötv hesabı
            hesaplaalisfiat();
            
        })

        $('[name="sotvval"]').keyup(function(){
            
            hesaplasatisfiat();
            
        })      
        
        
        
        
        
        
        

        $('[name="takip"]').change(function()
        {
          if ($(this).is(':checked')) {
             // Do something...
             if($(this).val()=='yes'){
                 $("#kssi").show("slow");
             }else{
                  $("#kssi").hide("slow");
             }
          };
        });
       $('[name="ksu"]').change(function()
        {
          if ($(this).is(':checked')) {
             // Do something...
          $('[name="kss"]').show();  

          }else {$('[name="kss"]').hide();$('[name="kss"]').val(""); }
        }); 

      });

   function spb(pb){
            // Satış kur değeri seçim işlemi
            // Satışta kur değeri tl ve varsayılan ise Satış Ötv Ye TL aktif
            
            // TL harici değer seçildiğinde Satış ÖTV sadece yüzde işlemi. 
            // TL pasif olacak input değerleri sıfırlanacak
            
        if(pb=="TL") {
        
            $("#satiskurbtn").html('<i class="fa fa-try"></i>'); 
            $("#vdsatiskurbtn").html('<i class="fa fa-try"></i>');
            $("#satisotvtl").show();
        }
        
        else if(pb=="USD") { 
              
            $("#satiskurbtn").html('<i class="fa fa-usd"></i>'); 
            $("#vdsatiskurbtn").html('<i class="fa fa-usd"></i>');
            
            $("#satisotvtl").hide();
            sotvkuryuzde("%");
        }
        
        else if(pb=="EUR") {
            $("#satiskurbtn").html('<i class="fa fa-eur"></i>');
            $("#vdsatiskurbtn").html('<i class="fa fa-eur"></i>');
            
            $("#satisotvtl").hide();
            sotvkuryuzde("%");
        }
        else if(pb=="GBP") {
            $("#satiskurbtn").html('<i class="fa fa-gbp"></i>');
            $("#vdsatiskurbtn").html('<i class="fa fa-gbp"></i>');
            
            $("#satisotvtl").hide();
            sotvkuryuzde("%");
        }
        
        else {
              
           $("#satiskurbtn").html('<i class="fa fa-try"></i>');
              $("#vdsatiskurbtn").html('<i class="fa fa-try"></i>');
        }
           $("#satisfiyatkur").val(pb);
           $("#vdsatisfiyatkur").val(pb);
           
           hesaplasatisfiat(); 

      }
      
      
      
    function pb(pb){
            // Alış kur değeri seçim işlemi
            // Alışta kur değeri tl ve varsayılan ise Alış Ötv Ye TL aktif
            
            // TL harici değer seçildiğinde Alış ÖTV sadece yüzde işlemi. 
            // TL pasif olacak input değerleri sıfırlanacak
            
        if(pb=="TL") { 
            
            $("#aliskurbtn").html('<i class="fa fa-try"></i>'); 
            $("#vdaliskurbtn").html('<i class="fa fa-try"></i>');
             
            
            
            
            $("#alisotvtl").show();
        }
        else if(pb=="USD") { 
            
            $("#aliskurbtn").html('<i class="fa fa-usd"></i>');
            $("#vdaliskurbtn").html('<i class="fa fa-usd"></i>');
            
            
            
            $("#alisotvtl").hide();
            aotvkuryuzde("%");
            
        }
        else if(pb=="EUR") { 
            
            $("#aliskurbtn").html('<i class="fa fa-eur"></i>');
            $("#vdaliskurbtn").html('<i class="fa fa-eur"></i>');
            
            
            
            $("#alisotvtl").hide();
            aotvkuryuzde("%");
            
        }
        else if(pb=="GBP") { 
            
            $("#aliskurbtn").html('<i class="fa fa-gbp"></i>');
            $("#vdaliskurbtn").html('<i class="fa fa-gbp"></i>'); 
            
            $("#alisotvtl").hide();
            aotvkuryuzde("%");
            
        }
        else 
        
        {$("#aliskurbtn").html('<i class="fa fa-try"></i>');
            $("#alisotvtl").hide();
            
        }
        $("#alisfiyatkur").val(pb);
        $("#vdalisfiyatkur").val(pb);
        
        hesaplaalisfiat();
 
    }

    function dv(pb){
        if(pb=="ÖİV") { 

            $("#oiv").hide();
            $("#oilv").show();

        }
        else if(pb=="ALIŞ ÖTV") { 

            $("#aotv").hide();
            $("#aotvdiv").show(); 

        }
        else if(pb=="SATIŞ ÖTV") {

            $("#sotv").hide();
            $("#sotvdiv").show(); 

        }

    }




    function oivsil(){

        $("#oiv").show();
        $("#oilv").hide(); 
        $("#oilval").val("");
        hesaplaalisfiat();
        
    }

    function aotvsil(){

        $("#aotv").show();
        $("#aotvdiv").hide(); 
        $("#aotvval").val("");
        $("#alisotvkurdgr").html('%');
        $("#aotvdurum").val("y");
        
        
        hesaplaalisfiat();
    }
    function sotvsil(){

        $("#sotv").show();
        $("#sotvdiv").hide(); 
        $("#sotvval").val("");
        $("#satisotvkurdgr").html('%');
        $("#sotvdurum").val("y");
        hesaplasatisfiat();
    }                        
    
    function aotvkuryuzde(deger){
        if(deger=="TL"){
            
            $("#alisotvkurdgr").html('<i class="fa fa-try"></i>');
            $("#aotvdurum").val("t");
              
        }
        else if(deger=="%"){
            $("#alisotvkurdgr").html('%');
            $("#aotvdurum").val("y");
              
            
        }
        hesaplaalisfiat();
        
        
    }
    
    function sotvkuryuzde(deger){
        if(deger=="TL"){
            
            $("#satisotvkurdgr").html('<i class="fa fa-try"></i>');
            $("#sotvdurum").val("t");
             
        }
        else if(deger=="%"){
            $("#satisotvkurdgr").html('%');
            $("#sotvdurum").val("y");
             
        }
        
        hesaplasatisfiat();
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
    function gostergizle(id){
        $("#"+id).toggle();
        $("#btn_"+id).toggle();
    }
    $("document").ready(function(){
        
        

   
        
         $("#il").select2({
            placeholder: 'İl Seçiniz',
            allowClear: true
            });
    
    });
    
    
    function stokgoster(deger,id_1){
        
        if(deger){
            $.post( ANASAYFA+"/ajaxislemler/stokgetir", { id: deger })
            .done(function( data ) {
                $("#"+id_1).html(data); 
        
               var myarr = data.split(" : ");
               myarr = myarr[1];
               var ids = id_1.split("_");
               ids = ids[1];
               
               $("#birim_"+ids).val(myarr);
               if(myarr){
                     $("#birim_"+ids).prop( "disabled", true );
                }
                else {
                    $("#birim_"+ids).prop( "disabled", false );
                }
            });
        }
        else {
            $("#"+id_1).html("");
        }
  
    }
    var ix = 0;
    function eklegelsin(){

            ix++;
            
        var regex = /ayhanxcv/gi;    
          var news = copy.replace(regex, ix);
            
        $("table tbody").append(news);
         
         
            $("#pp_"+ix).select2({
                width: '100%',
                placeholder: 'Ürün Seçiniz',
                language: {
                  noResults: function() {
                    return '<button class="btn btn-danger" onclick="yeniekle('+ix+');return false;">Yeni Ekle</a>';
                  },
                },
                escapeMarkup: function(markup) {
                  return markup;
                },
              });
              $("#urunsatirlar").val(ix);
              
               
    }
    
    function yeniekle(a){
        var Selector = '#pp_'+a;
        var searchfield = $(Selector).data("select2").dropdown.$search.val();
         
         
        $.post( ANASAYFA+"/ajaxislemler/urunhizmetekle", { name: searchfield })
        .done(function( data ) {
            if(data){
                $(Selector).html(data);
                $(Selector).select2({
                width: '100%',
                placeholder: 'Ürün Seçiniz',
                language: {
                  noResults: function() {
                    return '<button class="btn btn-danger" onclick="yeniekle('+ix+');return false;">Yeni Ekle</a>';
                  },
                },
                escapeMarkup: function(markup) {
                  return markup;
                },
              });
                
                $("birim_"+a).focus();
            }
            else {
                alert("Bu ürün veya hizmet daha önce eklenmiş");
            }
        
            
            });
    }
    function temizler(){
         
        $("table tbody").html("");
        ix = 0;
       $("#urunsatirlar").val(ix); 
    }
    
    function silstr(id){
        ix--;
       $("#tr_"+id).html(""); 
       $("#urunsatirlar").val(ix);
    }
    
    
    function etiketstart(){
               $("#etiket").select2({
                width: '100%',
                placeholder: 'Etiket Seçiniz',
                language: {
                  noResults: function() {
                    return '<button class="btn btn-danger" onclick="yenietiket(\'etiket\');return false;">Yeni Ekle</a>';
                  },
                },
                escapeMarkup: function(markup) {
                  return markup;
                },
              });
    }
    
    
    function yenietiket(id){
        /*
         * seçiliolanlar varmı varsa onları da değişkende yolla
         * 
         */
        var nelervar = null;
        var Selector = '#'+id;
        
        var searchfield = $('.select2-search input').val();
        
        console.log(searchfield);
        
        if($(Selector).val()){
            var nelervar = $(Selector).val();
            nelervar.forEach(function(element) {
            console.log(element);
          });
        }
      
         
        
        
        
       
        
        
        
        
                 
        $.post( ANASAYFA+"/ajaxislemler/gelirgideretiketekle", { name: searchfield,nelervar:nelervar })
        .done(function( data ) {
            if(data){
                $(Selector).html(data);
                $(Selector).select2({
                width: '100%',
                placeholder: 'Etiket Seçiniz',
                language: {
                  noResults: function() {
                    return '<button class="btn btn-danger" onclick="yenietiket(\'etiket\');return false;">Yeni Ekle</a>';
                  },
                },
                escapeMarkup: function(markup) {
                  return markup;
                },
              });
                
               
            }
            else {
                alert("Bu ürün veya hizmet daha önce eklenmiş");
            }
        
            
            });
    }
    
   
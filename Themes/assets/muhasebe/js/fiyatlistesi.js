   var durumx = 0;
        $( document ).ready(function() {
            
            

              $('.tpi').hide();


   $('[name="toplu_indirim"]').keyup(function()
      {
          if($('[name="indirim_uygulama_turu"]').val()=='S'){
              if ($('[name="toplu_indirimmi"]').is(':checked')) {
                  
                  
                   var c;
                   for(c=1;c <= ix;c++){
                       tplindrm(c);
                   }
                  
                  
              }
             
              
              
          }
          
      });



      $('[name="indirim_uygulama_turu"]').change(function()
      {
        if ($(this).is(':checked')) {

           if($(this).val()=='S'){
               $("#x_kategori").hide();
               $('.tpi').hide();
               $(".scnk").show();

               // seçili ürüne tıklandı 
               $('#urunlist').show(); 

               var kontrol = $("input[name='toplu_indirimmi']:checked").val();

               if(kontrol == '1'){

               $('[name="toplu_indirimmi"]').attr('checked', true).trigger('click');
               
               
               
               
               
               
           }
           }
          else if($(this).val()=='K'){
              // kategori ye tıklandı .....   kategori secenegi görünür.
              $("#x_kategori").show();
              $('#urunlist').hide(); 

              $('.tpi').show();
              $(".scnk").hide();
          }
           else {
              $("#x_kategori").hide();
               // toplu veya kategoriye tıklandı
              $('#urunlist').hide(); 
              $('.tpi').show();
              $(".scnk").hide();
           }
        };
      });
    
    $('[name="toplu_indirimmi"]').change(function()
        {
            
                if ($(this).is(':checked')) {
                    durumx = 1;
                    $('.tpi').show();
                    // indirim alanları sıfıla  
                   var indirimorani = $("input[name='toplu_indirim']").val(); 
                   var c;
                   for(c=1;c <= ix;c++){
                       tplindrm(c);
                   }
                    
                    
                }
                else { 
                    durumx = 2;
                       var c;
                   for(c=1;c <= ix;c++){
                       indirimaktif(c);
                   }
                    
                    $('.tpi').hide();
                }
            });  
    });
  
     var ix = 0;
    function eklegelsin(){
        ix++;   
        
        
        var regex = /ayhanxcv/gi;    
        var news = copy.replace(regex, ix);
        $("table tbody").append(news);
        
        if(durumx==1){
             tplindrm(ix);
        }
        
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
         
        if(durumx == 1){
        $('[name="indirim_'+ix+'"]').prop('disabled', true);    
        }
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
       //ix--;
       $("#tr_"+id).html(""); 
       $("#urunsatirlar").val(ix);
    }
    
    function stokgoster(urunid,name){
        
        var id = name.split("_")[1];
        $.post( ANASAYFA+"/ajaxislemler/fiyatgetir", { uid: urunid })
        .done(function( data ) {
         var sonuc = data.split(":");
                  var fiyat = sonuc[0];
                  console.log(sonuc);
                  
                  var kur = sonuc[1];
                   
                   $("#kur_"+id).removeClass();
                  if(kur=="GBP"){$("#kur_"+id).addClass("fa fa-gbp font-red");}
                  else if(kur=="TL"){$("#kur_"+id).addClass("fa fa-try font-red");}
                  else if(kur=="USD"){$("#kur_"+id).addClass("fa fa-usd font-red");}
                  else if(kur=="EUR"){$("#kur_"+id).addClass("fa fa-eur font-red");}
                  else {kur = "";}
                 
            $('[name="vhsf_'+id+'"]').val(fiyat);         
            yfhspl(id);
        });
           
    }
    function yfhspl(id){
       var yenifiyat ;
        var indirim = $('[name="indirim_'+id+'"]').val();
        var fiyat = $('[name="vhsf_'+id+'"]').val();
        
        fiyat = fiyat.split(",");
        fiyat = fiyat[0];
       
        yenifiyat = fiyat - ((fiyat / 100) * indirim) ;
        
        
       $('#yenifiyat_'+id).val(yenifiyat);
    }
    function indirimaktif(id){
        $('[name="indirim_'+id+'"]').prop('disabled', false);
        $('[name="indirim_'+id+'"]').val(0);
        yfhspl(id);
        $('[name="indirim_'+id+'"]').val("");
    }
    function tplindrm(id){
        var yenifiyat ;
        var indirim = $('[name="toplu_indirim"]').val();
        $('[name="indirim_'+id+'"]').val(indirim);
        var fiyat = $('[name="vhsf_'+id+'"]').val();
        fiyat = fiyat.split(",");
        fiyat = fiyat[0];
        
        yenifiyat = fiyat - ((fiyat / 100) * indirim) ;
        
     $('[name="indirim_'+id+'"]').prop('disabled', true);
       $('#yenifiyat_'+id).val(yenifiyat);
    }
    
    
    $('[name="satisfiyati"]').keyup(function(){
            
            hesaplasatisfiat();
            
        })
    
    
<?php

class ajaxislemler extends controller {

    private $run;
    public $request, $session , $cache;

    function __construct($run) {
        ayhan::language();
        global $sreq;
        
            if (empty($sreq)) {$this->request = array("1"=>"1");
        }
            else {
                $this->request = $sreq;
        }
        
        $this->session = $this->help("session");
            switch (ayhan::functionName()) {
            case "sitemaps":
            case "sitemapk":
            case "sitemapi":
                parent::__construct($run); 
                break;
            default:
                
                    $this->cache = $this->help("cache");
                    $this->cache->dakika = 2;
                    $this->session->set("mobile", $this->isMobileDevice());
                     parent::__construct($run); 
            }
  
      
        
    }
    
    function isMobileDevice(){
        $aMobileUA = array(
            '/iphone/i' => 'iPhone', 
            '/ipod/i' => 'iPod', 
            '/ipad/i' => 'iPad', 
            '/android/i' => 'Android', 
            '/blackberry/i' => 'BlackBerry', 
            '/webos/i' => 'Mobile'
        );

        //Return true if Mobile User Agent is detected
        foreach($aMobileUA as $sMobileKey => $sMobileOS){
            if(preg_match($sMobileKey, $_SERVER['HTTP_USER_AGENT'])){
                return true;
            }
        }
        //Otherwise return false..  
        return false;
    }
    
    function stokgetir(){
        
        $stok = $this->Model("genel/anasayfa")->stokgetir($this->val->id);
        echo "$stok->stok_miktar : $stok->alis_satis_birimi";
    }
    function urunkategoriekletyp(){

          $cls =  $this->Model("kategoriler/kategoriler");
          $data["isim"] = $this->val->name;

           // bu isimde kategori varmı kontrol et ;
          $kontrol = $cls->urunkategorikontrol($this->val->name);

           if(!$kontrol){
              echo  $cls->urunkategoriekle($data); 
           }
           else return FALSE; 
    }
    
    
    
      function secili_ilce_getir(){
        $ilceler = $this->Model("genel/anasayfa")->il_ilce($this->val->il_id); ?>
            <select class="form-control select2me"  name="ilce" id="ilce_select">
               <?php foreach ($ilceler as $value) {?> 
                    <option value="<?php echo $value->id; ?>" <?php if($this->val->ilce_id==$value->id) echo "selected"; ?>><?php echo $value->ilce_adi; ?></option>
                 <?php  } ?>     
            </select>
    <?php
    }  
    
    function ilcegetir(){
        $ilceler = $this->Model("genel/anasayfa")->il_ilce($this->val->il_id); ?>
            <select class="form-control select2me"  name="ilce" id="ilce_select">
               <?php foreach ($ilceler as $value) {?> 
                    <option value="<?php echo $value->id; ?>"><?php echo $value->ilce_adi; ?></option>
                 <?php  } ?>     
            </select>
    <?php
    }
  
    function gelirgideretiketekle(){
        /// işlem yapılacak ... ... 
        
        
        
        if(isset($_POST["nelervar"])){
            
            $olanlar = $_POST["nelervar"];
        }
       
        
       $cls =  $this->Model("genel/anasayfa");
            
        if(!$cls->gelirgideretiketvarmi($this->val->name)){
            $data["ad"] = $this->val->name;
            $id =  $cls->gelirgideretiketekle($data);
            if($id):
              $olanlar[] = $id;  
             
            
                foreach ($cls->etiket() as $value) { ?>
                  <option value="<?php echo $value->id; ?>"<?php if (in_array($value->id , $olanlar)){ echo 'selected'; } ?>><?php echo $value->ad; ?></option>
                  <?php } ?>
         
              <?php endif;  
              
        }
        else {NULL;}
    
    }
    
    
    
    
    function urunhizmetekle(){
        
       $cls =  $this->Model("genel/anasayfa");
            
        if(!$cls->urunhizmetvarmi($this->val->name)){
            $data["ad"] = $this->val->name;
            $id =  $cls->urunhizmetekle($data);
            if($id):
                foreach ($cls->urun_hizmetler_all() as $value) { ?>
                  <option value="<?php echo $value->id; ?>"<?php if($value->id==$id){ echo 'selected'; } ?>><?php echo $value->ad; ?></option>
                  <?php } ?>
              <script>
                     var copy =   '<tr id="tr_ayhanxcv"><td><select class="form-control select2me" onchange="stokgoster(this.value,\'id_ayhanxcv\');" name="urun_ayhanxcv"  id="pp_ayhanxcv"><option value=""> ... </option><?php foreach ($cls->urun_hizmetler_all() as $urunx): ?><option value="<?php echo $urunx->id ?>"> <?php echo $urunx->ad ?></option><?php endforeach; ?></select><span class="help-block" id="id_ayhanxcv"></span></td><td> <input class="form-control" type="text" name="miktar_ayhanxcv" > </td><td> <input class="form-control" type="text" name="birim_ayhanxcv" id="birim_ayhanxcv"> </td><td> <i class="icon-close" style="cursor:pointer" onclick="silstr(ayhanxcv)"></i> </td></tr>';
              </script>
              <?php endif;  
              
        }
        else {NULL;}
            
          
   
    }
    
    function urunkategoriekle(){
        
       $cls =  $this->Model("kategoriler/kategoriler");
       $data["isim"] = $this->val->name;
       $id =  $cls->urunkategoriekle($data);
       
       
        if($id):?>
                 
            <?php foreach ($cls->urunkategoricek() as $value) { ?>
              <option value="<?php echo $value->id; ?>"<?php if($value->id==$id){ echo 'selected'; } ?>><?php echo $value->isim; ?></option>
              <?php
            }
        endif;
       
    }
    function kategoriekle(){
        
       $cls =  $this->Model("kategoriler/kategoriler");
       $data["isim"] = $this->val->name;
       $id =  $cls->musterikategoriekle($data);
       
       
        if($id):
            ?>
                  <option value="0">Kategorisiz</option>
            <?php 
            foreach ($cls->firmakategoricek() as $value) { ?>
              <option value="<?php echo $value->id; ?>"<?php if($value->id==$id){ echo 'selected'; } ?>><?php echo $value->isim; ?></option>
              <?php
            }
        endif;
       
    }
    function hizmeturunsil(){
        echo $this->Model("genel/anasayfa")->hizmeturunsil($this->val->id);
        
    }
    function flsil() {
        echo $this->Model("genel/anasayfa")->flsil($this->val->id);
    }
    
    function musterisayfalama(){
        
        $sayfa = $this->val->sayfa;
        $i = ($this->val->sayfa - 1) * SAYFALAMA_ADET; 
        $veri = $this->Model("musteri/anasayfa")->musteriler($this->val->sayfa);
            foreach($veri->veri as $musteriler):$i++;?>         
                <tr class="gradeX odd sil_<?php echo $musteriler->id; ?>" role="row">
                    <td>
                        <label>

                            <span><?php echo $i; ?></span>
                        </label>
                    </td>
                    <td class="sorting_1"> <a href="<?php SELF::go('musteri/musteri_detay/id/'.$musteriler->id) ?>"><?php echo $musteriler->unvan; ?> </a></td>
                    <td> <?php echo $musteriler->kisa_ad; ?> 

                    </td>
                    <td>
                       <span>  <?php echo $musteriler->telefon ; ?>  </span>
                    </td>
                    <td class="center"> <?php echo $musteriler->eposta; ?> </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> İşlem
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="<?php SELF::go('stok/hizmet_urun_guncelle/id/'.$musteriler->id); ?>">
                                        <i class="icon-docs"></i> Güncelle </a>
                                </li>

                                <li>
                                    <a href="javascript:sil('<?php echo $musteriler->id;?>')">
                                        <i class="icon-ban"></i> Sil </a>
                                </li>

                                <li>
                                    <a href="<?php SELF::go('stok/hizmet_urun_kopya/id/'.$musteriler->id); ?>">
                                        <i class="icon-docs"></i> Kopya Oluştur </a>
                                </li>
                             <!--    <li class="divider"> </li>-->
                                <li>
                                    <a data-toggle="modal" href="#basic" onclick="arsivid('<?php echo $musteriler->id;?>');">
                                       <i class="fa fa-archive"></i> Arşivle 
                                       <!-- <span class="badge badge-success">4</span>-->
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
           <?php 
            endforeach;
    }
    
    function hizmeturunsayfalama(){
        $sayfa = $this->val->sayfa;
        $i = ($this->val->sayfa - 1) * SAYFALAMA_ADET; 
        $veri = $this->Model("genel/anasayfa")->urunler($this->val->sayfa);
            foreach($veri->veri as $urunler): $i++;?>         
       
                     
    <tr class="gradeX odd sil_<?php echo $urunler->id; ?>" role="row">
            <td>
                <label>
                   
                    <span><?php echo $i; ?></span>
                </label>
            </td>
            <td class="sorting_1"> <a href="<?php SELF::go('stok/hizmet_urun_detay/id/'.$urunler->id) ?>"><?php echo $urunler->ad; ?> </a></td>
            <td>
                
                <?php if($urunler->stok_takibi == 1 && ($urunler->stok_miktar <= $urunler->stok_seviyesi)){
                    ?>
                      <span class="label label-sm label-danger">  <?php echo $urunler->stok_miktar." ".$urunler->alis_satis_birimi; ?>  </span>
               <?php } else{ ?>
                    <span class="label label-sm label-success">  <?php echo $urunler->stok_miktar." ".$urunler->alis_satis_birimi; ?>  </span>
               <?php } ?>
            </td>
            <td>
               <span>  <?php echo $urunler->v_h_a_f . $urunler->v_h_a_f_kur; ?>  </span>
            </td>
            <td class="center"> <?php echo $urunler->v_h_s_f . $urunler->v_h_s_f_kur; ?> </td>
            <td>
                <div class="btn-group">
                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> İşlem
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="<?php SELF::go('stok/hizmet_urun_guncelle/id/'.$urunler->id); ?>">
                                <i class="icon-docs"></i> Güncelle </a>
                        </li>
                       
                        <li>
                            <a href="javascript:sil('<?php echo $urunler->id;?>')">
                                <i class="icon-ban"></i> Sil </a>
                        </li>
                       
                        <li>
                            <a href="<?php SELF::go('stok/hizmet_urun_kopya/id/'.$urunler->id); ?>">
                                <i class="icon-docs"></i> Kopya Oluştur </a>
                        </li>
                     <!--    <li class="divider"> </li>-->
                        <li>
                            <a data-toggle="modal" href="#basic" onclick="arsivid('<?php echo $urunler->id;?>');">
                               <i class="fa fa-archive"></i> Arşivle 
                               <!-- <span class="badge badge-success">4</span>-->
                            </a>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
         
                                            
                                            
         
      <?php  
          endforeach;
    }
    
    
    function urunkategoriler(){
      $obj = $this->Model("kategoriler/kategoriler")->urunkategoricek();
      
      foreach ($obj as $val){
          $dizi[] = $val->isim;
      }
      echo json_encode($dizi);
    }
    
    function urunkategoriupdate() {
        $urun_id = $this->val->urun ;
        $kategorisimler  = $this->val->kategori ;
        
        $this->Model("kategoriler/kategoriler")->urunkategoriupdate($urun_id,$kategorisimler);
        
        
    }
    
    function hizmeturunarsiv() { 
      $id = $this->Model("kategoriler/kategoriler")->urunarsivle($this->val->id);
      echo trim($id);
    }
    
    function musterigetir(){
            
        $id = $this->Model("genel/anasayfa")->musterigetir($this->val->keyword);?>
        <ul id="country-list">
            
<li onClick="selectCountry('ssss');">sssss</li>
<li onClick="selectCountry('aaaa');">aaaaa</li>
<li onClick="selectCountry('cccc');">ccccc</li>
 
</ul>
  <?php   }
  
  
   function fiyatgetir() {
        $urun = $this->Model("genel/anasayfa")->urunfiyatgetir($this->val->uid);
        echo $urun->v_h_s_f.":".$urun->v_h_s_f_kur;
        
       
   }
}
    
    ?>
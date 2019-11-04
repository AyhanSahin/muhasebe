<?php

class index_sql extends load
{
    
    public function __construct(){
            parent::__construct();
        }

	 public function logincontrol($kadi,$sifre)
	 {
		$result = $this->db->get_row("SELECT * FROM yonetim WHERE kullanici_adi = '$kadi' AND parola = '$sifre' ");
		
		
		if($result){
			return false;
		}
		else{
			return $result;
		}
	}
	
	public function bayilogincontrol($email,$sifre){
            
            $result = $this->db->get_row("SELECT * FROM bayiler WHERE email_adresiniz = '$email' AND sifre = '$sifre' ");
            
		 
		
		 if($result){
			 return $result;
		 }
		 else{
			 return false;
		 }
		
	}
	
	function genelayarlari_cek(){
            
            $result = $this->db->get_row("SELECT * FROM genel_ayarlar ");
            return $result;
	}
	
	function epostaayarlari_cek(){
            $result = $this->db->get_row("SELECT * FROM eposta_ayarlari ");
            return $result;
	}
	
	function seoayarlari_cek(){
            $result = $this->db->get_row("SELECT * FROM seo_ayarlari ");
            return $result;
	}
	
	function sosyalmedyaayarlari_cek(){
            $result = $this->db->get_row("SELECT * FROM sosyalmedya_ayarlari ");            
            return $result;
	}
	
	function googleayarlari_cek(){
            $result = $this->db->get_row("SELECT * FROM google_ayarlari ");
            return $result;
	}
	
	function siparisler_cek(){
            $result = $this->db->get_row("SELECT * FROM siparisler ");
            return $result;
	}
	
	
	function destektalepleri_cek(){
            $result = $this->db->get_results("SELECT * FROM destek_talepleri ");
            return $result;
	}
	
	function ustmenuayarlari_cek(){
            
            $result = $this->db->get_results("SELECT * FROM ustmenu_ayarlari ");
            return $result;
	}
	
	function altmenuayarlari_cek(){
            $result = $this->db->get_results("SELECT * FROM altmenu_ayarlari ");
            return $result;
	}
	
	function tumsayfalar(){
            $result = $this->db->get_results("SELECT * FROM tum_sayfalar ORDER BY id DESC ");
            return $result;
	}
	
	
	
	function yorumlar_cek(){
            $result = $this->db->get_results("SELECT * FROM yorumlar ");
            return $result;
	}
	
	function kullanicilar_cek(){
            $result = $this->db->get_results("SELECT * FROM bayiler ");
            return $result;           

	}
	
	function kullanici_id($id){
            
		$result = $this->db->select("*")
		->from("bayiler")
		->where("id",$id)
		->get()
		->result();
		return $result;
	}
	
	function tumaboneler(){
		$result = $this->db->select("*")
		->from("aboneler")
		->get()
		->result();
		return $result;
	}
	
	function temalar(){
		$result = $this->db->select("*")
		->from("temalar")
		->get()
		->result();
		return $result;
	}

	
	function idtema($link1){
		$result = $this->db->select("*")
		->from("temalar")
		->where("seflink",$link1)
		->get()
		->result();
		return $result;
	}
	
	function kategoriler(){
		$result = $this->db->select("*")
		->from("kategoriler")
		->get()
		->result();
		return $result;
	}
	
	function genel_ayarlar_guncelle($data,$id){
		$result = $this->db->update("genel_ayarlar",$data,array("id" => $id ));
		return $result;
	}
	
	function eposta_ayarlari_guncelle($data,$id){
		$result = $this->db->update("eposta_ayarlari",$data,array("id" => $id));
		return $result;
	}
	
	function seo_ayarlari_guncelle($data,$id){
		$result = $this->db->update("seo_ayarlari",$data,array("id" => $id));
		return $result;
	}
	
	function profilayarupdate($data,$id){
		
		$result = $this->db->update("bayiler",$data,array("$id" => $id));
		return $result;
	}
	
	function sosyal_medya_ayarlari_guncelle($data,$id){
		$result = $this->db->update("sosyalmedya_ayarlari",$data,array("$id" => $id ));
		return $result;
	}
	
	function google_ayarlari_guncelle($data,$id){
		$result = $this->db->update("google_ayarlari",$data,array("$id" => $id));
		return $result;
	}
	
	function bayionaylama($data,$id){
		$result = $this->db->update("bayiler",$data,array("$id" => $id));
		return $result;
	}
	
	function siparisbilgi($id){
		$result = $this->db->select("*")
		->from("siparisler")
		->where("id",$id)
		->get()
		->row();
		
		if(count($result) != 1){
			return false;
		}
		else{
			return $result;
		}
		
		}
		
	function destektalepbilgi($id){
		$result = $this->db->select("*")
		->from("destek_talepleri")
		->where("id",$id)
		->get()
		->row();
		
		if($result){
			return $result;
		}
		
	}
	
	function ustmenuayarlariduzenle($id){
		$result = $this->db->select("*")
		->from("ustmenu_ayarlari")
		->where("id",$id)
		->get()
		->row();
		
		if($result){
			return $result;
		}
	}
	
	
	function altmenuayarlariduzenle($id){
		$result = $this->db->select("*")
		->from("altmenu_ayarlari")
		->where("id",$id)
		->get()
		->row();
		
		if($result){
		   return $result;
		}
	}
	
	function sayfaduzenle($id){
		$result = $this->db->select("*")
		->from("tum_sayfalar")
		->where("id",$id)
		->get()
		->row();
		
		if($result){
			return $result;
		}
	}
	
	function kullaniciduzenle($id){
		$result = $this->db->select("*")
		->from("kullanicilar")
		->where("id",$id)
		->get()
		->row();
		
		if($result){
			return $result;
		}
	}
	
	function aboneduzenle($id){
		$result = $this->db->select("*")
		->from("aboneler")
		->where("id",$id)
		->get()
		->row();
		
		if($result){
			return $result;
		}
		
	}
	
	
	function temaduzenle($id){
		$result = $this->db->select("*")
		->from("temalar")
		->where("id",$id)
		->get()
		->row();
		
		if($result){
			return $result;
		}
	}
	
	
	function kategoriduzenle($id){
		$result = $this->db->select("*")
		->from("kategoriler")
		->where("id",$id)
		->get()
		->row();
		
		if($result){
			return $result;
		}
		
	}
	
	
	function ustmenuekle($data = array()){
		$result = $this->db->insert("ustmenu_ayarlari",$data);
		return $result;
	}
	
	function menusil($id){
		$result = $this->db->delete("ustmenu_ayarlari",array("id" => $id));
		return $result;
	}
	
	function ustmenuyaz($link){
	
		$result = $this->db->select("*")
		->from("ustmenu_ayarlari")
		->where("seflink",$link)
		->get()
		->result();
		
		if($result){
			return $result;
		}
	}
	
	function temaekle($data = array()){
		$result = $this->db->insert("temalar",$data);
		return $result;
	}
	
	function temasil($id){
		$result = $this->db->delete("temalar",array("id" => $id));
		return $result;
	}
	
	function kategoriekle($data = array()){
		$result = $this->db->insert("kategoriler",$data);
		return $result;
	}
	
	function kategorisil($id){
		$result = $this->db->delete("kategoriler",array("id" => $id));
		return $result;
	}
	
	function rastgele($yolla){
		$result = $this->db->select("*")
		->from("temalar")
		->limit(3)
		->where("tema_kategorisi",$yolla)
		->get()
		->result();
		
		return $result;
	}
	
	function groupkategori(){
		$result = $this->db->select("*")
		->group_by("tema_sef","DESC") 
		->from("temalar")
		->get()
		->result();
		return $result;
	}
	
	function ilker(){
		$result = $this->db->select("*")
		->order_by("kategori_adi","DESC")
		->group_by("kategori_adi")
		->from("kategoriler")
		->get()
		->result();
		return $result;
	}
	
	
	public function toplam_kayit(){
		return $this->db->count_all_results("temalar"); // Veriler adlı tablodaki kayıt sayısını döndür
	}

	public function listele($limit, $start)   
	{
		$this->db->limit($limit, $start); // Metoda gelen parametreler ile limit değerlerini gir ve sayfalamaya göre veri getir
		$veriler = $this->db->get("temalar"); // Veriler tablosunu çek
		return $veriler->result(); 
		
	}
	
	
	public function yenieklenentemalar(){
		$result = $this->db->select("*")
		->limit(10)
		->from("temalar")
		->order_by('id', 'DESC')
		->get()
		->result();
		return $result;
		
	}
	
	
	public function toplamktsayisi($kat){
		
		$query = $this->db->query('SELECT * FROM temalar WHERE tema_sef="'.$kat.'" ');
         return $query->num_rows();
	}
	
	
	
	public function kategorisecim($limit, $start,$kat){
		$query = $this->db->get_where('temalar', array('tema_sef' => $kat),$limit,$start );
		return $query->result();
	}
	
	public function randomString($length = 6) {
	$str = "";
	$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}
	return $str;
}


public function bayiinsert($data = array()){
	$result = $this->db->insert("bayiler",$data);
	return $result;
}

public function bayisil($id){
	$result = $this->db->delete("bayiler",array("id" => $id));
	return $result;
}

public function yazilarigetir($id){
	$result = $this->db->select("*")
	->where("seflink",$id)
	->from("tum_sayfalar")
	->get()
	->row();
	return $result;
}

public function sayfasil($id){
	$result = $this->db->delete("tum_sayfalar",array("id" => $id));
	return $result;
}

public function yenisayfaekle($data){
	$result = $this->db->insert("tum_sayfalar",$data);
	return $result;
}

public function search($limit,$start,$kelime){

$result = $this->db->select("*")
->like('tema_adi',$kelime)
->or_like('tema_kategorisi', $kelime)
->from("temalar")
->get()
->result();

return $result;
	   
}

public function tpt($kelime){
	$query = $this->db->query('SELECT * FROM temalar WHERE tema_adi LIKE "'.$kelime.'%" '); 
       return $query->num_rows();  
}

public function siparisekle($data = array()){
   $result = $this->db->insert("siparisler",$data);
   return $result;
   
   
   
}

public function siparislast(){
	$result = $this->db->select("id")
	->select_max("id")
	->from("siparisler")
	->get()
	->result();
	return $result;
}

public function sipariscek($can){
	$result = $this->db->select("*")
	->where("id",$can)
	->from("siparisler")
	->get()
	->result();
	return $result;
}

public function siparisupdate($sonuc1,$can){
	
	$result = $this->db->update("siparisler",$sonuc1,array("id" => $can));
	return $result;
}

public function temasiparisecek($sectigim){
	$result = $this->db->select("tema_yolu")
	->where("id",$sectigim)
	->from("temalar")
	->get()
	->result();
	return $result;
	
}

	
}



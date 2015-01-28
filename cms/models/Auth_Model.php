<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Auth_model extends CI_Model{
    
	function __construct(){
	    parent::__construct();
	}
	
	/* |-"getKullanicilar" fonksiyonu için açıklama.-|
	View/Auth.php'den post edilen kullaniciadi ve sifre $data
	ile gönderilerek fonksiyon çekildiğinde, veritabanındaki kullanicilar
	tablosundan where ile filtrelenmiş değeri çeker ve kaç adet veri
	bulunduğunun sayısını gönderir.
	*/
	function getKullanicilar($data){
	    return $this->db->select("*")
		->from("kullanicilar")
		->where('kullaniciadi', $data["kullaniciadi"])
		->where ("sifre", $data["sifre"])
		->get()
		->num_rows();
	}
	
	/* |-"getKullanicilar" fonksiyonu için açıklama.-|
	View/Auth.php'den post edilen kullaniciadi ve sifre $data
	ile gönderilerek fonksiyon çekildiğinde, veritabanındaki kullanicilar
	tablosundan where ile filtrelenmiş değeri çeker ve geri döndürür.
	*/
	function getKullanici($data){
	    return $this->db->select("*")
		->from("kullanicilar")
		->where('kullaniciadi', $data["kullaniciadi"])
		->where ("sifre", $data["sifre"])
		->get()
		->result_array();
	}
	
}
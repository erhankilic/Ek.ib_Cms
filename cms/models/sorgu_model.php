<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Sorgu_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /* |- bilgileriGetir Fonksiyonunun Açıklaması -|
      $islem ile gönderilen veritabanındaki
      kayıtlı bilgileri çekilip return edilir.
     */

    public function bilgileriGetir($islem) {
        $this->db->select("*");
        if ($islem == "blog") {
            $this->db->join("kategoriler", "kategoriler_id=kategori_id");
        }
        $this->db->from($islem);
        if ($islem == "menu") {
            $this->db->order_by("menu_sira", "asc");
        }
        if ($islem == "sayfalar") {
            $this->db->join("menu", "menu_id=menu_");
            $this->db->join("sira", "sayfa=sayfalar_id");
        }
        $sorgu = $this->db->get();
        return $sorgu->result_array();
    }

    /* |- bilgiyiGetir Fonksiyonunun Açıklaması -|
      $id ile gönderilen değer ile where sorgusu kurularak
      $islem ile gönderilen veritabanından
      bilgi çekilip geri döndürülür.
     */

    public function bilgiyiGetir($islem, $id) {
        $kolon = $islem . "_id";
        if ($islem == "sira") {
            $kolon = "sayfa";
        }
        $this->db->select("*");
        $this->db->where($kolon, $id);
        $this->db->from($islem);
        if ($islem == "sayfalar") {
            $this->db->join("menu", "menu_id=menu_");
            $this->db->join("sira", "sayfa=sayfalar_id");
        }
        $sorgu = $this->db->get();
        return $sorgu->result_array();
    }

    /* |- bilgiyiGuncelle Fonksiyonunun Açıklaması -|
      $islem ile veritabanı seçimi yapılır.
      $id ile gönderilen değer ile where sorgusu oluşturulur.
      $data değeri ile update sorgusu gönderilir.
     */

    public function bilgiyiGuncelle($islem, $data, $id) {
        $kolon = $islem . "_id";
        $this->db->where($kolon, $id);
        $this->db->update($islem, $data);
    }

    /* |- bilgiSil Fonksiyonunun Açıklaması -|
      $id değeri ile where sorgusu kurulup $islem ile
      seçilen veritabanına delete sorgusu gönderilir.
     */

    public function bilgiSil($islem, $id) {
        $kolon = $islem . "_id";
        $this->db->where($kolon, $id);
        $this->db->delete($islem);
    }

    /* |- bilgiEkle Fonksiyonunun Açıklaması -|
      $data ile gönderilen değerler ile $islem ile seçilen
      veritabanın insert sorgusu gönderilir.
     */

    public function bilgiEkle($islem, $data) {
        $this->db->insert($islem, $data);
    }

    /* |- yazikategoriGetir Fonksiyonunun Açıklaması -|
      $id ile gönderilen değerle where sorgusu kurulup
      istenilen kategoride kaç tane yazı var return edilir.
     */

    public function yazikategoriGetir($id) {
        return $this->db->select("*")
                        ->from("blog")
                        ->where("kategori_id", $id)
                        ->get()
                        ->num_rows();
    }

    /* |- bilgilerinmiktariniGetir fonksiyonunun Açıklaması -|
     * $islem ile belirtilen tablonun içerisinde bulunan
     * kayıt sayısını geri döndürür.
     */

    public function bilgilerinmiktariniGetir($islem) {
        return $this->db->select("*")
                        ->from($islem)
                        ->get()
                        ->num_rows();
    }

    /* |- bilgininmiktariniGetir fonksiyonunun Açıklaması -|
     * $islem ile belirtilen tablonun içerisinde $id ile 
     * belirtilen koşuldaki kayıtların sayısını geri döndürür.
     */

    public function bilgininmiktariniGetir($islem, $id) {
        $kolon = $islem . "_id";
        return $this->db->select("*")
                        ->where($kolon, $id)
                        ->from($islem)
                        ->get()
                        ->num_rows();
    }

    /* |- yazimiktariniGetir fonksiyonunun Açıklaması -|
     * $islem ile belirtilen tablonun içerisinde bulunan
     * 30 gün içerisindeki yazı sayısını geri döndürür.
     */

    public function yazimiktariniGetir($islem) {
        return $this->db->select("*")
                        ->from($islem)
                        ->where('blog_tarih <=', date('Y-m-d'))
                        ->where('blog_tarih >=', date('Y-m-d', strtotime('-30 day')))
                        ->get()
                        ->num_rows();
    }

    /* |- menumiktariniGetir fonksiyonunun Açıklaması -|
     * menu tablosundan $id ile gönderilen değerin
     * menu_sira'sinda eşleşen kayıtların miktarını döndürür.
     */

    public function menumiktariniGetir($id) {
        return $this->db->select("*")
                        ->from("menu")
                        ->where('menu_sira', $id)
                        ->get()
                        ->num_rows();
    }

    /* |- sayfayiGetir Fonksiyonunun Açıklaması -|
     * $arama ile gönderilen değer ile where sorgusu kurularak
     * sayfalar tablosundaki sayfa_icerik kolonu ile eşleşen
     * kayıdı döndürür.
     */

    public function sayfayiGetir($arama) {
        $this->db->select("*");
        $this->db->where("sayfa_icerik", $arama);
        $this->db->from("sayfalar");
        $sorgu = $this->db->get();
        return $sorgu->result_array();
    }

    /* |- sayfaktariniGetir fonksiyonunun Açıklaması -|
     * sira tablosunda $id ile sira_no ve $menu ile menu kolonunda
     * eşleşen kayıtların miktarını döndürür.
     */

    public function sayfamiktariniGetir($id, $menu) {
        return $this->db->select("*")
                        ->from("sira")
                        ->where('sira_no', $id)
                        ->where("menu", $menu)
                        ->get()
                        ->num_rows();
    }
    
    /* |- sirayiGetir Fonksiyonunun Açıklaması -|
      $id ile gönderilen değer ile where sorgusu kurularak
      sira veritabanından
      bilgi çekilip geri döndürülür.
     */

    public function sirayiGetir($id) {
        $this->db->select("*");
        $this->db->from("sira");
        $this->db->where("sayfa", $id);
        $sorgu = $this->db->get();
        return $sorgu->result_array();
    }

}

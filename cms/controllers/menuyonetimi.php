<?php

/*
 * *Author: Erhan Kılıç
 * *Web Site: http://www.ideayazilim.net
 * *E-Mail: info@ideayazilim.net
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menuyonetimi extends MY_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata("login") != 1) {
            redirect("blog");
        }
        $this->load->model("Sorgu_model");
        $this->load->view("header");
    }

    /* |- index Fonksiyonunun Açıklaması -|
      Sorgu_model'den çağrılan sorgu ile site bilgileri çekilir.
      view/kullanicilar.php görüntüsüne veriler gönderilir.
     */

    public function index() {
        $sonuc = $this->Sorgu_model->bilgileriGetir("menu");
        $menuler ["menuler"] = $sonuc;
        $this->load->view("menuler", $menuler);
    }

    /* |- menuGuncelle Fonksiyonunun Açıklaması -|
      view/menuler.php görüntüsünden gelen post olup olmadığını
      kontrol eder. Eğer yoksa menu bilgileri modelden çekilerek
      görüntü dosyasına $enuler ile gönderilir.
      Gelen postlar data arrayine aktarılır.
      Hata sorgulamaları yapılır. Eğer $hata boşsa data ve gelen id değeri
      modele gönderilir. $Hata dolu ise hata kodları görüntüye yollanılır.
     */

    public function menuGuncelle($id) {
        if ($this->input->post() == true) {
            $hata = "";
            $data["menu_sira"] = $this->input->post("menusira");
            if (empty($data["menu_sira"])) {
                $hata["hatamenusira"] = "Sıra boş bırakılamaz!!";
            }
            if (!is_numeric($data["menu_sira"])) {
                $hata["hatamenusira"] = "Sıra Numara Olmalıdır!!";
            }
            $sira = $data["menu_sira"];
            $miktar = $this->Sorgu_model->menumiktariniGetir($sira);
            if (!$miktar == 0) {
                $hata["hatamenusira"] = "Aynı Sıra Numarası Mevcut!!";
            }
            if (empty($hata)) {
                $this->Sorgu_model->bilgiyiGuncelle("menu", $data, $id);
                $sonuc = $this->Sorgu_model->bilgileriGetir("menu");
                $data2 ["menuler"] = $sonuc;
                $data2["basari"] = "";
                $this->load->view("menuler", $data2);
            } else {
                $sonuc = $this->Sorgu_model->bilgileriGetir("menu");
                $hata ["menuler"] = $sonuc;
                $this->load->view("menuler", $hata);
            }
        } else {
            $sonuc = $this->Sorgu_model->bilgiyiGetir("menu");
            $menuler ["menuler"] = $sonuc;
            $this->load->view("menuler", $menuler);
        }
    }

    /* |-menuEkle Fonksiyonunun Açıklaması -|
      Post edilen değer olup olmadığını kontrol eder. Eğer yoksa
      kullaniciekle görüntüsü çağrılır. Post edilen değer varsa
      $data arrayine eklenir. Hata sorgulaması yapılır.
      $hata boş ise $data bilgiEkle modeline gönderilip
      kullanicilar görüntüsüne gönderilir.
      $hata dolu ise hata kodu ile menuler görüntüsüne
      gönderilir.
     */

    public function menuEkle() {
        if ($this->input->post() == true) {
            $hata = "";
            $data["menu_ad"] = $this->input->post("menuad");
            $data["menu_sira"] = $this->input->post("menusira");
            if (empty($data["menu_ad"])) {
                $hata["hatamenuad"] = "Menu Adı Boş Bırakılamaz!!";
            }
            if (empty($data["menu_sira"])) {
                $hata["hatamenusira"] = "Sıra boş bırakılamaz!!";
            }
            if (!is_numeric($data["menu_sira"])) {
                $hata["hatamenusira"] = "Sıra Numara Olmalıdır!!";
            }
            if (empty($hata)) {
                $this->Sorgu_model->bilgiEkle("menu", $data);
                $sonuc = $this->Sorgu_model->bilgileriGetir("menu");
                $data2 ["menuler"] = $sonuc;
                $data2["basari"] = "";
                $this->load->view("menuler", $data2);
            } else {
                $this->Sorgu_model->bilgEkle("menu", $data);
                $sonuc = $this->Sorgu_model->bilgileriGetir("menu");
                $hata["menuler"] = $sonuc;
                $this->load->view("menuler", $hata);
            }
        } else {
            $this->load->view("menuler");
        }
    }

    /* |- menuSil Fonksiyonunun Açıklaması -|
      $id ile gönderilen değeri bilgiSil modeline gönderir.
      Daha sonra silindi kodu ile menuler gönrüntüsü çağırılır.
     */

    public function menuSil($id) {
        $this->Sorgu_model->bilgiSil("menu", $id);
        $sonuc = $this->Sorgu_model->bilgileriGetir("menu");
        $data2 ["menuler"] = $sonuc;
        $data2["silindi"] = "";
        $this->load->view("menuler", $data2);
    }

}

/* End of file menuyonetimi.php */
/* Location: ./cms/controllers/menuyonetimi.php */
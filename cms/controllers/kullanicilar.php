<?php

/*
 * *Author: Erhan Kılıç
 * *Web Site: http://www.ideayazilim.net
 * *E-Mail: info@ideayazilim.net
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kullanicilar extends MY_Controller {

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
        $sonuc = $this->Sorgu_model->bilgileriGetir("kullanicilar");
        $kullanicibilgileri ["kullanicibilgileri"] = $sonuc;
        $this->load->view("kullanicilar", $kullanicibilgileri);
    }

    /* |- kullaniciGuncelle Fonksiyonunun Açıklaması -|
      view/kullanicilar.php görüntüsünden gelen post olup olmadığını
      kontrol eder. Eğer yoksa kullanıcı bilgileri modelden çekilerek
      görüntü dosyasına $kullanicibilgileri ile gönderilir.
      Gelen postlar data arrayine aktarılır.
      Hata sorgulamaları yapılır. Eğer $hata boşsa data ve gelen id değeri
      modele gönderilir. $Hata dolu ise hata kodları görüntüye yollanılır.
     */

    public function kullaniciGuncelle($id) {
        if ($this->input->post() == true) {
            $hata = "";
            $data["ad"] = $this->input->post("Ad");
            $data["soyad"] = $this->input->post("Soyad");
            $data["e_mail"] = $this->input->post("e_mail");
            $data["kullaniciadi"] = $this->input->post("kullaniciAd");
            $data["sifre"] = $this->input->post("sifre");
            $data["yetki"] = $this->input->post("yetki");
            if (empty($data["kullaniciadi"])) {
                $hata["hatakullaniciadi"] = "Kullanıcı Adı boş bırakılamaz!!";
            }
            if (empty($data["sifre"])) {
                $hata["hatasifre"] = "Şifre boş bırakılamaz!!";
            }
            if (empty($hata)) {
                $this->Sorgu_model->bilgiyiGuncelle("kullanicilar", $data, $id);
                $sonuc = $this->Sorgu_model->bilgileriGetir("kullanicilar");
                $data2 ["kullanicibilgileri"] = $sonuc;
                $data2["basari"] = "";
                $this->load->view("kullanicilar", $data2);
            } else {
                $sonuc = $this->Sorgu_model->bilgiyiGetir("kullanicilar", $id);
                $hata ["kullanicibilgileri"] = $sonuc[0];
                $this->load->view("kullaniciekle", $hata);
            }
        } else {
            $sonuc = $this->Sorgu_model->bilgiyiGetir("kullanicilar", $id);
            $kullanicibilgileri ["kullanicibilgileri"] = $sonuc[0];
            $this->load->view("kullaniciekle", $kullanicibilgileri);
        }
    }

    /* |-kullaniciEkle Fonksiyonunun Açıklaması -|
      Post edilen değer olup olmadığını kontrol eder. Eğer yoksa
      kullaniciekle görüntüsü çağrılır. Post edilen değer varsa
      $data arrayine eklenir. Hata sorgulaması yapılır.
      $hata boş ise $data kullaniciEkle modeline gönderilip
      kullanicilar görüntüsüne gönderilir.
      $hata dolu ise hata kodu ile kullaniciekle görüntüsüne
      gönderilir.
     */

    public function kullaniciEkle() {
        if ($this->input->post() == true) {
            $hata = "";
            $data["ad"] = $this->input->post("Ad");
            $data["soyad"] = $this->input->post("Soyad");
            $data["e_mail"] = $this->input->post("e_mail");
            $data["kullaniciadi"] = $this->input->post("kullaniciAd");
            $data["sifre"] = $this->input->post("sifre");
            $data["yetki"] = $this->input->post("yetki");
            if (empty($data["kullaniciadi"])) {
                $hata["hatakullaniciadi"] = "Kullanıcı Adı boş bırakılamaz!!";
            }
            if (empty($data["sifre"])) {
                $hata["hatasifre"] = "Şifre boş bırakılamaz!!";
            }
            if (empty($hata)) {
                $this->Sorgu_model->bilgiEkle("kullanicilar", $data);
                $sonuc = $this->Sorgu_model->bilgileriGetir("kullanicilar");
                $data2 ["kullanicibilgileri"] = $sonuc;
                $data2["basari"] = "";
                $this->load->view("kullanicilar", $data2);
            } else {
                $hata["kullanicibilgileri"] = $data;
                $this->load->view("kullaniciekle", $hata);
            }
        } else {
            $this->load->view("kullaniciekle");
        }
    }

    /* |- kullaniciSil Fonksiyonunun Açıklaması -|
      $id ile gönderilen değeri kullaniciSil modeline gönderir.
      Daha sonra silindi kodu ile kullanicilar gönrüntüsü çağırılır.
     */

    public function kullaniciSil($id) {
        $this->Sorgu_model->bilgiSil("kullanicilar", $id);
        $sonuc = $this->Sorgu_model->bilgileriGetir("kullanicilar");
        $data2 ["kullanicibilgileri"] = $sonuc;
        $data2["silindi"] = "";
        $this->load->view("kullanicilar", $data2);
    }

}

/* End of file kullanicilar.php */
/* Location: ./cms/controllers/kullanicilar.php */
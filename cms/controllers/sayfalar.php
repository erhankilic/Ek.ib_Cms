<?php

/*
 * *Author: Erhan Kılıç
 * *Web Site: http://www.ideayazilim.net
 * *E-Mail: info@ideayazilim.net
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sayfalar extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata("login") != 1) {
            redirect("blog");
        }
        $this->load->model("Sorgu_model");
        $this->load->view("header");
    }

    /* |- index Fonksiyonunun Açıklaması -|
      Sorgu_model'den çağrılan sorgu ile yazılar çekilir.
      view/sayfalar.php görüntüsüne veriler gönderilir.
     */

    public function index() {
        $sonuc = $this->Sorgu_model->bilgileriGetir("sayfalar");
        $sayfalar ["sayfalar"] = $sonuc;
        $this->load->view("sayfalar", $sayfalar);
    }

    /* |- sayfaEkle Fonksiyonunun Açıklaması -|
      Post edilen değer olup olmadığını kontrol eder. Eğer yoksa
      sayfaekle görüntüsü çağrılır. Post edilen değer varsa
      $data arrayine eklenir. Hata sorgulaması yapılır.
      $hata boş ise $data sayfaEkle modeline gönderilip
      sayfalar görüntüsüne gönderilir.
      $hata dolu ise hata kodu ile sayfaekle görüntüsüne
      gönderilir.
     */

    public function sayfaEkle() {
        if ($this->input->post() == true) {
            $hata = "";
            $data["sayfa_baslik"] = $this->input->post("baslik");
            $data["sayfa_icerik"] = $this->input->post("icerik");
            $data["sayfa_anahtarkelimeler"] = $this->input->post("keyword");
            $data["sayfa_aciklama"] = $this->input->post("description");
            $data["menu_"] = $this->input->post("menu");
            $sira["sira_no"] = $this->input->post("menusira");
            $sira["menu"] = $this->input->post("menu");
            if (empty($data["sayfa_baslik"])) {
                $hata["hatabaslik"] = "Başlık boş bırakılamaz!!";
            }
            if (empty($data["sayfa_icerik"])) {
                $hata["hataicerik"] = "İçerik boş bırakılamaz!!";
            }
            if (empty($sira["sira_no"]) and is_numeric($sira["sira_no"])) {
                $hata["hatasirano"] = "Sayfa Sırası boş bırakılmış ya da sayı olarak yazılmamış!";
            }
            $miktar = $this->Sorgu_model->sayfamiktariniGetir($sira["sira_no"]);
            if ($miktar != 0) {
                $hata["hatasirano"] = "Aynı sıraya sahip başka bir sayfa var!";
            }
            if (empty($hata)) {
                $this->Sorgu_model->bilgiEkle("sayfalar", $data);
                $sayfa = $this->Sorgu_model->sayfayiGetir($data["sayfa_icerik"]);
                $sira["sayfa"] = $sayfa[0]["sayfalar_id"];
                $this->Sorgu_model->bilgiEkle("sira", $sira);
                $sonuc = $this->Sorgu_model->bilgileriGetir("sayfalar");
                $data2 ["sayfalar"] = $sonuc;
                $data2["basari"] = "";
                $this->load->view("sayfalar", $data2);
            } else {
                $hata["sayfalar"] = $data;
                $sonuc = $this->Sorgu_model->bilgileriGetir("menu");
                $hata["menuler"] = $sonuc;
                $this->load->view("sayfaekle", $hata);
            }
        } else {
            $sonuc = $this->Sorgu_model->bilgileriGetir("menu");
            $data["menuler"] = $sonuc;
            $this->load->view("sayfaekle", $data);
        }
    }

    /* |- sayfaGuncelle Fonksiyonunun Açıklaması -|
      Post edilen değer olup olmadığını kontrol eder. Eğer yoksa
      sayfaekle görüntüsü çağrılır. Post edilen değer varsa
      $data arrayine eklenir. Hata sorgulaması yapılır.
      $hata boş ise $data sayfaGuncelle modeline gönderilip
      sayfalar görüntüsüne gönderilir.
      $hata dolu ise hata kodu ile sayfaekle görüntüsüne
      gönderilir.
     */

    public function sayfaGuncelle($id) {
        if ($this->input->post() == true) {
            $sonuc2 = $this->Sorgu_model->bilgiyiGetir("sayfalar", $id);
            $hata = "";
            $data["sayfa_baslik"] = $this->input->post("baslik");
            $data["sayfa_icerik"] = $this->input->post("icerik");
            $data["sayfa_anahtarkelimeler"] = $this->input->post("keyword");
            $data["sayfa_aciklama"] = $this->input->post("description");
            $data["menu_"] = $this->input->post("menu");
            $sira["menu"] = $this->input->post("menu");
            $sira["sira_no"] = $this->input->post("menusira");
            if (empty($data["sayfa_baslik"])) {
                $hata["hatabaslik"] = "Başlık boş bırakılamaz!!";
            }
            if (empty($data["sayfa_icerik"])) {
                $hata["hataicerik"] = "İçerik boş bırakılamaz!!";
            }
            if (empty($sira["sira_no"]) and is_numeric($sira["sira_no"])) {
                $hata["hatasirano"] = "Sayfa Sırası boş bırakılmış ya da sayı olarak yazılmamış!";
            }
            if ($sonuc2[0]["sira_no"] != $sira["sira_no"]) {
                $miktar = $this->Sorgu_model->sayfamiktariniGetir($sira["sira_no"], $sira["menu"]);
                if ($miktar != 0) {
                    $hata["hatasirano"] = "Aynı sıraya sahip başka bir sayfa var!";
                }
            }
            if (empty($hata)) {
                $this->Sorgu_model->bilgiyiGuncelle("sayfalar", $data, $id);
                $siraid = $this->Sorgu_model->bilgiyiGetir("sira", $id);
                $this->Sorgu_model->bilgiyiGuncelle("sira", $sira, $siraid[0]["sira_id"]);
                $sonuc = $this->Sorgu_model->bilgileriGetir("sayfalar");
                $data2 ["sayfalar"] = $sonuc;
                $data2["basari"] = "";
                $this->load->view("sayfalar", $data2);
            } else {
                $data["sayfalar_id"] = $id;
                $data["sira_no"] = $this->input->post("menusira");
                $hata["sayfalar"] = $data;
                $sonuc = $this->Sorgu_model->bilgileriGetir("menu");
                $hata["menuler"] = $sonuc;
                $this->load->view("sayfaekle", $hata);
            }
        } else {
            $sonuc = $this->Sorgu_model->bilgileriGetir("menu");
            $sonuc2 = $this->Sorgu_model->bilgiyiGetir("sayfalar", $id);
            $data["menuler"] = $sonuc;
            $data["sayfalar"] = $sonuc2[0];
            $this->load->view("sayfaekle", $data);
        }
    }

    /* |- sayfaSil Fonksiyonunun Açıklaması -|
     * $id ile sıra tablosundan bilgi çekilir.
     * $id ile gönderilen değeri ve alınan sira_id bilgiSil modeline gönderir.
     * Daha sonra silindi kodu ile kullanicilar görüntüsü çağırılır.
     */

    public function sayfaSil($id) {
        $sonuc2 = $this->Sorgu_model->sirayiGetir($id);
        $this->Sorgu_model->bilgiSil("sira", $sonuc2[0]["sira_id"]);
        $this->Sorgu_model->bilgiSil("sayfalar", $id);
        $sonuc = $this->Sorgu_model->bilgileriGetir("sayfalar");
        $sayfalar ["sayfalar"] = $sonuc;
        $this->load->view("sayfalar", $sayfalar);
    }

}

/* End of file sayfalar.php */
/* Location: ./cms/controllers/sayfalar.php */
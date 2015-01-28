<?php

/*
 * *Author: Erhan Kılıç
 * *Web Site: http://www.ideayazilim.net
 * *E-Mail: info@ideayazilim.net
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kutuphane extends MY_Controller {

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
      view/galeri.php görüntüsüne veriler gönderilir.
     */

    public function index() {
        $sonuc = $this->Sorgu_model->bilgileriGetir("kutuphane");
        $resimler ["resimler"] = $sonuc;
        $this->load->view("kutuphane", $resimler);
    }

    /* |- resimEkle Fonksiyonunun Açıklaması -|
      Post edilen değer olup olmadığını kontrol eder. Eğer yoksa
      galeri görüntüsü çağrılır. Post edilen değer varsa
      $data arrayine eklenir. Hata sorgulaması yapılır.
      $hata boş ise $data resimEkle modeline gönderilip
      galeri görüntüsüne gönderilir.
      $hata dolu ise hata kodu ile galeri görüntüsüne
      gönderilir.
     */

    public function resimEkle() {
        if ($this->input->post() == true) {
            $hata = "";
            $data["kutuphane_ad"] = $this->input->post("ad");
            $data["kutuphane_adres"] = "public/images/kutuphane/" . $_FILES['resim_yolu']['name'];
            $resimconfig['upload_path'] = "./public/images/kutuphane/";
            $resimconfig['allowed_types'] = 'gif|jpg|png';
            $resimconfig['max_size'] = '1024';
            $this->load->library('upload', $resimconfig);
            if (!$this->upload->do_upload("resim_yolu")) {
                $hata["hataresim"] = $this->upload->display_errors();
            }
            if (empty($data["kutuphane_ad"])) {
                $hata["hataad"] = "Ad boş bırakılamaz!!";
            }
            if (empty($hata)) {
                $this->Sorgu_model->bilgiEkle("kutuphane", $data);
                $sonuc = $this->Sorgu_model->bilgileriGetir("kutuphane");
                $data2 ["resimler"] = $sonuc;
                $data2["basari"] = "";
                $this->load->view("kutuphane", $data2);
            } else {
                $sonuc = $this->Sorgu_model->bilgileriGetir("kutuphane");
                $hata["resimler"] = $sonuc;
                $this->load->view("kutuphane", $hata);
            }
        } else {
            $this->index();
        }
    }

    /* |- resimSil Fonksiyonunun Açıklaması -|
      $id ile gönderilen değeri resimSil modeline gönderir.
      Daha sonra silindi kodu ile galeri görüntüsü çağırılır.
     */

    public function resimSil($id) {
        $sonuc = $this->Sorgu_model->bilgiyiGetir("kutuphane", $id);
        unlink($sonuc[0]["resim_yolu"]);
        $this->Sorgu_model->bilgiSil("kutuphane", $id);
        $sonuc = $this->Sorgu_model->bilgileriGetir("kutuphane");
        $data2 ["resimler"] = $sonuc;
        $data2["silindi"] = "";
        $this->load->view("kutuphane", $data2);
    }

}

/* End of file galeri.php */
/* Location: ./cms/controllers/galeri.php */
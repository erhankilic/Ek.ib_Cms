<?php

/*
 * *Author: Erhan Kılıç
 * *Web Site: http://www.ideayazilim.net
 * *E-Mail: info@ideayazilim.net
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blog extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Sorgu_model");
        $this->load->view("header");
    }

    /* |- index Fonksiyonunun Açıklaması -|
      Sorgu_model'den çağrılan sorgu ile yazılar çekilir.
      view/blog.php görüntüsüne veriler gönderilir.
     */

    public function index() {
        $sonuc = $this->Sorgu_model->bilgileriGetir("blog");
        $yazilar ["yazilar"] = $sonuc;
        $this->load->view("blog", $yazilar);
    }

    /* |- yaziGuncelle Fonksiyonunun Açıklaması -|
      view/yaziekle.php görüntüsünden gelen post olup olmadığını
      kontrol eder. Eğer yoksa yazı bilgileri modelden çekilerek
      görüntü dosyasına $yazılar ile gönderilir.
      Gelen postlar data arrayine aktarılır.
      Hata sorgulamaları yapılır. Eğer $hata boşsa data ve gelen id değeri
      modele gönderilir. $Hata dolu ise hata kodları görüntüye yollanılır.
     */

    public function yaziGuncelle($id) {
        if ($this->input->post() == true) {
            $hata = "";
            $data["baslik"] = $this->input->post("baslik");
            $data["icerik"] = $this->input->post("icerik");
            $data["kategori_id"] = $this->input->post("kategori_id");
            $data["keyword"] = $this->input->post("keyword");
            $data["description"] = $this->input->post("description");
            $data["kategori_id"] = $this->input->post("kategori");
            if (!empty($_FILES["resim"]["name"])) {
                $data["resim"] = "public/images/yazilar/" . $_FILES['resim']['name'];
                $resimconfig['upload_path'] = "./public/images/yazilar/";
                $resimconfig['allowed_types'] = 'gif|jpg|png';
                $resimconfig['max_size'] = '1024';
                $this->load->library('upload', $resimconfig);
                if (!$this->upload->do_upload("resim")) {
                    $hata["hataresim"] = $this->upload->display_errors();
                }
            }
            if (empty($data["baslik"])) {
                $hata["hatabaslik"] = "Başlık boş bırakılamaz!!";
            }
            if (empty($data["icerik"])) {
                $hata["hataicerik"] = "İçerik boş bırakılamaz!!";
            }
            if (empty($hata)) {
                if (!empty($_FILES["resim"]["name"])) {
                    $sonuc = $this->Sorgu_model->bilgiyiGetir("blog", $id);
                    unlink($sonuc[0]["resim"]);
                }
                $this->Sorgu_model->bilgiyiGuncelle("blog", $data, $id);
                $sonuc = $this->Sorgu_model->bilgileriGetir("blog");
                $data2 ["yazilar"] = $sonuc;
                $data2["basari"] = "";
                $this->load->view("blog", $data2);
            } else {
                $sonuc = $this->Sorgu_model->bilgiyiGetir("blog", $id);
                $hata ["yazilar"] = $sonuc[0];
                $sonuc2 = $this->Sorgu_model->bilgileriGetir("kategoriler");
                $hata["kategoriler"] = $sonuc2;
                $this->load->view("yaziekle", $hata);
            }
        } else {
            $sonuc = $this->Sorgu_model->bilgiyiGetir("blog", $id);
            $yazilar ["yazilar"] = $sonuc[0];
            $sonuc2 = $this->Sorgu_model->bilgileriGetir("kategoriler");
            $yazilar["kategoriler"] = $sonuc2;
            $this->load->view("yaziekle", $yazilar);
        }
    }

    /* |- yaziEkle Fonksiyonunun Açıklaması -|
      Post edilen değer olup olmadığını kontrol eder. Eğer yoksa
      yaziekle görüntüsü çağrılır. Post edilen değer varsa
      $data arrayine eklenir. Hata sorgulaması yapılır.
      $hata boş ise $data yaziEkle modeline gönderilip
      blog görüntüsüne gönderilir.
      $hata dolu ise hata kodu ile yaziekle görüntüsüne
      gönderilir.
     */

    public function yaziEkle() {
        if ($this->input->post() == true) {
            $hata = "";
            $data["baslik"] = $this->input->post("baslik");
            $data["icerik"] = $this->input->post("icerik");
            $data["kategori_id"] = $this->input->post("kategori_id");
            $data["keyword"] = $this->input->post("keyword");
            $data["description"] = $this->input->post("description");
            $data["kategori_id"] = $this->input->post("kategori");
            $data["resim"] = "public/images/yazilar/" . $_FILES['resim']['name'];
            $data["blog_tarih"] = date("y.m.d");
            if (isset($_FILES["resim"])) {
                $data["resim"] = "public/images/yazilar/" . $_FILES['resim']['name'];
            }
            $resimconfig['upload_path'] = "./public/images/yazilar/";
            $resimconfig['allowed_types'] = 'gif|jpg|png';
            $resimconfig['max_size'] = '1024';
            $this->load->library('upload', $resimconfig);
            if (!$this->upload->do_upload("resim")) {
                $hata["hataresim"] = $this->upload->display_errors();
            }
            if (empty($data["baslik"])) {
                $hata["hatabaslik"] = "Başlık boş bırakılamaz!!";
            }
            if (empty($data["icerik"])) {
                $hata["hataicerik"] = "İçerik boş bırakılamaz!!";
            }
            if (empty($hata)) {
                $this->Sorgu_model->bilgiEkle("blog", $data);
                $sonuc = $this->Sorgu_model->bilgileriGetir("blog");
                $data2 ["yazilar"] = $sonuc;
                $data2["basari"] = "";
                $this->load->view("blog", $data2);
            } else {
                $hata["yazilar"] = $data;
                $sonuc = $this->Sorgu_model->bilgileriGetir("kategoriler");
                $hata["kategoriler"] = $sonuc;
                $this->load->view("yaziekle", $hata);
            }
        } else {
            $sonuc = $this->Sorgu_model->bilgileriGetir("kategoriler");
            $data["kategoriler"] = $sonuc;
            $this->load->view("yaziekle", $data);
        }
    }

    /* |- yaziSil Fonksiyonunun Açıklaması -|
      $id ile gönderilen değeri yaziSil modeline gönderir.
      Daha sonra silindi kodu ile kullanicilar görüntüsü çağırılır.
     */

    public function yaziSil($id) {
        $sonuc = $this->Sorgu_model->bilgiyiGetir("blog", $id);
        unlink($sonuc[0]["resim"]);
        $this->Sorgu_model->bilgiSil("blog", $id);
        $sonuc = $this->Sorgu_model->bilgileriGetir("blog");
        $data2 ["yazilar"] = $sonuc;
        $data2["silindi"] = "";
        $this->load->view("blog", $data2);
    }

    /* |- kategoriler Fonksiyonunun Açıklaması -|
      Sorgu_model'den çağrılan sorgu ile kategoriler çekilir.
      view/kategoriler.php görüntüsüne veriler gönderilir.
     */

    public function kategoriler() {
        $data["kategoriler"] = $this->Sorgu_model->bilgileriGetir("kategoriler");
        $this->load->view("kategoriler", $data);
    }

    /* |- kategoriEkle Fonksiyonunun Açıklaması -|
      Post edilen değer olup olmadığını kontrol eder. Eğer yoksa
      kategoriler görüntüsü çağrılır. Post edilen değer varsa
      $data arrayine eklenir. Hata sorgulaması yapılır.
      $hata boş ise $data kategoriEkle modeline gönderilip
      kategoriler görüntüsüne gönderilir.
      $hata dolu ise hata kodu ile kategoriler görüntüsüne
      gönderilir.
     */

    public function kategoriEkle() {
        if ($this->input->post() == true) {
            $data["kategori"] = $this->input->post("kategori");
            $hata = "";
            if (empty($data["kategori"])) {
                $hata["hatakategori"] = "Kategori Adı boş bırakılamaz!!";
            }
            if (empty($hata)) {
                $this->Sorgu_model->bilgiEkle("kategoriler", $data);
                $kategori["kategoriler"] = $this->Sorgu_model->bilgileriGetir("kategoriler");
                $kategori["basari"] = "";
                $this->load->view("kategoriler", $kategori);
            } else {
                $hata["kategoriler"] = $this->Sorgu_model->bilgileriGetir("kategoriler");
                $this->load->view("kategoriler", $hata);
            }
        } else {
            $this->kategoriler();
        }
    }

    /* |- kategoriGuncelle Fonksiyonunun Açıklaması -|
      view/kategoriler.php görüntüsünden gelen post olup olmadığını
      kontrol eder. Eğer yoksa kategori bilgileri modelden çekilerek
      görüntü dosyasına $kategori ile gönderilir.
      Gelen postlar varsa data arrayine aktarılır.
      Hata sorgulamaları yapılır. Eğer $hata boşsa data ve gelen id değeri
      modele gönderilir. $Hata dolu ise hata kodları görüntüye yollanılır.
     */

    public function kategoriGuncelle($id) {
        $kategori = $this->Sorgu_model->bilgiyiGetir("kategoriler", $id);
        if ($this->input->post() == true) {
            $data["kategori"] = $this->input->post("kategori");
            $hata = "";
            if (empty($data["kategori"])) {
                $hata["hatakategori"] = "Kategori Adı boş bırakılamaz!!";
            }
            if (empty($hata)) {
                $this->Sorgu_model->bilgiyiGuncelle("kategoriler", $data, $id);
                $kategori["kategoriler"] = $this->Sorgu_model->bilgileriGetir("kategoriler");
                $kategori["guncellendi"] = "";
                $this->load->view("kategoriler", $kategori);
            } else {
                $hata["kategori"] = $kategori[0];
                $hata["kategoriler"] = $this->Sorgu_model->bilgileriGetir("kategoriler");
                $this->load->view("kategoriler", $hata);
            }
        } else {
            $data["kategori"] = $kategori[0];
            $data["kategoriler"] = $this->Sorgu_model->bilgileriGetir("kategoriler");
            $this->load->view("kategoriler", $data);
        }
    }

    /* |- kategoriSil Fonksiyonunun Açıklaması -|
      $id ile kategoride yazı bulunum bulunmadığı model sorgusu
      ile kontrol edilip yazı sayısı $yazisayisi na yüklenir.
      Eğer $yazisayisi 0 a eşit ise yani o kategoride yazı yoksa
      $id ile gönderilen değeri yaziSil modeline gönderir.
      Daha sonra silindi kodu ile kullanicilar görüntüsü çağırılır.
      Eğer $yazisayisi 0dan farklı bir sayı ise yani o kategoride
      yazı varsa hata kodu ile kategoriler görüntüsü çağrılır.
     */

    public function kategoriSil($id) {
        $yazisayisi = $this->Sorgu_model->yazikategoriGetir($id);
        if ($yazisayisi == 0) {
            $this->Sorgu_model->bilgiSil("kategoriler", $id);
            $sonuc = $this->Sorgu_model->bilgileriGetir("kategoriler");
            $data2 ["kategoriler"] = $sonuc;
            $data2["silindi"] = "";
            $this->load->view("kategoriler", $data2);
        } else {
            $sonuc = $this->Sorgu_model->bilgileriGetir("kategoriler");
            $data2 ["kategoriler"] = $sonuc;
            $data2["hatasilme"] = "";
            $this->load->view("kategoriler", $data2);
        }
    }

    public function cikis() {
        $this->session->unset_userdata("login");
        redirect(base_url());
    }

}

/* End of file blog.php */
/* Location: ./cms/controllers/blog.php */
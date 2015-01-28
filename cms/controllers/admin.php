<?php

/*
 * *Author: Erhan Kılıç
 * *Web Site: http://www.ideayazilim.net
 * *E-Mail: info@ideayazilim.net
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends MY_Controller {

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
      view/admin.php görüntüsüne veriler gönderilir.
     */

    public function index() {
        $sonuc = $this->Sorgu_model->bilgilerinmiktariniGetir("blog");
        $sonuc2 = $this->Sorgu_model->yazimiktariniGetir("blog");
        $anasayfa ["anasayfa"] = $sonuc;
        $anasayfa["yazilar"] = $sonuc2;
        $this->load->view("admin", $anasayfa);
    }

    /* |- "sitebilgileriniGuncelle" Fonksiyonunun Açıklaması -|
      Bu fonksiyonda view/admin.php görüntüsündeki formdan
      post edilen veriler olup olmadığı kontrol edilir.
      Eğer var ise site bilgilerini güncellendiğinde veya hata
      oluştuğunda, veritabanındaki sitebilgileri view/admin.php görüntüsünde
      gözükmesi için, $hata fonksiyonuna veritabanından çekilen veriler
      yüklenir. Aynısı $data2 değişkeninde de yapılır. Logo için
      yüklenen resmin başarılı olup olmadığı da sorgulanır. Post edilen
      diğer veriler için hata sorgulamaları yapılır.
      Logo yüklemesi her defasında yapılamayacağı için onu ayrı bir
      if sorgusu içerisine eklemeyi uygun buldum.
     */

    public function sitebilgileriniGuncelle() {
        if ($this->input->post() == true) {
            $data["baslik"] = $this->input->post("siteBasligi");
            $data["keywords"] = $this->input->post("siteKeywords");
            $data["description"] = $this->input->post("siteDescription");
            if (empty($data["baslik"])) {
                $hata["hatabaslik"] = "Başlık Boş Bırakılamaz!";
            }
            if (empty($data["keywords"])) {
                $hata["hatakeywords"] = "Anahtar Kelimeler Boş Bırakılamaz!";
            }
            if (empty($data["description"])) {
                $hata["hatadescription"] = "Açıklama Boş Bırakılamaz!";
            }
            if (strlen($data["description"]) > 160) {
                $hata["hatadescription"] = "Açıklama 160 karakterden fazla olamaz!";
            }
            if (empty($hata)) {
                $this->Sorgu_model->bilgiyiGuncelle("site", $data, 1);
                $sonuc = $this->Sorgu_model->bilgileriGetir("site");
                $data2 ["sitebilgileri"] = $sonuc[0];
                $data2["basari"] = "";
                $this->load->view("admin", $data2);
            } else {
                $sonuc = $this->Sorgu_model->bilgileriGetir("site");
                $hata ["sitebilgileri"] = $sonuc[0];
                $this->load->view("admin", $hata);
            }
        }
        if (isset($_FILES["siteLogo"])) {
            $data["logo"] = "public/images/logo/" . $_FILES['siteLogo']['name'];
            $logoconfig['upload_path'] = "./public/images/logo/";
            $logoconfig['allowed_types'] = 'gif|jpg|png';
            $logoconfig['max_size'] = '1024';
            $this->load->library('upload', $logoconfig);
            if (!$this->upload->do_upload("siteLogo")) {
                $hata["hatalogo"] = $this->upload->display_errors();
            }
            if (empty($hata)) {
                $sonuc = $this->Sorgu_model->bilgileriGetir("site");
                unlink($sonuc[0]["logo"]);
                $this->Sorgu_model->bilgiyiGuncelle("site", $data, 1);
                $sonuc = $this->Sorgu_model->bilgileriGetir("site");
                $data2 ["sitebilgileri"] = $sonuc[0];
                $data2["basari"] = "";
                $this->load->view("admin", $data2);
            } else {
                $sonuc = $this->Sorgu_model->bilgileriGetir("site");
                $hata ["sitebilgileri"] = $sonuc[0];
                $this->load->view("admin", $hata);
            }
        }
    }

    /* |- "cikis" Fonksiyonunun Açıklaması -|
      Admin Controller'ından bu fonksiyona yönlendirildiği zaman
      session->userdata'daki login unset edilip giriş sayfasına yönlendirilir.
     */

    public function cikis() {
        $this->session->unset_userdata("login");
        redirect(base_url());
    }

}

/* End of file admin.php */
/* Location: ./cms/controllers/admin.php */
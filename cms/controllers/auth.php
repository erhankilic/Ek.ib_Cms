<?php

/*
 * *Author: Erhan Kılıç
 * *Web Site: http://www.ideayazilim.net
 * *E-Mail: info@ideayazilim.net
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller {
    /* |- Construct Fonksiyonunun Açıklaması -|
      Giriş yapıldımı diye session->userdata'yı kontrol eder.
      Eğer login yapılmış ise admin controller'a yönlendirir.
      Aksi durumda Auth_Model modelini yükler.
     */

    public function __construct() {
        parent::__construct();
        $girisYaptimi = $this->session->userdata("login");
        if ($girisYaptimi == true) {
            redirect("admin");
        }
        $this->load->model("Auth_Model");
    }

    /* |- "index" Fonksiyonunun Açıklaması -|
      view/auth.php'den kullaniciadi ve sifre post edilmişmi kontrol eder.
      Eğer post edildi ise $data array'ine atar ve getKullanicilar fonksiyonuna gönderir.
      getKullanicilar fonksiyonundan dönen değer $sonuc değişkenine aktarılır.
      Eğer veritabanında kullanıcı eşleşmesi varsa 1 değeri döner.
      $sonuc değişkeni 0'dan büyükse session->userdata'da login değeri oluşturur.
      Daha sonra admin controller'a yönlendirir.
      Aksi durumda view/auth.php yüklenir.
     */

    public function index() {
        if ($this->input->post() == true) {
            $data["kullaniciadi"] = $this->input->post("kullaniciadi");
            $data["sifre"] = $this->input->post("sifre");
            $sonuc = $this->Auth_Model->getKullanicilar($data);
            if ($sonuc > 0) {
                $id = $this->Auth_Model->getKullanici($data);
                $this->session->set_userdata("login", $id[0]["yetki"]);
                if ($this->session->userdata("login") == 1) {
                    redirect("admin");
                } else {
                    redirect("blog");
                }
            }
        }
        $this->load->view('auth');
    }

}

/* End of file auth.php */
/* Location: ./cms/controllers/auth.php */
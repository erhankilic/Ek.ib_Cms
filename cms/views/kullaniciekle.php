<div class="templatemo-content-wrapper">
    <div class="templatemo-content">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Yönetim Paneli</a></li>
            <li><a href="<?php echo base_url("kullanicilar"); ?>">Kullanıcılar</a></li>
            <li class="active"><?php echo (isset($kullanicibilgileri["id"])) ? "Kullanıcıyı Güncelle" : "Kullanıcı Ekle" ?></li>
        </ol>
        <h1>Kullanıcı Ekle</h1>
        <p class="margin-bottom-15">Kullanıcı eklemek için gerekli bilgileri doldurun ve ekle butonuna tıklayın.</p>       
        <div class="row">
            <div class="col-md-6">
                <div class="templatemo-progress">
                    <form role="form" id="templatemo-preferences-form" action="<?php
                    if (isset($kullanicibilgileri["id"])) {
                        echo base_url("kullanicilar/kullaniciGuncelle") . "/" . $kullanicibilgileri["id"];
                    } else {
                        echo base_url("kullanicilar/kullaniciEkle");
                    }
                    ?>" method="post">
                        <div class="row">
                            <div class="col-md-6 margin-bottom-15">
                                <label for="Ad" class="control-label">Ad</label>
                                <input type="text" class="form-control" id="Ad" name="Ad" placeholder="Ad" value="<?php
                                if (isset($kullanicibilgileri)) {
                                    echo $kullanicibilgileri ["ad"];
                                }
                                ?>" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 margin-bottom-15">
                                <label for="Soyad" class="control-label">Soyad</label>
                                <input type="text" class="form-control" id="Soyad" name="Soyad" placeholder="Soyad" value="<?php
                                if (isset($kullanicibilgileri)) {
                                    echo $kullanicibilgileri ["soyad"];
                                }
                                ?>" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 margin-bottom-15">
                                <label for="e_mail" class="control-label">E-Mail</label>
                                <input type="text" class="form-control" id="e_mail" name="e_mail" placeholder="E-Mail" value="<?php
                                if (isset($kullanicibilgileri)) {
                                    echo $kullanicibilgileri ["e_mail"];
                                }
                                ?>" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 margin-bottom-15">
                                <label for="kullaniciAd" class="control-label">Kullanıcı Adı</label>
                                <input type="text" class="form-control" id="kullaniciAd" name="kullaniciAd" placeholder="Kullanıcı Adı" value="<?php
                                if (isset($kullanicibilgileri)) {
                                    echo $kullanicibilgileri ["kullaniciadi"];
                                }
                                ?>" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 margin-bottom-15">
                                <label for="sifre" class="control-label">Şifre</label>
                                <input type="password" class="form-control" id="sifre" name="sifre" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 margin-bottom-15">
                                <label for="singleSelect">Yetkilendirme Seçiniz</label>
                                <select class="form-control margin-bottom-15" id="yetki" name="yetki">
                                    <option <?php if(isset($kullanicibilgileri)){ if($kullanicibilgileri["yetki"]==1){ echo "selected"; } }?> value="1">Yönetici</option>
                                    <option <?php if(isset($kullanicibilgileri)){ if($kullanicibilgileri["yetki"]==2){ echo "selected"; } }?> value="2">Yazar</option>
                                </select>
                            </div>                           
                        </div>
                        <div class="row templatemo-form-buttons">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Kaydet</button>   
                            </div>
                        </div>
                    </form>
                </div> 
            </div>
            <div class="col-md-6">
                <div class="templatemo-alerts">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            if (isset($hatakullaniciadi)) {
                                ?>
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <strong>Hata!</strong> <?php echo $hatakullaniciadi; ?>
                                </div>
                                <?php
                            }
                            if (isset($hatasifre)) {
                                ?>
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <strong>Hata!</strong> <?php echo $hatasifre; ?>
                                </div>
                            <?php } ?>
                        </div>  
                    </div>            
                </div>              
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Kapat</span></button>
                <h4 class="modal-title" id="myModalLabel">Çıkış Yapmak İstediğinize Emin misiniz?</h4>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url("admin/cikis"); ?>" class="btn btn-primary">Evet</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Hayır</button>
            </div>
        </div>
    </div>
</div>

</div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/templatemo_script.js"></script>
</body>
</html>
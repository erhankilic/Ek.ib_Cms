<div class="templatemo-content-wrapper">
    <div class="templatemo-content">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Yönetim Paneli</a></li>
            <li><a href="<?php echo base_url("blog"); ?>">Blog</a></li>
            <li class="active"><?php echo (isset($yazilar["blog_id"])) ? "Yazıyı Güncelle" : "Yazı Ekle" ?></li>
        </ol>
        <h1><?php echo (isset($yazilar["blog_id"])) ? "Yazıyı Güncelle" : "Yazı Ekle" ?></h1>
        <p class="margin-bottom-15">Yazı eklemek için gerekli bilgileri doldurun ve kaydet butonuna tıklayın.</p>
        <form role="form" id="templatemo-preferences-form" action="<?php
        if (isset($yazilar["blog_id"])) {
            echo base_url("blog/yaziGuncelle") . "/" . $yazilar["blog_id"];
        } else {
            echo base_url("blog/yaziEkle");
        }
        ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="templatemo-progress">
                        <div class="row">
                            <div class="col-md-12 margin-bottom-15">
                                <label for="baslik" class="control-label">Yazı Başlığı</label>
                                <input type="text" class="form-control" id="baslik" name="baslik" placeholder="Yazı Başlığı" value="<?php
                                if (isset($yazilar)) {
                                    echo $yazilar ["baslik"];
                                }
                                ?>" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 margin-bottom-15">
                                <label for="icerik" class="control-label">Yazı İçeriği</label>
                                <textarea class="form-control" id="icerik" name="icerik" placeholder="İcerik" rows="10"><?php
                                    if (isset($yazilar)) {
                                        echo $yazilar ["icerik"];
                                    }
                                    ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 margin-bottom-15">
                                <label for="keyword" class="control-label">Anahtar Kelimeler</label>
                                <p class="help-block">Arama motorlarında yazılarınızın hangi anahtar kelimelerle listeleneceğini belirler. Yazınızın içinde geçen ve konu ile ilgili olan kelimeleri aralarında virgül olacak şekilde yazmanız iyi bir not kazandırır siteniz için. Her anahtar kelime arasında virgül ve virgülden sonra bir boşluk olacak şekilde yazınız.</p>
                                <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Anahtar Kelimeler" value="<?php
                                if (isset($yazilar)) {
                                    echo $yazilar ["keyword"];
                                }
                                ?>" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 margin-bottom-15">
                                <label for="description" class="control-label">Açıklama</label>
                                <p class="help-block">Arama motorlarında yazı listelendiğinde gözükecek olan açıklamadır. En fazla 160 karakter uzunluğunda olması tavsiye edilir. Doldurulması zorunlu değildir. Fakat arama motorlarında listelenecek olan sitenize iyi not kazandırması için gereklidir.</p>
                                <textarea class="form-control" id="description" name="description" placeholder="Açıklama"><?php
                                    if (isset($yazilar)) {
                                        echo $yazilar ["description"];
                                    }
                                    ?></textarea>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="templatemo-alerts">
                        <div class="row">
                            <div class="col-md-12 margin-bottom-30">
                                <label for="resim">Resim</label>
                                <input type="file" id="resim" name="resim">
                                    <p class="help-block">Resimi buradan yükleyebilirsiniz...</p>  
                            </div>
                        </div>
                        <?php
                        if (isset($yazilar["blog_id"])) {
                            ?>
                            <img src="<?php echo base_url($yazilar["resim"]); ?>" height="200" />
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-6 margin-bottom-15">
                                <label for="singleSelect">Kategori Seçiniz</label>
                                <select class="form-control margin-bottom-15" id="kategori" name="kategori">
                                    <?php foreach ($kategoriler as $kategori) { ?>
                                        <option <?php
                                        if (isset($yazilar["blog_id"])) {
                                            if ($yazilar["kategori_id"] == $kategori["kategoriler_id"]) {
                                                echo "selected";
                                            }
                                        }
                                        ?> value="<?php echo $kategori["kategoriler_id"]; ?>">
                                                <?php echo $kategori["kategori"]; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>                           
                        </div>
                        <div class="row templatemo-form-buttons">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Kaydet</button>   
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                if (isset($hataresim)) {
                                    ?>
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <strong>Hata!</strong> <?php echo $hataresim; ?>
                                    </div>
                                    <?php
                                }
                                if (isset($hatabaslik)) {
                                    ?>
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <strong>Hata!</strong> <?php echo $hatabaslik; ?>
                                    </div>
                                    <?php
                                }
                                if (isset($hataicerik)) {
                                    ?>
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <strong>Hata!</strong> <?php echo $hataicerik; ?>
                                    </div>
                                <?php } ?>
                            </div>  
                        </div>            
                    </div>              
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Kapat</span></button>
                <h4 class="modal-title" id="myModalLabel">Çıkış Yapmak İstediğinize Emin misiniz?</h4>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url("blog/cikis"); ?>" class="btn btn-primary">Evet</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Hayır</button>
            </div>
        </div>
    </div>
</div>

</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/templatemo_script.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('icerik');
</script>
</body>
</html>
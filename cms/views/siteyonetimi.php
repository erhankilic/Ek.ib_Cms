<div class="templatemo-content-wrapper">
    <div class="templatemo-content">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Yönetim Paneli</a></li>
            <li class="active">Site Yönetimi</li>
        </ol>
        <h1>Site Bilgileri</h1>
        <p class="margin-bottom-15">Burada site bilgilerini değiştirebilirsiniz.</p>       
        <div class="row">
            <div class="col-md-6">
                <div class="templatemo-progress">
                    <form role="form" id="templatemo-preferences-form" action="<?php echo base_url("admin/sitebilgileriniGuncelle"); ?>" method="post">
                        <div class="row">
                            <div class="col-md-6 margin-bottom-15">
                                <label for="siteBasligi" class="control-label">Site Başlığı</label>
                                <p class="help-block">Sitenizde gözükecek başlığı burada belirtebilirsiniz...</p>
                                <input type="text" class="form-control" id="siteBasligi" name="siteBasligi" placeholder="Site Başlığı" value="<?php
                                if (isset($sitebilgileri)) {
                                    echo $sitebilgileri ["baslik"];
                                }
                                ?>" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 margin-bottom-15">
                                <label for="siteKeywords" class="control-label">Anahtar Kelimeler</label>
                                <p class="help-block">Arama motorlarında sitenizin listeleneceği anahtar kelimeler...</p>
                                <input type="text" class="form-control" id="siteKeywords" name="siteKeywords" placeholder="Anahtar Kelimeler" value="<?php
                                if (isset($sitebilgileri)) {
                                    echo $sitebilgileri ["keywords"];
                                }
                                ?>" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 margin-bottom-15">
                                <label for="siteDescription" class="control-label">Site Açıklaması</label>
                                <p class="help-block">Arama motorlarında sitenizde gösterilecek açıklama. Açıklamanız en fazla 160 karakterden oluşmalı!!</p>
                                <textarea class="form-control" id="siteDescription" name="siteDescription" rows="5" placeholder="Site Açıklaması"><?php
                                    if (isset($sitebilgileri)) {
                                        echo $sitebilgileri ["description"];
                                    }
                                    ?></textarea>					
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
                        <img src="<?php echo base_url($sitebilgileri["logo"]); ?>" class="image" width="100" />
                        <form role="form" id="templatemo-preferences-form" action="<?php echo base_url("admin/sitebilgileriniGuncelle"); ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12 margin-bottom-30">
                                    <label for="exampleInputFile">Logo</label>
                                    <input type="file" id="exampleInputFile" name="siteLogo">
                                        <p class="help-block">Logonuzu buradan yükleyebilirsiniz...</p>  
                                </div>
                            </div>
                            <div class="row templatemo-form-buttons">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Yükle</button>   
                                </div>
                            </div>
                        </form>
                        <div class="col-md-12">
                            <?php
                            if (isset($hatabaslik)) {
                                ?>
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <strong>Hata!</strong> <?php echo $hatabaslik; ?>
                                </div>
                                <?php
                            }
                            if (isset($hatakeywords)) {
                                ?>
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <strong>Hata!</strong> <?php echo $hatakeywords; ?>
                                </div>
                                <?php
                            }
                            if (isset($hatadescription)) {
                                ?>
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <strong>Hata!</strong> <?php echo $hatadescription; ?>
                                </div>
                                <?php
                            }
                            if (isset($hatalogo)) {
                                ?>
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <strong>Hata!</strong> <?php echo $hatalogo; ?>
                                </div>
                                <?php
                            }
                            if (isset($basari)) {
                                ?>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <strong>Kaydedildi!</strong> Bilgiler Başarıyla Kaydedildi.
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
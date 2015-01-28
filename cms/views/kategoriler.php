<div class="templatemo-content-wrapper">
    <div class="templatemo-content">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Yönetim Paneli</a></li>
            <li><a href="<?php echo base_url("blog"); ?>">Blog</a></li>
            <li class="active">Kategoriler</li>
        </ol>
        <h1>Kategoriler</h1>
        <p class="margin-bottom-15">Bu sayfada kategori ekleyebilir, silebilir ve düzenleyebilirsiniz.</p>
        <form role="form" id="templatemo-preferences-form" action="<?php
        if (isset($kategori["id"])) {
            echo base_url("blog/kategoriGuncelle") . "/" . $kategori["id"];
        } else {
            echo base_url("blog/kategoriEkle");
        }
        ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="templatemo-progress">
                        <div class="row">
                            <div class="col-md-6 margin-bottom-15">
                                <label for="kategori" class="control-label">
                                    <?php
                                    if (isset($kategori["id"])) {
                                        echo "Kategori Güncelle";
                                    } else {
                                        echo "Kategori Ekle";
                                    }
                                    ?>
                                </label>
                                <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Kategori Adı" value="<?php
                                if (isset($kategori["id"])) {
                                    echo $kategori ["kategori"];
                                }
                                ?>" /> <br />
                                <button type="submit" class="btn btn-primary">Kaydet</button> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 margin-bottom-15">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Kategori</th>
                                                <th>Düzenle</th>
                                                <th>Sil</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sayac = 0;
                                            foreach ($kategoriler as $kategori) {
                                                $sayac++;
                                                $idedit = base_url("blog/kategoriGuncelle") . "/" . $kategori["kategoriler_id"];
                                                $iddelete = base_url("blog/kategoriSil") . "/" . $kategori["kategoriler_id"];
                                                ?>
                                                <tr>
                                                    <td><?php echo $sayac; ?></td>
                                                    <td><?php echo $kategori["kategori"]; ?></td>
                                                    <td><a href="<?php echo $idedit; ?>" class="btn btn-default">Düzenle</a></td>
                                                    <td><a href="<?php echo $iddelete; ?>" class="btn btn-link" onclick="return confirm('Silmek istediğinizden emin misiniz?')">Sil</a></td>
                                                </tr>
                                            <?php } ?>				
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="templatemo-alerts">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                if (isset($hatakategori)) {
                                    ?>
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <strong>Hata!</strong> <?php echo $hatakategori; ?>
                                    </div>
                                    <?php
                                }
                                if (isset($hatasilme)) {
                                    ?>
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <strong>Hata!</strong> Kategori Silinemedi! Kategori Altında Yazı Bulundu!!
                                    </div>
                                    <?php
                                }
                                if (isset($basari)) {
                                    ?>
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <strong>Kaydedildi!</strong> Kategori Başarıyla Eklendi.
                                    </div>
                                    <?php
                                }
                                if (isset($silindi)) {
                                    ?>
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <strong>Silindi!</strong> Kategori Başarıyla Silindi.
                                    </div>
                                    <?php
                                }
                                if (isset($guncellendi)) {
                                    ?>
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <strong>Güncellendi!</strong> Kategori Başarıyla Güncellendi.
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
</body>
</html>
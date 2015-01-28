<div class="templatemo-content-wrapper">
    <div class="templatemo-content">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Yönetim Paneli</a></li>
            <li class="active">Kütüphane</li>
        </ol>
        <h1>Kütüphane</h1>
        <p class="margin-bottom-15">Bu sayfada siteniz için resimler ekleyebilir veya silebilirsiniz.</p>
        <div class="row">
            <div class="col-md-6">
                <div class="templatemo-progress">
                    <div class="row">
                        <div class="col-md-6 margin-bottom-15">
                            <form role="form" id="templatemo-preferences-form" action="<?php echo base_url("kutuphane/resimEkle"); ?>" method="post" enctype="multipart/form-data">
                                <label for="ad" class="control-label">Resim Adı</label>
                                <input type="text" class="form-control" id="ad" name="ad" placeholder="Resim Adı"/> <br />
                                <input type="file" id="resim_yolu" name="resim_yolu"><br />
                                    <button type="submit" class="btn btn-primary">Kaydet</button> 
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="templatemo-alerts">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                if (isset($hataad)) {
                                    ?>
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <strong>Hata!</strong> <?php echo $hataad; ?>
                                    </div>
                                    <?php
                                }
                                if (isset($hataresim)) {
                                    ?>
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <strong>Hata!</strong> <?php echo $hataresim; ?>
                                    </div>
                                    <?php
                                }
                                if (isset($basari)) {
                                    ?>
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <strong>Kaydedildi!</strong> Resim Başarıyla Kaydedildi.
                                    </div>
                                    <?php
                                }
                                if (isset($silindi)) {
                                    ?>
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <strong>Silindi!</strong> Resim Başarıyla Silindi.
                                    </div>
                                <?php } ?>
                            </div>  
                        </div>            
                    </div>              
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <tbody>
                            <tr>
                                <?php
                                $sayac = 0;
                                foreach ($resimler as $resim) {
                                    $sayac++;
                                    $iddelete = base_url("kutuphane/resimSil") . "/" . $resim["kutuphane_id"];
                                    ?>
                                    <td>
                                        <h4 class="list-group-item-heading"><?php echo $resim["kutuphane_ad"]; ?></h4>
                            <img src="<?php echo base_url($resim["kutuphane_adres"]); ?>" width="300" />
                            <a href="<?php echo $iddelete; ?>" class="btn btn-link" onclick="return confirm('Silmek istediğinizden emin misiniz?')">Sil</a>
                            </td>
                            <?php echo ($sayac % 3 == 0) ? "</tr><tr>" : ""; ?>
                        <?php } ?>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
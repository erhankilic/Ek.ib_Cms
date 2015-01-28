<div class="templatemo-content-wrapper">
    <div class="templatemo-content">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Yönetim Paneli</a></li>
            <li class="active">Kullanıcılar</li>
        </ol>
        <h1>Kullanıcılar</h1>
        <p class="margin-bottom-15">Burada sitede bloga yazı yazabilmesi için kullanıcı ekleyebilir, silebilir ve hem kendi hem de kullanıcıların şifrelerini değiştirebilirsiniz. </p>
        <div class="row margin-bottom-30">
            <div class="col-md-12">
                <ul class="nav nav-pills">
                    <li class="active"><a href="<?php echo base_url("kullanicilar/kullaniciEkle"); ?>">Kullanıcı Ekle<span class="badge"></span></a></li>
                </ul>          
            </div>
        </div> 
        <?php if (isset($basari)) { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong>Kaydedildi!</strong> Bilgiler Başarıyla Kaydedildi.
            </div>
            <?php
        }
        if (isset($silindi)) {
            ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong>Silindi!</strong> Kullanıcı Başarıyla Silindi.
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ad</th>
                                <th>Soyad</th>
                                <th>Kullanıcı Adı</th>
                                <th>E-mail</th>
                                <th>Yetki</th>
                                <th>Düzenle</th>
                                <th>Sil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sayac = 0;
                            foreach ($kullanicibilgileri as $kullanicilar) {
                                $sayac++;
                                $idedit = base_url("kullanicilar/kullaniciGuncelle") . "/" . $kullanicilar["kullanicilar_id"];
                                $iddelete = base_url("kullanicilar/kullaniciSil") . "/" . $kullanicilar["kullanicilar_id"];
                                ?>
                                <tr <?php echo ($kullanicilar["yetki"] == 1) ? "class='success'" : ""; ?>>
                                    <td><?php echo $sayac; ?></td>
                                    <td><?php echo $kullanicilar["ad"]; ?></td>
                                    <td><?php echo $kullanicilar["soyad"]; ?></td>
                                    <td><?php echo $kullanicilar["kullaniciadi"]; ?></td>
                                    <td><?php echo $kullanicilar["e_mail"]; ?></td>
                                    <td><?php echo ($kullanicilar["yetki"] == 1) ? "Yönetici" : "Yazar"; ?></td>
                                    <td><a href="<?php echo $idedit; ?>" class="btn btn-default">Düzenle</a></td>
                                    <td><a href="<?php echo ($sayac > 1) ? $iddelete : base_url("kullanicilar"); ?>" class="btn btn-link" onclick="return confirm('Silmek istediğinizden emin misiniz?')">Sil</a></td>
                                </tr>
                            <?php } ?>				
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
                <a href="<?php echo base_url("admin/cikis"); ?>" class="btn btn-primary">Evet</a>
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
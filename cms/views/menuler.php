<div class="templatemo-content-wrapper">
    <div class="templatemo-content">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Yönetim Paneli</a></li>
            <li class="active">Menu Yonetimi</li>
        </ol>
        <h1>Kullanıcılar</h1>
        <p class="margin-bottom-15">Burada sitede bloga yazı yazabilmesi için kullanıcı ekleyebilir, silebilir ve hem kendi hem de kullanıcıların şifrelerini değiştirebilirsiniz. </p>
        <div class="row margin-bottom-30">
            <div class="col-md-3">
                <form action="<?php echo base_url("menuyonetimi/menuekle"); ?>" method="post">
                    <input type="text" class="form-control" id="menuad" name="menuad" placeholder="Menu Adı"/>
                    <input type="text" class="form-control" id="menusira" name="menusira" placeholder="Menu Sırası"/>
                    <button type="submit" class="btn btn-primary">Ekle</button>
                </form>        
            </div>
        </div> 
        <?php if (isset($basari)) { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong>Kaydedildi!</strong> Menu Başarıyla Kaydedildi.
            </div>
        <?php
        }
        if (isset($silindi)) {
            ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong>Silimdi!</strong> Menu Başarıyla Silindi.
            </div>
            <?php
        }
        if (isset($hatamenusira)) {
            ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong>Hata!</strong> <?php echo $hatamenusira; ?>
            </div>
        <?php }
        ?>
        <div class="row">
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Menü Adı</th>
                                <th>Sıra</th>
                                <th>Sil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="success">
                                <td>-</td>
                                <td>Anasayfa</td>
                                <td>##</td>
                                <td>##</td>
                            </tr>
                            <?php
                            $sayac = 0;
                            foreach ($menuler as $menu) {
                                $sayac++;
                                $iddelete = base_url("menuyonetimi/menuSil") . "/" . $menu["menu_id"];
                                ?>
                                <tr>
                                    <td><?php echo $sayac; ?></td>
                                    <td><?php echo $menu["menu_ad"]; ?></td>
                                    <td><form action="<?php echo base_url("menuyonetimi/menuGuncelle") . "/" . $menu["menu_id"]; ?>" method="post">
                                            <input type="text" class="form-control" id="menusira" name="menusira" placeholder="Menu Sırası" value="<?php echo $menu["menu_sira"]; ?>" />
                                        </form></td>
                                    <td><a href="<?php echo ($menu["menu_id"] > 1) ? $iddelete : base_url("menuyonetimi"); ?>" class="btn btn-link" onclick="return confirm('Silmek istediğinizden emin misiniz?')">Sil</a></td>
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
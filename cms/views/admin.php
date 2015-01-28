<div class="templatemo-content-wrapper">
    <div class="templatemo-content">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Yönetim Paneli</a></li>
            <li class="active">Anasayfa</li>
        </ol>
        <h1>Yönetim Paneli</h1>
        <p class="margin-bottom-15"></p>       
        <div class="row">
            <div class="col-md-6">
                <div class="templatemo-progress">
                    <div class="col-md-12 col-sm-6 margin-bottom-30">
                        <div class="panel panel-success">
                            <div class="panel-heading">Son 30 Gündeki Yazı Miktarı</div>
                            <canvas id="templatemo-line-chart"></canvas>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-6 margin-bottom-30">
                        <div class="panel panel-success">
                            <div class="panel-heading">Toplam Yazı Miktarı</div>
                            <canvas id="templatemo-line-chart2"></canvas>
                        </div>
                    </div> 
                </div> 
            </div>
            <div class="col-md-6">
                <div class="templatemo-alerts">
                    <div class="row">
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
<script type="text/javascript">
    // Line chart
    var lineChartData = {
        labels: ["", "Yazı Miktarı", ""],
        datasets: [
            {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: ["0", <?php echo $yazilar; ?>, "0"]
            }
        ]

    };
    var lineChartData2 = {
        labels: ["", "Yazı Miktarı", ""],
        datasets: [
            {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: ["0", <?php echo $anasayfa; ?>, "0"]
            }
        ]

    };

    window.onload = function () {
        var ctx_line = document.getElementById("templatemo-line-chart").getContext("2d");
        window.myLine = new Chart(ctx_line).Line(lineChartData, {
            responsive: true
        });
        var ctx_line = document.getElementById("templatemo-line-chart2").getContext("2d");
        window.myLine = new Chart(ctx_line).Line(lineChartData2, {
            responsive: true
        });
    };

    $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    $('#loading-example-btn').click(function () {
        var btn = $(this);
        btn.button('loading');
        // $.ajax(...).always(function () {
        //   btn.button('reset');
        // });
    });
</script>
</body>
</html>
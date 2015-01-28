<!DOCTYPE html>
<!-- 
**Author: Erhan Kılıç
**Web Site: http://www.ideayazilim.net
**E-Mail: info@ideayazilim.net
-->
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
<title>Yönetim Paneli</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="viewport" content="width=device-width">        
<link rel="stylesheet" href="<?php echo base_url("public/css/templatemo_main.css"); ?>">
</head>
<body>
<script src="<?php echo base_url("public/js/jquery.min.js"); ?>"></script>
<script src="<?php echo base_url("public/js/bootstrap.min.js"); ?>"></script>
<script src="<?php echo base_url("public/js/Chart.min.js"); ?>"></script>
<script src="<?php echo base_url("public/js/templatemo_script.js"); ?>"></script>
<script src="<?php echo base_url("public/ckeditor/ckeditor.js"); ?>"></script>
<script type="text/javascript">
    // Line chart
    var randomScalingFactor = function () {
        return Math.round(Math.random() * 100)
    };
    var lineChartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
            }
        ]

    }

    window.onload = function () {
        var ctx_line = document.getElementById("templatemo-line-chart").getContext("2d");
        window.myLine = new Chart(ctx_line).Line(lineChartData, {
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
<div class="navbar navbar-inverse" role="navigation">
    <div class="navbar-header">
        <div class="logo"><h1>Yönetim Paneli</h1></div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>   
</div>
<div class="template-page-wrapper">
    <div class="navbar-collapse collapse templatemo-sidebar">
        <ul class="templatemo-sidebar-menu">
            <li>
                <form action="" method ="get" class="navbar-form">
                    <input type="text" class="form-control" id="templatemo_search_box" placeholder="Ara..." name="ara" />
                    <input type="submit" class="btn btn-default" Value="Ara" />
                </form>
            </li>
            <?php if ($this->session->userdata("login") == 1) { ?>
                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i>Anasayfa</a></li>
                <li><a href="<?php echo base_url("siteyonetimi"); ?>"><i class="fa fa-gear"></i>Site Yönetimi</a></li>
                <li><a href="<?php echo base_url("menuyonetimi"); ?>"><i class="fa fa-bars"></i>Menu Yönetimi</a></li>
                <li><a href="<?php echo base_url("kutuphane"); ?>"><i class="fa fa-image"></i>Kütüphane</a></li>
                <li><a href="<?php echo base_url("sayfalar"); ?>"><i class="fa fa-file"></i>Sayfalar</a></li>
            <?php } ?>
            <li><a href="<?php echo base_url("blog"); ?>"><i class="fa fa-cubes"></i><span class="badge pull-right"></span>Blog</a></li>
            <?php if ($this->session->userdata("login") == 1) { ?>
                <li><a href="<?php echo base_url("kullanicilar"); ?>"><i class="fa fa-users"></i><span class="badge pull-right"></span>Kullanıcılar</a></li>
            <?php } ?>
            <li><a href="javascript:;"  data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Çıkış</a></li>
        </ul>
    </div><!--/.navbar-collapse -->
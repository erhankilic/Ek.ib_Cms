<!DOCTYPE html>
<!-- 
**Author: Erhan Kılıç
**Web Site: http://www.ideayazilim.net
**E-Mail: info@ideayazilim.net
-->
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
<title>Yönetim Paneli - Giriş</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="viewport" content="width=device-width">        
<link rel="stylesheet" href="<?php echo base_url(""); ?>public/css/templatemo_main.css">
</head>
<body>
<div id="main-wrapper">
    <div class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
            <div class="logo"><h1>Yönetim Paneli - Giriş</h1></div>
        </div>   
    </div>
    <div class="template-page-wrapper">
        <form class="form-horizontal templatemo-signin-form" role="form" action="<?php echo base_url(""); ?>" method="post">
            <div class="form-group">
                <div class="col-md-12">
                    <label for="username" class="col-sm-2 control-label">Kullanıcı Adı</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" placeholder="Kullanıcı Adı" name="kullaniciadi" />
                    </div>
                </div>              
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label for="password" class="col-sm-2 control-label">Şifre</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" placeholder="Şifre" name="sifre" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" value="Sign in" class="btn btn-default">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
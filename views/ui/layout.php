<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
    <title><?php echo $title; ?></title>

    <link href="<?php echo BASE_URL; ?>/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>    
    <link href="<?php echo BASE_URL; ?>/vendor/fortawesome/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://bootswatch.com/yeti/bootstrap.min.css" rel="stylesheet" type="text/css"/>    
    <link href="<?php echo BASE_URL; ?>/assets/css/customize.css" rel="stylesheet" type="text/css"/>

    <script src="<?php echo BASE_URL; ?>/vendor/components/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL; ?>/vendor/components/angular.js/angular.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL; ?>/vendor/twbs/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL; ?>/vendor/malsup/form/jquery.form.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL; ?>/vendor/mouse0270/bootstrap-growl/dist/bootstrap-notify.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL; ?>/assets/js/script.js" type="text/javascript"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body ng-app="app">   
<div ng-controller="anaCtrl" ng-cloak>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navigation-1" aria-expanded="false">
                    <span class="sr-only">Menü</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo BASE_URL; ?>">SEOTOOLS</a>
            </div>
            <div class="collapse navbar-collapse" id="top-navigation-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="<?php echo BASE_URL; ?>"><span class="glyphicon glyphicon-search"></span> Sıra Bulucu</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo BASE_URL; ?>/kayit-ol"><span class="glyphicon glyphicon-user"></span> Kayıt Ol</a></li>
                    <li><a href="<?php echo BASE_URL; ?>/giris-yap"><span class="glyphicon glyphicon-lock"></span> Giriş Yap</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <aside id="body-content">
        <?php echo $body_content; ?>
    </aside>

</div>
</body>
</html>
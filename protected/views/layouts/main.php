<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $this->pageTitle; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- for Google -->
    <meta name="description" content="<?php echo $this->meta['description']; ?>" />
    <meta name="keywords" content="<?php echo $this->meta['keywords']; ?>" />

    <meta name="author" content="" />
    <meta name="copyright" content="2014" />
    <meta name="application-name" content="Budimo Ljudi" />

    <!-- for Facebook -->
    <meta property="og:title" content="<?php echo $this->meta['title']; ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="<?php echo Yii::app()->getBaseUrl(true) . '/img/' . $this->meta['image']; ?>" />
    <meta property="og:url" content="<?php echo $this->meta['url']; ?>" />
    <meta property="og:description" content="<?php echo $this->meta['description']; ?>" />
    <meta property="article:publisher" content="http://www.facebook.com/humaniljudi" />

    <!-- for Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="<?php echo $this->meta['title']; ?>" />
    <meta name="twitter:description" content="<?php echo $this->meta['description']; ?>" />
    <meta name="twitter:image" content="<?php echo Yii::app()->getBaseUrl(true) . '/img/' . $this->meta['image']; ?>" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

	<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/iCheck/square/blue.css" >
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/jquery.datetimepicker.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/normalize.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/main.css">

	<script src="<?php echo Yii::app()->baseUrl; ?>/js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div class="container">
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand logo" href="<?php echo Yii::app()->getBaseUrl(true); ?>">Budimo Ljudi</a><span class="label label-info"> beta</span>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php $this->widget('zii.widgets.CMenu',array(
					'htmlOptions'=>array('class' => "nav navbar-nav navbar-right",),
					'items'=>array(
						array('label'=>'Ponudi pomoć', 'url'=>array('/help/create'), 'visible'=>!Yii::app()->user->haveHelp()),
						array('label'=>'Akcije', 'url'=>array('/action/index')),
                        array('label'=>'Poplave <i class="glyphicon glyphicon-bullhorn"></i>', 'url'=>array('/site/vazne_informacije'), 'linkOptions' => array('class' => 'menu-highlight')),
                        array('label'=>'Blog', 'url'=>array('/site/vijesti')),
						//array('label'=>'Kontakt', 'url'=>array('/site/contact')),
						array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=> Yii::app()->session['fullname'] . ' <i class="caret"></i>', 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest,
                            'items' => array(
                                array('label'=>'Moje akcije', 'url'=>array('action/moje_akcije')),
                                array('label'=>'Uredi profil', 'url'=>array('/help/update/','id'=>Yii::app()->session['id']),'visible'=>Yii::app()->user->haveHelp()),
                                array('label'=>'Uredi blog', 'url'=>array('/post/admin'),'visible'=>Yii::app()->user->checkAccess("admin")),
                                array('label'=>'', 'url'=>'', 'itemOptions' => array('class' => 'divider')),
                                array('label'=>'Odjavi me', 'url'=>array('/site/logout')),
                            ),
                            'itemOptions' => array('class' => 'dropdown'),
                            'linkOptions'=> array(
                                'class' => 'dropdown-toggle',
                                'data-toggle' => 'dropdown',
                                )
                        )
				    ),
                    'encodeLabel' => false,
                    'submenuHtmlOptions' => array(
                        'class' => 'dropdown-menu',
                    )
                )); ?>
			</div>
		</div>
	</nav>

	<div class="row">
		<?php echo $content; ?>
	</div>

	<div class="row">
		<footer class="col-md-12">
            <div class="text-center">
                <p class="copyright">Copyright Budimo Ljudi &copy; 2014</p>
                <p class="credits">Developed by <?php echo CHtml::link('Evolution Web Studio', 'http://evolution.rs.ba', array('target' => '_blank')); ?> </p>
            </div>
		</footer>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/plugins.js"></script>
<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/vendor/jquery.datetimepicker.js"></script>
<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/vendor/iCheck/icheck.min.js"></script>
<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/main.js"></script>

<!-- Google Tag Manager -->
<noscript>
    <iframe src="//www.googletagmanager.com/ns.html?id=GTM-52WJKV" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<script>
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-52WJKV');
</script>
<!-- End Google Tag Manager -->
</body>
</html>

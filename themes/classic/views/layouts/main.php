<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="en" />
		<!--[if lt IE 8]>
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
		<![endif]-->
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700|Monsterrat:400,700|Merriweather:400,300italic,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/animate.css">
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/font-awesome/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />

		<!-- Modernizr JS -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/modernizr-2.6.2.min.js"></script>
		<!-- FOR IE9 below -->
		<!--[if lt IE 9]>
			<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/respond.min.js"></script>
		<![endif]-->
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	</head>
	<body>
		<section id="pageWrapper">
			<nav class="navbar1" role="navigation" data-offcanvass-position="offcanvass-left">
				<div class="container">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 fh5co-logo">
						<a href="#" class="mobile-toggle nav-toggle"><i></i></a>
						<a href="#"><img title="Venturepact" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logos/logo.png"/></a>
					</div>
					<div class="col-lg-5 col-md-4 col-sm-4 text-center link-wrap">
						<!--<ul data-offcanvass="yes">
							<li class="active"><a href="#">Tour</a></li>
							<li><a href="#">Explore</a></li>
							<li><a href="#">Blog</a></li>
						</ul>-->
					</div>
					<div class="col-lg-4 col-md-5 col-sm-5 text-right link-wrap">
						<ul class="special" data-offcanvass="yes">
							<li><a href="#">Login</a></li>
							<li><a href="#" class="call-to-action">Get Started</a></li>
						</ul>
					</div>
				</div>
			</nav>

			<div class="cover cover-style-2 js-full-height header-banner" data-stellar-background-ratio="0.5" data-next="yes">
		  	<span class="scroll-btn wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.4s">
				<a href="#">
					<span class="mouse"><span></span></span>
				</a>
			</span>
			<div class="fh5co-overlay"></div>
			<div class="cover-text">
				<div class="container">
					<div class="row">
						<div class="col-md-push-6 col-md-6 full-height js-full-height">
							<div class="cover-intro">
								<h1 class="cover-text-lead wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
									Find the Right Software for Your Organization
								</h1>
								<h2 class="cover-text-sublead wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">
									Every month, Capterra helps thousands of businesses &amp; nonprofits find the software that will allow them to improve, grow and succeed.
								</h2>
								<p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.1s"><a href="http://freehtml5.co/" class="btn btn-primary btn-outline btn-lg">See Our Work</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

			<?php echo $content; ?>
		</section>
		<!-- jQuery -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
		<!-- Waypoints -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.waypoints.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.magnific-popup.min.js"></script>
		<!-- Stellar -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.stellar.min.js"></script>
		<!-- countTo -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.countTo.js"></script>
		<!-- WOW -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/wow.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/bootstrap.min.js"></script>
		<script>
			new WOW().init();
		</script>
		<!-- Main -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
	</body>
</html>
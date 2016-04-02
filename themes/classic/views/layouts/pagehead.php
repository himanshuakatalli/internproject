<!DOCTYPE html>
<html>
    <head>
    <?php
    if((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443){
        $actual_link = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $seo_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    echo '<link rel="canonical" href="'.$seo_link.'"/>';
}
?>
<!-- Title -->
<title><?php echo isset($this->pageTitle) ? $this->pageTitle : Yii::app()->name; ?></title>
<!-- Meta Data-->
<meta charset="utf-8">
<meta name="author" content="VenturePact">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="VenturePact - Premium Engineering Teams, On Demand">
<meta itemprop="description" content="Developing software for your enterprise or start up? Find reliable & pre-screened software services firms to develop your product or scale your software team.">
<meta itemprop="image" content="https://venturepact.com/fb_post_small.jpg">
<!-- Twitter Card data -->
<meta name="twitter:card" content="product">
<meta name="twitter:site" content="@venturepact">
<meta name="twitter:title" content="VenturePact - Premium Engineering Teams, On Demand">
<meta name="twitter:description" content="Developing software for your enterprise or start up? Find reliable & pre-screened software services firms to develop your product or scale your software team.">
<meta name="twitter:creator" content="@venturepact">
<meta name="twitter:image" content="https://venturepact.com/fb_post_small.jpg">
<!-- Open Graph data -->
<meta property="og:title" content="VenturePact - Premium Engineering Teams, On Demand" />
<meta property="og:type" content="article" />
<meta property="og:url" content="https://venturepact.com" />
<meta property="og:image" content="https://venturepact.com/fb_post_small.jpg" />
<meta property="og:description" content="Developing software for your enterprise or start up? Find reliable & pre-screened software services firms to develop your product or scale your software team." />
<meta property="og:site_name" content="VenturePact" />
<!-- Favicon -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/css/reset.css" rel="stylesheet">
<link rel="shortcut icon" href="https://venturepact.com/favicon.ico">
<!-- CSS -->

<!-- Compiled and minified JavaScript -->
<link rel="stylesheet"  href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/css/responsive.css" rel="stylesheet">
 <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<!--<link href="<?php //echo Yii::app()->theme->baseUrl; ?>/style/newhome/css/flexslider.css" rel="stylesheet">-->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/css/simple-line-icons.css" rel="stylesheet">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/css/c-hamburger.min.css" rel="stylesheet">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/css/softcat.css" rel="stylesheet">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/css/review.css" rel="stylesheet">

<!-- For displaying ratings as stars -->
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>

<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/css/style-product-page.css" media="all" rel="stylesheet" type="text/css"/>
<!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/css/style.css" rel="stylesheet">
<!-- JQuery -->
<style type="text/css">
    .navbar-custom{
    background: -moz-linear-gradient(45deg, rgba(58,65,109,1) 0%, rgba(58,65,109,1) 1%, rgba(63,99,131,1) 100%); /* ff3.6+ */
    background: -webkit-gradient(linear, left bottom, right top, color-stop(0%, rgba(58,65,109,1)), color-stop(1%, rgba(58,65,109,1)), color-stop(100%, rgba(63,99,131,1))); /* safari4+,chrome */
background: -webkit-linear-gradient(45deg, rgba(58,65,109,1) 0%, rgba(58,65,109,1) 1%, rgba(63,99,131,1) 100%); /* safari5.1+,chrome10+ */
background: -o-linear-gradient(45deg, rgba(58,65,109,1) 0%, rgba(58,65,109,1) 1%, rgba(63,99,131,1) 100%); /* opera 11.10+ */
background: -ms-linear-gradient(45deg, rgba(58,65,109,1) 0%, rgba(58,65,109,1) 1%, rgba(63,99,131,1) 100%); /* ie10+ */
background: linear-gradient(45deg, rgba(58,65,109,1) 0%, rgba(58,65,109,1) 1%, rgba(63,99,131,1) 100%); /* w3c */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3f6383', endColorstr='#3a416d',GradientType=1 ); /* ie6-9 */}
</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js" ></script>
<!-- <script src="<?php //echo Yii::app()->theme->baseUrl; ?>/style/newhome/js/jquery-1.11.3.min.js"></script> -->
</head>
<body>
<div class="main">
<section class="pagehead">
    <div class="container">
        <nav role="navigation" class="navbar navbar-fixed-top pt10 navbar-custom" id="navbar">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" data-target="" data-toggle="collapse" class="navbar-toggle menu-icon">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-reorder light-grey"></i>
                    </button>
                    <?php
                        echo CHtml::link('<img class="rs-logo rs-hide" itemprop="image" src="'.Yii::app()->theme->baseUrl.'/style/newhome/images/logo.png" alt="VenturePact Logo" width="188" height="30">', array('/'),array('class'=>'navbar-brand rs-hide'));
                        echo CHtml::link('<img class="mobilelogo-show" itemprop="image" src="'.Yii::app()->theme->baseUrl.'/style/newhome/images/vp-logo.png" alt="VenturePact Logo" width="39" height="26">', array('/'),array('class'=>'navbar-brand'));
                    ?>
                </div>
                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right mt5">
                        <li id="search-icon" class="">
                            <a href="javascript:void(0);"><i class="fa fa-search"></i> &nbsp;Search</a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('/site/Categories');?>"><i class="fa fa-list"></i> &nbsp; Software Catagories</a>
                        </li>
                        <li>
                            <a class="boxlink" href="<?php echo Yii::app()->createUrl('/Product/Productregister');?>"><i class="fa fa-plus"></i> &nbsp; Add Product</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-icon"><i class="fa fa-reorder mr5"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <nav role="navigation" class="navbar navbar-white navbar-fixed-top navbarsearch">
            <div class="container">
                <div id="navbarCollapse" class="navbar-collapse">
                    <div class="navsearch-outr placeholder1">
                        <span aria-hidden="true" class="icon-magnifier search-searchicon"></span>
                        <div class="searcheader placeholder1">
                            <form action="<?php echo Yii::app()->createUrl('/product/index');?>" method="get" id="searchFormTop">
                                <select id="topsearch" name="value" multiple class="demo-default"  placeholder="What type of software are you looking for?"></select>
                            </form>
                        </div>
                        <a href="javascript:void(0);" class="search-close">
                            <i class="fa fa-close"></i>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</section>
<br>
<?php echo $content; ?>
<section class="section6">
    <div class="container">
        <h2 class="our-res">Resources</h2>
        <div class="col-md-12 col-sm-12 col-xs-12 np">
            <div class="col-md-4 col-sm-6 col-xs-12 pl0 mb20 our-r">
                <div class="col-sm-4 col-xs-4 pl0">
                    <span class="img-responsive or-img sprite-rsc spr1" alt="Outsourcing 101 eBook"></span>
                </div>
                <div class="col-sm-8 col-xs-8 np">
                    <a target="_blank" href="http://blog.venturepact.com/ebook-outsourcing-101-how-when-where-to-outsource" class="or-text">Outsourcing 101 eBook: How, When & Where to Outsource</a>
                    <a target="_blank" href="http://blog.venturepact.com/ebook-outsourcing-101-how-when-where-to-outsource" class="fl-link-new">Download Ebook <i class="fa fa-long-arrow-right fl-link-icon"></i></a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 pl0 mb20 our-r">
                <div class="col-sm-4 col-xs-4 pl0">
                    <span class="img-responsive or-img sprite-rsc spr2" alt="Outsourcing 102 eBook"></span>
                </div>
                <div class="col-sm-8 col-xs-8 np">
                    <a target="_blank" href="http://blog.venturepact.com/manage-communicate-and-release-effectively" class="or-text">Outsourcing 102 eBook: Manage, Communicate and Release, Effectively!</a>
                    <a target="_blank" href="http://blog.venturepact.com/manage-communicate-and-release-effectively" class="fl-link-new">Download Ebook <i class="fa fa-long-arrow-right fl-link-icon"></i></a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 pl0 mb20 our-r">
                <div class="col-sm-4 col-xs-4 pl0">
                    <span class="img-responsive or-img sprite-rsc spr3" alt="Mobile App Cost Calculator"></span>
                </div>
                <div class="col-sm-8 col-xs-8 np">
                    <!-- <a target="_blank" href="https://venturepact.com/costofbuildinganapp" class="or-text">Mobile App Cost Calculator</a>
                    <a target="_blank" href="https://venturepact.com/costofbuildinganapp" class="or-link">Access</a> -->
                    <a target="_blank" href="https://venturepact.com/mobile_app_price_calculator" class="or-text">Mobile App Cost Calculator</a>
                    <a target="_blank" href="https://venturepact.com/mobile_app_price_calculator" class="or-link">Access</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 pl0 mb20 our-r">
                <div class="col-sm-4 col-xs-4 pl0">
                    <span class="img-responsive or-img sprite-rsc spr4" alt="10 Software Enabled Businesses"></span>
                </div>
                <div class="col-sm-8 col-xs-8 np">
                    <a href="http://blog.venturepact.com/10-software-enabled-businesses-you-can-start-in-a-day-and-how" target="_blank" class="or-text">10 Software Enabled Businesses You Can Start in A Day (And How)</a>
                    <span class="or-link">April 6, 2015</span>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 pl0 mb20 our-r">
                <div class="col-sm-4 col-xs-4 pl0">
                    <span class="img-responsive or-img sprite-rsc spr5" alt="Outsourcing Software Development"></span>
                </div>
                <div class="col-sm-8 col-xs-8 np">
                    <a href="http://blog.venturepact.com/outsourcing-software-development-in-conversation-with-pratham-mittal/" target="_blank" class="or-text">Outsourcing Software Development: In Conversation with Pratham Mittal</a>
                    <span class="or-link">April 6, 2015</span>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 pl0 mb20 our-r">
                <div class="col-sm-4 col-xs-4 pl0">
                    <span class="img-responsive or-img sprite-rsc spr6" alt="Which Department Can I Outsource"></span>
                </div>
                <div class="col-sm-8 col-xs-8 np">
                    <a href="http://blog.venturepact.com/which-department-can-i-outsource/" target="_blank" class="or-text">Which Department Can I Outsource?</a>
                    <span class="or-link">April 6, 2015</span>
                </div>
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="col-md-3 col-sm-12 col-xs-12 rs-center mt30 pl0">
            <div class="footer-left">
                <h4>VenturePact - </h4>
                <span>Made in NY</span>
            </div>
            <div class="copyright">
                © 2015 VenturePact. All rights reserved.
            </div>
        </div>
        <div class="col-md-7 col-sm-12 col-xs-12 rs-center mt30">
            <ul class="footer-links rs-center">
                <li><a href="<?php echo Yii::app()->createUrl('/site/about');?>">Company</a></li>
                <li>.</li>
                <li><a href="<?php echo Yii::app()->createUrl('/site/features');?>">Features</a></li>
                <li>.</li>
                <li><a href="<?php echo Yii::app()->createUrl('/site/vettingProcess');?>">Vetting Process</a></li>
                <li>.</li>
                <li><a href="<?php echo Yii::app()->createUrl('/site/press');?>">Press</a></li>
                <li>.</li>
                <li><a href="<?php echo Yii::app()->createUrl('/site/faq');?>">FAQs</a></li>
                <li>.</li>
                <li><a href="<?php echo Yii::app()->createUrl('/site/categories');?>">Reviews</a></li>
                <li>.</li>
                <li><a href="<?php echo Yii::app()->createUrl('/site/partner');?>">For Developers</a></li>
                <li>.</li>
                <li><a href="<?php echo Yii::app()->createUrl('/site/affiliate');?>">For Affiliates</a></li>
                <li>.</li>
                <li><a href="https://angel.co/venturepact/jobs" target="_blank">We’re Hiring</a></li>
                <li>.</li>
                <li><a href="http://blog.venturepact.com/" target="_blank">Blog</a></li>
                <li>.</li>
                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#terms-conditions">Terms and Conditions</a></li>
            </ul>
        </div>
        <div class="col-md-2 col-sm-12 col-xs-12 social-links-main rs-center np">
            <a href="https://twitter.com/VenturePact" target="_blank" class="social-links" title="Twitter"><i class="fa fa-twitter"></i></a>
            <a href="https://www.facebook.com/VenturePact" target="_blank" class="social-links" title="Facebook"><i class="fa fa-facebook"></i></a>
            <a href="https://www.linkedin.com/company/venturepact" target="_blank" class="social-links" title="LinkedIn"><i class="fa fa-linkedin"></i></a>
            <a href="https://plus.google.com/+Venturepact/about" target="_blank" class="social-links" title="GooglePlus"><i class="fa fa-google-plus"></i></a>
        </div>
    </div>
</footer>
<section>
    <div class="menu-login-section">
        <div class="col-md-12 col-sm-12 col-xs-12 rs-p11">
            <div class="col-md-12 col-xs-12 rs-mt10 rs-np">
                <!--<a class="menu-close pull-right pa30 rs-np" id="menu-close" href="javascript:void(0);"><img alt="close" src="<?php //echo Yii::app()->theme->baseUrl.'/images/icon-close.png'; ?>" width="15" height='15' ></a>-->
                <a class="menu-close pull-right pa30 rs-np pl0 pr0" id="menu-close" href="javascript:void(0);">
                    <button class="c-hamburger c-hamburger--htx">
                        <span>toggle menu</span>
                    </button>
                </a>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 rs-np">
                <div class="col-md-6 col-xs-12 rs-np">
                    <div class="col-md-6 col-md-offset-5">
                    <?php if(Yii::app()->user->hasFlash('success')):?>
                        <div class="alert alert-success alert-dismissible alertMessage" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?php echo Yii::app()->user->getFlash('success'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if(Yii::app()->user->hasFlash('error')):?>
                        <div class="alert alert-danger1 alert-dismissible alertMessage" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?php echo Yii::app()->user->getFlash('error'); ?>
                        </div>
                    <?php endif; ?>
                    </div>
                    <div class="col-md-12 col-xs-12 rs-nm rs-p11 mt10">
                        <?php if(Yii::app()->user->isGuest){
                                $this->widget('WidgetHomeMenu');
                            }else{ ?>
                        <div class="col-md-7 col-md-offset-4 col-xs-12">
                            <div class="col-md-12 col-xs-12 np text-center">
                                <img width="90" height="90" src="<?php echo (!empty(Yii::app()->user->image))?Yii::app()->user->image:Yii::app()->theme->baseUrl."/style/images/userAvatarBig.png";?>" class="img-circle" alt="Team Member">
                                <h2 class="fs16  font_newregular ">Hey! <?php echo Yii::app()->user->fname;?></h2>
                                <p class="fs14 font_newregular pt5">Welcome to VenturePact</p>
                            </div>
                            <div class="col-md-12 col-xs-12 bt mt20 pt20 text-center np rs-hide">
                                <?php echo CHtml::link('<span class="icon-home mr5" aria-hidden="true"></span> Dashboard',array('/dashboard'),array('class'=>'fs13 font_newregular orange-new col-md-5 col-xs-12 pl0 pr10 mb5')); ?>
                                <?php echo CHtml::link('<span class="icon-settings mr5" aria-hidden="true"></span> Settings',array('/dashboard'),array('class'=>'fs13 font_newregular orange-new col-md-4 np pl0 pr10 mb5')); ?>
                                <?php echo CHtml::link('<span class="icon-power orange-light mr5" aria-hidden="true"></span> Logout',array('/site/logout'),array('class'=>'fs13 font_newregular orange-new col-md-3 np text-right mb5')); ?>
                            </div>
                            <div class="col-md-12 col-xs-12 bt mt20 pt20 pb20 text-center np rs-show">
                                <?php echo CHtml::link('<span class="icon-home mr5" aria-hidden="true"></span>',array('/'.Yii::app()->user->role.'/index'),array('class'=>'fs13 font_newregular orange-new col-md-5 col-xs-4 pl0 pr10 mb5')); ?>
                                <?php echo CHtml::link('<span class="icon-settings mr5" aria-hidden="true"></span>',array('/'.Yii::app()->user->role.'/account'),array('class'=>'fs13 font_newregular orange-new col-md-4 np col-xs-4 pl0 pr10 mb5')); ?>
                                <?php echo CHtml::link('<span class="icon-power orange-light mr5" aria-hidden="true"></span>',array('/site/logout'),array('class'=>'fs13 font_newregular orange-new col-md-3 np col-xs-4 mb5')); ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12  col-xs-12 login-border rs-mb20">
                    <div class="col-md-12 col-sm-12 col-xs-12 mt10 rs-np rs-nm rs-mb20">
                        <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-1 rs-np rs-mb20">
                            <ul class="login-menu fs14 font_newlight">
                                <li><a href="<?php echo Yii::app()->createUrl('/site/about');?>" class="blue-new">About Us</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('/site/vettingProcess');?>" class="blue-new">Vetting Process</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('/site/features');?>" class="blue-new">Features</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('/site/faq');?>" class="blue-new">FAQs</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('/site/referral');?>" class="blue-new">Referral</a></li>
                                <li><a href="http://blog.venturepact.com/" target="_blank" class="blue-new">Blog</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('/site/press');?>" class="blue-new">Press</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('/site/categories');?>" class="blue-new">Reviews</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('/site/partner');?>" class="blue-new">For Developers</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('/site/affiliate');?>" class="blue-new">For Affiliates</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-10 mt30 rs-nm pl25 rs-np rs-hide">
                        <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-1 np rs-np rs-mb20">
                            <div class="col-md-12 col-sm-12 col-xs-12 np pt10 pb10 bb">
                                <div class="col-md-12 col-sm-12 col-xs-12 np">
                                    <h3 class="fs16 blue-new font_newlight mt10 mb10 pb10 bb">Share now:</h3>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 pl0 ml0">
                                    <div class="col-md-12 col-sm-12 col-xs-12 np">
                                        <div class="col-md-2 col-sm-2 col-xs-4 np mr10">
                                            <a href="https://www.facebook.com/VenturePact" target="_blank" class="tm-facebook-small web-hover">
                                                <span class="web-show-small"></span>
                                                <i class="fa fa-facebook fs15 mt5"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-4 np mr10">
                                            <a href="https://twitter.com/VenturePact" target="_blank" class="tm-twitter-small web-hover">
                                                <span class="web-show-small"></span>
                                                <i class="fa fa-twitter fs15 mt5"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-4 np mr10">
                                            <a href="https://www.linkedin.com/company/venturepact" target="_blank" class="tm-linkedin-small web-hover">
                                                <span class="web-show-small"></span>
                                                <i class="fa fa-linkedin fs15 mt5"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-10 mt70 rs-nm pl25 rs-np rs-show">
                        <div class="col-md-1 col-sm-1 col-xs-1 mr10">
                            <a href="https://twitter.com/VenturePact" target="_blank" class="tm-twitter-small">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </div>
                        <div class="col-md-1 col-sm-1 col-xs-1 mr10">
                            <a href="https://www.facebook.com/VenturePact" target="_blank" class="tm-facebook-small">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </div>
                        <div class="col-md-1 col-sm-1 col-xs-1 mr10">
                            <a href="https://www.linkedin.com/company/venturepact" target="_blank" class="tm-linkedin-small">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<!-- Modal Terms&Conditions Start-->
<div class="modal fade" id="terms-conditions" role="dialog" aria-hidden="true" style="z-index:1060;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content col-md-12 mb30 np">
            <div class="modal-header pa20 new-modal-bg">
                <button data-dismiss="modal" class="pull-right close mt5" type="button">×</button>
                <h2 class="modal-title fs28 text-center font_newregular orange-new">Terms & Conditions</h2>
            </div>
            <div class="modal-body col-md-12 np p20">
                <p>
                    This Privacy Policy governs the manner in which VenturePact LLC.   collects, uses, maintains and discloses information collected from users   (each, a "User") of the VenturePact.com website ("Site"). This privacy   policy applies to the Site and all products and services offered by   VenturePact LLC.<br>
                    <br>
                    <strong class="orange-new">Personal identification information</strong><br>
                    <br>
                    We may collect personal identification information from Users in a   variety of ways, including, but not limited to, when Users visit our   site, register on the site, fill out a form, and in connection with   other activities, services, features or resources we make available on   our Site. Users may be asked for, as appropriate, name, email address.   Users may, however, visit our Site anonymously. We will collect personal   identification information from Users only if they voluntarily submit   such information to us. Users can always refuse to supply personally   identification information, except that it may prevent them from   engaging in certain Site related activities.<br>
                    <br>
                    <strong class="orange-new">Non-personal identification information</strong><br>
                    <br>
                    We may collect non-personal identification information about Users   whenever they interact with our Site. Non-personal identification   information may include the browser name, the type of computer and   technical information about Users means of connection to our Site, such   as the operating system and the Internet service providers utilized and   other similar information.<br>
                    <br>
                    <strong class="orange-new">How we use collected information</strong><br>
                    <br>
                    The VenturePact LLC may collect and use Users personal information for the following purposes:<br>
                    <br>
                    - To personalize user experience We may use information in the aggregate   to understand how our Users as a group use the services and resources   provided on our Site. <br>
                    - To send periodic emails If User decides to opt-in to our mailing list,   they will receive emails that may include company news, updates,   related product or service information, etc. If at any time the User   would like to unsubscribe from receiving future emails, they may do so   by contacting us via our Site.<br>
                    <br>
                    <strong class="orange-new">How we protect your information</strong><br>
                    <br>
                    We adopt appropriate data collection, storage and processing practices   and security measures to protect against unauthorized access,   alteration, disclosure or destruction of your personal information,   username, password, transaction information and data stored on our Site.<br>
                    <br>
                    <strong class="orange-new">Sharing your personal information</strong><br>
                    <br>
                    We do not sell, trade, or rent Users personal identification information   to others. We may share generic aggregated demographic information not   linked to any personal identification information regarding visitors and   users with our business partners, trusted affiliates and advertisers   for the purposes outlined above.<br>
                    <br>
                    <strong class="orange-new">Third party websites</strong><br>
                    <br>
                    Users may find advertising or other content on our Site that link to the   sites and services of our partners, suppliers, advertisers, sponsors,   licensors and other third parties. We do not control the content or   links that appear on these sites and are not responsible for the   practices employed by websites linked to or from our Site. In addition,   these sites or services, including their content and links, may be   constantly changing. These sites and services may have their own privacy   policies and customer service policies. Browsing and interaction on any   other website, including websites which have a link to our Site, is   subject to that website's own terms and policies.<br>
                    <br>
                    <strong class="orange-new">Engagement between Development firm and Client</strong><br>
                    <br>
                    Once a contract is signed between the Development firm and the Client the relationship and contract will be between the two parties. It is the development firm's responsibility to provide the services on time and the Client and development firm are both responsible to communicate regularly and promptly. It is the clients responsibility to make the necessary payments on time. VenturePact cannot be sued or held accountable by either party for issues that arise between the Development firm and the Client during their engagement.<br>
                    <br>
                    <strong class="orange-new">Compliance with children's online privacy protection act</strong><br>
                    <br>
                    Protecting the privacy of the very young is especially important. For   that reason, we never collect or maintain information at our Site from   those we actually know are under 13, and no part of our website is   structured to attract anyone under 13.<br>
                    <br>
                    <strong class="orange-new">Changes to this privacy policy</strong> VenturePact LLC has the discretion to update this privacy policy at any   time. When we do, we will post a notification on the main page of our   Site. We encourage Users to frequently check this page for any changes   to stay informed about how we are helping to protect the personal   information we collect. You acknowledge and agree that it is your   responsibility to review this privacy policy periodically and become   aware of modifications.<br>
                    <br>
                    <strong class="orange-new">Your acceptance of these terms</strong> By using this Site, you signify your acceptance of this policy. If you   do not agree to this policy, please do not use our Site. Your continued   use of the Site following the posting of changes to this policy will be   deemed your acceptance of those changes.<br>
                    <br>
                    <strong class="orange-new">Contacting us</strong><br>
                    <br>
                    If you have any questions about this Privacy Policy, the practices of   this site, or your dealings with this site, please contact us at:<br>
                    <br>
                    <a href="mailto:Questi%6F%6Es@%56%65%6Etur%65Pact%2Ec%6Fm">Questions@VenturePact.com</a>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Modal End-->
<!-- Page Scripts -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js" async ></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/js/selectize.min.js" async></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.0.7/parsley.min.js" async></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/js/animo.js" async></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/js/validate.js" async></script>
<!-- <script src="<?php //echo Yii::app()->theme->baseUrl; ?>/style/newhome/js/bootstrap.min.js"></script> -->
 <script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/js/selectize.js"></script>
<!--<script src="<?php //echo Yii::app()->theme->baseUrl; ?>/style/newhome/js/selectize-main.js"></script>
<script src="<?php //echo Yii::app()->theme->baseUrl; ?>/style/newhome/js/jquery.flexslider.js" async></script>-->
<!-- <script src="<?php //echo Yii::app()->theme->baseUrl; ?>/style/js/parsley.min.js" async></script> -->
<script type="text/javascript">
$(document).ready(function() {

    $('#searchFormTop').trigger("reset");
    $('#topsearch').selectize({
        theme: 'links',
        //maxItems: null,
        valueField: 'id',
        searchField: 'title',
        sortField: 'title',
        maxItems: 2,
        openOnFocus:false,
        closeAfterSelect: true,
        maxOptions:5,
        options: [
            <?php $categories=Categories::model()->findAllByAttributes(array('status'=>1));
                foreach($categories as $category){?>
                    {id: "<?php echo $category->name;?>", title: '<?php echo $category->name;?>', category: 'Skill'},
            <?php } ?>
        ],
        render: {
            option: function(data, escape) {
                return  '<div class="option">'+
                            '<span class="title">' + escape(data.title) + '</span>' +
                            '<span class="tag">' + escape(data.category) + '</span>' +
                        '</div>';
            },
            item: function(data, escape) {
                return '<div class="item"><a href="' + escape(data.category) + '">' + escape(data.title) + '</a></div>';
            }
        },
        onChange: function() { $('#searchFormTop').submit();},
    });
    $('.callTag').click(function(){
        var data = $(this).attr('data-name');
        select12 = searchSel[0].selectize;
        select12.setValue(data);
    });
    $('.selectize-input').find('input').css('width','412');
    $('#searchFormTop').submit(function(){
        localStorage.clear();
        return true;
    });

    $('#search-icon-mob a').click(function(){
        $('#navbar').animo({
            animation: "fadeOutRight",
            duration: 0.3,
            keep: true
        }, function(){
            $('#navbar').hide();
            $('.navbarsearch').show().animo({
                animation: "fadeInLeft",
                duration: 0.3,
                keep: true
            });
        });
    });
    $('#search-icon a').click(function(){
        $('#navbar').animo({
            animation: "fadeOutRight",
            duration: 0.3,
            keep: true
        }, function(){
            $('#navbar').hide();
            $('.navbarsearch').show().animo({
                animation: "fadeInLeft",
                duration: 0.3,
                keep: true
            });
        });
    });
    $('.search-close').click(function(){
        $('.navbarsearch').animo({
            animation: "fadeOutLeft",
            duration: 0.3,
            keep: true
        }, function(){
            $('.navbarsearch').hide();
            $('#navbar').show().animo({
                animation: "fadeInRight",
                duration: 0.3,
                keep: true
            });
        });
    });

    $(":input").focusout(function(){
        $(this).parsley().validate();
    });

    $('#passButSat').on("click",function(){
        var elem    =   $('#forget-form-email');
        if(elem.val().length>0){
            if(testEmail(elem.val())){
                $('#passButSat').val('Please Wait');
                $.ajax({
                    type: 'POST',
                    url :"<?php echo Yii::app()->createUrl('site/forgot');?>",

                    data:$("#forget-form").serialize(),
                    success :function(data){
                        var response = JSON.parse(data);
                        console.log('Element is :'+elem);
                        if(response.success=='1'){
                            elem.val('');
                            $('.messageResponse').html(response.message);
                            $(".alert_message").show();
                            $('#resetpass').addClass('hide');
                            $('#repsoneRest').removeClass('hide');
                            var ErrID   =   elem.attr('data-parsley-id')
                            $('#parsley-id-satn-'+ErrID).html('');
                            $('#passButSat').val('Reset Password');
                            $(".signin").show();
                            $(".forgot-password").hide();

                        }
                        else{
                            elem.addClass('parsley-error');
                            var ErrID   =   elem.attr('data-parsley-id')
                            $('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">'+response.message+'</li>');
                            $('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
                            $('#signupButSat').attr('type','button');
                            $('#passButSat').val('Reset Password');
                        }
                    }
                });
            }
            else{
                elem.addClass('parsley-error');
                var ErrID   =   elem.attr('data-parsley-id')
                $('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">This is not a valid email address.</li>');
                $('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
            }
        }
        else{
            elem.addClass('parsley-error');
            var ErrID   =   elem.attr('data-parsley-id')
            $('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">This is required field.</li>');
            $('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
        }
    });
    $(".menu-icon").click(function(){
        $(".menu-login-section").fadeIn(400);
        if(!$(".menu-close > button").hasClass('is-active'))
            $(".menu-close > button").addClass('is-active');
    });
    $(".menu-close").click(function(){
        $(".menu-login-section").fadeOut(400);
        if($(".menu-close > button").hasClass('is-active'))
            $(".menu-close > button").removeClass('is-active');
    });

    $(".forgot-passwordDiv").click(function(){
        $(".signin").hide();
        $(".forgot-password").show();
    });
    $(".create-accDiv").click(function(){
        $(".signin").hide();
        $(".create-acc").show();
    });
    $(".create-accDiv").click(function(){
        $(".forgot-password").hide();
        $(".create-acc").show();
    });
    $(".signin-div").click(function(){
        $(".create-acc").hide();
        $(".signin").show();
    });
    <?php if(isset($_REQUEST['login']) && $_REQUEST['login']==1){?>
    $(".menu-icon").trigger('click');
    <?php } ?>
});
</script>

</body>
</html>
<!DOCTYPE html>
<html>
    <head>
    <!--Code for Canonical URLs-->
    <?php
    if((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443)
    {
        $actual_link    =   'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $seo_link       =   'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
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
    <link rel="shortcut icon" href="https://venturepact.com/favicon.ico">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

  <link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/css/dashboard.css" rel="stylesheet">
</head>
<body>
  <section class="container-fluid dash-container">
    <nav class="nav-left">
      <ul class="dash-logo">
        <li>
          <a href="#">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/images/vp-logo.png" alt="vp_logo">
            <span>VenturePact</span>
          </a>
        </li>
      </ul>
      <ul class="nav-option">
        <li>
          <a href="#">
            <i class="fa fa-plus-circle fa-1x"></i><span>Add&nbspProduct</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-home fa-1x"></i><span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-cogs fa-1x"></i><span>User&nbspAccount&nbspSettings</span>
          </a>
        </li>
      </ul>
      <ul class="logger-options">
        <li>
          <a href="#">
            <i class="fa fa-sign-out"></i><span>Sign&nbspOut</span>
          </a>
        </li>
      </ul>
    </nav>
    <section class="main-content">
        <header class="dash-row">
            <figure></figure>
        </header>
        <?php echo $content; ?>
    </section>
  </section>
  <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>
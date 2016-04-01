<!DOCTYPE html>
  <html>
    <head>
    <!--Code for Canonical URLs-->
    <?php
    if((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443){
      $actual_link    =   'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
      $seo_link       =   'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
      echo '<link rel="canonical" href="'.$seo_link.'"/>';
    }
    ?>
      <title><?php echo isset($this->pageTitle) ? $this->pageTitle : Yii::app()->name; ?>
      </title>
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
    </head>
    <body>
      
    </body>
  </html>
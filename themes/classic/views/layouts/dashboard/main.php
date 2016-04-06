<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      if((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443){
        $actual_link  = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $seo_link   = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        echo '<link rel="canonical" href="'.$seo_link.'"/>';
      }
    ?>
    <!-- Title -->
    <title><?php echo isset($this->pageTitle) ? $this->pageTitle : Yii::app()->name; ?></title>
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

    <!-- Bootstrap core CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/lineicons/style.css">
    <!-- Custom styles for this template -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/css/style.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/css/style-responsive.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/css/dash-style.css" rel="stylesheet">
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/js/chart-master/Chart.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    footer {
    position: fixed;
    bottom: 0;
    width: 100%;
}
.chmg{
  color: #fff;
  position: absolute;
  display: none;
}
#changeProfileImg:hover .chmg{
  display: inline-block;
}
.modal-body {
    max-height: calc(100vh - 212px);
    overflow-y: auto;
}
    </style>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/css/bootstrap-multiselect.css">
    <script type="text/javascript">
(function(a){if(window.filepicker){return}var b=a.createElement("script");b.type="text/javascript";b.async=!0;b.src=("https:"===a.location.protocol?"https:":"http:")+"//api.filestackapi.com/filestack.js";var c=a.getElementsByTagName("script")[0];c.parentNode.insertBefore(b,c);var d={};d._queue=[];var e="pick,pickMultiple,pickAndStore,read,write,writeUrl,export,convert,store,storeUrl,remove,stat,setKey,constructWidget,makeDropPane".split(",");var f=function(a,b){return function(){b.push([a,arguments])}};for(var g=0;g<e.length;g++){d[e[g]]=f(e[g],d._queue)}window.filepicker=d})(document);
</script>
  </head>
  <body>
    <section id="container" >
      <!--header start-->
      <header class="header black-bg">
        <div class="sidebar-toggle-box">
          <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="<?php echo Yii::app()->createUrl('/dashboard');?>" class="logo"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/images/vp_icon.png"><b>VenturePact</b></a>
        <!--logo end-->
        <div class="top-menu">
          <ul class="nav pull-right top-menu">
            <li>
            <?php echo CHtml::link('<i class="fa fa-sign-out"></i> Logout',array('/site/logout'),array('class'=>'logout')); ?>
            </li>
          </ul>
        </div>
      </header>
      <!--header end-->
      <!--sidebar start-->
      <?php $product = Product::model()->findAllByAttributes(array('user_id'=>Yii::app()->user->user_id),array('select'=>'name,id')); ?>
      <aside>
        <div id="sidebar"  class="nav-collapse ">
          <!-- sidebar menu start-->
          <?php $user = Users::model()->findByPk(Yii::app()->user->user_id);?>
          <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="#" id="changeProfileImg"><img src="<?php echo (!empty($user->profile_img))?$user->profile_img:Yii::app()->theme->baseUrl."/style/newhome/images/pic.png";?>" class="img-circle" width="60"></a><small class="chmg">change Image</small>
            </p>
              <h5 class="centered">

              <?php echo $user->first_name;?>
              </h5>
              <li class="mt">
                <a id="dashboard" class="active" href="<?php echo Yii::app()->createUrl('/dashboard');?>">
                  <i class="fa fa-dashboard"></i>
                  <span>Dashboard</span>
                </a>
              </li>

              <li>
                <a id="addProduct" href="javascript:void(0);" data-toggle="modal" data-target="#addNewProduct">
                  <i class="fa fa-plus"></i>
                  <span>Add Product</span>
                </a>
              </li>

              <li class="sub-menu">
                <a id="editProduct" href="#" >
                  <i class="fa fa-pencil"></i>
                  <span>Edit Product</span>
                </a>
                <ul class="sub">
                  <?php if(count($product) >= 1):?>
                      <?php foreach ($product as $prodDetails): ?>
                        <li>
                          <a href="<?php echo $this->createUrl('Productsetting',array('id'=>$prodDetails->id)); ?>">
                            <?php echo $prodDetails->name; ?>
                          </a>
                        </li>
                      <?php endforeach; ?>
                  <?php else: ?>
                    <li><a href="#">No Product</a></li>
                  <?php endif; ?>
                </ul>
              </li>

              <li class="sub-menu">
                <a id="editProduct" href="#" >
                  <i class="fa fa-bars"></i>
                  <span>Show Stats</span>
                </a>
                <ul class="sub">
                  <?php if(count($product) >= 1):?>
                      <?php foreach ($product as $prodDetails): ?>
                        <li>
                          <a href="<?php echo $this->createUrl('ShowStats',array('id'=>$prodDetails->id)); ?>">
                            <?php echo $prodDetails->name; ?>
                          </a>
                        </li>
                      <?php endforeach; ?>
                  <?php else: ?>
                    <li><a href="#">No Product</a></li>
                  <?php endif; ?>
                </ul>
              </li>

              <?php if($user->oauth_uid):?>
                <li class="sub-menu">
                  <a href="javascript:;" >
                    <i class="fa fa-cogs"></i>
                    <span>User Account Settings</span>
                  </a>
                  <ul class="sub">
                    <li><a  href="<?php echo $this->createUrl('viewprofile');?>">View Profile</a></li>
                    <li><a  href="<?php echo $this->createUrl('socialnetworks');?>">Social Networks</a></li>
                  </ul>
                </li>
              <?php else: ?>
                <li>
                  <a id="usersetting" href="<?php echo $this->createUrl('usersetting');?>">
                    <i class="fa fa-cogs"></i>
                    <span>User Account Settings</span>
                  </a>
                </li>
              <?php endif; ?>
            </ul>
            <!-- sidebar menu end-->

        </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
        <?php echo $content;?>
        
      </section>
    <!--footer start-->
      <footer class="site-footer">
        <div class="text-center">
          2016 - VenturePact
        </div>
      </footer>
    <!--footer end-->
    </section>

  <div id="addNewProduct" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Add New Product</h4>
        </div>
        <?php $form=$this->beginWidget('CActiveForm', array('id'=>"formAddNewProduct",'htmlOptions'=>array('class'=>"panel-default",'data-parsley-validate'=>'data-parsley-validate')));?>
          <div class="modal-body">
            <label>Product Name</label>
            <div class="input-group">
              <span class="input-group-addon">
                <i class="glyphicon glyphicon-star-empty"></i>
              </span>
              <input type="text" class="form-control" placeholder="Product Name" id="productName">
            </div><br>
            <label>Product Description</label>
            <div class="input-group">
              <span class="input-group-addon">
                <i class="glyphicon glyphicon-pencil"></i>
              </span>
              <textarea class="form-control" placeholder="Product Description" id="productDescription"></textarea>
            </div><br>
            <label>Product Website</label>
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-internet-explorer"></i>
              </span>
              <input type="text" class="form-control" placeholder="Product Website" id="productWebsite">
            </div><br>
            <label>Product Category</label>
            <div class="input-group">
              <span class="input-group-addon">
                <i class="glyphicon glyphicon-bookmark"></i>
              </span>
              <?php
              $categories = Categories::model()->findAll();
              $categoryNames = array();
              foreach ($categories as $category)
                array_push($categoryNames,$category->name);
              echo $form->dropDownList($category,'name',$categoryNames,array('id'=>"productCategory",'multiple'=>"multiple",'class'=>'form-control'));
              ?>
            </div><br>
            <label>Product Features</label>
            <div class="input-group">
              <span class="input-group-addon">
                <i class="glyphicon glyphicons-life-preserver"></i>
              </span>
              <select class="form-control" multiple="multiple" id="productFeatures" name="features">
                <option value="1">features1</option>
                <option value="2">features2</option>
                <option value="3">features3</option>
                <option value="4">features4</option>
              </select>
            </div><br>
            <label>Starting Price</label>
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-money"></i>
              </span>
              <input type="text" class="form-control" placeholder="Product's Starting Price" id="startingPrice">
            </div><br>
            <label>Number of users</label>
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-users"></i>
              </span>
              <input class="form-control" type="text" name="user_count" placeholder="Number of user counts" id="user_count">
            </div><br>
            <div class="input-group">
              <label>Trial Available</label>
              <select name="trial" id="trial" class="form-control">
                <option value="">Select</option>
                <option value="trial">Yes</option>
                <option value="no_trial">No</option>
              </select>
            </div><br>
            <div class="input-group">
              <label>Free Version Available</label>
              <select name="ferr" id="free" class="form-control">
                <option value="">select</option>
                <option value="free">Yes</option>
                <option value="not_free">No</option>
              </select>
            </div><br>
            <div class="input-group">
              <label>Deployement Detail</label>
              <select name="ferr" id="free" class="form-control">
                <option value="">select</option>
                <option value="Mobile">Mobile</option>
                <option value="Desktop">Desktop</option>
                <option value="Web">Web</option>
              </select>
            </div><br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger">Reset</button>
            <button type="button" class="btn btn-primary">Add</button>
          </div>
        <?php $this->endWidget(); ?>
      </div>
    </div>
  </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
   <!--  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/js/jquery-1.8.3.min.js"></script> -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/js/jquery.sparkline.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/js/common-scripts.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/js/sparkline-chart.js"></script>


<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/js/prettify.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/js/bootstrap-multiselect.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#category').multiselect({
      enableFiltering: true
    });
    $('#features').multiselect({
      enableFiltering: true
    });
    $('#productCategory').multiselect({
      enableFiltering: true
    });
    $('#productFeatures').multiselect({
      enableFiltering: true
    });
    $("#formAddNewProduct").parsley().validate();
  });


  var yourApiKey = 'A6TyxFZ2QSHOoQEcmsQA3z'
filepicker.setKey(yourApiKey);

document.getElementById("changeProfileImg").onclick = function(){
  filepicker.pick({
      services: ['COMPUTER', 'FACEBOOK', 'CLOUDAPP'],
      mimetype:'image/*',
      cropRatio:1,
      cropForce:true,
    },
    function onSuccess(Blob){
      var image = document.getElementById("imgPlaceholder");
      alert(Blob.url);
    }
  );
};
</script>
  </body>
</html>

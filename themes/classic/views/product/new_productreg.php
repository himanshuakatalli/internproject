<!DOCTYPE html>
<html>
<head>
  <title>Product Registration</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/style/newhome/css/reset.css">
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/style/newhome/css/new_prod.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <section class="container prod-reg-container">
    <hgroup class="row">
      <h1>Create a free listing on VenturePact</h1>
      <hr class="center-half">
    </hgroup>
    <form class="container-fluid">


      <h2>About You</h2>
      <div class="row">
        <div class="input-half">
          <i class="fa fa-user col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
          <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="first_name" placeholder="First Name">
        </div>
        <div class="input-half float-right">
          <i class="fa fa-user col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
          <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="last_name" placeholder="Last Name">
        </div>
      </div>
      <div class="row">
        <div class="input-half">
          <i class="fa fa-envelope col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
          <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="email" name="email" placeholder="Email">
        </div>
        <div class="input-half float-right">
          <i class="fa fa-phone col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
          <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="mobile" placeholder="Mobile Number">
        </div>
      </div>

      <div class="row">
        <div class="input-half-submit">
          <input type="button" value="Company Detail" id="user"></input>
        </div>
      </div>
		</form>	
		</section>
					
	<section class="container prod-reg-container" id="about_company" style="display: none">
	<form class="container-fluid">
	      <h2>About Your Company</h2>
	      <div class="row">
	        <div class="input-half">
	          <i class="fa fa-building col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
	          <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="company_name" placeholder="Company Name">
	        </div>
	        <div class="input-half float-right">
	          <i class="fa fa-globe col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
	          <select class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
	            <option>Select Country</option>
	            <option>Afghan</option>
	            <option>India</option>
	          </select>
	        </div>
	      </div>
	      <div class="row">
	        <div class="input-half">
	          <i class="fa fa-internet-explorer col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
	          <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="email" name="company_website" placeholder="Company's Website">
	        </div>
	        <div class="input-half float-right">
	          <i class="fa fa-calendar col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
	          <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="founding_year" placeholder="Company's Founding Year">
	        </div>
	      </div>
	      <div class="row">
        <div class="input-half-submit">
          <input type="button" value="Product Detail" id="company"></input>
        </div>
      </div>
	      </form>
	    </section>

		<section class="container prod-reg-container" id="about_product" style="display: none">
		<form class="container-fluid">
     <h2>About Your Product</h2>
     <div class="row">
       <div class="input-half">
         <i class="fa fa-product-hunt col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
         <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="product_name" placeholder="Product's Name">
       </div>
       <div class="input-half float-right">
         <i class="fa fa-internet-explorer col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
         <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="product_website" placeholder="Product's Website">
       </div>
     </div>
     <div class="row">
       <div class="input-full">
         <i class="fa fa-bars col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
         <textarea class="col-lg-11 col-md-11 col-sm-11 col-xs-11" placeholder="Product's Description"></textarea>
       </div>
     </div>
     <div class="row">
       <div class="input-half resp-half">
         <i class="fa fa-codiepie col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
         <select class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
           <option>Select a category</option>
           <option>360 Hosting</option>
           <option>Accouting</option>
         </select>
       </div>
       <div class="input-half float-right">
         <i class="fa fa-users col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
         <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="user_count" placeholder="Average Customer Count">
       </div>
     </div>
    <div class="row">
      <div class="input-half-radio">
         <input type="radio" id="trial0" name="trial" checked></input>
         <label for="trial0" class="col-lg-6">Trial Available</label>
         <input type="radio" id="trial1" name="trial"></input>
         <label for="trial1" class="col-lg-6">No Trial Available</label>
      </div>
      <div class="input-half-radio float-right">
         <input type="radio" id="free0" name="free_version" checked></input>
         <label for="free0" class="col-lg-6">Has Free Version</label>
         <input type="radio" id="free1" name="free_version"></input>
         <label for="free1" class="col-lg-6">Only Paid</label>
       </div>
    </div>
     	<div class="row">
       <div class="input-half">
         <i class="fa fa-money col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
         <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="starting_price" placeholder="Product's Starting Price">
       </div>
     	</div>
     	<div class="row">
        <div class="input-half-submit">
          <input type="button" value="Deployment Detail" id="product"></input>
        </div>
      </div>
     </form>
     </section>

    <section class="container prod-reg-container" id="product_deployment" style="display: none">
		<form class="container-fluid">
     <h2>Product's Deployment Type</h2>
     	<div class="row">
       	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 input-triad">
        	<input type="checkbox" name="web" id="web">
         	<label class="col-lg-12" for="web">
          <i class="fa fa-globe"></i>&nbsp;&nbsp;Web
         	</label>
       	</div>
       	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 input-triad">
         	<input type="checkbox" name="mobile" id="mobile">
         	<label class="col-lg-12" for="mobile">
          <i class="fa fa-phone"></i>&nbsp;&nbsp;Mobile
         	</label>
       	</div>
       	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 input-triad">
         	<input type="checkbox" name="desktop" id="desktop">
         	<label class="col-lg-12" for="desktop">
           <i class="fa fa-desktop"></i>&nbsp;&nbsp;Desktop
         	</label>
       	</div>
     	</div>
			<div class="row">
        <div class="input-half-submit">
          <input type="button" value="Media Link Detail" id="deployment"></input>
        </div>
      </div>
     </form>
     </section>
     
		<section class="container prod-reg-container" id="media_link" style="display: none">
		<form class="container-fluid">
     	<h2>Product's Social Media Link</h2>
     	<div class="row">
      	<div class="input-half">
         <i class="fa fa-google-plus col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
         <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="googleplus" placeholder="GooglePlus Link">
       	</div>
       	<div class="input-half float-right">
         <i class="fa fa-facebook-f col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
         <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="facebook" placeholder="Facebook Link">
       	</div>
     	</div>
     	<div class="row">
       	<div class="input-half">
        	<i class="fa fa-linkedin col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
        	<input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="linkedin" placeholder="Linkedin Link">
       	</div>
       	<div class="input-half float-right">
         	<i class="fa fa-youtube col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
         	<input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="youtube" placeholder="Youtube Link">
       	</div>
     	</div>
     <div class="row">
       <div class="input-half-submit">
         <input type="button" value="Create my free listing" name="submit"></input>
       </div>
     </div>
  </form>
  </section>
</body>
<script type="text/javascript">
 $(document).ready(function() {
	$('#user').click(function() {

		$('#about_company').toggle();
		$('#user').toggle();

    $('html,body').animate({
        scrollTop: $('#about_company').css('top')
    }, 1000)
	});

	$('#company').click(function() {

		$('#about_product').toggle();
		$('#company').toggle();

    $('html,body').animate({
        scrollTop: $('#about_product').css('top')
    }, 1000)
	});


	$('#product').click(function() {

		$('#product_deployment').toggle();
		$('#product').toggle();

    $('html,body').animate({
        scrollTop: $('#product_deployment').css('top')
    }, 1000)
	});

	$('#deployment').click(function() {

		$('#media_link').toggle();
		$('#deployment').toggle();

    $('html,body').animate({
        scrollTop: $('#media_link').css('top')
    }, 1000)
	});


});
</script>
</html>
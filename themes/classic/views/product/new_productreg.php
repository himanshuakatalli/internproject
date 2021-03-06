<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/style/newhome/css/new_prod.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/css/bootstrap-multiselect.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.0.7/parsley.min.js"></script>
<style type="text/css">
  #selCat {
    float: left;
    border: 1px solid rgba(0,0,0,0.15);

    transition: all 0.3s ease-in;
  }
  #selCat i {
    height: 42px;
    width: 8.33%;
    background: #fff;
    padding-top: 14px;
    color: rgba(0,0,0,0.4) !important;
  }
  #selCat .btn-group{
    width: 91.67%;
    box-shadow: none;
  }
  #selCat .btn-group button{
    background: none;
    width: 100%;
    height:42px;
    border: none;
    box-shadow: none;
  }
  #selCat .btn-group button:hover{
    background: none;
  }
  #selCat .btn-group ul{
    width: 100%;
  }
  #selCat .btn-group ul li:first-of-type div {
    width: 100% !important;
    margin: 0 !important;
  }
  #selCat .btn-group ul li:first-of-type div span {
    display: none;
  }
  #selCat .btn-group ul li:first-of-type div input {
    border: none;
    border-bottom: 1px solid rgba(0,0,0,0.4);
  }
</style>
<?php $form = $this->beginWidget('CActiveForm',array('id'=>'add_project','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>'container-fluid','data-parsley-validate'=>'data-parsley-validate')));?>
<section class="container prod-reg-container">
		<hgroup class="row">
			<h1>Create a free listing on VenturePact</h1>
			<hr class="center-half"/>
		</hgroup>
		<!-- <form class="container-fluid"> -->
			<h2>About You</h2>
			<div class="row">
				<div class="input-half">
					<i class="fa fa-user col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
					<!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="first_name" placeholder="First Name"> -->
					<?php echo $form->textField($user,'first_name',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'First Name','data-parsley-trigger'=>"focusout", 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'data-parsley-minlength'=>"2",'required'=>'required'));?>
				</div>
				<div class="input-half float-right">
					<i class="fa fa-user col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
					<!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="last_name" placeholder="Last Name"> -->
					<?php echo $form->textField($user,'last_name',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'Last Name','data-parsley-trigger'=>"focusout"));?>
				</div>
			</div>
			<div class="row">
				<div class="input-half">
					<i class="fa fa-envelope col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
					<!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="email" name="email" placeholder="Email"> -->
					<?php echo $form->emailField($user,'username',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'Email','data-parsley-trigger'=>"focusout",'data-parsley-type'=>"email",'required'=>'required'));?>
				</div>
				<div class="input-half float-right">
					<i class="fa fa-phone col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
					<!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="mobile" placeholder="Mobile Number"> -->
					<?php echo $form->textField($user,'phone_number',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'Mobile Number','data-parsley-trigger'=>"focusout",'data-parsley-type'=>"number"));?>
				</div>
			</div>

			<div class="row">
				<div class="input-half-submit">
					<input type="button" value="Company Detail" id="user"/>
				</div>
			</div>

		<!-- </form>   -->
		</section>

	<section class="container prod-reg-container" id="about_company" style="display: none">
	<!-- <form class="container-fluid"> -->


				<h2>About Your Company</h2>
				<div class="row">
					<div class="input-half">
						<i class="fa fa-building col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
						<!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="company_name" placeholder="Company Name"> -->
						<?php echo $form->textField($product,'company_name',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'Company Name','data-parsley-trigger'=>"focusout",'required'=>'required'));?>
					</div>
					<div class="input-half float-right">
						<i class="fa fa-globe col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
						<!-- <select class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
							<option>Select Country</option>
							<option>Afghan</option>
							<option>India</option>
						</select> -->
						<?php
							$countries = ProductController::getCountryNames();
							echo $form->dropDownList($product,'founding_country',$countries,array('prompt'=>'Select Country','class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','data-parsley-trigger'=>"focusout",'required'=>"required"));?>
					</div>
				</div>
				<div class="row">
					<div class="input-half">
						<i class="fa fa-globe col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
						<!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="email" name="company_website" placeholder="Company's Website"> -->
						<?php echo $form->textField($product,'company_website',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'Company Website','data-parsley-trigger'=>"focusout",'data-parsley-type'=>"url",'required'=>'required'));?>
					</div>
					<div class="input-half float-right">
						<i class="fa fa-calendar col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
						<!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="founding_year" placeholder="Company's Founding Year"> -->
						<?php echo $form->textField($product,'founding_year',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'Founding Year','required'=>'required','data-parsley-trigger'=>"focusout",'data-parsley-type'=>'digits','data-parsley-minlength'=>'4'));?>
					</div>
				</div>
				<div class="row">
				<div class="input-half-submit">
					<input type="button" value="Product Detail" id="company"/>
				</div>
			</div>

				<!-- </form> -->
			</section>

		<section class="container prod-reg-container" id="about_product" style="display: none">
		<!-- <form class="container-fluid"> -->


		 <h2>About Your Product</h2>
		 <div class="row">
			 <div class="input-half">
				 <i class="fa fa-plug col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
				 <!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="product_name" placeholder="Product's Name"> -->
				 <?php echo $form->textField($product,'name',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'Product Name','required'=>'required','title'=>"Product Name",'data-parsley-trigger'=>"focusout",'data-parsley-minlength'=>"2",'length'=>"2"));?>
			 </div>
			 <div class="input-half float-right">
				 <i class="fa fa-globe col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
				 <!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="product_website" placeholder="Product's Website"> -->
				 <?php echo $form->textField($product,'product_website',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','required'=>'required','data-parsley-trigger'=>"focusout",'data-parsley-type'=>"url",'placeholder'=>'Product Website'));?>
			 </div>
		 </div>
		 <div class="row">
			 <div class="input-full">
				 <i class="fa fa-bars col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
				 <!-- <textarea class="col-lg-11 col-md-11 col-sm-11 col-xs-11" placeholder="Product's Description"></textarea> -->
				 <?php echo $form->textArea($product,'description',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'Product Description','required'=>'required','data-parsley-trigger'=>"focusout",'data-parsley-minlength'=>"20"));?>
			 </div>
		 </div>
		 <small class="pull-left">Select Category</small>
		 <div class="row">
			 <div class="pull-left input-half" id="selCat">
				 <i class="fa fa-check-circle col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
				 <!-- <select class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
					 <option>Select a category</option>
					 <option>360 Hosting</option>
					 <option>Accouting</option>
				 </select> -->
				 <?php
					$categories = Categories::model()->findAll();
					/*$categoryNames = array();
					foreach ($categories as $category)
						array_push($categoryNames,$category->name);*/
					$list = CHtml::listData($categories,'id','name');
					echo $form->dropDownList($category,'id',$list,array('prompt'=>'Select Category','class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','multiple'=>'multiple','required'=>'required','data-parsley-trigger'=>"focusout"));
					/*$data= CHtml::listData(Categories::model()->findAll(), 'id', 'name');
					echo $form->widget('ext.EchMultiSelect.EchMultiSelect', array('model'=>$category,
						'dropDownAttribute'=>'name','data'=>$data,'dropDownHtmlOptions'=>array('style'=>'width:378px;')));*/
				 ?>
			 </div>
			 <div class="input-half float-right">
				 <i class="fa fa-users col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
				 <!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="user_count" placeholder="Average Customer Count"> -->
				 <?php echo $form->textField($product,'customer_count',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'Average Customer Count','data-parsley-trigger'=>"focusout",'data-parsley-type'=>'digits'));?>
			 </div>
		 </div>
		<div class="row">
			<div class="input-half-radio">
				 <input type="radio" id="trial0" name="trial" value="trial" checked/>
				 <label for="trial0" class="col-lg-6">Trial Available</label>
				 <input type="radio" id="trial1" name="trial" value="no_trial"/>
				 <label for="trial1" class="col-lg-6">No Trial Available</label>
				 <!-- <?php echo $form->radioButtonList($product,'has_trial',array('trial'=>'Has Trial','no_trial'=>'No Trial Available'),array('labelOptions'=>array('class'=>'col-lg-6'),'separator'=>''));?> -->
			</div>
			<div class="input-half-radio float-right">
				 <input type="radio" id="free0" name="free_version" value="free" checked/>
				 <label for="free0" class="col-lg-6">Has Free Version</label>
				 <input type="radio" id="free1" name="free_version" value="no_free"/>
				 <label for="free1" class="col-lg-6">Only Paid</label>
				 <!-- <?php echo $form->radioButtonList($product,'has_free_version',array('free'=>'Has Free Version','no_free'=>'Only Paid'),array('labelOptions'=>array('class'=>'col-lg-6'),'separator'=>''));?> -->
			 </div>
		</div>
			<div class="row">
			 <div class="input-half">
				 <i class="fa fa-money col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
				 <!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="starting_price" placeholder="Product's Starting Price"> -->
				 <?php echo $form->textField($product,'starting_price',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'Starting Price','data-parsley-trigger'=>"focusout",'data-parsley-type'=>'digits'));?>
			 </div>
			</div>
			<div class="row">
				<div class="input-half-submit">
					<input type="button" value="Deployment Detail" id="product"/>
				</div>
			</div>
		 <!-- </form> -->

		 </section>

		<section class="container prod-reg-container" id="product_deployment" style="display: none">
		<!-- <form class="container-fluid"> -->


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
		 <!-- </form> -->

		 </section>

		<section class="container prod-reg-container" id="media_link" style="display: none">
		<!-- <form class="container-fluid"> -->


			<h2>Product's Social Media Link</h2>
			<div class="row">
				<div class="input-half">
				 <i class="fa fa-google-plus col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
				 <!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="googleplus" placeholder="GooglePlus Link"> -->
				 <?php echo $form->textField($product,'googleplus_link',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'GooglePlus Link','data-parsley-trigger'=>"focusout",'data-parsley-type'=>'url'));?>
				</div>
				<div class="input-half float-right">
				 <i class="fa fa-facebook-f col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
				 <!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="facebook" placeholder="Facebook Link"> -->
				 <?php echo $form->textField($product,'facebook_link',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'Facebook Link','data-parsley-trigger'=>"focusout",'data-parsley-type'=>'url'));?>
				</div>
			</div>
			<div class="row">
				<div class="input-half">
					<i class="fa fa-linkedin col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
					<!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="linkedin" placeholder="Linkedin Link"> -->
					<?php echo $form->textField($product,'linkedin_link',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'Linkedin Link','data-parsley-trigger'=>"focusout",'data-parsley-type'=>'url'));?>
				</div>
				<div class="input-half float-right">
					<i class="fa fa-youtube col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
					<!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="youtube" placeholder="Youtube Link"> -->
					<?php echo $form->textField($product,'youtube_link',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'Youtube Link','data-parsley-trigger'=>"focusout",'data-parsley-type'=>'url'));?>
				</div>
			</div>
		 <div class="row">
			 <div class="input-half-submit">
				 <!-- <input type="button" value="Create my free listing" name="submit"></input> -->
				 <?php echo CHtml::htmlButton('Create Free Listing',array('onclick'=>'send();','class'=>'btn btn-primary submit-final', 'id'=>'store')); ?>
			 </div>
		 </div>
	<!-- </form> -->
	</section>
	<?php $this->endWidget();?>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/js/bootstrap-multiselect.js"></script>
<script type="text/javascript">
 $(document).ready(function() {
	$('#Categories_id').multiselect({
			enableFiltering: true,
			numberDisplayed: 0,
		});


	$('#user').click(function() {
			var v1 = $('#Users_first_name').parsley().validate();
			var v2 = $('#Users_username').parsley().validate();
			if(v1==true && v2==true)
			{
				$('#about_company').toggle();
				$('#user').toggle();
				$('html,body').animate({
						scrollTop: $('#about_company').css('top')
				}, 1000)
			}
	});
	$('#company').click(function() {
			var v1 = $('#Product_company_name').parsley().validate();
			var v2 = $('#Product_founding_country').parsley().validate();
			var v3 = $('#Product_company_website').parsley().validate();
			var v4 = $('#Product_founding_year').parsley().validate();
			if( v1==true && v2==true && v3==true && v4==true)
		{
			$('#about_product').toggle();
			$('#company').toggle();
			$('html,body').animate({
				scrollTop: $('#about_product').css('top')
			}, 1000)
		}
	});
	$('#product').click(function() {
				var v1 = $('#Product_name').parsley().validate();
			var v2 = $('#Product_product_website').parsley().validate();
			var v3 = $('#Product_description').parsley().validate();
		//	var v4 = $('#Categories_id').parsley().validate();
			if( v1==true && v2==true && v3==true)
		{
			$('#product_deployment').toggle();
			$('#product').toggle();
			$('html,body').animate({
					scrollTop: $('#product_deployment').css('top')
			}, 1000)
		}
	});
	$('#deployment').click(function() {
		$('#media_link').toggle();
		$('#deployment').toggle();
		$('html,body').animate({
				scrollTop: $('#media_link').css('top')
		}, 1000)
	});
});
 
function send(){
	var validated = $("#add_project").parsley().validate();
	var data = $("#add_project").serialize();
	//console.log(data);
	//$('#store').prop('disabled',true);
	if(validated){
		$.ajax({
			type: 'POST',
			url: '<?php echo Yii::app()->createUrl("product/ProductRegisterSave"); ?>',
			data: data,
			success: function(data)
			{
				var response = $.parseJSON(data);
				window.location.href = response.url;
			},
			error: function(data)
			{
				alert("failed");
			}
		})
		//$('#store').prop('disabled',false);
	}
}
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/css/productReg.css" rel="stylesheet">

<div class="container pro">
	<h1>Create a free listing on VenturePact</h1>
	<hr class="center-half">
	<?php $form=$this->beginWidget('CActiveForm', array('id'=>"formProdReg",'htmlOptions'=>array('class'=>"panel-default",'data-parsley-validate'=>'data-parsley-validate')));?>
	<div class="col-md-12 col-xs-12">
		<!-- <form method="post" action="" id="formProdReg" data-parsley-validate="data-parsley-validate"> -->

		<div class="row">
			<div class="col-md-6 input-field">

				<!--  <input id="first_name" type="text" name="first_name" required data-parsley-required-message="First Name is required"> -->
				<?php echo $form->textField($users,'first_name',array('id'=>"first_name",'data-parsley-required-message'=>'Name is required','required'=>'required','data-parsley-pattern'=>"^[a-zA-Z ]+$",'data-parsley-minlength'=>"2"));?>
				<label for="first_name">First Name</label>
			</div>
			<div class="col-md-6 input-field">
				<!--  <input id="last_name" type="text" name="last_name" required data-parsley-required-message="Last Name is required"> -->
				<?php echo $form->textField($users,'last_name',array('id'=>"last_name",'data-parsley-required-message'=>'Name is required','required'=>'required','data-parsley-pattern'=>"^[a-zA-Z ]+$",'data-parsley-minlength'=>"2"));?>
				<label for="last_name">Last Name</label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 input-field">
				<i class="fa fa-envelope prefix"></i>
				<!-- <input id="email" type="email" name="email" required data-parsley-type="email" data-parsley-required-message="Email is required"> -->
				<?php echo $form->emailField($users,'username',array('id'=>"email",'data-parsley-required-message'=>'Email is required','required'=>'required','data-parsley-type'=>"email",'data-parsley-required-message'=>'Email is required')); ?>
				<label for="email">&nbsp;Email</label>
			</div>
			<div class="col-md-6 input-field">
				<i class="fa fa-mobile prefix"></i>
				<!-- <input id="phone_number" type="tel" name="phone_number" required> -->
				<?php echo $form->textField($users,'phone_number',array('id'=>"phone_number",'required'=>'required','data-parsley-type'=>"number")); ?>

				<label for="phone_number">Phone Number</label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 input-field">
				<!-- <input id="company_name" type="text" name="company_name" required data-parsley-required-message="Company Name is required"> -->
				<?php echo $form->textField($product,'company_name',array('id'=>"company_name",'required'=>'required')); ?>
				<label for="company_name">Company Name</label>
			</div>
			<div class="col-md-6 input-field">
				<?php echo $form->textField($product,'company_website',array('id'=>"company_website",'required'=>'required')); ?>
				<label for="website">Website</label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 input-field">
				<select>
					<option value="" disabled selected>Select your Country</option>
					<option value="1">Option 1</option>
					<option value="2">Option 2</option>
					<option value="3">Option 3</option>
				</select>
				<label>Country</label>
			</div>
		</div>
		<h2>About Your Product</h2>
		<div class="row">
			<div class="col-md-6 input-field">
				<!-- <input type="text" id="product_name" name="product_name" required data-parsley-required-message="Product Name is required"> -->
				<?php echo $form->textField($product,'name',array('id'=>"product_name",'required'=>'required','data-parsley-required-message'=>"Product Name is required")); ?>
				<label for="product_name">Product Name</label>
			</div>
			<div class="col-md-6 input-field">
				<?php
					$categories = Categories::model()->findAll();
					$categoryNames = array();
					foreach ($categories as $category)
						array_push($categoryNames,$category->name);
					 echo $form->dropDownList($category,'name',$categoryNames,array('id'=>"product_category",'required'=>'required','data-parsley-required-message'=>"Category is required"));
				?>
  		</div>
		</div>
		<div class="row">
			<div class="col-md-12 input-field">
				<!-- <textarea id="description" name="description" class="materialize-textarea"></textarea> -->
				<?php echo $form->textArea($product,'description',array('id'=>"description",'required'=>'required','data-parsley-minlength'=>"10",'class'=>"materialize-textarea")); ?>
				<label for="description">Description</label>
			</div>
		</div>
		<h2>Compnay Social Media Pages</h2>
		<div class="row">
			<div class="col-md-6 input-field">
				<i class="fa fa-facebook prefix"></i>
				<!-- <input type="text" id="facebook_page" name="facebook_page"> -->
				<?php echo $form->textField($product,'facebook_link',array('id'=>"facebook_page")); ?>
				<label for="facebook_page">Facebook's Page</label>
			</div>
			<div class="col-md-6 input-field">
				<i class="fa fa-google-plus prefix"></i>
				<!-- <input type="text" id="googleplus_page" name="googleplus_page"> -->
				<?php echo $form->textField($product,'googleplus_link',array('id'=>"googleplus_page")); ?>
				<label for="googleplus_page">&nbsp;Google Plus Page</label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 input-field">
				<i class="fa fa-linkedin prefix"></i>
				<!-- <input type="text" id="linkedin_page" name="linkedin_page"> -->
				<?php echo $form->textField($product,'linkedin_link',array('id'=>"linkedin_page")); ?>
				<label for="linkedin_page">&nbsp;linkedin Page</label>
			</div>
			<div class="col-md-6 input-field">
				<i class="fa fa-twitter prefix"></i>
				<!-- <input type="text" id="twitter_page" name="twitter_page"> -->
				<?php echo $form->textField($product,'twitter_link',array('id'=>"twitter_page")); ?>
				<label for="twitter_page">&nbsp;Twitter Page</label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 input-field">
				<i class="fa fa-youtube prefix"></i>
				<!-- <input type="text" id="youtube_page" name="youtube_page"> -->
				<?php echo $form->textField($product,'youtube_link',array('id'=>"youtube_page")); ?>
				<label for="youtube_page">&nbsp;Youtube Page</label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<!-- <button class="waves-effect waves-light mybtn btn-large" type="submit">Create My Listing</button> -->
				<!-- <input type="submit" value="Create My Listing" id="add_product" class="waves-effect waves-light mybtn btn-large" data-id="add_product" onClick="send();"> -->

				<?php echo CHtml::htmlButton('Create My Listing',array('onclick'=>'send();','class'=>'waves-effect waves-light mybtn btn-large')); ?>

			</div>
		</div>
	</div>
	<?php $this->endWidget(); ?>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('select').material_select();
  });
function send()
{
	var validated = $("#formProdReg").parsley().validate();
	if(validated)
	{   
		var data=$("#formProdReg").serialize();   
		console.log(data);
		$.ajax({
			type:'POST',
			url:'<?php echo Yii::app()->createUrl("product/ProductRegisterSave"); ?>',
			data: data,
			success:function(data)
			{
				alert("success");
			/*var response = $.parseJSON(data);
			console.log(response);
			if(response.userSaved == 1)
			{
				alert("Your Data is Sucessfully Submitted");
				window.location.href=response.url + "#review";
			}
			if(response.userUpdate == 2)
			{
				alert("Your previous comment is updated");
				window.location.href=response.url + "#review";
			}*/
			},
			error:function(data)
			{
				alert('Updation failed!!');
			},
		})
	}
	else
	{
		alert('Please Enter all Required Field');
	}
}
</script>
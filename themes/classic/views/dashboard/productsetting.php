<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/css/tabs.css">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/css/dash-style.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/css/bootstrap-multiselect.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/css/prettify.css">
<section class="wrapper">
	<div class="row">
		<aside class="full-height">
			<ul>
				<li><a href="#product_information">Product Information</a></li>
				<li><a href="#company_information">Company Information</a></li>
				<li><a href="#social_media">Social Media Links</a></li>
				<li><a href="#transactions">Transactions</a></li>
			</ul>
		</aside>


		<main class="main-wrap">

			<!-- <form class="prod-edit-container"> -->
<?php $form=$this->beginWidget('CActiveForm', array('id'=>'product_setting','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"prod-edit-container",'data-parsley-validate'=>'data-parsley-validate',)));?>
				<div class="row" id="product_information">
					<h4>Product Information</h4>
					<figure>
					<a href="#" id="productImga"><img id="productImg" src="<?php echo (!empty($product->logo))?$product->logo:Yii::app()->theme->baseUrl."/../product_logo/IMG_1.png";?>" alt="product logo" width="80px" height="80px"></a>
					</figure>
					<div class="container-fluid" id="product_information">
					<?php echo $form->textField($product,'logo',array('hidden'=>"hidden",'title'=>"Logo",'id'=>'prod_img'));?>
						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Name:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-product-hunt fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>

								<?php echo $form->textField($product,'name',array('data-parsley-required-message'=>'Name is required','placeholder'=>"Name",'required'=>'required','title'=>"Name",'data-parsley-trigger'=>"focusout",'data-parsley-minlength'=>"2",'class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11 required alphanum minlength','length'=>"2",'tabindex'=>'1'));?>
							</div>
						</div>

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Description:</label>
							<div class="input col-lg-10">
								<i class="fa fa-bars fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>
								<?php echo $form->textArea($product,'description',array('placeholder'=>"product_description",'required'=>'required','class'=>'col-lg-11 col-md-1 col-sm-1 col-xs-1','data-parsley-trigger'=>"focusout",'data-parsley-minlength'=>"50"));?>
							</div>
						</div>

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Website:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-globe fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>
								<?php echo $form->textField($product,'product_website',array('placeholder'=>"Website",'required'=>'required','class'=>'col-lg-11 col-md-1 col-sm-1 col-xs-1'));?>
							</div>
						</div>

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Category:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-codiepie fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>

								<select id="category" name="productCategory[]" multiple="multiple" class="col-lg-11 col-md-11 col-sm-11 col-xs-11" onchange="send()">
									<?php

									$category=Categories::model()->findAll();
									foreach($category as $categoryname)
									{?>

									<option value="<?php echo $categoryname->name;?>"

								 <?php
								 if (in_array($categoryname->name, $productCategory)) {
										echo "selected";
									}
								?>
									>
									<?php echo $categoryname->name;?>
									</option>


									<?php }?>
							 </select>

							</div>
						</div>

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Features:</label>
							<div id="feature_list" class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-tasks fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>
								<select id="features" name="productCategoryFeatures[]" multiple="multiple" class="col-lg-11 col-md-11 col-sm-11 col-xs-11" >
								 <?php for($i=0;$i<count($productCategoryFeatures);$i++)
									{?>
									<option value="<?php echo $productCategoryFeatures[$i] ;?>"

								<?php
							if (in_array($productCategoryFeatures[$i], $productFeatures)) {
										echo "selected";
									}
								?>

									><?php echo $productCategoryFeatures[$i] ;?></option>
									<?php }?>
							</select>
							</div>
						</div>

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Customers:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-users fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>
								<?php echo $form->textField($product,'customer_count',array('placeholder'=>"No. of people",'required'=>'required','class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','data-parsley-trigger'=>"focusout",'data-parsley-type'=>"digits"));?>
							</div>
						</div>

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Price:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-money fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>
									<?php echo $form->textField($product,'starting_price',array('placeholder'=>"Starting Price",'required'=>'required','class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','data-parsley-trigger'=>"focusout",'data-parsley-type'=>"digits"));?>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Bidding Amount:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-money fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>
								<?php echo $form->textField($product,'bidding_amount',array('placeholder'=>"Bidding Amount",'required'=>'required','class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','data-parsley-trigger'=>"focusout",'data-parsley-type'=>"digits"));?>
							</div>
						</div>

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Pricing Details:</label>
							<div class="input col-lg-10">
								<i class="fa fa-money fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>
							<?php echo $form->textArea($product,'pricing_details',array('placeholder'=>"Pricing details",'required'=>'required','class'=>'col-lg-11 col-md-1 col-sm-1 col-xs-1','data-parsley-trigger'=>"focusout",'data-parsley-minlength'=>"5"));?>

							</div>
						</div>
				<div class="row">
										<div class="input-full-radio">


											<input type="radio" id="ppc0" name="Product[under_ppc]" value="1" <?php if($product->under_ppc){ echo "checked";}else{}?>></input>
											<label for="ppc0" class="col-lg-6">PPC</label>

											<input type="radio" id="ppc1" name="Product[under_ppc]" value="0" <?php if($product->under_ppc){ }else{echo "checked";}?> ></input>
											<label for="ppc1" class="col-lg-6">No PPC</label>

										</div>
									</div>

									<div class="row">
										<div class="input-full-radio">
											<input type="radio" id="trial0" name="Product[has_trial]" value="1" <?php if($product->has_trial){ echo "checked";}else{}?> ></input>
											<label for="trial0" class="col-lg-6">Trial Available</label>
											<input type="radio" id="trial1" name="Product[has_trial]" value="0" <?php if($product->has_trial){ }else{echo "checked";}?> ></input>
											<label for="trial1" class="col-lg-6">No Trial Available</label>
										</div>
									</div>

									<div class="row">
										<div class="input-full-radio">
											<input type="radio" id="free0" name="Product[has_free_version]" value="1" <?php if($product->has_free_version){ echo "checked";}else{}?>></input>
											<label for="free0" class="col-lg-6">Has Free Version</label>
											<input type="radio" id="free1" name="Product[has_free_version]" value="0" <?php if($product->has_free_version){ }else{echo "checked";}?>></input>
											<label for="free1" class="col-lg-6">Only Paid</label>
										</div>
									</div>

				<div class="row" id="company_information">
					<h4>Company Information</h4>
					<div class="container-fluid" id="product_information">

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Name:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-building fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>

								<!-- <input type="text" class="col-lg-11 col-md-11 col-sm-11 col-xs-11" name="company_name" value="Salesforce"> -->
									<?php echo $form->textField($product,'company_name',array('placeholder'=>"Company Name",'required'=>'required','class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','data-parsley-trigger'=>"focusout",'data-parsley-minlength'=>"3"));?>

							</div>
						</div>

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Website:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-globe fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>
								<!-- <input type="text" class="col-lg-11 col-md-11 col-sm-11 col-xs-11" name="company_website" value="Salesforce"> -->
									<?php echo $form->textField($product,'company_website',array('placeholder'=>"Company Website",'required'=>'required','class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','data-parsley-trigger'=>"focusout",'data-parsley-type'=>"url"));?>
							</div>
						</div>

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Founding Year:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-calendar-o fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>
								<!-- <input type="text" class="col-lg-11 col-md-11 col-sm-11 col-xs-11" name="founding_year" value="Salesforce"> -->
								<?php echo $form->textField($product,'founding_year',array('placeholder'=>"Founding Year",'required'=>'required','class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','data-parsley-trigger'=>"focusout",'data-parsley-minlength'=>"4",'data-parsley-type'=>"digits"));?>

							</div>
						</div>

						<div class="row">
							<div class="input-dash-full resp-half">
								<i class="fa fa-codiepie col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>

									<?php
							$countries = Controller::getCountryNames();
							echo $form->dropDownList($product,'founding_country',$countries,array('prompt'=>'Select Country','class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','required'=>"required",'data-parsley-trigger'=>"focusout"));?>
							</div>
						</div>
					</div>
				</div>

				<div class="row" id="social_media">
					<h4>Product's Social Media Links</h4>
					<div class="container-fluid" id="product_information">

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Google:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-google-plus fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>

								<!-- <input type="text" class="col-lg-11 col-md-11 col-sm-11 col-xs-11" name="googleplus" value="Salesforce"> -->
									<?php echo $form->textField($product,'googleplus_link',array('placeholder'=>"Google plus profile",'class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','data-parsley-trigger'=>"focusout",'data-parsley-type'=>"url"));?>

							</div>
						</div>

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Facebook:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-facebook fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>

								<!-- <input type="text" class="col-lg-11 col-md-11 col-sm-11 col-xs-11" name="facebook" value="Salesforce"> -->
								<?php echo $form->textField($product,'facebook_link',array('placeholder'=>"facebook profile",'class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','data-parsley-trigger'=>"focusout",'data-parsley-type'=>"url"));?>

							</div>
						</div>

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Youtube:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-youtube fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>
								<!-- <input type="text" class="col-lg-11 col-md-11 col-sm-11 col-xs-11" name="youtube" value="Salesforce"> -->
								<?php echo $form->textField($product,'youtube_link',array('placeholder'=>"youtube profile",'class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','data-parsley-trigger'=>"focusout",'data-parsley-type'=>"url"));?>

							</div>
						</div>

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">LinkedIn:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-linkedin fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>

								<!-- <input type="text" class="col-lg-11 col-md-11 col-sm-11 col-xs-11" name="linkedin" value="Salesforce"> -->

									<?php echo $form->textField($product,'linkedin_link',array('placeholder'=>"linkedin profile",'class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','data-parsley-trigger'=>"focusout",'data-parsley-type'=>"url"));?>

							</div>
						</div>

						<div class="row">
							<div class="col-lg-4 submit-part">

								<!-- <input type="submit" value="Save" name="save"></input> -->
								<?php echo CHtml::button('Save',array('name'=>'Submit','id'=>'save_record','class'=>'btn btn-primary')); ?>

							</div>
						</div>
					</div>
				</div>

				<div class="row" id="transactions">
					<h4>Transactions</h4>
					<div class="container-fluid" id="product_information">
						<div class="row">
							<table class="col-lg-12" class="table-style">
								<thead class="row">
									<tr class="row">
										<td class="col-lg-1">S.No.</td>
										<td class="col-lg-3">Billing Date</td>
										<td class="col-lg-2">Clicks</td>
										<td class="col-lg-3">Amount</td>
										<td class="col-lg-3">Payment Status</td>
									</tr>
								</thead>
								<tbody class="row">
									<tr class="row">
										<td class="col-lg-1">1</td>
										<td class="col-lg-3">1-1-2016</td>
										<td class="col-lg-2">289</td>
										<td class="col-lg-3">983$</td>
										<td class="col-lg-3">Paid</td>
									</tr>
									<tr class="row">
										<td class="col-lg-1">2</td>
										<td class="col-lg-3">1-2-2016</td>
										<td class="col-lg-2">123</td>
										<td class="col-lg-3">456$</td>
										<td class="col-lg-3">Pending</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			<?php $this->endWidget(); ?>
		</main>
	</div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.0.7/parsley.min.js" async></script>
<script type="text/javascript">
$('#editProduct').addClass('active');
$('#dashboard').removeClass('active');

$(document).ready(function(){
$("#product_setting").parsley().validate();
 $('#save_record').on('click',function()
 {
	$.ajax({
		type: 'POST',
		url :"<?php echo Yii::app()->createUrl('dashboard/Productsettingsave',array('id'=>$product->id));?>",
		datatype:'json',
		data:$("#product_setting").serialize(),
		success :function(data)
		{
			alert("Product Updated");
			$('#save_record').val('save');
		}
	});
 });
 });

	var yourApiKey = 'A6TyxFZ2QSHOoQEcmsQA3z'
filepicker.setKey(yourApiKey);

document.getElementById("productImga").onclick = function(){
	filepicker.pick({
			services: ['COMPUTER', 'FACEBOOK', 'CLOUDAPP'],
			mimetype:'image/*',
			cropRatio:1,
			cropForce:true,
		},
		function onSuccess(Blob){
			var image = document.getElementById("imgPlaceholder");
			$('#prod_img').val(Blob.url);
			$('#productImg').attr('src',Blob.url);
		}
	);
};
function send()
{
	var data = $('#category').val();
	console.log(data);
	$.ajax({
		type: 'POST',
		url: '<?php echo Yii::app()->createUrl("dashboard/GetFeatures");?>',
		data: {categories : data},
		success: function(data)
		{
			$("#feature_list").html(data);
		},
		error: function(data)
		{
			//alert("failed");
		}
	})
}
</script>
<script type="text/javascript" src="https://js.stripe.com/v1/"></script>
<script type="text/javascript">
Stripe.setPublishableKey('pk_test_UNYSMPvDrZl3n2EzW6kZqSeT');
function stripeResponseHandler(status, response) {
    if (response.error) {
        // re-enable the submit button
         $('.submit-button').removeAttr("disabled");
        // show the errors on the form
        $(".payment-errors").html(response.error.message);
        return false;
    } else
    {
        var token = response['id'];
        $.ajax({
        			type: 'POST',
							url: '<?php echo Yii::app()->createUrl("dashboard/payment");?>',
							data: {token : token, product_id: $product->id},
							success: function(data)
							{
								//alert("success");
							},
							error: function(data)
							{
								//alert("failed");
							}
        });

    }
}
$(document).ready(function() {
    $("#payment-form").submit(function(event) {
        $('.submit-button').attr("disabled", "disabled");
        Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
        return false; // submit from callback
    });
});
</script>
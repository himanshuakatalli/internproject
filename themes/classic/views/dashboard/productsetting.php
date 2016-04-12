<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/css/tabs.css">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/css/dash-style.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/css/bootstrap-multiselect.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/css/prettify.css">
<style type="text/css">
.error{
	color: #f00;
	font-size: 14px;
}
.message{
	color: #0f0;
	font-size: 12px;
}
</style>
<?php
header('Access-Control-Allow-Origin:*');
?>
<section class="wrapper">
	<div class="row">
		<aside class="full-height" style="z-index: -2;">
			<ul>
				<li><a class="trans" href="#product_information">Product Information</a></li>
				<li><a class="trans" href="#company_information">Company Information</a></li>
				<li><a class="trans" href="#social_media">Social Media Links</a></li>
				<li><a class="transactions" href="#transactions">Transactions</a></li>
			</ul>
		</aside>
		<main class="main-wrap">
			<?php $form=$this->beginWidget('CActiveForm', array('id'=>'product_setting','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"prod-edit-container",'data-parsley-validate'=>'data-parsley-validate',)));?>
				<div class="row" id="product_information">
					<h4>Product Information</h4>
					<figure>
						<a href="#" id="productImga"><img id="productImg" src="<?php echo (!empty($product->logo))?$product->logo:Yii::app()->theme->baseUrl."/../product_logo/IMG_1.png";?>" alt="product logo" width="80px" height="80px"></a>
					</figure>
					<div class="container-fluid">
						<?php echo $form->textField($product,'logo',array('hidden'=>"hidden",'title'=>"Logo",'id'=>'prod_img'));?>
						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Name:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-product-hunt fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
								<?php echo $form->textField($product,'name',array('data-parsley-required-message'=>'Name is required','placeholder'=>"Name",'required'=>'required','title'=>"Name",'data-parsley-trigger'=>"focusout",'data-parsley-minlength'=>"2",'class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11 required alphanum minlength','length'=>"2",'tabindex'=>'1'));?>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Description:</label>
							<div class="input col-lg-10">
								<i class="fa fa-bars fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
								<?php echo $form->textArea($product,'description',array('placeholder'=>"product_description",'required'=>'required','class'=>'col-lg-11 col-md-1 col-sm-1 col-xs-1','data-parsley-trigger'=>"focusout",'data-parsley-minlength'=>"50"));?>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Website:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-globe fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
								<?php echo $form->textField($product,'product_website',array('placeholder'=>"Website",'required'=>'required','class'=>'col-lg-11 col-md-1 col-sm-1 col-xs-1'));?>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Category:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-codiepie fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
								<select id="category" name="productCategory[]" multiple="multiple" class="col-lg-11 col-md-11 col-sm-11 col-xs-11" onchange="getFeaturesByName()">
								<?php
								$categories = Categories::model()->findAll();
								foreach($categories as $category){?>
									<option value="<?php echo $category->name;?>"
									<?php if (in_array($category->name, $productCategory)) {
										echo "selected";
										}?>
										><?php echo $category->name;?>
									</option>
									<?php }
									?>
								</select>

							</div>
						</div>
						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Features:</label>
							<div id="feature_list" class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-tasks fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
								<select id="features" name="productCategoryFeatures[]" multiple="multiple" class="col-lg-11 col-md-11 col-sm-11 col-xs-11" >
								<?php for($i=0;$i<count($productCategoryFeatures);$i++){?>
									<option value="<?php echo $productCategoryFeatures[$i] ;?>"
									<?php if (in_array($productCategoryFeatures[$i], $productFeatures)) {
										echo "selected";
										}?>
										><?php echo $productCategoryFeatures[$i] ;?>
									</option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Customers:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-users fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
								<?php echo $form->textField($product,'customer_count',array('placeholder'=>"No. of people",'required'=>'required','class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','data-parsley-trigger'=>"focusout",'data-parsley-type'=>"digits"));?>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Price:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-usd fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>
									<?php echo $form->textField($product,'starting_price',array('placeholder'=>"Starting Price",'required'=>'required','class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','data-parsley-trigger'=>"focusout",'data-parsley-type'=>"digits"));?>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Bidding Amount:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-usd fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
								<?php echo $form->textField($product,'bidding_amount',array('placeholder'=>"Bidding Amount",'required'=>'required','class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','data-parsley-trigger'=>"focusout",'data-parsley-type'=>"number"));?>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Pricing Details:</label>
							<div class="input col-lg-10">
								<i class="fa fa-money fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
								<?php echo $form->textArea($product,'pricing_details',array('placeholder'=>"Pricing details",'class'=>'col-lg-11 col-md-1 col-sm-1 col-xs-1','data-parsley-trigger'=>"focusout",'data-parsley-minlength'=>"5"));?>
							</div>
						</div>
						<div class="row">
							<div class="input-full-radio">
								<input type="radio" id="ppc0" name="Product[under_ppc]" value="1"
								<?php if($product->under_ppc){ echo "checked";}else{} ?>/>
								<label for="ppc0" class="col-lg-6">PPC</label>
								<input type="radio" id="ppc1" name="Product[under_ppc]" value="0"
								<?php if($product->under_ppc){ }else{echo "checked";}?>/>
								<label for="ppc1" class="col-lg-6">No PPC</label>
							</div>
						</div>
						<div class="row">
							<div class="input-full-radio">
								<input type="radio" id="trial0" name="Product[has_trial]" value="1"
								<?php if($product->has_trial){ echo "checked";}else{}?>/>
								<label for="trial0" class="col-lg-6">Trial Available</label>
								<input type="radio" id="trial1" name="Product[has_trial]" value="0"
								<?php if($product->has_trial){ }else{echo "checked";}?>/>
								<label for="trial1" class="col-lg-6">No Trial Available</label>
							</div>
						</div>
						<div class="row">
							<div class="input-full-radio">
								<input type="radio" id="free0" name="Product[has_free_version]" value="1"
								<?php if($product->has_free_version){ echo "checked";}else{}?>/>
								<label for="free0" class="col-lg-6">Has Free Version</label>
								<input type="radio" id="free1" name="Product[has_free_version]" value="0"
								<?php if($product->has_free_version){ }else{echo "checked";}?>/>
								<label for="free1" class="col-lg-6">Only Paid</label>
							</div>
						</div>
					</div>
				</div>
				<div class="row" id="company_information">
					<h4>Company Information</h4>
					<div class="container-fluid">
						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Name:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-building fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
								<?php echo $form->textField($product,'company_name',array('placeholder'=>"Company Name",'required'=>'required','class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','data-parsley-trigger'=>"focusout",'data-parsley-minlength'=>"3"));?>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Website:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-globe fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
								<?php echo $form->textField($product,'company_website',array('placeholder'=>"Company Website",'required'=>'required','class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','data-parsley-trigger'=>"focusout",'data-parsley-type'=>"url"));?>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Founding Year:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-calendar-o fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
								<?php echo $form->textField($product,'founding_year',array('placeholder'=>"Founding Year",'required'=>'required','class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','data-parsley-trigger'=>"focusout",'data-parsley-minlength'=>"4",'data-parsley-type'=>"digits"));?>
							</div>
						</div>
						<div class="row">
							<div class="input-dash-full resp-half">
								<i class="fa fa-codiepie col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
								<?php $countries = Controller::getCountryNames();
								echo $form->dropDownList($product,'founding_country',$countries,array('prompt'=>'Select Country','class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','required'=>"required",'data-parsley-trigger'=>"focusout"));?>
							</div>
						</div>
					</div>
				</div>
				<div class="row" id="social_media">
					<h4>Product's Social Media Links</h4>
					<div class="container-fluid">
						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Google:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-google-plus fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
								<?php echo $form->textField($product,'googleplus_link',array('placeholder'=>"Google plus profile",'class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','data-parsley-trigger'=>"focusout",'data-parsley-type'=>"url"));?>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Facebook:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-facebook fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
								<?php echo $form->textField($product,'facebook_link',array('placeholder'=>"facebook profile",'class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','data-parsley-trigger'=>"focusout",'data-parsley-type'=>"url"));?>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Youtube:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-youtube fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
								<?php echo $form->textField($product,'youtube_link',array('placeholder'=>"youtube profile",'class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','data-parsley-trigger'=>"focusout",'data-parsley-type'=>"url"));?>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">LinkedIn:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-linkedin fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
								<?php echo $form->textField($product,'linkedin_link',array('placeholder'=>"linkedin profile",'class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','data-parsley-trigger'=>"focusout",'data-parsley-type'=>"url"));?>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4 submit-part">
								<?php echo CHtml::button('Save',array('name'=>'Submit','id'=>'save_record','class'=>'btn btn-primary')); ?>
								<a href="javascript:void(0);" data-toggle="modal" data-target="#deleteProduct" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</a>
							</div>
						</div>
					</div>
				</div>
				<div class="row" id="transactions">
					<h4>Transactions</h4>
					<!-- <form class="form-control" name="frmTrans" style="width: 50px;">
						<label>Year</label>
						<select name="transYear" class="form-control">
							<option selected value="<?php echo date("Y")-3; ?>"><?php echo date("Y")-3; ?></option>
							<option selected value="<?php echo date("Y")-2; ?>"><?php echo date("Y")-2; ?></option>
							<option selected value="<?php echo date("Y")-1; ?>"><?php echo date("Y")-1; ?></option>
							<option selected value="<?php echo date("Y"); ?>"><?php echo date("Y"); ?></option>
					</select>
					<h5><?php echo "Product: ".$product->name; ?></h5>
					</form> -->

					<div class="container-fluid">
						<div class="row">
							<table class="col-lg-12" class="table-style">
								<thead class="row">
									<tr class="row">
										<td class="col-lg-1">Invoice No.</td>
										<td class="col-lg-3">Billing Date</td>
										<td class="col-lg-2">Clicks</td>
										<td class="col-lg-2">Amount</td>
										<td class="col-lg-2">Month</td>
										<td class="col-lg-2">Year</td>
										<td class="col-lg-3">Payment Status</td>
										<td class="col-lg-1">Pay</td>
									</tr>
								</thead>
								<!-- Need to take care of year condition if showing invoice on monthly and yearly basis -->
								<?php
									$invoiceArray = Invoice::model()->findAll(array('condition'=>'product_id=:id','params'=>array(':id'=>$product->id)));
								?>
								<?php foreach ($invoiceArray as $invoice): ?>
									<tbody class="row">
										<tr class="row">
											<td class="col-lg-1"><?php echo $invoice->id; ?></td>
											<td class="col-lg-3"><?php echo explode(' ',$invoice->add_date)[0]; ?></td>
											<td class="col-lg-2"><?php echo $invoice->click_count; ?></td>
											<td class="col-lg-3"><?php echo '$'.$invoice->amount; ?></td>
											<td class="col-lg-3"><?php echo $invoice->month; ?></td>
											<td class="col-lg-3"><?php echo $invoice->year; ?></td>
											<?php if ($invoice->payment_status): ?>
												<td class="col-lg-3">Paid</td>
												<td class="col-lg-1">
													<a href="<?php echo $this->createUrl('dashboard/viewInvoice',array('id'=>$invoice->id)); ?>"><i class="fa fa-info-circle"></i></a>
												</td>
											<?php else: ?>
												<td class="col-lg-3">UnPaid</td>
												<td class="col-lg-1">
													<a href="javascript:void(0);" data-id="<?php echo $invoice->id; ?>" class="model_data" data-toggle="modal" data-target="#makePayment"><i class="fa fa-credit-card-alt"></i></a>
												</td>
											<?php endif;?>
										</tr>
									</tbody>
								<?php endforeach; ?>
							</table>
						</div>
					</div>
				</div>
			<?php $this->endWidget(); ?>
		</main>
	</div>
</section>
<div id="makePayment" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<div class="panel-heading display-table" >
					<div class="row display-tr" >
						<h3 class="panel-title display-td" >Payment Details</h3>
						<div class="display-td" >
							<img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-body">
				<div class="panel-body">
					<form class="panel-default" action="" method="POST" id="payment-form">
					<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<div class="input-group">
										<input type="hidden" size="20" id="invoice_id"/>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="cardNumber">CARD NUMBER</label>
									<div class="input-group">
										<input type="text" size="20" autocomplete="off" class="card-number form-control" placeholder="Valid Card Number"/>
										<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-7 col-md-7">
								<div class="form-group">
									<label for="cardExpiry"><span class="hidden-xs">EXPIRATION (MM/YYYY)</span><br>
									<input type="text" size="2" class="card-expiry-month form-control" style="width: 50px;  display: inline-block;" placeholder="MM" />
									<input type="text" size="4" class="card-expiry-year form-control" style="width: 80px; display: inline-block;" placeholder="YYYY"/>
								</div>
							</div>
							<div class="col-xs-5 col-md-5 pull-right">
								<div class="form-group">
									<label for="cardCVC">CV CODE</label>
									<input type="text" size="4" autocomplete="off" class="card-cvc form-control form-control" style="width: 80px;" placeholder="CVV"/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<input type="submit" class="btn btn-primary submit-button" value="Submit Payment"/>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<div class="error pull-left">

				</div>
				<div class="message pull-left">
				</div>
			</div>
		</div>
	</div>
</div>

<div id="deleteProduct" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<div class="panel-heading display-table" >
					<div class="row display-tr" >
						<h3 class="panel-title display-td" >Remove Product</h3>
					</div>
				</div>
			</div>
			<div class="modal-body">
				<div class="panel-body">
					<h3>Do you want to remove this product</h3>
				</div>
			</div>
			<div class="modal-footer">
				<div class="error pull-left">

				</div>
				<a href="<?php echo $this->createUrl('deleteProduct',array('id'=>$product->id)); ?>" class="btn btn-danger">Yes</a>
				<input type="button" class="btn btn-success" value="No" data-dismiss="modal"/>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
function getFeaturesByName()
{
	var data = $('#category').val();

	$.ajax({
		type: 'POST',
		url: '<?php echo Yii::app()->createUrl("dashboard/GetFeatures");?>',
		data: {categories : data},
		success: function(data)
		{
			$("#feature_list").html(data);
			$('#features').multiselect({
				enableFiltering: true
			});
		},
		error: function(data)
		{
			//alert("failed");
		}
	})
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.0.7/parsley.min.js" async></script>
<script type="text/javascript" src="https://js.stripe.com/v1/"></script>
<script type="text/javascript">
$('#editProduct').addClass('active');
$('#dashboard').removeClass('active');

Stripe.setPublishableKey('pk_test_UNYSMPvDrZl3n2EzW6kZqSeT');
function stripeResponseHandler(status, response) {
    if (response.error) {
        // re-enable the submit button
         $('.submit-button').removeAttr("disabled");
         $('.submit-button').val('Submit Payment');
        // show the errors on the form
        $(".error").html(response.error.message);
        return false;
    } else
    {
        var token = response['id'];
        var invoice_id=$("#invoice_id").val();
        $.ajax({
        			headers: {"Accept": "application/json"},
        			type: 'POST',
							url: '<?php echo Yii::app()->createUrl("dashboard/payment");?>',
							data: {token : token, product_id: <?php echo $product->id ?>, invoice_id:invoice_id},
							success: function(data)
							{
								//alert("success");
								var res = $.parseJSON(data);
								$(".message").html(res.message);
								$(".error").html(res.error);
								if(res.success == 1) {
									window.location.href = res.url;
								}
							},
							error: function(data)
							{
								//alert("failed");
							}
        });

    }
}

$(document).ready(function(){

		$(".model_data").click(function(){
			var invoice_id = $(this).data('id');
     $("#invoice_id").val( invoice_id );
     // alert(invoice_id);

		});

	$("#payment-form").submit(function(event) {
				$('.submit-button').val('Please wait...');
        $('.submit-button').attr("disabled", "disabled");
        Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
        return false; // submit from callback
    });


 $('#save_record').on('click',function()
 {
 	var validated = $("#product_setting").parsley().validate();
 	if(validated)
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
	})
	}
 });


 });

$('.trans').click(function(){
	$('#transactions').css('display','none');
	$('#product_information').css('display','block');
	$('#company_information').css('display','block');
	$('#social_media').css('display','block');


});
$('.transactions').click(function(){
	$('#transactions').css('display','block');
	$('#product_information').css('display','none');
	$('#company_information').css('display','none');
	$('#social_media').css('display','none');

	var myTransition = ($.browser.webkit)  ? '-webkit-transition' :
	($.browser.mozilla) ? '-moz-transition' :
	($.browser.msie)    ? '-ms-transition' :
	($.browser.opera)   ? '-o-transition' : 'transition',
	myCSSObj = { opacity : 1 };
	myCSSObj[myTransition] = 'opacity 1s ease-in-out';
	$('#transactions').next().css(myCSSObj);
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

</script>

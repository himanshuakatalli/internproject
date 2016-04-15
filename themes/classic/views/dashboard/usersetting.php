<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/css/user-dash-style.css" rel="stylesheet">
<style type="text/css">
	.form-group ul {
	margin: 0;
	padding: 0;
}
.form-group ul li{
	font-size: 11px;
	color: #f00;
}
.error{
	color: #f00;
	font-size: 14px;
}
.message{
	color: #0f0;
	font-size: 12px;
}
</style>
<section class="wrapper ">
	<div class="row ">
		<div style="padding-top: 30px; padding-left:30px; width: 60%;" class="">
		<?php $form = $this->beginWidget('CActiveForm',array('id'=>'update_user','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"form-horizontal",'data-parsley-validate'=>'data-parsley-validate')));?>
		<figure><p class="centered"><a href="#" id="changeProfileImg"><img id="pimg" src="<?php echo (!empty($_user->profile_img))?$_user->profile_img:Yii::app()->theme->baseUrl."/style/newhome/images/pic.png";?>" class="img-circle" width="80px" height="80px"/></a></p></figure><br>
		<?php
			if(!$_user->is_premium){
		?>
			<div class="alert alert-danger" role="alert" style=" line-height:30px;">
				Free Account
				<a class="btn btn-success pull-right" href="javascript:void(0);" data-toggle="modal" data-target="#makePremiumPayment">
					Get Premium <span class="badge">$20 / month</span>
				</a>
			</div>
		<?php
			}else{
		?>
			<div class="alert alert-success" role="alert" style=" line-height:30px;">
				Premium Account
				<a class="btn btn-danger pull-right" href="javascript:void(0);" data-toggle="modal" data-target="#chngToFree">
					Change to Free User
				</a>
			</div>
		<?php
			}
		?>
		<?php echo $form->textField($user,'profile_img',array('placeholder'=>'Profile Image','id'=>'profImg','hidden'=>"hidden" ,'class'=>"input-box col-lg-11",'value'=>$_user->profile_img));?>
				<div class="form-group">
					<label class="control-label col-sm-2" for="firstName">First Name:</label>
					<div class="col-sm-10">
						<i class="fa fa-user col-lg-1"></i>
						<?php echo $form->textField($user,'first_name',array('placeholder'=>'First Name', 'class'=>"input-box col-lg-11",'data-parsley-required-message'=>'Name is required','required'=>'required','value'=>$_user->first_name,'data-parsley-trigger'=>"focusout", 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'data-parsley-minlength'=>"2"));?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="lastName">Last Name:</label>
					<div class="col-sm-10">
						<i class="fa fa-user col-lg-1"></i>
						<?php echo $form->textField($user,'last_name',array('placeholder'=>'Last Name', 'class'=>"input-box col-lg-11",'data-parsley-required-message'=>'Name is required','required'=>'required','value'=>$_user->last_name,'data-parsley-trigger'=>"focusout",'data-parsley-pattern'=>"^[a-zA-Z ]+$",'data-parsley-minlength'=>"2"));?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">Email:</label>
					<div class="col-sm-10">
						<i class="fa fa-envelope-o col-lg-1"></i>
						<?php echo $form->textField($user,'username',array('placeholder'=>'Email','disabled'=>'disabled','class'=>"input-box col-lg-11",'data-parsley-required-message'=>'Email is required','required'=>'required','data-parsley-trigger'=>"focusout",'value'=>$_user->username,'data-parsley-type'=>"email"));?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="phone_number">Phone Number</label>
					<div class="col-sm-10">
						<i class="fa fa-phone col-lg-1"></i>
						<?php echo $form->textField($user,'phone_number',array('placeholder'=>'Phone Number','class'=>"input-box col-lg-11",'value'=>$_user->phone_number,'required'=>'required','data-parsley-trigger'=>"focusout",'data-parsley-required-message'=>"Phone Number is required",'data-parsley-minlength'=>"10",'data-parsley-type'=>"digits"));?>
					</div>
					</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="password">New Password:</label>
					<div class="col-sm-10">
						<i class="fa fa-key col-lg-1"></i>
						<?php echo $form->passwordField($user,'password',array('placeholder'=>'Leave blank in case you dont want to update','class'=>"input-box col-lg-11"));?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="job_profile">Job profile:</label>
					<div class="col-sm-10">
						<i class="fa fa-user-md col-lg-1"></i>
						<?php echo $form->textField($user,'job_profile',array('placeholder'=>'Job Profile', 'class'=>"input-box col-lg-11",'value'=>$_user->job_profile,'data-parsley-required-message'=>'Job Profile is required','required'=>'required','data-parsley-trigger'=>"focusout"));?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<?php
							echo CHtml::Button('Save',array('class'=>'btn btn-primary pull-right','onClick'=>'user_update();'));
						?>
					</div>
				</div>
			<?php $this->endWidget(); ?>
		</div>
	</div>
</section>

	<div id="chngToFree" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Change to free Account</h4>
				</div>
				<div class="modal-body">
					<p>Are You sure you want to change account from premium to free</p>
				</div>
				<div class="modal-footer">
					<button class="btn  btn-danger" data-dismiss="modal" onClick="remove_premium()">Confirm</button>
					<button class="btn  btn-primary" data-dismiss="modal" >No</button>
				</div>
			</div>
		</div>
	</div>

	<div id="makePremiumPayment" class="modal fade" role="dialog">
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
									<label for="cardNumber">CARD NUMBER</label>
									<div class="input-group">
										<input type="text" autocomplete="off" class="card-number form-control" placeholder="Valid Card Number" size="100" />
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v1/"></script>
<script type="text/javascript">
	$('#userSettings').addClass('active');
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
							url: '<?php echo Yii::app()->createUrl("dashboard/add_premium");?>',
							data: {token : token},
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


		$("#formUserSettings").parsley().validate();
		$('#userInfo').click(function(){
			$('#userInfo').addClass('active');
			$('#compInfo').removeClass('active');
		});
		$('#compInfo').click(function(){
			$('#compInfo').addClass('active');
			$('#userInfo').removeClass('active');
		});
		$('#changeP').click(function(){
			$('#password').removeAttr("disabled")
			$('#password').val("");
			$('#password').focus();
		});
	});

	function user_update()
	{
		var validated = $("#update_user").parsley().validate();
		if(validated)
		{
			var data = $("#update_user").serialize();
			console.log(data);
			$.ajax({
				type: 'POST',
				url: '<?php echo Yii::app()->createUrl("dashboard/UserUpdate"); ?>',
				data: data,
				success: function(data)
				{
					alert("Profile Updated");
				},
				error: function(data)
				{
					alert("failed");
				}
			})
		}
	}
	var yourApiKey = 'A6TyxFZ2QSHOoQEcmsQA3z'
filepicker.setKey(yourApiKey);
$('#changeProfileImg').click(function(){

});
document.getElementById("changeProfileImg").onclick = function(){
	filepicker.pick({
			services: ['COMPUTER', 'FACEBOOK', 'CLOUDAPP'],
			mimetype:'image/*',
			cropRatio:1,
			cropForce:true,
		},
		function onSuccess(Blob){
			var image = document.getElementById("imgPlaceholder");
			$('#profImg').val(Blob.url);
			$('#pimg').attr('src',Blob.url);
		}
	);
};

function remove_premium()
{
	$.ajax({
		type: 'POST',
		url: '<?php echo Yii::app()->createUrl("dashboard/RemovePremium"); ?>',
		success: function(data)
		{
			alert("Profile Updated");
		},
		error: function(data)
		{
			alert("failed");
		}
	})
}
</script>

<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/css/reviewInput.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<section class="form-container clear-fix">
		<div class="form-header">
			<div><img src="<?php echo (!empty($product->logo))?$product->logo:Yii::app()->theme->baseUrl."/../product_logo/IMG_1.png";?>"></div>
			<hgroup>
				<h2><?php echo $product->name?></h2>
				<h3><?php echo $product->product_website?></h3>
			</hgroup>
		</div>


		<?php $form=$this->beginwidget('CActiveForm',array('id'=>'review-edit','enableClientValidation'=>true,'htmlOptions'=>array('data-parsley-validate'=>'data-parsley-validate'))); ?>

		<h3>How would you rate this product ?</h3>
		<div class="form-row">
			<?php
			$categories=RatingCategories::model()->findAll();
			foreach ($categories as $categorie) {
				?>
				<div class="star-rating">
					<h4><?php echo $categorie->name; ?></h4>
					<input id="input-<?php echo $categorie->name; ?>" name="<?php echo $categorie->id; ?>" value="0" type="number" class="rating" min=0 max=5 step=0.2 data-size="sm" >
				</div>
				<?php
			}
			?>
		</div>
		<div class="form-row inputs">
			<h3>Title of review</h3>
			<h4>Give a quick summary of your experience with the software</h4>
			<div class="form-group">
				<?php echo $form->textField($review,'title',array('id'=>'title','class'=>'validate form-control','placeholder'=>'Review Title','required'=>'required')); ?>
			</div>
		</div>
		<div class="form-row inputs">
			<h3>Comments</h3>
			<h4>Share the pros, cons, and details about your experience with this software.</h4>
			 <div class="form-group">
			 	<?php echo $form->textArea($review,'comment',array('id'=>'comments','class'=>'form-control','placeholder'=>'Comment','data-parsley-trigger'=>"keyup",'data-parsley-minlength'=>"10" ,'data-parsley-maxlength'=>"100" ,'data-parsley-minlength-message'=>"Come on! You need to enter at least a 10 character comment..",'data-parsley-validation-threshold'=>"5",'required'=>'required')); ?>
			 </div>
<!-- <div class='smiley-red'>
<div class='left-eye'></div>
<div class='right-eye'></div>
<div class='smile'></div>
</div> -->
</div>
<?php if(Yii::app()->user->isGuest): ?>
<div class="form-row inputs half">
	<h3>First Name</h3>
	<div class="form-group">
		<?php echo $form->textField($user,'first_name',array('id'=>'firstname','class'=>'validate form-control','placeholder'=>'First Name','required'=>'required','data-parsley-error-message'=>'*Name is Required'));?>
	</div>
</div>
<div class="form-row inputs half">
	<h3>Last Name</h3>
	<div class="form-group">
		<?php echo $form->textField($user,'last_name',array('id'=>'lastname','class'=>'validate form-control','placeholder'=>'Last Name','required'=>'required'));?>
	</div>
</div>
<div class="form-row inputs half">
	<h3>Organization</h3>
	<div class="form-group">
		<?php echo $form->textField($user,'organization',array('id'=>'organization','class'=>'validate form-control','placeholder'=>'Organization'));?>
	</div>
</div>
<div class="form-row inputs half">
	<h3>Job Profile</h3>
	<div class="form-group">
		<?php echo $form->textField($user,'job_profile',array('id'=>'jobtitle','class'=>'validate form-control','placeholder'=>'Job Profile'));?>
	</div>
</div>
<div class="form-row inputs half">
	<h3>Email</h3>
	<div class="form-group">
		<?php echo $form->emailField($user,'username',array('id'=>'email','class'=>'validate form-control','required'=>'required','data-parsley-error-message'=>'*Email is Required','data-parsley-type'=>'email','placeholder'=>'Email'));?>
		<!-- <label for="email" data-error="wrong" data-success="right">Email</label> -->
	</div>
</div>
<div class="form-row inputs half">
	<h3>Mobile</h3>
	<div class="form-group">
		<?php echo $form->textField($user,'phone_number',array('id'=>'phone_number','class'=>'validate form-control','placeholder'=>'Mobile Number','required'=>'required','data-parsley-type'=>'integer'));?>
	</div>
</div>
<div class="form-row inputs">
	<div class="form-group">
		<?php echo CHtml::htmlButton('Submit',array('onclick'=>'send();','class'=>'btn btn-primary')); ?>
		<!-- <i class="material-icons right">send</i> -->
	</div>
</div>

<?php else : ?>

	<div class="form-row inputs">
	<div class="input-field">
		<?php echo CHtml::htmlButton('Submit',array('onclick'=>'send();','class'=>'btn waves-effect waves-light')); ?>
		<!-- <i class="material-icons right">send</i> -->
	</div>
</div>

<?php endif; ?>


<?php $this->endWidget();?>
</section>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/js/star-rating.js" type="text/javascript"></script>
<script type="text/javascript">

function send()
{
	var validated = $("#review-edit").parsley().validate();
	if(validated)
	{
		var data=$("#review-edit").serialize();
		console.log(data);
		$.ajax({
			type:'POST',
			url:'<?php echo Yii::app()->createUrl("product/ProductReviewSave",array('id'=>$product->id)); ?>',
			data:data,
			success:function(data){
			var response = $.parseJSON(data);
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
			}
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
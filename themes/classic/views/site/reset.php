<style>
#input{padding:20px;}
</style>

<div class="container" style="margin-top:200px;height:400px">

	<div class="col-sm-4"></div>
	<div class="col-sm-4">
		<h3 class="fs26 font_newlight team-text-blue mb20">Set Your Password</h3>
		<div class="well" style="padding:30px">
			<?php $form=$this->beginWidget('CActiveForm', array('id'=>'reset-form','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default",'data-parsley-validate'=>'data-parsley-validate'))); ?>
			<?php echo $form->passwordField($reset,'Password',array('id'=>'input','class'=>'form-control','data-parsley-required-message'=>'Password is required','placeholder'=>"Password",'data-parsley-minlength'=>"6",'required'=>'required','id'=>'passwordField','data-parsley-required-message'=>'Password is required')); ?>
			<br>
			<?php  echo $form->passwordField($reset,'Confirm_Password',array('class'=>'form-control','data-parsley-required-message'=>'Confirm Password is required','placeholder'=>"Confirm Password",'data-parsley-minlength'=>"6",'required'=>'required','id'=>'passwordField','data-parsley-required-message'=>'Confirm Password is required','data-parsley-equalto'=>"#passwordField")); ?>

			<input type="button" value="Save" class="btn width100 tab-btn-orange fs14  font_newregular mt15" data-id="reset_password" onClick="save($(this));">

			<?php $this->endWidget(); ?>
		</div>
	</div>
	<div class="col-sm-4"></div>

</div>

<script>
	function save(element)
	{

		var form="#"+element.attr('data-id');
		element.attr('value','reseting ...').attr('disabled','disabled');

		$.ajax({
			type:'POST',
			url:"<?php echo Yii::app()->createUrl('site/reset',array('username'=>$user->username));?>",
			data:$("#reset-form").serialize(),
			success:function(data)
			{
				var response = $.parseJSON(data);
				if(response.success=='1')
				{
					$(".menu-login-section").fadeIn(400);
					if(!$(".menu-close > button").hasClass('is-active'))
						$(".menu-close > button").addClass('is-active');
					$(".signin").show();
					$('.messageResponse').html(response.message);
					$(".alert_message").show();
					$('#repsoneRest').removeClass('hide');
					var ErrID   =   elem.attr('data-parsley-id')
					$('#parsley-id-satn-'+ErrID).html('');

				}
			}
		});

	}


</script>
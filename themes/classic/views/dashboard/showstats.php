<section class="wrapper">
	<section class="centered-wrapper">
		<h4>Showing stats for</h4>
		<h3><?php echo $product->name; ?></h3>
		<hr class="half-center">

		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="stat-box">
					<i class="fa fa-users fa-5x"></i>
					<p>Customer Count : <?php echo $product->customer_count; ?></p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="stat-box">
					<i class="fa fa-eye fa-5x"></i>
					<p>Visitors Count : <?php echo $product->visit_count; ?></p>
				</div>
			</div>
		</div>
		<div class="row">
			<h4>PPC Counts</h4>
			<table class="col-lg-12">
				<thead>
					<tr class="row">
						<td class="col-lg-2">S.No.</td>
						<td class="col-lg-3">Month</td>
						<td class="col-lg-2">Year</td>
						<td class="col-lg-1">Clicks</td>
						<td class="col-lg-2">Bid Cost</td>
						<td class="col-lg-2">Amount</td>
					</tr>
				</thead>

				<tbody>
					<?php 
						$index = 1;
						foreach ($stats as $stat): ?>
							<tr class="row">
								<td class="col-lg-2"><?php echo $index; ?></td>
								<td class="col-lg-3"><?php echo $stat['month']; ?></td>
								<td class="col-lg-2"><?php echo $stat['year']; ?></td>
								<td class="col-lg-1"><?php echo $stat['click_count']; ?></td>
								<td class="col-lg-2"><?php echo "$".$product->bidding_amount; ?></td>
								<td class="col-lg-2"><?php echo "$".$product->bidding_amount*$stat['click_count']; ?></td>
							</tr>
					<?php  $index += 1; endforeach; ?>
				</tbody>
			</table>
		</div>
	</section>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.0.7/parsley.min.js" async></script>
<script type="text/javascript">
	$('#editProduct').addClass('active');
	$('#dashboard').removeClass('active');
	$(document).ready(function(){
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

	function send()
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
</script>
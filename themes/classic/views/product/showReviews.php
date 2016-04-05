<?php 
/*Calculating average ratings*/
$averageOverall = 0;
$averageEaseOfUse = 0;
$averageCustomerSupport = 0;
$average = 0;

$reviewNumber = "Review";
$numberOfReviews = 0;

if(!empty($reviews))
{
	$numberOfReviews = count($reviews);

	if ($numberOfReviews > 1)
		$reviewNumber = "Reviews";
	else
		$reviewNumber = "Review";

	foreach ($reviews as $review)
	{
		$ratings = $review->ratings;

		foreach ($ratings as $rating)
		{
			if ($rating->rating_category_id == 1)
				$averageOverall += $rating->rating;
			else if ($rating->rating_category_id == 2)
				$averageEaseOfUse += $rating->rating;
			else
				$averageCustomerSupport += $rating->rating;
		}
	}

	$averageOverall /= $numberOfReviews;
	$averageCustomerSupport /= $numberOfReviews;
	$averageEaseOfUse /= $numberOfReviews;

	$average = ($averageOverall + $averageEaseOfUse + $averageCustomerSupport)/3;
}
/*Calculating average ratings*/

$deploymentFeatures = $product->deploymentFeatures;

$supportFeatures = $product->supportFeatures;

$trainingFeatures = $product->trainingFeatures;

if ($product->has_trial == 1)
{
	$trial = "Yes";
	$trailClass = "glyphicon glyphicon-ok gly-ok-style";
}
else
{
	$trial = "No";
	$trailClass = "";
}

if ($product->has_free_version == 1)
{
	$freeVersion = "Yes";
	$versionClass = "glyphicon glyphicon-ok gly-ok-style";
}
else
{
	$freeVersion = "No";
	$versionClass = "";
}

?>

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/js/star-rating-no-edit.js" type="text/javascript">
</script>
<style type="text/css">
	.p-text{
    font-size: 14px;
    color: #4d5a6a;
    font-family: aller_lightregular;
    text-align: left;
    line-height: 26px;
    margin-top: 20px;
    float: left;}
</style>
<!--  -->


<div class="main ">
	<section class="section-white">
		<div class="container">
		<!-- <section class="section1"> -->
			<div class="row pd10">
				<div class="col-sm-10 ">
					<div class="media" > 
						<div class="media-left media-middle ">
							<img src="<?php echo Yii::app()->request->baseUrl.'/themes/product_logo/'.$product->logo.'.png'; ?>" class="img-thumbnail" alt="Product Icon" width="100px" height="130px" >
						</div>
						<div class="media-body">
							<h2 class="media-header"><?php echo $product->name?></h2>
							<small>by <?php echo $product->company_name?></small>
							<input id="input-21b" value="<?php echo $average?>" type="number" class="rating" min="0" max="5" step="0.5" data-size="xs">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- about us -->
	<section class="section-bg">
		<div class="container">
			<div class="row"> 
				<div class="col-md-6">
					<h3><span class="glyphicon glyphicon-info-sign"></span> About This Software </h3> 
					<p class="p-text"><?php echo $product->description?></p> 
				</div> 
				<div class="col-md-6">
					<h3><span class="glyphicon glyphicon-star pd15"></span> Average Ratings </h3> 
					<div class="check-list check-list-border-bottom half-margin-bottom">
						<div class="row  list-padding">
							<div class="col-md-12">
								<div class="col-md-6">
									<strong>Overall</strong>
								</div>
								<div class="col-md-6"> 
									<input id="input-21b" value="<?php echo $averageOverall?>" type="number" class="rating" min="0" max="5" step="0.5" data-size="xs">
								</div>
							</div>
						</div>
						<div class="row  list-padding">
							<div class="col-md-12">
								<div class="col-md-6">
									<strong>Ease of Use</strong>
								</div>
								<div class="col-md-6"> 
									<input id="input-21b" value="<?php echo $averageEaseOfUse?>" type="number" class="rating" min="0" max="5" step="0.5" data-size="xs">
								</div>
							</div>
						</div>
						<div class="row  list-padding">
							<div class="col-md-12">
								<div class="col-md-6">
									<strong>Customer Support</strong>
								</div>
								<div class="col-md-6"> 
									<input id="input-21b" value="<?php echo $averageCustomerSupport?>" type="number" class="rating" min="0" max="5" step="0.5" data-size="xs">
								</div>
							</div>
						</div>
						<div class="row ">
							<div class="col-md-12">
								<div class="col-md-6 pd12">
									<a href="#review"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/images/chat-icon.png" width="28" height="28"/>
										<?php echo $numberOfReviews, " ", $reviewNumber?></a>
									</div>
									<div class="col-md-6 pd12">
										<a href="<?php echo Yii::app()->createUrl('/product/ProductReview/',array('id'=>$product->id));?>">
											Review This Product 
										</a>
									</div>
								</div>
							</div> 
						</div>
					</div>
				</div>  
			</div>
		</section>
<section class="section-white">
	<div class="container">
		<div class="row ">
			<div class="col-md-6">
				<h3><img src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/images/search.png" alt="product" width="30" height="25"></img> Product Details</h3>
				<!--start-->
				<div class="check-list check-list-border-bottom half-margin-bottom">
					<div class="row ">
						<div class="col-md-10 list-padding">
							<div class="col-md-4">
								<strong>Starting Price</strong>
							</div>
							<div class="col-md-6"> 
								<?php echo $product->starting_price?>
							</div>
						</div>
					</div>
					<div class="row ">
						<div class="col-md-10 list-padding">
							<div class="col-md-4">
								<strong>Deployment</strong>
							</div>
							<div class="col-md-6"> 
								<?php foreach($deploymentFeatures as $deploymentFeature):?>
									<span class="glyphicon glyphicon-ok gly-ok-style"></span><?php echo $deploymentFeature->name?>
									<br>
								<?php endforeach ?>
							</div>

						</div>
					</div>
					<div class="row">
						<div class="col-md-10 list-padding">
							<div class="col-md-4">
								<strong>Free Version</strong>
							</div>

							<div class="col-md-6"> 
								<span class="<?php echo $versionClass?>"></span><?php echo $freeVersion?>
								<br>
							</div>

						</div>
					</div>
					<div class="row">
						<div class="col-md-10 list-padding">
							<div class="col-md-4">
								<strong>Free Trial</strong>
							</div>

							<div class="col-md-6"> 
								<span class="<?php echo $trailClass?>"></span><?php echo $trial?>
								<br>
							</div>

						</div>
					</div>

					<div class="row">
						<div class="col-md-10 list-padding">
							<div class="col-md-4">
								<strong>Training</strong>
							</div>

							<div class="col-md-6"> 
								<?php foreach($trainingFeatures as $trainingFeature): ?>
									<span class="glyphicon glyphicon-ok gly-ok-style"></span><?php echo $trainingFeature->name?>
									<br>
								<?php endforeach ?>
							</div>

						</div>
					</div>
					<div class="row">
						<div class="col-md-10 list-padding">
							<div class="col-md-4">
								<strong>Support</strong>
							</div>

							<div class="col-md-6"> 
								<?php foreach($supportFeatures as $supportFeature): ?>
									<span class="glyphicon glyphicon-ok gly-ok-style"></span><?php echo $supportFeature->name?>
									<br>
								<?php endforeach ?>
							</div>

						</div>
					</div>
					<div class="row">
						<h3><img src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/images/vendor.png" alt="product" width="40" height="40"></img> Vendor Details</h3>
						<div class="col-md-10 list-padding"> 
							<strong><?php echo $product->company_name?></strong>
						</div>
					</div>
					<div class="row">
						<div class="col-md-10 list-padding"> 
							<strong><?php echo $product->company_website?> </strong>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 list-padding"> 
						<strong>Founded <?php echo $product->founding_year?></strong>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 list-padding"> 
						<strong><?php echo $product->founding_country?></strong>
					</div>
				</div>
			</div>

			<div class="col-md-6 pd10">
				<iframe width="600" height="400" src="http://www.youtube.com/embed/KgMt0dtr4Vc" frameborder="1" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</section>
<section class="section-bg">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3><span class="glyphicon glyphicon-th-list pd15"></span> Feature Checklist</h3> 
				<div class="col-md-6">
					<?php for($i=0;$i<count($productCategoryFeatures)/2;$i++):?>
							<span  class="
							<?php 
							if (in_array($productCategoryFeatures[$i], $productFeatures)) {
								echo "glyphicon glyphicon-ok-sign gly-ok-style";
								?>">
								</span>
								<strong>
									<span class="available black-color"><?php echo $productCategoryFeatures[$i]?></span>
								</strong>
								<?php
							}
							else
							{
								echo "not-available glyphicon glyphicon-ok-sign";
								?>">
								</span>
								<strong>
									<span class="not-available black-color"><?php echo $productCategoryFeatures[$i]?></span>
								</strong>
								<?php
							}
							?>
					<hr>
				<?php endfor
				?>
			</div>
			<div class="col-md-6">
				<?php for($i=count($productCategoryFeatures)/2;$i<count($productCategoryFeatures);$i++):?>
					<span  class="
							<?php 
							if (in_array($productCategoryFeatures[$i], $productFeatures)) {
								echo "glyphicon glyphicon-ok-sign gly-ok-style";
								?>">
								</span>
								<strong>
									<span class="available black-color"><?php echo $productCategoryFeatures[$i]?></span>
								</strong>
								<?php
							}
							else
							{
								echo "not-available glyphicon glyphicon-ok-sign";
								?>">
								</span>
								<strong>
									<span class="not-available black-color"><?php echo $productCategoryFeatures[$i]?></span>
								</strong>
								<?php
							}
							?>
				<hr>
			<?php endfor?>
		</div>
	</div>
	</div>
	</div>
</section>


<?php foreach ($reviews as $review ):

	$user = $review->user;

	$ratings = $review->ratings;

	$splitTimeStamp = explode(" ",$review->add_date);
	$date = $splitTimeStamp[0];
//$time = $splitTimeStamp[1];

	$overall = 0;
	$easeOfUse = 0;
	$customerSupport = 0;

	foreach ($ratings as $rating )
	{
		if ($rating->rating_category_id == 1)
			$overall = $rating->rating;
		else if ($rating->rating_category_id == 2)
			$easeOfUse = $rating->rating;
		else
			$customerSupport = $rating->rating;
	}
	?>
	<section class="section-white" id="review">
		<div class="review-content">

			<section class="container reviews">

				<div class="row">

					<div>
						<h2><?php echo $user->first_name;?></h2>
						<h3><?php echo $user->job_profile;?>, <?php echo $user->organization;?></h3>
					</div>

					<div><h3><?php echo $date;?></h3></div>

				</div>

				<div class="row">
					<h2><i>'<?php echo $review->title;?>'</i></h2>
				</div>

				<div class="col-lg-4"><b>Overall</b>
					<input id="input-21b" value="<?php echo $overall?>" type="number" class="rating" min=0 max=5 step=0.2 data-size="sm">
				</div>

				<div class="col-lg-4"><b>Ease of use</b>
					<input id="input-21b" value="<?php echo $easeOfUse?>" type="number" class="rating" min=0 max=5 step=0.2 data-size="sm">
				</div>

				<div class="col-lg-4">  <b>Customer Support</b>
					<input id="input-21b" value="<?php echo $customerSupport?>" type="number" class="rating" min=0 max=5 step=0.2 data-size="sm">
				</div>

				<div class="row">
					<h3><b>Comment</b></h3>
					<h4><?php echo $review->comment?></h4>  
				</div>

			</section>

		</div>  
	</section>

<?php endforeach?>
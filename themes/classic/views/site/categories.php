<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<div style="background: #f2f2f2; width: 100%; padding: 2em 0;">
	<section class="categories">
		<hgroup>
			<h2><b>Browse</b> our software categories</h2>
			<h4>Find your software in one of our 300+ categories - from Accounting to Yoga, we cover it all!</h4>
		</hgroup>
		<main class="content">
			<div class="cat-list" >
				<form>
					<input type="text" id="cat-search" placeholder="Search in categories" onkeyup="filterCategory(this.value)" />
					<div class='cat-view' id="category-list">
						<?php
						$this->renderPartial('render_categories',array('categories'=>$categories));
						?>
					</div>
				</form>
			</div>

			<div class="popular-cat">
				<h3>Popular Categories</h3>
				<form><ul></ul>
					<ul>
						<li><a href="<?php echo CController::createUrl('/product/index/?value=Applicant Tracking');?>">Applicant Tracking</a></li>
						<li><a href="<?php echo CController::createUrl('/product/index/?value=Church Management');?>">Church Management</a></li>
						<li><a href="<?php echo CController::createUrl('/product/index/?value=Contact Management');?>">Contact Management</a></li>
						<li><a href="<?php echo CController::createUrl('/product/index/?value=Accounting');?>">Accounting</a></li>
						<li><a href="<?php echo CController::createUrl('/product/index/?value=Construction CRM');?>">Construction CRM</a></li>
						<li><a href="<?php echo CController::createUrl('/product/index/?value=Field Service Management');?>">Field Service Management</a></li>
						<li><a href="<?php echo CController::createUrl('/product/index/?value=Learning Management System');?>">Learning Management System</a></li>
						<li><a href="<?php echo CController::createUrl('/product/index/?value=Maintenance Management');?>">Maintenance Management</a></li>
						<li><a href="<?php echo CController::createUrl('/product/index/?value=Project Management');?>">Project Management</a></li>
					</ul>
				</form>
			</div>
		</main>
	</section>
</div>

<script type="text/javascript">
	function filterCategory(partialText){
		var data = "&partialText=" + partialText;
		$.ajax({
			type: 'POST',
			url: '<?php echo Yii::app()->createUrl('site/categoryfilter')?>',
			data: data,
			success: function(data){
				$('#category-list').html(data);
			},
			error: function(data){
				console.log(data);
			}
		})
	}
</script>
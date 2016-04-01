<?php
$flag = true;
$prev = strtolower($categories[0]->name[0]);
foreach($categories as $category)
{
	$categoryName = $category->name;

	$curr = strtolower($category->name[0]);
	x:if(ctype_digit($curr))
	{
		?>
		<div class='cat-row'>
			<h2>#</h2>
			<ul>
				<a href='<?php echo Yii::app()->createUrl("/Product/index?value=".$categoryName);?>'>
					<li><?php echo $category->name?></li>
				</a>
			</ul>
		</div>
		<?php
	}
	else
	{
		if($flag)
		{
			?>
			<div class='cat-row'>
				<h2><?php echo strtoupper($curr)?></h2>
				<ul>
					<a href='<?php echo Yii::app()->createUrl("/Product/index?value=".$categoryName);?>'>
						<li><?php echo $category->name?></li>
					</a>
					<?php
					$prev = $curr;
					$flag = false;
				}
				elseif($prev == $curr)
				{
					?>
					<a href='<?php echo Yii::app()->createUrl("/Product/index?value=".$categoryName);?>'>
						<li><?php echo $category->name?></li>
					</a>
					<?php
				}
				else
				{
					?>
				</ul>
			</div>
			<?php
			$prev = $curr;
			$flag = true;
			goto x;
		}
	}
} ?>
</ul>
</div>
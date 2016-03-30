<?php
$flag = true;
$prev = strtolower($categories[0]->name[0]);
foreach($categories as $category)
{
	$curr = strtolower($category->name[0]);
	x:if(ctype_digit($curr))
	{
		?>
		<div class='cat-row'>
			<h2>#</h2>
			<ul>
				<a href='#'>
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
					<a href='#'>
						<li><?php echo $category->name?></li>
					</a>
					<?php
					$prev = $curr;
					$flag = false;
				}
				elseif($prev == $curr)
				{
					?>
					<a href='#'>
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
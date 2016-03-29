<div style="background: #f2f2f2; width: 100%; padding: 2em 0;">
	<section class="categories">
		<hgroup>
    	<h2><b>Browse</b> our software categories</h2>
      <h4>Find your software in one of our 300+ categories - from Accounting to Yoga, we cover it all!</h4>
    </hgroup>
    <main class="content">
    	<div class="cat-list">
      	<form>
        	<input type="text" id="cat-search" placeholder="Search in categories"/>
          	<div class='cat-view'>
            	<?php
              	$categories=Categories::model()->findAllByAttributes(array('status'=>1));
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
          </div>
        </form>
      </div>

      <div class="popular-cat">
        <h3>Popular Categories</h3>
        <form><ul></ul>
          <ul>
            <li><a href="#">Applicant Tracking</a></li>
            <li><a href="#">Church</a></li>
            <li><a href="#">Contact Management</a></li>
            <li><a href="#">Accounting</a></li>
            <li><a href="#">Construction</a></li>
            <li><a href="#">Field Service</a></li>
            <li><a href="#">Learning Management System</a></li>
            <li><a href="#">Maintenance</a></li>
            <li><a href="#">Project Management</a></li>
          </ul>
        </form>
      </div>
		</main>
	</section>
</div>
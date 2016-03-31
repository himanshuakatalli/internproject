
      <?php 
        foreach ($products as $product) {    
      ?>
        
    
      
      <div class="well">
          <div class="media">
              <div class="media-left media-middle">
                  <a href=<?php echo '"'.$product->product_website.'"' ?>>
                       <img class="media-object img-thumbnail" src=<?php echo Yii::app()->request->baseUrl.'/themes/product_logo/'.$product->logo.'.png'; ?> alt="Pic">
                  </a>
              </div>
              <div class="media-body">
                  <div class="col-sm-12 col-md-8 ">
                      <a href=<?php echo '"'.$product->product_website.'"' ?>>
                          <h3> <?php echo $product->name ?></h3>
                      </a>
                      <h4>
                          <small>
                               by <?php echo $product->company_name ?>
                          </small>
                      </h4>
                      <div class="rating" data-rating-max="5">
                        
                      </div>
                  </div>
                  <div class="col-sm-12 col-md-4">
                      <a href= <?php echo '"'.$product->company_website.'"' ?> type="button" class="btn btn-lg btn-primary">        Visit Website
                      </a> 
                  </div>
                  <div class="col-sm-12">
                          
                      <p class="small">
                                <?php echo $product->description ?>
                                <a href="<?php echo Yii::app()->createUrl('/productProfile/index/'.$product->id.'')?>">View Profile</a>
                      </p>
                  </div>
              </div>
              
          </div>
          
      </div>
      <?php  } ?>


     

    
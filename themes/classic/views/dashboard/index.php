<?php
  $product = $productArray[$indexOfMax];
?>
<section class="wrapper">
  <div class="row">
    <div class="main-chart">

      <div class="row mtbox">
        <div class="col-md-2 col-sm-2 col-md-offset-2 box0">
          <div class="box1">
            <span class="li_heart"></span>
            <h3><?php echo $product->name; ?></h3>
          </div>
          <p>Most trending of your products</p>
        </div>

        <div class="col-md-2 col-sm-2 box0">
          <div class="box1">
            <span class="li_user"></span>
            <h3><?php echo $product->customer_count; ?></h3>
          </div>
          <p><?php echo $product->name; ?> have a total of <?php echo $product->customer_count; ?> users.</p>
        </div>

        <div class="col-md-2 col-sm-2 box0">
          <div class="box1">
            <span class="li_eye"></span>
            <h3>+<?php echo $product->visit_count ?></h3>
          </div>
          <p>Total <?php echo $product->visit_count ?> people eyed on <?php echo $product->name; ?> profile</p>
        </div>

        <div class="col-md-2 col-sm-2 box0">
          <div class="box1">
            <span class="li_vallet"></span>
            <h3>+3</h3>
          </div>
          <p>Total 3 transactions have been made for <?php echo $product->name; ?>.</p>
        </div>
      </div>

      <?php
        $max = 0;
        $index;
        foreach ($productArray as $key => $prod) {
          if ($max <= $prod->customer_count){
              $max = $prod->customer_count;
              $index = $key;
          }
        }
      ?>
      <div class="row mt">
        <div class="col-md-4 col-sm-4 mb">
          <div class="white-panel pn">
            <div class="white-header">
              <h5>TOP SELLING PRODUCT</h5>
            </div>
            <div class="row">
              <div class="col-sm-6 col-xs-6 goleft">
                <p><i class="fa fa-users"></i><?php echo $productArray[$index]->customer_count; ?></p>
              </div>
              <div class="col-sm-6 col-xs-6"></div>
            </div>
            <div class="centered">
              <img src="<?php echo Yii::app()->request->baseUrl."/themes/product_logo/{$productArray[$index]->logo}.png";?>" class="img-circle" width="80">
              <p style="margin-top: 1em; margin-left: -0.5em; color: rgba(0,0,0,0.4);"><?php echo $productArray[$index]->name; ?></p>
            </div>
          </div>
        </div>


        <?php
          $averageMax = 0;
          if(!empty($productArray[$index]->reviews)) {
            foreach ($productArray[$index]->reviews as $reviewKey => $review) {
              # code...
              $max = 0;
              foreach ($review->ratings as $ratingKey => $rating) {
                # code...
                $max += $rating->rating;
              }
              if($averageMax < round($max / count($review->ratings),2))
                $averageMax = round($max / count($review->ratings));
            }
          } else {

          }
        ?>
        <div class="col-md-4 col-sm-4 mb">
          <div class="white-panel pn donut-chart">
            <div class="white-header">
              <h5>Ratings</h5>
            </div>
            <div class="row">
              <div class="col-sm-6 col-xs-6 goleft">
                <p><i class="fa fa-star"></i> <?php echo round($averageMax,2);?></p>
              </div>
            </div>
            <canvas id="serverstatus01" height="120" width="120" style="z-index: -999!important;"></canvas>
            <script>
              var doughnutData = [
                  {
                    value: <?php echo round(20*round($averageMax,2));?>,
                    color:"#f07762"
                  },
                  {
                    value : <?php echo round(100-20*round($averageMax,2));?>,
                    color : "#fdfdfd"
                  }
                ];
                var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
            </script>
          </div>
        </div>

        <div class="col-md-4 mb">
          <div class="white-panel pn">
            <div class="white-header">
              <h5>Transactions</h5>
            </div>
            <p><img src="<?php echo Yii::app()->request->baseUrl."/themes/product_logo/{$productArray[$index]->logo}.png";?>" class="img-circle" width="80"></p>
            <p class="dark"><b><?php echo $productArray[$index]->name; ?></b></p>
            <div class="row">
              <div class="col-md-6 vpOrange">
                <p class="small mt vpOrange">Done</p>
                <p>$129</p>
              </div>
              <div class="col-md-6 vpOrange">
                <p class="small mt vpOrange">Pending</p>
                <p>$47</p>
              </div>
            </div>
          </div>
        </div>
      </div>


      <?php
        $ppcCount = array();
        $criteria = new CDbCriteria();
        for($a=1; $a<=7; $a++) {
          $str = date("Y-m-d",time()-$a*24*60*60);
          $criteria->condition = "add_date like '%".$str."%' AND product_id=".$productArray[$index]->id;
          $criteria->params = array(':str'=>$str);
          array_push($ppcCount,TrackingUser::model()->count($criteria));
        }
      ?>
      <div class="row mt">
        <div class="border-head">
            <h3>LEAD STATS - LAST SEVEN DAYS<br><br>
            <?php echo $productArray[$index]->name; ?> - Top Selling Product</h3>
        </div>
        <div class="custom-bar-chart">
            <ul class="y-axis">
                <li><span>10</span></li>
                <li><span>8</span></li>
                <li><span>6</span></li>
                <li><span>4</span></li>
                <li><span>2</span></li>
                <li><span>0</span></li>
            </ul>
            <?php foreach ($ppcCount as $key => $count): ?>
              <div class="bar">
                <?php $c = ($count/10)*100;?>
                <div class="title"><?php echo date('D d',time()-($key+1)*24*60*60);?></div>
                <div class="value tooltips" data-original-title="<?php echo $count; ?>" data-toggle="tooltip" data-placement="top"><?php echo "{$c}%"; ?></div>
              </div>
            <?php endforeach; ?>
        </div>
      </div>

      <?php
        $ppcCount = array();
        $criteria = new CDbCriteria();
        for($a=1; $a<=7; $a++) {
          $str = date("Y-m-d",time()-$a*24*60*60);
          $criteria->condition = "add_date like '%".$str."%' AND product_id=".$productArray[$indexOfMax]->id;
          $criteria->params = array(':str'=>$str);
          array_push($ppcCount,TrackingUser::model()->count($criteria));
        }
      ?>

      <div class="row mt">
        <div class="border-head">
            <h3><?php echo $productArray[$indexOfMax]->name; ?> - Trending Product</h3>
        </div>
        <div class="custom-bar-chart">
            <ul class="y-axis">
                <li><span>10.000</span></li>
                <li><span>8.000</span></li>
                <li><span>6.000</span></li>
                <li><span>4.000</span></li>
                <li><span>2.000</span></li>
                <li><span>0</span></li>
            </ul>
            <?php foreach ($ppcCount as $key => $count): ?>
              <?php $c = ($count/10)*100;?>
              <div class="bar">
                  <div class="title"><?php echo date('D d',time()-($key+1)*24*60*60);?></div>
                  <div class="value tooltips" data-original-title="<?php echo $count; ?>" data-toggle="tooltip" data-placement="top"><?php echo "{$c}%";?></div>
              </div>
            <?php endforeach; ?>
        </div>
      </div>

    </div>
  </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script type="text/javascript">
    $('#dashboard').addClass('active');
  </script>
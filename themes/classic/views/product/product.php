<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <style>
      body
      {
        background-color: #e9eaed;
      }
     .well{
             background-color: #ffffff;
              opacity: 0.85;
          }
  </style>

</head>
<body>
<div class="container">
    <div class="text-center">
            <h1 style="padding-top: 50px">
             Top VenturePact <b><?php echo $categoryInfo->name ?></b> Softwares
            </h1>
            <h2>
                <small >
                    Use VenturePact to find the best <b><?php echo $categoryInfo->name ?></b> software for your business.
                </small>
            </h2>
            <hr>              
    </div>
    
    <div class = "col-sm-8 col-md-8" id="productList">
    <?php $this->renderPartial('_products',array('products'=>$products)); ?>
    </div>
    <div class="col-sm-4  col-md-3 col-md-offset-1">
          <div class="well">
              <h3  style="margin-top:0px" class="text-center"><b>Filter Result </b></h3>
              <br>
              <br>
              <form id="filter_form" >
                      <div style="margin-left: 18px">
                                <b>Number Of Users</b>

                                <div class="radio">
                                    <label><input type="radio" name="nuser" value="0-1" >1</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="nuser" value="2-9">2-9</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="nuser" value="10-49">10-49</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="nuser" value="50-99">50-99</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="nuser" value="100-499">100-499</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="nuser" value="500-999">500-999</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="nuser" value="1000-100000000">1000+</label> 
                                </div>
                               <br>
                               <br>

                               <b>Deployment</b>
                               <?php foreach ($deployment as $deploy) {    ?>
                               <div class="checkbox">
                                     <label><input type="checkbox" name = "deploy[]" 
                                        value= <?php echo '"'.$deploy->id.'"' ?>>
                                        <?php echo $deploy->name ?>
                                     </label>
                               </div>
                               <?php  } ?>

                              <br>
                              <br>




                               <b>Features</b>
                               <?php foreach ($features as $feature) {    ?>
                                 <div class="checkbox">
                                       <label><input type="checkbox" name="features[]" 
                                          value=<?php echo '"'.$feature->id.'"' ?> >
                                           <?php echo $feature->name ?>
                                       </label>
                                 </div>
                               <?php  } ?>

                               <br>
                               <br>
                              

                       </div>
                       <button id="filterButton" type="button" onclick="send();" class="btn btn-primary">Reset</button>
               </form>
      </div>


    </div>

</div>



<script type="text/javascript">
$(document).ready(function(){
  var xhr;
     




  function send()
  {
     
    $('#filter_form input').removeAttr('checked').removeAttr('selected');
   
  }


  $('#filter_form input').change(function(){

    var data=$("#filter_form").serialize();
    window.scrollTo(0,0);
    
    
    if(xhr && xhr.readyState != 4){
            xhr.abort();
        }
      xhr = $.ajax({
                   type: 'POST',
                   url: '<?php echo Yii::app()->createAbsoluteUrl("product/filter/$categoryInfo->id"); ?>',
                   data:data,
                   success:function(response){
                                
                              var data = $.parseJSON(response);
                               if(data.success==1){
                                  $('#productList').html(data.content);
                               }
                   },
                   error: function(data) { // if error occured
                         alert("Error occured.please try again");
                         alert(data);
                   },
                 
                  dataType:'html'
      });

   

  });


});



</script>

</body>
</html>
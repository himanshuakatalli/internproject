
  <style>
      body
      {
        background-color: #e9eaed;
      }
     .well
      {
        background-color: #ffffff;
        opacity: 0.85;
      }
      .loader
      {
        min-height: 100px;
        background:
                url(<?php echo Yii::app()->request->baseUrl.'/themes/product_logo/Loader.gif'?>)
                no-repeat center;
                z-index:99;
      }
  </style>
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

    <div class = "col-sm-8 col-md-8 " id="productList">
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
                                    <label><input type="radio" name="nuser" value="1000-1000000000">1000+</label>
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
                       <button id="filterButton" type="button" onclick="Reset()" class="btn btn-primary">Reset</button>
               </form>
      </div>
    </div>

</div>



<script type="text/javascript">
$(document).ready(function(){


 //setting up loader
  $body = $("#productList");

  $(document).on({
      ajaxStart: function() { $body.addClass("loader");   },
      ajaxStop: function() { $body.removeClass("loader"); }
  });
  //reseting form values
  function Reseting()
  {
    $('#filter_form input').removeAttr('checked').removeAttr('selected');
    $("#productList").empty();
    callingAjax();
  }

  var xhr;   //xmlhttpRequest object
   $('#filter_form input').change(function(){
    $("#productList").empty();
    callingAjax();

   });


  function callingAjax()
  {
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
                        /* alert("Error occured.please try again");
                         alert(data);*/
                   },

                  dataType:'html'
      });

  }
});
</script>
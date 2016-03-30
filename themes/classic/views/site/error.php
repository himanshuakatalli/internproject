<br><br><br>
<div class="container">
    <div class="row">
        <?php
            if($code==500){
        ?>
        <div class="error500 errorpage">
            <h1>Error <?php echo $code; ?></h1>
        </div>
        <?php
            }
            elseif($code==404){
        ?>
        <div class="error404 errorpage">
            <h1>Error <?php echo $code; ?></h1>
        </div>
        <?php
            }
            elseif($code==403){
        ?>
        <div class="error403 errorpage">
            <h1>Error <?php echo $code; ?></h1>
        </div>
        <?php
            }
            elseif($code==401){
        ?>
        <div class="error401 errorpage">
            <h1>Error <?php echo $code; ?></h1>
        </div>
        <?php
            }
            elseif($code==400){
        ?>
        <div class="error400 errorpage">
            <h1>Error <?php echo $code; ?></h1>
        </div>
        <?php
            }
        ?>
    </div>
</div>
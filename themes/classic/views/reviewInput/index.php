 <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <link rel="stylesheet"  href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/js/materialize.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/js/star-rating.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/css/reviewInput.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/js/parsley.min.js"></script>

 <section class="form-container clear-fix">
        <div class="form-header">
           <div><img src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/images/Product/Rubik_solved.png"></div>
            <hgroup>
                <h2>Salesforce</h2>
                <h3>By Salesforce.com</h3>
            </hgroup>
        </div>
        
        <?php $form=$this->beginwidget('CActiveForm',array('id'=>'review-edit','enableClientValidation'=>true,'htmlOptions'=>array('data-parsley-validate'=>'data-parsley-validate'))); ?>

            <h3>How would you rate this product ?</h3>
                <div class="form-row">
                    <?php
                        $categories=RatingCategories::model()->findAll(); 
                        foreach ($categories as $categorie) {
                    ?>
                    <div class="star-rating">
                        <h4><?php echo $categorie->name; ?></h4>
                        <input id="input-<?php echo $categorie->name; ?>" name="<?php echo $categorie->id; ?>" value="0" type="number" class="rating" min=0 max=5 step=0.2 data-size="sm" >
                        </div>
                    <?php
                        }
                    ?>
                </div>

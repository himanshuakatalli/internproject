<?php
  namespace protected/components/CustomHelpers;
  /**
  *
  */
  class Helper
  {

    public static function getTrendingProduct()
    {
      # code...
      // CVarDumper::dump("Hllo",10,1);
      echo "Hello";
      return Product::model()->with('reviews','reviews.ratings')->findAllByAttributes(array('user_id'=>Yii::app()->user->user_id));
    }
  }
?>
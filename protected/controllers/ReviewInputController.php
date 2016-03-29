<?php

class ReviewInputController extends Controller
{
	public function actionIndex()
	{
		$this->layout = "pagehead";
		$review=new Reviews;
		$user=new Users;
		$this->render('reviewsinput',array('review'=>$review,'user'=>$user));
	}


	public function actionAjax()
	{
			$response="";
			/*CVarDumper::dump($_POST,10,1);
			die;*/
		 	$email = $_POST['Users']['username'];
		x:  $user = Users::model()->findByAttributes(array('username'=>$email));
			if($user)
			{
				//echo "user";

				$review = Reviews::model()->findByAttributes(array('user_id'=>$user->id));
				if(empty($review)){
					$review = new Reviews;
					$review->attributes = $_POST['Reviews'];
					$review->user_id = $user->id;
					$review->product_id = 1;
					$review->add_date = new CDbExpression('NOW()');
					if($review->save()){
						$review = Reviews::model()->findByAttributes(array('user_id'=>$user->id));
						$categories=RatingCategories::model()->findAll();
						foreach ($categories as $category) {
							$rating = new Ratings;
							$rating->review_id = $review->id;
							$rating->rating_category_id = $category->id;
							$rating->rating = $_POST[$category->id];
							$rating->add_date = new CDbExpression('NOW()');
							$rating->save();
						}
						$response['userSaved']=1;
					}
				}
				else{
					$review->attributes = $_POST['Reviews'];
					$review->modify_date = new CDbExpression('NOW()');
					if($review->update()){
						foreach ($review->ratings as $rating) {
							$rating->rating = $_POST[$rating->ratingCategory->id];
							$rating->modify_date = new CDbExpression('NOW()');
							$rating->update();
						}
						$response['userUpdate']=2;
					}
				}
				echo json_encode($response);
				die;	
			}
			else 
			{	
  				$m=Yii::app()->getSecurityManager()->generateRandomString(6);
				$user = new Users;
				$user->attributes = $_POST['Users'];
				$user->password = $m;
				$user->role_id = 3;
				$user->is_verified = 0;
				$user->add_date = new CDbExpression('NOW()');

				if($user->save())
				{
					goto x;
				}
			}
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
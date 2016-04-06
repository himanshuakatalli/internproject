<?php

class ProductController extends Controller
{
	public function actionIndex()
	{
	   if(isset($_GET["value"]))
	   {

      $catName = $_GET["value"];  // taking category name from querystring
      $categoryInfo = Categories::model()->findByAttributes(array('name'=>$catName));    //for getting category Info

      $deployment = DeploymentFeatures::model()->findAll();  // for finding all deployment features

      $criteria=new CDbCriteria;                             //for finding products related to that category
			$criteria->with = array('categories');
			$criteria->addCondition('category_id= '.$categoryInfo->id);
			$products = Product::model()->findAll($criteria);

			$criteria2=new CDbCriteria;                          // for finding features related to that category
			$criteria2->with = array('categories');
			$criteria2->addCondition('category_id= '.$categoryInfo->id);
			$features = Features::model()->findALL($criteria2);

	   	//CVarDumper::dump($features,10,1);die;
	   	$this->render('product',array('products'=>$products,
			'features'=>$features,'categoryInfo'=>$categoryInfo,
			'deployment'=>$deployment));
	   }
	}


public function actionFilter($id)
{
	  //sleep(3);
		//CVarDumper::dump( $id,10,1);die;
		$criteria=new CDbCriteria;                             //for finding products related to that category
		$criteria->with = array('categories','features','deploymentFeatures');
		$criteria->addCondition('category_id= '.$id);
		//adding conditions according to post request
		if(isset($_POST['deploy']))
		{
			$criteria->addInCondition('deployment_feature_id',$_POST['deploy']);
		}
		if(isset($_POST['features']))
		{
			$criteria->addInCondition('feature_id',$_POST['features']);
		}
		if(isset($_POST['nuser']))
		{
			$parts = explode('-', $_POST['nuser']);
			$criteria->addCondition('customer_count >= '.$parts[0] . ' and customer_count <= '.$parts[1]);
		}

		$products = Product::model()->findAll($criteria);
		$content = $this->renderPartial('_products',array('products'=>$products),true);
		die(json_encode(array('content'=>$content,'success'=>1)));

}


	public function actionSearch()
	{
		if(isset($_GET["key"]))
		{
			$criteria=new CDbCriteria;
			$criteria->with = array('productHasCategories');
			$criteria->addCondition("name like '%".$_GET["key"]."%' or "."company_name like '%".$_GET["key"]."%' or "."description like '%".$_GET["key"]."%'" );

			$products = Product::model()->findAll($criteria);
	    //CVarDumper::dump($products,10,1);die;
			$this->render('search',array('products'=>$products));

		}
	}



	public function actionReferring($id)
	{
    $product = Product::model()->findByPk($id);
    //CVarDumper::dump($product,10,1);die;
    $pCookie = Yii::app()->request->cookies["P_".$id];
    if(isset($pCookie))
    {
      CController:: redirect('http://'.$product->product_website);
    }
    else
    {
      $pCookie = new CHttpCookie("P_".$id,'set' );
			$pCookie->expire = time()+60*60*24;
			Yii::app()->request->cookies["P_".$id] = $pCookie;
			$tracking = new TrackingUser;
			$tracking ->product_id = $id;
			$tracking ->user_ip = $this->get_client_ip();
			$tracking ->cookie = "P_".$id;
			$tracking ->entry_time = date("Y-m-d H:i:s",time());
			$tracking ->action_time = date("Y-m-d H:i:s",time());
			$tracking ->add_date = date("Y-m-d H:i:s", time());
			$queryGeoLoc = @unserialize(file_get_contents('http://ip-api.com/php/'.$tracking ->user_ip));
      if($queryGeoLoc && $queryGeoLoc['status'] == 'success')
      {
      	$tracking ->country = $queryGeoLoc['country'];
      	$tracking ->country_code = $queryGeoLoc['countryCode'];
      	$tracking ->region = $queryGeoLoc['region'];
      	$tracking ->region_name = $queryGeoLoc['regionName'];
      	$tracking ->city = $queryGeoLoc['city'];
      	$tracking ->zip = $queryGeoLoc['zip'];
      	$tracking ->latitude = $queryGeoLoc['lat'];
      	$tracking ->longitude = $queryGeoLoc['lon'];
      	$tracking ->timezone = $queryGeoLoc['timezone'];
      	$tracking ->isp = $queryGeoLoc['isp'];
      	$tracking ->org = $queryGeoLoc['org'];
      }
      else
      {
        $tracking ->status_geo = 0;
      }
			$tracking ->save();
			$product->customer_count = $product->customer_count+1;
			$product->update();
      CController:: redirect('http://'.$product->product_website);
    }
  }

	public function actionProductRegister()
	{
		$user = new Users;
		$product = new Product;
		$category = new Categories;
		return $this->render('new_productreg',array('user'=>$user,'product'=>$product,'category'=>$category));
	}

	public function actionProductRegisterSave()
	{
		//print_r($_POST['Product']);
		if(isset(Yii::app()->user->id))
			$email = Yii::app()->user->id;
		else
			$email = $_POST['Users']['username'];

		x:$user = Users::model()->findByAttributes(array('username'=>$email));

		if($user)
		{

			$product = new Product;
			$product->attributes = $_POST['Product'];
			$product->add_date = new CDbExpression('NOW()');
			$product->user_id = $user->id;

			if(isset($_POST['trial']))
			{
				if($_POST['trial'] == 'trial')
				{
					$product->has_trial = 1;
				}
			}

			if(isset($_POST['free_version']))
			{
				if($_POST['free_version'] == 'free')
				{
					$product->has_free_version = 1;
				}
			}

			$deploymentFeatures = array();

			if(isset($_POST['web']))
			{
				array_push($deploymentFeatures,'1');
			}
			if(isset($_POST['desktop']))
			{
				array_push($deploymentFeatures,'2');
			}
			if(isset($_POST['mobile']))
			{
				array_push($deploymentFeatures,'3');
			}

			if($product->save())
			{
				$product_id = $product->id;

				$productHasCategories = new ProductHasCategories;
				$productHasCategories->product_id = $product_id;
				$productHasCategories->category_id = $_POST['Categories']['id'];
				$productHasCategories->add_date = new CDbExpression('NOW()');

				if($productHasCategories->save())
				{
					foreach($deploymentFeatures as $key)
					{
						$productHasDeploymentFeatures = new ProductHasDeploymentFeatures;
						$productHasDeploymentFeatures->product_id = $product_id;
						$productHasDeploymentFeatures->deployment_feature_id = $key;
						$productHasDeploymentFeatures->add_date = new CDbExpression('Now()');

						$productHasDeploymentFeatures->save();
					}
				}
			}
		}
		else
		{
			$randomPassword = Yii::app()->getSecurityManager()->generateRandomString(6);

			$user = new Users;
			$user->attributes = $_POST['Users'];
			$user->password = base64_encode($randomPassword);
			$user->role_id = 2;
			$user->is_verified = 0;
			$user->add_date = new CDbExpression('NOW()');

			if($user->save())
			{
				goto x;
			}
		}
	}

	public function actionProductProfile($id)
	{
		$product = Product::model()->findByPk($id);

		$reviews = Reviews::model()->findAllByAttributes(array('product_id'=>$id));

		$productCategoryFeatures = array();
		foreach ($product->categories as $productCategory)
		{
			foreach ($productCategory->features as $productCategoryFeature)
			{
				array_push($productCategoryFeatures, $productCategoryFeature->name);
			}
		}

		$productFeatures = array();
		foreach ($product->features as $productFeature)
		{
			array_push($productFeatures,$productFeature->name);
		}
		$product->visit_count = $product->visit_count+1;
		$product->update();
		$this->render('showReviews',array('reviews'=>$reviews, 'product'=>$product,
		'productFeatures'=>$productFeatures, 'productCategoryFeatures'=>$productCategoryFeatures));
	}

	public function get_client_ip()
  {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
  }

  public function actionProductReview($id)
	{
		$review = new Reviews;
		$user = new Users;
		$product = Product::model()->findByAttributes(array('id'=>$id));
		$this->render('reviewsinput',array('review'=>$review,'user'=>$user,'product'=>$product));
 	}

	public function actionProductReviewSave($id)
	{
		$response="";

		if(isset(Yii::app()->user->id))
		$email = Yii::app()->user->id;
		else
			$email = $_POST['Users']['username'];

		x:  $user = Users::model()->findByAttributes(array('username'=>$email));
		if($user)
		{
			$review = Reviews::model()->findByAttributes(array('user_id'=>$user->id,'product_id'=>$id));
			if(empty($review))
			{
				$review = new Reviews;
				$review->attributes = $_POST['Reviews'];
				$review->user_id = $user->id;
				$review->product_id = $id;
				$review->add_date = new CDbExpression('NOW()');
				if($review->save())
				{
					$review = Reviews::model()->findByAttributes(array('user_id'=>$user->id));
					$categories=RatingCategories::model()->findAll();
					foreach ($categories as $category)
					{
						$rating = new Ratings;
						$rating->review_id = $review->id;
						$rating->rating_category_id = $category->id;
						$rating->rating = $_POST[$category->id];
						$rating->add_date = new CDbExpression('NOW()');
						$rating->save();
					}
					$response['userSaved'] = 1;
					$response['url'] = Yii::app()->createUrl('product/productprofile/',array('id'=>$id));
				}
			}
			else
			{
				$review->attributes = $_POST['Reviews'];
				$review->modify_date = new CDbExpression('NOW()');
				if($review->update())
				{
					foreach ($review->ratings as $rating)
					{
						$rating->rating = $_POST[$rating->ratingCategory->id];
						$rating->modify_date = new CDbExpression('NOW()');
						$rating->update();
					}
					$response['userUpdate']=2;
					$response['url'] = Yii::app()->createUrl('product/productprofile/',array('id'=>$id));
				}
			}
			echo json_encode($response);
		}
		else
		{
			$m=Yii::app()->getSecurityManager()->generateRandomString(6);
			$user = new Users;
			$user->attributes = $_POST['Users'];
			$user->password = base64_encode($m);
			$user->role_id = 3;
			$user->is_verified = 0;
			$user->add_date = new CDbExpression('NOW()');
			if($user->save())
			{
				goto x;
			}
		}
	}

	public static function getCountryNames()
	{
		return array("Afghanistan"=>"AFGHANISTAN","Albania"=>"ALBANIA","Algeria"=>"ALGERIA","American Samoa"=>"AMERICAN SAMOA","Andorra"=>"ANDORRA","Angola"=>"ANGOLA","Anguilla"=>"ANGUILLA","Antarctica"=>"ANTARCTICA","Antigua and Barbuda"=>"ANTIGUA AND BARBUDA","Argentina"=>"ARGENTINA","Armenia"=>"ARMENIA","Aruba"=>"ARUBA","Australia"=>"AUSTRALIA","Austria"=>"AUSTRIA","Azerbaijan"=>"AZERBAIJAN","Bahamas"=>"BAHAMAS","Bahrain"=>"BAHRAIN","Bangladesh"=>"BANGLADESH","Barbados"=>"BARBADOS","Belarus"=>"BELARUS","Belgium"=>"BELGIUM","Belize"=>"BELIZE","Benin"=>"BENIN","Bermuda"=>"BERMUDA","Bhutan"=>"BHUTAN","Bolivia"=>"BOLIVIA","Bosnia and Herzegovina"=>"BOSNIA AND HERZEGOVINA","Botswana"=>"BOTSWANA","Bouvet Island"=>"BOUVET ISLAND","Brazil"=>"BRAZIL","British Indian Ocean Territory"=>"BRITISH INDIAN OCEAN TERRITORY","Brunei Darussalam"=>"BRUNEI DARUSSALAM","Bulgaria"=>"BULGARIA","Burkina Faso"=>"BURKINA FASO","Burundi"=>"BURUNDI","Cambodia"=>"CAMBODIA","Cameroon"=>"CAMEROON","Canada"=>"CANADA","Cape Verde"=>"CAPE VERDE","Cayman Islands"=>"CAYMAN ISLANDS","Central African Republic"=>"CENTRAL AFRICAN REPUBLIC","Chad"=>"CHAD","Chile"=>"CHILE","China"=>"CHINA","Christmas Island"=>"CHRISTMAS ISLAND","Cocos (Keeling) Islands"=>"COCOS (KEELING) ISLANDS","Colombia"=>"COLOMBIA","Comoros"=>"COMOROS","Congo"=>"CONGO","Congo, the Democratic Republic of the"=>"CONGO, THE DEMOCRATIC REPUBLIC OF THE","Cook Islands"=>"COOK ISLANDS","Costa Rica"=>"COSTA RICA","Cote D'Ivoire"=>"COTE D'IVOIRE","Croatia"=>"CROATIA","Cuba"=>"CUBA","Cyprus"=>"CYPRUS","Czech Republic"=>"CZECH REPUBLIC","Denmark"=>"DENMARK","Djibouti"=>"DJIBOUTI","Dominica"=>"DOMINICA","Dominican Republic"=>"DOMINICAN REPUBLIC","Ecuador"=>"ECUADOR","Egypt"=>"EGYPT","El Salvador"=>"EL SALVADOR","Equatorial Guinea"=>"EQUATORIAL GUINEA","Eritrea"=>"ERITREA","Estonia"=>"ESTONIA","Ethiopia"=>"ETHIOPIA","Falkland Islands (Malvinas)"=>"FALKLAND ISLANDS (MALVINAS)","Faroe Islands"=>"FAROE ISLANDS","Fiji"=>"FIJI","Finland"=>"FINLAND","France"=>"FRANCE","French Guiana"=>"FRENCH GUIANA","French Polynesia"=>"FRENCH POLYNESIA","French Southern Territories"=>"FRENCH SOUTHERN TERRITORIES","Gabon"=>"GABON","Gambia"=>"GAMBIA","Georgia"=>"GEORGIA","Germany"=>"GERMANY","Ghana"=>"GHANA","Gibraltar"=>"GIBRALTAR","Greece"=>"GREECE","Greenland"=>"GREENLAND","Grenada"=>"GRENADA","Guadeloupe"=>"GUADELOUPE","Guam"=>"GUAM","Guatemala"=>"GUATEMALA","Guinea"=>"GUINEA","Guinea-Bissau"=>"GUINEA-BISSAU","Guyana"=>"GUYANA","Haiti"=>"HAITI","Heard Island and Mcdonald Islands"=>"HEARD ISLAND AND MCDONALD ISLANDS","Holy See (Vatican City State)"=>"HOLY SEE (VATICAN CITY STATE)","Honduras"=>"HONDURAS","Hong Kong"=>"HONG KONG","Hungary"=>"HUNGARY","Iceland"=>"ICELAND","India"=>"INDIA","Indonesia"=>"INDONESIA","Iran, Islamic Republic of"=>"IRAN, ISLAMIC REPUBLIC OF","Iraq"=>"IRAQ","Ireland"=>"IRELAND","Israel"=>"ISRAEL","Italy"=>"ITALY","Jamaica"=>"JAMAICA","Japan"=>"JAPAN","Jordan"=>"JORDAN","Kazakhstan"=>"KAZAKHSTAN","Kenya"=>"KENYA","Kiribati"=>"KIRIBATI","Korea, Democratic People's Republic of"=>"KOREA, DEMOCRATIC PEOPLE'S REPUBLIC OF","Korea, Republic of"=>"KOREA, REPUBLIC OF","Kuwait"=>"KUWAIT","Kyrgyzstan"=>"KYRGYZSTAN","Lao People's Democratic Republic"=>"LAO PEOPLE'S DEMOCRATIC REPUBLIC","Latvia"=>"LATVIA","Lebanon"=>"LEBANON","Lesotho"=>"LESOTHO","Liberia"=>"LIBERIA","Libyan Arab Jamahiriya"=>"LIBYAN ARAB JAMAHIRIYA","Liechtenstein"=>"LIECHTENSTEIN","Lithuania"=>"LITHUANIA","Luxembourg"=>"LUXEMBOURG","Macao"=>"MACAO","Macedonia, the Former Yugoslav Republic of"=>"MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF","Madagascar"=>"MADAGASCAR","Malawi"=>"MALAWI","Malaysia"=>"MALAYSIA","Maldives"=>"MALDIVES","Mali"=>"MALI","Malta"=>"MALTA","Marshall Islands"=>"MARSHALL ISLANDS","Martinique"=>"MARTINIQUE","Mauritania"=>"MAURITANIA","Mauritius"=>"MAURITIUS","Mayotte"=>"MAYOTTE","Mexico"=>"MEXICO","Micronesia, Federated States of"=>"MICRONESIA, FEDERATED STATES OF","Moldova, Republic of"=>"MOLDOVA, REPUBLIC OF","Monaco"=>"MONACO","Mongolia"=>"MONGOLIA","Montserrat"=>"MONTSERRAT","Morocco"=>"MOROCCO","Mozambique"=>"MOZAMBIQUE","Myanmar"=>"MYANMAR","Namibia"=>"NAMIBIA","Nauru"=>"NAURU","Nepal"=>"NEPAL","Netherlands"=>"NETHERLANDS","Netherlands Antilles"=>"NETHERLANDS ANTILLES","New Caledonia"=>"NEW CALEDONIA","New Zealand"=>"NEW ZEALAND","Nicaragua"=>"NICARAGUA","Niger"=>"NIGER","Nigeria"=>"NIGERIA","Niue"=>"NIUE","Norfolk Island"=>"NORFOLK ISLAND","Northern Mariana Islands"=>"NORTHERN MARIANA ISLANDS","Norway"=>"NORWAY","Oman"=>"OMAN","Pakistan"=>"PAKISTAN","Palau"=>"PALAU","Palestinian Territory, Occupied"=>"PALESTINIAN TERRITORY, OCCUPIED","Panama"=>"PANAMA","Papua New Guinea"=>"PAPUA NEW GUINEA","Paraguay"=>"PARAGUAY","Peru"=>"PERU","Philippines"=>"PHILIPPINES","Pitcairn"=>"PITCAIRN","Poland"=>"POLAND","Portugal"=>"PORTUGAL","Puerto Rico"=>"PUERTO RICO","Qatar"=>"QATAR","Reunion"=>"REUNION","Romania"=>"ROMANIA","Russian Federation"=>"RUSSIAN FEDERATION","Rwanda"=>"RWANDA","Saint Helena"=>"SAINT HELENA","Saint Kitts and Nevis"=>"SAINT KITTS AND NEVIS","Saint Lucia"=>"SAINT LUCIA","Saint Pierre and Miquelon"=>"SAINT PIERRE AND MIQUELON","Saint Vincent and the Grenadines"=>"SAINT VINCENT AND THE GRENADINES","Samoa"=>"SAMOA","San Marino"=>"SAN MARINO","Sao Tome and Principe"=>"SAO TOME AND PRINCIPE","Saudi Arabia"=>"SAUDI ARABIA","Senegal"=>"SENEGAL","Serbia and Montenegro"=>"SERBIA AND MONTENEGRO","Seychelles"=>"SEYCHELLES","Sierra Leone"=>"SIERRA LEONE","Singapore"=>"SINGAPORE","Slovakia"=>"SLOVAKIA","Slovenia"=>"SLOVENIA","Solomon Islands"=>"SOLOMON ISLANDS","Somalia"=>"SOMALIA","South Africa"=>"SOUTH AFRICA","South Georgia and the South Sandwich Islands"=>"SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS","Spain"=>"SPAIN","Sri Lanka"=>"SRI LANKA","Sudan"=>"SUDAN","Suriname"=>"SURINAME","Svalbard and Jan Mayen"=>"SVALBARD AND JAN MAYEN","Swaziland"=>"SWAZILAND","Sweden"=>"SWEDEN","Switzerland"=>"SWITZERLAND","Syrian Arab Republic"=>"SYRIAN ARAB REPUBLIC","Taiwan, Province of China"=>"TAIWAN, PROVINCE OF CHINA","Tajikistan"=>"TAJIKISTAN","Tanzania, United Republic of"=>"TANZANIA, UNITED REPUBLIC OF","Thailand"=>"THAILAND","Timor-Leste"=>"TIMOR-LESTE","Togo"=>"TOGO","Tokelau"=>"TOKELAU","Tonga"=>"TONGA","Trinidad and Tobago"=>"TRINIDAD AND TOBAGO","Tunisia"=>"TUNISIA","Turkey"=>"TURKEY","Turkmenistan"=>"TURKMENISTAN","Turks and Caicos Islands"=>"TURKS AND CAICOS ISLANDS","Tuvalu"=>"TUVALU","Uganda"=>"UGANDA","Ukraine"=>"UKRAINE","United Arab Emirates"=>"UNITED ARAB EMIRATES","United Kingdom"=>"UNITED KINGDOM","United States"=>"UNITED STATES","United States Minor Outlying Islands"=>"UNITED STATES MINOR OUTLYING ISLANDS","Uruguay"=>"URUGUAY","Uzbekistan"=>"UZBEKISTAN","Vanuatu"=>"VANUATU","Venezuela"=>"VENEZUELA","Viet Nam"=>"VIET NAM","Virgin Islands, British"=>"VIRGIN ISLANDS, BRITISH","Virgin Islands, U.s."=>"VIRGIN ISLANDS, U.S.","Wallis and Futuna"=>"WALLIS AND FUTUNA","Western Sahara"=>"WESTERN SAHARA","Yemen"=>"YEMEN","Zambia"=>"ZAMBIA","Zimbabwe"=>"ZIMBABWE");
	}

}//End Controller

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
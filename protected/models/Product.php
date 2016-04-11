<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $description
 * @property string $logo
 * @property integer $customer_count
 * @property integer $has_free_version
 * @property integer $has_trial
 * @property integer $under_ppc
 * @property double $bidding_amount
 * @property integer $visit_count
 * @property string $starting_price
 * @property string $pricing_details
 * @property string $product_website
 * @property string $company_name
 * @property integer $founding_year
 * @property string $founding_country
 * @property string $company_website
 * @property string $facebook_link
 * @property string $twitter_link
 * @property string $linkedin_link
 * @property string $googleplus_link
 * @property string $youtube_link
 * @property string $admin_notes
 * @property integer $status
 * @property string $add_date
 * @property string $modify_date
 *
 * The followings are the available model relations:
 * @property Invoice[] $invoices
 * @property Users $user
 * @property Categories[] $categories
 * @property DeploymentFeatures[] $deploymentFeatures
 * @property Features[] $features
 * @property ProductHasMediaLinks[] $productHasMediaLinks
 * @property SupportFeatures[] $supportFeatures
 * @property TrainingFeatures[] $trainingFeatures
 * @property Users[] $users
 * @property TrackingUser[] $trackingUsers
 */
class Product extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, name, customer_count, visit_count, product_website, company_name, company_website, add_date', 'required'),
			array('user_id, customer_count, has_free_version, has_trial, under_ppc, visit_count, founding_year, status', 'numerical', 'integerOnly'=>true),
			array('bidding_amount', 'numerical'),
			array('name, starting_price, product_website, company_name, founding_country, company_website, facebook_link, twitter_link, linkedin_link, googleplus_link, youtube_link', 'length', 'max'=>100),
			array('logo', 'length', 'max'=>255),
			array('description, pricing_details, admin_notes, modify_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, name, description, logo, customer_count, has_free_version, has_trial, under_ppc, bidding_amount, visit_count, starting_price, pricing_details, product_website, company_name, founding_year, founding_country, company_website, facebook_link, twitter_link, linkedin_link, googleplus_link, youtube_link, admin_notes, status, add_date, modify_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'invoices' => array(self::HAS_MANY, 'Invoice', 'product_id'),
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
			'categories' => array(self::MANY_MANY, 'Categories', 'product_has_categories(product_id, category_id)'),
			'deploymentFeatures' => array(self::MANY_MANY, 'DeploymentFeatures', 'product_has_deployment_features(product_id, deployment_feature_id)'),
			'features' => array(self::MANY_MANY, 'Features', 'product_has_features(product_id, feature_id)'),
			'productHasMediaLinks' => array(self::HAS_MANY, 'ProductHasMediaLinks', 'product_id'),
			'supportFeatures' => array(self::MANY_MANY, 'SupportFeatures', 'product_has_support_features(product_id, support_feature_id)'),
			'trainingFeatures' => array(self::MANY_MANY, 'TrainingFeatures', 'product_has_training_features(product_id, training_feature_id)'),
			'users' => array(self::MANY_MANY, 'Users', 'reviews(product_id, user_id)'),
			'trackingUsers' => array(self::HAS_MANY, 'TrackingUser', 'product_id'),
			'reviews' => array(self::HAS_MANY, 'Reviews', 'product_id'),
			'_categories' => array(self::HAS_MANY, 'ProductHasCategories', 'product_id'),
			'_features' => array(self::HAS_MANY, 'ProductHasFeatures', 'product_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'name' => 'Name',
			'description' => 'Description',
			'logo' => 'Logo',
			'customer_count' => 'Customer Count',
			'has_free_version' => 'Has Free Version',
			'has_trial' => 'Has Trial',
			'under_ppc' => 'Under Ppc',
			'bidding_amount' => 'Bidding Amount',
			'visit_count' => 'Visit Count',
			'starting_price' => 'Starting Price',
			'pricing_details' => 'Pricing Details',
			'product_website' => 'Product Website',
			'company_name' => 'Company Name',
			'founding_year' => 'Founding Year',
			'founding_country' => 'Founding Country',
			'company_website' => 'Company Website',
			'facebook_link' => 'Facebook Link',
			'twitter_link' => 'Twitter Link',
			'linkedin_link' => 'Linkedin Link',
			'googleplus_link' => 'Googleplus Link',
			'youtube_link' => 'Youtube Link',
			'admin_notes' => 'Admin Notes',
			'status' => 'Status',
			'add_date' => 'Add Date',
			'modify_date' => 'Modify Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('customer_count',$this->customer_count);
		$criteria->compare('has_free_version',$this->has_free_version);
		$criteria->compare('has_trial',$this->has_trial);
		$criteria->compare('under_ppc',$this->under_ppc);
		$criteria->compare('bidding_amount',$this->bidding_amount);
		$criteria->compare('visit_count',$this->visit_count);
		$criteria->compare('starting_price',$this->starting_price,true);
		$criteria->compare('pricing_details',$this->pricing_details,true);
		$criteria->compare('product_website',$this->product_website,true);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('founding_year',$this->founding_year);
		$criteria->compare('founding_country',$this->founding_country,true);
		$criteria->compare('company_website',$this->company_website,true);
		$criteria->compare('facebook_link',$this->facebook_link,true);
		$criteria->compare('twitter_link',$this->twitter_link,true);
		$criteria->compare('linkedin_link',$this->linkedin_link,true);
		$criteria->compare('googleplus_link',$this->googleplus_link,true);
		$criteria->compare('youtube_link',$this->youtube_link,true);
		$criteria->compare('admin_notes',$this->admin_notes,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('modify_date',$this->modify_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Product the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

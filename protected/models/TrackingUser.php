<?php

/**
 * This is the model class for table "tracking_user".
 *
 * The followings are the available columns in table 'tracking_user':
 * @property integer $id
 * @property integer $product_id
 * @property string $user_ip
 * @property string $cookie
 * @property string $entry_time
 * @property string $action_time
 * @property integer $status_geo
 * @property string $country
 * @property string $country_code
 * @property string $region
 * @property string $region_name
 * @property string $city
 * @property string $zip
 * @property double $latitude
 * @property double $longitude
 * @property string $timezone
 * @property string $isp
 * @property string $org
 */
class TrackingUser extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tracking_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, user_ip, cookie, entry_time, action_time', 'required'),
			array('product_id, status_geo', 'numerical', 'integerOnly'=>true),
			array('latitude, longitude', 'numerical'),
			array('user_ip, cookie, country, country_code, region, region_name, city, zip, timezone, isp, org', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, product_id, user_ip, cookie, entry_time, action_time, status_geo, country, country_code, region, region_name, city, zip, latitude, longitude, timezone, isp, org', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'product_id' => 'Product',
			'user_ip' => 'User Ip',
			'cookie' => 'Cookie',
			'entry_time' => 'Entry Time',
			'action_time' => 'Action Time',
			'status_geo' => 'Status Geo',
			'country' => 'Country',
			'country_code' => 'Country Code',
			'region' => 'Region',
			'region_name' => 'Region Name',
			'city' => 'City',
			'zip' => 'Zip',
			'latitude' => 'Latitude',
			'longitude' => 'Longitude',
			'timezone' => 'Timezone',
			'isp' => 'Isp',
			'org' => 'Org',
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
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('user_ip',$this->user_ip,true);
		$criteria->compare('cookie',$this->cookie,true);
		$criteria->compare('entry_time',$this->entry_time,true);
		$criteria->compare('action_time',$this->action_time,true);
		$criteria->compare('status_geo',$this->status_geo);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('country_code',$this->country_code,true);
		$criteria->compare('region',$this->region,true);
		$criteria->compare('region_name',$this->region_name,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('zip',$this->zip,true);
		$criteria->compare('latitude',$this->latitude);
		$criteria->compare('longitude',$this->longitude);
		$criteria->compare('timezone',$this->timezone,true);
		$criteria->compare('isp',$this->isp,true);
		$criteria->compare('org',$this->org,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TrackingUser the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

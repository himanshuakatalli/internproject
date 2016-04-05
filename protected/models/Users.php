<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $password
 * @property string $hash
 * @property string $phone_number
 * @property integer $is_verified
 * @property integer $role_id
 * @property string $image
 * @property string $admin_notes
 * @property integer $status
 * @property string $add_date
 * @property string $modify_date
 *
 * The followings are the available model relations:
 * @property Roles $role
 */
class Users extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, username, password, role_id', 'required'),
			array('is_verified, role_id, status', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name', 'length', 'max'=>50),
			array('username, password', 'length', 'max'=>100),
			array('hash', 'length', 'max'=>200),
			array('phone_number', 'length', 'max'=>25),
			array('image', 'length', 'max'=>255),
			array('admin_notes, add_date, modify_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, first_name, last_name, username, password, hash, phone_number, is_verified, role_id, image, admin_notes, status, add_date, modify_date', 'safe', 'on'=>'search'),
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
			'role' => array(self::BELONGS_TO, 'Roles', 'role_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'username' => 'Username',
			'password' => 'Password',
			'job_profile' => 'Job Profile',
			'hash' => 'Hash',
			'phone_number' => 'Phone Number',
			'is_verified' => 'Is Verified',
			'role_id' => 'Role',
			'image' => 'Image',
			'admin_notes' => 'Admin Notes',
			'status' => 'Status',
			'add_date' => 'Add Date',
			'modify_date' => 'Modify Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('hash',$this->hash,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('is_verified',$this->is_verified);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('admin_notes',$this->admin_notes,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('modify_date',$this->modify_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
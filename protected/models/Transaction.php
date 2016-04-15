<?php

/**
 * This is the model class for table "transaction".
 *
 * The followings are the available columns in table 'transaction':
 * @property integer $id
 * @property integer $user_id
 * @property string $customer_id
 * @property string $amount
 * @property string $description
 * @property integer $failure_code
 * @property string $add_date
 * @property string $transaction_id
 *
 * The followings are the available model relations:
 * @property Users $user
 */
class Transaction extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'transaction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, customer_id, amount, transaction_id', 'required'),
			array('user_id, failure_code', 'numerical', 'integerOnly'=>true),
			array('customer_id', 'length', 'max'=>225),
			array('amount, transaction_id', 'length', 'max'=>255),
			array('description', 'length', 'max'=>250),
			array('add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, customer_id, amount, description, failure_code, add_date, transaction_id', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
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
			'customer_id' => 'Customer',
			'amount' => 'Amount',
			'description' => 'Description',
			'failure_code' => 'Failure Code',
			'add_date' => 'Add Date',
			'transaction_id' => 'Transaction',
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
		$criteria->compare('customer_id',$this->customer_id,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('failure_code',$this->failure_code);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('transaction_id',$this->transaction_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Transaction the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

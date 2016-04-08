<?php

/**
 * This is the model class for table "transaction".
 *
 * The followings are the available columns in table 'transaction':
 * @property integer $id
 * @property integer $invoice_id
 * @property string $stripe_transaction_id
 * @property integer $transaction_status
 * @property integer $month
 * @property integer $year
 * @property string $admin_notes
 * @property integer $status
 * @property string $add_date
 * @property string $modify_date
 * @property string $failure_code
 * @property string $failure_message
 * @property string $msg_description
 *
 * The followings are the available model relations:
 * @property Invoice $invoice
 */
class Transaction extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Transaction the static model class
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
			array('invoice_id, add_date, msg_description', 'required'),
			array('invoice_id, transaction_status, month, year, status', 'numerical', 'integerOnly'=>true),
			array('stripe_transaction_id, failure_code, failure_message, msg_description', 'length', 'max'=>255),
			array('admin_notes, modify_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, invoice_id, stripe_transaction_id, transaction_status, month, year, admin_notes, status, add_date, modify_date, failure_code, failure_message, msg_description', 'safe', 'on'=>'search'),
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
			'invoice' => array(self::BELONGS_TO, 'Invoice', 'invoice_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'invoice_id' => 'Invoice',
			'stripe_transaction_id' => 'Stripe Transaction',
			'transaction_status' => 'Transaction Status',
			'month' => 'Month',
			'year' => 'Year',
			'admin_notes' => 'Admin Notes',
			'status' => 'Status',
			'add_date' => 'Add Date',
			'modify_date' => 'Modify Date',
			'failure_code' => 'Failure Code',
			'failure_message' => 'Failure Message',
			'msg_description' => 'Msg Description',
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
		$criteria->compare('invoice_id',$this->invoice_id);
		$criteria->compare('stripe_transaction_id',$this->stripe_transaction_id,true);
		$criteria->compare('transaction_status',$this->transaction_status);
		$criteria->compare('month',$this->month);
		$criteria->compare('year',$this->year);
		$criteria->compare('admin_notes',$this->admin_notes,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('modify_date',$this->modify_date,true);
		$criteria->compare('failure_code',$this->failure_code,true);
		$criteria->compare('failure_message',$this->failure_message,true);
		$criteria->compare('msg_description',$this->msg_description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
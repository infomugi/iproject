<?php

/**
 * This is the model class for table "bank".
 *
 * The followings are the available columns in table 'bank':
 * @property integer $id_payment_bank
 * @property string $bank_name
 * @property string $bank_branch
 * @property string $account_holder
 * @property string $account_number
 * @property string $account_name
 */
class Bank extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bank';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bank_name, bank_branch, account_holder, account_number, account_name', 'required'),
			array('bank_name, bank_branch, account_holder, account_number, account_name', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_payment_bank, bank_name, bank_branch, account_holder, account_number, account_name', 'safe', 'on'=>'search'),
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
			'id_payment_bank' => 'Id Payment Bank',
			'bank_name' => 'Bank Name',
			'bank_branch' => 'Bank Branch',
			'account_holder' => 'Account Holder',
			'account_number' => 'Account Number',
			'account_name' => 'Account Name',
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

		$criteria->compare('id_payment_bank',$this->id_payment_bank);
		$criteria->compare('bank_name',$this->bank_name,true);
		$criteria->compare('bank_branch',$this->bank_branch,true);
		$criteria->compare('account_holder',$this->account_holder,true);
		$criteria->compare('account_number',$this->account_number,true);
		$criteria->compare('account_name',$this->account_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Bank the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

<?php

/**
 * This is the model class for table "settings".
 *
 * The followings are the available columns in table 'settings':
 * @property integer $id_settings
 * @property string $system_name
 * @property string $system_title
 * @property string $address
 * @property string $phone
 * @property string $paypal_email
 * @property string $currency
 * @property string $system_email
 * @property integer $theme
 * @property string $logo
 * @property string $favicon
 * @property string $language
 * @property string $invoice
 */
class Settings extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Settings the static model class
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
		return 'settings';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('system_name, system_title, address, phone, paypal_email, currency, system_email, language', 'required','on'=>'general'),

			array('system_name, system_title, paypal_email, system_email, theme', 'length', 'max'=>50),
			array('phone, currency, language', 'length', 'max'=>25),
			array('logo, favicon', 'length', 'max'=>100),
			array('invoice', 'length', 'max'=>255),

			array('invoice', 'required', 'on'=>'invoice'),
			array('logo', 'required', 'on'=>'logo'),
			array('favicon', 'required', 'on'=>'favicon'),
			array('theme', 'required', 'on'=>'theme'),

			array('invoice', 'file', 'types'=>'jpg, gif, png','allowEmpty'=> false,'safe'=>true, 'on'=>'invoice'),
			array('logo', 'file', 'types'=>'jpg, gif, png','allowEmpty'=> false,'safe'=>true, 'on'=>'logo'),
			array('favicon', 'file', 'types'=>'jpg, gif, png','allowEmpty'=> false,'safe'=>true, 'on'=>'favicon'),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_settings, system_name, system_title, address, phone, paypal_email, currency, system_email, theme, logo, favicon, language', 'safe', 'on'=>'search'),
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
			'id_settings' => 'Id Settings',
			'system_name' => 'System Name',
			'system_title' => 'System Title',
			'address' => 'Address',
			'phone' => 'Phone',
			'paypal_email' => 'Paypal Email',
			'currency' => 'Currency',
			'system_email' => 'System Email',
			'theme' => 'Theme',
			'logo' => 'Logo',
			'favicon' => 'Favicon',
			'language' => 'Language',
			'invoice' => 'Invoice',
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

		$criteria->compare('id_settings',$this->id_settings);
		$criteria->compare('system_name',$this->system_name,true);
		$criteria->compare('system_title',$this->system_title,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('paypal_email',$this->paypal_email,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('system_email',$this->system_email,true);
		$criteria->compare('theme',$this->theme);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('favicon',$this->favicon,true);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('invoice',$this->invoice,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}
}
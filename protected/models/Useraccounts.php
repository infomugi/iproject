<?php

/**
 * This is the model class for table "useraccounts".
 *
 * The followings are the available columns in table 'useraccounts':
 * @property integer $id_user
 * @property string $fullname
 * @property string $gender
 * @property string $birth
 * @property string $email
 * @property string $username
 * @property string $password
 * @property integer $level
 * @property string $create_time
 * @property string $update_time
 * @property string $visit_time 
 * @property string $ipaddress
 * @property string $image
 * @property integer $division 
 */
class Useraccounts extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Useraccounts the static model class
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
		return 'useraccounts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fullname, gender, birth, email, username, password, division', 'required','on'=>'create'),
			array('fullname, gender, birth, email, username, password, division', 'required','on'=>'update'),
			array('level', 'required','on'=>'assignment'),
			array('image', 'required','on'=>'avatar'),
			array('create_time, update_time, visit_time', 'safe'),
			array('username, email', 'unique'),
			array('email', 'email'),
			array('gender, status, division', 'length', 'max'=>2),
			array('level', 'numerical', 'integerOnly'=>true),
			array('fullname, email, username, password, image, ipaddress', 'length', 'max'=>255),
			array('image', 'file', 'types'=>'jpg, gif, png','allowEmpty'=> true,'safe'=>true, 'on'=>'avatar'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fullname, gender, birth, email, username, password, level, create_time, update_time, image, status', 'safe', 'on'=>'search'),
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
			'Division'=>array(self::BELONGS_TO,'division','division')
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_user' => 'ID User',
			'fullname' => 'Full Name',
			'gender' => 'Gender',
			'birth' => 'Birth',
			'email' => 'Email',
			'username' => 'Username',
			'password' => 'Password',
			'level' => 'Level',
			'create_time' => 'Join Date',
			'update_time' => 'Update Date',
			'visit_time' => 'Last Visit',
			'ipaddress' => 'IP Address',
			'image' => 'Avatar',
			'status' => 'Status',
			'division' => 'Division',
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

		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('fullname',$this->fullname,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('birth',$this->birth,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('level',$this->level);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('visit_time',$this->visit_time,true);
		$criteria->compare('ipaddress',$this->ipaddress,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('division',$this->division,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	protected function beforeSave()
	{
		$this->birth = date('Y-m-d', strtotime($this->birth));
		$this->create_time = date('Y-m-d', strtotime($this->create_time));
		$this->update_time = date('Y-m-d', strtotime($this->update_time));
		$this->visit_time = date('Y-m-d', strtotime($this->visit_time));
		return TRUE;
	}
	
	protected function afterFind()
	{
		$this->birth = date('d-m-Y', strtotime($this->birth));
		$this->create_time = date('d-m-Y', strtotime($this->create_time));
		$this->update_time = date('d-m-Y', strtotime($this->update_time));
		$this->visit_time = date('d-m-Y / h:m:s', strtotime($this->visit_time));
		return TRUE;
	}

	public static function getSumUserAccounts()
	{
		$sql = "SELECT COUNT(id_user) as totalAccounts FROM useraccounts";
		$command = Yii::app()->db->createCommand($sql);
		return $command->queryAll();
	}      

	public static function getNameAccounts()
	{
		$sql = "SELECT fullname as NameAccounts FROM useraccounts ORDER BY id_user DESC LIMIT 1";
		$command = Yii::app()->db->createCommand($sql);
		return $command->queryAll();
	} 

	public function level($a)
	{
		if($a==0)
			return "Unverified";
		else if($a==1)
			return "Super Admin";
		else if($a==2)
			return "Admin";
		else if($a==3)
			return "PIC";
		else if($a==4)
			return "Developer";		
		else 
			return "Unknow";
	}

	public function status($data){
		if($data==1){
			return "Enable";
		}else{
			return "Disable";
		}
	}	    		
}
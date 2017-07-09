<?php

/**
 * This is the model class for table "project".
 *
 * The followings are the available columns in table 'project':
 * @property integer $id_project
 * @property string $title
 * @property string $current_status
 * @property string $description
 * @property string $start_date
 * @property string $deadline
 * @property integer $id_user
 * @property integer $id_payment_type
 * @property integer $status
 * @property double $amount
 * @property integer $id_customer
 * @property integer $month
 * @property integer $id_category 
 * The followings are the available model relations:
 * @property projectdetail[] $projectdetail
 * @property payment_term[] $payment_term
*/
class Project extends CActiveRecord
{
	public $PIC;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Project the static model class
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
		return 'project';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, current_status, description, start_date, deadline, id_user, status, amount, id_customer, id_payment_type, id_category', 'required'),
			array('id_user, id_payment_type, status, id_customer, month', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			array('title','unique'),
			array('title', 'length', 'max'=>100),
			array('current_status, month', 'length', 'max'=>50),
			array('month','required','on'=>'editmonth'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_project, title, current_status, description, start_date, deadline, id_user, id_payment_type, status, amount, id_customer', 'safe', 'on'=>'search'),
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
			'Projectdetail' => array(self::HAS_MANY, 'projectdetail', 'id_project'),
			'Useraccounts' => array(self::BELONGS_TO, 'useraccounts', 'id_user'),
			'Customer' => array(self::BELONGS_TO, 'customer', 'id_customer'),
			'Term' => array(self::BELONGS_TO, 'term', 'id_payment_type'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_project' => 'Id Project',
			'title' => 'Title',
			'current_status' => 'Current Status',
			'description' => 'Description',
			'start_date' => 'Start Date',
			'deadline' => 'Deadline',
			'id_user' => 'PIC',
			'id_payment_type' => 'Payment Method',
			'status' => 'Status',
			'amount' => 'Amount',
			'id_customer' => 'Customers',
			'month' => 'Month',
			'id_category' => 'Type',
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

		$criteria->compare('id_project',$this->id_project);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('current_status',$this->current_status,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('deadline',$this->deadline,true);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('id_payment_type',$this->id_payment_type);
		$criteria->compare('status',$this->status);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('id_customer',$this->id_customer);
		$criteria->compare('month',$this->month);
		$criteria->compare('id_category',$this->id_category);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	protected function beforeSave()
	{
		$this->start_date = date('Y-m-d', strtotime($this->start_date));
		$this->deadline = date('Y-m-d', strtotime($this->deadline));
		return TRUE;
	}
	
	protected function afterFind()
	{
		$this->start_date = date('d-m-Y', strtotime($this->start_date));
		$this->deadline = date('d-m-Y', strtotime($this->deadline));
		return TRUE;
	}

	
	public function countProject()
 		{
 		 return Projectdetail::model()->count('id_project=:id_project',array(':id_project'=>$this->id_project));   
 		}

 	public function countstatus()
 		{
 		 return Projectdetail::model()->count('id_project=:id_project',array(':id_project'=>$this->id_project));   
 		}

	public static function getSumProject()
    {
        $sql = "SELECT COUNT(id_project) as totalProjects FROM project";
        $command = Yii::app()->db->createCommand($sql);
 
        return $command->queryAll();
    } 

	public static function getSumInvoice()
    {
        $sql = "SELECT COUNT(id_invoice) as totalInvoices FROM invoice";
        $command = Yii::app()->db->createCommand($sql);
 
        return $command->queryAll();
    }  

	public static function getSumCustomers()
    {
        $sql = "SELECT COUNT(id_customer) as totalCustomers FROM customer";
        $command = Yii::app()->db->createCommand($sql);
 
        return $command->queryAll();
    }         

	public static function getTitleProject()
    {
        $sql = "SELECT title as titleProject FROM project ORDER BY id_project DESC LIMIT 1";
        $command = Yii::app()->db->createCommand($sql);
 
        return $command->queryAll();
    } 	  


	public static function getTitleInvoice()
    {
        $sql = "SELECT invoice_number as code FROM invoice ORDER BY id_invoice DESC LIMIT 1";
        $command = Yii::app()->db->createCommand($sql);
 
        return $command->queryAll();
    } 	 


	public static function getTitleCustomers()
    {
        $sql = "SELECT name as name FROM customer ORDER BY id_customer DESC LIMIT 1";
        $command = Yii::app()->db->createCommand($sql);
 
        return $command->queryAll();
    } 	          		

	public function fetchTotal($records)
	{
        $amount=0;
        foreach($records as $record)
                $amount+=$record->amount;
        return $amount;
	} 

	public function status($task)
	{
		if($task==0)
			return "Start";
		else if($task==1)
			return "Done";
		else 
			return "None";
	}

	public function color($label)
	{
		if($label==0)
			return "warning";
		else if($label==1)
			return "success";
		else if($label==2)
			return "info";		
		else 
			return "danger";
	}		

	public function rupiah($amount){
		return Yii::app()->numberFormatter->format("Rp ###,###,###",$amount);
	}


}
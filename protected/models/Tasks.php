<?php

/**
 * This is the model class for table "tasks".
 *
 * The followings are the available columns in table 'tasks':
 * @property integer $id_task
 * @property integer $task
 * @property string $name
 * @property string $description
 * @property string $result
 * @property string $file
 * @property integer $status
 * @property string $start_date
 * @property string $end_date
 * @property integer $id_projectdetail
 * @property integer $id_project
 */
class Tasks extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tasks the static model class
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
		return 'tasks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description, file, status, start_date', 'required','on'=>'create'),
			array('result, end_date', 'required','on'=>'update'),
			array('status', 'required','on'=>'start'),
			array('status', 'required','on'=>'finish'),
			array('status, id_projectdetail, id_project', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			array('file, task', 'length', 'max'=>255),
			array('end_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_task, task, name, description, result, file, status, start_date, end_date, id_projectdetail, id_project', 'safe', 'on'=>'search'),
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
			'Project'=>array(self::BELONGS_TO, 'project', 'id_project'),
			'Projectdetail'=>array(self::BELONGS_TO, 'projectdetail','id_projectdetail'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_task' => 'Id Task',
			'task' => 'Task Info',
			'name' => 'Member Name',
			'description' => 'Description',
			'result' => 'Result',
			'file' => 'File',
			'status' => 'Status',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'id_projectdetail' => 'Id Projectdetail',
			'id_project' => 'Id Project',
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

		$criteria->compare('id_task',$this->id_task);
		$criteria->compare('task',$this->task);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('result',$this->result,true);
		$criteria->compare('file',$this->file,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('id_projectdetail',$this->id_projectdetail);
		$criteria->compare('id_project',$this->id_project);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}	

	protected function beforeSave()
	{
		$this->start_date = date('Y-m-d', strtotime($this->start_date));
		$this->end_date = date('Y-m-d', strtotime($this->end_date));
		return TRUE;
	}
	
	protected function afterFind()
	{
		$this->start_date = date('d-m-Y', strtotime($this->start_date));
		$this->end_date = date('d-m-Y', strtotime($this->end_date));
		return TRUE;
	}	

	public function status($a)
	{
		if($a==0)
			return "Start";
		else if($a==1)
			return "On Progress";
		else if($a==2)
			return "Pending";
		else if($a==3)
			return "Finish";		
		else 
			return "Tidak Terdaftar";
	}

	public static function getSumTaskFinish()
	{
		$sql = "SELECT count(id_task) as totalTasks FROM Tasks where status='1'";
		$command = Yii::app()->db->createCommand($sql);

		return $command->queryAll();
	}       

	public static function getSumTaskOnProgress()
	{
		$sql = "SELECT count(id_task) as totalTasks FROM Tasks where status='0'";
		$command = Yii::app()->db->createCommand($sql);

		return $command->queryAll();
	}   

	public static function getSumTaskAll()
	{
		$sql = "SELECT count(id_task) as totalTasks FROM Tasks";
		$command = Yii::app()->db->createCommand($sql);

		return $command->queryAll();
	}      	    	
    			
}
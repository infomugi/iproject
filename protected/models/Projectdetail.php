<?php

/**
 * This is the model class for table "projectdetail".
 *
 * The followings are the available columns in table 'projectdetail':
 * @property integer $id_projectdetail
 * @property string $member
 * @property string $job
 * @property integer $status
 * @property integer $id_project
 *
 * The followings are the available model relations:
 * @property project $project
 */
class Projectdetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Projectdetail the static model class
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
		return 'projectdetail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
		return array(
			array('member, job', 'required'),
			array('status, id_project', 'numerical', 'integerOnly'=>true),
			array('member', 'length', 'max'=>50),
			array('job', 'length', 'max'=>100),
			array('status_update, job_date', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
			array('id_projectdetail, member, job, status, id_project, status_update, job_date', 'safe', 'on'=>'search'),
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
			'Project' => array(self::BELONGS_TO, 'Project', 'id_project'),
			);
	}

	public function checkArray($attribute)
	{
		if(!empty($this->$attribute) && !is_array($this->$attribute))
			$this->addError($this->$attribute,'Must be an array');
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_projectdetail' => 'Id Projectdetail',
			'member' => 'Member',
			'job' => 'Job',
			'status' => 'Status',
			'id_project' => 'Id Project',
			'job_date'=>'Start Date',
			'status_update' => 'End Date',
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

		$criteria->compare('id_projectdetail',$this->id_projectdetail);
		$criteria->compare('member',$this->member,true);
		$criteria->compare('job',$this->job,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('id_project',$this->id_project);
		$criteria->compare('status_update',$this->status_update,true);
		$criteria->compare('job_date',$this->job_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}


	public function getProjectdetail($ProjectId)
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id_projectdetail',$this->id_projectdetail);
		$criteria->compare('member',$this->member,true);
		$criteria->compare('job',$this->job,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('id_project',$ProjectId);
		$criteria->compare('status_update',$this->status_update);
		$criteria->compare('job_date',$this->job_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}
	

	protected function beforeSave()
	{
		$this->status_update = date('Y-m-d', strtotime($this->status_update));
		$this->job_date = date('Y-m-d', strtotime($this->job_date));
		return TRUE;
	}
	
	protected function afterFind()
	{

		$this->status_update = date('d-m-Y', strtotime($this->status_update));
		$this->job_date = date('d-m-Y', strtotime($this->job_date));
		return TRUE;
	}

	public static function getSumDetailProjectFinish()
	{
		$sql = "SELECT count(id_projectdetail) as totalDetail FROM projectdetail where status='1'";
		$command = Yii::app()->db->createCommand($sql);

		return $command->queryAll();
	}       

	public static function getSumDetailProjectOnProgress()
	{
		$sql = "SELECT count(id_projectdetail) as totalDetail FROM projectdetail where status='0'";
		$command = Yii::app()->db->createCommand($sql);

		return $command->queryAll();
	}   

	public static function getSumDetailProjectAll()
	{
		$sql = "SELECT count(id_projectdetail) as totalDetail FROM projectdetail";
		$command = Yii::app()->db->createCommand($sql);

		return $command->queryAll();
	}      	    	

}
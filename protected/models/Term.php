<?php

/**
 * This is the model class for table "term".
 *
 * The followings are the available columns in table 'term':
 * @property integer $id_payment_type
 * @property string $created_date
 * @property string $term_date
 * @property integer $percent
 * @property integer $status
 * @property integer $id_project
 * @property integer $id_invoice
 */
class Term extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'term';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('percent, id_project, term_date', 'required'),
			array('term_date, created_date', 'length', 'max'=>25),
			array('percent, status, id_project, id_invoice', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_payment_type, percent, status, id_project, id_invoice', 'safe', 'on'=>'search'),
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
			'Project' => array(self::HAS_MANY, 'project', 'id_payment_type'),
			'Project' => array(self::BELONGS_TO, 'project', 'id_project'),
			'Invoice' => array(self::BELONGS_TO, 'invoice', 'id_invoice'),			
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_payment_type' => 'Id Payment Type',
			'percent' => 'Percent',
			'status' => 'Status',
			'id_project' => 'Id Project',
			'id_invoice' => 'Id Invoice',
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

		$criteria->compare('id_payment_type',$this->id_payment_type);
		$criteria->compare('percent',$this->percent);
		$criteria->compare('status',$this->status);
		$criteria->compare('id_project',$this->id_project);
		$criteria->compare('id_invoice',$this->id_invoice);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Term the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getPaymentTerm($ProjectId)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_payment_type',$this->id_payment_type);
		$criteria->compare('percent',$this->percent);
		$criteria->compare('status',$this->status);
		$criteria->compare('id_project',$ProjectId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}	

	protected function beforeSave()
	{
		$this->term_date = date('Y-m-d', strtotime($this->term_date));
		return TRUE;
	}
	
	protected function afterFind()
	{
		$this->term_date = date('d-m-Y', strtotime($this->term_date));
		return TRUE;
	}

}

<?php

/**
 * This is the model class for table "orders".
 *
 * The followings are the available columns in table 'orders':
 * @property integer $id_order
 * @property string $created_date
 * @property string $registration_date
 * @property string $expired_date
 * @property integer $order_id
 * @property integer $product_id
 * @property integer $customer_id
 * @property string $description
 * @property integer $payment_cycle
 * @property integer $status
 */
class Orders extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'orders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_date, registration_date, expired_date, order_id, product_id, customer_id, description, payment_cycle, status', 'required'),
			array('product_id, customer_id, payment_cycle, status', 'numerical', 'integerOnly'=>true),
			array('order_id', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_order, created_date, registration_date, expired_date, order_id, product_id, customer_id, description, payment_cycle, status', 'safe', 'on'=>'search'),
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
			'Product'=>array(self::BELONGS_TO,'Product','product_id'),
			'Customer'=>array(self::BELONGS_TO,'Customer','customer_id'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_order' => 'Id Order',
			'created_date' => 'Created Date',
			'registration_date' => 'Registration Date',
			'expired_date' => 'Expired Date',
			'order_id' => 'Order',
			'product_id' => 'Product',
			'customer_id' => 'Customer',
			'description' => 'Description',
			'payment_cycle' => 'Payment Cycle',
			'status' => 'Status',
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

		$criteria->compare('id_order',$this->id_order);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('registration_date',$this->registration_date,true);
		$criteria->compare('expired_date',$this->expired_date,true);
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('payment_cycle',$this->payment_cycle);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Orders the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function generateOrderID(){
		$_d = date("Y");
		$_i = "ORD-";
		$_left = $_i . $_d;
		$_first = "000";
		$_len = strlen($_left);
		$no = $_left . $_first; 
		
		$last_po = $this->find( 
			array(
				"select"=>"order_id",
				"condition" => "left(order_id, " . $_len . ") = :_left",
				"params" => array(":_left" => $_left),
				"order" => "id_order DESC"
				));
		
		if($last_po != null){
			$_no = substr($last_po->order_id, $_len);
			$_no++;
			$_no = substr("000", strlen($_no)) . $_no;
			$no = $_left . $_no;
		}
		
		return $no;
	}	

	protected function beforeSave()
	{
		$this->created_date = date('Y-m-d', strtotime($this->created_date));
		$this->registration_date = date('Y-m-d', strtotime($this->registration_date));
		$this->expired_date = date('Y-m-d', strtotime($this->expired_date));
		return TRUE;
	}
	
	protected function afterFind()
	{
		$this->created_date = date('d-m-Y', strtotime($this->created_date));
		$this->registration_date = date('d-m-Y', strtotime($this->registration_date));
		$this->expired_date = date('d-m-Y', strtotime($this->expired_date));
		return TRUE;
	}

	public function cycle($data){
		if($data==1){
			return "Month";
		}else{
			return "Year";
		}
	}


}

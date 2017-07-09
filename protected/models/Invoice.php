<?php

/**
 * This is the model class for table "invoice".
 *
 * The followings are the available columns in table 'invoice':
 * @property integer $id_invoice
 * @property string $invoice_number
 * @property string $invoice_date
 * @property integer $id_user
 * @property string $term
 * @property string $note
 * @property string $description
 * @property integer $id_project
 * @property integer $id_customer
 * @property integer $amount
 * @property integer $discount
 * @property integer $percent 
 * @property string $type
 * @property integer $id_payment_type
 * @property integer $approved_id
 * @property integer $approved_by
 * @property integer $approved_date
 * @property integer $confirmation_id
 * @property integer $confirmation_by
 * @property integer $confirmation_date
 * @property integer $status
 */
class Invoice extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Invoice the static model class
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
		return 'invoice';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('invoice_number, id_user, id_payment_bank, description, note', 'required'),
			array('id_user, id_project, amount, id_customer, discount, id_payment_type, id_payment_bank, approved_id, confirmation_id, status', 'numerical', 'integerOnly'=>true),
			array('invoice_number, term, approved_by, confirmation_by', 'length', 'max'=>50),
			array('type', 'length', 'max'=>25),
			array('description', 'length', 'max'=>255),
			array('approved_date, confirmation_id', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_invoice, invoice_number, invoice_date, id_user, term, note, id_project, amount, description, discount, id_payment_bank', 'safe', 'on'=>'search'),
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
			'Customer' => array(self::BELONGS_TO, 'customer', 'id_customer'),
			'Useraccounts' => array(self::BELONGS_TO, 'useraccounts', 'id_user'),
			'Project' => array(self::BELONGS_TO, 'project', 'id_project'),
			'Term' => array(self::BELONGS_TO, 'term', 'id_payment_type'),
			'Bank' => array(self::BELONGS_TO, 'bank', 'id_payment_bank'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_invoice' => 'Id Invoice',
			'invoice_number' => 'Invoice Number',
			'invoice_date' => 'Invoice Date',
			'id_user' => 'User',
			'term' => 'Term',
			'note' => 'Note',
			'id_project' => 'Id Project',
			'id_customer'=>'Customer',
			'description'=>'Description',
			'amount' => 'Amount',
			'discount'=>'Discount',
			'percent'=>'Percent',
			'type' => 'Type',
			'id_payment_type'=>'Id Payment Term',
			'id_payment_bank'=>'Bank Account',
			'approved_id'=>'Approved Id',
			'approved_by'=>'Approved By',
			'approved_date'=>'Approved Date',
			'confirmation_id'=>'Confirmation Id',
			'confirmation_by'=>'Confirmation By',
			'confirmation_date'=>'Confirmation Date',
			'status'=>'Status',
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

		$criteria->compare('id_invoice',$this->id_invoice);
		$criteria->compare('invoice_number',$this->invoice_number,true);
		$criteria->compare('invoice_date',$this->invoice_date,true);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('term',$this->term,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('id_project',$this->id_project);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('id_customer',$this->id_customer);
		$criteria->compare('description',$this->description);
		$criteria->compare('discount',$this->discount);
		$criteria->compare('percent',$this->percent);
		$criteria->compare('type',$this->type);
		$criteria->compare('id_payment_type',$this->id_payment_type);
		$criteria->compare('id_payment_bank',$this->id_payment_bank);
		$criteria->compare('approved_id',$this->approved_id);
		$criteria->compare('approved_by',$this->approved_by);
		$criteria->compare('approved_date',$this->approved_date);
		$criteria->compare('confirmation_id',$this->confirmation_id);
		$criteria->compare('confirmation_by',$this->confirmation_by);
		$criteria->compare('confirmation_date',$this->confirmation_date);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	public function getInvoice($ProjectId)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_invoice',$this->id_invoice);
		$criteria->compare('invoice_number',$this->invoice_number,true);
		$criteria->compare('invoice_date',$this->invoice_date,true);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('term',$this->term,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('id_project',$ProjectId);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('id_customer',$this->id_customer);
		$criteria->compare('description',$this->description);
		$criteria->compare('discount',$this->discount);
		$criteria->compare('percent',$this->percent);
		$criteria->compare('type',$this->type);
		$criteria->compare('id_payment_type',$this->id_payment_type);
		$criteria->compare('id_payment_bank',$this->id_payment_bank);
		$criteria->compare('approved_id',$this->approved_id);
		$criteria->compare('approved_by',$this->approved_by);
		$criteria->compare('approved_date',$this->approved_date);
		$criteria->compare('confirmation_id',$this->confirmation_id);
		$criteria->compare('confirmation_by',$this->confirmation_by);
		$criteria->compare('confirmation_date',$this->confirmation_date);
		$criteria->compare('status',$this->status);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	public function generateInvoice(){
		$_d = date("Y");
		$_i = "INV-PRJ-";
		$_left = $_i . $_d;
		$_first = "000";
		$_len = strlen($_left);
		$no = $_left . $_first; 
		
		$last_po = $this->find( 
			array(
				"select"=>"invoice_number",
				"condition" => "left(invoice_number, " . $_len . ") = :_left",
				"params" => array(":_left" => $_left),
				"order" => "id_invoice DESC"
				));
		
		if($last_po != null){
			$_no = substr($last_po->invoice_number, $_len);
			$_no++;
			$_no = substr("000", strlen($_no)) . $_no;
			$no = $_left . $_no;
		}
		
		return $no;
	}


	public function fetchTotal($records)
	{
		$amount=0;
		foreach($records as $record)
			$amount+=$record->$model->project->amount;
		return $amount;
	} 

	protected function beforeSave()
	{
		$this->invoice_date = date('Y-m-d', strtotime($this->invoice_date));
		$this->approved_date = date('Y-m-d', strtotime($this->approved_date));
		$this->confirmation_date = date('Y-m-d', strtotime($this->confirmation_date));
		return TRUE;
	}
	
	protected function afterFind()
	{
		$this->invoice_date = date('d-m-Y', strtotime($this->invoice_date));
		$this->approved_date = date('d-m-Y', strtotime($this->approved_date));
		$this->confirmation_date = date('d-m-Y', strtotime($this->confirmation_date));
		return TRUE;
	}

	public function status($a)
	{
		if($a==0)
			return "Not Paid";
		else if($a==1)
			return "Paid";
		else 
			return "Tidak Terdaftar";
	}	

}
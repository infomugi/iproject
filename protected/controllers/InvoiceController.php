<?php

class InvoiceController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
			// 'rights',
			);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('create','update','view','delete','admin','index','approved','confirmation','createppm','createterm','juiautocomplete','print','report','my','removeinvoice'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==1',
				),
			array('allow',
				'actions'=>array('view','index'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==2',
				),			
			array('deny',
				'users'=>array('*'),
				),
			);
	}


	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model= $this->loadModel($id);
		$dataProvider = new CActiveDataProvider('Invoice', array(
			'criteria' => array(
				'condition'=>'id_invoice=' . $model->id_invoice
				)
			));

		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'dataProvider'=>$dataProvider,
			));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreatePPM($project, $customer, $paymentppm)
	{
		$model=new Invoice;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Invoice']))
		{
			$model->attributes=$_POST['Invoice'];
			$model->invoice_date = date("Y-m-d H:i:s");
			$model->id_user = Yii::app()->user->id;
			$model->id_project = $project;
			$model->id_customer = $customer;
			$model->id_payment_type = $paymentppm;
			$model->percent = "-";
			$model->term = "-";
			
			if($model->save())
				$this->redirect(array('view', 'id'=>$model->id_invoice));
		}

		$this->render('create',array(
			'model'=>$model,
			));
	}

	public function actionCreateTerm($project, $customer, $paymentterm, $percent, $amount, $type)
	{
		$model=new Invoice;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Invoice']))
		{
			$model->attributes=$_POST['Invoice'];
			$model->invoice_date = date("Y-m-d H:i:s");
			$model->id_user = Yii::app()->user->id;
			$model->id_project = $project;
			$model->id_customer = $customer;
			$model->id_payment_type = $paymentterm;
			$model->percent = $percent;
			$model->amount = $amount;
			$model->type = $type;
			
			if($model->save())

				$countTerm = Yii::app()->db->createCommand("SELECT COUNT(id_project) FROM invoice where id_project=$model->id_project")->queryScalar();
			$InvoiceTerm = Invoice::model()->findByPk($model->id_invoice);
			$InvoiceTerm->term = $countTerm;		
			$InvoiceTerm->save();

			$this->redirect(array('view', 'id'=>$model->id_invoice));

		}

		$this->render('create',array(
			'model'=>$model,
			));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Invoice']))
		{
			$model->attributes=$_POST['Invoice'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_invoice));
		}

		$this->render('update',array(
			'model'=>$model,
			));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionRemoveInvoice($id)
	{
		$model=$this->loadModel($id);
		$model->delete();
		$this->redirect(array('project/view','id'=>$model->id_project));
	}		

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Invoice');

		$InvoiceApproved = new CActiveDataProvider('Invoice', array(
			'criteria' => array(
				'condition'=>'status = 1'
				)
			));		

		$InvoiceConfirmation = new CActiveDataProvider('Invoice', array(
			'criteria' => array(
				'condition'=>'status = 2'
				)
			));	

		$InvoicePaid = new CActiveDataProvider('Invoice', array(
			'criteria' => array(
				'condition'=>'status = 3'
				)
			));	

		$InvoiceUnPaid = new CActiveDataProvider('Invoice', array(
			'criteria' => array(
				'condition'=>'status = 3'
				)
			));	

		$PaymentPPM = new CActiveDataProvider('Invoice', array(
			'criteria' => array(
				'condition'=>'id_payment_type = 1'
				)
			));	

		$PaymentTerm = new CActiveDataProvider('Invoice', array(
			'criteria' => array(
				'condition'=>'id_payment_type != 1'
				)
			));						

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'InvoiceApproved'=>$InvoiceApproved,
			'InvoiceConfirmation'=>$InvoiceConfirmation,
			'InvoicePaid'=>$InvoicePaid,
			'InvoiceUnPaid'=>$InvoiceUnPaid,
			'PaymentPPM'=>$PaymentPPM,
			'PaymentTerm'=>$PaymentTerm,
			));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{	

		$model=new Invoice('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Invoice']))
			$model->attributes=$_GET['Invoice'];

		$this->render('admin',array(
			'model'=>$model,			
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Invoice the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Invoice::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Invoice $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='invoice-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


	public function actionPrint($id){
		$this->layout = "print";
		$model= $this->loadModel($id);
		$dataProvider = new CActiveDataProvider('Invoice', array(
			'criteria' => array(
				'condition'=>'id_invoice=' . $model->id_invoice
				)
			));
		
		if($model != null)
		{
			$this->render('print',array(
				'model'=>$model,
				'dataProvider'=>$dataProvider,
				));
		}
		else{
			$this->actionIndex();
		}
	}

	public function actionJuiAutoComplete($term) {
		$criteria = new CDbCriteria;
		$criteria->compare('account_name', $term, true);
		$model = Bank::model()->findAll($criteria);

		foreach ($model as $value) {
			$array[] = array(
				'value' => ($value->account_name.' - '.$value->bank_name),  
				'label' => ($value->account_name.' - '.$value->bank_name),
				'id_payment_bank'=>$value->id_payment_bank,  
				'bank_name'=>$value->bank_name,      
				'bank_branch'=>$value->bank_branch,
				'account_holder'=>$value->account_holder,      
				'account_number'=>$value->account_number,
				);
		}

		echo CJSON::encode($array);
		Yii::app()->end();
	}

	public function actionApproved($id)
	{
		$model= $this->loadModel($id);
		if($model != null)
		{
			$model->approved_by = Yii::app()->user->record->fullname;
			$model->approved_id = Yii::app()->user->record->id_user;
			$model->approved_date = date("Y-m-d H:i:s");
			$model->save();

			if($model->save()){
				$this->redirect(array('view','id'=>$model->id_invoice));

			}
		}
		else{
			$this->actionIndex();
		}
	}

	public function actionConfirmation($id)
	{
		$model= $this->loadModel($id);
		if($model != null)
		{
			$model->confirmation_by = Yii::app()->user->record->fullname;
			$model->confirmation_id = Yii::app()->user->record->id_user;
			$model->confirmation_date = date("Y-m-d H:i:s");
			$model->save();

			if($model->save()){
				$this->redirect(array('view','id'=>$model->id_invoice));

			}
		}
		else{
			$this->actionIndex();
		}
	}

	public function actionSearch() {

		$tgl_awal = $_POST['tgl_awal'];
		$tgl_akhir = $_POST['tgl_akhir'];
		$criteria = new CDbCriteria( array(
		//spesifik field
			'select' => '*',
		//where kondition
			'condition' => "tanggal between tgl_awal '$tgl_awal' AND tgl_akhir '$tgl_akhir'",

		//order by
			'order' => 'id_invoice DESC', ));

		$model = Invoice::model()->findAll($criteria);

   			// $user=Yii::app()->db->createCommand()
			// ->select("*")
			// ->from("invoice")
			// ->andWhere("usertype=:id",array(':id'=>1))
			// ->andWhere("isactive=:status",array(':status'=>1))
			// ->queryAll();
			// print_r($user);

		$this->render('search', array('data' => $user));
	}

	/**
	 * Lists My Project.
	 */
	public function actionMy()
	{
		$dataProvider=new CActiveDataProvider('Invoice');

		$InvoiceApproved = new CActiveDataProvider('Invoice', array(
			'criteria' => array(
				'condition'=>'status = 1 AND id_user="' . YII::app()->user->record->id_user . '"'
				)
			));		

		$InvoiceConfirmation = new CActiveDataProvider('Invoice', array(
			'criteria' => array(
				'condition'=>'status = 2 AND id_user="' . YII::app()->user->record->id_user . '"'
				)
			));	

		$InvoicePaid = new CActiveDataProvider('Invoice', array(
			'criteria' => array(
				'condition'=>'status = 3 AND id_user="' . YII::app()->user->record->id_user . '"'
				)
			));	

		$InvoiceUnPaid = new CActiveDataProvider('Invoice', array(
			'criteria' => array(
				'condition'=>'status = 3 AND id_user="' . YII::app()->user->record->id_user . '"'
				)
			));	

		$PaymentPPM = new CActiveDataProvider('Invoice', array(
			'criteria' => array(
				'condition'=>'id_payment_type = 1 AND id_user="' . YII::app()->user->record->id_user . '"'
				)
			));	

		$PaymentTerm = new CActiveDataProvider('Invoice', array(
			'criteria' => array(
				'condition'=>'id_payment_type != 1 AND id_user="' . YII::app()->user->record->id_user . '"'
				)
			));						

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'InvoiceApproved'=>$InvoiceApproved,
			'InvoiceConfirmation'=>$InvoiceConfirmation,
			'InvoicePaid'=>$InvoicePaid,
			'InvoiceUnPaid'=>$InvoiceUnPaid,
			'PaymentPPM'=>$PaymentPPM,
			'PaymentTerm'=>$PaymentTerm,
			));
	}	

	public function actionReport()
	{
		$this->layout = "print";
		$from=$_REQUEST['startDate'];
		$until=$_REQUEST['endDate'];
		$statusInvoice=$_REQUEST['statusInvoice'];

		$tampa = "'%"."$from"."%'";
		$tampb = "'%"."$until"."%'";
		$status = "'%"."$statusInvoice"."%'";

		$dataProvider = new CActiveDataProvider('Invoice', array(
			'criteria' => array(
				'condition'=>'invoice_date >= ' . $tampa . ' AND invoice_date <= ' . $tampb . ' AND status='.$status
				)
			));

		$this->render('report',array(
			'dataProvider'=>$dataProvider,
			));
	}				

}

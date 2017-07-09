<?php
class ProjectController extends Controller
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
				'actions'=>array('index','view','my'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==3',
				),
			
			array('allow',
				'actions'=>array('index','view'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==2',
				),
			
			array('allow',
				'actions'=>array('create','update','delete','admin','index','view','complete','onprogress','editmonth','add','my'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==1',
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
		$Projectdetails=Projectdetail::model()->getProjectdetail($id);
		$Invoices=Invoice::model()->getInvoice($id);
		$PaymentTerms=Term::model()->getPaymentTerm($id);

		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'Projectdetails'=>$Projectdetails,
			'Invoices'=>$Invoices,
			'PaymentTerms'=>$PaymentTerms,
			));
	}


	public function actionAdd()
	{
		Yii::import('application.extensions.MultiModelForm');

		$model = new Project;
		if(isset($_POST['Project']))
		{
			$model->attributes=$_POST['Project'];
			$model->id_user = Yii::app()->user->id;
			$model->month = 1;

			if($model->save())
			{
				if($model->id_payment_type==1){
					$this->redirect(array('editmonth','id'=>$model->id_project));
				}else{
					$this->redirect(array('view','id'=>$model->id_project));
				}
			}

		}

		$this->render('add',array('model'=>$model));
	}	

	public function actionCreate()
	{
		$this->redirect(array('add'));
	}	


	// public function actionCreate()
	// {
	// Yii::import('application.extensions.MultiModelForm');

	// $model = new Project;
	// $Projectdetail = new Projectdetail;
	// $PaymentTerm = new Term;

	// $validatedMembers = array();
	// $validatedPaymentTerm = array();
	// if(isset($_POST['Project']))
	// {
	// $model->attributes=$_POST['Project'];
	// $model->id_user = Yii::app()->user->id;
	// $model->month = 1;

	// //validate detail before saving the master
	// $detailOK = MultiModelForm::validate($Projectdetail,$validatedMembers,$deletedMembers);
	// $detailYes = MultiModelForm::validate($PaymentTerm,$validatedPaymentTerm,$deletedPaymentTerm);

	// if ($detailOK && empty($validatedMembers) && $detailYes && empty($validatedPaymentTerm))
	// {
	// Yii::app()->user->setFlash('error','No detail submitted');
	// $detailOK = false;
	// }

	// if($model->save() && $detailOK && $detailYes)
	// {
	// //the value for the foreign key 'groupid'
	// $masterValues = array ('id_project'=>$model->id_project);
	// $Projectdetail->status_update = date("Y-m-d H:i:s");

	// if (MultiModelForm::save($Projectdetail,$validatedMembers,$deletedMembers,$masterValues) && MultiModelForm::save($PaymentTerm,$validatedPaymentTerm,$deletedPaymentTerm,$masterValues) && $model->save())
	// if($model->id_payment_type==1){
	// $this->redirect(array('editmonth','id'=>$model->id_project));
	// }else{
	// $this->redirect(array('view','id'=>$model->id_project));
	// }
	// }

	// }

	// $this->render('create',array(
	// 'model'=>$model,
	// 'Projectdetail' => $Projectdetail,'validatedMembers' => $validatedMembers,
	// 'PaymentTerm' => $PaymentTerm,'validatedPaymentTerm' => $validatedPaymentTerm,
	// ));
	// }


	public function actionUpdate($id)
	{
		Yii::import('application.extensions.MultiModelForm');
		$model=$this->loadModel($id); //the Group model
		$Projectdetail=$this->loadModel($id); //the Model Payment
		$PaymentTerm=$this->loadModel($id);

		$Projectdetail = new Projectdetail;
		$PaymentTerm = new Term;
		$validatedMembers = array();
		$validatedPaymentTerm = array();
		if(isset($_POST['Project']))
		{
			$model->attributes=$_POST['Project'];
			$Projectdetail->status_update = date("Y-m-d H:i:s");

			//the value for the foreign key 'groupid'
			$masterValues = array ('id_project'=>$model->id_project);
			if (MultiModelForm::save($Projectdetail,$validatedMembers,$deletedMembers,$masterValues) && MultiModelForm::save($PaymentTerm,$validatedPaymentTerm,$deletedPaymentTerm,$masterValues) && $model->save())
				$this->redirect(array('update','id'=>$model->id_project));
		}

		$this->render('update',array(
			'model'=>$model,
			'Projectdetail' => $Projectdetail,'validatedMembers' => $validatedMembers,
			'PaymentTerm' => $PaymentTerm,'validatedPaymentTerm' => $validatedPaymentTerm,
			));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */

	public function actionDelete($id)
	{
		$project=$this->loadModel($id);
		Projectdetail::model()->deleteAllByAttributes(array('id_project'=>$id));
		Invoice::model()->deleteAllByAttributes(array('id_project'=>$id));
		Tasks::model()->deleteAllByAttributes(array('id_project'=>$id));
		Groups::model()->deleteAllByAttributes(array('group'=>$id));
		Term::model()->deleteAllByAttributes(array('id_project'=>$id));
		$project->delete();
		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Project',array(
			'criteria'=>array(
				'condition'=>'status = 0',
				'order'=>'id_project DESC',
				'limit'=>'3',
				),'pagination'=>array(
				'pageSize'=>'3'
				)));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Project('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Project']))
			$model->attributes=$_GET['Project'];

		$this->render('admin',array(
			'model'=>$model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Project the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Project::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Project $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='project-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionstatus($id)
	{
		$model= $this->loadModel($id);
		if($model != null)
		{
			$Projectdetail = Projectdetail::model()->findByPk($id);
			$Projectdetail->status_update = date("Y-m-d H:i:s");
			$Projectdetail->status = 1;		
			$Projectdetail->save();

			if($model->save()){
				$this->redirect(array('view','id'=>$id));

			}
		}
		else{
			$this->actionIndex();
		}
	}


	public function actionAutoKomplit($term) {
		$criteria = new CDbCriteria;
		$criteria->compare('NIP', $term, true);
		$model = Projectdetail::model()->findAll($criteria);

		foreach ($model as $value) {
			$array[] = array(
				'job'=>$value->job,      
				'status'=>$value->status,
				'status_update'=>$value->status_update,
				);
		}
	}

	public function actionPrint($id){
		$this->layout = "print";
		$model= $this->loadModel($id);
		$dataProvider = new CActiveDataProvider('Project', array(
			'criteria' => array(
				'condition'=>'id_project=' . $model->id_project
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

	public function actionSchedule()
	{       
		$items = array();
		$model=Project::model()->findAll();    
		foreach ($model as $value) {
			$items[]=array(
				'title'=>$value->title,
				'start'=>$value->start_date,
				'color'=>'#CC0000',
				'end'=>date('Y-m-d', strtotime('+1 day', strtotime($value->deadline))),
				// 'end'=>$value->deadline,
                //'allDay'=>true,
                //'url'=>'http://anyurl.com'
				);
		}
		echo CJSON::encode($items);
		Yii::app()->end();
	}	

	public function actionScheduleTask()
	{       
		$items = array();
		$model=Projectdetail::model()->findAll();    
		foreach ($model as $value) {
			$items[]=array(
				'title'=>$value->job,
				'start'=>$value->status_update,
				// 'end'=>$value->job_date,
				'end'=>date('Y-m-d', strtotime('+1 day', strtotime($value->job_date))),
                // 'color'=>'#CC0000',
                //'allDay'=>true,
                //'url'=>'http://anyurl.com'
				'url'=>'#',
				);
		}
		echo CJSON::encode($items);
		Yii::app()->end();
	}		

	/**
	 * Lists My Project.
	 */
	public function actionMy()
	{

		$dataProvider=new CActiveDataProvider('Project',array(
			'criteria'=>array(
				'condition'=>'id_user=' . YII::app()->user->record->id_user,
				'order'=>'id_project DESC',
				'limit'=>'3',
				),'pagination'=>array(
				'pageSize'=>'3'
				)));		

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}		

	public function actionReport()
	{
		$this->layout = "print";
		$from=$_REQUEST['startDatex'];
		$until=$_REQUEST['endDatex'];
		$statusProject=$_REQUEST['status'];

		$tampa = "'%"."$from"."%'";
		$tampb = "'%"."$until"."%'";
		$status = "'%"."$statusProject"."%'";

		$dataProvider = new CActiveDataProvider('Project', array(
			'criteria' => array(
				'condition'=>'invoice_date >= ' . $tampa . ' AND invoice_date <= ' . $tampb . ' AND status='.$statusProject
				)
			));

		$this->render('report',array(
			'dataProvider'=>$dataProvider,
			));
	}			

	public function actionComplete($id)
	{
		$model=$this->loadModel($id);
		$model->status = 1;
		$model->save();
		$this->redirect(array('view','id'=>$model->id_project));
	}	

	public function actionOnProgress($id)
	{
		$model=$this->loadModel($id);
		$model->status = 0;
		$model->save();
		$this->redirect(array('view','id'=>$model->id_project));
	}			

	public function actionEditMonth($id)
	{
		$model=$this->loadModel($id);
		$model->setScenario('editmonth');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Project']))
		{
			$model->attributes=$_POST['Project'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_project));
		}

		$this->render('month',array(
			'model'=>$model,
			));
	}
}
<?php
/**
 * The followings are the available model relations:
 * @property Project $project
 */
class ProjectdetailController extends Controller
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
				'actions'=>array('index','view','my','juiautocomplete','removetask','starttask','status'),
				'users'=>array('@'),
				),
			array('allow',
				'actions'=>array('create','update','delete','admin','index','view','my'),
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


		$this->render('view',array(
			'model'=>$this->loadModel($id),
			));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($projectid)
	{
		$model=new Projectdetail;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Projectdetail']))
		{
			$model->attributes=$_POST['Projectdetail'];
			$model->id_project = $projectid;
			if($model->save())
				$this->redirect(array('project/view','id'=>$model->id_project));
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

		if(isset($_POST['Projectdetail']))
		{
			$model->attributes=$_POST['Projectdetail'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_projectdetail));
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

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Projectdetail');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}

	public function actionMy()
	{
		$dataProvider = new CActiveDataProvider('Projectdetail', array(
			'criteria' => array(
				'condition'=>'member = "' . YII::app()->user->record->username . '"'
				)
			));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}		

	public function actionTodo()
	{
		$dataProvider = new CActiveDataProvider('Projectdetail', array(
			'criteria' => array(
				'condition'=>'status=0 And member = "' . YII::app()->user->record->username . '"'
				)
			));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}		


	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Projectdetail('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Projectdetail']))
			$model->attributes=$_GET['Projectdetail'];

		$this->render('admin',array(
			'model'=>$model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Projectdetail the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Projectdetail::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Projectdetail $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='projectdetail-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionstatus($id,$id_project)
	{
		$model= $this->loadModel($id);
		if($model != null)
		{
			$model->status_update = date("Y-m-d H:i:s");
			$model->status = 1;		
			$model->save();
			if($model->save()){
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('project/view','id'=>$id_project));
			}
		}
		else{
			$this->actionIndex();
		}
	}

	public function actionstart($id,$id_project)
	{
		$model= $this->loadModel($id);
		if($model != null)
		{
			$model->status_update = NULL;
			$model->status = 0;		
			$model->save();

			if($model->save()){
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('project/view','id'=>$id_project));
			}
		}
		else{
			$this->actionIndex();
		}
	}

	public function actionstarttask($id,$id_project)
	{
		$model= $this->loadModel($id);
		if($model != null)
		{
			$model->job_date = date("Y-m-d h:i:s");
			$model->save();
			if($model->save()){
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('project/view','id'=>$id_project));
			}
		}
		else{
			$this->actionIndex();
		}
	}

	public function actionRemoveTask($id)
	{
		$model=$this->loadModel($id);
		$model->delete();
		$this->redirect(Yii::app()->user->returnUrl);
	}	

	public function actionJuiAutoComplete($term) {
		$criteria = new CDbCriteria;
		// $criteria->compare('fullname', $term, true);
		$criteria->compare('username', $term, true);
		// $criteria->compare('email', $term, true);
		$model = Useraccounts::model()->findAll($criteria);

		foreach ($model as $value) {
			$array[] = array(
				'value' => ($value->fullname . ' - ' . $value->email),  
				'label' => ($value->fullname . ' - ' . $value->email),
				'fullname'=>$value->fullname,
				'username'=>$value->username,  
				'email'=>$value->email, 
				'id_user'=>$value->id_user,  
				);
		}

		echo CJSON::encode($array);
		Yii::app()->end();
	}

	

}
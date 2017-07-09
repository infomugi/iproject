<?php

class TasksController extends Controller
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
			// 'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view','update'),
				'users'=>array('@'),
				),
			array('allow',
				'actions'=>array('create','update','delete','admin','index','view'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==1',
				),
			array('deny',
				'actions'=>array('create','update','delete','admin','index','view'),
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
	public function actionCreate($projectdetail,$project,$job)
	{
		$model=new Tasks('create');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tasks']))
		{
			$model->attributes=$_POST['Tasks'];
			$model->id_projectdetail = $projectdetail;
			$model->id_project = $project;
			$model->task = $job;
			$tmp;
			if(strlen(trim(CUploadedFile::getInstance($model,'file'))) > 0) 
			{ 
				$tmp=CUploadedFile::getInstance($model,'file'); 
				$model->file=YII::app()->user->name.'-'.$model->task.'.'.$tmp->extensionName; 
			}	

			if($model->save())
				if(strlen(trim($model->file)) > 0) 
					$tmp->saveAs(Yii::getPathOfAlias('webroot').'/dokumen/file/'.$model->file);
				$this->redirect(array('view','id'=>$model->id_task));
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
		$model=$this->loadModel($id,'update');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tasks']))
		{
			$model->attributes=$_POST['Tasks'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_task));
		}

		$this->render('update',array(
			'model'=>$model,
			));
	}

	public function actionReport($id)
	{
		$model=$this->loadModel($id,'update');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tasks']))
		{
			$model->attributes=$_POST['Tasks'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_task));
		}

		$this->render('report',array(
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
		$users=$this->loadModel($id);
		Projectdetail::model()->deleteAllByAttributes(array('member'=>$users->username));
		Tasks::model()->deleteAllByAttributes(array('name'=>$users->username));
		Invoice::model()->deleteAllByAttributes(array('id_user'=>$users->id_user));
		Groups::model()->deleteAllByAttributes(array('id_user'=>$users->id_user));
		$users->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Tasks');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}

	/**
	 * Lists My Tasks.
	 */
	public function actionMy()
	{
		$dataProvider = new CActiveDataProvider('Tasks', array(
			'criteria' => array(
				'condition'=>'name="' . YII::app()->user->record->username . '"'
				)
			));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}	

	/**
	 * Lists Todo Tasks.
	 */
	public function actionToDo()
	{
		$dataProvider = new CActiveDataProvider('Tasks', array(
			'criteria' => array(
				'condition'=>'status=0 And name="' . YII::app()->user->record->username . '"'
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
		$model=new Tasks('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tasks']))
			$model->attributes=$_GET['Tasks'];

		$this->render('admin',array(
			'model'=>$model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Tasks the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Tasks::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Tasks $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tasks-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionStart($id)
	{
		$model= $this->loadModel($id,'start');
		if($model != null)
		{
			$model->status = 0;		
			$model->save();
			if($model->save()){
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
			}
		}
		else{
			$this->actionIndex();
		}
	}


	public function actionFinish($id)
	{
		$model= $this->loadModel($id,'finish');
		if($model != null)
		{
			$model->status = 1;	
			$model->save();
			if($model->save()){
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
			}
		}
		else{
			$this->actionIndex();
		}
	}	

}

<?php

class UseraccountsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
			// 'Rights',
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
				'actions'=>array('index','profile','avatar','update','password'),
				'users'=>array('@'),
				),
			array('allow',
				'actions'=>array('admin','index','profile'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==2',	
				),			
			array('allow',
				'actions'=>array('create','update','delete','admin','index','view','profile','assignment'),
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

	public function actionProfile($name)
	{
		$this->render('view',array(
			'model'=>$this->loadProfile($name),
			));
	}	

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Useraccounts('create');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Useraccounts']))
		{
			$model->attributes=$_POST['Useraccounts'];
			$model->create_time = date("Y-m-d H:i:s");
			$model->image=CUploadedFile::getInstance($model,'image');
			if($model->save())
			{
				$model->password = md5($model->password);
				$model->image->saveAs(Yii::getPathOfAlias('webroot').'/dokumen/avatar/'.$model->image);
				$model->save(); 			
				$this->redirect(array('view','id'=>$model->id_user));
			}
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
		$model->setScenario('update');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Useraccounts']))
		{
			$model->attributes=$_POST['Useraccounts'];
			$model->update_time = date("Y-m-d H:i:s");
			if($model->save())
			{
				$this->redirect(array('view','id'=>$model->id_user));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			));
	}

	public function actionPassword($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Useraccounts']))
		{
			$model->attributes=$_POST['Useraccounts'];
			$model->update_time = date("Y-m-d H:i:s");
			if($model->save())
			{
				$model->password = md5($model->password);
				$model->save(); 	
				$this->redirect(array('view','id'=>$model->id_user));
			}
		}

		$this->render('password',array(
			'model'=>$model,
			));
	}	

	public function actionAssignment($id)
	{
		$model=$this->loadModel($id);
		$model->setScenario('assignment');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Useraccounts']))
		{
			$model->attributes=$_POST['Useraccounts'];
			$model->update_time = date("Y-m-d H:i:s");
			if($model->save())
			{
				$this->redirect(array('view','id'=>$model->id_user));
			}
		}

		$this->render('assignment',array(
			'model'=>$model,
			));
	}	

	public function actionAvatar($id)
	{
		$model=$this->loadModel($id);
		$model->setScenario('avatar');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Useraccounts']))
		{
			$model->attributes=$_POST['Useraccounts'];
			$model->update_time = date("Y-m-d H:i:s");
			$model->image=CUploadedFile::getInstance($model,'image');
			if($model->save())
			{
				$model->image->saveAs(Yii::getPathOfAlias('webroot').'/dokumen/avatar/'.$model->image);
				$this->redirect(array('view','id'=>$model->id_user));
			}
		}

		$this->render('avatar',array(
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
		$dataProvider=new CActiveDataProvider('Useraccounts',array(
			'criteria'=>array(
				'condition'=>'status = 1',
				'order'=>'visit_time DESC',
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
		$model=new Useraccounts('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Useraccounts']))
			$model->attributes=$_GET['Useraccounts'];

		$this->render('admin',array(
			'model'=>$model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Useraccounts the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Useraccounts::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadProfile($name)
	{
		$model=Useraccounts::model()->findByAttributes(array('username'=>$name));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}	

	/**
	 * Performs the AJAX validation.
	 * @param Useraccounts $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='useraccounts-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAutoKomplit($term) {
		$criteria = new CDbCriteria;
		$criteria->compare('NIP', $term, true);
		$model = Pegawai::model()->findAll($criteria);

		foreach ($model as $value) {
			$array[] = array(
				'value' => ($value->NIP.' - '.$value->Nama_Lengkap),  
				'label' => ($value->NIP.' - '.$value->Nama_Lengkap),
				'NIP'=>$value->NIP,      
				'Nama_Lengkap'=>$value->Nama_Lengkap,
				'id_jabatan'=>$value->id_jabatan,
				'id_pegawai'=>$value->id_pegawai,
				'Tanggal_Lahir'=>$value->Tanggal_Lahir,
				'Alamat'=>$value->Alamat,
				);
		}

		echo CJSON::encode($array);
		Yii::app()->end();
	}

	public function actionStatus($id,$id_user)
	{
		$model= $this->loadModel($id);
		if($model != null)
		{
			$model->status = 1;		
			$model->update_time=new CDbExpression('NOW()');	
			$model->save();
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id_user));
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('Useraccounts/view','id'=>$id_user));
			}
		}
		else{
			$this->actionIndex();
		}
	}


	public function actionSetAdmin($id)
	{
		$model= $this->loadModel($id);
		if($model != null)
		{
			$model->level = 1;	
			$model->save();

			if($model->save()){
				$this->redirect(array('view','id'=>$model->id_user));

			}
		}
		else{
			$this->actionIndex();
		}
	}	

	public function actionSetOwner($id)
	{
		$model= $this->loadModel($id);
		if($model != null)
		{
			$model->level = 2;	
			$model->save();
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id_user));
			}
		}
		else{
			$this->actionIndex();
		}
	}

	public function actionSetPIC($id)
	{
		$model= $this->loadModel($id);
		if($model != null)
		{
			$model->level = 3;	
			$model->save();
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id_user));
			}
		}
		else{
			$this->actionIndex();
		}
	}

	public function actionSetMember($id)
	{
		$model= $this->loadModel($id);
		if($model != null)
		{
			$model->level = 4;	
			$model->save();
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id_user));
			}
		}
		else{
			$this->actionIndex();
		}
	}

	public function actionSetCompany($id)
	{
		$model= $this->loadModel($id);
		if($model != null)
		{
			$model->level = 5;	
			$model->save();
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id_user));
			}
		}
		else{
			$this->actionIndex();
		}
	}	


}
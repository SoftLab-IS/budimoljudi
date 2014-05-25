<?php

class ActionController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update', 'ucesce', 'kreirana', 'podrzana', 'moje_akcije'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
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
        $dataProvider=Action::model()->findAll(array('order'=>'id DESC'));
		$this->layout = 'main';
		$this->render('view',array(
			'model'=>$this->loadModel($id),
            'actions'=>$dataProvider
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$this->layout = 'main';
		$model=new Action;
		$userModel=new User('create');
		$locationModel =new Location('action');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Action'],$_POST['User'],$_POST['Location']))
		{
			$userModel->attributes = $_POST['User'];
			$userModel->password = ($userModel->password)? md5($userModel->password) : null;
			$userModel->passwordRepeat = ($userModel->passwordRepeat)? md5($userModel->passwordRepeat) : null;
			$userModel->type = User::USER_ROLE_POKRETAC;
			$valid =$userModel->validate();
			if($valid){
				$userModel->save(false);
				$locationModel->attributes = $_POST['Location'];
				if($locationModel->validate())
					$locationModel->save(false);
				$model->attributes=$_POST['Action'];
				$model->time_start = date('Y-m-d H:i:s', strtotime($_POST['d_start'] . ' ' . $_POST['t_start']));
				$model->time_end = date('Y-m-d H:i:s', strtotime($_POST['d_end'] . ' ' . $_POST['t_end']));
				$model->user_id = $userModel->id;
				$model->Location_id = $locationModel->id;
				if($model->validate()){
					$model->save(false);
					$this->redirect(array('kreirana', 'id'=>$model->id));
				}
			}
		}
		$this->render('create',array(
			'model'=>$model,
			'userModel'=>$userModel,
			'locationModel'=>$locationModel,
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
		$locationModel = Location::model()->findByPk($model->id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Action']))
		{
			$model->attributes=$_POST['Action'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
			'locationModel'=>$locationModel,
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
        $this->layout = 'main';

        $criteria = new CDbCriteria;
        $criteria -> condition = "time_end < :today";
        $criteria -> params = array(':today' => strtotime(date('Y-m-d H:i:s')));

        $dataProvider = Action::model()->findAll(array('order'=>'id DESC'));
        $finishedActions = Action::model()->findAll($criteria);
		$this->render('index',array(
			'model' => $dataProvider,
            'finishedActions' => $finishedActions,
		));
	}

	public function actionMoje_akcije()
	{
		$this->layout = 'main';
		$criteria = new CDbCriteria;
		$criteria->condition = 'user_id=:user';
		$criteria->params = array(':user'=>Yii::app()->user->id);
		$criteria->order = 'id DESC';
		$dataProvider=Action::model()->findAll($criteria);
		$this->render('index',array(
			'model'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Action('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Action']))
			$model->attributes=$_GET['Action'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Action the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Action::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Action $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='action-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionUcesce($id)
	{
		$actionUsers = new Actionusers;
		$action = Action::model()->findByPk($id);
		$actionUsers->action_id = $id;
		$actionUsers->user_id = Yii::app()->session['id'];
		if($actionUsers->validate() AND $action)
		{
			$actionUsers->save(false);
			$action->number_of_participants++;
			$action->update();
			$this->redirect(array('podrzana', 'id' => $id));
		}
		else
		{
			throw new Exception('Došlo je do greške, molimo vas pokušajte ponovo');
		}
	}

    public function actionKreirana($id)
    {
        $this->layout = 'main';
        $action = Action::model()->findByPk($id);
        $this->render('kreirana',array(
            'model' => $action,
        ));
    }

    public function actionPodrzana($id)
    {
        $this->layout = 'main';
        $action = Action::model()->findByPk($id);
        $this->render('podrzana',array(
            'model' => $action,
        ));
    }
}

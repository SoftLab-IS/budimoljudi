<?php

class HelpController extends Controller
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
				'actions'=>array('create'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','update', 'kreirana'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$this->layout = 'main';
		$model=new Help;
        $userModel = new User('create');
		$locationModel = new Location('help');
		$helpTypes = Helptypes::model()->findAll();

		if(Yii::app()->user->isGuest and isset($_POST['User'])) {
			$userModel->attributes = $_POST['User'];
			$userModel->type = User::USER_ROLE_VOLONTER;
			Yii::app()->user->setState('roles', $userModel->type);
			$userModel->password = ($userModel->password)? md5($userModel->password) : null;
			$userModel->passwordRepeat = ($userModel->passwordRepeat)? md5($userModel->passwordRepeat) : null;
			$valid =$userModel->validate();
			if($valid)
				$userModel->save(false);
		}
		else {
			if(!Yii::app()->user->isGuest){
				$userModel = User::model()->findByPk(Yii::app()->user->id);
				$userModel->type = User::USER_ROLE_KOMPLETAN;
				Yii::app()->user->setState('roles', $userModel->type);
				$userModel->update();
				$valid = true;
			}

		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Help'], $_POST['Location']))
		{
			if($valid){
				$locationModel->attributes = $_POST['Location'];
				if($locationModel->validate())
					$locationModel->save(false);
				if(isset($_POST['type']))
				{
					foreach($_POST['type'] as $oneType)
					{
						$model->types .= $oneType;
					}
				}
				else
				{
					$model->addError('type', "Trebate izabrati barem jedan tip pomoci");
				}

				$model->attributes=$_POST['Help'];
				$model->user_id = $userModel->id;
				$model->Location_id = $locationModel->id;

				if($model->validate()){
					$model->save(false);
					if(isset($_POST['type']))
					{
						foreach($_POST['type'] as $oneType)
						{
							$helpHasTypes = new Helphastypes;
							$helpHasTypes->help_id = $model->id;
							$helpHasTypes->help_types_id = (int)$oneType;
							$helpHasTypes->save();
						}
					}
					$this->redirect(array('kreirana', 'id' => $model->id));
				}
			}

		}


		$this->render('create',array(
			'model'=>$model,
            'userModel'=>$userModel,
			'locationModel'=>$locationModel,
			'helpTypes'=>$helpTypes,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		if($id != Yii::app()->session['id'])
			throw new Exception("Đe si poš'o!?");
		$this->layout = 'main';
		$model= Help::model()->findByAttributes(array('user_id'=>$id));
		$userModel = User::model()->findByPk($model->user_id);
		$locationModel = Location::model()->findByPk($model->Location_id);
		$helpTypes = Helptypes::model()->findAll();
		$checkedTypes = Helphastypes::model()->findAllByAttributes(array('help_id'=>$model->id));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Location']))
		{
			$locationModel->attributes = $_POST['Location'];
			if($locationModel->validate('help'))
				$locationModel->update();
		}
		if(isset($_POST['Help']))
		{
			$model->attributes=$_POST['Help'];
			$model->Location_id = $locationModel->id;
			if($model->save())
			{
				$type = Helphastypes::model()->findAllByAttributes(array('help_id'=>$model->id));
				foreach($type as $t)
					$t->delete();
				if(isset($_POST['type']))
				{
					foreach($_POST['type'] as $oneType)
					{
						$helpHasTypes = new Helphastypes;
						$helpHasTypes->help_id = $model->id;
						$helpHasTypes->help_types_id = (int)$oneType;
						$helpHasTypes->save();
					}
				}
				$this->redirect(array('kreirana', 'id' => $id));
			}

		}

		$this->render('update',array(
			'model'=>$model,
			'userModel'=>$userModel,
			'locationModel'=>$locationModel,
			'helpTypes'=>$helpTypes,
			'checkedTypes'=>$checkedTypes,
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
		$dataProvider=new CActiveDataProvider('Help');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Help('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Help']))
			$model->attributes=$_GET['Help'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Help the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Help::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Help $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='help-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionKreirana($id)
    {
        $this->layout = 'main';
        $help = Help::model()->findByPk($id);
        $this->render('kreirana',array(
            'model' => $help,
        ));
    }
}

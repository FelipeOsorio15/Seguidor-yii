<?php

class UserProyectoController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
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
		$model=new UserProyecto;
		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UserProyecto']))
		{
			$model->attributes=$_POST['UserProyecto'];
require("class.phpmailer.php");
require("class.smtp.php");

$mail = new PHPMailer();
 $usermio = User::model()->find("username=?", array(Yii::app()->User->id));
		$condition = $usermio->username;
 $user = User::model()->find("email=?", array($model->email));
		$idmail = $user->iduser;
		$model->iduser=$idmail;	
		$model->confirmado=0;

$body = " Has sido invitado a un proyecto de ".$condition."Si deseas aceptar  :  <html><body> <a href='localhost/seguidor/index.php?r=site/login&iduser=".$idmail."&idproyecto=".$model->idproyecto. " ' >Aqui</a></body> <html> ";
$mail->IsSMTP(); 

// la dirección del servidor, p. ej.: smtp.servidor.com
$mail->Host = "smtp.gmail.com";// Yo utilice el servidor smtp de gmail CON ESTE FUNCIONA

// dirección remitente, p. ej.: no-responder@miempresa.com
$mail->From = "dejoy@gmail.com";//Esto no interesa mucho, le podes poner tu direccion de gmail para que te respondan ahi

// nombre remitente, p. ej.: "Servicio de envío automático"
$mail->FromName = "sebastiandejoy";//Nombre que mostrara el mensaje de quien lo remite

// asunto y cuerpo alternativo del mensaje
$mail->Subject = "Asunto";
$mail->AltBody = "Cuerpo alternativo 
    para cuando el visor no puede leer HTML en el cuerpo"; // ESTE SE PUEDE DEJAR COMO ESTA

// si el cuerpo del mensaje es HTML
$mail->MsgHTML($body);

// podemos hacer varios AddAdress
$mail->AddAddress($model->email);//Aqui ya pones el correo a donde vas a mandar el email y el nombre, es decir lo que llega del form de registro

// si el SMTP necesita autenticación
$mail->SMTPAuth = true;

// credenciales usuario
$mail->Username = "sebastiandejoy@unicauca.edu.co"; //Aqui debes poner la direccion tuya de gmail de donde saldran los mensajes, debe ser gmail supongo
$mail->Password = "06102025"; //contrasena de tu cuenta
// el Send() es lo mas importante donde envia, le podes quitar la condicion pero colocar la funcion

     $mail->Send() ;

			if($model->save())
				$this->redirect(array('actividad/index','id'=>$model->idproyecto));
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

		if(isset($_POST['UserProyecto']))
		{
			$model->attributes=$_POST['UserProyecto'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->iduser));
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
		$dataProvider=new CActiveDataProvider('UserProyecto');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new UserProyecto('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UserProyecto']))
			$model->attributes=$_GET['UserProyecto'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return UserProyecto the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=UserProyecto::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param UserProyecto $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-proyecto-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

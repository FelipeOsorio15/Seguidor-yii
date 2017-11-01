<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect("?r=proyecto");
		}

		if(isset($_GET['email']) &&  isset($_GET['verificacion'])  ) {

              $email = $_GET['email'];
              $verificacion = $_GET['verificacion'];

              $conexion=Yii::app()->db;
              $consulta= " SELECT `email`,`verificacion` FROM `user` WHERE `email`='".$email."'  AND `verificacion`=".$verificacion;
              $resultado= $conexion->createCommand($consulta);
              $filas= $resultado->query();
              foreach ($filas as $fila) {
                     $existe=true;
                     }
              if($existe==true){

              	  $consulta = "UPDATE `user` SET activo=1 WHERE `email`='".$email ."' AND  `verificacion`=".$verificacion;
                 $resultado= $conexion->createCommand($consulta);
                 $resultado->execute();
                  $msg="Usuaro validado";
                 // $this->render('login',array('model'=>$model));
              }   

              

		}

if(isset($_GET['iduser']) &&  isset($_GET['idproyecto'])  ) {

              $iduser = $_GET['iduser'];
              $idproyecto = $_GET['idproyecto'];

              $conexion=Yii::app()->db;
              //$consulta= "UPDATE INTO `user_proyecto` (`confirmado`, `idproyecto`, `email`, `iduser`) VALUES ( 1 , ".$idproyecto.", NULL , ".$iduser.")";
              $consulta = "UPDATE `user_proyecto` SET confirmado=1 WHERE `idproyecto`=".$idproyecto ." AND  `iduser`=".$iduser;
              $resultado= $conexion->createCommand($consulta);
               $resultado->execute();
            /*  $filas= $resultado->query();
                
                $existe=true;
              foreach ($filas as $fila) {
                     $existe=true;
                     }
              if($existe==true){

              	  $consulta = 
                 $resultado= $conexion->createCommand($consulta);
                 $resultado->execute();
                  $msg="Nuevo participante ingresado  ";
              }   
           */
              

		}



		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

 public function actionRegister()
        {
                $newUser=new RegisterForm;
                $model = new User;
                
                // if it is ajax validation request
                if(isset($_POST['ajax']) && $_POST['ajax']==='register-form')
                {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }

                // collect user input data
                if(isset($_POST['RegisterForm']))
                {
                        $newUser->attributes=$_POST['RegisterForm'];

                        $model->iduser=rand(7, 30);
                        $model->name = $newUser->name;
                        $model->lastname = $newUser->lastname;
                        $model->docid= $newUser->docid;
                        $model->username = $newUser->username;
                        $model->password = $newUser->password;
                        $model->email = $newUser->email;
                        $model->photo = $newUser->photo;
                                
                        if($newUser->save()) {
                               
                               
                                $this->redirect("site/login");
                        }
                                
                }
                // display the register form
                $this->render('index',array('model'=>$model));
        }



}
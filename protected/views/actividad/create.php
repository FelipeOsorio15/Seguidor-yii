<?php
/* @var $this ActividadController */
/* @var $model Actividad */

$this->breadcrumbs=array(
	'Actividads'=>array('index','id'=>$model->idproyecto),
	'Create',
);
//$form->hiddenField($model,'idproyecto',array('type' =>"hidden" , "value" =>$_GET['id'] ));    
$this->menu=array(
	array('label'=>'List Actividad', 'url'=>array('index','id'=>$_GET['id'])),
	//array('label'=>'Manage Actividad', 'url'=>array('admin')),
);
?>

<h1>Create Actividad</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

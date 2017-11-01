<?php
/* @var $this UserProyectoController */
/* @var $model UserProyecto */

$this->breadcrumbs=array(
	'User Proyectos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserProyecto', 'url'=>array('index','id'=>$_GET['id'])),
	array('label'=>'Manage UserProyecto', 'url'=>array('admin')),
);
?>

<h1>Create UserProyecto</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
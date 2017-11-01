<?php
/* @var $this UserProyectoController */
/* @var $model UserProyecto */

$this->breadcrumbs=array(
	'User Proyectos'=>array('index'),
	$model->iduser=>array('view','id'=>$model->iduser),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserProyecto', 'url'=>array('index')),
	array('label'=>'Create UserProyecto', 'url'=>array('create')),
	array('label'=>'View UserProyecto', 'url'=>array('view', 'id'=>$model->iduser)),
	array('label'=>'Manage UserProyecto', 'url'=>array('admin')),
);
?>

<h1>Update UserProyecto <?php echo $model->iduser; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this UserProyectoController */
/* @var $model UserProyecto */

$this->breadcrumbs=array(
	'User Proyectos'=>array('index'),
	$model->iduser,
);

$this->menu=array(
	array('label'=>'List UserProyecto', 'url'=>array('index')),
	array('label'=>'Create UserProyecto', 'url'=>array('create')),
	array('label'=>'Update UserProyecto', 'url'=>array('update', 'id'=>$model->iduser)),
	array('label'=>'Delete UserProyecto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->iduser),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserProyecto', 'url'=>array('admin')),
);
?>

<h1>View UserProyecto #<?php echo $model->iduser; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'confirmado',
		'idproyecto',
		'email',
		'iduser',
	),
)); ?>

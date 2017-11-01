<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */

$this->breadcrumbs=array(
	'Proyectos'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Lista de Proyecto', 'url'=>array('index')),
	array('label'=>'Crear Proyecto', 'url'=>array('create')),
	array('label'=>'Actualizar Proyecto', 'url'=>array('update', 'id'=>$model->idproyecto)),
	array('label'=>'Borrar Proyecto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idproyecto),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Proyecto', 'url'=>array('admin')),
);
?>

<h1>View Proyecto #<?php echo $model->idproyecto; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idproyecto',
		'name',
		'description',
		'begindate',
		'enddate',
		'manager',
		'registrationdate',
		'updatedate',
	),
)); ?>

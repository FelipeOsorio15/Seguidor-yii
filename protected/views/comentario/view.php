<?php
/* @var $this ComentarioController */
/* @var $model Comentario */

$this->breadcrumbs=array(
	'Comentarios'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Comentario', 'url'=>array('index','id'=>$model->idactividad)),
	array('label'=>'Create Comentario', 'url'=>array('create','id'=>$model->idactividad  )),
	array('label'=>'Update Comentario', 'url'=>array('update', 'id'=>$model->idcomentario)),
	array('label'=>'Delete Comentario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idcomentario),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View Comentario #<?php echo $model->idcomentario; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idcomentario',
		'name',
		'description',
		'registrationdate',
		'idactividad',
	),
)); ?>

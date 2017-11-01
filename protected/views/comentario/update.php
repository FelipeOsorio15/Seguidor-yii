<?php
/* @var $this ComentarioController */
/* @var $model Comentario */

$this->breadcrumbs=array(
	'Comentarios'=>array('index'),
	$model->name=>array('view','id'=>$model->idcomentario),
	'Update',
);

$this->menu=array(
	array('label'=>'List Comentario', 'url'=>array('index')),
	array('label'=>'Create Comentario', 'url'=>array('create')),
	array('label'=>'View Comentario', 'url'=>array('view', 'id'=>$model->idcomentario)),
	
);
?>

<h1>Update Comentario <?php echo $model->idcomentario; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */

$this->breadcrumbs=array(
	'Proyectos'=>array('index'),
	$model->name=>array('view','id'=>$model->idproyecto),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista de Proyectos', 'url'=>array('index')),
	array('label'=>'Crear Proyecto', 'url'=>array('create')),
	array('label'=>'Vista de Proyecto', 'url'=>array('view', 'id'=>$model->idproyecto)),
	array('label'=>'Administrar Proyecto', 'url'=>array('admin')),
);
?>

<h1>Update Proyecto <?php echo $model->idproyecto; ?></h1>
<?php
if (Yii::app()->User->id ==$model->manager) {
?>
<?php $this->renderPartial('_form', array('model'=>$model));
} else {
	$this->renderPartial('view', array('model'=>$model));
}
?>
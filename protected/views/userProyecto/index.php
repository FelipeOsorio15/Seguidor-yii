<?php
/* @var $this UserProyectoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Proyectos',
);

$this->menu=array(
	array('label'=>'Create UserProyecto', 'url'=>array('create')),
	array('label'=>'Manage UserProyecto', 'url'=>array('admin')),
);
?>

<h1>User Proyectos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

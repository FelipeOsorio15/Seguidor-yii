<?php
/* @var $this ProyectoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Proyectos',
);

$this->menu=array(
	array('label'=>'Create Proyecto', 'url'=>array('create')),
	array('label'=>'Manage Proyecto', 'url'=>array('admin')),
	 array('label' =>'Informacion Personal' , 'url' => array('user/index')),
);
?>

<h1>Proyectos</h1>
<h2>Proyectos Donde soy Gerente</h2>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,

	'itemView'=>'_view',
)); ?>


<?php
/* @var $this ComentarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Comentarios',
);

$this->menu=array(
	array('label'=>'Create Comentario', 'url'=>array('create','id' =>$_GET['id'])),
	//array('label'=>'Manage Comentario', 'url'=>array('admin','id' =>$_GET['id'])),
);
?>

<h1>Comentarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

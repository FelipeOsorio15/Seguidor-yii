<?php
/* @var $this ActividadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Actividads',
);

$this->menu=array(
	array('label'=>'Create Actividad', 'url'=>array('create' ,'id' =>$_GET['id'] )),
	array('label'=>'Invitar Participante', 'url'=>array('userProyecto/create' ,'id' =>$_GET['id'] )),
	//array('label'=>'Manage Actividad', 'url'=>array('admin')),
);
?>

<h1>Actividads</h1>

<?php 
//$form->hiddenField($model,'idproyecto',array('type' =>"hidden" , "value" =>$_GET['id'] ));  
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

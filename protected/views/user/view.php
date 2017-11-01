<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->iduser)),
	
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->iduser; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'iduser',
		'name',
		'lastname',
		'docid',
		'username',
		'password',
		'email',
		'photo',
	),
)); ?>

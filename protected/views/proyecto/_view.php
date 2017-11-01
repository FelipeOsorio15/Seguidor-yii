<?php
/* @var $this ProyectoController */
/* @var $data Proyecto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idproyecto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idproyecto), array('actividad/index', 'id'=>$data->idproyecto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('updatedate')); ?>:</b>
	<?php echo CHtml::encode($data->updatedate); ?>
	<br />

	*/ ?>

</div>
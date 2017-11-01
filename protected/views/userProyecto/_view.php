<?php
/* @var $this UserProyectoController */
/* @var $data UserProyecto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('iduser')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->iduser), array('view', 'id'=>$data->iduser)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('confirmado')); ?>:</b>
	<?php echo CHtml::encode($data->confirmado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idproyecto')); ?>:</b>
	<?php echo CHtml::encode($data->idproyecto); ?>
	<br />


</div>
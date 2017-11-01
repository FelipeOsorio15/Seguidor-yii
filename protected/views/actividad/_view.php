<?php
/* @var $this ActividadController */
/* @var $data Actividad */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idactividad')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idactividad), array('comentario/index', 'id'=>$data->idactividad)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />


	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('idproyecto')); ?>:</b>
	<?php echo CHtml::encode($data->idproyecto); ?>
	<br />

	*/ ?>

</div>
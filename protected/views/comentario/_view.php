<?php
/* @var $this ComentarioController */
/* @var $data Comentario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcomentario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idcomentario), array('view', 'id'=>$data->idcomentario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	

</div>
<?php
/* @var $this UserProyectoController */
/* @var $model UserProyecto */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'iduser'); ?>
		<?php echo $form->textField($model,'iduser'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'confirmado'); ?>
		<?php echo $form->textField($model,'confirmado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idproyecto'); ?>
		<?php echo $form->textField($model,'idproyecto'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
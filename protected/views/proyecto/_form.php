<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'proyecto-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'begindate'); ?>
		<?php
 if ($model->begindate!='') {
 $model->begindate=date('d-m-Y',strtotime($model->begindate));
 }
 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
 'model'=>$model,
 'attribute'=>'begindate',
 'value'=>$model->begindate,
 'language' => 'es',
 'htmlOptions' => array('readonly'=>"readonly"),
 
 'options'=>array(
 'autoSize'=>true,
 'defaultDate'=>$model->begindate,
 'dateFormat'=>'yy-mm-dd',
 'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.png',
 'buttonImageOnly'=>true,
 'buttonText'=>'Fecha',
 'selectOtherMonths'=>true,
 'showAnim'=>'slide',
 'showButtonPanel'=>true,
 'showOn'=>'button',
 'showOtherMonths'=>true,
 'changeMonth' => 'true',
 'changeYear' => 'true',
 'minDate'=> 'date("Y-m-d")',
 "maxDate"=> "+20Y",
 ),
 )); ?>
		<?php echo $form->error($model,'begindate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enddate'); ?>
		<?php 
        if ($model->enddate!='') {
 $model->enddate=date('d-m-Y',strtotime($model->enddate));
 }
 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
 'model'=>$model,
 'attribute'=>'enddate',
 'value'=>$model->enddate,
 'language' => 'es',
 'htmlOptions' => array('readonly'=>"readonly"),
 
 'options'=>array(
 'autoSize'=>true,
 'defaultDate'=>$model->enddate,
 'dateFormat'=>'yy-mm-dd',
 'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.png',
 'buttonImageOnly'=>true,
 'buttonText'=>'Fecha',
 'selectOtherMonths'=>true,
 'showAnim'=>'slide',
 'showButtonPanel'=>true,
 'showOn'=>'button',
 'showOtherMonths'=>true,
 'changeMonth' => 'true',
 'changeYear' => 'true',
 'minDate'=> 'date("Y-m-d")',
 "maxDate"=> "+20Y",
 ),
 ));
		


		 ?>
		<?php echo $form->error($model,'enddate'); ?>
	</div>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
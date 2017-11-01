<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Bienvenido A  Seguimiento de Proyectos</h1>



<p>La Aplicación te permitirá llevar un seguimiento inteligente de tus proyectos y 
	sus actividades , asi como en los que participas</p>



<?php 
 if(Yii::app()->user->isGuest){ ?>
 <h2>Registrate</h2>
 <?php
echo CHtml::link('Registrate Ya',array('user/create'));
} 

?>

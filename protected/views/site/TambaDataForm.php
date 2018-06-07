<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Form Tambah Data';
$this->breadcrumbs=array(
	'Contact',
);
?>

<h1>Form Tambah Data</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tambahdata-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama'); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat'); ?>
		<?php echo $form->textArea($model,'alamat',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'alamat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'domisili'); ?>
		<?php echo $form->textField($model,'domisili'); ?>
		<?php echo $form->error($model,'domisili'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kode_pos'); ?>
		<?php echo $form->textField($model,'kode_pos'); ?>
		<?php echo $form->error($model,'kode_pos'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>
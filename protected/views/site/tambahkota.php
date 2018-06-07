<div class="form">
	<h2>Tambah Kota</h2>
	

<?php $form=$this->beginWidget('CActiveForm'); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model, 'Nama Kota'); ?>
		<?php echo $form->TextField($model, "nama_kota", ""); ?>
		<?php echo $form->error($model,'nama_kota'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::submitButton($model->isNewRecord? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>
</div>
<div class="form">
	<h2>Tambah Pegawai</h2>
	

<?php $form=$this->beginWidget('CActiveForm'); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model, 'nama'); ?>
		<?php echo $form->TextField($model, "nama", ""); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'email'); ?>
		<?php echo $form->TextField($model, "email", ""); ?>
		<?php echo $form->error($model,'email'); ?>		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'alamat'); ?>
		<?php echo $form->TextField($model, "alamat", ""); ?>
		<?php echo $form->error($model,'alamat'); ?>	
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'Kota'); ?>
		<?php echo $form->dropDownList($model,'domisili',CHtml::listData(Kota::model()->findAll(),'id','nama_kota')); ?>
		<?php echo $form->error($model,'nama_kota'); ?>	
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'kode_pos'); ?>
		<?php echo $form->TextField($model, "kode_pos", ""); ?>
		<?php echo $form->error($model,'kode_pos'); ?>	
	</div>

	<div class="row">
		<?php echo CHtml::submitButton($model->isNewRecord? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?> 
	
</div>
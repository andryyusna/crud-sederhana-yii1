<?php
	$this->pageTitle=Yii::app()->name . ' - Kota';
	$this->breadcrumbs=array(
		'Kota',
	);
?>

<div class="sub-content">
	<h3>Data Kota</h3>
	<?php
	foreach(Yii::app()->user->getFlashes() as $key => $val)
		{
			echo "
				<div class = '$key' id = '$key'>$val</div>
			";
		}
	?>

	<div>
		<?php echo CHtml::link('Tambah Kota' , array('kota/tambahkota')); ?>
	</div>
	
	<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=> 'kota-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
				'nama_kota',
				array(
					'class'=>'CButtonColumn',
					'template' => '{edit}{hapus}',
					'buttons' => array(
						'edit' => array(
							'url' => function($data) {
								return Yii::app()->createUrl('kota/editkota', array('kota' => $data->id));
							}
							// 'imageUrl' => Yii::app()->baseUrl."/images/pen.ico",
						),
						'hapus' => array(
							'url' => function($data) {
								return Yii::app()->createUrl('kota/hapuskota', array('kota' => $data->id));
							},
							'imageUrl' => Yii::app()->baseUrl."/images/delete.png",
							'options' => array('onclick' => 'return confirm("Anda yakin menghapus data ini ?")')
							)
						)
					),
				),
			)); ?>
</div>
<?php
	$this->pageTitle=Yii::app()->name . ' - Pegawai';
	$this->breadcrumbs=array(
		'Pegawai',
	);
?>

<div class="sub-content">
	<h3>Data Pegawai</h3>
	<?php
	foreach(Yii::app()->user->getFlashes() as $key => $val)
		{
			echo "
				<div class = '$key' id = '$key'>$val</div>
			";
		}
	?>

	<div>
		<?php echo CHtml::link('Tambah Pegawai' , array('site/tambahpegawai')); ?>
	</div>
	
	<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=> 'pegawai-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
				'nama',
				'email',
				'kode_pos',
				array(
					'name' => 'domisili',
					'value' => function($data) {
						return $data->kota->nama_kota;
					}
				),
				array(
				'class'=>'CButtonColumn',
				'template' => '{edit}{hapus}',
				'buttons' => array(
					'edit' => array(
						'url' => function($data) {
							return Yii::app()->createUrl('site/editpegawai', array('pegawai' => $data->id));
						}
						// 'imageUrl' => Yii::app()->baseUrl."/images/pen.ico",
					),
					'hapus' => array(
						'url' => function($data) {
							return Yii::app()->createUrl('site/hapuspegawai', array('pegawai' => $data->id));
						},
						'imageUrl' => Yii::app()->baseUrl."/images/delete.png",
						'options' => array('onclick' => 'return confirm("Anda yakin menghapus data ini ?")')
						)
					)
				),
			),
		)); ?>
</div>
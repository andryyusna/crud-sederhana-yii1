<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Alamat</th>
				<th>Domisili</th>
				<th>Kode Pos</th>
				<th>Aksi </th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $model) : ?>
			<tr>
				<td><?php echo $model->id; ?></td>
				<td><?php echo $model->nama; ?></td>
				<td><?php echo $model->email; ?></td>
				<td><?php echo $model->alamat; ?></td>
				<td><?php echo $model->kota->nama_kota; ?></td>
				<td><?php echo $model->kode_pos; ?></td>
				<td>
					<?php echo CHtml::link(CHtml::encode("Edit"), array('editpegawai','pegawai' => $model->id));?> ||
					<?php echo CHtml::link(CHtml::encode("Delete"), array('hapuspegawai','pegawai' => $model->id,
					array('option' => array('onclick' => 'return confirm("Anda yakin menghapus data ini?")'),)
				)
			);?>
		</td>
		
	</tr>
		<?php endforeach; ?>
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=> 'pegawai-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
				'id',
				'nama',
				'email',
				'domisili',
				'kode_pos',
				array(
					'id' => 'id',
					'value' => function($data) {
						return $data->kota->nama_kota;
					}
				),
				array(
				'class'=>'CButtonColumn',
				'template' => '{update}{hapus}',
				'buttons' => array(
					'update' => array('editpegawai','pegawai' => $model->id)
				),
				'buttons' => array(
				'hapus' => array('hapuspegawai','pegawai' => $model->id,
					'imageUrl' => Yii::app()->baseUrl."/images/delete.png",
					'options' => array('onclick' => 'return confirm("Anda yakin menghapus data ini ?")')
						)
					)
				)
			),
				
		
		)); ?>
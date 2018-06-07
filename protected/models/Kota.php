<?php 

class Kota extends CActiveRecord {
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'tb_kota';
	}

	public function rules() {
		return array(
			array('nama_kota', 'match','pattern' => '/^[^0-9]+$/', 'message' => '{attribute} hanya bisa diisi alphabet'),
			array('nama_kota','length','max'=>30),
			array('nama_kota','required'),
			array('id, nama_kota, create_at, updated_at','safe', 'on' => 'search'),
		);
	}

	public function beforeSave() {
		if ($this->isNewRecord)
			$this->created_at = new CDbExpression('NOW()');
		else
			$this->updated_at = new CDbExpression('NOW()');
			
		return parent::beforeSave();
	}

	public function attributeLabels() {
		return array(
			'id'   		=> 'id',
			'nama_kota'	=> 'Nama Kota',	
			'created_at'	=> 'created_at',
			'updated_at'=> 'updated_at'
		);
	}

	public function relations() {
		return array(
				'Kota' => array(self::HAS_MANY, 'Kota','id')
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nama_kota',$this->nama_kota,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

}
?>

<?php 

class Pegawai extends CActiveRecord {
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'tb_pegawai';
	}
	
	public function getKota()
	{
    	return $this->hasOne(tb_kota::className(), ['id' => 'id']);
	}

	public function rules() {
		return array(
			array('nama','length','max'=>30),
			array('email', 'email'),
			array('nama, email, alamat, domisili, kode_pos', 'required'),
			array('kode_pos','length','max'=>6),
 			array('kode_pos', 'numerical', 'integerOnly'=>true),
			array('nama, email, alamat, domisili, kode_pos, created_at, updated_at','safe', 'on' => 'search'),
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
			'nama' 		=> 'nama',
			'email'		=> 'email',
			'alamat'	=> 'alamat',
			'domisili'	=> 'domisili',
			'kode_pos'	=> 'Kode Pos',
			'created_at'	=> 'created_at',
			'updated_at'=> 'updated_at',
		);
	}

	public function relations() {
		return array(
			'kota' => array(self::BELONGS_TO, 'Kota', array('domisili' => 'id'))
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('domisili',$this->domisili,true);
		$criteria->compare('kode_pos',$this->kode_pos,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
?>

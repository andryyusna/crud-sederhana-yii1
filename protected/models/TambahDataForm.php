<?php 

/**
* class tambah data baru
*/
class TambahDataForm extends CFormModel
{
	public $nama;
	public $email;
	public $alamat;
	public $domisili;
	public $kode_pos;

	/**
	 * Declares the validation rules
	 */
	
	public function rules()
	{
		return array(
		//nama, email, alamat, domisili dan kode pos wajib diisi
		array('nama, email, alamat, domisili, kode_pos','required'),
		//email harus dalam format yang valid
		array('email', 'email'),
		//kode_pos harus number
		array('kode_pos', 'number'),
		);
	}
}
 ?>
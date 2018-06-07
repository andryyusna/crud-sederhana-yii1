<?php 

class PegawaiController extends Controller
{

    public function actionPegawai() {
        $data = new Pegawai('search');
        if(isset($_GET['Pegawai']))
        	$data->attributes = $_GET['Pegawai'];
        $this->render('pegawai', array(
        	'model' => $data));
    }

    public function actionTambahPegawai(){
    	$modelPegawai = new Pegawai;
    	if(isset($_POST['Pegawai'])) {
    		$modelPegawai->nama 		= $_POST['Pegawai']['nama'];
    		$modelPegawai->email 		= $_POST['Pegawai']['email'];
    		$modelPegawai->alamat		= $_POST['Pegawai']['alamat'];
    		$modelPegawai->domisili		= $_POST['Pegawai']['domisili'];
    		$modelPegawai->kode_pos		= $_POST['Pegawai']['kode_pos'];
    		if($modelPegawai->save()){
    			Yii::app()->user->setFlash('success' , 'Data telah disimpan!');
    			$this->redirect(array('Pegawai'));
    		}
    	}
    	$this->render('tambahpegawai', array('model' => $modelPegawai));
    }

    public function actionEditpegawai($pegawai) {
    	$modelPegawai = Pegawai::model()->findByPk($pegawai);
    	if(isset($_POST['Pegawai'])) {
    		$modelPegawai->nama 		= $_POST['Pegawai']['nama'];
    		$modelPegawai->email 		= $_POST['Pegawai']['email'];
    		$modelPegawai->alamat		= $_POST['Pegawai']['alamat'];
    		$modelPegawai->domisili		= $_POST['Pegawai']['domisili'];
    		$modelPegawai->kode_pos		= $_POST['Pegawai']['kode_pos'];
    		if($modelPegawai->save()) {
    			Yii::app()->user->setFlash('success' , 'Data telah diedit!');
    			$this->redirect(array('Pegawai'));
    		}
    	}
    	$this->render('editpegawai', array('model' => $modelPegawai));
    }

    public function actionHapuspegawai($pegawai) {
    	if(Pegawai::model()->deleteByPk($pegawai)) {
    		Yii::app()->user->setFlash('success' , 'Data telah dihapus!');
    		$this->redirect(array('pegawai'));
    	} else {
    		throw new CHttpException(404, 'Data gagal dihapus');
    	}
    }
}

?>
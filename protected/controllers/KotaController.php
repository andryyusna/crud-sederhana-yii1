<?php 

class KotaController extends Controller 
{

	public function actionKota() {
        $data = new Kota('search');
        if(isset($_GET['Kota']))
        $data->attributes = $_GET['Kota'];
        $this->render('kota', array(
            'model' => $data));
    }

    public function actionTambahKota(){
    	$modelKota = new Kota;
    	if(isset($_POST['Kota'])) {
    		$modelKota->nama_kota 	= $_POST['Kota']['nama_kota'];
    		if($modelKota->save()){
    			$this->redirect(array('Kota'));
    		}
    	}
    	$this->render('tambahkota', array('model' => $modelKota));
    }

    public function actionEditKota($kota) {
    	$modelKota = Kota::model()->findByPk($kota);
    	if(isset($_POST['Kota'])) {
    		$modelKota->nama_kota 	= $_POST['Kota']['nama_kota'];
    		if($modelKota->save()) {
    			$this->redirect(array('Kota'));
    		}
    	}
    	$this->render('editkota', array('model' => $modelKota));
    }

    public function actionHapusKota($kota) {
    	if(Kota::model()->deleteByPk($kota)) {
    		$this->redirect(array('kota'));
    	} else {
    		throw new CHttpException(404, 'Data gagal dihapus');
    	}
    }

}
 

 ?>
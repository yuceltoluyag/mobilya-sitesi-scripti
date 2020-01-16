<?php 


require_once '../sistem/fonksiyon.php';


if ($_POST) {

    $urid    = post('uid');
	$adsoyad = post('adsoyad');
	$eposta  = post('eposta');
	$telno   = post('telno');
	$mesaj   = post('mesaj');



	if (!$adsoyad || !$eposta || !$telno || !$mesaj){

		echo 'bos';

	}else {

		$sekle = $db->prepare('INSERT INTO siparisler SET
            
			s_adsoy  =:sad,
			s_eposta =:sap,
			s_tel    =:stel,
			s_mesaj  =:sem,
			s_urunid =:sid

			');

		$sekle->execute(array(

			':sad' => $adsoyad,
			':sap' => $eposta,
			':stel'=> $telno,
			':sem' => $mesaj,
			':sid' => $urid
			));



		if ($sekle) {

			echo 'ok';

		} else {

			echo 'hata';
		}
	}
}	else {

	header('Location:../index.php');
}








?>
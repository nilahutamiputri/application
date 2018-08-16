<?php
	require '../Database.php';
	$db = new Database('localhost','root','');
	$data['id_sewa'] = $_POST['id_sewa'];
	$data['tgl_selesai'] = $_POST['tgl_selesai'];
	$acc = $db->accPerpanjang($data);
	//var_dump($data);
?>
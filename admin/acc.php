<?php
	require '../Database.php';
	$db = new Database('localhost','root','');
	$id_sewa = $_GET['id'];
	$booking = $db->accBooking($id_sewa);
	$acc = $db->accSewa($booking);
	//var_dump($booking);
?>
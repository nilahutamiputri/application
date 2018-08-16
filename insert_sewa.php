<?php
require 'Database.php';
$db = new Database('localhost','root','');
$nama = $_POST['nama'];
$noktp = $_POST['ktp'];
$jenis = $_POST['jenis'];
$warna = $_POST['warna'];
$platno = $_POST['platno'];
$harga = $_POST['harga'];
$tgl_masuk = $_POST['tgl_masuk'];
$tgl_selesai = $_POST['tgl_selesai'];
echo "$nama $noktp $jenis $warna $platno $harga $tgl_masuk $tgl_selesai";
$input = $db->inputSewa($nama,$noktp,$jenis,$platno,$warna,$harga,$tgl_masuk,$tgl_selesai);
?>
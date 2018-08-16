<!DOCTYPE html>
<html>
<head>
	<?php require 'header.php';?>
	<?php require 'Database.php';?>
</head>
<body>
<?php require 'navbar.php';?>
<h3 align="center">DAFTAR MOBIL</h3>
<?php
	$db = new Database('localhost','root','');
	$mobil = $db->tampilMobil();
?>
<div class="container">
	<div class="row">
		<?php
			foreach ($mobil as $x) {
				$harga = number_format($x['harga'],0,",","."); //format harga
		?>
		<div class="col s12 m6 l3 productbox">
			<img class="thumbnail" src="assets/img/<?php echo $x['nama_file'];?>"> <!-- gambar-->
    		<div class="producttitle"><?php echo $x['jenis'];?></div> <!-- jenis-->
    		<div class="productprice"><div class="pull-right"><a href="input_sewa.php?platno=<?php echo $x['platno']?>" class="btn-sm" role="button">SEWA</a></div><div class="pricetext">Rp <?php echo $harga;?></div></div> <!-- method get-->
		</div>
		<?php }?>
	</div>
</div>
	<?php require 'script.php';?>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<?php require 'header.php';?>
	<?php require 'Database.php';?>
</head>
<body>
<?php require 'navbar.php';?>
<?php
	session_start();
	$db = new Database('localhost','root','');
	$platno = $_GET['platno'];
	$mobil = $db->getMobil($platno);
	foreach ($mobil as $z) {
		$jenis = $z['jenis'];
		$warna = $z['warna'];
		$nama_file = $z['nama_file'];
		$harga=$z['harga'];
	}
?>
<h4 align="center">Mobil <?php echo "$platno";?></h4>

<?php
	$sewa = $db->tampilSewa($platno);
	$tgl_dipakai = array();
	foreach ($sewa as $x) {
		$mulai = $x['tgl_masuk'];
		$selesai = $x['tgl_selesai'];
		$rd = $db->RangeDate($mulai,$selesai);
		foreach ($rd as $y) {
			array_push($tgl_dipakai, $y);
		}
		$_SESSION['tgl_dipakai'] = $tgl_dipakai;
	}
?>
<div class="container">
	<div class="row">
	<?php
		if (isset($_GET['stat'])) {
			switch ($_GET['stat']) {
				case 'gagal':
					echo '
						<div class="col s12">
			<div class="card-panel" style="text-align:center;background-color:#c55762;color:#FFF;">Maaf tanggal yang anda minta sudah digunakan.</div>
		</div>
					';
					break;
			}
		}
	?>
		<div class="col s6" style="text-align: center; margin-bottom: 20px;">
			<img class="img-responsive" src="assets/img/<?php echo $nama_file;?>">
		</div>
		
		<div class="col s6" style="text-align: center; margin-bottom: 20px;">
			<div id="glob-data" data-toggle="calendar"></div>
		</div>
	<form class="col s12" method="POST" action="input_sewa_db.php">
      <div class="row">
      <input type="hidden" class="validate" name="platno" value="<?php echo $platno;?>">
      <input type="hidden" class="validate" name="harga" value="<?php echo $harga;?>">
        <div class="input-field col s6">
          <input type="date" class="datepicker" name="tgl_masuk">
          <label>Tanggal Masuk</label>
        </div>
        <div class="input-field col s6">
          <input type="date" class="datepicker" name="tgl_selesai">
          <label>Tanggal Selesai</label>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
    		<i class="material-icons right">send</i>
  		</button>
      </div>
    </form>
	</div>
	<!-- <?php var_dump($tgl_dipakai);?> -->
</div>
	<?php require 'script.php';?>
	<script type="text/javascript">
    $(document).ready(function()
    {
      $('#glob-data').calendar(
      {
        unavailable: <?php echo json_encode($tgl_dipakai);?> 
      });
    });
    $(document).ready(function() {
    Materialize.updateTextFields();
  });
     $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
    </script>
</body>
</html>
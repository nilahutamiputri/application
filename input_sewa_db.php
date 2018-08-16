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
	$platno = $_POST['platno'];
	$harga = $_POST['harga'];
	$vartgl_masuk = $_POST['tgl_masuk'];
	$vartgl_selesai = $_POST['tgl_selesai'];
	$tgl_masuk = date("Y-m-d",strtotime($vartgl_masuk));
	$tgl_selesai = date("Y-m-d",strtotime($vartgl_selesai));
  
  $sewa = $db->tampilSewa($platno);
  $tgl_dipakai = array();
  foreach ($sewa as $x) {
    $mulai = $x['tgl_masuk'];
    $selesai = $x['tgl_selesai'];
    $rd = $db->RangeDate($mulai,$selesai);
    foreach ($rd as $y) {
      array_push($tgl_dipakai, $y);
    }
  }
  foreach ($tgl_dipakai as $data) {
    if ($tgl_masuk == $data || $tgl_selesai == $data) {
      header("location:input_sewa.php?stat=gagal&platno=$platno");
    }
  }

	$mobil = $db->getMobil($platno);
	foreach ($mobil as $z) {
		$jenis = $z['jenis'];
		$warna = $z['warna'];
		$nama_file = $z['nama_file'];
	}
	$total = 0;
	$rd = $db->RangeDate($tgl_masuk,$tgl_selesai);
		foreach ($rd as $y) {
			$total = $total+$harga;
		}

	$formatharga = number_format($total,0,",",".");
?>
<h4 align="center">Mobil <?php echo "$platno";?></h4>
<div class="container">
	<div class="row">
	<form class="col s12" method="POST" action="insert_sewa.php">
      <div class="row">
        <div class="input-field col s6">
          <input type="text" class="validate" name="nama">
          <label>Nama</label>
        </div>
        <div class="input-field col s6">
          <input type="text" class="validate" name="ktp">
          <label>No. KTP</label>
        </div>
        <div class="input-field col s6">
          <input type="text" class="validate" value="<?php echo $platno;?>" disabled> <!-- untuk menampilkan value(data) -->
          <input type="hidden" class="validate" name="platno" value="<?php echo $platno;?>"> <!-- untuk mengantar data ke POST -->
          <label>Plat Nomor Mobil</label>
        </div>
        <div class="input-field col s6">
          <input type="text" class="validate" value="<?php echo $jenis;?>" disabled> <!-- untuk menampilkan value(data) -->
          <input type="hidden" class="validate" name="jenis" value="<?php echo $jenis;?>"> <!-- untuk mengantar data ke POST -->
          <label>Jenis Mobil</label>
        </div>
        <div class="input-field col s6">
          <input type="text" class="validate" value="<?php echo $warna;?>" disabled> <!-- untuk menampilkan value(data) -->
          <input type="hidden" class="validate" name="warna" value="<?php echo $warna;?>"> <!-- untuk mengantar data ke POST -->
          <label>Warna</label>
        </div>
        <div class="input-field col s6">
          <input type="text" class="validate" value="Rp <?php echo $formatharga;?>" disabled> <!-- untuk menampilkan value(data) -->
          <input type="hidden" class="validate" name="harga" value="<?php echo $total;?>"> <!-- untuk mengantar data ke POST -->
          <label>Harga Sewa</label>
        </div>
        <div class="input-field col s6">
          <input type="text" class="validate" value="<?php echo $tgl_masuk;?>" disabled> <!-- untuk menampilkan value(data) -->
          <input type="hidden" class="validate" name="tgl_masuk" value="<?php echo $tgl_masuk;?>"> <!-- untuk mengantar data ke POST -->
          <label>Tanggal Masuk</label>
        </div>
        <div class="input-field col s6">
          <input type="text" class="validate" value="<?php echo $tgl_selesai;?>" disabled> <!-- untuk menampilkan value(data) -->
          <input type="hidden" class="validate" name="tgl_selesai" value="<?php echo $tgl_selesai;?>"> <!-- untuk mengantar data ke POST-->
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
<!DOCTYPE html>
<html>
<head>
	 <?php require 'header.php';?>
	 <?php require '../Database.php';?>
	 <?php
	 	session_start();
	 	if (!isset($_SESSION['username'])) {
	 		header("location:index.php");
	 	}
	 ?>
</head>
<body>
<?php require 'navbar.php';?>
<?php
	$db = new Database('localhost','root','');
	$booking = $db->booking();
	$i=1;
?>
 <table class="highlight responsive-table">
        <thead>
          <tr>
              <th>Nama Lengkap</th>
              <th>Nomor KTP</th>
              <th>Plat Nomor</th>
              <th>Jenis</th>
              <th>Warna</th>
              <th>Tanggal Masuk</th>
              <th>Tanggal Selesai</th>
              <th>Total Bayar</th>
              <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
        <?php
        	foreach ($booking as $x) {
        		$formatharga = number_format($x['harga'],0,",",".");
        		$tgl_masuk = date("d F Y",strtotime($x['tgl_masuk']));
				$tgl_selesai = date("d F Y",strtotime($x['tgl_selesai']));
        ?>
          <tr>
            <td><?php echo $x['nama'];?></td>
            <td><?php echo $x['noktp'];?></td>
            <td><?php echo $x['platno'];?></td>
            <td><?php echo $x['jenis'];?></td>
            <td><?php echo $x['warna'];?></td>
            <td><?php echo $tgl_masuk;?></td>
            <td><?php echo $tgl_selesai;?></td>
            <td><b>Rp <?php echo $formatharga;?>,-</b></td>
            <td>
            	<a class="waves-effect waves-light btn" href="#modal<?php echo $i;?>">Terima</a>

  				<!-- Modal Structure -->
  				<div id="modal<?php echo $i;?>" class="modal">
			    <div class="modal-content">
			      <h4>Apakah anda yakin?</h4>
			      <b>
			      <table class="centered">
			      	<tr>
			      		<td>Nama</td>
			      		<td>:</td>
			      		<td><?php echo $x['nama'];?></td>
			      	</tr>
			      	<tr>
			      		<td>Nomor KTP</td>
			      		<td>:</td>
			      		<td><?php echo $x['noktp'];?></td>
			      	</tr>
			      	<tr>
			      		<td>Plat Nomor</td>
			      		<td>:</td>
			      		<td><?php echo $x['platno'];?></td>
			      	</tr>
			      	<tr>
			      		<td>Harga</td>
			      		<td>:</td>
			      		<td>Rp <?php echo $formatharga;?>,-</td>
			      	</tr>
			      </table>
			      </b>
			    </div>
			    <div class="modal-footer">
			      <a href="acc.php?id=<?php echo $x['id_sewa'];?>" class="modal-action modal-close waves-effect waves-green btn-flat btn-sm">OK</a>
			    </div>
			  </div>
            </td>
          </tr>
         <?php 
         	$i++;
         }?>
        </tbody>
      </table>
<?php require 'script.php';?>
<script type="text/javascript">
	$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
</script>
</body>
</html>
<?php 
class Database{
	private $host;
	private $username;
	private $password;
	private $db;

	public function __construct($host, $username, $password){
		$this->db = new mysqli($host, $username, $password, "newmoobil");
	}
//==============================Date==============================================
	function RangeDate($strDateFrom,$strDateTo){ //mengambil tanggal masuk sampai tanggal keluar
    	// takes two dates formatted as YYYY-MM-DD and creates an
    	// inclusive array of the dates between the from and to dates.

    	// could test validity of dates here but I'm already doing
    	// that in the main script

    	$aryRange=array();

    	$iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2),     substr($strDateFrom,8,2),substr($strDateFrom,0,4));
    	$iDateTo=mktime(1,0,0,substr($strDateTo,5,2),     substr($strDateTo,8,2),substr($strDateTo,0,4));

    	if ($iDateTo>=$iDateFrom){    	    array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry

    	    while ($iDateFrom<$iDateTo)
    	    {
    	        $iDateFrom+=86400; // add 24 hours
    	        array_push($aryRange,date('Y-m-d',$iDateFrom));
    	    }
    	}
    	return $aryRange; 
	}
	//=================================================MOBIL============================================

	public function tampilMobil(){
		$data = array();
		$sql = "SELECT * FROM `mobil`"; //mengambil semua atribut dari table mobil
		$query = $this->db->query($sql);
		while($pecah = mysqli_fetch_array($query, MYSQLI_ASSOC)){
			$data[] = $pecah;
		}
		return $data;
	}

	public function getMobil($platno){
		$data = array();
		$sql = "SELECT * FROM `mobil` WHERE platno = '$platno'"; //mengambil semua atribut dari table mobil ketika parameter platno = platno
		$query = $this->db->query($sql);
		while($pecah = mysqli_fetch_array($query, MYSQLI_ASSOC)){
			$data[] = $pecah;
		}
		return $data;
	}

	public function tampilSewa($platno){
		$data = array();
		$sql = "SELECT * FROM `sewa` WHERE platno = '$platno'";
		$query = $this->db->query($sql);
		while($pecah = mysqli_fetch_array($query, MYSQLI_ASSOC)){
			$data[] = $pecah;
		}
		return $data;		
	}

	//=====================================================================================================


	//================================================USER=================================================



	public function login($username, $password){
		$data = array();
		$sql = "SELECT * FROM `admin` WHERE username = '$username' AND password = '$password'";
		$query = $this->db->query($sql);
		while($pecah = mysqli_fetch_array($query, MYSQLI_ASSOC)){
			$data[] = $pecah;
		}
		return $data;
	}
	//=====================================================================================================
	






	//=================================================SEWA================================================

	public function inputSewa($nama,$noktp,$jenis,$platno,$warna,$harga,$tgl_masuk,$tgl_selesai){
		$sql="INSERT INTO `booking`(`nama`, `noktp`, `jenis`, `warna`, `harga`, `platno`, `tgl_masuk`, `tgl_selesai`, `status`) VALUES ('$nama','$noktp','$jenis','$warna',$harga,'$platno','$tgl_masuk','$tgl_selesai','NO')";
		$query = $this->db->query($sql);
		header("location:input_sewa.php?platno=$platno");

	}
	public function accSewa($data){
		foreach ($data as $x) {
			$id_sewa = $x['id_sewa'];
			$nama = $x['nama'];
		    $noktp = $x['noktp'];
		    $jenis = $x['jenis'];
		    $warna = $x['warna'];
			$harga = $x['harga'];
			$platno = $x['platno'];
			$tgl_masuk = $x['tgl_masuk'];
			$tgl_selesai = $x['tgl_selesai'];	
		}
		$sql="INSERT INTO `sewa`(`nama`, `noktp`, `jenis`, `warna`, `harga`, `platno`, `tgl_masuk`, `tgl_selesai`) VALUES ('$nama','$noktp','$jenis','$warna',$harga,'$platno','$tgl_masuk','$tgl_selesai')";
		$sql2 = "UPDATE `booking` SET `status`= 'OK' WHERE id_sewa = $id_sewa";
		$query = $this->db->query($sql);
		$query2 = $this->db->query($sql2);
		header("location:dashboard.php");
	}
	public function booking(){
		$data = array();
		$sql = "SELECT * FROM booking WHERE status = 'NO'";
		$query = $this->db->query($sql);
		while($pecah = mysqli_fetch_array($query, MYSQLI_ASSOC)){
			$data[] = $pecah;
		}
		return $data;
	}
	public function accBooking($id_sewa){
		$data = array();
		$sql = "SELECT * FROM booking WHERE id_sewa = $id_sewa";
		$query = $this->db->query($sql);
		while($pecah = mysqli_fetch_array($query, MYSQLI_ASSOC)){
			$data[] = $pecah;
		}
		return $data;
	}

	public function dataSewa(){
		$data = array();
		$sql = "SELECT * FROM sewa";
		$query = $this->db->query($sql);
		while($pecah = mysqli_fetch_array($query, MYSQLI_ASSOC)){
			$data[] = $pecah;
		}
		return $data;
	}

	//==================================================PERPANJANGAN MOBIL==========================================================

	public function accPerpanjang($data){
		$id_sewa = $data['id_sewa'];
		$tgl_selesai = $data['tgl_selesai'];
		$sql2 = "UPDATE `sewa` SET `tgl_selesai`= '$tgl_selesai' WHERE id_sewa = $id_sewa";
		$query2 = $this->db->query($sql2);
		header("location:data_perpanjangan.php");
	}

	public function perpanjangan($id_sewa){
		$data = array();
		$sql = "SELECT * FROM sewa WHERE id_sewa = $id_sewa";
		$query = $this->db->query($sql);
		while($pecah = mysqli_fetch_array($query, MYSQLI_ASSOC)){
			$data[] = $pecah;
		}
		return $data;


}
}

?>
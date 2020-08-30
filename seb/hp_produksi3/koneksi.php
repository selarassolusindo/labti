 <?php
	$server		= "localhost"; //sesuaikan dengan nama server
	$user		= "seb"; //sesuaikan username
	$password	= "seb123456789"; //sesuaikan password
	$database	= "seb"; //sesuaikan target databese
	
	$con = new mysqli($server,$user,$password) or die ("Koneksi Gagal !!!");
	mysqli_select_db($con,$database) or die ("Database belum siap!");


?>

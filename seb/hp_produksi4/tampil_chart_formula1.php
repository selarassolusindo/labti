<?php
include 'koneksi.php';

$query = "SELECT * FROM hp_produksi where formula='formula 1' order by tanggal asc";
	$result = mysqli_query($con,$query);

	$arraydata = array();

	while($baris = mysqli_fetch_assoc($result))
	{
		$arraydata[]=$baris;
	}

	echo json_encode($arraydata);

?>
<?php 
	include_once('koneksi.php'); 


	$query = "SELECT * FROM formula where id=2";
	$result = mysqli_query($con,$query);

	$arraydata = array();

	while($baris = mysqli_fetch_assoc($result))
	{
		$arraydata[]=$baris;
	}

	echo json_encode($arraydata);

 ?>
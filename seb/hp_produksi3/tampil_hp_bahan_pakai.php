<?php 
	include_once('koneksi.php'); 


	$query = "SELECT DATE_FORMAT(tanggal, '%M') as bulan,sludge_paper,avalan_karton,avalan_gelondongan,duplek,plastik_pembungkus,tali_rafia,kayu_bakar FROM hp_bahan_dipakai where Month(tanggal) = (MONTH(CURRENT_DATE()) -1)";
	$result = mysqli_query($con,$query);

	$arraydata = array();

	while($baris = mysqli_fetch_assoc($result))
	{
		$arraydata[]=$baris;
	}

	echo json_encode($arraydata);

 ?>
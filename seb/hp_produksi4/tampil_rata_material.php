<?php 
	include_once('koneksi.php'); 

	$query = "SELECT tanggal, (sum(sludge_paper)/sum(jml_sp)) as sludgepaper, (sum(avalan_karton)/sum(jml_ak)) as avalankarton, (sum(avalan_gelondongan)/sum(jml_ag)) as avalangelondongan, (sum(duplek)/sum(jml_duplek)) as duplek, (sum(plastik_pembungkus)/sum(jml_pp)) as plastikpembungkus, (sum(tali_rafia)/sum(jml_tr)) as talirafia, (sum(kayu_bakar)/sum(jml_kb)) as kayubakar FROM material";
	$result = mysqli_query($con,$query);

	$arraydata = array();

	while($baris = mysqli_fetch_assoc($result))
	{
		$arraydata[]=$baris;
	}

	echo json_encode($arraydata);

 ?>


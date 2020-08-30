<?php 
	include_once('koneksi.php'); 


	$query = "SELECT tanggal, (sum(sludge_paper)/sum(jml_sp)) as sludgepaper, (sum(avalan_karton)/sum(jml_ak)) as avalankarton, (sum(avalan_gelondongan)/sum(jml_ag)) as avalangelondongan, (sum(duplek)/sum(jml_duplek)) as duplek, (sum(plastik_pembungkus)/sum(jml_pp)) as plastikpembungkus, (sum(tali_rafia)/sum(jml_tr)) as talirafia, (sum(kayu_bakar)/sum(jml_kb)) as kayubakar, (sum(borongan)/sum(jml_borongan)) as borongan, (sum(harian)/sum(jml_harian)) as harian, (sum(bonus)/sum(jml_bonus)) as bonus, (sum(listrik)/sum(jml_listrik)) as listrik, (sum(pemakaian_solar)/sum(jml_ps)) as pemakaiansolar, (sum(transportasi)/sum(jml_transportasi)) as transportasi, (sum(solar)/sum(jml_solar)) as solar, (sum(muatan_colt_diesel)/sum(jml_mcd)) as muatancoltdiesel FROM material where Month(tanggal) = (MONTH(CURRENT_DATE()) -1)";
	$result = mysqli_query($con,$query);

	$arraydata = array();

	while($baris = mysqli_fetch_assoc($result))
	{
		$arraydata[]=$baris;
	}

	echo json_encode($arraydata);

 ?>
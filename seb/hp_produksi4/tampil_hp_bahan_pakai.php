<?php 
	include_once('koneksi.php'); 


	$query = "SELECT tanggal, sum(sludge_paper) as sludgepaper,sum(jml_sp) as jmlsp, sum(avalan_karton) as avalankarton,sum(jml_ak)as jmlak , sum(avalan_gelondongan) as avalangelondongan,sum(jml_ag) as jmlag, sum(duplek) as duplek,sum(jml_duplek) as jmlduplek, sum(plastik_pembungkus) as plastikpembungkus,sum(jml_pp) as jmlpp, sum(tali_rafia) as talirafia,sum(jml_tr) as jmltr , sum(kayu_bakar) as kayubakar,sum(jml_kb) as jmlkb FROM hp_bahan_dipakai";
	$result = mysqli_query($con,$query);

	$arraydata = array();

	while($baris = mysqli_fetch_assoc($result))
	{
		$arraydata[]=$baris;
	}

	echo json_encode($arraydata);

 ?>
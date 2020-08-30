<?php 
	include_once "koneksi.php";

	$tahun = $_POST['tahun_bulan'];
	$bulan = $_POST['bulan'];

	$query = mysqli_query($con, "SELECT DATE_FORMAT(tanggal, '%m') AS bulan, (sum(sludge_paper)/sum(jml_sp)) as sludgepaper, (sum(avalan_karton)/sum(jml_ak)) as avalankarton, (sum(avalan_gelondongan)/sum(jml_ag)) as avalangelondongan, (sum(duplek)/sum(jml_duplek)) as duplek, (sum(plastik_pembungkus)/sum(jml_pp)) as plastikpembungkus, (sum(tali_rafia)/sum(jml_tr)) as talirafia, (sum(kayu_bakar)/sum(jml_kb)) as kayubakar, (sum(borongan)/sum(jml_borongan)) as borongan, (sum(harian)/sum(jml_harian)) as harian, (sum(bonus)/sum(jml_bonus)) as bonus, (sum(listrik)/sum(jml_listrik)) as listrik, (sum(pemakaian_solar)/sum(jml_ps)) as pemakaiansolar, (sum(transportasi)/sum(jml_transportasi)) as transportasi, (sum(solar)/sum(jml_solar)) as solar, (sum(muatan_colt_diesel)/sum(jml_mcd)) as muatancoltdiesel FROM material where (year(tanggal)= '$tahun' AND month(tanggal) = '$bulan') group by month(tanggal)");

	$num_rows = mysqli_num_rows($query);

	if ($num_rows > 0){
		$json = '{"value":1, "results": [';

		while ($row = mysqli_fetch_array($query)){
			$char ='"';

			$json .= '{
				"bulan": "'.str_replace($char,'`',strip_tags($row['bulan'])).'", 
				"sludgepaper": "'.str_replace($char,'`',strip_tags($row['sludgepaper'])).'", 
				"avalankarton": "'.str_replace($char,'`',strip_tags($row['avalankarton'])).'",
				"avalangelondongan": "'.str_replace($char,'`',strip_tags($row['avalangelondongan'])).'", 
				"duplek": "'.str_replace($char,'`',strip_tags($row['duplek'])).'",
				"plastikpembungkus": "'.str_replace($char,'`',strip_tags($row['plastikpembungkus'])).'", 
				"talirafia": "'.str_replace($char,'`',strip_tags($row['talirafia'])).'",
				"kayubakar": "'.str_replace($char,'`',strip_tags($row['kayubakar'])).'", 
				"borongan": "'.str_replace($char,'`',strip_tags($row['borongan'])).'",
				"harian": "'.str_replace($char,'`',strip_tags($row['harian'])).'", 
				"bonus": "'.str_replace($char,'`',strip_tags($row['bonus'])).'",
				"listrik": "'.str_replace($char,'`',strip_tags($row['listrik'])).'", 
				"pemakaiansolar": "'.str_replace($char,'`',strip_tags($row['pemakaiansolar'])).'",
				"transportasi": "'.str_replace($char,'`',strip_tags($row['transportasi'])).'", 
				"solar": "'.str_replace($char,'`',strip_tags($row['solar'])).'",
				"muatancoltdiesel": "'.str_replace($char,'`',strip_tags($row['muatancoltdiesel'])).'"
			},';
		}

		$json = substr($json,0,strlen($json)-1);
		
		$json .= ']}';

	} else {
		$json = '{"value":0, "message": "Data tidak ditemukan."}';
	}

	echo $json;

	mysqli_close($con);

?>

 
<!-- SELECT DATE_FORMAT(tanggal, '%m') AS bulan, (sum(sludge_paper)/sum(jml_sp)) as sludgepaper, (sum(avalan_karton)/sum(jml_ak)) as avalankarton, (sum(avalan_gelondongan)/sum(jml_ag)) as avalangelondongan, (sum(duplek)/sum(jml_duplek)) as duplek, (sum(plastik_pembungkus)/sum(jml_pp)) as plastikpembungkus, (sum(tali_rafia)/sum(jml_tr)) as talirafia, (sum(kayu_bakar)/sum(jml_kb)) as kayubakar, (sum(borongan)/sum(jml_borongan)) as borongan, (sum(harian)/sum(jml_harian)) as harian, (sum(bonus)/sum(jml_bonus)) as bonus, (sum(listrik)/sum(jml_listrik)) as listrik, (sum(pemakaian_solar)/sum(jml_ps)) as pemakaiansolar, (sum(transportasi)/sum(jml_transportasi)) as transportasi, (sum(solar)/sum(jml_solar)) as solar, (sum(muatan_colt_diesel)/sum(jml_mcd)) as muatancoltdiesel FROM material where (year(tanggal)= '$tahun' AND month(tanggal) = '$bulan') group by month(tanggal)-->
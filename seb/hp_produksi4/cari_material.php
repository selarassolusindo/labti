<?php
/* ===== www.dedykuncoro.com ===== */
include_once "koneksi.php";

$from = $_POST['from'];
$to = $_POST['to'];

$query = mysqli_query($con, "SELECT tanggal, sum(sludge_paper) as sludgepaper,sum(jml_sp) as jmlsp, sum(avalan_karton) as avalankarton,sum(jml_ak)as jmlak , sum(avalan_gelondongan) as avalangelondongan,sum(jml_ag) as jmlag, sum(duplek) as duplek,sum(jml_duplek) as jmlduplek, sum(plastik_pembungkus) as plastikpembungkus,sum(jml_pp) as jmlpp, sum(tali_rafia) as talirafia,sum(jml_tr) as jmltr , sum(kayu_bakar) as kayubakar,sum(jml_kb) as jmlkb , (sum(borongan)/sum(jml_borongan)) as borongan, (sum(harian)/sum(jml_harian)) as harian, (sum(bonus)/sum(jml_bonus)) as bonus, (sum(listrik)/sum(jml_listrik)) as listrik, (sum(pemakaian_solar)/sum(jml_ps)) as pemakaiansolar, (sum(transportasi)/sum(jml_transportasi)) as transportasi, (sum(solar)/sum(jml_solar)) as solar, (sum(muatan_colt_diesel)/sum(jml_mcd)) as muatancoltdiesel FROM material WHERE tanggal BETWEEN '$from' AND '$to'");

$num_rows = mysqli_num_rows($query);

if ($num_rows > 0){
	$json = '{"value":1, "results": [';

	while ($row = mysqli_fetch_array($query)){
		$char ='"';

		$json .= '{
				
				"tanggal": "'.str_replace($char,'`',strip_tags($row['tanggal'])).'",
				"sludgepaper": "'.str_replace($char,'`',strip_tags($row['sludgepaper'])).'",
				"jmlsp": "'.str_replace($char,'`',strip_tags($row['jmlsp'])).'",
				"avalankarton": "'.str_replace($char,'`',strip_tags($row['avalankarton'])).'",
				"jmlak": "'.str_replace($char,'`',strip_tags($row['jmlak'])).'",
				"avalangelondongan": "'.str_replace($char,'`',strip_tags($row['avalangelondongan'])).'",
				"jmlag": "'.str_replace($char,'`',strip_tags($row['jmlag'])).'",
				"duplek": "'.str_replace($char,'`',strip_tags($row['duplek'])).'",
				"jmlduplek": "'.str_replace($char,'`',strip_tags($row['jmlduplek'])).'",				
				"plastikpembungkus": "'.str_replace($char,'`',strip_tags($row['plastikpembungkus'])).'",
				"jmlpp": "'.str_replace($char,'`',strip_tags($row['jmlpp'])).'",				 
				"talirafia": "'.str_replace($char,'`',strip_tags($row['talirafia'])).'",
				"jmltr": "'.str_replace($char,'`',strip_tags($row['jmltr'])).'",				
				"kayubakar": "'.str_replace($char,'`',strip_tags($row['kayubakar'])).'",
				"jmlkb": "'.str_replace($char,'`',strip_tags($row['jmlkb'])).'",				 
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
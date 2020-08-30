<?php
/* ===== www.dedykuncoro.com ===== */
include_once "koneksi.php";

$from = $_POST['from'];
$to = $_POST['to'];

$query = mysqli_query($con, "SELECT tanggal, sum(sludge_paper) as sludgepaper,sum(jml_sp) as jmlsp, sum(avalan_karton) as avalankarton,sum(jml_ak)as jmlak , sum(avalan_gelondongan) as avalangelondongan,sum(jml_ag) as jmlag, sum(duplek) as duplek,sum(jml_duplek) as jmlduplek, sum(plastik_pembungkus) as plastikpembungkus,sum(jml_pp) as jmlpp, sum(tali_rafia) as talirafia,sum(jml_tr) as jmltr , sum(kayu_bakar) as kayubakar,sum(jml_kb) as jmlkb FROM hp_bahan_dipakai WHERE tanggal BETWEEN '$from' AND '$to'");

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
				"jmlkb": "'.str_replace($char,'`',strip_tags($row['jmlkb'])).'"
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
<?php 
	/* ===== www.dedykuncoro.com ===== */
	include_once "koneksi.php";

	$tanggal = $_POST['keyword'];

	$query = mysqli_query($con, "SELECT * FROM hp_produksi WHERE tanggal LIKE '%".$tanggal."%' OR formula LIKE '%".$tanggal."%' OR hpp LIKE '%".$tanggal."%'");

	$num_rows = mysqli_num_rows($query);

	if ($num_rows > 0){
		$json = '{"value":1, "results": [';

		while ($row = mysqli_fetch_array($query)){
			$char ='"';

			$json .= '{
				"id": "'.str_replace($char,'`',strip_tags($row['id'])).'", 
				"tanggal": "'.str_replace($char,'`',strip_tags($row['tanggal'])).'",
				"formula": "'.str_replace($char,'`',strip_tags($row['formula'])).'", 
				"hpp": "'.str_replace($char,'`',strip_tags($row['hpp'])).'"
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
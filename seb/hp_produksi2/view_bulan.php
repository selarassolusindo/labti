<?php 

 include_once "koneksi.php";
 
 $tahun = $_POST['tahun'];
 
 $query = mysqli_query($con, "SELECT COUNT(*) AS count, DATE_FORMAT(tanggal, '%m') AS bulan FROM material WHERE (YEAR(tanggal) = '$tahun') GROUP BY bulan ASC");
	
 $json = array();	
	
 while($row = mysqli_fetch_assoc($query)){
 	$json[] = $row;
 }
	
 echo json_encode($json);
	
 mysqli_close($con);

?>
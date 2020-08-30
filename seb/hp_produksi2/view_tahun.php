 <?php 
 include_once "koneksi.php";

 $query = mysqli_query($con, "SELECT COUNT(*) AS count, DATE_FORMAT(tanggal, '%Y') AS tahun FROM material GROUP BY tahun;");
	
 $json = array();	
	
 while($row = mysqli_fetch_assoc($query)){
 	$json[] = $row;
 }
	
 echo json_encode($json);
	
 mysqli_close($con);
 ?>
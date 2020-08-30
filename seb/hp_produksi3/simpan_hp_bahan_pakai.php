<?php 
	include_once('koneksi.php'); 

	$tanggal = $_POST['tanggal'];
	$sludge_paper =$_POST['sludge_paper'];
	$avalan_karton =$_POST['avalan_karton'];
	$avalan_gelondongan =$_POST['avalan_gelondongan'];
	$duplek =$_POST['duplek'];
	$plastik_pembungkus = $_POST['plastik_pembungkus'];
	$tali_rafia = $_POST['tali_rafia'];
	$kayu_bakar = $_POST['kayu_bakar'];

	$insert = "INSERT INTO hp_bahan_dipakai (tanggal,sludge_paper,avalan_karton,avalan_gelondongan,duplek,plastik_pembungkus,tali_rafia,kayu_bakar) VALUES ('$tanggal','$sludge_paper','$avalan_karton','$avalan_gelondongan','$duplek','$plastik_pembungkus','$tali_rafia','$kayu_bakar')";

	$exeinsert = mysqli_query($con,$insert);

	if($exeinsert)
	{
	echo "Success ! Data di tambahkan";
	}
	else
	{
	echo "Failed ! Data Gagal di tambahkan";
	}

	mysqli_close($con);


 ?>
<?php 
	include_once('koneksi.php'); 

	$tanggal = $_POST['tanggal'];
	$sludge_paper =$_POST['sludge_paper'];
	$jml_sp = $_POST['jml_sp'];
	$avalan_karton =$_POST['avalan_karton'];
	$jml_ak = $_POST['jml_ak'];
	$avalan_gelondongan =$_POST['avalan_gelondongan'];
	$jml_ag = $_POST['jml_ag'];
	$duplek =$_POST['duplek'];
	$jml_duplek = $_POST['jml_duplek'];
	$plastik_pembungkus = $_POST['plastik_pembungkus'];
	$jml_pp = $_POST['jml_pp'];
	$tali_rafia = $_POST['tali_rafia'];
	$jml_tr = $_POST['jml_tr'];
	$kayu_bakar = $_POST['kayu_bakar'];
	$jml_kb = $_POST['jml_kb'];

	$insert = "INSERT INTO hp_bahan_dipakai (tanggal,sludge_paper,jml_sp,avalan_karton,jml_ak,avalan_gelondongan,jml_ag,duplek,jml_duplek,plastik_pembungkus,jml_pp,tali_rafia,jml_tr,kayu_bakar,jml_kb) VALUES ('$tanggal','$sludge_paper','$jml_sp','$avalan_karton','$jml_ak','$avalan_gelondongan','$jml_ag','$duplek','$jml_duplek','$plastik_pembungkus','$jml_pp','$tali_rafia','$jml_tr','$kayu_bakar','$jml_kb')";

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
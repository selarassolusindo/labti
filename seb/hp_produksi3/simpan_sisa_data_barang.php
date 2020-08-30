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
//	$borongan = $_POST['borongan'];
//	$jml_borongan = $_POST['jml_borongan'];
//	$harian = $_POST['harian'];
//	$jml_harian = $_POST['jml_harian'];
//	$bonus = $_POST['bonus'];
//	$jml_bonus = $_POST['jml_bonus'];
//	$listrik = $_POST['listrik'];
//	$jml_listrik = $_POST['jml_listrik'];
//	$pemakaian_solar = $_POST['pemakaian_solar'];
//	$jml_ps = $_POST['jml_ps'];
//	$transportasi = $_POST['transportasi'];
//	$jml_transportasi = $_POST['jml_transportasi'];
//	$solar = $_POST['solar'];
//	$jml_solar = $_POST['jml_solar'];
//	$muatan_colt_diesel = $_POST['muatan_colt_diesel'];
//	$jml_mcd = $_POST['jml_mcd'];


	$insert = "INSERT INTO material (tanggal,sludge_paper,jml_sp,avalan_karton,jml_ak,avalan_gelondongan,jml_ag,duplek,jml_duplek,plastik_pembungkus,jml_pp,tali_rafia,jml_tr,kayu_bakar,jml_kb) VALUES ('$tanggal','$sludge_paper','$jml_sp','$avalan_karton','$jml_ak','$avalan_gelondongan','$jml_ag','$duplek','$jml_duplek','$plastik_pembungkus','$jml_pp','$tali_rafia','$jml_tr','$kayu_bakar','$jml_kb')";
//,borongan,jml_borongan,harian,jml_harian,bonus,jml_bonus,listrik,jml_listrik,pemakaian_solar,jml_ps,transportasi,jml_transportasi,solar,jml_solar,muatan_colt_diesel,jml_mcd
//,'$borongan','$jml_borongan','$harian','$jml_harian','$bonus','$jml_bonus','$listrik','$jml_listrik','$pemakaian_solar','$jml_ps','$transportasi','$jml_transportasi','$solar','$jml_solar','$muatan_colt_diesel','$jml_mcd'
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
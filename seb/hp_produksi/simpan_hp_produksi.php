<?php 
	include_once('koneksi.php'); 

	$tanggal = $_POST['tanggal'];
	$formula = $_POST['formula'];
	$hpp = $_POST['hpp'];

	if(!$hpp == '0'){
	$insert = "INSERT INTO hp_produksi (tanggal,formula,hpp) VALUES ('$tanggal','$formula','$hpp')";

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
		
		}else{
		echo "Nilai Hp Produksi tidak boleh kosong";
		}

 ?>
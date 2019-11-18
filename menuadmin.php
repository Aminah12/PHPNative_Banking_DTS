<!DOCTYPE html>
<?php 
	session_start();
	if (isset($_SESSION["no_rek"])) //mengecek user yang sudah dikirm dari file login database
	{
		if ($_SESSION["tipe_pengguna"]==1) 
		{
?>
<html>
	<head>
		<title>Menu Nasabah</title>
	</head>
	<body>
		<ul>
			<li><a href="selectdatanasabah.php">Lihat Data Nasabah</a></li>
			<li><a href="degsininsertnasabah.php">Tambah Nasabah</a></li>
			<li><a href="degsinupdatenasabah.php">Edit Data Nasabah</a></li>
			<li><a href="deletenasabah.php">Hapus Nasabah</a></li>
			<li><a href="logoutnasabah.php">Logout</a></li>
		</ul>
<?php 
		}
	else
	{
		echo "Anda Tidak Punya Akses";
	}
	}
?>
	</body>
</html>
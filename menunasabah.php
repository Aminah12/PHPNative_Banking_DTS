<!DOCTYPE html>
<?php 
	session_start();
	if(isset($_SESSION["no_rek"]))
	{
		if ($_SESSION["tipe_pengguna"]==1) {
			echo "bukan akses anda";
		}
		else
		{
?>
<html>
	<head>
		<title>Menu Nasabah</title>
	</head>
	<body>
		<ul>
			<li><a href="selectdata.php">Lihat Data</a></li>
			<li><a href="formupdatepin.php">Ganti Pin</a></li>
			<li><a href="setor.php">Setor Tunai</a></li>
			<li><a href="logoutnasabah.php">Logout</a></li>
		</ul>
<?php 
		}
	}
	else
		{
			echo "Anda Tidak Memiliki Akses Sebagai";
		}
?>
	</body>
</html>
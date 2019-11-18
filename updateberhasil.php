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
		<title></title>
	</head>
	<body>
	<?php 
		$servername ="localhost";
		$username ="root";
		$password ="";
		$dbname = "db_bank";

		$conn = new mysqli ($servername, $username, $password, $dbname);

		if ($conn->connect_error)
		{
			diw("Koneksi Gagal!! ".$conn->connect_error);
		}
		else
		{
			$no_rek = $_POST["no_rek"];
			$nama = $_POST["nama"];
			$alamat = $_POST["alamat"];
			

			$sql = "UPDATE nasabah SET nama='".$nama."', alamat='".$alamat."' where no_rek='".$no_rek."' ;" ;
			if($conn->query($sql)===TRUE)
			{
				echo "Perubahan Data Berhasil ";
			}
			else
			{
				echo "Perubahan Data Gagal!".$conn->connect_error;
			}
		}
	?>
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
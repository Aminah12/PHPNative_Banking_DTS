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
		<title>Ganti Saldo</title>
	</head>
	<body>
	<?php  
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "db_bank";

		//konek  ke database
		$conn = new mysqli ($servername, $username, $password, $dbname);

		//cek koneksi
		if($conn->connect_error)
		{
			die("Konekasi Gagal!! " . $conn->connect_error);//die utk menampilkan sesuatu dan akan muncul pesan erornya apa 
		}
		else
		{
			$strTunai = $_POST["strTunai"];
			$saldo = $_POST["saldo"];
			$no_rek = $_POST["no_rek"];

			$sql = "UPDATE nasabah set saldo='".($saldo + $strTunai)."' Where no_rek='".$no_rek."';" ;

			if($conn->query($sql) === TRUE) //kalau perintahnya sql berarti tbl berhasil selain itu nilainya true atau flase 
			{
				echo "Setor Tunai Berhasil";
			}
			else
			{
				echo "Sertor Tunai Gagal!".$conn->error;
			}
		}
	?>
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
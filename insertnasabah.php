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
		<title>Tambah Nasabah</title>
	</head>
	<body>
		<?php 
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "db_bank";

			$conn = new mysqli ($servername, $username, $password, $dbname);

			if ($conn->connect_error)
			{
				die("Koneksi Gagal!! " . $conn->connect_error);
			}
			else
			{
				echo "Koneksi Berhasil ";

				$no_rek = $_POST["no_rek"];
				$pin = $_POST["pin"];
				$nama = $_POST["nama"];
				$alamat = $_POST["alamat"];
				$saldo = $_POST["saldo"];
				$tipe_pengguna = $_POST["tipe_pengguna"];

				$sql = "INSERT INTO nasabah (no_rek, pin, nama, alamat, saldo, tipe_pengguna)VALUES ('".$no_rek."', '".$pin."', '".$nama."', '".$alamat."', '".$saldo."', '".$tipe_pengguna."');" ;

				if($conn->query($sql) === TRUE) //kalau perintahnya sql berarti tbl berhasil selain itu nilainya true atau flase 
				{
					echo "Penambahaan data Berhasil";
				}
				else
				{
					echo "Penambahan data Gagal! ".$conn->error;
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
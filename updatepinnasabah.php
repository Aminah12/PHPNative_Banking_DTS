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
		<title>Ganti Pin</title>
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
			$pinBaru = $_POST["pinBaru"];
			$no_rek = $_POST["no_rek"];

			$sql = "UPDATE nasabah set pin='".$pinBaru."' Where no_rek='".$no_rek."';" ;

			if($conn->query($sql) === TRUE) //kalau perintahnya sql berarti tbl berhasil selain itu nilainya true atau flase 
			{
				echo "Penambahaan data Berhasil";
				header("Location:formupdatepin.php");
			}
			else
			{
				echo "Penambahan data Gagal!".$conn->error;
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
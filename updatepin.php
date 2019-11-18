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
	<title>Update Siswa</title>
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
			if($_SESSION["tipe_pengguna"]==1)
			{
				$sql = "SELECT * FROM nasabah ";// sql = query yg akan dieksekusi			
				$tblhasil = $conn->query($sql);
				$row = $tblhasil->fetch_assoc();

			}
			else 
			{ 
				$no_rek = $_SESSION["no_rek"];
				$sql = "SELECT * FROM nasabah WHERE no_rek='".$no_rek."';";
				$tblhasil = $conn->query($sql);
				$row = $tblhasil->fetch_assoc();
			}

			while ($row)
			{
				echo "<form action='updatepinnasabah.php' method='POST'>";
				echo "Ganti Pin";
				echo "<table>";
				echo "<tr><td>no_rek</td>";
				echo "<td><input name='no_rek' readonly value='".$row['no_rek']."'></td></tr>";
				echo "<tr><td>Pin Lama</td>";
				echo "<td><input name='pin' value='".$row['pin']."'></td></tr>";
				echo "<tr><td>Pin Baru</td>";
				echo "<td><input type='text' name='pinBaru'></td></tr>";

				echo "</table>";
				echo "<input type='submit' value='Ganti' formtarget='_blank'>";
				$row = $tblhasil->fetch_assoc();
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

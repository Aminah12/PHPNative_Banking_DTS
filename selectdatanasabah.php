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
		<title>Seluruh Data Nasabah</title>
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
			echo ("Koneksi Berhasil!!");

			$sql = "SELECT * FROM nasabah";
		
			$tblhasil = $conn->query($sql); 
			$row = $tblhasil->fetch_assoc();

			echo "<table border = '1'><tr>";
			echo "<th>No Rek</th>";
			echo "<th>Pin </th>";
			echo "<th>Nama</th>";
			echo "<th>Alamat</th>";
			echo "<th>Saldo</th>";
			echo "</tr>";

			while ($row) //cek apakah row ada isinya kalau ada bererti true (boolean true tdk=0. false=0 atau null. )
			{
					echo "<tr>";
					echo "<td>".$row["no_rek"]."</td>";
					echo "<td>".$row["pin"]."</td>";
					echo "<td>".$row["nama"]."</td>";
					echo "<td>".$row["alamat"]."</td>";
					echo "<td>".$row["saldo"]."</td>";
					echo "</tr>";

				$row = $tblhasil->fetch_assoc(); //mengabil baris baru secara automastis jika barisnya sudah habis maka akan berhenti 
			}
			echo "</table>"; 
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
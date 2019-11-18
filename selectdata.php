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
		<title>Lihat Data</title>
	</head>
	<body>
	<?php 
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "db_bank";

		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) 
		{
			die("Koneksi Gagal".$conn->connect_error);
			# code...
		}
		else
		{
			if($_SESSION["tipe_pengguna"]==1)
			{
				$sql = "SELECT * FROM nasabah" ;
				$tblhasil = $conn->query($sql);
				$row = $tblhasil->fetch_assoc();
			}
			else 
			{ 
				$no_rek = $_SESSION["no_rek"];
				$sql = "SELECT n.nama, n.alamat, n.saldo from nasabah n where no_rek='".$no_rek."';" ;

				$tblhasil = $conn->query($sql);
				$row = $tblhasil->fetch_assoc();
			}

			echo "<table border = '1'><tr>";
			echo "<th>Nama</th>";
			echo "<th>Alamat</th>";
			echo "<th>Saldo</th>";
			echo "</tr>";

				while ($row) //cek apakah row ada isinya kalau ada bererti true (boolean true tdk=0. false=0 atau null. )
				{
					echo "<tr>";
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
	}
	else
		{
			echo "Anda Tidak Memiliki Akses Sebagai";
		}
?>
	</body>
</html>
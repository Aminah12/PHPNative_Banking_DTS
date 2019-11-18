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
		<title>Form Delete 2</title>
	</head>
	<body>
	<?php  
			$servername ="localhost";
			$username ="root";
			$password ="";
			$dbname = "db_bank";

			$conn = new mysqli ($servername, $username, $password, $dbname);

			if($conn->connect_error)
			{
				die("Konekasi Gagal!! " . $conn->connect_error);
			}
			else
			{
				echo ("Koneksi Berhasil!!");

				$sql = "SELECT * FROM nasabah ";
			
				$tblhasil = $conn->query($sql);

				$row = $tblhasil->fetch_assoc();
				

				echo "<form action='deletedata.php' method='POST'>";
				echo "<table border = '1'><tr>";
				echo "<th>No Rek</th>";
				echo "<th>Pin </th>";
				echo "<th>Nama</th>";
				echo "<th>Alamat</th>";
				echo "<th>Saldo</th>";
				echo "</tr>";

				while ($row) 
				{
					echo "<tr>";
					echo "<td>".$row["no_rek"]."</td>";
					echo "<td>".$row["pin"]."</td>";
					echo "<td>".$row["nama"]."</td>";
					echo "<td>".$row["alamat"]."</td>";
					echo "<td>".$row["saldo"]."</td>";
					echo "<td><input type='Submit' value='hapus' name='btnHapus[".$row["no_rek"]."] formtarget='_blank'></td>";
					echo "</tr>";

					$row = $tblhasil->fetch_assoc(); 
				}
				echo "</table>"; 
				echo "</form>";
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
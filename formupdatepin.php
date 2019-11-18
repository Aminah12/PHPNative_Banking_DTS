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
		<title>Form Delete 2</title>
	</head>
	<body>
	<?php  
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "db_bank";

			$conn = new mysqli ($servername, $username, $password, $dbname);

			if($conn->connect_error)
			{
				die("Konekasi Gagal!! " . $conn->connect_error);
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
					$sql = "SELECT * FROM nasabah WHERE no_rek ='".$no_rek."';" ;
					$tblhasil = $conn->query($sql);
					$row = $tblhasil->fetch_assoc();
				}

				echo "<form action='updatepin.php' method='POST'>";
				echo "<table border = '1'><tr>";
				echo "<th>no_rek </th>";
				echo "<th>pin </th>";
				echo "<th>nama </th>";
				echo "<th>alamat </th>";
				echo "<th>saldo </th>";
				echo "</tr>";

				while ($row) 
				{
					echo "<tr>";
					echo "<td>".$row["no_rek"]."</td>";
					echo "<td>".$row["pin"]."</td>";
					echo "<td>".$row["nama"]."</td>";
					echo "<td>".$row["alamat"]."</td>";
					echo "<td>".$row["saldo"]."</td>";
					echo "<td><input type='submit' value='Update' name='btnUpdate[".$row["no_rek"]."] formtarget='_blank'></td>";
					echo "</tr>";

					$row = $tblhasil->fetch_assoc(); 
				}
				echo "</table>"; 
				echo "</form>";
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
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
		<title>Edit Data Nasabah</title>
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
			die("Koneksi Berhasil ".$conn->conect_error);
		}
		else
		{
			$no_rek = $_POST["no_rek"];

			$sql = "SELECT * FROM nasabah where no_rek='".$no_rek."';" ;
			$tblhasil = $conn->query($sql);
			$row = $tblhasil->fetch_assoc();

			if ($row)
			{
				echo "<form action='updateberhasil.php' method='POST'>";
				echo "<table>";
				echo "<tr>";
				echo "<td>no_rek </td>";
				echo "<td><input type='text' name='no_rek'  readonly value='".$row['no_rek']."'></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>nama </td>";
				echo "<td><input type='text' name='nama' value='".$row['nama']."'></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>alamat </td>";
				echo "<td><input type='text' name='alamat' value='".$row['alamat']."'></td>";
				echo "</tr>";

				echo "</table>";
				echo "<input type='submit' value='Update' formtarget='_blank'>";
			}
			else 
			{
				echo "Tidak ada Nasabah dengan no_rek ".$no_rek.$conn->connect_error;
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
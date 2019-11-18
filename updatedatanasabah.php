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

		if ($conn->conect_error)
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
				echo "<form action='updatenasabah.php' method='POST'>";
				echo "<table>";
				echo "<tr>";
				echo "<td>no_rek </td>";
				echo "<td><input type='text' name='no_rek'  readonly value='".$row['no_rek']."'></td>";
				echo "<td>pin </td>";
				echo "<td><input type='text' name='pin' value='".$row['pin']."'></td>";
				echo "<td>nama </td>";
				echo "<td><input type='text' name='nama' value='".$row['nama']."'></td>";
				echo "<td>alamat </td>";
				echo "<td><input type='text' name='alamat' value='".$row['alamat']."'></td>";
				echo "<td>saldo </td>";
				echo "<td><input type='text' name='saldo' value='".$row['saldo']."'></td>";
				echo "<td>tipe_pengguna </td>";
				echo "<td><input type='text' name='tipe_pengguna' value='".$row['tipe_pengguna']."'></td>";
			}
			else 
			{
				echo "Tidak ada Nasabah dengan no_rek ".$NIS;
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
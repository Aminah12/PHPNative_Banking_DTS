<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
	<?php 
		$no_rek =$_POST["no_rek"];
		$pin = $_POST["pin"];
		$tipe = $_SESSION["tipe_pengguna"];

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "db_bank";

		$conn = new mysqli ($servername, $username, $password, $dbname);

		if ($conn->connect_error)
		{
			die("Koneksi Gagal : " .$conn->connect_error);
		}
		else
		{
			$sql ="SELECT * FROM nasabah";
			$tblhasil = $conn->query($sql);

			$loginsuccess = false;
			$row =$tblhasil->fetch_assoc();
			while (($row) && (!$loginsuccess)) 
			{
				if(($no_rek == $row["no_rek"]) && ($pin == $row["pin"]))
				{
					$loginsuccess = true;
				}
				else
				{
					$row =$tblhasil->fetch_assoc();
				}
				# code...
			}
			if($loginsuccess)
			{
				session_start();
				$_SESSION["no_rek"]= $no_rek;
				$_SESSION["pin"]=$pin;
				$_SESSION["tipe_pengguna"]=$row["tipe_pengguna"];
				if($_SESSION["tipe_pengguna"]==1)
				{
					header('Location:menuadmin.php');
				}
				else
				{
					header('Location:menunasabah.php');
				}
			}
			else
			{
				echo "Login Gagal! ";
			}
		}
	?>
	</body>
</html>
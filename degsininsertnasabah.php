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
		<title>Form Insert Nasabah</title>
	</head>
	<body>
	<form action="insertnasabah.php" method="POST">
	<table>
		<tr><td>no_rek</td>
		<td><input type="text" name="no_rek"></td></tr>
		<tr><td>pin</td>
		<td><input type="text" name="pin"></td></tr>
		<tr><td>nama</td>
		<td><input type="text" name="nama"></td></tr>
		<tr><td>alamat</td>
		<td><input type="text" name="alamat"></td></tr>
		<tr><td>saldo</td>
		<td><input type="text" name="saldo"></td></tr>
		<tr><td>tipe_pengguna</td>
		<td><input type="text" name="tipe_pengguna"></td></tr>
	</table>
	<input type="submit" value="Tambah" formtarget="_blank">
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
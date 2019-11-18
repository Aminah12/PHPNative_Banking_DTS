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
	<form action="updatenasabah.php" method="POST">
		<table>
			<tr><td>Masukan nomor rekening untuk di-update</td>
			<td><input type="text" name="no_rek"></td></tr>
		</table>
		<input type="submit" value="Update Nasabah" formtarget="_blank">
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
<!DOCTYPE html>
<?php 
	session_start();
	if(isset($_SESSION["no_rek"]))
	{
?>
<html>
	<head>
		<title>Setor Tunai</title>
	</head>
	<body>
	<form action="setortunai.php" method="POST">
		<table>
			<tr><td>Masukan Nominal</td>
			<td><input type="number" name="strTunai"></td></tr>
		</table>
		<input type="submit" value="Setor" formtarget="_blank">
<?php 
		}
		else  
		{
			echo "Silakan Login Dahulu!! ";
		}
?>
	</body>
</html>
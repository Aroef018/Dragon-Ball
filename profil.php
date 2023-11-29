<?php
	include("koneksi.php");
	session_start();
	$username=$_SESSION['username'];
	$nama=$_SESSION['nama'];
	$gambar=$_SESSION['gambar'];
	$bio=$_SESSION['bio'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profil</title>
</head>
<body>
	<a href="index.php"><p>Back</p></a>
	<h1 align="center">Profile</h1>
	<div style="display: flex;">
		<div style="flex: 1;">
			<?php echo "<img src='image/".$gambar."' width=100px height=100px>" ?>
		</div>
		<div style="flex: 2;">
			<a href="editprofil.php" style="float: right;">Edit profile</a>
			<p>Username : </p>
			<h4><?php echo $username; ?></h4>
			<p>Nama : </p>
			<h4><?php echo $nama; ?></h4>
			<p>Bio : </p>
			<h4><?php echo $bio; ?></h4>
		</div>
	</div>
</body>
</html>
<?php
	include("koneksi.php");
	session_start();
	$username=$_SESSION['username'];
	$nama=$_SESSION['nama'];
	$gambar=$_SESSION['gambar'];
	$nyawa=$_SESSION['nyawa'];
	$serang=$_SESSION['serang'];



	$musuh=$_GET['musuh'];
	$sql="SELECT * FROM users WHERE username='$musuh'";
	$result=mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$nama_musuh=$row['nama'];
	$nyawa_musuh=$row['nyawa'];
	$serang_musuh=$row['serang'];
	$gambar_musuh=$row['foto_profil'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Serang Musuh</title>
</head>
<body>
	<div>
		<a href="index.php">Back</a><h2 align="right">Gambar bocil</h2>
		<h1 align="center">Dragon Ball</h1>
	</div>

	<div style="display: flex;">
		<div style="flex: 1;">
			<?php echo "<img src='image/".$gambar."' width=100px height=100px>" ?>
			<p><?php echo $nama; ?></p>
			<p>Nyawa</p>
			<p><?php echo $nyawa; ?></p>
			<p>Kesempatan Serang</p>
			<p><?php echo $serang; ?></p>
		</div>
		<div style="flex: 1;" align="center">
			<h1>VS</h1>
			<a href="attack.php?musuh=<?php echo $musuh;?>">Serang</a> <br>
			<a href="kesempatan.php?musuh=<?php echo $musuh;?>">Tambah kesempatan</a>
		</div>
		<div style="flex: 1;" align="right">
			<?php echo "<img src='image/".$gambar_musuh."' width=100px height=100px>" ?>
			<p><?php echo $nama_musuh; ?></p>
			<p>Nyawa</p>
			<p><?php echo $nyawa_musuh; ?></p>
			<p>Kesempatan Serang</p>
			<p><?php echo $serang_musuh; ?></p>
		</div>
	</div>	
</body>
</html>
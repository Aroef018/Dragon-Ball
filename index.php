<?php
	include("koneksi.php");
	session_start();
	//untuk menampilkan foto profil dan nama pengguna
	$gambar = $_SESSION['gambar'];
	//echo "<img src='image/".$gambar."' height=100px width=100px'>";
	//echo $_SESSION['username'];



	$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Index</title>
</head>
<body>
	<h1 align="center">User Database</h1>
	<a href="logout.php" style="float: right;">Log Out</a>
	<a href="profil.php"><img src="image/<?php echo $gambar;?>" width=100px height=100px></a> <?php echo $username; ?> <br>
	<a href="status.php" style="float: right;">Status</a>

	<table border="1" align="center">
		<th>No</th>
		<th>Nama</th>
		<th>Nyawa</th>
		<th>Kesempatan Serang</th>
		<th>Aksi</th>
		<?php
			$username = $_SESSION['username'];
			$sql="SELECT * FROM users WHERE username != '$username'";
			$result=mysqli_query($conn, $sql);
			$nomor=1;
			while($row=mysqli_fetch_assoc($result)){
				$nama=$row['nama'];
				$nyawa=$row['nyawa'];
				$serang=$row['serang'];
				$username_musuh=$row['username'];
				echo "<tr>
					<td>".$nomor."</td>
					<td>".$nama."</td>
					<td>".$nyawa."</td>
					<td>".$serang."</td>
					<td><a href='serang.php?musuh=$username_musuh'>Serang</a></td>

				</tr>";
				$nomor++;
			}


		?>
	</table>

</body>
</html>
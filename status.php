<?php
	include("koneksi.php");
	session_start();
	date_default_timezone_set('Asia/Jakarta');
	$tanggal = date('Y-m-d H:i:s');
	$username = $_SESSION['username'];

	if(isset($_POST['submit'])){
		$status=$_POST['status'];

		$sql="INSERT INTO status(pengirim, isi, tanggal) VALUES('$username', '$status', '$tanggal')";
		$result=mysqli_query($conn, $sql);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Status</title>
</head>
<body>
	<div style="display: flex;">
		<div style="flex: 1">
			<a href="index.php">Back</a>
		</div>
		<div style="flex: 2">
			<h1>Status</h1>
			<img src="image/<?php echo $_SESSION['gambar']; ?>" width=100px height=100px>
			<form method="post" action="">
				<textarea name="status"></textarea>
				<input type="submit" name="submit" value="kirim">
			</form>

			<?php
				//$sql="SELECT * FROM status INNER JOIN users ON status.username = users.username ORDER BY status.id DESC";
				$sql="SELECT * FROM status INNER JOIN users ON status.pengirim = users.username ORDER BY status.id DESC";
				$result=mysqli_query($conn, $sql);

				while($row=mysqli_fetch_assoc($result)){
					$username=$row['pengirim'];
					$nama=$row['nama'];
					$isi=$row['isi'];
					$waktu=$row['tanggal'];
					$gambar=$row['foto_profil'];

					echo "<img src='image/".$gambar."' width=100px height=100px>";
					echo $nama;
					echo "&nbsp";
					echo $username;
					echo "&nbsp";
					echo $tanggal; 
					echo "<br>";
					echo $isi;
					echo "<br>";

				}


			?>

		</div>
		<div style="flex: 1" align="center">
			<h1>Dragon Ball</h1>
		</div>
	</div>
</body>
</html>
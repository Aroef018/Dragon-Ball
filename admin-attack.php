<?php
	include("koneksi.php");
	include("tambah.php");
	include("kurang.php");
	session_start();
	$username = $_SESSION['username'];
	$serang = $_SESSION['serang'];

	$username_musuh = $_GET['musuh'];
	$sql="SELECT * FROM users WHERE username='$username_musuh'";
	$result=mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$nyawa_musuh=$row['nyawa'];
	
	if($serang==0){
		echo '<script type="text/javascript">
		        alert("Kesempatan serang anda telah habis");
		        window.location = "admin-serang.php?musuh=' . urlencode($username_musuh) . '";
		      </script>';

	}else{
		$serang=kurangSatu($serang);
		$_SESSION['serang']=$serang;
		$nyawa_musuh=kurangSatu($nyawa_musuh);

		$sql="UPDATE users SET serang='$serang' WHERE username='$username'";
		$result=mysqli_query($conn, $sql);

		$sql="UPDATE users SET nyawa='$nyawa_musuh' WHERE username='$username_musuh'";
		$result=mysqli_query($conn, $sql);

		if($nyawa_musuh==0){
			$sql = "DELETE FROM users WHERE username='$username_musuh'";
			$result=mysqli_query($conn, $sql);
			echo '<script type="text/javascript">
                    alert("Musuh anda telah mati");
                    window.location = "admin-index.php";
                  </script>';
		}else{
			header("location: admin-serang.php?musuh=$username_musuh");
		}
	}

?>
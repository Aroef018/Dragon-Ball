<?php
    include("koneksi.php");
	session_start();
	$username = $_SESSION['username'];
	$serang = $_SESSION['serang'];

	$username_musuh = $_GET['musuh'];
	$sql="DELETE FROM users WHERE username='$username_musuh'";
	$result=mysqli_query($conn, $sql);
	//$row = mysqli_fetch_assoc($result);
	//$nyawa_musuh=$row['nyawa'];
    echo '<script type="text/javascript">
                    alert("Musuh anda telah mati");
                    window.location = "admin-index.php";
                  </script>';
?>
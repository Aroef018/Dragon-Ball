<?php
    include("koneksi.php");
	session_start();
	

	$id_status = $_GET['id_status'];
	$sql="DELETE FROM status WHERE id_status='$id_status'";
	$result=mysqli_query($conn, $sql);
	//$row = mysqli_fetch_assoc($result);
	//$nyawa_musuh=$row['nyawa'];
    header("location: admin-status.php");
?>
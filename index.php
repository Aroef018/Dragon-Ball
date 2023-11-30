<?php
	include("koneksi.php");
	session_start();
	
	if(!isset($_SESSION['username'])){
		header("location: login.php");
	}else{
		$gambar = $_SESSION['gambar'];
		$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
    <title>Admin Database</title>
</head>
<body>
    <div class="header">
        <a href="logout.php"><button><i class="fas fa-sign-out-alt"></i> Logout</button></a>
    </div>

    <h2 class="shadow">USER DATABASE</h2>

    <div class="admin-header">
        <div class="logo-and-info">
            <a href="profil.php"><img src="img/<?php echo $gambar;?>" alt="Admin Avatar" class="admin-avatar"></a>
            <div class="admin-info">
                <span><?php echo $username; ?></span>
            </div>
        </div>
        <a href="status.php"><button class="status-button" onclick="PaymentRequestUpdateEvent">Status</button></a>
    </div>

    <div class="table-container">
        <table class="admin-table">
            <tr>
                <th>No</th>
                <th>USERNAME</th>
                <th>NYAWA</th>
                <th>KESEMPATAN SERANG</th>
                <th>AKSI</th>
            </tr>
            <?php
            	$sql="SELECT * FROM users WHERE username!='$username' and username!='admin'";
            	$result=mysqli_query($conn, $sql);

            	$no = 1;
		        while ($row = mysqli_fetch_assoc($result)) {
		        	$username_musuh=$row['username'];
		            echo "<tr>";
		            echo "<td>" . $no++ . "</td>";
		            echo "<td>" . $row['username'] . "</td>";
		            echo "<td>" . $row['nyawa'] . "</td>";
		            echo "<td>" . $row['serang'] . "</td>";
		            echo "<td>";
		            echo "<a href='serang.php?musuh=$username_musuh'><button class='action-button'><i class='fab fa-fort-awesome'></i></button></a>";
		            echo "</td>";
		            echo "</tr>";
		        }

            ?>
        </table>
    </div>

    <script>
        function logout() {
            // Add your logout logic here
            alert('Logout clicked!'); // Replace this with actual logout logic
        }
    </script>
</body>
</html>
		<?php
		}
	?>
<?php
	include("koneksi.php");
	session_start();
	date_default_timezone_set('Asia/Jakarta');
	$tanggal = date('Y-m-d H:i:s');
	$username = $_SESSION['username'];
	$foto = $_SESSION['gambar'];

	if(isset($_POST['submit'])){
		$status=$_POST['status'];

		$sql="INSERT INTO status(pengirim, isi, tanggal) VALUES('$username', '$status', '$tanggal')";
		$result=mysqli_query($conn, $sql);
	}
?>


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Twitter | Page</title>
  <link rel="stylesheet" href="layout.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style2.css">
  <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" crossorigin="anonymous">
</head>

<body id="twitter">
  <div style="background-color: rgba(255, 255, 255, 0.8); min-height: 100vh;">
    <button class="btn-back p-1 px-2">
      <a href="admin-index.php" style="text-decoration: none; color: white;"><i class="fa fa-arrow-left mr-2"></i> BACK</a>
    </button>
    <img class="logo" src="img/Dragon_Ball_Z_Logo_Png-removebg-preview.png" alt="DBZ Logo">
    <center>
      <div style="width: 50%;">
        <div class="card">
          <h2 style="text-align: left;">Status</h2>
        </div>
        
        <div class="card">
          <div class="d-flex">
            <img class="my-auto mr-3" src="img/<?php echo $foto; ?>" alt="">
            <div style="width: -webkit-fill-available;">
			<form method="post" action="">
              <textarea rows="2" placeholder="What's happening?" name="status"></textarea>
              <div class="d-flex">
                <button class="btn-send" type="submit" name="submit">
                  <i class="fa fa-paper-plane"></i>
                </button>
              </div>
			</form>
            </div>
          </div>
        </div>

		<?php
				//$sql="SELECT * FROM status INNER JOIN users ON status.username = users.username ORDER BY status.id DESC";
				$sql="SELECT * FROM status INNER JOIN users ON status.pengirim = users.username ORDER BY status.id_status DESC";
				$result=mysqli_query($conn, $sql);

				while($row=mysqli_fetch_assoc($result)){
					$username=$row['pengirim'];
					$nama=$row['nama'];
					$isi=$row['isi'];
					$waktu=$row['tanggal'];
					$gambar=$row['foto_profil'];
                    $id_status=$row['id_status'];

					echo "<div class='card'>    
					<div class='d-flex'>
					  <img class='mr-3' src='img/".$gambar."' alt=''>
					  <div>
						<div class='d-flex'>
						  <p class='mb-2'>
							<b>".$nama."</b>
							<span style='color: #666;'>@".$username." · ".$waktu."</span>
						  </p>
                          <a href='admin-hapus-status.php?id_status=$id_status'><button class='btn-delete'>
                            <i class='fa fa-trash-alt'></i>
                            </button>
                            </a>
						</div>
						<p class='status'>
						  ".$isi."
						</p>
					  </div>
					</div>
				  </div>";

				}


			?>
      
      </div>
    </center>
  </div>
</body>

</html>
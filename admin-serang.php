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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Serang | Page</title>
  <link rel="stylesheet" href="layout.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style2.css">
  <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" crossorigin="anonymous">
</head>

<body id="serang">

    <div class="container">
      <div class="content">
        <!-- Isi content di sini -->    
        <a href="admin-index.php"><button class="btn-back p-1 px-2">
          <i class="fa fa-arrow-left mr-2"></i> BACK
        </button></a>

        <img id="img-goku" src="img/goku-majin.png" alt="">

        <div class="d-flex m-5" style="justify-content: space-between;">
          
          <div class="player">
            <center>
              <img src="img/<?php echo $gambar; ?>" alt="" style="border-radius: 50%;">
              <h2 class=""><?php echo $nama; ?></h2>
              <p class="mb-2">Sisa Nyawa</p>
              <div class="d-flex">
                <div class="d-flex mx-auto">
                  <div class="life-bar" style="background-color:#00B007; width: <?php echo $nyawa * 20; ?>px;""></div>
                  <span class="ml-2"><b><?php echo $nyawa; ?></b></span>
                </div>
              </div>
              <p class="mb-2">Kesempatan Serang</p>
              <h2 class=""><b><?php echo $serang; ?></b></h2>
            </center>
          </div>
          
          <div>
            <center>
              <img src="img/Dragon_Ball_Z_Logo_Png-removebg-preview.png" alt="" style="width: 220px !important;">
              <h1 class="text-black" style="font-size: 72px;">VS</h1>
              <div style="height: 100px;"></div>
              <a href="admin-attack.php?musuh=<?php echo $musuh;?>"><button class="btn-serang mb-4">SERANG</button></a>
              <br>
              <a href="admin-kesempatan.php?musuh=<?php echo $musuh;?>" style="text-decoration: none;"><h3 class="text-black">Tambahkan Serang</h3></a>
              <a href="admin-hapus.php?musuh=<?php echo $musuh;?>" style="text-decoration: none;"><h3 class="text-danger">Hapus Akun</h3></a>
            </center>
          </div>
          
          <div class="player">
            <center>
              <img src="img/<?php echo $gambar_musuh; ?>" alt="" style="border-radius: 50%;">
              <h2 class=""><?php echo $nama_musuh; ?></h2>
              <p class="mb-2">Sisa Nyawa</p>
              <div class="d-flex">
                <div class="d-flex mx-auto">
                  <span class="mr-2"><b><?php echo $nyawa_musuh; ?></b></span>
                  <div class="life-bar" style="background-color:#1DA1F2; width: <?php echo $nyawa_musuh * 20; ?>px;"></div>
                </div>
              </div>
              <p class="mb-2">Kesempatan Serang</p>
              <h2 class=""><b><?php echo $serang_musuh; ?></b></h2>
            </center>
          </div>
        
        </div>
      </div>  
    </div>

</body>

</html>
<?php
	include("koneksi.php");
	session_start();
	$username=$_SESSION['username'];
	$nama=$_SESSION['nama'];
	$gambar=$_SESSION['gambar'];
	$bio=$_SESSION['bio'];

    if(isset($_POST['simpan'])){
        $foto = $_FILES['foto']['name'];
        $file_tmp = $_FILES['foto']['tmp_name'];
        move_uploaded_file($file_tmp, 'img/'. $foto);
        if($foto!=""){
            $sql = "UPDATE users SET foto_profil='$foto' WHERE username='$username'";
            $result=mysqli_query($conn, $sql);
               $_SESSION['gambar']= $foto;
        }

        $username_baru=$_POST['username'];
        $sql="SELECT * FROM users WHERE username='$username_baru'";
        $result=mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            echo '<script type="text/javascript">
                    alert("username telahh digunakan");
                    window.location = "admin-editprofil.php";
                  </script>';
        }else{
            $nama_baru=$_POST['nama'];
            $bio_baru=$_POST['bio'];
            
    
            $sql="UPDATE users SET username='$username_baru', nama='$nama_baru', bio='$bio_baru' WHERE username='$username'";
            $result=mysqli_query($conn, $sql);
    
            if($result){
                $_SESSION['username'] = $username_baru;
                $_SESSION['nama']=$nama_baru;
                $_SESSION['bio']=$bio_baru;
                header("location: admin-profil.php");
            }
        }
    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Editor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-GLhlTQ8iKu1rHN/8i+RQSmPhzU9K4T7LdyExlq+qDScBd6jZpmkaDd6jI5L+eO2SM" crossorigin="anonymous">
    <link rel="stylesheet" href="profile.css">
       
</head>

<form method="post" action="" enctype="multipart/form-data">
<body>
    <a href="admin-profil.php" class="back-button" style="text-decoration: none;"><i class="fas fa-arrow-left"></i> Back</a>
    <div class="container">
        <div class="left-section">
            <img src="img/<?php echo $gambar; ?>" class="image-preview">
            <div>
            <label id="img" for="image-upload" class="button">Add Profile Photo</label>
            <input type="file" id="image-upload" name="foto" /></div>
        </div>
        <div class="right-section">
            <div class="card-header">
            <h1>PROFILE</h1>
            <a class="edit-profile"><i class="fas fa-edit"></i>Edit Profile</a></div>
            <div class="form-group">
                <label for="username">Username:</label>
                <h4 hidden>admin</h4>
                <input type="text" id="username" name="username"  value="<?php echo $username; ?>">
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <h4 hidden>admin</h4>
                <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>"> 
            </div>
            <div class="form-group">
                <label for="bio">Bio:</label>
                <textarea id="bio" rows="10" cols="30" name="bio"><?php echo $bio; ?></textarea>
            </div>
            <div class="form-group">
                <button style='background-color: blue;' name="simpan">Simpan</button>
            </div>
        </div>
    </div>
 </body>
</form>
</html>
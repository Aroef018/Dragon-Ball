<?php
	include("koneksi.php");
	session_start();
	$username=$_SESSION['username'];
	$nama=$_SESSION['nama'];
	$gambar=$_SESSION['gambar'];
	$bio=$_SESSION['bio'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Editor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-GLhlTQ8iKu1rHN/8i+RQSmPhzU9K4T7LdyExlq+qDScBd6jZpmkaDd6jI5L+eO2SM" crossorigin="anonymous">
    <link rel="stylesheet" href="profile.css">
       
</head>

<body>
<a href="admin-index.php" class="back-button" style="text-decoration: none;"><i class="fas fa-arrow-left"></i> Back</a>
    <div class="container">
        <div class="left-section">
		<img src="img/<?php echo $gambar; ?>" class="image-preview">
            <div>
            <label id="img" for="image-upload" class="button"></label>
            <input type="file" id="image-upload" /></div>
        </div>
        <div class="right-section">
            <div class="card-header">
            <h1>PROFILE</h1>
            <a class="edit-profile" href="admin-editprofil.php"><i class="fas fa-edit"></i>Edit Profile</a></div>
            <div class="form-group">
                <label for="username">Username:</label>
                <h4 hidden>admin</h4>
                <input type="text" id="username" value="<?php echo $username; ?>">
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <h4 hidden>admin</h4>
                <input type="text" id="nama" value="<?php echo $nama; ?>">
            </div>
            <div class="form-group">
                <label for="bio">Bio:</label>
                <textarea id="bio" rows="10" cols="30"><?php echo $bio; ?></textarea>
            </div>
            <div class="form-group">
                
            </div>
        </div>
    </div>

    <script>
        const imageUpload = document
	</script>
</body>
</html>
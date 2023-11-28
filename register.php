<?php
include("koneksi.php");

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $gambar="gambar.png";

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<script type="text/javascript">
                    alert("username telahh digunakan");
                    window.location = "register.php";
                  </script>';
    } else {
    
                // Hash the password before storing it in the database (you should use a proper hashing method)
                //$hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO users (username, nama, password, foto_profil, nyawa, serang) VALUES ('$username', '$nama', '$password', '$gambar', 10, 5)";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    header("Location: login.php");
                    exit;
                } else {
                    echo '<script type="text/javascript">
                    alert("Periksa kembali registrasi anda");
                    window.location = "register.php";
                  </script>';
                }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
</head>
<body>
    <form method="post" action="">
        <table align="center">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="register" value="Register"></td>
            </tr>
        </table>
    </form>
    <a href="login.php">Masuk ke akun yang sudah ada</a>
</body>
</html>
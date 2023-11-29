<?php
include("koneksi.php");
session_start();
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    // Cek email
    if (mysqli_num_rows($user) === 1) {
        $row = mysqli_fetch_assoc($user);
        // Cek password
        if ($password == $row['password']) {
            $_SESSION["login"] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['gambar']= $row['foto_profil'];
            $_SESSION['nama']=$row['nama'];
            $_SESSION['bio']=$row['bio'];
            $_SESSION['nyawa']=$row['nyawa'];
            $_SESSION['serang']=$row['serang'];
            
            if ($row['username'] == "admin") {
                $_SESSION["admin"] = true;
                header("Location: admin.php");
            } else {
                header("Location: index.php");
            }
            exit;
        } else {
            // Tampilkan pesan kesalahan dengan JavaScript
            echo '<script type="text/javascript">
                    alert("Periksa kembali username dan password anda");
                    window.location = "login.php";
                  </script>';
        }
    } else {
        // Jika email tidak ditemukan
        // Tampilkan pesan kesalahan dengan JavaScript
        echo '<script type="text/javascript">
                alert("Username tidak ditemukan");
                window.location = "login.php";
              </script>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>
</head>
<body>
    <form method="post" action="">
        <table align="center">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="login" value="Log in"></td>
            </tr>
        </table>
    </form>
    <a href="register.php">Buat akun baru</a>
</body>
</html>
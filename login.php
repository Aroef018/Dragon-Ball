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
                header("Location: admin-index.php");
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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Register</title>
  <link rel="stylesheet" href="layout.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style2.css">
  <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" crossorigin="anonymous">
</head>

<body id="login">

    <div class="container">
      <div class="content">
        <!-- Isi content di sini -->    
        <div class="logreg-box">
          <!-- Isi logreg-box di sini -->
          <div class="navbar">
            <img src="img/Dragon_Ball_Z_Logo_Png-removebg-preview.png" alt="DBZ Logo">
            <div class="d-flex" style="width: 35%;">
              <ul class="mx-auto">
                <a href="login.php" class="sign-in"><li>Sign In</li></a>
                <a href="register.php" class="register"><li>Register</li></a>
              </ul>
            </div>
          </div>

          <div class="content border-0">
            <div class="item border-0">
              <h4>Hello</h4>
              <h3>Welcome Back</h3><br>
              <form class="login" method="post" action="">
                <input type="text" id="username" name="username" placeholder="Username" required>
                <div class="password-toggle" onclick="togglePasswordVisibility()">
                  <i class="fas fa-eye"></i>
                </div>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <br>
                <button class="btn-login" type="submit" name="login">LOGIN</button>
                <br>
                <div class="text-black">
                  Don't have an account? <a href="register.php"><b>Create Account<b></a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>  
    </div>

    <div class="character">
      <!-- Isi karakter di sini -->
      <img src="img/goku.png" alt="Goku">
    </div>

    <script>
      function togglePasswordVisibility() {
        const passwordInput = document.getElementById("password");
        const passwordToggle = document.querySelector(".password-toggle");

        const type = passwordInput.type === "password" ? "text" : "password";
        passwordInput.type = type;

        // Mengganti ikon mata tergantung pada status input password
        passwordToggle.innerHTML = type === "password" ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
      }
    </script>
</body>

</html>
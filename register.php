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
                <a href="login.php" class="register"><li>Sign In</li></a>
                <a href="register.php" class="sign-in"><li>Register</li></a>
              </ul>
            </div>
          </div>

          <div class="content border-0">
            <div class="item border-0">
              <h4>Hello</h4>
              <h3>Welcome Back</h3><br>
              <form class="login" method="post" action="">
                    <input type="text" id="nama" name="nama" placeholder="Name" required>
                    <input type="text" id="username" name="username" placeholder="Username" required>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <br>
                    <button class="btn-login" type="submit" name="register">REGISTER</button>
                    <br>
                    <div class="text-black">
                        Already Have an account? <a href="login.php"><b>Login<b></a>
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
<?php 
    session_start();
    require '../include/connect.php';

    if(isset($_SESSION['admin'])  or isset($_SESSION['username'])){
        header("Location: index.php");
        exit;
    }

    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $cpass = $_POST['cpass'];

        if ($pass === $cpass){
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            
            $result = mysqli_query($conn, "SELECT USERNAME FROM USER WHERE USERNAME='$username'");

            if(mysqli_fetch_assoc($result)){
                echo "
                <script>
                    alert('Username Sudah Digunakan !');
                    document.location.href = 'login.php';
                </script>";
            } else {
                $sql = "INSERT INTO USER VALUES('','$username','$email','$pass')";
                $result = mysqli_query($conn, $sql);

                if(mysqli_affected_rows($conn) > 0){
                    echo "
                    <script>
                        alert('Registrasi Berhasil !');
                        document.location.href = 'login.php';
                    </script>";
                } else {
                    echo "
                    <script>
                        alert('Registrasi Gagal !');
                        document.location.href = 'login.php';
                    </script>";
                }
            }

        } else {
            echo "<script>
                alert('Konfirmasi Password Tidak Sesuai !');
                document.location.href = 'login.php';
            </script>";
        }
    }

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if ($username == 'admin' and $password == 'admin'){
          $_SESSION['admin'] = $username;
          header("Location: dashboard.php");
          exit;
        }

        $result = mysqli_query($conn, "SELECT * FROM USER WHERE username='$username'");
        if (mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);                

            if(password_verify($password, $row['password'])){
                $_SESSION['username'] = $username;
                header("Location: index.php");
                exit;
            }    
        }
        $error = true;        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Dan Login</title>
  <link rel="icon" href="../assets/paimonicon.png">  
  <link rel="stylesheet" href="../styles/login.css">
</head>
<body>
  <div class="container" id="container">

    <div class="form-container register-container">
      <form action="" method="POST">
        <h1>Register.</h1>
        <input type="text" placeholder="Userame" name="username" required>
        <input type="email" placeholder="Email" name="email" required>
        <input type="password" placeholder="Password" name="password" required>
        <input type="password" placeholder="Konfirmasi Password" name="cpass" required>
        <input type="submit" name="register" value="Register" class="btn">
      </form>
    </div>

    <div class="form-container login-container">
      <form action="" method="POST">
        <h1>Login.</h1>
        <?php 
            if(isset($error)){            
                echo "<h5 style='text-align:center; color:#FF4655;'>Username atau Password Salah !</h5>";
            } 
        ?>
        <input type="text" placeholder="Username" name="username">
        <input type="password" placeholder="Password" name="password">
        <div class="content">
          <div class="checkbox">
            <input type="checkbox" name="checkbox" id="checkbox">
            <label>Ingat Saya</label>
          </div>
          <div class="pass-link">
            <a href="#">Lupa Password?</a>
          </div>
        </div>
        <input type="submit" name="login" value="Login" class="btn">
      </form>
    </div>

    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1 class="title">Halo <br> Petualang</h1>
          <p>Jika kamu sudah memiliki akun, klik disini untuk login</p>
          <button class="btn ghost" id="login">Login</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1 class="title">Mulai <br> Sekarang</h1>
          <p>Jika kamu belum memiliki akun, daftar sekarang dan mulailah petualanganmu.</p>
          <button class="btn ghost" id="register">Register</button>
        </div>
      </div>
    </div>

  </div>

  <script src="../scripts/login.js"></script>

</body>
</html>
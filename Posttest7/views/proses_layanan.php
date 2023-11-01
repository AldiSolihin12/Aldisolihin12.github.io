<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $telp = $_POST["telp"];
    $layanan = $_POST["layanan"];
    $pesan = $_POST["pesan"];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genshin Impact Indonesia</title>
    <link rel="icon" href="../assets/paimonicon.png">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/layanan.css">
</head>
<body>
    <header id="home">
        <nav class="navbar shadow" id="navbar">
            <div>
                <a href="index.php"><img src="../assets/Genshin_Impact_logo.png" alt="logo" class="webicon" id="webicon1" ></a>
            </div>
            <ul class="menu" id="menu1">
                <li><a class="navitems" href="index.php"><- Kembali</a></li> 
            </ul>
            <div class="menu-toggle" id="menu-toggle1">
                <svg id="menuBuka1" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
                <svg id="menuTutup1" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
            </div>
        </nav>
    </header>
    <section class="pusatlayanan">
        <div class="kotakform shadow">
        <h1 style="text-align: center; margin-bottom:2vh">Form Yang Diajukan</h1>
           <div class="isiform">
                <?php 
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if ($_FILES['gambar']['error'] == UPLOAD_ERR_OK) {
                            $gambar = $_FILES['gambar']['name'];
                            $temp_file = $_FILES['gambar']['tmp_name'];
                
                            $allowed_extensions = array("jpg", "jpeg", "png", "gif");
                            $file_extension = pathinfo($gambar, PATHINFO_EXTENSION);
                
                            if (in_array($file_extension, $allowed_extensions)) {
                                $upload_dir = "../assets/uploadedImg/";
                                move_uploaded_file($temp_file, $upload_dir . $gambar);
                                echo '<img src="' . $upload_dir . $gambar . '" alt="Gambar yang Diunggah" height="auto" width="50%">';
                            } 
                        }
                    }
                ?>
                <div>
                    <?php 
                    echo "<p><strong>Nama    : </strong> $nama</p>";
                    echo "<p><strong>Email   : </strong> $email</p>";
                    echo "<p><strong>Telepon : </strong> $telp</p>";
                    echo "<p><strong>Layanan : </strong> $layanan</p>";
                    echo "<p><strong>Pesan   : </strong> $pesan</p>";
                    echo "<br><h1 class='btnkirim'>Terimakasih</h1>"
                    ?>
                </div>
           </div>
        </div>
    </section>
    <footer>
        <p>Copyright © Aldi Solihin. All Rights Reserved.</p>
    </footer>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<section class='pusatlayanan'>";
    echo "<div class='kotakform2 shadow'>";
    echo "<div class='isiform'>";
    echo "<h1>Form Yang Diajukan</h1>";
    if ($_FILES['gambar']['error'] == UPLOAD_ERR_OK) {
        $gambar = $_FILES['gambar']['name'];
        $temp_file = $_FILES['gambar']['tmp_name'];
    
        $allowed_extensions = array("jpg", "jpeg", "png", "gif");
        $file_extension = pathinfo($gambar, PATHINFO_EXTENSION);
    
        if (in_array($file_extension, $allowed_extensions)) {
            $upload_dir = "assets/";
            move_uploaded_file($temp_file, $upload_dir . $gambar);
            echo '<img src="' . $upload_dir . $gambar . '" alt="Gambar yang Diunggah" height="auto" width="50%">';
        } 
    }
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $telp = $_POST["telp"];
    $layanan = $_POST["layanan"];
    $pesan = $_POST["pesan"];

    echo "<p><strong>Nama    : </strong> $nama</p>";
    echo "<p><strong>Email   : </strong> $email</p>";
    echo "<p><strong>Telepon : </strong> $telp</p>";
    echo "<p><strong>Layanan : </strong> $layanan</p>";
    echo "<p><strong>Pesan   : </strong> $pesan</p>";
    echo "<br><h1 class='btnkirim' style='align-items'>Terimakasih</h1>";
    echo "</div>";
    echo "</div>";
    echo "</section>";
    }
?>
    
           
                

        
    
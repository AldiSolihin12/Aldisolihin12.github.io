<?php
    require "../include/connect.php";
    $id = $_GET['id'];
    $get = mysqli_query($conn, "SELECT * FROM karakter_genshin WHERE id = $id");
    $karakter = [];

    while ($row = mysqli_fetch_assoc($get)) {
        $karakter[] = $row;
    }
    $karakter = $karakter[0];

    if (isset($_POST['ubah'])) {
        $nama = $_POST['nama'];
        $elemen = $_POST['elemen'];
        $deskripsi = $_POST['deskripsi'];
        $lahir = $_POST['tgllahir'];
        
        $gambar_lama = mysqli_query($conn, "SELECT gambar FROM karakter_genshin where id = $id"); 
        $row = mysqli_fetch_assoc($gambar_lama);
        $nama_file = $row['gambar'];
        $lokasi_file = '../assets/uploadedImg/' . $nama_file; 

        // date dan timezone 
        date_default_timezone_set('Asia/Makassar');
        $tanggal = date("Y-m-d h-i-s");

        if ($_FILES['gambar']['error'] == UPLOAD_ERR_OK) {
            $gambar = $_FILES['gambar']['name'];
            $temp_file = $_FILES['gambar']['tmp_name'];

            $allowed_extensions = array("jpg", "jpeg", "png", "gif");
            $file_extension = pathinfo($gambar, PATHINFO_EXTENSION);

            if($nama_file != "NoImage.png"){
                if (file_exists($lokasi_file)) {
                    unlink($lokasi_file);
                } 
            }

            if (in_array($file_extension, $allowed_extensions)) {
                    $x = explode('.',$gambar);
                    $ekstensi = strtolower(end($x));
                    $gambar_baru = "$tanggal.$nama.$ekstensi";
                    move_uploaded_file($temp_file, "../assets/uploadedImg/".$gambar_baru);
                    
            } else {
                $gambar_baru = 'NoImage.png';
            }
        } else {
            if($nama_file != "NoImage.png"){
                if (file_exists($lokasi_file)) {
                    unlink($lokasi_file);
                } 
            }

            $gambar_baru = 'NoImage.png';
        }

        $result = mysqli_query($conn, "UPDATE karakter_genshin SET nama='$nama', elemen='$elemen', deskripsi='$deskripsi', gambar='$gambar_baru', tgllahir='$lahir' WHERE id = $id");
        if ($result) {
            echo "
            <script>
                alert('Data berhasil diubah !');
                document.location.href = 'dashboard.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Data gagal diubah !');
                document.location.href = 'dashboard.php';
            </script>";
        }
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="../styles/dashboard.css">
</head>
<body>
    <section class="add-data">
        <div class="add-form-container">
            <h1>Edit Data</h1><hr><br>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="nama">Nama*</label>
                <input type="text" name="nama" value="<?php echo $karakter['nama'] ?>" class="textfield" required>
                <select class="textfield" name="elemen">
                    <option value="Hydro">Hydro</option>
                    <option value="Pyro">Pyro</option>
                    <option value="Cryo">Cryo</option>
                    <option value="Electro">Electro</option>
                    <option value="Geo">Geo</option>
                    <option value="Anemo">Anemo</option>
                    <option value="Dendro">Dendro</option>
                </select>
                <label for="tgllahir">Tanggal Lahir*</label>
                <input type="date" name="tgllahir" value="<?php echo $karakter['tgllahir'] ?>" class="textfield" required>
                <label for="deskripsi">Deskripsi*</label>
                <input type="text" name="deskripsi" value="<?php echo $karakter['deskripsi'] ?>" class="textfield" required>
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" class="inputgambar">
                <input type="submit" name="ubah" value="Edit Data" class="add-btn">
            </form>
        </div>
    </section>
</body>
</html>
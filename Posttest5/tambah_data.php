<?php
    require "include/connect.php";
    if (isset($_POST['tambah'])) {
        $nama = $_POST['nama'];
        $elemen = $_POST['elemen'];
        $deskripsi = $_POST['deskripsi'];
        $lahir = $_POST['tgllahir'];
        
        // date dan timezone 
        date_default_timezone_set('Asia/Makassar');
        $tanggal = date("Y-m-d h-i-s");

        if ($_FILES['gambar']['error'] == UPLOAD_ERR_OK) {
            $gambar = $_FILES['gambar']['name'];
            $temp_file = $_FILES['gambar']['tmp_name'];
        
            $allowed_extensions = array("jpg", "jpeg", "png", "gif");
            $file_extension = pathinfo($gambar, PATHINFO_EXTENSION);
        
            if (in_array($file_extension, $allowed_extensions)) {
                    $x = explode('.',$gambar);
                    $ekstensi = strtolower(end($x));
                    $gambar_baru = "$tanggal.$nama.$ekstensi";
            } else {
                $gambar_baru = 'NoImage.png';
            }
        } else {
            $gambar_baru = 'NoImage.png';
        }
        
        $result = mysqli_query($conn, "INSERT INTO karakter_genshin VALUES ('', '$nama', '$elemen', '$deskripsi', '$gambar_baru', '$lahir')");
        if ($result) {
            echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'dashboard.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Data gagal ditambahkan!');
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
    <title>Tambah Data</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <section class="add-data">
        <div class="add-form-container">
            <h1>Tambah Data</h1><hr><br>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="nama">Nama*</label>
                <input type="text" name="nama" class="textfield" required>
                <label for="elemen">Elemen</label>
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
                <input type="text" name="deskripsi" class="textfield" required>
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" class="inputgambar">
                <input type="submit" name="tambah" value="Tambah Data" class="add-btn">
            </form>
        </div>
    </section>
</body>
</html>
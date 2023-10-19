<?php
    require "include/connect.php";
    $id = $_GET['id'];
    $get = mysqli_query($conn, "DELETE FROM karakter_genshin WHERE id = $id");
    $karakter = [];

    if ($get) {
        echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'dashboard.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'dashboard.php';
        </script>";
    }
?>
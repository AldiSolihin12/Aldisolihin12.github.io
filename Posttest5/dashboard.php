<?php
    require "include/connect.php";

    $result = mysqli_query($conn, "SELECT * FROM karakter_genshin");
    $karakter = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $karakter[] = $row;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Genshin Impact</title>
    <link rel="icon" href="assets/paimonicon.png">
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="dashboard">
        <main class="dash-container">
        <nav class="navbar shadow" id="navbar">
            <div>
                <a href="index.php"><img src="assets/Genshin_Impact_logo.png" alt="logo" class="webicon" id="webicon2"></a>
            </div>
            <ul class="menu" id="menu">
                <li><a class="navitems" href="index.php">Home</a></li>
                <div class="menumode">
                    <input type="checkbox" class="nightmode" id="nightmode" onclick="mode()"> 
                    <svg id="light" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M480-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 80q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM80-440q-17 0-28.5-11.5T40-480q0-17 11.5-28.5T80-520h80q17 0 28.5 11.5T200-480q0 17-11.5 28.5T160-440H80Zm720 0q-17 0-28.5-11.5T760-480q0-17 11.5-28.5T800-520h80q17 0 28.5 11.5T920-480q0 17-11.5 28.5T880-440h-80ZM480-760q-17 0-28.5-11.5T440-800v-80q0-17 11.5-28.5T480-920q17 0 28.5 11.5T520-880v80q0 17-11.5 28.5T480-760Zm0 720q-17 0-28.5-11.5T440-80v-80q0-17 11.5-28.5T480-200q17 0 28.5 11.5T520-160v80q0 17-11.5 28.5T480-40ZM226-678l-43-42q-12-11-11.5-28t11.5-29q12-12 29-12t28 12l42 43q11 12 11 28t-11 28q-11 12-27.5 11.5T226-678Zm494 495-42-43q-11-12-11-28.5t11-27.5q11-12 27.5-11.5T734-282l43 42q12 11 11.5 28T777-183q-12 12-29 12t-28-12Zm-42-495q-12-11-11.5-27.5T678-734l42-43q11-12 28-11.5t29 11.5q12 12 12 29t-12 28l-43 42q-12 11-28 11t-28-11ZM183-183q-12-12-12-29t12-28l43-42q12-11 28.5-11t27.5 11q12 11 11.5 27.5T282-226l-42 43q-11 12-28 11.5T183-183Zm297-297Z"/></svg> 
                    <svg id="night" style="display: none;" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Zm0-80q88 0 158-48.5T740-375q-20 5-40 8t-40 3q-123 0-209.5-86.5T364-660q0-20 3-40t8-40q-78 32-126.5 102T200-480q0 116 82 198t198 82Zm-10-270Z"/></svg>
                </div> 
            </ul>
            <div class="menu-toggle" id="menu-toggle">
                <svg id="menuBuka" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
                <svg id="menuTutup" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
            </div>
            </nav>
            <section class="dash-main">
                <h1>Halo !</h1>
                <h2>Current Time : <?php date_default_timezone_set('Asia/Makassar'); echo date("l y/m/d H:s:i a"); ?> </h3>
                <hr><br>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Elemen</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Lahir</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($karakter as $chr) :?>
                        <tr>
                            <td><?php echo $chr['id']; ?></td>
                            <td><?php echo $chr['nama']; ?></td>
                            <td><?php echo $chr['elemen']; ?></td>
                            <td><?php echo $chr['deskripsi']; ?></td>
                            <td><?php echo $chr['tgllahir']; ?></td>
                            <td style="text-align: center;"><img src="assets/uploadedImg/<?php echo $chr['gambar']; ?>" alt=""></td>
                            <td class="action">
                                <a href="edit_data.php?id=<?php echo $chr['id']?>"><button class="edit-btn"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="white"><path d="M200-200h56l345-345-56-56-345 345v56Zm572-403L602-771l56-56q23-23 56.5-23t56.5 23l56 56q23 23 24 55.5T829-660l-57 57Zm-58 59L290-120H120v-170l424-424 170 170Zm-141-29-28-28 56 56-28-28Z"/></svg></button></a>
                                <a href="hapus_data.php?id=<?php echo $chr['id']?>"><button class="delete-btn" onclick="confirm return('Yakin ingin menghapus <?php echo $mhs['nama']?>?')"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="white"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg></button></a>
                            </td>
                        </tr>
                        <?php $i++; endforeach; ?>
                    </tbody>
                </table><br>
                <div class="leading-btn">
                    <a href="tambah_data.php"><button class="add-btn">Tambah Data Baru</button></a>
                </div>
            </section>
        </main>
    </div>

    <script src="scripts/dashboard.js"></script>
</body>
</html>
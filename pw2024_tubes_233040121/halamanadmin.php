<?php
require 'function.php';
// Inisialisasi variabel pencarian
$keyword = "";
// Jika tombol "Cari!" ditekan
if (isset($_POST["cari"])) {
    // Ambil nilai keyword dari form
    $keyword = $_POST["keyword"];
    // Query untuk mencari data berdasarkan keyword
    $Berita_Edukasi = query("SELECT * FROM Berita_Edukasi WHERE 
        judul LIKE '%$keyword%' OR
        jurnalis LIKE '%$keyword%' OR
        konten LIKE '%$keyword%'
    ");
} else {
    // Jika tidak ada pencarian, ambil semua data
    $Berita_Edukasi = query("SELECT * FROM Berita_Edukasi");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/halamanadmin.css">
    <title>Halaman Admin</title>
</head>
<body>
    <h1>Berita Edukasi</h1>
    <a href="tambahberita.php">Tambah Berita</a>
    <br>
    <br>
    <table border="1" cellpadding="10" cellspacing="0">

    <form action="" method="post">
        <input class="search-input" type="text" name="keyword" size="50" autofocus="" placeholder="masukan keyword pencarian" autocomplete="off">
        <button class="search-button" type="submit" name="cari">Cari!</button>
    </form>
     <br>
     <br>

        <tr>
            <th>No.</th>
            <th>Judul</th>
            <th>Jurnalis</th>
            <th>Konten</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1;?>
        <?php foreach($Berita_Edukasi as $row) : ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row["judul"]; ?></td>
            <td><?php echo $row["jurnalis"]; ?></td>
            <td><?php echo $row["konten"]; ?></td>
            <td><img src="img/<?php echo $row["gambar"]; ?>" width="100"></td>
            
            <td>
            <a href="ubah.php?id=<?php echo $row['id']; ?>">ubah</a> 
            __________
            <a href="hapus.php?id=<?= $row["id"]; ?>"  onclick="return confirm('YAKIN?');">hapus</a>
            </td>

        </tr>
        <?php $i++; ?>
        <?php endforeach;?>
    </table>
</body>
</html>
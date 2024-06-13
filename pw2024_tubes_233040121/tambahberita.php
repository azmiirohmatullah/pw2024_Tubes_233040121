<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
session_start();

if( !isset($_SESSION["login"]) ) {
  header("Location: index.php");
  exit;
}

require 'function.php';
// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {

    // cek apakah data berhasil ditambahkan atau tidak
    if( tambah($_POST) > 0 ) {
        echo "
        <script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'halamanadmin.php';
        </script>
            ";
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan!');
            document.location.href = 'halamanadmin.php';
        </script>
            ";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Berita</title>
    </head>
    <link rel="stylesheet" href="css/tambahberita.css">


<body>
 

    <form action="" method="post" enctype="multipart/form-data">
                     <h1> TAMBAH BERITA</h1>
        <ul>
            <li>
                <label for="judul">Judul :</label>
                <input type="text" name="judul" id="judul">
            </li>
            <li>
                <label for="jurnalis">Jurnalis:</label>
                <input type="text" name="jurnalis" id="jurnalis">
            </li>
           <li>
                <label for="konten">Konten :</label>
                <input type="text" name="konten" id="konten">
           </li>
           <li>
           <label for="gambar">Gambar :</label>
            <input type="file" name="gambar" id="gambar">
            <!-- Tambahkan tag img untuk menampilkan pratinjau gambar -->
            <img id="preview_gambar" src="#" alt="Pratinjau Gambar" style="display: none;">
           </li>
           <li>
            <button type="submit" name="submit">Tambah Berita</button>
           </li>
        </ul>

    </form>

</body>
</html>
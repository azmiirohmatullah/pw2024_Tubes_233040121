<?php 
error_reporting(E_ALL); 
ini_set('display_errors', 1);
require 'function.php';
// ambil data di URL
$id = $_GET["id"];

//query data mahasiswa berdasarkan id
$ins = query("SELECT * FROM Berita_Edukasi WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {

    // cek apakah data berhasil diubah atau tidak
    if( ubah($_POST) > 0 ) {
        echo "
        <script>
            alert('data berhasil diubah!');
            document.location.href = 'halamanadmin.php';
            </script>
            ";
    } else {
        echo "
        <script>
            alert('data gagal diubah!');
            document.location.href = 'halamanadmin.php';
            </script>
            ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ubah data </title>
    <link rel="stylesheet" href="css/ubah.css">
</head>
<body>
    <h1></h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $ins["id"] ?>">
        <input type="hidden" name="gambarLama" value="<?= $ins["gambar"] ?>">
        <h1>MENGUBAH DATA</h1>
        <ul>
            <li>
                <label for="judul">Judul: </label>
                <input type="text" name="judul" id="judul" required value="<?= $ins["judul"] ?>">
            </li>
            <li>
                <label for="jurnalis">Jurnalis: </label>
                <input type="text" name="jurnalis" id="jurnalis" required value="<?= $ins["jurnalis"] ?>">
            </li>
            <li>
                <label for="konten">Konten: </label>
                <input type="text" name="konten" id="konten" required value="<?= $ins["konten"] ?>">
            </li>
            <li>
                <label for="gambar">Gambar: </label> <br>
                <img src="img/<?= $ins['gambar']; ?>" width="40" alt=""> <br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>

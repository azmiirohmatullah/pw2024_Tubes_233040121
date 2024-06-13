<?php
$koneksi = mysqli_connect("localhost", "root", "", "pw2024_tubes_233040121");

// Fungsi query
function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Fungsi tambah
function tambah($data) {
    global $koneksi;

    $judul = htmlspecialchars($data["judul"]);
    $jurnalis = htmlspecialchars($data["jurnalis"]);
    $konten = htmlspecialchars($data["konten"]);

    // upload gambar
    $gambar = upload();
    if( !$gambar ) {
        return false;
    }

    // query insert data
    $query = "INSERT INTO Berita_Edukasi (judul, jurnalis, konten, gambar)
              VALUES ('$judul', '$jurnalis', '$konten', '$gambar')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// Fungsi upload
function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if( $error === 4 ) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
            </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
                alert('yang anda upload bukan gambar!');
            </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if( $ukuranFile > 100000000 ) {
        echo "<script>
                alert('ukuran gambar terlalu besar!');
            </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

// Fungsi hapus
function hapus($id) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM Berita_Edukasi WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}

// Fungsi ubah
function ubah($data) {
    global $koneksi;

    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $jurnalis = htmlspecialchars($data["jurnalis"]);
    $konten = htmlspecialchars($data["konten"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
    if( $_FILES['gambar']['error'] === 4 ) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE Berita_Edukasi SET
                judul = '$judul',
                jurnalis = '$jurnalis',
                konten = '$konten',
                gambar = '$gambar'
                WHERE id = $id";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


// cari
function cari($keyword) {
    $query = "SELECT * FROM Berita_Edukasi
                WHERE
                judul LIKE '%$keyword%' OR
                jurnalis LIKE '%$keyword%' OR
                konten LIKE '%$keyword%' 
                ";
    return query($query);
}

// Fungsi registrasi
function register($data) {
    global $koneksi;

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($koneksi, $data['password']);
    $password2 = mysqli_real_escape_string($koneksi, $data['password2']);

    // cek username sudah ada atau belum
    $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah terdaftar');
            </script>";
        return false;
    }

    // cek konfirmasi password
    if($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai!');
            </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($koneksi, "INSERT INTO user VALUES(null, '$username', '$password')");

    return mysqli_affected_rows($koneksi);
}
?>

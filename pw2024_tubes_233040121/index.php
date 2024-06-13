<?php
session_start();

if( !isset($_SESSION['login']) ) {
    header("Location: login.php");
    exit();
}

require 'function.php';

$Berita_Edukasi = query("SELECT * FROM Berita_Edukasi")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Azeret+Mono:ital,wght@0,100..900;1,100..900&family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
  
  <!--- navbar---->
<nav class="navbar navbar-expand-lg w">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <div class="logo">
          <a class="nav-link active" aria-current="page" href="#"><img src="img/logoazmi.jpeg" alt=""></a>
          </div>
        </li>
      </ul>
      <form class="search d-flex">
        <input class="form-control me-2" type="search" placeholder=" type to search" aria-label="Search">
        <button class="btn btn-outline-primary" type="submit">Search</button>
        <div class="dropdown">
        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-justify"></i>
        </button>
          <ul class="dropdown-menu">
         <i><a class="dropdown-item" href="logout.php">Logout</a></i>
         <i><a class="dropdown-item" href="halamanadmin.php">Halaman</a></i>
          </ul>
         </div>
        <a href="register.php"><i class="bi bi-person-circle"></i></a>
      </form>
    </div>
  </div>
</nav>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/gambar1.2.jpeg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>KAMPUS</h5>
       <a href="https://edukasi.okezone.com/read/2024/05/24/65/3012634/beasiswa-aperti-2024-dibuka-bisa-langsung-kerja-di-bumn"> <h4>Beasiswa 2024 Dibuka, Bisa Langsung Kerja di BUMN</h4></a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/gambar1.3.jpeg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>SEKOLAH</h5>
        <a href="https://edukasi.okezone.com/read/2024/05/24/624/3012648/ini-7-perbedaan-ppdb-jakarta-2023-vs-2024-yang-wajib-diketahui-cpdb"><h3>Ini 7 Perbedaan PPDB Jakarta 2023 vs 2024 yang Wajib Diketahui CPDB </h3></a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/gambar1.4.jpeg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>KAMPUS</h5>
        <a href="https://www.kompas.com/edu/read/2024/05/26/122320371/daftar-penerimaan-pkn-stan-2024-gratis-atau-bayar-cek-jawabannya"><h2>Daftar Penerimaan PKN STAN 2024 Gratis atau Bayar? Cek Jawabannya</h2></a>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<div class="kartu1">
<div class="card mb-3" style="max-width: 540px;"> 
  <div class="row g-0">
    <div class="col-md-4">
      <img src="img/gambar1.6.png" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Pendidikan</h5>
        <a href="https://www.kompas.com/edu/read/2024/03/28/192401771/luncurkan-platform-pendidikan-inklusif-kemendikbud-siswa-bisa-lebih"><p class="card-text">Luncurkan Platform Pendidikan Inklusif, Kemendikbud: Siswa Bisa Lebih Keluarkan Potensinya.</p></a>
       <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> 
      </div>
    </div>
  </div>
 </div>
</div>

<div class="kartu2">
<div class="card mb-3">
  <div class="card-body">
    <img src="img/gambar1.8.jpeg" class="card-img-top" alt="...">
   <a href="https://www.kompas.com/skola/read/2024/05/25/080000369/tujuan-dan-fungsi-sosiologi-ekonomi"> <p class="card-text">Sosiologi ekonomi memadukan ilmu sosiologi dan ekonomi, di mana keduanya sama-sama merupakan cabang ilmu sosial.</p></a>
  </div>
</div>
</div>

<div class="kartu3">
<div class="card">
  <div class="card-body">
    <img src="img/gambar1.9.jpeg" class="card-img-bottom" alt="...">
   <a href="https://www.kompas.com/skola/read/2024/05/24/200000369/apakah-beruang-kutub-hibernasi-"> <p class="card-text">Beruang dikenal melakukan hibernasi atau tidur panjang ketika memasuki musim dingin. Lalu, bagaimana dengan beruang kutub yang hidup di daerah kutub yang selalu dingin? Apakah beruang kutub hibernasi?.</p></a>
  </div>
</div>
</div>

<div class="kartu4">
<div class="card mb-3" style="max-width: 540px;" >
  <div class="row g-0">
    <div class="col-md-4">
      <img src="img/gambar1.7.png" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Skola</h5>
        <a href="https://www.kompas.com/skola/read/2024/05/25/154330469/siapa-yang-memberi-gelar-bangsawan-sir-pada-baden-powell#:~:text=Jawab%3A,Powell%20adalah%20Raja%20George%20V.&text=Dikutip%20dari%20buku%20Scout%20Book,tanya%2Djawab%20seputar%20Baden%20Powell."><p class="card-text">Siapa yang Memberi Gelar Bangsawan Sir Pada Baden Powell?.</p></a>
        <p class="card-text"><small class="text-muted">Last updated 5 mins ago</small></p>
      </div>
    </div>
  </div>
</div>
</div>

<div class="kartu5">
<div class="card" style="width: 34rem;">
  <img src="img/gambar1.10.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Skola</h5>
    <p class="card-text">Komunikasi adalah proses penyusunan, pengiriman, dan penerimaan pesan dari satu pihak ke pihak lainnya.</p>
    <a href="https://www.kompas.com/skola/read/2024/05/27/100000069/5-tujuan-komunikasi-yang-wajib-untuk-diketahui" class="btn btn-primary">Baca Selengkapnya...</a>
  </div>
 </div>
</div>

<div class="kartu6">
<div class="card">
  <div class="card-body">
    <h4> PILIHAN UNTUKMU</h4>
  </div>
</div>
</div>

<div class ="kartu7">
<div class="row row-cols-1 row-cols-md-4 g-2">
  <?php foreach( $Berita_Edukasi as $row ) : ?>
  <div class="col">
    <div class="card">
      <img src="img/<?= $row["gambar"]; ?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row["judul"]?></h5>
        <p class="card-text"><?php echo $row["jurnalis"]?></p>
        <p class="card-text"><?php echo $row["konten"]?></p>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
      </div>

  <!-- Footer Section -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-content">
            <p>&copy; Berita Edukasi <i class="bi bi-balloon-heart-fill"></i> Azmii Rohamtullah</p>
            <p>Follow Us</p>
            <div class="footer-links">
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-youtube"></i></a>
                <a href="#"><i class="bi bi-tiktok"></i></a>
            </div>
        </div>
    </div>
</footer>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
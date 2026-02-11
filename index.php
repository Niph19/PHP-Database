<?php
include("pages/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - QuickStart Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets_siswa/img/favicon.png" rel="icon">
  <link href="assets_siswa/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets_siswa/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets_siswa/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets_siswa/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets_siswa/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets_siswa/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets_siswa/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/logo_osis.png" alt="">
        <h1 class="sitename pt-2">Voting</h1>
      </a>


      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>


      <a class="btn-getstarted" href="pages/dashboard.php">Dashboard</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="hero-bg">
        <img src="assets_siswa/img/hero-bg-light.webp" alt="">
      </div>
      <div class="container text-center">
        <div class="d-flex flex-column justify-content-center align-items-center">
          <h1 data-aos="fade-up">Voting Calon <span>Ketua OSIS</span></h1>
          <p data-aos="fade-up" data-aos-delay="100">Pilih dengan <b>Bijak!</b></p>

          <form action="pages/proses_voting.php" method="POST" id="formVoting">
          <input type="hidden" name="id_calon" id="id_calon">
          <div class="container py-4">
            <div class="row justify-content-center">
              <?php
              $no = 1;
              $query = mysqli_query($koneksi, "SELECT * FROM `tbl_caketos`");
              foreach ($query as $data): ?>
                <div class="col-md-4" >
                  <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="card calon-card" onclick="pilihcaketos(<?= $data['id_calon'] ?>, this)">
                      <!-- Jika tombol ini diklik, jalankan fungsi pilihcaketos sambil ngirim data calon  -->
                      <span class="badge text-bg-secondary position-absolute top-0 start-0 m-2 fs-3 px-3 py-2">
                        <?= sprintf("%01d", $no++) ?>
                      </span>
                      <img src="assets/img/caketos/<?= $data['Foto']?>" class="card-img-top"
                        style="height: 400px; object-fit: cover;">
                      <div class="card-body justify-content-center" style="height: 250px;">
                        <h5 class="card-title pb-2 fs-4 fw-bolder"><?= $data['Nama'] ?></h5>
                        <p class="card-text fs-5"><?= $data['Visi'] ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
            <div class="text-center mt-4">
              <button class="btn btn-lg btn-primary px-5" type="submit" id="btnPilih" disabled>Pilih</button>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets_siswa/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets_siswa/vendor/php-email-form/validate.js"></script>
    <script src="assets_siswa/vendor/aos/aos.js"></script>
    <script src="assets_siswa/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets_siswa/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets_siswa/js/main.js"></script>

    <script>
      function pilihcaketos(id, card) {
        
      // 
      document.getElementById('id_calon').value = id;

      // aktifkan tombol kirim
      document.getElementById('btnPilih').disable = false;

      // Ambil semua element yang punya nama class calon-card lalu disimpan dalam var semua_card

      let semua_card = document.querySelectorAll(".calon-card");

      // reset semua tanda di card
      semua_card.forEach(kartu_satuan => {
        kartu_satuan.classList.remove("border-info", "border-3");
      })

      // beri tanda yang dipilih
      card.classList.add("border-info", "border-3");
      }
    </script>
</body>

</html>
<?php
session_start();

// Periksa apakah pengguna sudah masuk atau belum
if (!isset($_SESSION['id_user'])) {
  // Pengguna belum masuk, arahkan kembali ke halaman masuk.php
  header("Location: ../../berlangganan/masuk");
  exit; // Pastikan untuk menghentikan eksekusi skrip setelah mengarahkan
}

// Jika pengguna sudah masuk, Anda dapat melanjutkan menampilkan halaman user.php seperti biasa
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="icon" type="image/png" href="../../images/logo.png">

  <title>Home | Dojang Garuda</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="../../css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="../../css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="../../css/responsive.css" rel="stylesheet" />
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="home">
              <span> Dojang Garuda </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="home">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="jadwal">Jadwal</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="prestasi"> Prestasi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="sertifikat"> Sertifikat</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pelatih"> Pelatih</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="tagihan"> Tagihan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact">Maps</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link akun" href="akun" style="
                        padding-top: 6px;
                        padding-left: 12px;
                        padding-right: 12px;
                        padding-bottom: 7px;
                        border-radius: 50%;
                      ">
                    <i class="fa fa-user" aria-hidden="true"></i>
                  </a>
                </li>
                <style>
                  .akun {
                    border: 2px solid #000000;
                  }

                  .akun:hover {
                    border-color: #0a97b0;
                    /* Ubah warna border saat dihover */
                  }
                </style>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section">
      <div class="slider_bg_box">
        <img src="../../images/bg6.jpeg" alt="" />
      </div>
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <h1>
                      Dojang Garuda <br />
                      <h4 class="text-white"><b>Taekwondo Clup</b></h4>
                    </h1>
                    <p>
                      Dojang Garuda kota kupang merupakan lembaga yang memberikan
                      sarana dan prasaranabagi atlite taekwondo untuk
                      menyalurkan hoby, minat dan bakat. serta untuk berlatih
                      dan berprestasi dalam bidang belah diri
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <h1>
                      Dojang Garuda 2<br />
                      <h4 class="text-white"><b>Taekwondo Clup</b></h4>
                    </h1>
                    <p>
                      Dojang Garuda kota kupang merupakan lembaga yang memberikan
                      sarana dan prasaranabagi atlite taekwondo untuk
                      menyalurkan hoby, minat dan bakat. serta untuk berlatih
                      dan berprestasi dalam bidang belah diri
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <h1>
                      Dojang Garuda 3<br />
                      <h4 class="text-white"><b>Taekwondo Clup</b></h4>
                    </h1>
                    <p>
                      Dojang Garuda kota kupang merupakan lembaga yang memberikan
                      sarana dan prasaranabagi atlite taekwondo untuk
                      menyalurkan hoby, minat dan bakat. serta untuk berlatih
                      dan berprestasi dalam bidang belah diri
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <ol class="carousel-indicators">
          <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
          <li data-target="#customCarousel1" data-slide-to="1"></li>
          <li data-target="#customCarousel1" data-slide-to="2"></li>
        </ol>
      </div>
    </section>
    <!-- end slider section -->
  </div>
  <br />
  <br />
  <!-- about section -->
  <section class="about_section layout_padding-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>Tetang <span>Dojang Garuda</span></h2>
            </div>
            <p>
              penjelasan tentang kapan Dojang ini dibagun tujuan diciptakan
              Dojang ini berapajumlah atlite yang mengikutinya
            </p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="../../images/bg2.jpg" alt="" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- track section -->
  <section class="track_section layout_padding">
    <div class="track_bg_box">
      <img src="../../images/bg3.jpeg" alt="" />
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="heading_container">
            <h2>Visi & Misi</h2>
          </div>
          <br />
          <div class="content_container">
            <h3>Visi</h3>
            <p>
              Menjadi lembaga terkemuka di Kota Kupang yang menyediakan sarana
              dan prasarana terbaik bagi atlet taekwondo untuk menyalurkan
              hobi, minat, dan bakat, serta berlatih dan berprestasi dalam
              bidang bela diri.
            </p>
            <h3>Misi</h3>
            <ul>
              <li>
                Menyediakan fasilitas latihan yang lengkap dan berkualitas
                untuk mendukung perkembangan atlet taekwondo.
              </li>
              <li>
                Memberikan pelatihan profesional yang terstruktur dan berbasis
                kompetensi untuk meningkatkan kemampuan teknik dan fisik
                atlet.
              </li>
              <li>
                Mendorong dan membina atlet untuk berpartisipasi dalam
                berbagai kompetisi lokal, nasional, dan internasional.
              </li>
              <li>
                Mengembangkan program yang berfokus pada pembentukan karakter,
                disiplin, dan nilai-nilai sportivitas dalam diri setiap atlet.
              </li>
              <li>
                Bekerjasama dengan komunitas dan instansi terkait untuk
                memajukan olahraga taekwondo di Kota Kupang.
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end track section -->
  <br />
  <br />
  <!-- contact section -->
  <section class="contact_section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-5 offset-md-1">
          <div class="heading_container">
            <h2>Contact Us</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-5 offset-md-1">
          <div class="form_container contact-form">
            <form action="">
              <div>
                <input type="text" placeholder="Your Name" />
              </div>
              <div>
                <input type="text" placeholder="Phone Number" />
              </div>
              <div>
                <input type="email" placeholder="Email" />
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Message" />
              </div>
              <div class="btn_box">
                <button type="submit">Kirim</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="mu-contact-right">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3946.0215076748384!2d123.61699667509165!3d-10.173123049233492!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x547e2a61cc0e4ae9!2sPPA%20IO0496%20Maranatha%20Oebufu!5e0!3m2!1sen!2sid!4v1684389221340!5m2!1sen!2sid" width="100%" height="450" frameborder="0" style="border: 0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->

  <!-- info section -->

  <section class="info_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_contact">
            <h4>Alamat</h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span> Dojang taekwondo kupang </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span> 082339232134 </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span> dojangtaekondokupang@gmail.com </span>
              </a>
            </div>
          </div>
          <div class="info_social">
            <a href="">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-whatsapp" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_detail">
            <h4>Info</h4>
            <p>
              Anda dapat melihat informasi detail dari data Dojang Garuda kota
              Kupang yang terletak pada bagian ini
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-2 mx-auto info_col">
          <div class="info_link_box">
            <h4>Links</h4>
            <div class="info_links">
              <a class="active" href="home">
                <img src="../../images/nav-bullet.png" alt="" /> Home
              </a>
              <a class="" href="jadwal">
                <img src="../../images/nav-bullet.png" alt="" /> Jadwal
              </a>
              <a class="" href="service">
                <img src="../../images/nav-bullet.png" alt="" /> Prestasi
              </a>
              <a class="" href="sertifikat">
                <img src="../../images/nav-bullet.png" alt="" /> Sertifikat
              </a>
              <a class="" href="pelatih">
                <img src="../../images/nav-bullet.png" alt="" /> Pelatih
              </a>
              <a class="" href="akun">
                <img src="../../images/nav-bullet.png" alt="" /> Akun
              </a>
              <a class="" href="contact">
                <img src="../../images/nav-bullet.png" alt="" /> Contact
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 info_col">
          <h4>Pembayaran</h4>
          <p>Lihat Layanan Pembayaran Registrasi Anda</p>
          <form action="#">
            <button type="submit">Lihat</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- footer section -->
  <section class="footer_section">
    <div class="container">
      <p>&copy; <span id="displayYear"></span>Dibuat Olleh Ajhari husen</p>
    </div>
  </section>
  <!-- footer section -->
  <br />
  <!-- jQery -->
  <script type="text/javascript" src="../../js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="../../js/bootstrap.js"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="../../js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=myMap" async defer></script>
  <script>
    function myMap() {
      console.log("myMap function called"); // Debug log
      var mapProp = {
        center: new google.maps.LatLng(-10.1890042, 123.5948755), // Menggunakan koordinat dari tautan Google Maps
        zoom: 18,
      };
      var map = new google.maps.Map(
        document.getElementById("googleMap"),
        mapProp
      );
    }
  </script>
  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/../../js/bootstrap.bundle.min.js"></script>
  <!-- End Google Map -->
</body>

</html>
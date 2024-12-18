<?php
session_start();

// Periksa apakah pengguna sudah masuk atau belum
if (!isset($_SESSION['id_user'])) {
    // Pengguna belum masuk, arahkan kembali ke halaman masuk.php
    header("Location: ../../berlangganan/masuk");
    exit; // Pastikan untuk menghentikan eksekusi skrip setelah mengarahkan
}

// Dapatkan id_user dari sesi
$id_user = $_SESSION['id_user'];
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
    <link rel="shortcut icon" href="../../images/logo.png" type="" />

    <title>Sertifikat | Dojang Garuda</title>

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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/../../css/bootstrap.min.css" rel="stylesheet">

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
                                <li class="nav-item ">
                                    <a class="nav-link" href="home">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="jadwal">Jadwal</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="prestasi"> Prestasi</a>
                                </li>
                                <li class="nav-item active">
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
                                        border: 2px solid #f1eaea;
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
        <style>
            body {
                background-color: #f8f9fa;
                font-family: Arial, sans-serif;
            }

            .judul {
                margin-top: 50px;
                font-size: 50px;
                font-weight: bold;
                color: #333;
            }

            .line {
                width: 25%;
                height: 3px;
                background-color: #17a2b8;
                margin: 10px auto;
                position: relative;
                animation: expandLine 1s ease forwards;
            }

            .line2 {
                width: 35%;
                height: 3px;
                background-color: #17a2b8;
                margin: 10px auto;
                position: relative;
                animation: expandLine2 1s ease forwards;
            }

            @keyframes expandLine {
                0% {
                    width: 0;
                }

                100% {
                    width: 25%;
                }
            }

            @keyframes expandLine2 {
                0% {
                    width: 0;
                }

                100% {
                    width: 35%;
                }
            }

            /* Style untuk card */
            .card {
                border: none;
                border-radius: 15px;
                transition: transform 0.3s, box-shadow 0.3s;
            }

            .card:hover {
                transform: translateY(-10px);
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            }

            .card-img-top {
                border-top-left-radius: 15px;
                border-top-right-radius: 15px;
                height: 200px;
                object-fit: cover;
            }

            .card-title {
                font-size: 1.5rem;
                font-weight: bold;
                text-align: center;
                color: #333;
            }

            .card-text {
                text-align: center;
                font-size: 1rem;
                color: #666;
            }

            .read-more-btn {
                display: block;
                margin: 0 auto;
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 5px;
                padding: 10px 20px;
                font-size: 1rem;
                cursor: pointer;
                transition: background-color 0.3s ease-in-out, transform 0.3s;
            }

            .read-more-btn:hover {
                background-color: #0056b3;
                transform: scale(1.05);
            }

            @media (max-width: 768px) {
                .judul {
                    font-size: 35px;
                }

                @keyframes expandLine {
                    0% {
                        width: 0;
                    }

                    100% {
                        width: 55%;
                    }
                }

                @keyframes expandLine2 {
                    0% {
                        width: 0;
                    }

                    100% {
                        width: 75%;
                    }
                }
            }
        </style>
        <!-- end info section -->
        <div class="tinggi" style="height: 50px;"></div>
        <!-- card -->

        <div class="container mt-5">
            <h1 class="judul text-center">Sertifikat Kami</h1>
            <div class="line"></div>
            <div class="line2"></div>
            <div class="row mt-4">
                <!-- Card 1 -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <img src="https://via.placeholder.com/400x200.png?text=Sertifikat+Sabuk" class="card-img-top" alt="Gambar Sertifikat Sabuk">
                        <div class="card-body">
                            <h5 class="card-title">Sertifikat Sabuk</h5>
                            <p class="card-text">Lihat berbagai sertifikat sabuk yang telah Anda capai.</p>
                            <a href="sertifikat_sabuk" class="btn read-more-btn">Lihat Sertifikat Sabuk</a>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <img src="https://via.placeholder.com/400x200.png?text=Sertifikat+Prestasi" class="card-img-top" alt="Gambar Sertifikat Prestasi">
                        <div class="card-body">
                            <h5 class="card-title">Sertifikat Prestasi</h5>
                            <p class="card-text">Lihat berbagai sertifikat prestasi yang telah Anda raih.</p>
                            <a href="sertifikat_prestasi" class="btn read-more-btn">Lihat Sertifikat Prestasi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                document.querySelectorAll('.close-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        this.closest('.col-md-4').style.display = 'none';
                    });
                });
            });
        </script>
        <!-- card -->
        <div class="tinggi" style="height: 70px;"></div>

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
                                Anda dapat melihat informasi detail dari data Dojang Garuda kota Kupang yang terletak pada
                                bagian ini
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
                            <a class="btn btn-info" style="width: 50%;" href="tagihan">Lihat</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>


        <!-- footer section -->
        <section class="footer_section">
            <div class="container">
                <p>
                    &copy; <span id="displayYear"></span>Dibuat Olleh Ajhari husen
                </p>
            </div>
        </section>
        <!-- footer section -->
        <br>
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
                    center: new google.maps.LatLng(-10.1890042,
                        123.5948755), // Menggunakan koordinat dari tautan Google Maps
                    zoom: 18,
                };
                var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
            }
        </script>
        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/../../js/bootstrap.bundle.min.js"></script>
        <!-- End Google Map -->
</body>

</html>
<?php
session_start();

// Periksa apakah pengguna sudah masuk atau belum
if (!isset($_SESSION['id_user'])) {
    // Pengguna belum masuk, arahkan kembali ke halaman masuk.php
    header("Location: ../../berlangganan/masuk");
    exit; // Pastikan untuk menghentikan eksekusi skrip setelah mengarahkan
}

// Simpan id_user dari sesi
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

    <title>Jadwal | Dojang Garuda</title>

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
                                <li class="nav-item">
                                    <a class="nav-link" href="prestasi"> Prestasi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="sertifikat"> Sertifikat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pelatih"> Pelatih</a>
                                </li>
                                <li class="nav-item active">
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
        <!-- end header section -->
        <div class="text-center">
            <h4 class="judul display-4">Bayar Tagihan UKT</h4>
            <div class="line"></div>
            <div class="line2"></div>
        </div>

        <style>
            /* Style for hr with text */
            .judul {
                margin-top: 50px;
                font-size: 50px;
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
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                transition: box-shadow 0.3s ease-in-out;
            }

            .card:hover {
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            }

            /* Style untuk tombol X */

            .close-btn {
                font-size: 34px;
                position: absolute;
                top: 5px;
                right: 10px;
                cursor: pointer;
            }

            .p-gbr {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .card-img {
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
                /* Menambah bayangan */
                border-radius: 50%;
                margin-top: 30px;
                margin-bottom: 20px;
                padding: 7px;
                height: 150px;
                width: 150px;
            }

            .details {
                display: none;
            }

            .active-link {
                text-decoration: underline;
            }

            .show {
                display: block;
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
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center" scope="col">Nomor</th>
                                    <th class="text-center" scope="col">Tanggal Tagihan</th>
                                    <th class="text-center" scope="col">Tanggal Jatuh Tempo</th>
                                    <th class="text-center" scope="col">Jumlah</th>
                                    <th class="text-center" scope="col">Status Pembayaran</th>
                                    <th class="text-center" scope="col">Bayar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Lakukan koneksi ke database
                                include '../../keamanan/koneksi.php';

                                // Ambil kata kunci pencarian dari URL jika ada
                                $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';

                                // Query SQL untuk mengambil data dari tabel tagihan
                                $query = "SELECT t.*, IFNULL(p.status_pembayaran, 'Belum Lunas') AS status_pembayaran
          FROM tagihan t
          LEFT JOIN pembayaran p ON t.id_tagihan = p.id_tagihan AND p.id_user = '$id_user'";

                                // Jika ada kata kunci pencarian, tambahkan klausa WHERE untuk mencocokkan 
                                if (!empty($search_query)) {
                                    $query .= " WHERE t.tanggal_tagihan LIKE '%$search_query%' OR t.tanggal_jatuh_tempo LIKE '%$search_query%' OR t.jumlah_tagihan LIKE '%$search_query%'";
                                }

                                // Balik urutan data untuk memunculkan yang paling baru di atas
                                $query .= " ORDER BY t.id_tagihan DESC";
                                $result = mysqli_query($koneksi, $query);

                                // Variabel untuk menyimpan nomor urut
                                $counter = 1;

                                // Cek jika query berhasil dieksekusi
                                if ($result) {
                                    // Lakukan iterasi untuk menampilkan setiap baris data dalam tabel
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $tanggal_tagihan = $row['tanggal_tagihan'];
                                        $tanggal_jatuh_tempo = $row['tanggal_jatuh_tempo'];
                                        $tanggal_tagihan_data = date('Y-m-d\TH:i', strtotime($tanggal_tagihan));
                                        $tanggal_jatuh_tempo_data = date('Y-m-d\TH:i', strtotime($tanggal_jatuh_tempo));

                                        // Tentukan warna tombol berdasarkan status pembayaran
                                        $status_pembayaran = $row['status_pembayaran'];
                                        $status_class = '';

                                        if ($status_pembayaran == 'Belum Lunas') {
                                            $status_class = 'btn-danger';
                                        } elseif ($status_pembayaran == 'Sudah Lunas') {
                                            $status_class = 'btn-success';
                                        } elseif ($status_pembayaran == 'Diproses') {
                                            $status_class = 'btn-warning';
                                        }

                                        echo "<tr>";
                                        echo "<td class='text-center'>" . htmlspecialchars($counter, ENT_QUOTES) . "</td>";
                                        echo "<td class='text-center'>" . htmlspecialchars($row['tanggal_tagihan'], ENT_QUOTES) . "</td>";
                                        echo "<td class='text-center'>" . htmlspecialchars($row['tanggal_jatuh_tempo'], ENT_QUOTES) . "</td>";
                                        echo "<td class='text-center'>" . htmlspecialchars($row['jumlah_tagihan'], ENT_QUOTES) . "</td>";
                                        echo "<td class='text-center'><button class='btn $status_class btn-sm' style='border-radius: 25px;' disabled>" . htmlspecialchars($status_pembayaran, ENT_QUOTES) . "</button></td>";

                                        // Ubah tombol menjadi teks biasa jika status pembayaran adalah 'Belum Lunas' atau 'Diproses'
                                        if ($status_pembayaran == 'Sudah Lunas' || $status_pembayaran == 'Diproses') {
                                            echo "<td class='text-center'><button class='btn btn-info btn-sm' style='border-radius: 5px;' disabled>Bayar Tagihan</button></td>";
                                        } else {
                                            echo "<td class='text-center'>
                    <a href='detail_pembayaran.php?id_tagihan=" . htmlspecialchars($row['id_tagihan'], ENT_QUOTES) . "' class='btn btn-info btn-sm' style='border-radius: 5px;'>Bayar Tagihan</a>
                  </td>";
                                        }

                                        echo "</tr>";
                                        $counter++;
                                    }

                                    // Jika tidak ada data yang ditemukan
                                    if ($counter == 1) {
                                        echo "<tr><td class='text-center' colspan='6'><h3>Belum ada data Tagihan</h3></td></tr>";
                                    }
                                } else {
                                    echo "<tr><td class='text-center' colspan='6'><h3>Gagal mengambil data dari database</h3></td></tr>";
                                }

                                // Tutup koneksi ke database
                                mysqli_close($koneksi);
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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
<?php
session_start();

// Periksa apakah pengguna sudah masuk atau belum
if (!isset($_SESSION['id_user'])) {
    // Pengguna belum masuk, arahkan kembali ke halaman masuk.php
    header("Location: ../../berlangganan/masuk");
    exit; // Pastikan untuk menghentikan eksekusi skrip setelah mengarahkan
}

$id_user = $_SESSION['id_user'];
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
            <h4 class="judul display-4">Data Pembayaran</h4>
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
        <?php
        // Lakukan koneksi ke database
        include '../../keamanan/koneksi.php';

        // Query untuk mengambil informasi user berdasarkan id_user
        $query_user = "SELECT * FROM user WHERE id_user = '$id_user'";
        $result_user = mysqli_query($koneksi, $query_user);
        $user = mysqli_fetch_assoc($result_user);

        // Ambil id_tagihan dari query string
        $id_tagihan = isset($_GET['id_tagihan']) ? $_GET['id_tagihan'] : '';

        // Query untuk mengambil informasi tagihan berdasarkan id_tagihan
        $query_tagihan = "SELECT * FROM tagihan WHERE id_tagihan = '$id_tagihan'";
        $result_tagihan = mysqli_query($koneksi, $query_tagihan);
        $tagihan = mysqli_fetch_assoc($result_tagihan);

        // Tutup koneksi ke database
        mysqli_close($koneksi);
        ?>

        <!-- card -->
        <div class="container">
            <div class="row">
                <div class="col-md-4 mt-4">
                    <div class="card position-relative">
                        <div class="p-gbr">
                            <?php if (!empty($user['data_fp']) && file_exists('data_fp/' . $user['data_fp'])) : ?>
                                <img src="<?php echo 'data_fp/' . htmlspecialchars($user['data_fp'], ENT_QUOTES); ?>" class="card-img" alt="Athlete Image">
                            <?php else : ?>
                                <img src="data_fp/user.png" class="card-img" alt="Default Image">
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title text-center"><?php echo htmlspecialchars($user['nama'], ENT_QUOTES); ?></h3>
                            <p class="card-title text-center" style="color: red;"><?php echo htmlspecialchars($tagihan['status_pembayaran'] ?? 'Belum Bayar', ENT_QUOTES); ?></p>
                            <hr>
                            <h5 class="card-text">Tanggal Tagihan</h5>
                            <p class="card-text"><span>&#8226;</span> <?php echo htmlspecialchars($tagihan['tanggal_tagihan'], ENT_QUOTES); ?></p>
                            <hr>
                            <h5 class="card-text">Jatuh Tempo</h5>
                            <p class="card-text"><span>&#8226;</span> <?php echo htmlspecialchars($tagihan['tanggal_jatuh_tempo'], ENT_QUOTES); ?></p>
                            <hr>
                            <h5 class="card-text">Total Pembayaran</h5>
                            <p class="card-text"><span>&#8226;</span> <?php echo htmlspecialchars($tagihan['jumlah_tagihan'], ENT_QUOTES); ?></p>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mt-4">
                    <div class="card position-relative">
                        <div class="card-body">
                            <h4 class="text-center mt-4">
                                <a href="#" id="danaLink" class="mr-5" onclick="showDana(); return false;">DANA</a>
                                <a href="#" id="briLink" class="ml-5 active-link" onclick="showBri(); return false;">BRI</a>
                            </h4>
                            <hr>
                            <div id="danaDetails" class="details">
                                <p class="card-text ml-5">Metode Pembayaran : <b class="ml-3">(DANA)</b></p>
                                <p class="card-text ml-5">Nama Dana: <b class="ml-3">Ajhari Husen</b></p>
                                <p class="card-text ml-5">Nomor Dana: <b class="ml-3">082339573409</b></p>
                            </div>
                            <div id="briDetails" class="details show">
                                <p class="card-text ml-5">Metode Pembayaran : <b class="ml-3">(BRI)</b></p>
                                <p class="card-text ml-5">Nama Bri: <b class="ml-3">Ajhari Husen</b></p>
                                <p class="card-text ml-5">Nomor Bri: <b class="ml-3">123456789012</b></p>
                            </div>
                            <hr>
                            <form id="form_tambah" action="pembayaran_ukt/tambah.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" class="form-control" name="id_user" value="<?php echo htmlspecialchars($id_user, ENT_QUOTES); ?>">
                                <input type="hidden" class="form-control" name="id_tagihan" value="<?php echo htmlspecialchars($id_tagihan, ENT_QUOTES); ?>">
                                <input type="hidden" class="form-control" name="metode_pembayaran" id="metode_pembayaran" value="BRI">
                                <input type="hidden" class="form-control" name="status_pembayaran" id="status_pembayaran" value="Diproses">
                                <input type="hidden" class="form-control" name="tanggal_pembayaran" id="tanggal_pembayaran">
                                <div style="padding: 20px;">
                                    <div class="form-group">
                                        <label for="nama">Nama Pengirim:</label>
                                        <input type="text" class="form-control" id="editnama" name="nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_pembayaran">Jumlah Tagihan :</label>
                                        <input type="text" class="form-control" id="jumlah_pembayaran" name="jumlah_pembayaran" value=" <?php echo htmlspecialchars($tagihan['jumlah_tagihan'], ENT_QUOTES); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi:</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                                    </div>
                                    <script>
                                        document.getElementById('jumlah_tagihan').addEventListener('input', function(e) {
                                            // Hapus semua karakter selain angka
                                            let value = e.target.value.replace(/[^,\d]/g, '');

                                            // Pisahkan angka desimal dan ribuan
                                            const parts = value.split(',');
                                            const integerPart = parts[0];
                                            const decimalPart = parts[1] ? ',' + parts[1] : '';

                                            // Tambahkan titik untuk setiap ribuan
                                            const formatted = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

                                            // Gabungkan kembali
                                            e.target.value = formatted + decimalPart;
                                        });
                                    </script>
                                    <br>
                                    <div class="form-group">
                                        <label for="kover">Bukti Transfer:</label>
                                        <input type="file" class="form-control-file d-none" id="kover" name="bukti_tf" onchange="previewImage(this, 'koverPreview')" accept="image/*">
                                        <label class="btn btn-primary" for="kover">Pilih Bukti Transfer</label>
                                    </div>

                                    <div class="card" id="koverPreview" style="display: none;">
                                        <img class="card-img-top" id="koverImage" src="#" alt="Kover Image">
                                    </div>
                                    <br>
                                    <script>
                                        function previewImage(input, previewId) {
                                            var preview = document.getElementById(previewId);
                                            var image = document.getElementById('koverImage');
                                            var file = input.files[0];
                                            var fileType = file.type;

                                            if (fileType.match('image.*')) {
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();

                                                    reader.onload = function(e) {
                                                        image.src = e.target.result;
                                                        preview.style.display = 'block';
                                                    }

                                                    reader.readAsDataURL(input.files[0]);
                                                } else {
                                                    image.src = '#';
                                                    preview.style.display = 'none';
                                                }
                                            }
                                        }

                                        function setTanggalPembayaran() {
                                            var now = new Date();
                                            var year = now.getFullYear();
                                            var month = ('0' + (now.getMonth() + 1)).slice(-2);
                                            var day = ('0' + now.getDate()).slice(-2);
                                            var hours = ('0' + now.getHours()).slice(-2);
                                            var minutes = ('0' + now.getMinutes()).slice(-2);
                                            var seconds = ('0' + now.getSeconds()).slice(-2);
                                            var formattedDate = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;
                                            document.getElementById('tanggal_pembayaran').value = formattedDate;
                                        }

                                        document.addEventListener('DOMContentLoaded', (event) => {
                                            document.querySelectorAll('.close-btn').forEach(button => {
                                                button.addEventListener('click', function() {
                                                    this.closest('.col-md-6').style.display = 'none';
                                                });
                                            });
                                            setTanggalPembayaran(); // Panggil fungsi untuk mengatur tanggal pembayaran saat halaman dimuat
                                        });
                                    </script>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info" style="border-radius: 20px; padding: 5px 30px 5px 30px;">Bayar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <script>
                    function showDana() {
                        document.getElementById('danaDetails').classList.add('show');
                        document.getElementById('briDetails').classList.remove('show');
                        document.getElementById('danaLink').classList.add('active-link');
                        document.getElementById('briLink').classList.remove('active-link');
                        document.getElementById('metode_pembayaran').value = 'DANA';
                    }

                    function showBri() {
                        document.getElementById('briDetails').classList.add('show');
                        document.getElementById('danaDetails').classList.remove('show');
                        document.getElementById('briLink').classList.add('active-link');
                        document.getElementById('danaLink').classList.remove('active-link');
                        document.getElementById('metode_pembayaran').value = 'BRI';
                    }
                </script>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                document.querySelectorAll('.close-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        this.closest('.col-md-6').style.display = 'none';
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
                                <a class="" href="pembayaran">
                                    <img src="../../images/nav-bullet.png" alt="" /> pembayaran
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
        <!--=============== LOADING ===============-->
        <div class="loading">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            const loding = document.querySelector('.loading');

            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('form_tambah').addEventListener('submit', function(event) {
                    event.preventDefault(); // Menghentikan aksi default form submit

                    var form = this;
                    var formData = new FormData(form);

                    // Tampilkan elemen .loading sebelum mengirimkan permintaan AJAX
                    loding.style.display = 'flex';

                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'pembayaran_ukt/tambah.php', true);
                    xhr.onload = function() {
                        // Sembunyikan elemen .loading setelah permintaan AJAX selesai
                        loding.style.display = 'none';

                        if (xhr.status === 200) {
                            var response = xhr.responseText;
                            if (response === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: 'Data berhasil ditambahkan',
                                    timer: 2000,
                                    timerProgressBar: true,
                                    didOpen: () => {
                                        Swal.showLoading()
                                    }
                                }).then(() => {
                                    // Reset form setelah berhasil
                                    form.reset();
                                    // Muat ulang tabel
                                    window.location.href = 'tagihan.php';
                                });
                            } else if (response === 'data_tidak_lengkap') {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Data yang anda masukan belum lengkap'
                                });
                            } else if (response === 'data_username_sudah_ada') {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Username Salah!',
                                    text: 'Data username sudah digunakan silakan gunakan username lain'
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Gagal menambahkan data'
                                });
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Terjadi kesalahan saat mengirim data'
                            });
                        }
                    };
                    xhr.send(formData);
                });
            });

            function loadTable() {
                var xhrTable = new XMLHttpRequest();
                xhrTable.onreadystatechange = function() {
                    if (xhrTable.readyState == 4 && xhrTable.status == 200) {
                        // Perbarui konten tabel dengan respons dari server
                        document.getElementById('dataTable').innerHTML = xhrTable.responseText;
                    }
                };
                xhrTable.open('GET', 'pembayaran/load_table.php', true);
                xhrTable.send();
            }
        </script>

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
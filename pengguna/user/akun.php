<?php
session_start();

// Periksa apakah pengguna sudah masuk atau belum
if (!isset($_SESSION['id_user'])) {
    // Pengguna belum masuk, arahkan kembali ke halaman masuk.php
    header("Location: ../../berlangganan/masuk");
    exit; // Pastikan untuk menghentikan eksekusi skrip setelah mengarahkan
}
// Ambil id_user dari sesi
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

    <title>Prestasi | Dojang Garuda</title>

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

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
                                <li class="nav-item active">
                                    <a class="nav-link akun" href="akun" style="
                        padding-top: 6px;
                        padding-left: 12px;
                        padding-right: 12px;
                        padding-bottom: 7px;
                        border-radius: 50%;
                        background: #000000;
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
            <h4 class="judul display-4">Data Akun</h4>
            <div class="line"></div>
            <div class="line2"></div>
        </div>

        <style>
            /* Style for hr with text */
            .judul {
                margin-top: 50px;
                font-size: 50px;
            }

            /* Style for hr with text */
            .line,
            .line2 {
                height: 3px;
                background-color: #17a2b8;
                margin: 10px auto;
                position: relative;
                animation-duration: 1s;
                animation-fill-mode: forwards;
            }

            .line {
                width: 0;
                animation-name: expandLine;
            }

            .line2 {
                width: 0;
                animation-name: expandLine2;
            }

            @keyframes expandLine {
                to {
                    width: 18%;
                }
            }

            @keyframes expandLine2 {
                to {
                    width: 25%;
                }
            }

            /* Style untuk card */
            .card {
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                transition: box-shadow 0.3s ease-in-out;
                border: none;
                /* Menghapus border */
                border-radius: 15px;
                /* Menambah sudut */
            }

            .card:hover {
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
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
                height: 150px;
                padding: 7px;
                width: 150px;
            }

            .card-title {
                font-size: 1.8rem;
                /* Menambah ukuran font */
                font-weight: bold;
                text-align: center;
                color: #333;
                /* Mengubah warna */
                margin-top: 10px;
                /* Menambah jarak dari atas */
            }

            .card-text {
                font-size: 1.2rem;
                /* Menambah ukuran font */
                color: #555;
                /* Mengubah warna */
            }

            .description {
                text-align: justify;
                font-size: 1rem;
                /* Menambah ukuran font */
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
        // Query SQL untuk mengambil data pengguna berdasarkan id_user
        $query = "SELECT * FROM user WHERE id_user = ?";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param('i', $id_user);
        $stmt->execute();
        $result = $stmt->get_result();

        // Cek jika query berhasil dieksekusi dan data ditemukan
        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
        } else {
            echo "Data tidak ditemukan atau terjadi kesalahan.";
            exit;
        }

        // Tutup koneksi ke database
        $stmt->close();
        $koneksi->close();
        ?>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 mt-4">
                    <div class="card position-relative">
                        <a href="javascript:void(0)" onclick="document.getElementById('editFotoProfile').click()">
                            <div class="p-gbr">
                                <?php if (!empty($user['fp'])) : ?>
                                    <img class="avatar card-img" src="data_fp/<?php echo $user['fp']; ?>" alt="...">
                                <?php else : ?>
                                    <img class="avatar card-img" src="data_fp/user.png" alt="Profile Photo" class="card-img">
                                <?php endif; ?>
                            </div>
                        </a>
                        <!-- Input file tersembunyi untuk memilih gambar -->
                        <input type="file" class="d-none" id="editFotoProfile" name="editFotoProfile" accept="image/*" onchange="previewAndUpdateProfile(this)">

                        <!-- Modal untuk memilih gambar profile -->
                        <div class="modal fade" id="editFotoProfileModal" tabindex="-1" role="dialog" aria-labelledby="editFotoProfileModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editFotoProfileModalLabel" style="font-size: 150%;">Edit Foto Profile</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload();">
                                            <span aria-hidden="true" style="font-size: 140%;">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="gambar">
                                            <img id="editFotoProfilePreview" src="#" alt="Preview Foto Profile">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.reload();">Close</button>
                                        <button type="button" class="btn btn-primary" id="btnSaveProfile">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-center mt-3"><?php echo htmlspecialchars($user['nama'], ENT_QUOTES); ?></h3>
                        <hr>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" value="<?php echo htmlspecialchars($user['nama'], ENT_QUOTES); ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nomor_registrasi">Nomor Registrasi</label>
                                    <input type="text" class="form-control" id="nomor_registrasi" value="<?php echo htmlspecialchars($user['nomor_registrasi'], ENT_QUOTES); ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" id="password" value="<?php echo htmlspecialchars($user['password'], ENT_QUOTES); ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tingkat_sabuk">Tingkat Sabuk</label>
                                    <input type="text" class="form-control" id="tingkat_sabuk" value="<?php echo htmlspecialchars($user['tingkat_sabuk'], ENT_QUOTES); ?>" readonly>
                                </div>
                                <hr>
                                <a href="prestasi" class="btn btn-primary">Prestasi</a>
                                <a href="logout" class="btn btn-danger">Log Out</a>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editModal">Edit</button>
                            </form>
                            <hr>
                            <p class="card-text position-absolute" style="bottom: 5px; right: 15px;"><?php echo date('d M Y'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Profil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="fp/proses_data_fp.php" id="editDataFp">
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="editid_user" name="id_user" value="<?php echo htmlspecialchars($id_user, ENT_QUOTES); ?>" required>

                            <div class="form-group">
                                <label for="editNomorRegistrasi">Nomor Registrasi</label>
                                <input type="text" class="form-control" id="editNomorRegistrasi" name="nomor_registrasi" value="<?php echo htmlspecialchars($user['nomor_registrasi'], ENT_QUOTES); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="editNama">Nama</label>
                                <input type="text" class="form-control" id="editNama" name="nama" value="<?php echo htmlspecialchars($user['nama'], ENT_QUOTES); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="editPassword">Password</label>
                                <input type="text" class="form-control" id="editPassword" name="password" value="<?php echo htmlspecialchars($user['password'], ENT_QUOTES); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="editTingkatSabuk">Tingkat Sabuk</label>
                                <input type="text" class="form-control" id="editTingkatSabuk" name="tingkat_sabuk" value="<?php echo htmlspecialchars($user['tingkat_sabuk'], ENT_QUOTES); ?>" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="tim-icons icon-simple-remove"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="loading">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
        </div>

        <style>
            .loading {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                display: none;
                /* Mula-mula, loading disembunyikan */
                justify-content: center;
                align-items: center;
                z-index: 9999;
                /* Menempatkan loading di atas elemen lain */
                height: 100vh;
                width: 100vw;
                background-color: rgba(255, 255, 255, 0.932);
                /* Menambahkan latar belakang semi transparan */
            }

            .circle {
                width: 20px;
                height: 20px;
                background-color: #41a506;
                border-radius: 50%;
                margin: 0 10px;
                animation: bounce 0.5s infinite alternate;
            }

            .circle:nth-child(2) {
                animation-delay: 0.2s;
            }

            .circle:nth-child(3) {
                animation-delay: 0.4s;
            }

            @keyframes bounce {
                from {
                    transform: translateY(0);
                }

                to {
                    transform: translateY(-20px);
                }
            }
        </style>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            // Variabel global untuk menyimpan instance Cropper
            var cropper;

            const loding = document.querySelector('.loading');

            // Fungsi untuk menampilkan gambar yang dipilih dan menampilkan modal
            function previewAndUpdateProfile(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#editFotoProfilePreview').attr('src', e.target.result);
                        $('#editFotoProfileModal').modal('show');
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            // Fungsi untuk memotong gambar dan menyimpannya
            function cropImage() {
                var croppedCanvas = cropper.getCroppedCanvas({
                    width: 200, // Tentukan lebar gambar yang diinginkan
                    height: 200 // Tentukan tinggi gambar yang diinginkan
                });
                var croppedDataUrl = croppedCanvas.toDataURL();

                // Tampilkan elemen .loading sebelum mengirimkan permintaan AJAX
                loding.style.display = 'flex';

                // Simpan data gambar ke server menggunakan AJAX
                $.ajax({
                    type: 'POST',
                    url: 'fp/edit_fp.php',
                    data: {
                        imageBase64: croppedDataUrl
                    },
                    success: function(response) {

                        // Sembunyikan elemen .loading setelah permintaan AJAX selesai
                        loding.style.display = 'none';

                        // Tampilkan sweet alert dengan pesan respon
                        swal("Sukses!", response, "success").then((value) => {
                            // Setelah pengguna menekan tombol "OK" pada SweetAlert, tampilkan alert
                            if (value) {
                                location.reload();
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        // Tampilkan sweet alert dengan pesan error
                        swal("Error!", xhr.responseText, "error");
                    }
                });

                // Sembunyikan modal pemotongan gambar
                $('#editFotoProfileModal').modal('hide');
            }

            $(document).ready(function() {
                $('#editFotoProfileModal').on('shown.bs.modal', function() {
                    // Inisialisasi Cropper setelah modal ditampilkan
                    var containerWidth = $('.gambar').width();
                    var containerHeight = $('.gambar').height();
                    cropper = new Cropper($('#editFotoProfilePreview')[0], {
                        aspectRatio: 1, // 1:1 aspect ratio
                        viewMode: 1, // Crop mode
                        minContainerWidth: containerWidth, // Set minimum container width to match image container width
                        minContainerHeight: containerHeight, // Set minimum container height to match image container height
                    });
                });

                $('#btnSaveProfile').on('click', function() {
                    cropImage();
                });

                $('#editFotoProfileModal').on('hidden.bs.modal', function() {
                    // Hapus cropper ketika modal ditutup
                    if (cropper) {
                        cropper.destroy();
                    }
                });
            });

            $(document).ready(function() {
                $('#editDataFp').on('submit', function(event) {
                    event.preventDefault(); // Mencegah perilaku default form submit

                    // Tangkap data formulir
                    var formData = $('#editDataFp').serialize();
                    // Kirim data formulir ke halaman proses_data_fp.php menggunakan AJAX

                    // Tampilkan elemen #loading sebelum mengirimkan permintaan AJAX
                    $('#loading').css('display', 'flex');

                    $.ajax({
                        type: 'POST',
                        url: 'fp/proses_data_fp.php',
                        data: formData, // Kirim data formulir yang telah ditangkap
                        success: function(response) {

                            // Sembunyikan elemen #loading setelah permintaan AJAX selesai
                            $('#loading').hide();

                            // Tampilkan sweet alert dengan pesan respon
                            swal("Sukses!", response, "success").then((value) => {
                                // Jika pengguna menekan tombol "OK", lakukan sesuatu
                                $('#editModal').modal('hide');
                                if (value) {
                                    location.reload(); // Muat ulang halaman
                                }
                            });
                        },
                        error: function(xhr, status, error) {
                            // Sembunyikan elemen #loading dalam kasus kesalahan
                            $('#loading').hide();

                            // Tampilkan sweet alert dengan pesan error
                            swal("Error!", xhr.responseText, "error");
                        }
                    });
                });
            });

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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- End Google Map -->
</body>

</html>
<?php
session_start();

// Periksa apakah pengguna sudah masuk atau belum
if (!isset($_SESSION['id_admin'])) {
    // Pengguna belum masuk, arahkan kembali ke halaman masuk.php
    header("Location: ../../berlangganan/masuk");
    exit; // Pastikan untuk menghentikan eksekusi skrip setelah mengarahkan
}

// Jika pengguna sudah masuk, Anda dapat melanjutkan menampilkan halaman admin.php seperti biasa
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../images/logo.png">
    <title>
        Dojang Garuda | tagihan
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="../../assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../../assets/demo/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body translate="no" class="white-content">
    <div class="wrapper">
        <div class="sidebar">
            <div class="sidebar-wrapper badge-danger">
                <div class="logo">
                    <a href="javascript:void(0)" class="simple-text logo-mini">
                        <img src="../../images/logo.png" width="50px" alt="" style="position: relative; bottom: 3px;">
                    </a>
                    <a href="javascript:void(0)" class="simple-text logo-normal position-relative" style="font-size: 14px; font-weight: bold; font-style: italic; right: 10px; color: #ffffff;">
                        Dojang Garuda
                    </a>
                </div>
                <ul class="nav">
                    <li>
                        <a href="./admin">
                            <i class="tim-icons icon-chart-pie-36"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="./admin_data_jadwal">
                            <i class="fas fa-calendar-alt"></i>
                            <p>Jadwal</p>
                        </a>
                    </li>
                    <li>
                        <a href="./admin_data_sertifikat">
                            <i class="fas fa-certificate"></i>
                            <p>Sertifikat</p>
                        </a>
                    </li>
                    <li>
                        <a href="./admin_data_prestasi">
                            <i class="fas fa-trophy"></i>
                            <p>Prestasi</p>
                        </a>
                    </li>
                    <li>
                        <a href="./admin_data_pelatih">
                            <i class="fas fa-users"></i>
                            <p>Pelatih</p>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#collapsePembayaran" role="button" aria-expanded="false" aria-controls="collapsePembayaran">
                            <i class="fas fa-wallet"></i>
                            <p>Pembayaran UKT</p>
                        </a>
                        <ul class="collapse list-unstyled" id="collapsePembayaran">
                            <li>
                                <a href="./admin_data_tagihan">
                                    <i class="fas fa-money-check-alt"></i>
                                    <p>Tagihan</p>
                                </a>
                            </li>
                            <li>
                                <a href="./admin_pembayaran">
                                    <i class="fas fa-receipt"></i>
                                    <p>Bukti Pembayaran</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="./admin_data_absensi">
                            <i class="tim-icons icon-calendar-60"></i>
                            <p>Absensi</p>
                        </a>
                    </li>
                    <li style="opacity: 0;">
                        <a href="./admin_data_Report">
                            <i class="tim-icons icon-chart-bar-32"></i>
                            <p>Data</p>
                        </a>
                    </li>
                    <br>
                    <br>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle d-inline">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="javascript:void(0)">Dashboard Admin</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="search-bar input-group">
                                <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split"></i>
                                    <span class="d-lg-none d-md-block">Search</span>
                                </button>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <div class="photo">
                                        <?php
                                        // Lakukan koneksi ke database
                                        include '../../keamanan/koneksi.php';

                                        // Periksa apakah session id_admin telah diset
                                        if (isset($_SESSION['id_admin'])) {
                                            $id_admin = $_SESSION['id_admin'];

                                            // Query SQL untuk mengambil data admin berdasarkan id_admin dari session
                                            $query = "SELECT * FROM admin WHERE id_admin = '$id_admin'";
                                            $result = mysqli_query($koneksi, $query);

                                            // Periksa apakah query berhasil dieksekusi
                                            if ($result) {
                                                // Periksa apakah terdapat data admin
                                                if (mysqli_num_rows($result) > 0) {
                                                    // Ambil data admin sebagai array asosiatif
                                                    $admin = mysqli_fetch_assoc($result);
                                        ?>
                                                    <?php if (!empty($admin['fp'])) : ?>
                                                        <img class="avatar" src="data_fp/<?php echo $admin['fp']; ?>" alt="...">
                                                    <?php else : ?>
                                                        <img class="avatar" src="../../assets/img/anime3.png" alt="Profile Photo">
                                                    <?php endif; ?>
                                                    <h5 class="title">
                                                        <?php echo $admin['id_admin']; ?>
                                                    </h5>
                                        <?php
                                                } else {
                                                    // Jika tidak ada data admin
                                                    echo "Tidak ada data admin.";
                                                }
                                            } else {
                                                // Jika query tidak berhasil dieksekusi
                                                echo "Gagal mengambil data admin: " . mysqli_error($koneksi);
                                            }
                                        } else {
                                            // Jika session id_admin tidak diset
                                            echo "Session id_admin tidak tersedia.";
                                        }

                                        // Tutup koneksi ke database
                                        mysqli_close($koneksi);
                                        ?>

                                    </div>
                                    <b class="caret d-none d-lg-block d-xl-block"></b>
                                    <p class="d-lg-none">
                                        Log out
                                    </p>
                                </a>
                                <ul class="dropdown-menu dropdown-navbar">
                                    <li class="nav-link"><a href="foto_profile" class="nav-item dropdown-item">Profile</a></li>
                                    <li class="nav-link"><a href="logout" class="nav-item dropdown-item">Log
                                            out</a></li>
                                </ul>
                            </li>
                            <li class="separator d-lg-none"></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="" method="GET">
                            <div class="modal-header">
                                <input type="text" name="search_query" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="tim-icons icon-simple-remove"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Navbar -->

            <!-- Modal Tambah Data Tamabh -->
            <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTambah" style="font-size: 250%;">Tambah
                                Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="font-size: 240%;">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form untuk menambahkan data tambah -->
                            <form id="form_tambah" action="tagihan/tambah.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="tanggal_tagihan">Tangal Tagihan :</label>
                                    <input type="datetime-local" class="form-control" id="tanggal_tagihan" name="tanggal_tagihan" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_jatuh_tempo">Tangal Jatuh Tempoh :</label>
                                    <input type="datetime-local" class="form-control" id="tanggal_jatuh_tempo" name="tanggal_jatuh_tempo" required>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_tagihan">Jumlah Tagihan :</label>
                                    <input type="text" class="form-control" id="jumlah_tagihan" name="jumlah_tagihan" value="50.000" required>
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

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTambah" style="font-size: 250%;">Edit Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="font-size: 240%;">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form untuk menambahkan atau mengedit data video -->
                            <form id="form_edit" action="tagihan/edit.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" id="editid_tagihan" name="id_tagihan">
                                <div class="form-group">
                                    <label for="tanggal_tagihan">Tanggal Tagihan :</label>
                                    <input type="datetime-local" class="form-control" id="edittanggal_tagihan" name="tanggal_tagihan" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_jatuh_tempo">Tanggal Jatuh Tempo :</label>
                                    <input type="datetime-local" class="form-control" id="edittanggal_jatuh_tempo" name="tanggal_jatuh_tempo" required>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_tagihan">Jumlah Tagihan :</label>
                                    <input type="text" class="form-control" id="editjumlah_tagihan" name="jumlah_tagihan" value="50.000" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="addEditVideoForm">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function formatCurrencyInput(input) {
                    input.addEventListener('input', function(e) {
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
                }

                document.addEventListener('DOMContentLoaded', function() {
                    formatCurrencyInput(document.getElementById('editjumlah_tagihan'));

                    window.openEditModal = function(id, tanggal_tagihan, tanggal_jatuh_tempo, jumlah_tagihan) {
                        // Isi data ke dalam form edit
                        document.getElementById('editid_tagihan').value = id;
                        document.getElementById('edittanggal_tagihan').value = tanggal_tagihan;
                        document.getElementById('edittanggal_jatuh_tempo').value = tanggal_jatuh_tempo;

                        // Format jumlah tagihan sebelum menampilkan di input
                        const formattedJumlahTagihan = jumlah_tagihan.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                        document.getElementById('editjumlah_tagihan').value = formattedJumlahTagihan;

                        $('#editModal').modal('show');
                    };
                });
            </script>


            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="places-buttons">
                                    <div class="row">
                                        <div class="col-md-6 ml-auto mr-auto text-center">
                                            <h2 class="card-title">
                                                Data Tagihan
                                            </h2>

                                            <p class="category">Clik untuk menambah data Tagihan</p>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 ml-auto mr-auto">
                                            <div class="row justify-content-center align-items-center">
                                                <div class="col-md-4">
                                                    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalTambah">Tambah </button>
                                                    <!-- Tombol alat_export -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table tablesorter " id="dataTable">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th class="text-center">
                                                    Nomor
                                                </th>
                                                <th class="text-center">
                                                    Tanggal Tagihan
                                                </th>
                                                <th class="text-center">
                                                    Tanggal Jatuh Tempo
                                                </th>
                                                <th class="text-center">
                                                    Jumlah
                                                </th>
                                                <th class="text-center">
                                                    Edit
                                                </th>
                                                <th class="text-center">
                                                    Hapus
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Lakukan koneksi ke database
                                            include '../../keamanan/koneksi.php';

                                            // Ambil kata kunci pencarian dari URL jika ada
                                            $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';

                                            // Query SQL untuk mengambil data dari tabel tagihan
                                            $query = "SELECT * FROM tagihan";

                                            // Jika ada kata kunci pencarian, tambahkan klausa WHERE untuk mencocokkan 
                                            if (!empty($search_query)) {
                                                $query .= " WHERE tanggal_tagihan LIKE '%$search_query%' OR tanggal_jatuh_tempo LIKE '%$search_query%' OR jumlah_tagihan LIKE '%$search_query%'";
                                            }

                                            // Balik urutan data untuk memunculkan yang paling baru di atas
                                            $query .= " ORDER BY id_tagihan DESC";
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
                                                    echo "<tr>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($counter, ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['tanggal_tagihan'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['tanggal_jatuh_tempo'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['jumlah_tagihan'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>
                                                                    <button class='btn btn-primary btn-sm' onclick='openEditModal(\"" . $row['id_tagihan'] . "\", \"" . $tanggal_tagihan_data . "\", \"" . $tanggal_jatuh_tempo_data . "\", \"" . $row['jumlah_tagihan'] . "\")'>Edit</button>
                                                            </td>";
                                                    echo "<td class='text-center'>
                                                            <button class='btn btn-danger btn-sm' onclick='hapus(\"" . htmlspecialchars($row['id_tagihan'], ENT_QUOTES) . "\")'>Hapus</button>
                                                            </td>";
                                                    echo "</tr>";
                                                    $counter++;
                                                }

                                                // Jika tidak ada data yang ditemukan
                                                if ($counter == 1) {
                                                    echo "<tr><td class='text-center' colspan='5'><h3>Belum ada data Tagihan</h3></td></tr>";
                                                }
                                            } else {
                                                echo "<tr><td class='text-center' colspan='5'><h3>Gagal mengambil data dari database</h3></td></tr>";
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
                </div>
            </div>
            <style>
                .button-like {
                    display: inline-block;
                    padding: 7px 20px;
                    background-color: #007bff;
                    border: 1px solid #ccc;
                    border-radius: 10px;
                    cursor: default;
                    color: #fff;
                }
            </style>
            <footer class="footer">
                <div class="container-fluid">
                    <ul class="nav">

                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link">
                                About Us
                            </a>
                        </li>

                    </ul>
                    <div class="copyright">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> Dibuat Oleh AJHARI HUSEN
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!--=============== LOADING ===============-->
    <div class="loading">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                xhr.open('POST', 'tagihan/tambah.php', true);
                xhr.onload = function() {
                    // Sembunyikan elemen .loading setelah permintaan AJAX selesai
                    loding.style.display = 'none';

                    if (xhr.status === 200) {
                        var response = xhr.responseText;
                        if (response === 'success') {
                            swal("Berhasil!", "Data berhasil ditambahkan", "success");
                            // Reset form setelah berhasil
                            form.reset();
                            // Tutup modal setelah berhasil
                            $('#modalTambah').modal('hide');
                            // Muat ulang tabel
                            loadTable();
                        } else if (response === 'data_tidak_lengkap') {
                            swal("Error", "Data yang anda masukan belum lengkap", "error");
                        } else if (response === 'data_username_sudah_ada') {
                            swal("Username Salah!",
                                "Data username sudah digunakan silakan gunakan username lain",
                                "error");
                        } else {
                            swal("Error", "Gagal menambahkan data", "error");
                        }
                    } else {
                        swal("Error", "Terjadi kesalahan saat mengirim data", "error");
                    }
                };
                xhr.send(formData);
            });
        });

        // logika untuk mengedit Data
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('form_edit').addEventListener('submit', function(event) {
                event.preventDefault(); // Menghentikan aksi default form submit

                var form = this;
                var formData = new FormData(form);
                // Tampilkan elemen .loading sebelum mengirimkan permintaan AJAX
                loding.style.display = 'flex';

                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'tagihan/edit.php', true);
                xhr.onload = function() {

                    // Sembunyikan elemen .loading setelah permintaan AJAX selesai
                    loding.style.display = 'none';

                    if (xhr.status === 200) {
                        var response = xhr.responseText;
                        if (response === 'success') {
                            swal("Suksess!", "Data berhasil diedit", "success");
                            loadTable();
                            // Reset form setelah berhasil
                            form.reset();
                            // Tutup modal setelah berhasil
                            $('#editModal').modal('hide');
                        } else if (response === 'data_tidak_lengkap') {
                            swal("Error", "Data edit yang anda masukan belum lengkap",
                                "error");
                        } else if (response === 'data_username_sudah_ada') {
                            swal("Username Salah!",
                                "Data username sudah digunakan silakan gunakan username lain",
                                "error");
                        } else {
                            swal("Error", "Gagal mengedit data", "error");
                        }
                    } else {
                        swal("Error", "Terjadi kesalahan saat mengirim data", "error");
                    }
                };
                xhr.send(formData);
            });
        });

        // logika untuk menghapus data video
        function hapus(id) {
            swal({
                    title: "Apakah Anda yakin?",
                    text: "Setelah dihapus, Anda tidak akan dapat memulihkan data ini!",
                    icon: "warning",
                    buttons: ["Batal", "Ya, hapus!"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // Jika pengguna mengonfirmasi untuk menghapus
                        var xhr = new XMLHttpRequest();

                        // Tampilkan elemen .loading sebelum mengirimkan permintaan AJAX
                        loding.style.display = 'flex';

                        xhr.open('POST', 'tagihan/hapus.php', true);
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhr.onload = function() {

                            // Sembunyikan elemen .loading setelah permintaan AJAX selesai
                            loding.style.display = 'none';

                            if (xhr.status === 200) {
                                var response = xhr.responseText;
                                if (response === 'success') {
                                    swal("Sukses!", "Data berhasil dihapus.", "success")
                                    loadTable();
                                } else {
                                    swal("Error", "Gagal menghapus Data.", "error");
                                }
                            } else {
                                swal("Error", "Terjadi kesalahan saat mengirim data.", "error");
                            }
                        };
                        xhr.send("id=" + id);
                    } else {
                        // Jika pengguna membatalkan penghapusan
                        swal("Penghapusan dibatalkan", {
                            icon: "info",
                        });
                    }
                });
        }


        function loadTable() {
            var xhrTable = new XMLHttpRequest();
            xhrTable.onreadystatechange = function() {
                if (xhrTable.readyState == 4 && xhrTable.status == 200) {
                    // Perbarui konten tabel dengan respons dari server
                    document.getElementById('dataTable').innerHTML = xhrTable.responseText;
                }
            };
            xhrTable.open('GET', 'tagihan/load_table.php', true);
            xhrTable.send();
        }
    </script>

    <!--   Core JS Files   -->
    <script src="../../assets/js/core/jquery.min.js"></script>
    <script src="../../assets/js/core/popper.min.js"></script>
    <script src="../../assets/js/core/bootstrap.min.js"></script>
    <script src="../../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <!-- Place this tag in your head or just before your close body tag. -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="../../assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../assets/js/black-dashboard.min.js?v=1.0.0"></script>
    <!-- Black Dashboard DEMO methods, don't include it in your project! -->
    <script src="../../assets/demo/demo.js"></script>
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

        });
    </script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
        window.TrackJS &&
            TrackJS.install({
                token: "ee6fab19c5a04ac1a32a645abde4613a",
                application: "black-dashboard-free"
            });
    </script>
</body>

</html>
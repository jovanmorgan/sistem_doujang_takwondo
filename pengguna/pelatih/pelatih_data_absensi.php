<?php
session_start();

// Periksa apakah pengguna sudah masuk atau belum
if (!isset($_SESSION['id_pelatih'])) {
    // Pengguna belum masuk, arahkan kembali ke halaman masuk.php
    header("Location: ../../berlangganan/masuk");
    exit; // Pastikan untuk menghentikan eksekusi skrip setelah mengarahkan
}

// Jika pengguna sudah masuk, Anda dapat melanjutkan menampilkan halaman pelatih.php seperti biasa
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../images/logo.png">
    <title>
        Dojang Garuda | Absensi
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
                        <a href="./pelatih">
                            <i class="tim-icons icon-chart-pie-36"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="./pelatih_data_jadwal">
                            <i class="fas fa-calendar-alt"></i>
                            <p>Jadwal</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="./pelatih_data_absensi">
                            <i class="tim-icons icon-calendar-60"></i>
                            <p>Absensi</p>
                        </a>
                    </li>
                    <li style="opacity: 0;">
                        <a href="./pelatih_data_Report">
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
                        <a class="navbar-brand" href="javascript:void(0)">Dashboard pelatih</a>
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

                                        // Periksa apakah session id_pelatih telah diset
                                        if (isset($_SESSION['id_pelatih'])) {
                                            $id_pelatih = $_SESSION['id_pelatih'];

                                            // Query SQL untuk mengambil data pelatih berdasarkan id_pelatih dari session
                                            $query = "SELECT * FROM pelatih WHERE id_pelatih = '$id_pelatih'";
                                            $result = mysqli_query($koneksi, $query);

                                            // Periksa apakah query berhasil dieksekusi
                                            if ($result) {
                                                // Periksa apakah terdapat data pelatih
                                                if (mysqli_num_rows($result) > 0) {
                                                    // Ambil data pelatih sebagai array asosiatif
                                                    $pelatih = mysqli_fetch_assoc($result);
                                        ?>
                                                    <?php if (!empty($pelatih['fp'])) : ?>
                                                        <img class="avatar" src="data_fp/<?php echo $pelatih['fp']; ?>" alt="...">
                                                    <?php else : ?>
                                                        <img class="avatar" src="../../assets/img/anime3.png" alt="Profile Photo">
                                                    <?php endif; ?>
                                                    <h5 class="title">
                                                        <?php echo $pelatih['id_pelatih']; ?>
                                                    </h5>
                                        <?php
                                                } else {
                                                    // Jika tidak ada data pelatih
                                                    echo "Tidak ada data pelatih.";
                                                }
                                            } else {
                                                // Jika query tidak berhasil dieksekusi
                                                echo "Gagal mengambil data pelatih: " . mysqli_error($koneksi);
                                            }
                                        } else {
                                            // Jika session id_pelatih tidak diset
                                            echo "Session id_pelatih tidak tersedia.";
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

            <!-- Modal Tambah Data -->
            <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTambah" style="font-size: 250%;">Tambah Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="font-size: 240%;">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form untuk menambahkan data -->
                            <form id="form_tambah" action="absensi/tambah.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="waktu">Waktu :</label>
                                            <input type="datetime-local" class="form-control" id="waktu" name="waktu" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lokasi">Lokasi :</label>
                                            <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                include '../../keamanan/koneksi.php';
                                $query_user = "SELECT id_user, nama FROM user";
                                $result_user = $koneksi->query($query_user);
                                ?>
                                <!-- Table for students -->
                                <div class="form-group">
                                    <label for="user">Data user:</label>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama user</th>
                                                <th>Hadir</th>
                                                <th>Alpa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($result_user) {
                                                if ($result_user->num_rows > 0) {
                                                    while ($row_user = $result_user->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>" . $row_user['nama'] . "</td>";
                                                        echo "<td><input type='radio' name='status_kehadiran[" . $row_user['id_user'] . "]' value='hadir'></td>";
                                                        echo "<td><input type='radio' name='status_kehadiran[" . $row_user['id_user'] . "]' value='alpa'></td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td class='text-center' colspan='5'>Data user yang berkaitan tidak ada.</td></tr>";
                                                }
                                                $result_user->free();
                                            } else {
                                                echo "<tr><td colspan='5'>Gagal mengeksekusi query user: " . $koneksi->error . "</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $koneksi->close();
            ?>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel" style="font-size: 250%;">Edit Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="font-size: 240%;">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form untuk menambahkan atau mengedit data absensi -->
                            <form id="form_edit" action="absensi/edit.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" id="editid_absensi" name="id_absensi">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="waktu">Waktu :</label>
                                            <input type="datetime-local" class="form-control" id="editwaktu" name="waktu" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lokasi">Lokasi :</label>
                                            <input type="text" class="form-control" id="editlokasi" name="lokasi" required>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                include '../../keamanan/koneksi.php';
                                $query_user = "SELECT id_user, nama FROM user";
                                $result_user = $koneksi->query($query_user);
                                ?>
                                <!-- Table for students -->
                                <div class="form-group">
                                    <label for="user">Data user:</label>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama user</th>
                                                <th>Hadir</th>
                                                <th>Alpa</th>
                                            </tr>
                                        </thead>
                                        <tbody id="studentsData">
                                            <!-- Data user akan diisi oleh JavaScript -->
                                        </tbody>
                                    </table>
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
                function openEditModal(id_absensi, waktu, lokasi, hadir, alpa) {
                    // Isi data ke dalam form edit
                    document.getElementById('editid_absensi').value = id_absensi;
                    document.getElementById('editwaktu').value = waktu;
                    document.getElementById('editlokasi').value = lokasi;

                    // Parse data kehadiran
                    var hadirArray = hadir ? hadir.split(',') : [];
                    var alpaArray = alpa ? alpa.split(',') : [];

                    // Fetch user data and populate the table
                    fetch('absensi/get_user_data.php')
                        .then(response => response.json())
                        .then(data => {
                            if (data.error) {
                                console.error(data.error);
                                return;
                            }

                            var studentsData = document.getElementById('studentsData');
                            studentsData.innerHTML = '';
                            data.forEach(user => {
                                var row = document.createElement('tr');
                                var hadirChecked = hadirArray.includes(user.id_user.toString()) ? 'checked' :
                                    '';
                                var alpaChecked = alpaArray.includes(user.id_user.toString()) ? 'checked' :
                                    '';

                                row.innerHTML = `
                    <td>${user.nama}</td>
                    <td><input type='radio' name='status_kehadiran[${user.id_user}]' value='hadir' ${hadirChecked}></td>
                    <td><input type='radio' name='status_kehadiran[${user.id_user}]' value='alpa' ${alpaChecked}></td>
                `;
                                studentsData.appendChild(row);
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching user data:', error);
                        });

                    $('#editModal').modal('show');
                }
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
                                                Data absensi
                                            </h2>

                                            <p class="category">Clik untuk menambah data absensi</p>
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
                                                <th class="text-center">Nomor</th>
                                                <th class="text-center">Waktu</th>
                                                <th class="text-center">Lokasi</th>
                                                <th class="text-center">Hadir</th>
                                                <th class="text-center">Alpa</th>
                                                <th class="text-center">Edit</th>
                                                <th class="text-center">Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Lakukan koneksi ke database
                                            include '../../keamanan/koneksi.php';
                                            // Ambil kata kunci pencarian dari URL jika ada
                                            $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';
                                            // Query SQL untuk mengambil data dari tabel absensi
                                            $query = "SELECT * FROM absensi";
                                            // Jika ada kata kunci pencarian, tambahkan klausa WHERE untuk mencocokkan 
                                            if (!empty($search_query)) {
                                                $query .= " WHERE lokasi LIKE '%$search_query%' OR user.waktu LIKE '%$search_query%' OR alpa LIKE '%$search_query%' OR hadir LIKE '%$search_query%'";
                                            }
                                            // Balik urutan data untuk memunculkan yang paling baru di atas
                                            $query .= " ORDER BY id_absensi DESC";
                                            $result = mysqli_query($koneksi, $query);
                                            // Variabel untuk menyimpan nomor urut
                                            $counter = 1;
                                            // Cek jika query berhasil dieksekusi
                                            if ($result) {
                                                // Lakukan iterasi untuk menampilkan setiap baris data dalam tabel
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $hadir = !empty($row['hadir']) ? count(explode(',', $row['hadir'])) : '-';
                                                    $alpa = !empty($row['alpa']) ? count(explode(',', $row['alpa'])) : '-';
                                                    $waktu_input = $row['waktu'];
                                                    $waktu_input_data = date('Y-m-d\TH:i', strtotime($waktu_input));
                                                    echo "<tr>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($counter, ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['waktu'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['lokasi'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . $hadir . "</td>";
                                                    echo "<td class='text-center'>" . $alpa . "</td>";
                                                    echo "<td class='text-center'>
                                                            <button class='btn btn-primary btn-sm' onclick='openEditModal(
                                                                \"" . $row['id_absensi'] . "\",
                                                                \"" . $waktu_input_data . "\",
                                                                \"" . $row['lokasi'] . "\",
                                                                \"" . $row['hadir'] . "\",
                                                                \"" . $row['alpa'] . "\"
                                                            )'>Lihat & Edit</button>
                                                        </td>";
                                                    echo "<td class='text-center'>
                                                            <button class='btn btn-danger btn-sm' onclick='hapus(\"" . htmlspecialchars($row['id_absensi'], ENT_QUOTES) . "\")'>Hapus</button>
                                                        </td>";
                                                    echo "</tr>";
                                                    // Increment nomor urut
                                                    $counter++;
                                                }
                                            } else {
                                                echo "<td class='text-center' colspan='7'><h3>Gagal mengambil data dari database</h3></td>";
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
                xhr.open('POST', 'absensi/tambah.php', true);
                xhr.onload = function() {
                    // Sembunyikan elemen .loading setelah permintaan AJAX selesai
                    loding.style.display = 'none';

                    if (xhr.status === 200) {
                        var response = xhr.responseText;
                        if (response === 'success') {
                            // Tutup modal setelah berhasil
                            $('#modalTambah').modal('hide');
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
                xhr.open('POST', 'absensi/edit.php', true);
                xhr.onload = function() {

                    // Sembunyikan elemen .loading setelah permintaan AJAX selesai
                    loding.style.display = 'none';

                    if (xhr.status === 200) {
                        var response = xhr.responseText;
                        if (response === 'success') {
                            // Tutup modal setelah berhasil
                            $('#editModal').modal('hide');
                            swal("Suksess!", "Data berhasil diedit", "success");
                            loadTable();
                            // Reset form setelah berhasil
                            form.reset();
                        } else if (response === 'data_tidak_lengkap') {
                            swal("Error", "Data edit yang anda masukan belum lengkap", "error");
                        } else if (response === 'data_username_sudah_ada') {
                            swal("Username Salah!", "Data username sudah digunakan silakan gunakan username lain", "error");
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

                        xhr.open('POST', 'absensi/hapus.php', true);
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
            xhrTable.open('GET', 'absensi/load_table.php', true);
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
<?php
include '../../../keamanan/koneksi.php';

// Terima data dari formulir HTML
$id_pelatih = $_POST['id_pelatih'];
$nama = $_POST['nama'];
$nomor_registrasi = $_POST['nomor_registrasi'];
$password = $_POST['password'];
$tingkat_sabuk = $_POST['tingkat_sabuk'];

// Lakukan validasi data
if (empty($nama) || empty($nomor_registrasi) || empty($password) || empty($tingkat_sabuk)) {
    echo "data_tidak_lengkap";
    exit();
}

if (strlen($password) < 8) {
    echo "error_password_length";
    exit();
}

if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/", $password)) {
    echo "error_password_strength";
    exit();
}

if (strlen($nomor_registrasi) < 12) {
    echo "nomor_registrasi_belum_pas";
    exit();
}

// pengecekan nomor_registrasi pada admin
$check_query = "SELECT * FROM admin WHERE nomor_registrasi = '$nomor_registrasi'";
$check_result = mysqli_query($koneksi, $check_query);
if (mysqli_num_rows($check_result) > 0) {
    echo "data_nomor_registrasi_sudah_ada";
    exit();
}

// pengecekan nomor_registrasi pada pelatih
$check_query_pelatih = "SELECT * FROM pelatih WHERE nomor_registrasi = '$nomor_registrasi' AND id_pelatih != '$id_pelatih'";
$check_result_pelatih = mysqli_query($koneksi, $check_query_pelatih);
if (mysqli_num_rows($check_result_pelatih) > 0) {
    echo "data_nomor_registrasi_sudah_ada";
    exit();
}

// pengecekan nomor_registrasi pada user
$check_query_user = "SELECT * FROM user WHERE nomor_registrasi = '$nomor_registrasi'";
$check_result_user = mysqli_query($koneksi, $check_query_user);
if (mysqli_num_rows($check_result_user) > 0) {
    echo "data_nomor_registrasi_sudah_ada";
    exit();
}

// Buat query SQL untuk memperbarui data pelatih di dalam database
$query = "UPDATE pelatih SET nama='$nama', nomor_registrasi='$nomor_registrasi', password='$password', tingkat_sabuk='$tingkat_sabuk' WHERE id_pelatih ='$id_pelatih'";

// Jalankan query
if (mysqli_query($koneksi, $query)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);

<?php
include 'koneksi.php';

// Cek apakah ada data yang dikirim dari form sign-up-form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nama']) && isset($_POST['nomor_registrasi']) && isset($_POST['password']) && isset($_POST['tingkat_sabuk'])) {
    // Tangkap data dari form
    $nama = $_POST['nama'];
    $nomor_registrasi = $_POST['nomor_registrasi'];
    $password = $_POST['password'];
    $tingkat_sabuk = $_POST['tingkat_sabuk'];

    // Cek apakah nomor_registrasi sudah ada di database
    $check_query = "SELECT * FROM user WHERE nomor_registrasi = '$nomor_registrasi'";
    $result = mysqli_query($koneksi, $check_query);
    if (mysqli_num_rows($result) > 0) {
        echo "error_nomor_registrasi_exists"; // Kirim respon "error_email_exists" jika email sudah terdaftar
        exit();
    }
    // Cek apakah nomor_registrasi sudah ada di database
    $check_query_admin = "SELECT * FROM admin WHERE nomor_registrasi = '$nomor_registrasi'";
    $result_admin = mysqli_query($koneksi, $check_query_admin);
    if (mysqli_num_rows($result_admin) > 0) {
        echo "error_nomor_registrasi_exists"; // Kirim respon "error_email_exists" jika email sudah terdaftar
        exit();
    }
    // Cek apakah nomor_registrasi sudah ada di database
    $check_query_pelatih = "SELECT * FROM pelatih WHERE nomor_registrasi = '$nomor_registrasi'";
    $result_pelatih = mysqli_query($koneksi, $check_query_pelatih);
    if (mysqli_num_rows($result_pelatih) > 0) {
        echo "error_nomor_registrasi_exists"; // Kirim respon "error_email_exists" jika email sudah terdaftar
        exit();
    }

    // Tambahkan logika untuk memeriksa panjang password
    if (strlen($nomor_registrasi) < 12) {
        echo "nomor_registrasi_belum_pas"; // Kirim respon "error_password_length" jika panjang password kurang dari 8 karakter
        exit();
    }

    if (strlen($password) < 8) {
        echo "error_password_length"; // Kirim respon "error_password_length" jika panjang password kurang dari 8 karakter
        exit();
    }

    // Tambahkan logika untuk memeriksa password
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/", $password)) {
        echo "error_password_strength"; // Kirim respon "error_password_strength" jika password tidak memenuhi syarat
        exit();
    }

    // Lakukan penambahan data ke dalam database
    $query = "INSERT INTO user (nama, nomor_registrasi, password, tingkat_sabuk) VALUES ( '$nama', '$nomor_registrasi','$password','$tingkat_sabuk')";
    if (mysqli_query($koneksi, $query)) {
        // Kirim respon "success" jika data berhasil ditambahkan
        echo "success";
    } else {
        // Kirim respon "error" jika terjadi kesalahan
        echo "error";
    }
}

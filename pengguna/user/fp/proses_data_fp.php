<?php
// Lakukan koneksi ke database
include '../../../keamanan/koneksi.php';

// Cek apakah terdapat data yang dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data yang dikirimkan melalui form
    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $tingkat_sabuk = $_POST['tingkat_sabuk'];
    $password = $_POST['password'];

    // Lakukan validasi data
    if (empty($nama) || empty($tingkat_sabuk) || empty($password)) {
        echo "data tidak lengkap";
        exit();
    }

    // Query SQL untuk update data foto profile
    $query = "UPDATE user SET tingkat_sabuk='$tingkat_sabuk', password='$password', nama='$nama' WHERE id_user='$id_user'";

    // Lakukan proses update data foto profile di database
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        echo "success";
        exit();
    } else {
        // Jika terjadi kesalahan saat melakukan proses update, tampilkan pesan kesalahan
        echo "Gagal melakukan proses update data foto profile: " . mysqli_error($koneksi);
    }
} else {
    // Jika metode request bukan POST, berikan respons yang sesuai
    echo "Invalid request method";
    exit();
}

// Tutup koneksi ke database
mysqli_close($koneksi);

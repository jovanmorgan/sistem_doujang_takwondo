<?php
include '../../../keamanan/koneksi.php';

// Terima ID absensi yang akan dihapus dari formulir HTML
$id_absensi = $_POST['id']; // Ubah menjadi $_GET jika menggunakan metode GET

// Lakukan validasi data
if (empty($id_absensi)) {
    echo "data_tidak_lengkap";
    exit();
}

// Buat query SQL untuk menghapus data absensi berdasarkan ID
$query_delete_absensi = "DELETE FROM absensi WHERE id_absensi = '$id_absensi'";

// Jalankan query untuk menghapus data
if (mysqli_query($koneksi, $query_delete_absensi)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);

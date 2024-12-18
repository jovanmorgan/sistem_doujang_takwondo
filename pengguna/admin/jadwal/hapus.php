<?php
include '../../../keamanan/koneksi.php';

// Terima ID jadwal yang akan dihapus dari formulir HTML
$id_jadwal = $_POST['id']; // Ubah menjadi $_GET jika menggunakan metode GET

// Lakukan validasi data
if (empty($id_jadwal)) {
    echo "data_tidak_lengkap";
    exit();
}

// Buat query SQL untuk menghapus data jadwal berdasarkan ID
$query_delete_jadwal = "DELETE FROM jadwal WHERE id_jadwal = '$id_jadwal'";

// Jalankan query untuk menghapus data
if (mysqli_query($koneksi, $query_delete_jadwal)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);

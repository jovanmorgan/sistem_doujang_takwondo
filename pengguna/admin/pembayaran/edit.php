<?php
include '../../../keamanan/koneksi.php';

// Terima data dari formulir HTML
$id_pembayaran = $_POST['id'];

// Lakukan validasi data
if (empty($id_pembayaran)) {
    echo "data_tidak_lengkap";
    exit();
}

$status_pembayaran = "Sudah Lunas";

// Buat query SQL untuk mengupdate data
$query_update = "UPDATE pembayaran SET status_pembayaran = '$status_pembayaran' WHERE id_pembayaran = '$id_pembayaran'";

// Jalankan query
if (mysqli_query($koneksi, $query_update)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);

<?php
include '../../../keamanan/koneksi.php';

// Terima ID pembayaran yang akan dihapus dari formulir HTML
$id_pembayaran = $_POST['id']; // Ubah menjadi $_GET jika menggunakan metode GET

// Lakukan validasi data
if (empty($id_pembayaran)) {
    echo "data_tidak_lengkap";
    exit();
}

// Buat query SQL untuk mendapatkan path bukti_tf yang akan dihapus
$query_get_bukti_tf = "SELECT bukti_tf FROM pembayaran WHERE id_pembayaran = '$id_pembayaran'";
$result = mysqli_query($koneksi, $query_get_bukti_tf);
$row = mysqli_fetch_assoc($result);
$bukti_tf_to_delete = $row['bukti_tf'];

// Buat query SQL untuk memeriksa apakah ada data lain yang menggunakan file bukti_tf yang akan dihapus
$query_check_bukti_tf = "SELECT COUNT(*) AS total FROM pembayaran WHERE bukti_tf = '$bukti_tf_to_delete'";
$result_check = mysqli_query($koneksi, $query_check_bukti_tf);
$row_check = mysqli_fetch_assoc($result_check);
$total_pengguna_bukti_tf = $row_check['total'];

// Jika tidak ada data lain yang menggunakan file bukti_tf, hapus bukti_tf
if ($total_pengguna_bukti_tf <= 1) {
    // Hapus file bukti_tf dari folder
    unlink($bukti_tf_to_delete);
}

// Buat query SQL untuk menghapus data pembayaran berdasarkan ID
$query_delete_pembayaran = "DELETE FROM pembayaran WHERE id_pembayaran = '$id_pembayaran'";

// Jalankan query untuk menghapus data
if (mysqli_query($koneksi, $query_delete_pembayaran)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);

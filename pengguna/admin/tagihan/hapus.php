<?php
include '../../../keamanan/koneksi.php';

// Terima ID tagihan yang akan dihapus dari formulir HTML
$id_tagihan = $_POST['id']; // Ubah menjadi $_GET jika menggunakan metode GET

// Lakukan validasi data
if (empty($id_tagihan)) {
    echo "data_tidak_lengkap";
    exit();
}

// Buat query SQL untuk menghapus data tagihan berdasarkan ID
$query_delete_tagihan = "DELETE FROM tagihan WHERE id_tagihan = '$id_tagihan'";

// Jalankan query untuk menghapus data
if (mysqli_query($koneksi, $query_delete_tagihan)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);

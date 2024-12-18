<?php
include '../../../keamanan/koneksi.php';

// Terima ID pelatih yang akan dihapus dari formulir HTML
$id_pelatih = $_POST['id']; // Ubah menjadi $_GET jika menggunakan metode GET

// Lakukan validasi data
if (empty($id_pelatih)) {
    echo "data_tidak_lengkap";
    exit();
}

// Buat query SQL untuk menghapus data pelatih berdasarkan ID
$query_delete_pelatih = "DELETE FROM pelatih WHERE id_pelatih = '$id_pelatih'";

// Jalankan query untuk menghapus data
if (mysqli_query($koneksi, $query_delete_pelatih)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);

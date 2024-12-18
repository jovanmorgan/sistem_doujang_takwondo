<?php
include '../../../keamanan/koneksi.php';

// Terima ID sertifikat yang akan dihapus dari formulir HTML
$id_sertifikat = $_POST['id']; // Ubah menjadi $_GET jika menggunakan metode GET

// Lakukan validasi data
if (empty($id_sertifikat)) {
    echo "data_tidak_lengkap";
    exit();
}

// Buat query SQL untuk mendapatkan path foto yang akan dihapus
$query_get_foto = "SELECT foto FROM sertifikat WHERE id_sertifikat = '$id_sertifikat'";
$result = mysqli_query($koneksi, $query_get_foto);
$row = mysqli_fetch_assoc($result);
$foto_to_delete = $row['foto'];

// Buat query SQL untuk memeriksa apakah ada data lain yang menggunakan file foto yang akan dihapus
$query_check_foto = "SELECT COUNT(*) AS total FROM sertifikat WHERE foto = '$foto_to_delete'";
$result_check = mysqli_query($koneksi, $query_check_foto);
$row_check = mysqli_fetch_assoc($result_check);
$total_pengguna_foto = $row_check['total'];

// Jika tidak ada data lain yang menggunakan file foto, hapus foto
if ($total_pengguna_foto <= 1) {
    // Hapus file foto dari folder
    unlink($foto_to_delete);
}

// Buat query SQL untuk menghapus data sertifikat berdasarkan ID
$query_delete_sertifikat = "DELETE FROM sertifikat WHERE id_sertifikat = '$id_sertifikat'";

// Jalankan query untuk menghapus data
if (mysqli_query($koneksi, $query_delete_sertifikat)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);

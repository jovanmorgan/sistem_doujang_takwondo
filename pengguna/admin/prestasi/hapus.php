<?php
include '../../../keamanan/koneksi.php';

// Terima ID prestasi yang akan dihapus dari formulir HTML
$id_prestasi = $_POST['id']; // Ubah menjadi $_GET jika menggunakan metode GET

// Lakukan validasi data
if (empty($id_prestasi)) {
    echo "data_tidak_lengkap";
    exit();
}

// Buat query SQL untuk mendapatkan path foto yang akan dihapus
$query_get_foto = "SELECT foto FROM prestasi WHERE id_prestasi = '$id_prestasi'";
$result = mysqli_query($koneksi, $query_get_foto);
$row = mysqli_fetch_assoc($result);
$foto_to_delete = $row['foto'];

// Buat query SQL untuk memeriksa apakah ada data lain yang menggunakan file foto yang akan dihapus
$query_check_foto = "SELECT COUNT(*) AS total FROM prestasi WHERE foto = '$foto_to_delete'";
$result_check = mysqli_query($koneksi, $query_check_foto);
$row_check = mysqli_fetch_assoc($result_check);
$total_pengguna_foto = $row_check['total'];

// Jika tidak ada data lain yang menggunakan file foto, hapus foto
if ($total_pengguna_foto <= 1) {
    // Hapus file foto dari folder
    unlink($foto_to_delete);
}

// Buat query SQL untuk menghapus data prestasi berdasarkan ID
$query_delete_prestasi = "DELETE FROM prestasi WHERE id_prestasi = '$id_prestasi'";

// Jalankan query untuk menghapus data
if (mysqli_query($koneksi, $query_delete_prestasi)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);

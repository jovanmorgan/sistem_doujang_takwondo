<?php
include '../../../keamanan/koneksi.php';

// Terima data dari formulir HTML
$id_jadwal = $_POST['id_jadwal'];
$metode = $_POST['metode'];
$lokasi = $_POST['lokasi'];
$waktu = $_POST['waktu'];
$deskripsi = $_POST['deskripsi'];

// Lakukan validasi data
if (empty($id_jadwal) || empty($metode) || empty($waktu) || empty($lokasi) || empty($deskripsi)) {
    echo "data_tidak_lengkap";
    exit();
}

// Format tanggal ke format yang diinginkan
$tanggal_formatted = date('d-M-Y H:i', strtotime($waktu));
// Konversi tag <br> kembali menjadi newline (\n)
$deskripsi_data = str_replace('<br>', "\n", $deskripsi);

// Buat query SQL untuk mengupdate data
$query_update = "UPDATE jadwal SET metode = '$metode', lokasi = '$lokasi', waktu = '$tanggal_formatted', deskripsi = '$deskripsi_data' WHERE id_jadwal = '$id_jadwal'";

// Jalankan query
if (mysqli_query($koneksi, $query_update)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);

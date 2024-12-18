<?php
include '../../../keamanan/koneksi.php';

// Terima data dari formulir HTML
$metode = $_POST['metode'];
$lokasi = $_POST['lokasi'];
$waktu = $_POST['waktu'];
$deskripsi = $_POST['deskripsi'];

// Lakukan validasi data
if (empty($metode) || empty($waktu) || empty($lokasi) || empty($deskripsi)) {
    echo "data_tidak_lengkap";
    exit();
}

// Format tanggal ke format yang diinginkan
$tanggal_formatted = date('d-M-Y H:i', strtotime($waktu));
// Konversi tag <br> kembali menjadi newline (\n)
$deskripsi = str_replace('<br>', "\n", $deskripsi);

// Buat query SQL untuk menambahkan data kegiatan ke dalam database
$query = "INSERT INTO jadwal (metode, lokasi, waktu, deskripsi) 
        VALUES ('$metode', '$lokasi', '$tanggal_formatted', '$deskripsi')";

// Jalankan query
if (mysqli_query($koneksi, $query)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);

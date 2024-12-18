<?php
include '../../../keamanan/koneksi.php';

// Terima data dari formulir HTML
$tanggal_tagihan = $_POST['tanggal_tagihan'];
$tanggal_jatuh_tempo = $_POST['tanggal_jatuh_tempo'];
$jumlah_tagihan = $_POST['jumlah_tagihan'];

// Lakukan validasi data
if (empty($tanggal_tagihan) || empty($tanggal_jatuh_tempo) || empty($jumlah_tagihan)) {
    echo "data_tidak_lengkap";
    exit();
}

// Format tanggal ke format yang diinginkan
$tanggal_tagihan_formatted = date('d-M-Y H:i', strtotime($tanggal_tagihan));
$tanggal_jatuh_tempo_formatted = date('d-M-Y H:i', strtotime($tanggal_jatuh_tempo));

// Buat query SQL untuk menambahkan data kegiatan ke dalam database
$query = "INSERT INTO tagihan (tanggal_tagihan, tanggal_jatuh_tempo, jumlah_tagihan) 
        VALUES ('$tanggal_tagihan_formatted', '$tanggal_jatuh_tempo_formatted', '$jumlah_tagihan')";

// Jalankan query
if (mysqli_query($koneksi, $query)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);

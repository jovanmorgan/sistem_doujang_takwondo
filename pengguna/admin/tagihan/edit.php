<?php
include '../../../keamanan/koneksi.php';

// Terima data dari formulir HTML
$id_tagihan = $_POST['id_tagihan'];
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

// Buat query SQL untuk mengupdate data
$query_update = "UPDATE tagihan SET tanggal_tagihan = '$tanggal_tagihan', tanggal_jatuh_tempo = '$tanggal_jatuh_tempo', jumlah_tagihan = '$jumlah_tagihan' WHERE id_tagihan = '$id_tagihan'";

// Jalankan query
if (mysqli_query($koneksi, $query_update)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);

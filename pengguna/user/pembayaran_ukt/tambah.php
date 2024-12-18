<?php
include '../../../keamanan/koneksi.php';

// Terima data dari formulir HTML
$id_user = $_POST['id_user'];
$id_tagihan = $_POST['id_tagihan'];
$tanggal_pembayaran = $_POST['tanggal_pembayaran'];
$jumlah_pembayaran = $_POST['jumlah_pembayaran'];
$metode_pembayaran = $_POST['metode_pembayaran'];
$deskripsi = $_POST['deskripsi'];
$status_pembayaran = $_POST['status_pembayaran'];

// Lakukan validasi data
if (empty($id_user) || empty($id_tagihan) || empty($tanggal_pembayaran) || empty($jumlah_pembayaran) || empty($metode_pembayaran) || empty($deskripsi) || empty($status_pembayaran)) {
    echo "data_tidak_lengkap";
    exit();
}

$kover_name = $_FILES['bukti_tf']['name'];
$kover_tmp = $_FILES['bukti_tf']['tmp_name'];
$kover_path = '../../../images/foto_bukti_tf/' . basename($kover_name); // Simpan kover di dalam folder gambar
move_uploaded_file($kover_tmp, $kover_path);

// Buat query SQL untuk menambahkan data kegiatan ke dalam database
$query = "INSERT INTO pembayaran (id_user, id_tagihan, tanggal_pembayaran, jumlah_pembayaran, metode_pembayaran, deskripsi, status_pembayaran, bukti_tf) 
        VALUES ('$id_user', '$id_tagihan', '$tanggal_pembayaran', '$jumlah_pembayaran', '$metode_pembayaran', '$deskripsi', '$status_pembayaran', '$kover_path')";

// Jalankan query
if (mysqli_query($koneksi, $query)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);

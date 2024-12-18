<?php
include '../../../keamanan/koneksi.php';

// Terima data dari formulir HTML
$id_user = $_POST['id_user'];
$type_sertifikat = $_POST['type_sertifikat'];
$waktu = $_POST['waktu'];
$deskripsi = $_POST['deskripsi'];

// Lakukan validasi data
if (empty($id_user) || empty($type_sertifikat) || empty($waktu) || empty($deskripsi)) {
    echo "data_tidak_lengkap";
    exit();
}

$kover_name = $_FILES['foto']['name'];
$kover_tmp = $_FILES['foto']['tmp_name'];
$kover_path = '../../../images/foto_setifikat/' . basename($kover_name); // Simpan kover di dalam folder gambar
move_uploaded_file($kover_tmp, $kover_path);


// Format tanggal ke format yang diinginkan
$tanggal_formatted = date('d-M-Y H:i', strtotime($waktu));
// Konversi tag <br> kembali menjadi newline (\n)
$deskripsi_data = str_replace('<br>', "\n", $deskripsi);

// Buat query SQL untuk menambahkan data kegiatan ke dalam database
$query = "INSERT INTO sertifikat (id_user, type_sertifikat, waktu, deskripsi, foto) 
        VALUES ('$id_user', '$type_sertifikat', '$tanggal_formatted', '$deskripsi_data', '$kover_path')";

// Jalankan query
if (mysqli_query($koneksi, $query)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);

<?php
include '../../../keamanan/koneksi.php';

// Terima data dari formulir HTML
$id_absensi = $_POST['id_absensi'];
$waktu = $_POST['waktu'];
$lokasi = $_POST['lokasi'];
$status_kehadiran = $_POST['status_kehadiran'];

// Lakukan validasi data
if (empty($id_absensi) || empty($waktu) || empty($lokasi) || empty($status_kehadiran)) {
    echo "data_tidak_lengkap";
    exit();
}

// Siapkan array untuk menyimpan data kehadiran
$hadir = [];
$alpa = [];

// Pisahkan data ke dalam array yang sesuai
foreach ($status_kehadiran as $id_user => $status) {
    switch ($status) {
        case 'hadir':
            $hadir[] = $id_user;
            break;
        case 'alpa':
            $alpa[] = $id_user;
            break;
    }
}

// Serialisasikan data array untuk disimpan ke database
$hadir = implode(',', $hadir);
$alpa = implode(',', $alpa);

// Buat query SQL untuk memperbarui data ke dalam database
$query = "UPDATE absensi SET waktu = '$waktu', lokasi = '$lokasi', hadir = '$hadir', alpa = '$alpa' WHERE id_absensi = '$id_absensi'";

// Jalankan query
if (mysqli_query($koneksi, $query)) {
    echo "success";
} else {
    echo "error: " . mysqli_error($koneksi);
}

// Tutup koneksi ke database
mysqli_close($koneksi);

<?php
include '../../../keamanan/koneksi.php';

// Terima data dari formulir HTML
$waktu = $_POST['waktu'];
$lokasi = $_POST['lokasi'];
$status_kehadiran = $_POST['status_kehadiran'];

// Lakukan validasi data
if (empty($waktu) || empty($lokasi) || empty($status_kehadiran)) {
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
// Format tanggal ke format yang diinginkan
$tanggal_formatted = date('d-M-Y H:i', strtotime($waktu));
// Serialisasikan data array untuk disimpan ke database
$hadir = implode(',', $hadir);
$alpa = implode(',', $alpa);

// Buat query SQL untuk menambahkan data ke dalam database
$query = "INSERT INTO absensi (lokasi, waktu, hadir, alpa) VALUES ('$lokasi', '$tanggal_formatted', '$hadir', '$alpa')";

// Jalankan query
if (mysqli_query($koneksi, $query)) {
    echo "success";
} else {
    echo "error: " . mysqli_error($koneksi);
}

// Tutup koneksi ke database
mysqli_close($koneksi);

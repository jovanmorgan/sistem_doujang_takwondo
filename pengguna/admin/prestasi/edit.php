<?php
include '../../../keamanan/koneksi.php';

// Terima data dari formulir HTML
$id_prestasi = $_POST['id_prestasi'];
$id_user = $_POST['id_user'];
$nama_lombah = $_POST['nama_lombah'];
$waktu = $_POST['waktu'];
$lokasi = $_POST['lokasi'];
$deskripsi = $_POST['deskripsi'];

// Lakukan validasi data
if (empty($id_prestasi) || empty($id_user) || empty($nama_lombah) || empty($waktu) || empty($lokasi) || empty($deskripsi)) {
    echo "data_tidak_lengkap";
    exit();
}

// Proses upload file
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $kover_name = $_FILES['foto']['name'];
    $kover_tmp = $_FILES['foto']['tmp_name'];
    $kover_path = '../../../images/foto_prestasi/' . basename($kover_name);

    // Simpan file foto di folder tujuan
    if (move_uploaded_file($kover_tmp, $kover_path)) {
        // File berhasil diupload, lanjutkan dengan update database
    } else {
        echo "error";
        exit();
    }
} else {
    // Jika tidak ada file baru yang diupload, tetap gunakan foto yang lama
    $kover_path = '';
}

// Format tanggal ke format yang diinginkan
$tanggal_formatted = date('d-M-Y H:i', strtotime($waktu));
// Konversi tag <br> kembali menjadi newline (\n)
$deskripsi_data = str_replace('<br>', "\n", $deskripsi);

// Buat query SQL untuk mengupdate data
$query_update = "UPDATE prestasi SET nama_lombah = '$nama_lombah', id_user = '$id_user', lokasi = '$lokasi', waktu = '$tanggal_formatted', deskripsi = '$deskripsi_data'";

// Tambahkan kolom foto jika ada file baru yang diupload
if (!empty($kover_path)) {
    $query_update .= ", foto = '$kover_path'";
}

$query_update .= " WHERE id_prestasi = '$id_prestasi'";

// Jalankan query
if (mysqli_query($koneksi, $query_update)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);

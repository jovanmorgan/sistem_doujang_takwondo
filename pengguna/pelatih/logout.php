<?php
session_start();

// Hapus sesi id_pelatih jika ada
if (isset($_SESSION['id_pelatih'])) {
    unset($_SESSION['id_pelatih']);
}

// Redirect pengguna kembali ke halaman login
header("Location: ../../berlangganan/masuk");
exit;

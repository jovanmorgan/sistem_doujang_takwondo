<?php
include '../../../keamanan/koneksi.php';  // Sesuaikan path jika perlu

// Query untuk mendapatkan data user
$query_user = "SELECT id_user, nama FROM user";
$result_user = $koneksi->query($query_user);

$user_data = array();
if ($result_user) {
    while ($row_user = $result_user->fetch_assoc()) {
        $user_data[] = $row_user;
    }
    $result_user->free();
} else {
    echo json_encode(array("error" => "Gagal mengeksekusi query user: " . $koneksi->error));
    exit();
}

echo json_encode($user_data);

mysqli_close($koneksi);

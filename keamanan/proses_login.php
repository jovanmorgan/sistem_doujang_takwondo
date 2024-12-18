<?php
include 'koneksi.php';


function checkUserType($nomor_registrasi)
{
    global $koneksi;
    $query_admin = "SELECT * FROM admin WHERE nomor_registrasi = '$nomor_registrasi'";
    $query_user = "SELECT * FROM user WHERE nomor_registrasi = '$nomor_registrasi'";
    $query_pelatih = "SELECT * FROM pelatih WHERE nomor_registrasi = '$nomor_registrasi'";

    $result_admin = mysqli_query($koneksi, $query_admin);
    $result_user = mysqli_query($koneksi, $query_user);
    $result_pelatih = mysqli_query($koneksi, $query_pelatih);

    if (mysqli_num_rows($result_admin) > 0) {
        return "admin";
    } elseif (mysqli_num_rows($result_user) > 0) {
        return "user";
    } elseif (mysqli_num_rows($result_pelatih) > 0) {
        return "pelatih";
    } else {
        return "not_found";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nomor_registrasi']) && isset($_POST['password'])) {
    $nomor_registrasi = $_POST['nomor_registrasi'];
    $password = $_POST['password'];

    // Lakukan validasi data
    if (empty($nomor_registrasi) && empty($password)) {
        echo "tidak_ada_data";
        exit();
    }
    if (empty($nomor_registrasi)) {
        echo "nomor_registrasi_tidak_ada";
        exit();
    }

    if (empty($password)) {
        echo "password_tidak_ada";
        exit();
    }


    $userType = checkUserType($nomor_registrasi);
    if ($userType !== "not_found") {
        $query_user = "SELECT * FROM $userType WHERE nomor_registrasi = '$nomor_registrasi'";
        $result_user = mysqli_query($koneksi, $query_user);

        if (mysqli_num_rows($result_user) > 0) {
            $row = mysqli_fetch_assoc($result_user);
            $hashed_password = $row['password'];

            if ($password === $hashed_password) {

                // Process login for other user types
                session_start();
                $_SESSION['nomor_registrasi'] = $nomor_registrasi;

                switch ($userType) {
                    case "admin":
                        $_SESSION['id_admin'] = $row['id_admin'];
                        break;
                    case "user":
                        $_SESSION['id_user'] = $row['id_user'];
                        $id_user = $row['id_user'];
                        break;
                    case "pelatih":
                        $_SESSION['id_pelatih'] = $row['id_pelatih'];
                        break;
                    default:
                        break;
                }

                // Success response
                switch ($userType) {
                    case "admin":
                        echo "success:" . $nomor_registrasi . ":" . $userType . ":" . "../pengguna/admin/admin";
                        break;
                    case "user":
                        echo "success:" . $nomor_registrasi . ":" . $userType . ":" . "../pengguna/user/home";
                        break;
                    case "pelatih":
                        echo "success:" . $nomor_registrasi . ":" . $userType . ":" . "../pengguna/pelatih/pelatih";
                        break;
                    default:
                        echo "success:" . $nomor_registrasi . ":" . $userType . ":" . "../berlangganan/masuk";
                        break;
                }
            } else {
                echo "error_password";
            }
        } else {
            echo "error_nomor_registrasi";
        }
    } else {
        echo "error_nomor_registrasi";
    }
}

<!DOCTYPE html>
<html>

<head>
    <title>Sig-in & Sig-up | Dojang Garuda</title>
    <link rel="stylesheet" type="text/css" href="slide navbar style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link href="../css/masuk.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../images/logo.png" type="" />
    <!-- Link untuk Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">
        <div class="signup">
            <div class="form-container">
                <form id="registrasi" action="../keamanan/proses_register_user" method="POST">
                    <label for="chk" aria-hidden="true">Sign up</label>
                    <input type="text" name="nama" placeholder="Nama" required>
                    <input type="number" name="nomor_registrasi" placeholder="No. Reg" required>
                    <div class="password-container">
                        <input type="password" name="password" id="password" placeholder="Password" required>
                        <i class="fa fa-eye-slash show-password" aria-hidden="true" onclick="togglePasswordVisibility('password')"></i>
                    </div>
                    <select name="tingkat_sabuk" required>
                        <option value="" disabled selected>Pilih Sabuk</option>
                        <option value="putih">Putih</option>
                        <option value="kuning">Kuning</option>
                        <option value="hijau">Hijau</option>
                        <option value="biru">Biru</option>
                        <option value="merah">Merah</option>
                        <option value="hitam">Hitam</option>
                    </select>
                    <button class="tombol" type="submit">Sign up</button>
                    <br><br><br>
                </form>
            </div>
        </div>
        <div class="login">
            <form id="login" action="../keamanan/proses_login" method="POST">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="number" name="nomor_registrasi" placeholder="Nomor Registrasi" required="">
                <div class="password-container">
                    <input type="password" name="password" id="login-password" placeholder="Password" required>
                    <i class="fa fa-eye-slash show-password" aria-hidden="true" onclick="togglePasswordVisibility('login-password')"></i>
                </div>
                <button class="tombol" type="submit">Login</button>
            </form>
        </div>
    </div>

    <!-- End footer -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function togglePasswordVisibility(inputId) {
            var passwordInput = document.getElementById(inputId);
            var passwordIcon = document.querySelector(
                "#" + inputId + " + .show-password"
            );

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordIcon.classList.remove("fa-eye-slash");
                passwordIcon.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                passwordIcon.classList.remove("fa-eye");
                passwordIcon.classList.add("fa-eye-slash");
            }
        }
        document.getElementById("login").addEventListener("submit", function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../keamanan/proses_login", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = xhr.responseText;
                        var responseArray = response.split(':');
                        if (responseArray[0].trim() === "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Login berhasil!',
                                text: 'Selamat datang ' + responseArray[1],
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading()
                                }
                            }).then((result) => {
                                switch (responseArray[2].trim()) {
                                    case "admin":
                                        window.location.href = "../pengguna/admin/admin";
                                        break;
                                    case "user":
                                        window.location.href = "../pengguna/user/home";
                                        break;
                                    case "pelatih":
                                        window.location.href = "../pengguna/pelatih/pelatih";
                                        break;
                                    default:
                                        window.location.href = "masuk";
                                        break;
                                }
                            });

                            if (rememberMe) {
                                var nomor_registrasi = formData.get('nomor_registrasi');
                                var password = formData.get('password');
                                document.cookie = "nomor_registrasi=" + encodeURIComponent(nomor_registrasi) + "; path=/";
                                document.cookie = "password=" + encodeURIComponent(password) + "; path=/";
                            }
                        } else if (responseArray[0].trim() === "error_password") {
                            Swal.fire("Error", "Password yang dimasukkan salah", "error");
                        } else if (responseArray[0].trim() === "error_nomor_registrasi") {
                            Swal.fire("Error", "Nomor Registrasi tidak ditemukan", "error");
                        } else if (responseArray[0].trim() === "nomor_registrasi_tidak_ada") {
                            Swal.fire("Info", "Nomor Registrasi belum diisi", "info");
                        } else if (responseArray[0].trim() === "password_tidak_ada") {
                            Swal.fire("Info", "Password belum diisi", "info");
                        } else if (responseArray[0].trim() === "tidak_ada_data") {
                            Swal.fire("Info", "Nomor Registrasi dan Password belum diisi", "info");
                        } else {
                            Swal.fire("Error", "Terjadi kesalahan saat proses login", "error");
                        }
                    } else {
                        Swal.fire("Error", "Gagal", "error");
                    }
                }
            };
            xhr.onerror = function() {
                Swal.fire("Error", "Gagal melakukan request", "error");
            };
            xhr.send(formData);
        });

        document
            .getElementById("registrasi")
            .addEventListener("submit", function(event) {
                event.preventDefault(); // Prevent the form from submitting by default

                // Get the form element
                var form = this;

                // Ambil data dari form
                var formData = new FormData(form);

                // Cek apakah semua input diisi
                var nama = formData.get("nama");
                var nomor_registrasi = formData.get("nomor_registrasi");
                var password = formData.get("password");
                var tingkat_sabuk = formData.get("tingkat_sabuk");

                if (
                    nama === "" ||
                    nomor_registrasi === "" ||
                    password === "" ||
                    tingkat_sabuk === ""
                ) {
                    Swal.fire("Error", "Semua data wajib diisi", "error");
                    return; // Stop the submission process if any input is empty
                }

                // Kirim data menggunakan AJAX
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "../keamanan/proses_register_user", true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Tampilkan SweetAlert berdasarkan respon dari ../keamanan/proses_register_user
                            var response = xhr.responseText;
                            if (response.trim() === "success") {
                                // Reset the form after successful submission
                                form.reset();
                                Swal.fire({
                                    title: "Success",
                                    text: "Data berhasil ditambahkan",
                                    icon: "success"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        document.getElementById("chk").checked = true;
                                    }
                                });
                            } else if (response.trim() === "error_admin_code") {
                                Swal.fire("Error", "Kode admin tidak sesuai", "error");
                            } else if (response.trim() === "error_nomor_registrasi_exists") {
                                Swal.fire("Error", "Akun ini sudah terdaftar!, Silakan gunakan akun lain", "error");
                            } else if (response.trim() === "nomor_registrasi_belum_pas") {
                                Swal.fire("Error", "Nomor Registrasi harus memiliki minimal 12 Nomor", "error");
                            } else if (response.trim() === "error_password_length") {
                                Swal.fire("Error", "Password harus memiliki minimal 8 karakter", "error");
                            } else if (response.trim() === "error_password_strength") {
                                Swal.fire("Error", "Password harus mengandung huruf besar, huruf kecil, dan angka", "error");
                            } else {
                                Swal.fire("Error", "Terjadi kesalahan saat proses login", "error");
                            }
                        } else {
                            Swal.fire("Error", "Gagal melakukan request", "error");
                        }
                    }
                };
                xhr.onerror = function() {
                    Swal.fire("Error", "Gagal melakukan request", "error");
                };
                xhr.send(formData);
            });
    </script>
</body>

</html>
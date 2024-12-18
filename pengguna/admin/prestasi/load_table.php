                                    <table class="table tablesorter " id="dataTable">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th class="text-center">Nomor</th>
                                                <th class="text-center">Nama Lombah</th>
                                                <th class="text-center">Nama Atlet</th>
                                                <th class="text-center">Waktu</th>
                                                <th class="text-center">Lokasi</th>
                                                <th class="text-center">Deskripsi</th>
                                                <th class="text-center">Edit</th>
                                                <th class="text-center">Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Lakukan koneksi ke database
                                            include '../../../keamanan/koneksi.php';
                                            // Ambil kata kunci pencarian dari URL jika ada
                                            $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';
                                            // Query SQL untuk mengambil data dari tabel prestasi
                                            $query = "SELECT prestasi.*, user.nama AS nama_user FROM prestasi LEFT JOIN user ON prestasi.id_user = user.id_user";
                                            // Jika ada kata kunci pencarian, tambahkan klausa WHERE untuk mencocokkan 
                                            if (!empty($search_query)) {
                                                $query .= " WHERE prestasi.nama_lombah LIKE '%$search_query%' OR user.nama LIKE '%$search_query%' OR prestasi.waktu LIKE '%$search_query%' OR prestasi.lokasi LIKE '%$search_query%' OR prestasi.deskripsi LIKE '%$search_query%'";
                                            }
                                            // Balik urutan data untuk memunculkan yang paling baru di atas
                                            $query .= " ORDER BY id_prestasi DESC";
                                            $result = mysqli_query($koneksi, $query);
                                            // Variabel untuk menyimpan nomor urut
                                            $counter = 1;
                                            // Cek jika query berhasil dieksekusi
                                            if ($result) {
                                                // Lakukan iterasi untuk menampilkan setiap baris data dalam tabel
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $deskripsi = nl2br($row['deskripsi']); // Mengganti newline menjadi <br>
                                                    $deskripsi_sambung = str_replace(array("\r", "\n"), '', nl2br($row['deskripsi']));
                                                    $waktu_input = $row['waktu'];
                                                    $waktu_input_data = date('Y-m-d\TH:i', strtotime($waktu_input));

                                                    // Modifikasi path foto
                                                    $foto_path = str_replace('../../../', '../../', $row['foto']);

                                                    echo "<tr>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($counter, ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['nama_lombah'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['nama_user'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['waktu'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['lokasi'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . $deskripsi_sambung . "</td>";
                                                    echo "<td class='text-center'><img src='" . htmlspecialchars($foto_path, ENT_QUOTES) . "' alt='Kover Image' style='max-width: 100px; cursor: pointer;' data-toggle='modal' data-target='#imageModal" . $counter . "'></td>";
                                                    echo "<td class='text-center'>
                                                            <button class='btn btn-primary btn-sm' onclick='openEditModal(
                                                                \"" . htmlspecialchars($row['id_prestasi'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['nama_lombah'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['id_user'], ENT_QUOTES) . "\",
                                                                \"" . $waktu_input_data . "\",
                                                                \"" . htmlspecialchars($row['lokasi'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($foto_path, ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($deskripsi_sambung, ENT_QUOTES) . "\"
                                                            )'>Edit</button>
                                                        </td>";
                                                    echo "<td class='text-center'>
                                                            <button class='btn btn-danger btn-sm' onclick='hapus(\"" . htmlspecialchars($row['id_prestasi'], ENT_QUOTES) . "\")'>Hapus</button>
                                                        </td>";
                                                    echo "</tr>";

                                                    // Tambahkan modal untuk setiap gambar
                                                    echo "<div class='modal fade' id='imageModal" . $counter . "' tabindex='-1' role='dialog' aria-labelledby='imageModalLabel" . $counter . "' aria-hidden='true'>
                                                            <div class='modal-dialog' role='document'>
                                                                <div class='modal-content'>
                                                                    <div class='modal-header'>
                                                                        <h5 class='modal-title' id='imageModalLabel" . $counter . "'>Gambar prestasi</h5>
                                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                            <span aria-hidden='true'>&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class='modal-body text-center'>
                                                                        <img src='" . htmlspecialchars($foto_path, ENT_QUOTES) . "' alt='Kover Image' style='max-width: 100%;'>
                                                                    </div>
                                                                    <div class='modal-footer'>
                                                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>";

                                                    // Increment nomor urut
                                                    $counter++;
                                                }
                                            } else {
                                                echo "<td class='text-center' colspan='7'><h3>Gagal mengambil data dari database</h3></td>";
                                            }

                                            // Tutup koneksi ke database
                                            mysqli_close($koneksi);
                                            ?>
                                        </tbody>
                                    </table>
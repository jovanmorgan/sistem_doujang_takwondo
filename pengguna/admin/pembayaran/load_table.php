                                    <table class="table tablesorter " id="dataTable">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th class="text-center">Nomor</th>
                                                <th class="text-center">Nama User</th>
                                                <th class="text-center">Tanggal Pembayaran</th>
                                                <th class="text-center">Jumlah Pembayaran</th>
                                                <th class="text-center">Metode Pembayaran</th>
                                                <th class="text-center">Bukti TF</th>
                                                <th class="text-center">Deskripsi</th>
                                                <th class="text-center">Status Pembayaran</th>
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
                                            // Query SQL untuk mengambil data dari tabel pembayaran
                                            $query = "SELECT pembayaran.*, user.nama AS nama_user FROM pembayaran LEFT JOIN user ON pembayaran.id_user = user.id_user";
                                            // Jika ada kata kunci pencarian, tambahkan klausa WHERE untuk mencocokkan 
                                            if (!empty($search_query)) {
                                                $query .= " WHERE pembayaran.tanggal_pembayaran LIKE '%$search_query%' OR user.nama LIKE '%$search_query%' OR pembayaran.jumlah_pembayaran LIKE '%$search_query%' OR pembayaran.metode_pembayaran LIKE '%$search_query%' OR pembayaran.deskripsi LIKE '%$search_query%' OR pembayaran.status_pembayaran LIKE '%$search_query%'";
                                            }
                                            // Balik urutan data untuk memunculkan yang paling baru di atas
                                            $query .= " ORDER BY id_pembayaran DESC";
                                            $result = mysqli_query($koneksi, $query);
                                            // Variabel untuk menyimpan nomor urut
                                            $counter = 1;
                                            // Cek jika query berhasil dieksekusi
                                            if ($result) {
                                                // Lakukan iterasi untuk menampilkan setiap baris data dalam tabel
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $deskripsi = nl2br($row['deskripsi']); // Mengganti newline menjadi <br>
                                                    $deskripsi_sambung = str_replace(array("\r", "\n"), '', nl2br($row['deskripsi']));
                                                    $tanggal_pembayaran = $row['tanggal_pembayaran'];
                                                    $tanggal_pembayaran_data = date('Y-m-d\TH:i', strtotime($tanggal_pembayaran));
                                                    // Tentukan warna tombol berdasarkan status pembayaran
                                                    $status_pembayaran = $row['status_pembayaran'];
                                                    $status_class = '';

                                                    if ($status_pembayaran == 'Belum Lunas') {
                                                        $status_class = 'btn-danger';
                                                    } elseif ($status_pembayaran == 'Sudah Lunas') {
                                                        $status_class = 'btn-success';
                                                    } elseif ($status_pembayaran == 'Diproses') {
                                                        $status_class = 'btn-warning';
                                                    }
                                                    // Modifikasi path foto
                                                    $foto_path = str_replace('../../../', '../../', $row['bukti_tf']);

                                                    echo "<tr>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($counter, ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['nama_user'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['tanggal_pembayaran'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['jumlah_pembayaran'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['metode_pembayaran'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'><img src='" . htmlspecialchars($foto_path, ENT_QUOTES) . "' alt='Kover Image' style='max-width: 100px; cursor: pointer;' data-toggle='modal' data-target='#imageModal" . $counter . "'></td>";
                                                    echo "<td class='text-center'>" . $deskripsi_sambung . "</td>";
                                                    echo "<td class='text-center'><button class='btn $status_class btn-sm' style='border-radius: 25px;' disabled>" . htmlspecialchars($status_pembayaran, ENT_QUOTES) . "</button></td>";
                                                    echo "<td class='text-center'>
                                                            <button class='btn btn-success btn-sm' onclick='EditStatus(\"" . htmlspecialchars($row['id_pembayaran'], ENT_QUOTES) . "\")'>Setujui</button>
                                                        </td>";
                                                    echo "<td class='text-center'>
                                                            <button class='btn btn-danger btn-sm' onclick='hapus(\"" . htmlspecialchars($row['id_pembayaran'], ENT_QUOTES) . "\")'>Batalkan</button>
                                                        </td>";
                                                    echo "</tr>";

                                                    // Tambahkan modal untuk setiap gambar
                                                    echo "<div class='modal fade' id='imageModal" . $counter . "' tabindex='-1' role='dialog' aria-labelledby='imageModalLabel" . $counter . "' aria-hidden='true'>
                                                            <div class='modal-dialog' role='document'>
                                                                <div class='modal-content'>
                                                                    <div class='modal-header'>
                                                                        <h5 class='modal-title' id='imageModalLabel" . $counter . "'>Gambar pembayaran</h5>
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
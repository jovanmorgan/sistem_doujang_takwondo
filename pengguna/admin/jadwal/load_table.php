                                    <table class="table tablesorter " id="dataTable">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th class="text-center">
                                                    Nomor
                                                </th>
                                                <th class="text-center">
                                                    Waktu
                                                </th>
                                                <th class="text-center">
                                                    Lokasi
                                                </th>
                                                <th class="text-center">
                                                    Deskripsi
                                                </th>
                                                <th class="text-center">
                                                    Edit
                                                </th>
                                                <th class="text-center">
                                                    Hapus
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Lakukan koneksi ke database
                                            include '../../../keamanan/koneksi.php';
                                            // Ambil kata kunci pencarian dari URL jika ada
                                            $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';
                                            // Query SQL untuk mengambil data dari tabel jadwal
                                            $query = "SELECT * FROM jadwal";
                                            // Jika ada kata kunci pencarian, tambahkan klausa WHERE untuk mencocokkan 
                                            if (!empty($search_query)) {
                                                $query .= " WHERE metode LIKE '%$search_query%' OR waktu LIKE '%$search_query%' OR lokasi LIKE '%$search_query%' OR deskripsi LIKE '%$search_query%'";
                                            }
                                            // Balik urutan data untuk memunculkan yang paling baru di atas
                                            $query .= " ORDER BY id_jadwal DESC";
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
                                                    echo "<tr>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($counter, ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['metode'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['waktu'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['lokasi'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . $deskripsi_sambung . "</td>";
                                                    echo "<td class='text-center'>
                                                    <button class='btn btn-primary btn-sm' onclick='openEditModal(
                                                        \"" . htmlspecialchars($row['id_jadwal'], ENT_QUOTES) . "\",
                                                        \"" . htmlspecialchars($row['metode'], ENT_QUOTES) . "\",
                                                        \"" . $waktu_input_data . "\",
                                                        \"" . htmlspecialchars($row['lokasi'], ENT_QUOTES) . "\",
                                                        \"" . htmlspecialchars($deskripsi_sambung, ENT_QUOTES) . "\"
                                                    )'>Edit</button>
                                                        </td>";
                                                    echo "<td class='text-center'>
                                                    <button class='btn btn-danger btn-sm' onclick='hapus(\"" . htmlspecialchars($row['id_jadwal'], ENT_QUOTES) . "\")'>Hapus</button>
                                                    </td>";
                                                    echo "</tr>";

                                                    // Increment nomor urut
                                                    $counter++;
                                                }
                                            } else {
                                                echo "<td class='text-center'><h3>Gagal mengambil data dari database</h3></td>";
                                            }

                                            // Tutup koneksi ke database
                                            mysqli_close($koneksi);
                                            ?>
                                        </tbody>
                                    </table>
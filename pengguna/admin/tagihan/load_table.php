                                    <table class="table tablesorter " id="dataTable">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th class="text-center">
                                                    Nomor
                                                </th>
                                                <th class="text-center">
                                                    Tanggal Tagihan
                                                </th>
                                                <th class="text-center">
                                                    Tanggal Jatuh Tempo
                                                </th>
                                                <th class="text-center">
                                                    Jumlah
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

                                            // Query SQL untuk mengambil data dari tabel tagihan
                                            $query = "SELECT * FROM tagihan";

                                            // Jika ada kata kunci pencarian, tambahkan klausa WHERE untuk mencocokkan 
                                            if (!empty($search_query)) {
                                                $query .= " WHERE tanggal_tagihan LIKE '%$search_query%' OR tanggal_jatuh_tempo LIKE '%$search_query%' OR jumlah_tagihan LIKE '%$search_query%'";
                                            }

                                            // Balik urutan data untuk memunculkan yang paling baru di atas
                                            $query .= " ORDER BY id_tagihan DESC";
                                            $result = mysqli_query($koneksi, $query);

                                            // Variabel untuk menyimpan nomor urut
                                            $counter = 1;

                                            // Cek jika query berhasil dieksekusi
                                            if ($result) {
                                                // Lakukan iterasi untuk menampilkan setiap baris data dalam tabel
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $tanggal_tagihan = $row['tanggal_tagihan'];
                                                    $tanggal_jatuh_tempo = $row['tanggal_jatuh_tempo'];
                                                    $tanggal_tagihan_data = date('Y-m-d\TH:i', strtotime($tanggal_tagihan));
                                                    $tanggal_jatuh_tempo_data = date('Y-m-d\TH:i', strtotime($tanggal_jatuh_tempo));
                                                    echo "<tr>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($counter, ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['tanggal_tagihan'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['tanggal_jatuh_tempo'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['jumlah_tagihan'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>
                                                                    <button class='btn btn-primary btn-sm' onclick='openEditModal(\"" . $row['id_tagihan'] . "\", \"" . $tanggal_tagihan_data . "\", \"" . $tanggal_jatuh_tempo_data . "\", \"" . $row['jumlah_tagihan'] . "\")'>Edit</button>
                                                            </td>";
                                                    echo "<td class='text-center'>
                                                            <button class='btn btn-danger btn-sm' onclick='hapus(\"" . htmlspecialchars($row['id_tagihan'], ENT_QUOTES) . "\")'>Hapus</button>
                                                            </td>";
                                                    echo "</tr>";
                                                    $counter++;
                                                }

                                                // Jika tidak ada data yang ditemukan
                                                if ($counter == 1) {
                                                    echo "<tr><td class='text-center' colspan='5'><h3>Belum ada data Tagihan</h3></td></tr>";
                                                }
                                            } else {
                                                echo "<tr><td class='text-center' colspan='5'><h3>Gagal mengambil data dari database</h3></td></tr>";
                                            }

                                            // Tutup koneksi ke database
                                            mysqli_close($koneksi);
                                            ?>
                                        </tbody>
                                    </table>
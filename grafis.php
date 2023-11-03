<?php $sql = "SELECT target.nama , pemasukkan.id_target, pemasukkan.hari_ini, SUM(pemasukkan.masuk) AS masukkan FROM target JOIN pemasukkan ON target.id=pemasukkan.id_target GROUP BY pemasukkan.hari_ini, target.nama "; 
 $result = $koneksi->query($sql);

    // Membuat array untuk data grafik
    $dataGrafik = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nama = $row['nama'];
            $tanggal = $row['hari_ini'];
            $pemasukkan = $row['masukkan'];

            // Menyimpan data grafik ke dalam array
            $dataGrafik[$nama][] = [
                'hari_ini' => $tanggal,
                'masukkan' => $pemasukkan
            ];
        }
    }

    // Menutup koneksi database
    $koneksi->close();
    ?>

    <?php
    // Menampilkan grafik untuk setiap nama
    foreach ($dataGrafik as $nama => $data) {
        // Membuat array untuk tanggal dan pemasukkan
        $labels = [];
        $pemasukkan = [];

        foreach ($data as $item) {
            $labels[] = $item['hari_ini'];
            $pemasukkan[] = $item['masukkan'];
        }
        ?>
        <h2>Grafik Pemasukkan - <?php echo $nama; ?></h2>
        <canvas id="myChart-<?php echo $nama; ?>"></canvas>

        <script>
            var ctx = document.getElementById('myChart-<?php echo $nama; ?>').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($labels); ?>,
                    datasets: [{
                        label: 'Pemasukkan',
                        data: <?php echo json_encode($pemasukkan); ?>,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    <?php } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel WXREV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @page {
            margin: 5mm;
            margin-bottom: 15mm;
            margin-top: 10mm;
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
            margin: 0;
            
        }
        h2 {
            text-align: center;
            margin-top: 0;
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;    
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>

</head>
<body>
    <div class="container">
        <!-- Judul -->
        <div class="text-center">
            <h2 class="text-uppercase"><?=$judul_laporan;?></h2>
            <h3>STASIUN METEOROLOGI SANGIA NIBANDERA</h3>
        </div>

        <table class="table mt-2" style="border-collapse: collapse;">
            <tr>
                <td style="width: 65%; text-align: left; border: none; line-height: 0.1"><strong>BULAN :&nbsp;</strong><?= date("F", strtotime(esc($periode))); ?></td> 
                <td style="width: 35%; text-align: left; border: none; line-height: 0.1"><strong>POS PENGAMATAN NO :</strong> 97142</td> 
            </tr>
            <tr>
                <td style="width: 65%; text-align: left; border: none; line-height: 0.1"><strong>TAHUN :&nbsp;</strong><?= date("Y", strtotime(esc($periode))); ?></td> 
                <td style="width: 35%; text-align: left; border: none; line-height: 0.1"><strong>TEMPAT PEMERIKSAAN :</strong> STAMET SANGIA NIBANDERA KOLAKA</td> 
            </tr>
            <tr>
                <td style="width: 65%; text-align: left; border: none; line-height: 0.1">&nbsp;</td> 
                <td style="width: 35%; text-align: left; border: none; line-height: 0.1"><strong>TINGGI DI ATAS PERMUKAAN AIR LAUT :</strong> 14 m</td> 
            </tr>
            <tr>
                <td style="width: 65%; text-align: left; border: none; line-height: 0.1">&nbsp;</td> 
                <td style="width: 35%; text-align: left; border: none; line-height: 0.1"><strong>KECAMATAN :</strong> POMALAA</td> 
            </tr>
            <tr>
                <td style="width: 65%; text-align: left; border: none; line-height: 0.1">&nbsp;</td> 
                <td style="width: 35%; text-align: left; border: none; line-height: 0.1"><strong>KABUPATEN :</strong> KOLAKA</td> 
            </tr>
            <tr>
                <td style="width: 65%; text-align: left; border: none; line-height: 0.1">&nbsp;</td> 
                <td style="width: 35%; text-align: left; border: none; line-height: 0.1"><strong>PROVINSI :</strong> SULAWESI TENGGARA</td> 
            </tr>
        </table>

        <!-- Tabel -->
        <table class="table table-bordered text-center mt-3">
    <thead>
        <tr>
            <th rowspan="2">Tanggal<br>Pengukuran</th>
            <th colspan="4">Penguapan (Tanggal 1-15)</th>
            
            <th rowspan="2">Tanggal<br>Pengukuran</th>
            <th colspan="4">Penguapan (Tanggal 16-31)</th>
            <th rowspan="2">Tanggal<br>Pengukuran</th>
            <th rowspan="2">Kecepatan<br>Angin<br>(km/jam)</th>
            <th rowspan="2">Suhu<br>Air<br>(&deg;C)</th>
            <th rowspan="2">Tanggal<br>Pengukuran</th>
            <th rowspan="2">Kecepatan<br>Angin<br>(km/jam)</th>
            <th rowspan="2">Suhu<br>Air<br>(&deg;C)</th>
        </tr>
        <tr>
            <th>Tinggi H (mm)</th>
            <th>P (mm)</th>
            <th>E = P + H (mm)</th>
            <th>Jam</th>
            
            <th>Tinggi H (mm)</th>
            <th>P (mm)</th>
            <th>E = P + H (mm)</th>
            <th>Jam</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($dataFilter) > 0): ?>
            <?php 
                $data1_15 = [];
                $data16_31 = [];
                $totalch = 0;
                $totalev = 0;
                // Pisahkan data menjadi dua grup: 1-15 dan 16-31
                foreach ($dataFilter as $row) {
                    $totalch += $row['curah_hujan'];
                    $totalev += $row['penguapan'];
                    $tanggal = (int) date("d", strtotime(esc($row['tanggal'])));
                    if ($tanggal >= 1 && $tanggal <= 15) {
                        $data1_15[$tanggal] = $row;
                    } elseif ($tanggal >= 16 && $tanggal <= 31) {
                        $data16_31[$tanggal] = $row;
                    }
                }

                // Gabungkan data 1-15 dan 16-31 berdasarkan tanggal yang sama (misalnya 1 dengan 16, 2 dengan 17, dst)
                for ($i = 1; $i <= 15; $i++): 
                    $data1 = $data1_15[$i] ?? null;
                    $data16 = $data16_31[$i + 15] ?? null;
            ?>
            <tr>
                <!-- Data untuk tanggal 1-15 -->
                <td><?= $data1 ? esc($i) : '-'; ?></td>
                <td><?= number_format($data1['selisih_air'],1) ?? '-'; ?></td>
                <td><?= number_format($data1['curah_hujan'],1) ?? '-'; ?></td>
                <td><?= number_format($data1['penguapan'],1) ?? '-'; ?></td>
                <td>07:00</td>
                
                <!-- Data untuk tanggal 16-31 -->
                <td><?= $data16 ? esc($i + 15) : '-'; ?></td>
                <td><?= number_format($data16['selisih_air'],1) ?? '-'; ?></td>
                <td><?= number_format($data16['curah_hujan'],1) ?? '-'; ?></td>
                <td><?= number_format($data16['penguapan'],1) ?? '-'; ?></td>
                <td>07:00</td>
                
                <!-- Kecepatan angin dan suhu air (gunakan data dari tanggal 1 atau 16) -->
                <td><?= $data1 ? esc($i) : '-'; ?></td>
                <td><?= number_format($data1['counter_rata'],1) ?? '-'; ?></td>
                <td><?= number_format($data1['suhu_air_rata'],1) ?? '-'; ?></td>
                <td><?= $data16 ? esc($i + 15) : '-'; ?></td>
                <td><?= number_format($data16['counter_rata'],1) ?? '-'; ?></td>
                <td><?= number_format($data16['suhu_air_rata'],1) ?? '-'; ?></td>
            </tr>
            <?php endfor; ?>
        <?php else: ?>
            <tr>
                <td colspan="12" align="center">Tidak ada data ditemukan</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>


    <p>
        Jumlah Hujan Sebulan: <?=$totalch;?> mm<br>
        Penguapan Sebulan: <?=$totalev;?> mm<br>
        Banyaknya Hujan Sebulan:  hari<br><br>
        <strong>Keterangan:</strong><br>
        H = Beda pembacaan air bejana 1 hari sebelum dengan waktu pengamatan<br>
        H = Positif jika pembacaan lebih kecil dari pembacaan 1 hari sebelumnya<br>
        H = Negatif jika pembacaan lebih besar dari pembacaan 1 hari sebelumnya<br>
        P = Banyak hujan selama 1 hari dalam mm
    </p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

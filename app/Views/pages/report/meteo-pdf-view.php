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
                <td style="width: 35%; text-align: left; border: none; line-height: 0.1"><strong>GARIS BUJUR :</strong> 121°.36'.000" BT</td> 
            </tr>
            <tr>
                <td style="width: 65%; text-align: left; border: none; line-height: 0.1"><strong>TAHUN :&nbsp;</strong><?= date("Y", strtotime(esc($periode))); ?></td> 
                <td style="width: 35%; text-align: left; border: none; line-height: 0.1"><strong>GARIS LINTANG :</strong> 004°.10'.48" LS</td> 
            </tr>
            <tr>
                <td style="width: 65%; text-align: left; border: none; line-height: 0.1">&nbsp;</td> 
                <td style="width: 35%; text-align: left; border: none; line-height: 0.1"><strong>TINGGI DI ATAS PERMUKAAN AIR LAUT :</strong> 14 m</td> 
            </tr>
        </table>

        <!-- Tabel -->
        <table class="table table-bordered text-center mt-3">
            <thead class="table-light">
                <tr>
                    <th colspan="2">TGL DAN WAKTU</th>
                    <th rowspan="2">Arah<br>Angin<br>(&deg;)</th>
                    <th rowspan="2">Kecepatan<br>Angin<br>(knots)</th>
                    <th rowspan="2">Tekanan Udara<br>QFF<br>(mb)</th>
                    <th rowspan="2">Tekanan Udara<br>QFE<br>(mb)</th>
                    <th rowspan="2">Suhu Udara<br>Bola Kering<br>(&deg;C)</th>
                    <th rowspan="2">Suhu Udara<br>Bola Basah<br>(&deg;C)</th>
                    <th rowspan="2">Dew Point<br>(&deg;C)</th>
                    <th rowspan="2">Kelembaban<br>Udara<br>(%)</th>
                </tr>
                <tr>
                    <th>WITA</th>
                    <th>UTC</th>
                </tr>
                
            </thead>
            <tbody>
                <?php if (count($dataFilter) > 0): ?>
                    <?php foreach ($dataFilter as $row): ?>
                        <tr>
                        <td><?= esc($row['tanggallokal']) ?><br><?= esc($row['waktulokal']) ?></td>
                                        <td><?= esc($row['tanggalutc']) ?><br><?= esc($row['waktuutc']) ?></td>
                                        <td><?= esc($row['arahangin']) ?></td>
                                        <td><?= esc($row['kecangin']) ?></td>
                                        <td><?= number_format(esc($row['qff']),1) ?></td>
                                        <td><?= number_format(esc($row['qfe']),1) ?></td>
                                        <td><?= number_format(esc($row['bk']),1) ?></td>
                                        <td><?= number_format(esc($row['bb']),1) ?></td>
                                        <td><?= number_format(esc($row['dp']),1) ?></td>
                                        <td><?= esc($row['rh']) ?></td>
                                        <!-- Tambahkan kolom lain jika perlu -->
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="17" align="center">Tidak ada data ditemukan</td>
                    </tr>
                <?php endif; ?>
               
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

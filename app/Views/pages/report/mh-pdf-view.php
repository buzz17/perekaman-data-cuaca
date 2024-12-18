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
                    <th rowspan="3">TGL</th>
                    <th colspan="12">JAM (WITA)</th>
                    <th colspan="4" >LAMA PENYINARAN</th>                   
                </tr>
                <tr>
                    <th rowspan="2">06-07</th>
                    <th rowspan="2">07-08</th>
                    <th rowspan="2">08-09</th>
                    <th rowspan="2">09-10</th>
                    <th rowspan="2">10-11</th>
                    <th rowspan="2">11-12</th>
                    <th rowspan="2">12-13</th>
                    <th rowspan="2">13-14</th>
                    <th rowspan="2">14-15</th>
                    <th rowspan="2">15-16</th>
                    <th rowspan="2">16-17</th>
                    <th rowspan="2">17-18</th>
                    <th colspan="2">8Jam</th>
                    <th colspan="2">12Jam</th>
                </tr>
                <tr>
                    <th>Jml</th>
                    <th> % </td>
                    <th>Jml</td>
                    <th> % </th>
                </tr>
                
            </thead>
            <tbody>
                <?php if (count($dataFilter) > 0): ?>
                    <?php foreach ($dataFilter as $row): ?>
                        <tr>
                            <td><?= date("d", strtotime(esc($row['tanggal']))); ?></td>
                            <td><?= esc($row['6_7']) ?></td>
                            <td><?= esc($row['7_8']) ?></td>
                            <td><?= esc($row['8_9']) ?></td>
                            <td><?= esc($row['9_10']) ?></td>
                            <td><?= esc($row['10_11']) ?></td>
                            <td><?= esc($row['11_12']) ?></td>
                            <td><?= esc($row['12_13']) ?></td>
                            <td><?= esc($row['13_14']) ?></td>
                            <td><?= esc($row['14_15']) ?></td>
                            <td><?= esc($row['15_16']) ?></td>
                            <td><?= esc($row['16_17']) ?></td>
                            <td><?= esc($row['17_18']) ?></td>
                            <td><?= esc($row['8jml']) ?></td>
                            <td><?= esc($row['8persen']) ?></td>
                            <td><?= esc($row['12jml']) ?></td>
                            <td><?= esc($row['12persen']) ?></td>
                            
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

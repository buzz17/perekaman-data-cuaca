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
                    <th rowspan="2">Tgl</th>
                    <th colspan="10">Jumlah Pada Masing - Masing Periode Waktu <br> (dalam milimeter)</th>
                    <th rowspan="2">Tgl</th>
                    <th colspan="24">JUMLAH HUJAN TIAP JAM (milimeter)</th>
                    <th rowspan="2">Jumlah 24 Jam</th>
                </tr>
                <tr>
                    <th>5 Menit</th>
                    <th>10 Menit</th>
                    <th>15 Menit</th>
                    <th>30 Menit</th>
                    <th>45 Menit</th>
                    <th>60 Menit</th>
                    <th>120 Menit</th>
                    <th>3 Jam</th>
                    <th>6 Jam</th>
                    <th>12 Jam</th>
                    <th>07<br>08</th>
                    <th>08<br>09</th>
                    <th>09<br>10</th>
                    <th>10<br>11</th>
                    <th>11<br>12</th>
                    <th>12<br>13</th>
                    <th>13<br>14</th>
                    <th>14<br>15</th>
                    <th>15<br>16</th>
                    <th>16<br>17</th>
                    <th>17<br>18</th>
                    <th>18<br>19</th>
                    <th>19<br>20</th>
                    <th>20<br>21</th>
                    <th>21<br>22</th>
                    <th>22<br>23</th>
                    <th>23<br>00</th>
                    <th>00<br>01</th>
                    <th>01<br>02</th>
                    <th>02<br>03</th>
                    <th>03<br>04</th>
                    <th>04<br>05</th>
                    <th>05<br>06</th>
                    <th>06<br>07</th>
                </tr>
            </thead>
            <tbody>
                <!-- Contoh pengisian baris data -->
                <?php if (count($dataFilter) > 0): ?>
                    <?php 
                        $total = 0;
                        foreach ($dataFilter as $row): 
                            $total += $row['hellman_24h'];
                    ?>
                        
                        <tr>
                            <td><?= date("d", strtotime(esc($row['tanggal']))); ?></td>
                            <td><?= esc($row['hellman_5m']) ?></td>
                                                    <td><?= esc($row['hellman_10m']) ?></td>
                                                    <td><?= esc($row['hellman_15m']) ?></td>
                                                    <td><?= esc($row['hellman_30m']) ?></td>
                                                    <td><?= esc($row['hellman_45m']) ?></td>
                                                    <td><?= esc($row['hellman_60m']) ?></td>
                                                    <td><?= esc($row['hellman_120m']) ?></td>
                                                    <td><?= esc($row['hellman_3h']) ?></td>
                                                    <td><?= esc($row['hellman_6h']) ?></td>
                                                    <td><?= esc($row['hellman_12h']) ?></td>
                            <td><?= date("d", strtotime(esc($row['tanggal']))); ?></td>
                            <td><?= esc($row['hellman_07_08']) ?></td>
                            <td><?= esc($row['hellman_08_09']) ?></td>
                            <td><?= esc($row['hellman_09_10']) ?></td>
                            <td><?= esc($row['hellman_10_11']) ?></td>
                            <td><?= esc($row['hellman_11_12']) ?></td>
                            <td><?= esc($row['hellman_12_13']) ?></td>
                            <td><?= esc($row['hellman_13_14']) ?></td>
                            <td><?= esc($row['hellman_14_15']) ?></td>
                            <td><?= esc($row['hellman_15_16']) ?></td>
                            <td><?= esc($row['hellman_16_17']) ?></td>
                            <td><?= esc($row['hellman_17_18']) ?></td>
                            <td><?= esc($row['hellman_18_19']) ?></td>
                            <td><?= esc($row['hellman_19_20']) ?></td>
                            <td><?= esc($row['hellman_20_21']) ?></td>
                            <td><?= esc($row['hellman_21_22']) ?></td>
                            <td><?= esc($row['hellman_22_23']) ?></td>
                            <td><?= esc($row['hellman_23_00']) ?></td>
                            <td><?= esc($row['hellman_00_01']) ?></td>
                                                    <td><?= esc($row['hellman_01_02']) ?></td>
                                                    <td><?= esc($row['hellman_02_03']) ?></td>
                                                    <td><?= esc($row['hellman_03_04']) ?></td>
                                                    <td><?= esc($row['hellman_04_05']) ?></td>
                                                    <td><?= esc($row['hellman_05_06']) ?></td>
                                                    <td><?= esc($row['hellman_06_07']) ?></td>
                                                    <td><?= esc($row['hellman_24h']) ?></td>   
                            
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
    <p>
        Jumlah Hujan Sebulan: <?=$total;?> mm<br>
        Penguapan Sebulan: 95.3 mm<br>
        Banyaknya Hujan Sebulan: 14 hari<br><br>
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

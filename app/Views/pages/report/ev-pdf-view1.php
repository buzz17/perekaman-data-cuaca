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
                <td style="width: 35%; text-align: left; border: none; line-height: 0.1"><strong>TEMPAT PEMERIKSAAN :</strong> STAMET SANGIA </td> 
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
                    <th colspan="4">Penguapan</th>

                   
                    <th colspan="1">Kecepatan<br>Angin</th>
                    <th colspan="3">Suhu<br>Air</th>
                </tr>
                <tr>
                    <th>Tinggi H (mm)</th>
                    <th>P (mm)</th>
                    <th>E = P + H (mm)</th>
                    <th>Jam</th>
                    
                    <th>(Km/Jam)</th>
                    <th>Suhu Maks(°C)</th>
                    <th>Suhu Min(°C)</th>
                    <th>Suhu Rata-Rata<br>(°C)</th>
                    
                </tr>
            </thead>
            <tbody>
                <!-- Contoh pengisian baris data -->
               
                
            </tbody>
        </table>
    <p>
        Jumlah Hujan Sebulan: 82.3 mm<br>
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

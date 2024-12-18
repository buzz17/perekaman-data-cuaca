<!DOCTYPE html>
<html>
<head>
    <title>Weather Data Filter</title>
</head>
<body>
    <h1>Filter Data Weather</h1>
    <form method="post" action="">
        <label for="start_date">Start Date (UTC):</label>
        <input type="date" id="start_date" name="start_date" required>
        
        <label for="end_date">End Date (UTC):</label>
        <input type="date" id="end_date" name="end_date" required>

        <label for="jenis_laporan">Jenis Laporan:</label>
        <select id="jenis_laporan" name="jenis_laporan">
            <option value="">--Pilih Jenis Laporan--</option>
            <option value="harian">Harian</option>
            <option value="mingguan">Mingguan</option>
            <option value="bulanan">Bulanan</option>
        </select>
        
        <button type="submit">Filter</button>
    </form>

    <h2>Hasil Filter</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal Lokal</th>
                <th>Tanggal UTC</th>
                <th>Waktu Lokal</th>
                <th>Waktu UTC</th>
                <th>Arah Angin</th>
                <th>Kecepatan Angin</th>
                <th>Jenis Laporan</th>
                <!-- Tambahkan kolom lain jika perlu -->
            </tr>
        </thead>
        <tbody>
            <?php if (count($data) > 0): ?>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?= esc($row['id_data']) ?></td>
                        <td><?= esc($row['tanggallokal']) ?></td>
                        <td><?= esc($row['tanggalutc']) ?></td>
                        <td><?= esc($row['waktulokal']) ?></td>
                        <td><?= esc($row['waktuutc']) ?></td>
                        <td><?= esc($row['arahangin']) ?></td>
                        <td><?= esc($row['kecangin']) ?></td>
                        <td><?= esc($row['observer']) ?></td>
                        <!-- Tambahkan kolom lain jika perlu -->
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">Tidak ada data ditemukan</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>

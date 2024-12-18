<!-- jQuery Library -->
<script src="<?= base_url("plugins/jquery/jquery.min.js"); ?>"></script>

<!-- Custom CSS -->
<style>
  /* White background color for the input */
  .date-input, .time-input {
    background-color: white !important;
  }
  .align-buttons {
        display: flex;
        align-items: center; /* Sejajarkan tombol dengan input */
        gap: 10px; /* Jarak antar tombol */
        margin-top: 15px;
    }
    table.table-bordered th {
        vertical-align: middle !important;
        line-height: normal;
        text-align: center;
    }
</style>

<!-- HTML Structure -->
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <form method="post" action="">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="inputTanggal">Laporan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">                                  
                                    <div class="input-group-text"><i class="far fa-file"></i></div>                                   
                                </div>
                                <select id="inputLaporan" name="inputLaporan" class="form-control" onchange="updateLink(this)">
                                    <option value="">Select Option</option>
                                    <option value="data-meteorologi" <?php echo ($selected == 'meteorologi') ? 'selected' : ''; ?> >Data Meteorologi</option>
                                    <option value="data-curah-hujan" <?php echo ($selected == 'curah-hujan') ? 'selected' : ''; ?> >Curah Hujan</option>
                                    <option value="data-penguapan" <?php echo ($selected == 'penguapan') ? 'selected' : ''; ?> >Penguapan</option>
                                    <option value="data-penyinaran-matahari" <?php echo ($selected == 'penyinaran-matahari') ? 'selected' : ''; ?> >Penyinaran Matahari</option>
                                </select>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="inputTanggal">Tanggal</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="date" class="form-control" name="inputTanggal" id="inputTanggal" inputmode="numeric" value="<?=$tanggal;?>" require>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 align-buttons">                   
                        <button type="submit" class="btn btn-primary btn-sm" onclick="showFormLaporan()">Filter</button>
                    </div>
                </div>
            </form>
        </div>       
    </div>
    <div id="showLaporan">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered table-hover" style="width:100%">
                            <thead>
                                <tr>
                                <th>Tanggal Lokal<br>Jam Lokal</th>
                                                    <th>Tanggal UTC<br>Jam UTC</th>
                                                    <th>Arah<br>Angin</th>
                                                    <th>Kecepatan<br>Angin</th>
                                                    <th>Tekanan Udara<br>QFF</th>
                                                    <th>Tekanan Udara<br>QFE</th>
                                                    <th>Suhu Udara<br>Bola Kering</th>
                                                    <th>Suhu Udara<br>Bola Basah</th>
                                                    <th>Dew Point</th>
                                                    <th>Kelembaban<br>Udara</th>
                                                    <th>Observer</th>
                                </tr>
                            </thead>
                            <tbody align="center">
                            <?php if (count($dataMeteo) > 0): ?>
                                <?php foreach ($dataMeteo as $row): ?>
                                    <tr>
                                        <td><?= esc($row['tanggallokal']) ?><br><?= esc($row['waktulokal']) ?></td>
                                        <td><?= esc($row['tanggalutc']) ?><br><?= esc($row['waktuutc']) ?></td>
                                        <td><?= esc($row['arahangin']) ?></td>
                                        <td><?= esc($row['kecangin']) ?></td>
                                        <td><?= esc($row['qff']) ?></td>
                                        <td><?= esc($row['qfe']) ?></td>
                                        <td><?= esc($row['bk']) ?></td>
                                        <td><?= esc($row['bb']) ?></td>
                                        <td><?= esc($row['dp']) ?></td>
                                        <td><?= esc($row['rh']) ?></td>
                                        <td><?= esc($row['observer']) ?></td>
                                        <!-- Tambahkan kolom lain jika perlu -->
                                    </tr>
                                <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="11" align="center">Tidak ada data ditemukan</td>
                                    </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> 
    </div> 
        
    
</div>

<!-- Initialize Flatpickr -->
<script>     
function updateLink(selectElement) {
        var selectedValue = selectElement.value;
        
        if (selectedValue) {
            // Redirect the user to the corresponding link
            window.location.href = "<?=base_url('monitoring-laporan/');?>" + selectedValue;
        } else {
            window.location.href = "<?=base_url('monitoring-laporan');?>"; 
        }
}
    
function showFormLaporan() {
    const tanggal = document.getElementById('inputTanggal').value.trim();
    const laporan = document.getElementById('inputLaporan').value.trim();

    // Validasi input
    if (!tanggal && !laporan) {
        alert('Harap isi Tanggal dan Jam (UTC).');
    } else if (!tanggal) {
        alert('Harap isi Tanggal terlebih dahulu.');
    } else if (!laporan) {
        alert('Harap isi Jenis Laporan terlebih dahulu.');
    } 
}
</script>

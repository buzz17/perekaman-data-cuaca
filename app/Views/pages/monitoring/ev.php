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
                            <label for="inputTanggal">Bulan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="month" class="form-control" name="inputTanggal" id="inputTanggal" inputmode="numeric" value="<?=$tanggal;?>" require>
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
    <!-- First Row -->
                                <tr>
                                    <th rowspan="2">Tanggal</th>
                                    <th colspan="4">Penguapan</th>
                                    <th rowspan="2">Kecepatan<br>Angin<br>(km/jam)</th>
                                    <th colspan="3">Suhu Air</th>
                                    <th rowspan="2">Observer</th>
                                </tr>
                                <!-- Second Row -->
                                <tr>
                                    <th>Tinggi<br>H<br>(mm)</th>
                                    <th>Curah Hujan<br>P<br>(mm)</th>
                                    <th>Penguapan<br>E = P + H<br>(mm)</th>
                                    <th>Jam</th>
                                    <th>Maksimum<br>(&deg;C)</th>
                                    <th>Minimum<br>(&deg;C)</th>
                                    <th>Rata-Rata<br>(&deg;C)</th>
                                    
                                </tr>
                            </thead>
                            <tbody align="center">
                            <?php if (count($dataEV) > 0): ?>
                                <?php foreach ($dataEV as $row): ?>
                                    <tr>
                                        <td><?= esc($row['tanggal']) ?></td>
                                        <td><?= esc($row['selisih_air']) ?></td>
                                        <td><?= esc($row['curah_hujan']) ?></td>
                                        <td><?= esc($row['penguapan']) ?></td>
                                        <td>07:00</td>
                                        <td><?= number_format(esc($row['counter_rata']),1) ?></td>
                                        <td><?= esc($row['suhu_air_max']) ?></td>
                                        <td><?= esc($row['suhu_air_min']) ?></td>
                                        <td><?= number_format(esc($row['suhu_air_rata']),1) ?></td>
                                        
                                        <td><?= esc($row['observer']) ?></td>
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

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
                                    <th colspan="12">Jam</th>
                                    <th colspan="2">8 Jam</th>
                                    <th colspan="2">12 Jam</th>
                                    <th rowspan="2">Observer</th>
                                </tr>
                                <!-- Second Row -->
                                <tr>
                                    <th>06-07</th>
                                    <th>07-08</th>
                                    <th>08-09</th>
                                    <th>09-10</th>
                                    <th>10-11</th>
                                    <th>11-12</th>
                                    <th>12-13</th>
                                    <th>13-14</th>
                                    <th>14-15</th>
                                    <th>15-16</th>
                                    <th>17-18</th>
                                    <th>18-19</th>
                                    <th>Jml</th>
                                    <th>%</th>
                                    <th>Jml</th>
                                    <th>%</th>
                                </tr>
                            </thead>
                            <tbody align="center">
                            <?php if (count($dataMH) > 0): ?>
                                <?php foreach ($dataMH as $row): ?>
                                    <tr>
                                        <td><?= esc($row['tanggal']) ?></td>
                                        <td><?= esc($row['6_7']) ?></td>
                                        <td><?= esc($row['7_8']) ?></td>
                                        <td><?= esc($row['8_9']) ?></td>
                                        <td><?= esc($row['9_10']) ?></td>
                                        <td><?= esc($row['10_11']) ?></td>
                                        <td><?= esc($row['11_12']) ?></td>
                                        <td><?= esc($row['13_14']) ?></td>
                                        <td><?= esc($row['14_15']) ?></td>
                                        <td><?= esc($row['15_16']) ?></td>
                                        <td><?= esc($row['16_17']) ?></td>
                                        <td><?= esc($row['17_18']) ?></td>
                                        <td><?= esc($row['18_19']) ?></td>
                                        <td><?= number_format(esc($row['8jml']),1) ?></td>
                                        <td><?= number_format(esc($row['8persen']),1) ?></td>
                                        <td><?= number_format(esc($row['12jml']),1) ?></td>
                                        <td><?= number_format(esc($row['12persen']),1) ?></td>
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

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
<style>
.nav-tabs {
    border-bottom: none;
}
.nav-tabs .nav-link {
    border: none;
    background: transparent;
}
.nav-tabs .nav-link.active {
    border: none;
    border-bottom: 2px solid #007bff; /* Opsional */
    margin-right: 10px;
    margin-left: 10px;
}
.card {
    border: none;
    box-shadow: none; /* Opsional */
}
.card-header {
    border-bottom: none;
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
            <div class="col-12 col-sm-12">
                <div class="card">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">           
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Intensitas Hujan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Intensitas Hujan Per Jam</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <!-- Tabel Pertama -->
                            <div class="tab-pane show active" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-striped table-bordered table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">Tanggal</th>
                                                <th colspan="7">Menit</th>
                                                <th colspan="3">Jam</th>
                                                <th rowspan="2">Observer</th>
                                            </tr>
                                            <!-- Second Row -->
                                            <tr>
                                                <th>5</th>
                                                <th>10</th>
                                                <th>15</th>
                                                <th>30</th>
                                                <th>45</th>
                                                <th>60</th>
                                                <th>120</th>
                                                <th>3</th>
                                                <th>6</th>
                                                <th>12</th>
                                            </tr>
                                        </thead>
                                        <tbody align="center">
                                        <?php if (count($dataCH) > 0): ?>
                                            <?php foreach ($dataCH as $row): ?>
                                                <tr>
                                                    <td><?= esc($row['tanggal']) ?></td>
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
                            <!-- Tabel Kedua -->
                            <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                                <div class="table-responsive">
                                    <table id="example2" class="table table-striped table-bordered table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">Tanggal</th>
                                                <th colspan="24">Jam</th>
                                                <th rowspan="2">Total<br>24 Jam</th>
                                                <th rowspan="2">Observer</th>
                                            </tr>
                                            <!-- Second Row -->
                                            <tr>
                                                <th>07-08</th>
                                                <th>08-09</th>
                                                <th>09-10</th>
                                                <th>10-11</th>
                                                <th>11-12</th>
                                                <th>12-13</th>
                                                <th>13-14</th>
                                                <th>14-15</th>
                                                <th>15-16</th>
                                                <th>16-17</th>
                                                <th>17-18</th>
                                                <th>18-19</th>
                                                <th>19-20</th>
                                                <th>20-21</th>
                                                <th>21-22</th>
                                                <th>22-23</th>
                                                <th>23-00</th>
                                                <th>00-01</th>
                                                <th>01-02</th>
                                                <th>02-03</th>
                                                <th>03-04</th>
                                                <th>04-05</th>
                                                <th>05-06</th>
                                                <th>06-07</th>
                                            </tr>
                                        </thead>
                                        <tbody align="center">
                                        <?php if (count($dataCH) > 0): ?>
                                            <?php foreach ($dataCH as $row): ?>
                                                <tr>
                                                    <td><?= esc($row['tanggal']) ?></td>
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

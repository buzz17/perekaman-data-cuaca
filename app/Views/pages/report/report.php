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
            <!-- Displaying Success or Error Messages -->
            
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            <form action="/report/add" method="POST" class="form-horizontal" enctype="multipart/form-data"> 
                <?= csrf_field() ?>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="inputTanggal">Laporan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">                                  
                                    <div class="input-group-text"><i class="far fa-file"></i></div>                                   
                                </div>
                                <select id="inputLaporan" name="inputLaporan" class="form-control">
                                    <option value="">Select Option</option>
                                    <option value="data-meteorologi" <?php echo ($selected == 'data-meteorologi') ? 'selected' : ''; ?> >Data Meteorologi</option>
                                    <option value="data-curah-hujan" <?php echo ($selected == 'data-curah-hujan') ? 'selected' : ''; ?> >Curah Hujan</option>
                                    <option value="data-penguapan" <?php echo ($selected == 'data-penguapan') ? 'selected' : ''; ?> >Penguapan</option>
                                    <option value="data-penyinaran-matahari" <?php echo ($selected == 'data-penyinaran-matahari') ? 'selected' : ''; ?> >Penyinaran Matahari</option>
                                </select>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="inputTanggal">Periode</label>
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
                        <button type="submit" class="btn btn-primary btn-sm" onclick="showFormLaporan()">Prosess</button>
                    </div>
                </div>
            </form>
        </div>       
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Report</th>
                                
                                <th>Periode</th>
                                <th>Created</th>
                                
                                <th>Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach ($reports as $report): 
                            ?>
                            <tr>
                                <td align="center"><?=$no++;?></td>
                                <td><?= $report->jenis_laporan; ?></td>
                                
                                <td align="center"><?= $report->periode; ?></td>
                                <td><?= $report->created_at; ?></td>
                                
                                <td>
                                    <a href="<?= base_url('report-laporan/download/' . $report->id_report) ?>" class="btn btn-primary btn-sm">
                                        Download
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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

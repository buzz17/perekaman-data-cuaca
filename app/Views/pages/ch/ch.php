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
</style>

<!-- HTML Structure -->
<div class="container-fluid">
    
        
        <div class="card">
            <div class="card-body">
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
                <div class="row">  
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="inputTanggal">Tanggal</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="date" class="form-control" name="inputTanggal" id="inputTanggal" inputmode="numeric"  require>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 align-buttons">                   
                        <button class="btn btn-primary btn-sm" onclick="showFormInput()" id='submitDate' >Fetch</button>
                    </div>
                </div>
            </div>       
        </div>
        <div class="fade" id="FormInput">
    <form action="/pengamatan/addhujan" method="POST" class="form-horizontal" enctype="multipart/form-data">
        <input type="hidden" name="inputObserver" value="<?=session('namalengkap');?>">
        <input type="hidden" class="form-control" name="hiddenTanggal" id='hiddenTanggal'/>
        <input type="hidden" class="form-control" name="input_hellman_24jam" id='input_hellman_24jam' readonly/>
        <div class="row">
            <!-- Intensitas Hujan Dalam Menit -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p class="text-left text-bold">Intensitas Hujan Dalam Menit</p>
                        <div class="row text-center">
                            <!-- Bagian Kiri -->
                            <div class="col-xl-5">
                                <div class="row">
                                    <div class="col-4">
                                        <p for="hellman_5m" class="label-entry bg-light-primary">
                                            5 menit
                                            <i class="fas fa-info-circle" title="Jumlah curah hujan terbesar dalam periode 5 menit"></i>
                                        </p>
                                        <input id="hellman_5m" name="hellman_5m" type="number" class="form-control form-control-sm text-center" require>
                                    </div>
                                    <div class="col-4">
                                        <p for="hellman_10m" class="label-entry bg-light-primary">
                                            10 menit
                                            <i class="fas fa-info-circle" title="Jumlah curah hujan terbesar dalam periode 10 menit"></i>
                                        </p>
                                        <input id="hellman_10m" name="hellman_10m" type="number" class="form-control form-control-sm text-center" require>
                                    </div>
                                    <div class="col-4">
                                        <p for="hellman_15m" class="label-entry bg-light-primary">
                                            15 menit
                                            <i class="fas fa-info-circle" title="Jumlah curah hujan terbesar dalam periode 15 menit"></i>
                                        </p>
                                        <input id="hellman_15m" name="hellman_15m" type="number" class="form-control form-control-sm text-center" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Bagian Kanan -->
                            <div class="col-xl-7">
                                <div class="row">
                                    <div class="col-3">
                                        <p for="hellman_30m" class="label-entry bg-light-primary">
                                            30 menit
                                            <i class="fas fa-info-circle" title="Jumlah curah hujan terbesar dalam periode 30 menit"></i>
                                        </p>
                                        <input id="hellman_30m" name="hellman_30m" type="number" class="form-control form-control-sm text-center" require>
                                    </div>
                                    <div class="col-3">
                                        <p for="hellman_45m" class="label-entry bg-light-primary">
                                            45 menit
                                            <i class="fas fa-info-circle" title="Jumlah curah hujan terbesar dalam periode 45 menit"></i>
                                        </p>
                                        <input id="hellman_45m" name="hellman_45m" type="number" class="form-control form-control-sm text-center" require>
                                    </div>
                                    <div class="col-3">
                                        <p for="hellman_60m" class="label-entry bg-light-primary">
                                            60 menit
                                            <i class="fas fa-info-circle" title="Jumlah curah hujan terbesar dalam periode 60 menit"></i>
                                        </p>
                                        <input id="hellman_60m" name="hellman_60m" type="number" class="form-control form-control-sm text-center" require>
                                    </div>
                                    <div class="col-3">
                                        <p for="hellman_120m" class="label-entry bg-light-primary">
                                            120 menit
                                            <i class="fas fa-info-circle" title="Jumlah curah hujan terbesar dalam periode 120 menit"></i>
                                        </p>
                                        <input id="hellman_120m" name="hellman_120m" type="number" class="form-control form-control-sm text-center" require>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Intensitas Hujan Dalam Jam -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <p class="text-left text-bold">Intensitas Hujan Dalam Jam</p>
                        <div class="row text-center">
                            <div class="col-sm-4">
                                <p for="hellman_3h" class="label-entry bg-light-success">
                                    3 jam
                                    <i class="fas fa-info-circle" title="Jumlah curah hujan terbesar dalam periode 3 jam"></i>
                                </p>
                                <input id="hellman_3h" name="hellman_3h" type="number" class="form-control form-control-sm text-center">
                            </div>
                            <div class="col-sm-4">
                                <p for="hellman_6h" class="label-entry bg-light-success">
                                    6 jam
                                    <i class="fas fa-info-circle" title="Jumlah curah hujan terbesar dalam periode 6 jam"></i>
                                </p>
                                <input id="hellman_6h" name="hellman_6h" type="number" class="form-control form-control-sm text-center">
                            </div>
                            <div class="col-sm-4">
                                <p for="hellman_12h" class="label-entry bg-light-success">
                                    12 jam
                                    <i class="fas fa-info-circle" title="Jumlah curah hujan terbesar dalam periode 12 jam"></i>
                                </p>
                                <input id="hellman_12h" name="hellman_12h" type="number" class="form-control form-control-sm text-center">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">   
                    <div class="card-body">
                        <p class="text-left text-bold">Intensitas Hujan Per Jam</p>
                        <div class="row text-center">
                            <!-- 07-08 -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="input_hellman_07_08" class="label-entry bg-light-primary">
                                        07-08
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                            title="Jumlah curah hujan pada pukul 07 - 08 waktu setempat dalam satuan milimeter (bisa diisi dengan pecahan desimal 1 angka di belakang koma)">
                                        </i>
                                    </label>
                                    <input type="number" id="input_hellman_07_08" name="hellman_07_08" 
                                        class="form-control text-center" placeholder="mm" min="0" step="0.1" require >
                                </div>
                            </div>
                            <!-- 08-09 -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="input_hellman_08_09" class="label-entry bg-light-primary">
                                        08-09
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                            title="Jumlah curah hujan pada pukul 08 - 09 waktu setempat dalam satuan milimeter (bisa diisi dengan pecahan desimal 1 angka di belakang koma)">
                                        </i>
                                    </label>
                                    <input type="number" id="input_hellman_08_09" name="hellman_08_09" 
                                        class="form-control text-center" placeholder="mm" min="0" step="0.1" require>
                                </div>
                            </div>
                            <!-- 09-10 -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="input_hellman_09_10" class="label-entry bg-light-primary">
                                        09-10
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                            title="Jumlah curah hujan pada pukul 09 - 10 waktu setempat dalam satuan milimeter (bisa diisi dengan pecahan desimal 1 angka di belakang koma)">
                                        </i>
                                    </label>
                                    <input type="number" id="input_hellman_09_10" name="hellman_09_10" 
                                        class="form-control text-center" placeholder="mm" min="0" step="0.1" require>
                                </div>
                            </div>
                            <!-- 10-11 -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="input_hellman_10_11" class="label-entry bg-light-primary">
                                        10-11
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                            title="Jumlah curah hujan pada pukul 10 - 11 waktu setempat dalam satuan milimeter (bisa diisi dengan pecahan desimal 1 angka di belakang koma)">
                                        </i>
                                    </label>
                                    <input type="number" id="input_hellman_10_11" name="hellman_10_11" 
                                        class="form-control text-center" placeholder="mm" min="0" step="0.1" require>
                                </div>
                            </div>
                            <!-- 11-12 -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="input_hellman_11_12" class="label-entry bg-light-primary">
                                        11-12
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                            title="Jumlah curah hujan pada pukul 11 - 12 waktu setempat dalam satuan milimeter (bisa diisi dengan pecahan desimal 1 angka di belakang koma)">
                                        </i>
                                    </label>
                                    <input type="number" id="input_hellman_11_12" name="hellman_11_12" 
                                        class="form-control text-center" placeholder="mm" min="0" step="0.1" require>
                                </div>
                            </div>
                            <!-- 12-13 -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="input_hellman_12_13" class="label-entry bg-light-primary">
                                        12-13
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                            title="Jumlah curah hujan pada pukul 12 - 13 waktu setempat dalam satuan milimeter (bisa diisi dengan pecahan desimal 1 angka di belakang koma)">
                                        </i>
                                    </label>
                                    <input type="number" id="input_hellman_12_13" name="hellman_12_13" 
                                        class="form-control text-center" placeholder="mm" min="0" step="0.1" require>
                                </div>
                            </div>
                            <!-- 13-14 -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="input_hellman_13_14" class="label-entry bg-light-primary">
                                        13-14
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                            title="Jumlah curah hujan pada pukul 13 - 14 waktu setempat dalam satuan milimeter (bisa diisi dengan pecahan desimal 1 angka di belakang koma)">
                                        </i>
                                    </label>
                                    <input type="number" id="input_hellman_13_14" name="hellman_13_14" 
                                        class="form-control text-center" placeholder="mm" min="0" step="0.1" require>
                                </div>
                            </div>
                            <!-- 14-15 -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="input_hellman_14_15" class="label-entry bg-light-primary">
                                        14-15
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                            title="Jumlah curah hujan pada pukul 14 - 15 waktu setempat dalam satuan milimeter (bisa diisi dengan pecahan desimal 1 angka di belakang koma)">
                                        </i>
                                    </label>
                                    <input type="number" id="input_hellman_14_15" name="hellman_14_15" 
                                        class="form-control text-center" placeholder="mm" min="0" step="0.1" require>
                                </div>
                            </div>
                            <!-- 15-16 -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="input_hellman_15_16" class="label-entry bg-light-primary">
                                        15-16
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                            title="Jumlah curah hujan pada pukul 15 - 16 waktu setempat dalam satuan milimeter (bisa diisi dengan pecahan desimal 1 angka di belakang koma)">
                                        </i>
                                    </label>
                                    <input type="number" id="input_hellman_15_16" name="hellman_15_16" 
                                        class="form-control text-center" placeholder="mm" min="0" step="0.1" require>
                                </div>
                            </div>
                            <!-- 16-17 -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="input_hellman_16_17" class="label-entry bg-light-primary">
                                        16-17
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                            title="Jumlah curah hujan pada pukul 16 - 17 waktu setempat dalam satuan milimeter (bisa diisi dengan pecahan desimal 1 angka di belakang koma)">
                                        </i>
                                    </label>
                                    <input type="number" id="input_hellman_16_17" name="hellman_16_17" 
                                        class="form-control text-center" placeholder="mm" min="0" step="0.1" require>
                                </div>
                            </div>
                            <!-- 17-18 -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="input_hellman_17_18" class="label-entry bg-light-primary">
                                        17-18
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                            title="Jumlah curah hujan pada pukul 17 - 18 waktu setempat dalam satuan milimeter (bisa diisi dengan pecahan desimal 1 angka di belakang koma)">
                                        </i>
                                    </label>
                                    <input type="number" id="input_hellman_17_18" name="hellman_17_18" 
                                        class="form-control text-center" placeholder="mm" min="0" step="0.1" require>
                                </div>
                            </div>
                            <!-- 18-19 -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="input_hellman_18_19" class="label-entry bg-light-primary">
                                        18-19
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                            title="Jumlah curah hujan pada pukul 18 - 19 waktu setempat dalam satuan milimeter (bisa diisi dengan pecahan desimal 1 angka di belakang koma)">
                                        </i>
                                    </label>
                                    <input type="number" id="input_hellman_18_19" name="hellman_18_19" 
                                        class="form-control text-center" placeholder="mm" min="0" step="0.1" require>
                                </div>
                            </div>
                            <!-- 19-20 -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="input_hellman_19_20" class="label-entry bg-light-primary">
                                        19-20
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                            title="Jumlah curah hujan pada pukul 19 - 20 waktu setempat dalam satuan milimeter (bisa diisi dengan pecahan desimal 1 angka di belakang koma)">
                                        </i>
                                    </label>
                                    <input type="number" id="input_hellman_19_20" name="hellman_19_20" 
                                        class="form-control text-center" placeholder="mm" min="0" step="0.1" require>
                                </div>
                            </div>
                            <!-- 20-21 -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="input_hellman_20_21" class="label-entry bg-light-primary">
                                        20-21
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                            title="Jumlah curah hujan pada pukul 20 - 21 waktu setempat dalam satuan milimeter (bisa diisi dengan pecahan desimal 1 angka di belakang koma)">
                                        </i>
                                    </label>
                                    <input type="number" id="input_hellman_20_21" name="hellman_20_21" 
                                        class="form-control text-center" placeholder="mm" min="0" step="0.1" require>
                                </div>
                            </div>
                            <!-- 21-22 -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="input_hellman_21_22" class="label-entry bg-light-primary">
                                        21-22
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                            title="Jumlah curah hujan pada pukul 21 - 22 waktu setempat dalam satuan milimeter (bisa diisi dengan pecahan desimal 1 angka di belakang koma)">
                                        </i>
                                    </label>
                                    <input type="number" id="input_hellman_21_22" name="hellman_21_22" 
                                        class="form-control text-center" placeholder="mm" min="0" step="0.1" require>
                                </div>
                            </div>
                            <!-- 22-23 -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="input_hellman_22_23" class="label-entry bg-light-primary">
                                        22-23
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                            title="Jumlah curah hujan pada pukul 22 - 23 waktu setempat dalam satuan milimeter (bisa diisi dengan pecahan desimal 1 angka di belakang koma)">
                                        </i>
                                    </label>
                                    <input type="number" id="input_hellman_22_23" name="hellman_22_23" 
                                        class="form-control text-center" placeholder="mm" min="0" step="0.1" require>
                                </div>
                            </div>
                            <!-- 23-24 -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="input_hellman_23_24" class="label-entry bg-light-primary">
                                        23-24
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                            title="Jumlah curah hujan pada pukul 23 - 24 waktu setempat dalam satuan milimeter (bisa diisi dengan pecahan desimal 1 angka di belakang koma)">
                                        </i>
                                    </label>
                                    <input type="number" id="input_hellman_23_24" name="hellman_23_24" 
                                        class="form-control text-center" placeholder="mm" min="0" step="0.1" require>
                                </div>
                            </div>
                            <!-- 00-01 -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="input_hellman_00_01" class="label-entry bg-light-primary">
                                        00-01
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                            title="Jumlah curah hujan pada pukul 00 - 01 waktu setempat dalam satuan milimeter (bisa diisi dengan pecahan desimal 1 angka di belakang koma)">
                                        </i>
                                    </label>
                                    <input type="number" id="input_hellman_00_01" name="hellman_00_01" 
                                        class="form-control text-center" placeholder="mm" min="0" step="0.1" require>
                                </div>
                            </div>
                            <!-- 01-02 -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="input_hellman_01_02" class="label-entry bg-light-primary">
                                        01-02
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                            title="Jumlah curah hujan pada pukul 01 - 02 waktu setempat dalam satuan milimeter (bisa diisi dengan pecahan desimal 1 angka di belakang koma)">
                                        </i>
                                    </label>
                                    <input type="number" id="input_hellman_01_02" name="hellman_01_02" 
                                        class="form-control text-center" placeholder="mm" min="0" step="0.1" require>
                                </div>
                            </div>
                            <!-- 02-03 -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="input_hellman_02_03" class="label-entry bg-light-primary">
                                        02-03
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                            title="Jumlah curah hujan pada pukul 02 - 03 waktu setempat dalam satuan milimeter (bisa diisi dengan pecahan desimal 1 angka di belakang koma)">
                                        </i>
                                    </label>
                                    <input type="number" id="input_hellman_02_03" name="hellman_02_03" 
                                        class="form-control text-center" placeholder="mm" min="0" step="0.1" require>
                                </div>
                            </div>
                            <!-- 03-04 -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="input_hellman_03_04" class="label-entry bg-light-primary">
                                        03-04
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                            title="Jumlah curah hujan pada pukul 03 - 04 waktu setempat dalam satuan milimeter (bisa diisi dengan pecahan desimal 1 angka di belakang koma)">
                                        </i>
                                    </label>
                                    <input type="number" id="input_hellman_03_04" name="hellman_03_04" 
                                        class="form-control text-center" placeholder="mm" min="0" step="0.1" require>
                                </div>
                            </div>
                            <!-- 04-05 -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="input_hellman_04_05" class="label-entry bg-light-primary">
                                        04-05
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                            title="Jumlah curah hujan pada pukul 04 - 05 waktu setempat dalam satuan milimeter (bisa diisi dengan pecahan desimal 1 angka di belakang koma)">
                                        </i>
                                    </label>
                                    <input type="number" id="input_hellman_04_05" name="hellman_04_05" 
                                        class="form-control text-center" placeholder="mm" min="0" step="0.1" require>
                                </div>
                            </div>
                            <!-- 05-06 -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="input_hellman_05_06" class="label-entry bg-light-primary">
                                        05-06
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                            title="Jumlah curah hujan pada pukul 05 - 06 waktu setempat dalam satuan milimeter (bisa diisi dengan pecahan desimal 1 angka di belakang koma)">
                                        </i>
                                    </label>
                                    <input type="number" id="input_hellman_05_06" name="hellman_05_06" 
                                        class="form-control text-center" placeholder="mm" min="0" step="0.1" require>
                                </div>
                            </div>
                            <!-- 05-06 -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="input_hellman_05_06" class="label-entry bg-light-primary">
                                        06-07
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                            title="Jumlah curah hujan pada pukul 06 - 07 waktu setempat dalam satuan milimeter (bisa diisi dengan pecahan desimal 1 angka di belakang koma)">
                                        </i>
                                    </label>
                                    <input type="number" id="input_hellman_06_07" name="hellman_06_07" 
                                        class="form-control text-center" placeholder="mm" min="0" step="0.1" require>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <button id='submitButton' class="btn btn-primary btn-sm mr-2" style="min-width: 80px;">Save</button>                       
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>

        
        
    
</div>

<!-- Initialize Flatpickr -->
<script>
    function showFormInput() {
        const tanggal = document.getElementById('inputTanggal').value.trim();
        // Validasi input
        if (!tanggal) {
            alert('Harap isi Tanggal terlebih dahulu.');
        } else {
            // Jika validasi lolos, tampilkan form input
            const formInput = document.getElementById('FormInput');
            formInput.classList.remove('fade');
            formInput.classList.add('show');
        }
    }
</script>
<script>
    function setHiddenTanggal() {
        const tanggal = document.getElementById('inputTanggal').value.trim();
        // Get the date input and hidden input elements
        const dateInput = document.getElementById('inputTanggal');
        const hiddenInput = document.getElementById('hiddenTanggal');
        const dateValue = new Date(dateInput.value);
        const localDate = new Date(dateValue.getTime() - dateValue.getTimezoneOffset() * 60000);
        // Convert the local date to the desired format (Y-m-d)
        const formattedDate = localDate.toISOString().split('T')[0]; // Formats the date as YYYY-MM-DD
        // Set the hidden input value with the formatted date
        hiddenInput.value = formattedDate;

        // Show the form input
        const formInput = document.getElementById('FormInput');
        formInput.classList.remove('fade');
        formInput.classList.add('show');

        // Optionally log the selected date to the console
        console.log('Tanggal yang dipilih:', formattedDate);
    }
    // Add the event listener to the button
    document.getElementById('submitDate').addEventListener('click', setHiddenTanggal);
    
</script>
<!--script>
    function calculateCH() {
        
        let ch_00_01 = parseFloat(document.getElementById('input_hellman_00_01').value) || 0;
        let ch_01_02 = parseFloat(document.getElementById('input_hellman_01_02').value) || 0;
        let ch_02_03 = parseFloat(document.getElementById('input_hellman_02_03').value) || 0;
        let ch_03_04 = parseFloat(document.getElementById('input_hellman_03_04').value) || 0;
        let ch_04_05 = parseFloat(document.getElementById('input_hellman_04_05').value) || 0;
        let ch_05_06 = parseFloat(document.getElementById('input_hellman_05_06').value) || 0;
        let ch_06_07 = parseFloat(document.getElementById('input_hellman_06_07').value) || 0;
        let ch_07_08 = parseFloat(document.getElementById('input_hellman_07_08').value) || 0;
        let ch_08_09 = parseFloat(document.getElementById('input_hellman_08_09').value) || 0;
        let ch_09_10 = parseFloat(document.getElementById('input_hellman_09_10').value) || 0;
        let ch_10_11 = parseFloat(document.getElementById('input_hellman_10_11').value) || 0;
        let ch_11_12 = parseFloat(document.getElementById('input_hellman_11_12').value) || 0;
        let ch_12_13 = parseFloat(document.getElementById('input_hellman_12_13').value) || 0;
        let ch_13_14 = parseFloat(document.getElementById('input_hellman_13_14').value) || 0;
        let ch_14_15 = parseFloat(document.getElementById('input_hellman_14_15').value) || 0;
        let ch_15_16 = parseFloat(document.getElementById('input_hellman_15_16').value) || 0;
        let ch_16_17 = parseFloat(document.getElementById('input_hellman_16_17').value) || 0;
        let ch_17_18 = parseFloat(document.getElementById('input_hellman_17_18').value) || 0;
        let ch_18_19 = parseFloat(document.getElementById('input_hellman_18_19').value) || 0;
        let ch_19_20 = parseFloat(document.getElementById('input_hellman_19_20').value) || 0;
        let ch_20_21 = parseFloat(document.getElementById('input_hellman_20_21').value) || 0;
        let ch_21_22 = parseFloat(document.getElementById('input_hellman_21_22').value) || 0;
        let ch_22_23 = parseFloat(document.getElementById('input_hellman_22_23').value) || 0;
        let ch_23_24 = parseFloat(document.getElementById('input_hellman_23_24').value) || 0;

        let totalCH = ch_00_01; 
        
        
        let chTotal = (totalCH).toFixed(1); 
         document.getElementById('input_hellman_24jam').value = chTotal;
         console.log(ch_00_01);

    }
    calculateCH();

    


   
</script-->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.querySelector('form');
        const requiredFields = form.querySelectorAll('input[require]');

        form.addEventListener('submit', (e) => {
            let isValid = true;
            requiredFields.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    alert(`Field "${input.id}" harus diisi!`);
                    input.focus();
                    return false; // Stop checking further fields
                }
            });

            if (!isValid) {
                e.preventDefault(); // Prevent form submission
            }
        });
    });
</script>
<script>
        function calculateCH() {
            const inputFields = [
                'input_hellman_00_01', 'input_hellman_01_02', 'input_hellman_02_03', 'input_hellman_03_04',
                'input_hellman_04_05', 'input_hellman_05_06', 'input_hellman_06_07', 'input_hellman_07_08',
                'input_hellman_08_09', 'input_hellman_09_10', 'input_hellman_10_11', 'input_hellman_11_12',
                'input_hellman_12_13', 'input_hellman_13_14', 'input_hellman_14_15', 'input_hellman_15_16',
                'input_hellman_16_17', 'input_hellman_17_18', 'input_hellman_18_19', 'input_hellman_19_20',
                'input_hellman_20_21', 'input_hellman_21_22', 'input_hellman_22_23', 'input_hellman_23_24'
            ];

            let totalCH = 0;

            // Loop through input fields, adding their values
            inputFields.forEach(fieldId => {
                let inputElement = document.getElementById(fieldId);
                if (inputElement) {
                    let value = inputElement.value.trim();

                    // Handle empty or invalid values
                    if (value === '' || isNaN(value)) {
                        console.log(`Invalid input in ${fieldId}: "${value}", treated as 0`);
                        value = 0; // Default to 0 if invalid or empty
                    } else {
                        value = parseFloat(value);
                        console.log(`Valid value in ${fieldId}: ${value}`);
                    }

                    totalCH += value;
                } else {
                    console.error(`Input field ${fieldId} not found`);
                }
            });

            let chTotal = totalCH.toFixed(1);
            console.log(`Total CH: ${chTotal}`);

            // Update result field
            let resultField = document.getElementById('input_hellman_24jam');
            if (resultField) {
                resultField.value = chTotal;
            } else {
                console.error('Result field "input_hellman_24jam" not found');
            }
        }

        // Add event listener to trigger calculation on each input change
        document.querySelectorAll('input[type="number"]').forEach(input => {
            input.addEventListener('input', calculateCH);
        });

        // Initial calculation when the page loads (if inputs already have values)
        window.addEventListener('load', calculateCH);
    </script>










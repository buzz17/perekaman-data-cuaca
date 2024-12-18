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
    <form action="/pengamatan/addmatahari" method="POST" class="form-horizontal" enctype="multipart/form-data">
        <input type="hidden" name="inputObserver" value="<?=session('namalengkap');?>">
        <input type="hidden" class="form-control" name="hiddenTanggal" id='hiddenTanggal'/>
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <p class="text-left text-bold">Jumlah Pembakaran Per Jam</p>
                        <div class="row text-center">
                            <div class="col-md-1">
                                <div class="form-group">
                                    <p for="ss_06_07" class="label-entry bg-light-primary">
                                        06-07
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                           title="Jumlah pembakaran pada pukul 06 - 07 dalam satuan jam">
                                        </i>
                                    </p>
                                    <input type="number" id="input_ss_06_07" name="ss_06_07" class="form-control text-center" placeholder="jam" step="0.1" require>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <p for="ss_07_08" class="label-entry bg-light-primary">
                                        07-08
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                           title="Jumlah pembakaran pada pukul 07 - 08 dalam satuan jam">
                                        </i>
                                    </p>
                                    <input type="number" id="input_ss_07_08" name="ss_07_08" class="form-control text-center" placeholder="jam" step="0.1" require>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <p for="ss_08_09" class="label-entry bg-light-primary">
                                        08-09
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                           title="Jumlah pembakaran pada pukul 08 - 09 dalam satuan jam">
                                        </i>
                                    </p>
                                    <input type="number" id="input_ss_08_09" name="ss_08_09" class="form-control text-center" placeholder="jam" step="0.1" require>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <p for="ss_09_10" class="label-entry bg-light-primary">
                                        09-10
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                           title="Jumlah pembakaran pada pukul 09 - 10 dalam satuan jam">
                                        </i>
                                    </p>
                                    <input type="number" id="input_ss_09_10" name="ss_09_10" class="form-control text-center" placeholder="jam" step="0.1" require>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <p for="ss_10_11" class="label-entry bg-light-primary">
                                        10-11
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                           title="Jumlah pembakaran pada pukul 10 - 11 dalam satuan jam">
                                        </i>
                                    </p>
                                    <input type="number" id="input_ss_10_11" name="ss_10_11" class="form-control text-center" placeholder="jam" step="0.1" require>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <p for="ss_11_12" class="label-entry bg-light-primary">
                                        11-12
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                           title="Jumlah pembakaran pada pukul 11 - 12 dalam satuan jam">
                                        </i>
                                    </p>
                                    <input type="number" id="input_ss_11_12" name="ss_11_12" class="form-control text-center" placeholder="jam" step="0.1" require>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <p for="ss_12_13" class="label-entry bg-light-primary">
                                        12-13
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                           title="Jumlah pembakaran pada pukul 12 - 13 dalam satuan jam">
                                        </i>
                                    </p>
                                    <input type="number" id="input_ss_12_13" name="ss_12_13" class="form-control text-center" placeholder="jam" step="0.1" require>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <p for="ss_13_14" class="label-entry bg-light-primary">
                                        13-14
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                           title="Jumlah pembakaran pada pukul 13 - 14 dalam satuan jam">
                                        </i>
                                    </p>
                                    <input type="number" id="input_ss_13_14" name="ss_13_14" class="form-control text-center" placeholder="jam" step="0.1" require>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <p for="ss_14_15" class="label-entry bg-light-primary">
                                        14-15
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                           title="Jumlah pembakaran pada pukul 14 - 15 dalam satuan jam">
                                        </i>
                                    </p>
                                    <input type="number" id="input_ss_14_15" name="ss_14_15" class="form-control text-center" placeholder="jam" step="0.1" require>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <p for="ss_15_16" class="label-entry bg-light-primary">
                                        15-16
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                           title="Jumlah pembakaran pada pukul 15 - 16 dalam satuan jam">
                                        </i>
                                    </p>
                                    <input type="number" id="input_ss_15_16" name="ss_15_16" class="form-control text-center" placeholder="jam" step="0.1" require>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <p for="ss_16_17" class="label-entry bg-light-primary">
                                        16-17
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                           title="Jumlah pembakaran pada pukul 16 - 17 dalam satuan jam">
                                        </i>
                                    </p>
                                    <input type="number" id="input_ss_16_17" name="ss_16_17" class="form-control text-center" placeholder="jam" step="0.1" require>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <p for="ss_17_18" class="label-entry bg-light-primary">
                                        17-18
                                        <i class="fas fa-question-circle" data-toggle="tooltip" 
                                           title="Jumlah pembakaran pada pukul 17 - 18 dalam satuan jam">
                                        </i>
                                    </p>
                                    <input type="number" id="input_ss_17_18" name="ss_17_18" class="form-control text-center" placeholder="jam" step="0.1" require>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <p class="text-left text-bold">Jumlah Lama Penyinaran</p>
                        <div class="row text-center">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <p for="jlm_8_jam" class="label-entry bg-light-primary text-right">
                                        8
                                    </p>
                                   
                                   <input type="number" id="jlm_8_jam" name="jlm_8_jam" class="form-control text-center" placeholder="0.0" step="0.1" readonly  require>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <p for="persen_8_jam" class="label-entry bg-light-primary text-left">
                                        Jam
                                    </p>
                                    <input type="number" id="persen_8_jam" name="persen_8_jam" class="form-control text-center" placeholder="0%" step="0.1" readonly  require>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <p for="jlm_12_jam" class="label-entry bg-light-primary text-right">
                                        12
                                    </p>
                                    <input type="number" id="jlm_12_jam" name="jlm_12_jam" class="form-control text-center" placeholder="0.0" step="0.1" readonly  require>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <p for="persen_12_jam" class="label-entry bg-light-primary text-left">
                                        Jam
                                    </p>
                                    <input type="number" id="persen_12_jam" name="persen_12_jam" class="form-control text-center" placeholder="0%" step="0.1" readonly  require>
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
<script>
    // Function to calculate and update the Sunshine Duration
    function calculateSunshineDuration() {
        // Get values from the "Jumlah Pembakaran Per Jam" fields
        let ss_06_07 = parseFloat(document.getElementById('input_ss_06_07').value) || 0;
        let ss_07_08 = parseFloat(document.getElementById('input_ss_07_08').value) || 0;
        let ss_08_09 = parseFloat(document.getElementById('input_ss_08_09').value) || 0;
        let ss_09_10 = parseFloat(document.getElementById('input_ss_09_10').value) || 0;
        let ss_10_11 = parseFloat(document.getElementById('input_ss_10_11').value) || 0;
        let ss_11_12 = parseFloat(document.getElementById('input_ss_11_12').value) || 0;
        let ss_12_13 = parseFloat(document.getElementById('input_ss_12_13').value) || 0;
        let ss_13_14 = parseFloat(document.getElementById('input_ss_13_14').value) || 0;
        let ss_14_15 = parseFloat(document.getElementById('input_ss_14_15').value) || 0;
        let ss_15_16 = parseFloat(document.getElementById('input_ss_15_16').value) || 0;
        let ss_16_17 = parseFloat(document.getElementById('input_ss_16_17').value) || 0;
        let ss_17_18 = parseFloat(document.getElementById('input_ss_17_18').value) || 0;

        // Calculate total burning hours
        let totalBurningHours8 =   ss_08_09 + ss_09_10 + ss_10_11 + ss_11_12 + ss_12_13 + ss_13_14 + ss_14_15 + ss_15_16;
        let totalBurningHours12 = ss_06_07 + ss_07_08 + ss_08_09 + ss_09_10 + ss_10_11 + ss_11_12 + ss_12_13 + ss_13_14 + ss_14_15 + ss_15_16 + ss_16_17 + ss_17_18;

        // Calculate sunshine duration based on the burning hours
        // Assuming a simple calculation here (e.g., duration is directly proportional to burning hours).
        let jlm8Jam = (totalBurningHours8).toFixed(1); // Example calculation
        let persen8Jam = ((jlm8Jam / 8) * 100).toFixed(1);

        let jlm12Jam = (totalBurningHours12).toFixed(1); // Example calculation
        let persen12Jam = ((jlm12Jam / 12) * 100).toFixed(1);

        // Update the "Lama Penyinaran" fields
        document.getElementById('jlm_8_jam').value = jlm8Jam;
        document.getElementById('persen_8_jam').value = persen8Jam;
        document.getElementById('jlm_12_jam').value = jlm12Jam;
        document.getElementById('persen_12_jam').value = persen12Jam;
    }

    // Add event listeners to input fields to trigger the calculation on change
    document.querySelectorAll('input[name^="ss_"]').forEach(input => {
        input.addEventListener('input', calculateSunshineDuration);
    });

    // Initial calculation when the page is loaded
    window.addEventListener('load', calculateSunshineDuration);
</script>
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

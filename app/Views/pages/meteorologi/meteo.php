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
<form action="/pengamatan/addmeteorologi" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="inputTanggal">Jam Lokal</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-clock"></i>
                                    </span>
                                </div>
                                <input type="time" class="form-control" name="inputTime" id="inputTime" inputmode="numeric"  require>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 align-buttons">                   
                        <a href="javascript:void(0)" class=" btn-primary btn-sm" onclick="showFormInput()">Fetch</a>
                    </div>
                </div>
            </div>       
        </div>
        <div class="fade" id="FormInput">
    
        <input type="hidden" name="inputObserver" value="<?=session('namalengkap');?>">
        <input type="hidden" class="form-control" name="hiddenTanggal" id='hiddenTanggal'/>
        <div class="row">
            <!-- Angin -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <p class="text-left text-bold">Angin</p>
                        <div class="form-group row">
                            <div for="inputArahAngin" class="col-sm-6 col-form-label">Arah Angin (derajat)</div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="inputArahAngin" id="inputArahAngin" placeholder="Arah Angin">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div for="inputArahAngin" class="col-sm-6 col-form-label">Arah Angin (derajat)</div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="inputKecepatanhAngin" id="inputKecepatanhAngin" placeholder="Kecepatan Angin">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Tekanan -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <p class="text-left text-bold">Tekanan Udara</p>
                        <div class="form-group row">
                            <div for="inputArahAngin" class="col-sm-6 col-form-label">Tekanan QFF</div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="inputQFF" id="inputQFF" placeholder="Tekanan QFF">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div for="inputArahAngin" class="col-sm-6 col-form-label">Tekanan QFE</div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="inputQFE" id="inputQFE" placeholder="Tekanan QFE">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- suhu -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <p class="text-left text-bold">Suhu Udara</p>
                        <div class="form-group row">
                            <div for="inputArahAngin" class="col-sm-3 col-form-label">Suhu Bola Kering</div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="inputBK" id="inputBK" placeholder="Suhu Bola Kering">
                            </div>
                            <div for="inputArahAngin" class="col-sm-3 col-form-label">Dew Point</div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="inputDP" id="inputDP" placeholder="Dew Point">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div for="inputArahAngin" class="col-sm-3 col-form-label">Suhu Bola Basah</div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="inputBB" id="inputBB" placeholder="Suhu Bola Basah">
                            </div>
                            <div for="inputArahAngin" class="col-sm-3 col-form-label">Kelembaban Nisbi</div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="inputRH" id="inputRH" placeholder="Kelembaban Nisbi">
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
<script>
document.getElementById('inputJam').addEventListener('change', function() {
    // Get the local time value from the input field
    let localTime = document.getElementById('inputTime').value; // Format: HH:mm

    // If there's a value in the input
    if (localTime) {
        // Create a Date object with the local time (using a default date)
        let [hours, minutes] = localTime.split(':');
        let localDate = new Date();
        localDate.setHours(hours);
        localDate.setMinutes(minutes);
        localDate.setSeconds(0);
        localDate.setMilliseconds(0);

        // Convert to UTC
        let utcHours = localDate.getUTCHours();
        let utcMinutes = localDate.getUTCMinutes();

        // Format the UTC time as HH:mm
        let utcTime = String(utcHours).padStart(2, '0') + ':' + String(utcMinutes).padStart(2, '0');
        
        // Display the UTC time (or send it to your backend)
        console.log('UTC Time:', utcTime);
        
        // You can also set the UTC time in another input field or store it
        document.getElementById('inputJamUTC').value = utcTime; // If you want to display it somewhere else
    }
});
</script>


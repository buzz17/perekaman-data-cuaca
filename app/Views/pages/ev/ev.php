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
    <form action="/pengamatan/addpenguapan" method="POST" class="form-horizontal" enctype="multipart/form-data">
        <input type="hidden" name="inputObserver" value="<?=session('namalengkap');?>">
        <input type="hidden" class="form-control" name="hiddenTanggal" id='hiddenTanggal'/>
        <div class="row">
            <div class="col-md-4">
                <div class="card">   
                        <div class="card-body">
                            <p class="text-left text-bold">Angin Cup Counter Tinggi 0.5 Meter</p>
                            <div class="row text-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <p for="counter_sebelum" class="label-entry bg-light-primary">
                                            Counter Sebelum
                                            <i class="fas fa-question-circle" data-toggle="tooltip" 
                                                title="Cup Counter yang dibaca pada jam 07.00 hari kemari">
                                            </i>
                                        </p>
                                        <input type="number" id="counter_sebelum" name="counter_sebelum" class="form-control text-center" step="0.1" placeholder="" require>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <p for="counter_dibaca" class="label-entry bg-light-primary">
                                            Counter Dibaca
                                            <i class="fas fa-question-circle" data-toggle="tooltip" 
                                                title="Cup Counter yang dibaca pada jam 07.00 hari ini">
                                            </i>
                                        </p>
                                        <input type="number" id="counter_dibaca" name="counter_dibaca" class="form-control text-center" step="0.1" placeholder="" require>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <p for="counter_rata_rata" class="label-entry bg-light-primary">
                                            Counter Rata - Rata
                                            <i class="fas fa-question-circle" data-toggle="tooltip" 
                                                title="Kecepatan angin rata - rata 0.5 meter">
                                            </i>
                                        </p>
                                        <input type="number" id="counter_rata_rata" name="counter_rata_rata" class="form-control text-center" step="0.1" readonly require>
                                    </div>
                                </div>
                            </div>                       
                        </div>
                    </div>
                </div>  
            <div class="col-md-8">
                <div class="card">   
                    <div class="card-body">
                            <p class="text-left text-bold">Open Pan Penguapan</p>
                            <div class="row text-center">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <p for="selisih_tinggi_air" class="label-entry bg-light-primary">
                                            Selisih Tinggi Air
                                            <i class="fas fa-question-circle" data-toggle="tooltip" 
                                                title="Selisih tinggi air pada saat pengukuran">
                                            </i>
                                        </p>
                                        <input type="number" id="ev_selisih_tinggi_air" name="selisih_tinggi_air" class="form-control text-center" step="0.1" placeholder="" require>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <p for="curah_hujan" class="label-entry bg-light-primary">
                                            Curah Hujan
                                            <i class="fas fa-question-circle" data-toggle="tooltip" 
                                                title="Curah hujan yang tercatat pada periode tersebut">
                                            </i>
                                        </p>
                                        <input type="number" id="ev_curah_hujan" name="curah_hujan" class="form-control text-center" step="0.1" placeholder="" require>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <p for="penguapan" class="label-entry bg-light-primary">
                                            Penguapan
                                            <i class="fas fa-question-circle" data-toggle="tooltip" 
                                                title="Nilai penguapan yang terukur">
                                            </i>
                                        </p>
                                        <input type="number" id="ev_penguapan" name="penguapan" class="form-control text-center" step="0.1" readonly require>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <p for="suhu_air_maks" class="label-entry bg-light-primary">
                                            Suhu Air (Maks)
                                            <i class="fas fa-question-circle" data-toggle="tooltip" 
                                                title="Suhu air maksimum yang tercatat">
                                            </i>
                                        </p>
                                        <input type="number" id="suhu_air_maks" name="suhu_air_maks" class="form-control text-center" step="0.1" placeholder="" require>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <p for="suhu_air_min" class="label-entry bg-light-primary">
                                            Suhu Air (Min)
                                            <i class="fas fa-question-circle" data-toggle="tooltip" 
                                                title="Suhu air minimum yang tercatat">
                                            </i>
                                        </p>
                                        <input type="number" id="suhu_air_min" name="suhu_air_min" class="form-control text-center" step="0.1" placeholder="" require>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <p for="rata2_suhu_air" class="label-entry bg-light-primary">
                                            Rata2 Suhu Air
                                            <i class="fas fa-question-circle" data-toggle="tooltip" 
                                                title="Rata-rata suhu air selama periode tersebut">
                                            </i>
                                        </p>
                                        <input type="number" id="suhu_air_rata" name="suhu_air_rata" class="form-control text-center" step="0.1" readonly require>
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
    function calculateCounter() {
        // Get values from the "Jumlah Pembakaran Per Jam" fields
        let counter_sebelum = parseFloat(document.getElementById('counter_sebelum').value) || 0;
        let counter_dibaca = parseFloat(document.getElementById('counter_dibaca').value) || 0;

        let avgCounter = (counter_sebelum + counter_dibaca)/2;
        
       
        let counterAvg = (avgCounter).toFixed(1); // Example calculation

        document.getElementById('counter_rata_rata').value = counterAvg;
       
        
    }
    function calculateEv() {
        let selisih_tinggi_air = parseFloat(document.getElementById('ev_selisih_tinggi_air').value) || 0;
        let curah_hujan = parseFloat(document.getElementById('ev_curah_hujan').value) || 0;

        let totalEv = selisih_tinggi_air + curah_hujan;
       
        let evTotal = (totalEv).toFixed(1); // Example calculation

        document.getElementById('ev_penguapan').value = evTotal;
        
    }
    function calculateSuhu() {
        let suhu_air_maks = parseFloat(document.getElementById('suhu_air_maks').value) || 0;
        let suhu_air_min = parseFloat(document.getElementById('suhu_air_min').value) || 0;

        let avgSuhu = (suhu_air_maks + suhu_air_min)/2;
       
        let suhuAvg = (avgSuhu).toFixed(1); // Example calculation

        document.getElementById('suhu_air_rata').value = suhuAvg;
        
    }
    document.addEventListener('DOMContentLoaded', () => {
        // Add listeners to counter fields
        ['counter_sebelum', 'counter_dibaca'].forEach(id =>
            document.getElementById(id).addEventListener('input', calculateCounter)
        );

        // Add listeners to evaporation fields
        ['ev_selisih_tinggi_air', 'ev_curah_hujan'].forEach(id =>
            document.getElementById(id).addEventListener('input', calculateEv)
        );

        // Add listeners to temperature fields
        ['suhu_air_maks', 'suhu_air_min'].forEach(id =>
            document.getElementById(id).addEventListener('input', calculateSuhu)
        );

        // Trigger initial calculations if fields are pre-filled
        calculateCounter();
        calculateEv();
        calculateSuhu();
    });


   
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



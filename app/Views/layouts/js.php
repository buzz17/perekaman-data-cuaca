    <!-- jQuery -->
    <script src="<?= base_url('assets/adminlte3') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url('assets/adminlte3') ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/adminlte3') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/adminlte3') ?>/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes --> 
    <script src="https://kit.fontawesome.com/910b8f10a7.js" crossorigin="anonymous"></script>
    <!-- leaflet --> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <!-- DataTables -->
    <script src="<?= base_url('assets/adminlte3') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/adminlte3') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/adminlte3') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets/adminlte3') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  

    <script>
        // Array to get the day and month names
        const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

        // Function to format the date and time
        function formatDateTimeWITA() {
            const now = new Date();

            // Convert to WITA (UTC+8)
            const offsetWITA = 8 * 60 * 60 * 1000;
            const witaTime = new Date(now.getTime() + offsetWITA);

            const day = days[witaTime.getUTCDay()];
            const date = witaTime.getUTCDate();
            const month = months[witaTime.getUTCMonth()];
            const year = witaTime.getUTCFullYear();

            const hours = String(witaTime.getUTCHours()).padStart(2, '0');
            const minutes = String(witaTime.getUTCMinutes()).padStart(2, '0');
            const seconds = String(witaTime.getUTCSeconds()).padStart(2, '0');

            return `${day}, ${date} ${month} ${year} - ${hours}:${minutes}:${seconds} WITA`;
        }

        // Update the date and time every second
        function updateDateTime() {
            document.getElementById("date_time").textContent = formatDateTimeWITA();
        }

        // Initial update and set interval for continuous update
        updateDateTime();
        setInterval(updateDateTime, 1000);
    </script>
    <script>
        // Map initialization
        var map = L.map('map').setView([-4.4409668,121.7660362,17], 8);

        // Tile Layer (OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        var customIcon = L.icon({
            iconUrl: '<?= base_url('assets/adminlte3') ?>/img/download.png', // URL to your custom icon
            iconSize: [50, 50],  // Size of the icon (adjust as necessary)
            iconAnchor: [25, 50],  // Point of the icon that will be at the marker's location
            popupAnchor: [0, -50]  // Point from which the popup will open
        });
        

        // Add a Marker
        var marker = L.marker([-4.180372293455407, 121.61094638996325], { icon: customIcon }).addTo(map);
        
        
    </script>
    <script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
        });
        
        $('#example2').DataTable({
        "responsive": true,
        "autoWidth": false,
        });
    });
    </script>
    

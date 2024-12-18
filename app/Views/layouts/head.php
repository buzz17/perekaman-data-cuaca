<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte3') ?>/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/fontawesome-free-6.6.0-web/css/all.min.css" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte3') ?>/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte3') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/adminlte3') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    
    <style>
        /* Ensure the map container has a defined height */
        #map {
            height: 500px;  /* Set the height of the map */
            width: 100%;    /* Set the width of the map to 100% of the parent container */
        }
    </style>
</head>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('dashboard') ?>" class="brand-link">
      <img src="<?= base_url('assets/adminlte3') ?>/img/logo-bmkg.png" alt="BMKG Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">stamet SNB</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/adminlte3') ?>/img/<?=$role;?>.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$namalengkap;?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/<?=$session_role;?>" class="nav-link <?php echo ($menu == 'beranda') ? 'active' : ''; ?>">
              <i class="nav-icon fa fa-home"></i>
                <p>Beranda</p>
            </a>
          </li>
          <?php if ($role == '2') { ?>
          <li class="nav-header text-uppercase">Module</li>
          <li class="nav-item <?php echo ($module == 'input data') ? 'menu-is-opening menu-open' : ''; ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
                <p>
                  Input Data
                  <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview nav-pills">
              <li class="nav-item">
                <a href="/meteorologi" class="nav-link <?php echo ($menu == 'meteorologi') ? 'bg-primary' : ''; ?>">                                                                                      
                  <i class="nav-icon far fa-circle"></i>
                  <p>Data Meteorologi</p>
                </a>                          
              </li>
              <li class="nav-item">
                <a href="/curah-hujan" class="nav-link <?php echo ($menu == 'curah hujan') ? 'bg-primary' : ''; ?>">                                                                                      
                  <i class="nav-icon far fa-circle"></i>
                  <p>Curah Hujan</p>
                </a>                          
              </li>
              <li class="nav-item">
                <a href="/penguapan" class="nav-link <?php echo ($menu == 'penguapan') ? 'bg-primary' : ''; ?>">                                                                                      
                  <i class="nav-icon far fa-circle"></i>
                  <p>Penguapan</p>
                </a>                          
              </li>
              <li class="nav-item">
                <a href="/penyinaran-matahari" class="nav-link <?php echo ($menu == 'matahari') ? 'bg-primary' : ''; ?>">                                                                                      
                  <i class="nav-icon far fa-circle"></i>
                  <p>Penyinaran Matahari</p>
                </a>                          
              </li>
            </ul>
          </li>
          <li class="nav-item <?php echo ($module == 'output data') ? 'menu-is-opening menu-open' : ''; ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
                <p>
                  Output Data
                  <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview nav-pills">
              <li class="nav-item">
                <a href="/monitoring-laporan" class="nav-link <?php echo ($menu == 'monitoring') ? 'bg-primary' : ''; ?>">                                                                                      
                  <i class="nav-icon far fa-circle"></i>
                  <p>Monitoring</p>
                </a>                          
              </li>
              <li class="nav-item">
                <a href="/report-laporan" class="nav-link <?php echo ($menu == 'report') ? 'bg-primary' : ''; ?>">                                                                                      
                  <i class="nav-icon far fa-circle"></i>
                  <p>Report</p>
                </a>                          
              </li>
            </ul>
          </li>
          <?php } else {} ?>
          <li class="nav-header text-uppercase">Lainnya</li>
          <?php if ($role == '1') { ?>
          <li class="nav-item">
            <a href="/administrator/kelola-pengguna" class="nav-link <?php echo ($menu == 'kelola pengguna') ? 'active' : ''; ?>">                
              <i class="nav-icon fa-solid fa-user"></i>        
                <p>Kelola Pengguna</p>
            </a>
          </li>
          
          <?php } else {} ?>
          <li class="nav-item">
            <a href="/logout" class="nav-link">                
              <i class="nav-icon fa-solid fa-right-from-bracket"></i>        
                <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
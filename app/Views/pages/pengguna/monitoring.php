<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div class="card-header-pills">
                    <h4>Monitoring Pengguna</h4>    
                </div>
                <div class="card-header-pills">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahkandata">
                    <i class="fa fa-plus mr-1" aria-hidden="true"></i>Tambahkan
                </button>
                
                </div>
            </div>
        </div>
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
            <table id="example1" class="table table-striped table-bordered table-hover" style="width:100%">
                <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama Lengkap</th>
                    <th>User Name</th>
                    
                    <th>Role</th>
                    
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($dataUser as $data) :
                    
                    $registeredEmails[] = $data->username;
                ?>
                    <tr>
                    <td><?= $no++ ?></td>
                    <td>
                        <?= $data->nip ?>
                    </td>
                    <td>
                        <?= $data->namalengkap ?>
                    </td>
                    <td>
                        <?= $data->username ?>
                    </td>
                    
                    <td>
                        <?php
                        if ($data->role == "1") {echo "Administrator";} 
                        elseif ($data->role == "2") {echo "Kepala Stasiun";}
                        elseif ($data->role == "3") {echo "Observer";}
                        ?>
                    </td>
                    

                    <td>
                        <a href="#" data-toggle="modal" data-target="#editdata" class="btn btn-sm btn-outline-primary btn-edit" style="width:50px" data-id="<?= $data->id_user; ?>" data-nip="<?= $data->nip; ?>" data-nama="<?= $data->namalengkap; ?>" data-user="<?= $data->username; ?>" data-pass="<?= $data->password; ?>" data-role="<?= $data->role; ?>">
                        <i class=" fa fa-edit" aria-hidden="true"></i>
                        </a>
                        <a href="#" data-href="<?= base_url('administrator/' . $data->id_user . '/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-sm btn-outline-danger" style="width:50px"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </td>
                    </tr>
                <?php endforeach ?>

                </tbody>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama Lengkap</th>
                    <th>User Name</th>
                    
                    <th>Role</th>
                    
                    <th>Aksi</th>
                </tr>
                </tfoot>
                
            </table>
                
        </div>
    </div>               
</div>

<div id="confirm-dialog-delete" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h2 class="h2">Apakah Anda yakin?</h2>
        <p>Data Pengguna Akan dihapus secara permanen</p>
      </div>
      <div class="modal-footer">
        <a href="#" role="button" id="delete-button" class="btn btn-sm btn-danger"><i class="fa fa-trash mr-2" aria-hidden="true"></i>Delete</a>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="fa fa fa-times mr-2" aria-hidden="true"></i>Cancel</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editdata" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content ">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Data Pengguna <span id="dt_nama_lengkap"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/user/update" method="POST">
          <input type="hidden" class="form-control dt_id" name="id" />
          
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type=" text" class="form-control dt_nama" name="nama" />
          </div>
          <div class="form-group">
            <label>Nama Pengguna</label>
            <input type="text" class="form-control dt_user" name="pengguna" />
          </div>
          <div class="form-group">
            <label>Kata Sandi</label>
            <input type="password" class="form-control dt_pass" name="sandi" />
          </div>
          <div class="form-group">
            <label>Role</label>
            <select name="role" class="form-control dt_role">
              <option value="">- Select -</option>
              <option value="1">Administrator</option>
              <option value="2">User</option>
            </select>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-sm btn-primary float-right m-2"><i class="fa fa-edit mr-1" aria-hidden="true"></i>Edit</button>
            <button type="button" class="btn btn-sm btn-secondary float-right m-2" data-dismiss="modal"><i class="fa fa fa-times mr-2" aria-hidden="true"></i>Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="tambahkandata" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content ">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="staticBackdropLabel">Input Data Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <div id="errorAlert" class="alert alert-danger mt-3" style="display: none;"></div>       
            <form action="/user/add" method="POST" class="form-horizontal" enctype="multipart/form-data" onsubmit="return validateForm()"> 
                <input type="hidden" id="inputStation" name="inputStation" value="97142">  
                <div class="form-group">
                    <label>NIP</label>
                    <div class="input-group"> 
                        <input type="text" class="form-control" id="inputNIP" name="inputNIP" placeholder="NIP" required>            
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-hashtag"></span>
                            </div>
                        </div>                   
                    </div>                   
                </div>     
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <div class="input-group"> 
                        <input type="text" class="form-control" id="inputNamaLengkap" name="inputNamaLengkap" placeholder="Nama Lengkap" required>            
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>                   
                    </div>                   
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <div class="input-group mb-3"> 
                    <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" required onchange="validateEmail()">            
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    </div>
                    <span id="errorEmail" class="alert-danger" role="alert"></span>
                </div>
                <div class="form-group">
                    <label>Kata Sandi</label>
                    <div class="input-group mb-3"> 
                    <input type="password" class="form-control" id="inputSandi" name="inputSandi" placeholder="Kata Sandi" required> 
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Ulangi Kata Sandi</label>
                    <div class="input-group mb-3"> 
                    <input type="password" class="form-control" id="inputSandiLagi" name="inputSandiLagi" placeholder="Ulangi Kata Sandi" required onchange="validateSandi()"> 
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    </div>
                    <span id="errorSandi" class="alert-danger" role="alert"></span> 
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <div class="input-group mb-3"> 
                    <select name="inputRole" class="form-control">
                        <option value="">- Select -</option>
                        <option value="1">Administrator</option>
                        <option value="2">Kepala Kantor</option>
                        <option value="3">Observer</option>
                    </select> 
                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                    <button type="submit" class="btn btn-primary float-right m-2"><i class="fa fa-plus mr-1" aria-hidden="true"></i>Tambahkan</button>
                        
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        
        </div>
    </div>
  </div>
</div>

    <script>
        let isEmailValid = false; // Status validasi email
        let isSandiValid = false; // Status validasi kata sandi
        var registeredEmails = <?= json_encode($registeredEmails); ?>; // Ganti dengan daftar email yang sesuai

        function validateEmail() {
          var emailInput = document.getElementById("inputEmail").value;
          var errorMessage = document.getElementById("errorEmail");

          // Validasi email, apakah terdaftar
          if (registeredEmails.includes(emailInput)) {
              errorMessage.textContent = "Email sudah terdaftar";
              isEmailValid = false; // Email tidak valid
          } else {
              errorMessage.textContent = "";  // Jika tidak ada error
              isEmailValid = true;  // Email valid
          }
        }


        function validateSandi() {
            var sandiInput = document.getElementById("inputSandi").value;
            var sandilagiInput = document.getElementById("inputSandiLagi").value;
            var errorSandi = document.getElementById("errorSandi");

            // Validasi sandi, apakah konfirmasi sandi sama
            if (sandiInput === sandilagiInput) {
                errorSandi.textContent = "";  // Jika tidak ada error
                isSandiValid = true; // Kata sandi valid
            } else {
                errorSandi.textContent = "Kata Sandi Tidak Sama";  // Jika ada error
                isSandiValid = false; // Kata sandi tidak valid
            }
        }

        function validateForm() {
            validateEmail(); // Pastikan validasi email dilakukan sebelum submit
            validateSandi(); // Pastikan validasi kata sandi dilakukan sebelum submit

            // Cek jika email atau sandi tidak valid, cegah form submit
            if (!isEmailValid || !isSandiValid) {
                // Tampilkan alert dengan pesan kesalahan
                var errorAlert = document.getElementById("errorAlert");
                errorAlert.textContent = "Tidak dapat menambahkan pengguna baru, masih terdapat kesalahan";
                errorAlert.style.display = "block"; // Tampilkan alert
                return false; // Cegah submit
            }

            // Sembunyikan alert jika tidak ada error
            document.getElementById("errorAlert").style.display = "none"; 
            return true; // Submit jika semua valid
        }
    </script>
    <script>
    function confirmToDelete(el) {
        $("#delete-button").attr("href", el.dataset.href);
        $("#confirm-dialog-delete").modal('show');
    }

    function confirmToDeldata(el) {
        $("#deldata-button").attr("href", el.dataset.href);
        $("#confirm-dialog-deldata").modal('show');
    }

    function isconfirm() {
        if (!confirm('Are you sure ?')) {
            event.preventDefault();
            return;
        }
        return true;
    }
</script>
<script>
  $(document).ready(function() {
    // get Edit Product
    $('.btn-edit').on('click', function() {
      // get data from button edit
      const dtid = $(this).data('id');
      const dtnip = $(this).data('nip');
      const dtnama = $(this).data('nama');
      const dtuser = $(this).data('user');
      const dtpass = $(this).data('pass');
      const dtrole = $(this).data('role');
      // Set data to Form Edit
      $('#dt_nama_lengkap').html(dtnama);
      $('.dt_id').val(dtid);
      $('.dt_nip').val(dtnip);
      $('.dt_nama').val(dtnama);
      $('.dt_user').val(dtuser);
      $('.dt_pass').val(dtpass);
      $('.dt_role').val(dtrole);
      // Call Modal Edit
      $('#editdata').modal('show');
    });
  });
</script>
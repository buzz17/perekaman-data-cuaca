<?php
$session = session();
$login = $session->getFlashdata('login');
$username = $session->getFlashdata('username');
$password = $session->getFlashdata('password');
?>
<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-body d-flex justify-content-center align-items-center">
            <img src="<?= base_url("assets/adminlte3"); ?>/img/Logo-BMKG-new.png" alt="Logo BMKG" style="width: 70px; height: auto;" class="mr-3">
            <h1 style="font-size: 2.4rem;">Perekaman Data Cuaca Stasiun Meteorologi Sangia Nibandera Kolaka</h1>
        </div>
    </div>

    <div class="container  d-flex justify-content-center align-items-center">
        <div class="row justify-content-center align-items-center w-100">       
            <!-- Card Gambar -->
            <div class="col-md-8 mb-2 d-flex justify-content-center">
                <div class="w-100 text-center">
                    <img src="<?= base_url("assets/adminlte3");?>/img/perekaman.png" alt="Logo BMKG" class="img-fluid">
                </div>
            </div>
            <!-- Card Form Login -->
            <div class="col-md-4 mb-2 d-flex justify-content-center">
                <div class="card w-100">
                    <div class="card-body">
                        <?php if ($username) { ?>
                            <div class="alert alert-danger text-center" role="alert"><?= $username ?></div>
                        <?php } ?>
                        <?php if ($password) { ?>
                            <div class="alert alert-danger text-center" role="alert"><?= $password ?></div>
                        <?php } ?>
                        <?php if ($login) { ?>
                            <div class="alert alert-danger text-center" role="alert"><?= $login ?></div>
                        <?php } ?>  
                        
                        <form action="/auth/valid_login" method="post">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="width: 45px;">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="username">
                            </div>
                            
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="width: 45px;">
                                        <i class="fa fa-key"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="password">
                            </div>

                            <button class="btn btn-primary btn-block" type="submit">
                                <i class="fa fa-lock mr-1"></i> Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
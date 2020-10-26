 <nav class="navbar navbar-expand-sm   navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="<?php   echo base_url(); ?>">
    <img src="<?php echo base_url().'uploads/system/logo-dark.png'; ?>" alt="logo" style="height: 30px; width: auto;">
  </a>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <?php include 'menuvokasional_resp.php'; ?>
      <?php include 'menuakademik_resp.php'; ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url().'home/ovidi' ?>">
          <i class="fas fa-video d-inline mr-2"> </i>
          <span>Ovidi</span>
          
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#" disabled>
          <i class="fas fa-book-open d-inline mr-2"> </i>
          <span>Obook</span>
          
        </a>
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url().'home/bantuan' ?>">
          <i class="fas fa-question-circle d-inline  mr-2"> </i>
          <span>Bantuan</span>
          
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url().'home/tentang_kami' ?>">
          <i class="fas fa-address-card d-inline  mr-2"> </i>
          <span>Tentang Kami</span>
          
        </a>
      </li> -->
    </ul>
    
    <form class="inline-form " action="<?php echo site_url('home/cari'); ?>" method="get" ">
      <div class="input-group search-box" >
        <input type="text" name = 'query' class="form-control" placeholder="Mau Cari Apa ?">
        <div class="input-group-append">
          <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </div>
      </div>
    </form>
    <div class="mt-2 mr-2 ml-2"></div>

    <?php if ($this->session->userdata('admin_login')): ?>
      
      <div>
        <a href="<?php echo site_url('admin'); ?>" class="btn btn-light text-muted" style="background-color: white; width: 100%; border-radius: 2px">Administrator</a>
      </div>
    <div class="mt-3 mr-2 ml-2"></div>
    <?php endif; ?>

    <div>
      <button data-target="#login" data-toggle="modal" class="btn btn-outline-secondary" style="width: 100%; border-radius: 2px">Masuk</button>
    </div>
    <div class="mt-2 mr-1 ml-1"></div>
    <div>
      <button data-target="#register" data-toggle="modal" class="btn btn-primary" style="width: 100%; border-radius: 2px;">Daftar</button>
    </div>
    <div class="mt-2"></div>
  </div>
</nav>

<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Masuk Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form action="<?php echo site_url('login/validate_login/user'); ?>" method="post">
                          <div class="content-box">
                              <div class="basic-group">
                                  <div class="form-group">
                                      <label for="login-email"><span class="input-field-icon"><i class="fas fa-envelope"></i></span> Email :</label>
                                      <input type="email" class="form-control" name = "email" id="login-email" placeholder="Email" value="" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="login-password"><span class="input-field-icon"><i class="fas fa-lock"></i></span> Password :</label>
                                      <input type="password" class="form-control" name = "password" placeholder="Password" value="" required>
                                  </div>
                                  <input type="text" name="urli" class="hidden" value="<?php echo current_url(); ?>">
                              </div>
                          </div>
                          <div class="content-update-box text-center">
                              <button type="submit" class="btn" style="margin: auto;">Masuk</button>
                          </div>
                          <br>
                          <div class="forgot-pass text-center">
                              <span>atau</span>
                              <a href="javascript::" data-target="#forgot" data-toggle="modal">Lupa Password</a>
                          </div>
                          <div class="account-have text-center">
                              Belum punya akun oguru ? <a href="" data-target="#register" data-toggle="modal">Daftar</a>
                          </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- register -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Daftar Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form action="<?php echo site_url('login/register'); ?>" method="post">
                          <div class="content-box">
                              <div class="basic-group">
                                  <div class="form-group">
                                      <label for="first_name"><span class="input-field-icon"><i class="fas fa-user"></i></span> Nama Depan :</label>
                                      <input type="text" class="form-control" name = "first_name" id="first_name" placeholder="Nama Depan" value="" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="last_name"><span class="input-field-icon"><i class="fas fa-user"></i></span> Nama Belakang</label>
                                      <input type="text" class="form-control" name = "last_name" id="last_name" placeholder="Nama Belakang" value="" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="registration-email"><span class="input-field-icon"><i class="fas fa-envelope"></i></span> Email :</label>
                                      <input type="email" class="form-control" name = "email" id="registration-email" placeholder="Email" value="" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="registration-password"><span class="input-field-icon"><i class="fas fa-lock"></i></span> Password :</label>
                                      <input type="password" class="form-control" name = "password" id="registration-password" placeholder="Password" value="" required>
                                  </div>
                              </div>
                          </div>
                          <div class="content-update-box text-center">
                              <button type="submit" class="btn">Daftar</button>
                          </div>
                          <br>
                          <div class="account-have text-center">
                              Sudah punya akun ? <a href="javascript::" data-target="#login" data-toggle="modal">Masuk</a>
                          </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- forgot -->
<div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Masuk Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form action="" method="post">
                          <div class="content-box">
                              <div class="basic-group">
                                  <div class="form-group">
                                      <label for="forgot-email"><span class="input-field-icon"><i class="fas fa-envelope"></i></span> Email :</label>
                                      <input type="email" class="form-control" name = "email" id="forgot-email" placeholder="Email" value="" required>
                                      <small class="form-text text-muted">Cek email anda.</small>
                                  </div>
                              </div>
                          </div>
                          <div class="content-update-box text-center">
                              <button type="submit" class="btn">Reset Password</button>
                          </div>
                          <br>
                          <div class="forgot-pass text-center">
                              Kembali ? <a href="javascript::" data-target="#login" data-toggle="modal">Masuk</a>
                          </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- js modal -->
<script>
  $(document).ready(function () {
      $("#login").on("show.bs.modal", function (e) {
          $('#register').modal("hide");
          $('#forgot').modal("hide");
      });
      $("#register").on("show.bs.modal", function (e) {
          $('#login').modal("hide");
          $('#forgot').modal("hide");
      });
      $("#forgot").on("show.bs.modal", function (e) {
          $('#login').modal("hide");
          $('#register').modal("hide");
      });
  });


  $(document).ready(function () {
  $('.navbar-light .dmenu').hover(function () {
          $(this).find('.sm-menu').first().stop(true, true).slideDown(250);
      }, function () {
          $(this).find('.sm-menu').first().stop(true, true).slideUp(205)
      });
  });
</script>

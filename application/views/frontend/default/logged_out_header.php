<section class="menu-area">
  <div class="container-xl">
    <div class="row">
      <div class="col">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

          <ul class="mobile-header-buttons">
            <li><a class="mobile-nav-trigger" href="#mobile-primary-nav">Menu<span></span></a></li>
            <li><a class="mobile-search-trigger" href="#mobile-search">Search<span></span></a></li>
          </ul>

          <a href="<?php echo site_url(''); ?>" class="navbar-brand" href="#"><img src="<?php echo base_url().'uploads/system/logo-dark.png'; ?>" alt="" height="35"></a>

          <?php include 'menuvokasional.php'; ?>

          <?php include 'menuakademik.php'; ?>

          <div class="main-nav-wrap">
            <div class="mobile-overlay"></div>

            <ul class="mobile-main-nav">
              <div class="mobile-menu-helper-top"></div>

              <li>
                <a href="<?php echo site_url().'home/video' ?>">
                  <i class="fas fa-video d-inline"> </i>
                  <span>Video</span>
                  <span class="has-sub-category"><i class="fas fa-angle-right"></i></span>
                </a>
              </li>
              <div class="mobile-menu-helper-bottom"></div>
            </ul>
          </div>

          <form class="inline-form" action="<?php echo site_url('home/cari'); ?>" method="get" style="width: 100%;">
            <div class="input-group search-box mobile-search">
              <input type="text" name = 'query' class="form-control" placeholder="Mau Cari Apa ?">
              <div class="input-group-append">
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </form>

          <?php if ($this->session->userdata('admin_login')): ?>
            <div class="instructor-box menu-icon-box">
              <div class="icon">
                <a href="<?php echo site_url('admin'); ?>" style="border: 1px solid transparent; margin: 10px 10px; font-size: 14px; width: 100%; border-radius: 0;"><?php echo get_phrase('administrator'); ?></a>
              </div>
            </div>
          <?php endif; ?>
          <span class="signin-box-move-desktop-helper"></span>
          <div class="sign-in-box btn-group">

            <a href="#login" data-target="#login" data-toggle="modal" class="btn btn-sign-in">Masuk</a>

            <a href="" data-target="#register" data-toggle="modal" class="btn btn-sign-up">Daftar</a>

          </div> <!--  sign-in-box end -->
        </nav>
      </div>
    </div>
  </div>
</section>

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
</script>

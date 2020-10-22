<?php
$user_details = $this->user_model->get_user($this->session->userdata('user_id'))->row_array();
?>
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
        <a class="nav-link" href="#" disabled="disabled">
          <i class="fas fa-book-open d-inline mr-2"> </i>
          <span>Obook</span>
          
        </a>
      </li>

      <li class="nav-item">
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
      </li>
    </ul>
    
    <!-- <form class="inline-form " action="<?php echo site_url('home/cari'); ?>" method="get" ">
      <div class="input-group search-box1" >
        <input type="text" name = 'query' class="form-control" placeholder="Mau Cari Apa ?">
        <div class="input-group-append">
          <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </div>
      </div>
    </form> -->
    <div class="mt-2 mr-2 ml-2"></div>

    <?php if ($this->session->userdata('admin_login')): ?>
      
      <div>
        <a href="<?php echo site_url('admin'); ?>" class="btn btn-light text-muted" style="background-color: white; width: 100%; border-radius: 2px">Administrator</a>
      </div>
    <div class="mt-3 mr-2 ml-2"></div>
    <?php endif; ?>

    <div class="user-box menu-icon-box">
                        <div class="icon">
                            <a href="" style="border: 1px solid transparent; margin: 10px 0px; font-size: 14px; width: 100%; border-radius: 0; min-width: 100px; ">Pengguna <span class="badge badge-primary"><?php echo $this->crud_model->get_notif_sum(); ?></span></a>
                        </div>
                        <div class="dropdown user-dropdown corner-triangle top-right">
                            <ul class="user-dropdown-menu">
                                <li class="dropdown-user-info">
                                    <a href="<?php echo site_url('home/profil/profil_saya'); ?>">
                                        <div class="clearfix">
                                            <div class="user-image float-left">
                                                <?php if (file_exists('uploads/user_image/'.$user_details['id'].'.jpg')): ?>
                                                    <img src="<?php echo base_url().'uploads/user_image/'.$user_details['id'].'.jpg';?>" alt="" class="img-fluid">
                                                <?php else: ?>
                                                    <img src="<?php echo base_url().'uploads/user_image/placeholder.png';?>" alt="" class="img-fluid">
                                                <?php endif; ?>
                                            </div>
                                            <div class="user-details">
                                                <div class="user-name">
                                                    <span class="hi"><?php echo get_phrase('hi'); ?>,</span>
                                                    <?php echo $user_details['first_name'].' '.$user_details['last_name']; ?>
                                                </div>
                                                <div class="user-email">
                                                    <span class="email"><?php echo $user_details['email']; ?></span>
                                                    <span class="welcome"><?php echo get_phrase("welcome_back"); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <li class="user-dropdown-menu-item">
                                    <a href="<?php echo site_url('home/notifikasi'); ?>"><i class="far fa-bell"></i>Notifikasi 
                                        <span class="badge badge-primary"><?php echo $this->crud_model->get_notif_sum(); ?></span>
                                    </a>
                                </li>
                                <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/kelas_saya'); ?>"><i class="fa fa-book"></i>Kelas Saya</a></li>
                                <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/channel?kategori=aktif'); ?>"><i class="far fa-play-circle"></i>Channel Saya</a></li>
                                <!-- <li class="user-dropdown-menu-item"><a href=""><i class="fas fa-wrench"></i>Pengaturan</a></li> -->
                                <!-- <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/riwayat_pembayaran'); ?>"><i class="fas fa-history"></i>Riwayat Pembayaran</a></li> -->
                                <li class="user-dropdown-menu-item"><a href="<?php echo site_url('login/logout/user'); ?>"><i class="fas fa-sign-out-alt"></i>Keluar</a></li>
                            </ul>
                        </div>
    </div>

    <div class="instructor-box menu-icon-box">
        <div class="icon">
            <p style="border: 1px solid transparent; margin: 10px 0px; font-size: 14px; border-radius: 0;">/</p>
        </div>
    </div>

    <div class="instructor-box menu-icon-box">
        <div class="icon">
            <?php if($this->session->userdata('is_edukator') == 1){ ?>
                <a href="<?php echo site_url().'user'; ?>" style="border: 1px solid transparent; margin: 10px 0px; font-size: 14px; width: 100%; border-radius: 0; min-width: 100px;">Edukator</a>
            <?php } else{ ?>
                <a href="javascript::" data-target="#edukator" data-toggle="modal" style="border: 1px solid transparent; margin: 10px 0px; font-size: 14px; width: 100%; border-radius: 0; min-width: 100px;">Edukator</a>
            <?php } ?>
        </div>
    </div>

    <div class="user-box menu-icon-box">
        <div class="icon">
            <a href="javascript::">
                <?php
                if (file_exists('uploads/user_image/'.$user_details['id'].'.jpg')): ?>
                <img src="<?php echo base_url().'uploads/user_image/'.$user_details['id'].'.jpg';?>" alt="" class="img-fluid">
            <?php else: ?>
                <img src="<?php echo base_url().'uploads/user_image/placeholder.png';?>" alt="" class="img-fluid">
            <?php endif; ?>
        </a>
    </div>
  </div>
</nav>

<div class="modal fade" id="edukator" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Daftar Menjadi Edukator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php 
                $cek_daftar = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'is_edukator' => 2))->num_rows();
                if($cek_daftar == 1){ ?>
                <div class="modal-body">
                    <span class="form-control text-center">Menunggu konfirmasi dari Admin Oguru Indonesia</span>
                </div>
            <?php }
                else{ ?>
            <div class="modal-body">
                <div class="form-group">
                    <h5>Hallo..</h5>
                    <h5>Selamat Datang Guru Bangsa !</h5>
                    <small>Lengkapi data dibawah ini untuk verifikasi akun anda menjadi Edukator</small>
                    <br>
                    <br>
                    <form action="<?php echo site_url().'home/daftar_edukator'; ?>" method="post" enctype="multipart/form-data">
                          <div class="content-box">
                              <div class="basic-group">
                                  <div class="form-group">
                                      <label for="nik"><span class="input-field-icon"><i class="fas fa-user"></i></span> NIK :</label>
                                      <input type="number" class="form-control" name = "nik"placeholder="NIK" value="" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="ktp"><span class="input-field-icon"><i class="fas fa-user"></i></span> Scan KTP/SIM :</label>
                                      <input type="file" class="form-control" id="ktp" name="ktp" required>
                                  </div>    
                              </div>
                          </div>
                          <div class="content-update-box text-center">
                              <button type="submit" class="btn">Daftar</button>
                          </div>
                      </form>
                </div>
            </div>
            <?php
                }
             ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
    $('.navbar-light .dmenu').hover(function () {
          $(this).find('.sm-menu').first().stop(true, true).slideDown(250);
      }, function () {
          $(this).find('.sm-menu').first().stop(true, true).slideUp(205)
      });
    });
</script>
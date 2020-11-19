<?php
$user_details = $this->user_model->get_user($this->session->userdata('user_id'))->row_array();
?>


<nav class="navbar navbar-expand-md  navbar-light bg-light mr-2">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="<?php   echo base_url(); ?>">
          <img src="<?php echo base_url().'uploads/system/logo-dark.png'; ?>" alt="logo" style="height: 30px; width: auto;">
        </a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          
          <div class="mt-3 mr-2 ml-2"></div>
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
              <a class="nav-link" href="#">
                <i class="fas fa-book-open d-inline mr-2"> </i>
                <span>Obook</span>
                
              </a>
            </li>

            <!-- <li class="nav-item">
              <a class="nav-link" href="<?php //echo site_url().'home/video' ?>">
                <i class="fas fa-question-circle d-inline  mr-2"> </i>
                <span>Bantuan</span>
                
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php //echo site_url().'home/video' ?>">
                <i class="fas fa-address-card d-inline  mr-2"> </i>
                <span>Tentang Kami</span>
                
              </a>
            </li> -->

          </ul>
          
          <form class="inline-form " action="<?php echo site_url('home/cari'); ?>" method="get" >
            <div class="input-group search-box" >
              <input type="text" name = 'query' class="form-control" placeholder="Mau Cari Apa ?">
              <div class="input-group-append">
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </form>
          <div class="mt-2 mr-2 ml-2"></div>

          <!-- <?php //if ($this->session->userdata('admin_login')): ?>
            
            <div>
              <a href="<?php //echo site_url('admin'); ?>" class="btn btn-light text-muted" style="width: 100%; border-radius: 2px;">Administrator</a>
            </div>
          <div class="mt-3 mr-2 ml-2"></div>
          <?php //endif; ?> -->

          

          <div class="nav-item dropdown dmenu" >
              <a href="<?php //echo site_url('admin'); ?>" class="btn btn-light text-secondary nav-link text-dark nav-item dropdown dmenu" href="#" id="navbardrop" data-toggle="dropdown" style="width: 100%; border-radius: 2px; font-size: 15px; ">
                      <?php
                          if (file_exists('uploads/user_image/'.$user_details['id'].'.jpg')): ?>
                          <img height="37" src="<?php echo base_url().'uploads/user_image/'.$user_details['id'].'.jpg';?>" alt="" class="mr-2">
                      <?php else: ?>
                          <img height="37" src="<?php echo base_url().'uploads/user_image/placeholder.png';?>" alt="" class="mr-2">
                      <?php endif; ?>
                
                <?php echo $user_details['first_name'].' '.$user_details['last_name']; ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right sm-menu" >
                <?php if($this->session->userdata('is_edukator') == 1){ ?>
                    <a class="dropdown-item pt-1 pb-1" href="<?php echo site_url().'user'; ?>">
                      <span class="icon text-center" style="display: inline-block;width: 20px"><i class="fas fa-chalkboard-teacher text-muted"></i></span>
                      <span class="text-dark ml-3" style="font-size: 14px;">Edukator</span>
                    </a>            
                <?php } else{ ?>
                    <a class="dropdown-item pt-1 pb-1" data-target="#edukator" data-toggle="modal">
                      <span class="icon text-center" style="display: inline-block;width: 20px"><i class="fas fa-chalkboard-teacher text-muted"></i></span>
                      <span class="text-dark ml-3" style="font-size: 14px;">Edukator</span>
                    </a>
                    
                <?php } ?>
                
                <hr class="mt-1 mb-2">  
                <a class="dropdown-item pt-1 pb-1" href="<?php echo site_url('profil/profil_saya'); ?>">
                  <span class="icon text-center" style="display: inline-block;width: 20px"><i class="far fa-user text-muted"></i></span>
                  <span class="text-dark ml-3" style="font-size: 14px;">Profil Saya</span>
                </a>

                <a class="dropdown-item pt-1 pb-1" href="<?php echo site_url('home/notifikasi'); ?>">
                  <span class="icon text-center" style="display: inline-block;width: 20px"><i class="far fa-bell text-muted"></i></span>
                  <span class="text-dark ml-3" style="font-size: 14px;">Notifikasi <span class="badge" 
                    style=" top: -10px;
                            right: -10px;
                            padding: 5px 10px;
                            border-radius: 20%;
                            background-color: lightblue;
                            color: white;"><?php echo $this->crud_model->get_notif_sum(); ?></span></span>
                </a>

                <a class="dropdown-item pt-1 pb-1" href="<?php echo site_url('home/kelas_saya'); ?>">
                  <span class="icon text-center" style="display: inline-block;width: 20px"><i class="fa fa-book text-muted"></i></span>
                  <span class="text-dark ml-3" style="font-size: 14px;">Kelas Saya</span>
                </a>
                
                <a class="dropdown-item pt-1 pb-1" href="<?php echo site_url('home/channel'); ?>">
                  <span class="icon text-center" style="display: inline-block;width: 20px"><i class="far fa-play-circle text-muted"></i></span>
                  <span class="text-dark ml-3" style="font-size: 14px;">Channel Saya</span>
                </a>

                <hr class="mt-1 mb-2">  
                <a class="dropdown-item pt-1 pb-1" href="<?php echo site_url('login/logout/user'); ?>">
                  <span class="icon text-center" style="display: inline-block;width: 20px"><i class="fas fa-sign-out-alt text-muted"></i></span>
                  <span class="text-dark ml-3" style="font-size: 14px;">Keluar</span>
                </a>

                
              </div>

            </div>

          <div class="mt-3 mr-2 ml-2"></div>
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
                              <button type="submit" class="btn btn-primary">Daftar</button>
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
          $(this).find('.sm-menu').first().stop(true, true).slideUp(250)
      });
  });

</script>
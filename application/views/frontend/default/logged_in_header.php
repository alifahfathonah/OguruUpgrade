<?php
$user_details = $this->user_model->get_user($this->session->userdata('user_id'))->row_array();
?>
<section class="menu-area">
    <div class="container-xl">
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">

                    <ul class="mobile-header-buttons">
                        <li><a class="mobile-nav-trigger" href="#mobile-primary-nav">Menu<span></span></a></li>
                        <li><a class="mobile-search-trigger" href="#mobile-search">Search<span></span></a></li>
                    </ul>

                    <a href="<?php echo site_url(''); ?>" class="navbar-brand" href="#">
                        <img src="<?php echo base_url().'uploads/system/logo-dark.png'; ?>" alt="" height="35">
                    </a>

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
                            <input type="text" name = 'query' class="form-control" placeholder="<?php echo get_phrase('search_for_courses'); ?>">
                            <div class="input-group-append">
                                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>

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
                                <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/channel'); ?>"><i class="far fa-play-circle"></i>Channel Saya</a></li>
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
        </div>
    </div>
</div>
</section>

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
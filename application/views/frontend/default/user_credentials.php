<section class="page-header-area my-course-area">
    <div class="container">
         <div class="row">
             <div class="col">
                <h1 class="page-title"><?php echo get_phrase('user_profile'); ?></h1>
                <ul>
                  <li><a href="<?php echo site_url('home/kelas_saya'); ?>"><?php echo get_phrase('all_courses'); ?></a></li>
                  <!-- <li><a href="<?php echo site_url('home/pesan'); ?>"><?php echo get_phrase('my_messages'); ?></a></li> -->
                  <li><a href="<?php echo site_url('home/riwayat_pembayaran'); ?>"><?php echo get_phrase('purchase_history'); ?></a></li>
                  <li class="active"><a href="<?php echo site_url('home/profil/profil_saya'); ?>"><?php echo get_phrase('user_profile'); ?></a></li>
                </ul>
            </div>
         </div>
     </div>
</section>

<section class="user-dashboard-area">

    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 text-center">
                <img style="width: 40%" src="<?php echo base_url().'uploads/user_image/'.$this->session->userdata('user_id').'.jpg';?>" alt="" >
                <h5 class="mt-2 mb-4"><b><?php echo $user_details['first_name'].' '.$user_details['last_name']; ?></b></h5>
            </div>
            <div class="col-lg-4"></div>

        </div> 
        

        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
              <a class="nav-link  text-dark" href="<?php echo site_url('home/profil/profil_saya'); ?>"><?php echo get_phrase('profile'); ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active font-weight-bold text-dark" href="<?php echo site_url('home/profil/akun'); ?>"><?php echo get_phrase('account'); ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="<?php echo site_url('home/profil/foto'); ?>"><?php echo get_phrase('photo'); ?></a>
            </li>
          </ul>
        </div>
    </div>

    <div class="container">
        <div class="card border border-top-0 rounded-0">
            <div class="card-header bg-white">
                <div class="text-center m-2">
                    <h3><b><?php echo get_phrase('account');?></b></h3>
                    <p><?php echo get_phrase('edit_your_account_settings'); ?></p>
                </div>
                
            </div>
            <div class="card-body">
                <form action="<?php echo site_url('home/update_profile/update_credentials'); ?>" method="post">
                    <div class="content-box">
                        <div class="email-group">
                            <div class="form-group">
                                <label for="email"><?php echo get_phrase('email'); ?>:</label>
                                <input type="email" class="form-control" name = "email" id="email" placeholder="<?php echo get_phrase('email'); ?>" value="<?php echo $user_details['email']; ?>">
                            </div>
                        </div>
                        <div class="password-group">
                            <div class="form-group">
                                <label for="password"><?php echo get_phrase('password'); ?>:</label>
                                <input type="password" class="form-control" id="current_password" name = "current_password" placeholder="<?php echo get_phrase('enter_current_password'); ?>">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name = "new_password" placeholder="<?php echo get_phrase('enter_new_password'); ?>">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name = "confirm_password" placeholder="<?php echo get_phrase('re-type_your_password'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="content-update-box text-center">
                        <button type="submit" class="btn btn-primary m-3"><?php echo get_phrase('save'); ?></button>
                    </div>
                </form>

            </div> 
        </div>
    </div>
</section>



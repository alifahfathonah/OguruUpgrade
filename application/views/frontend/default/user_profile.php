<?php
    $social_links = json_decode($user_details['social_links'], true);
 ?>
 <section class="page-header-area my-course-area">
     <div class="container">
         <div class="row">
             <div class="col">
                <h1 class="page-title"><?php echo get_phrase('user_profile'); ?></h1>
                <ul>
                  <li><a href="<?php echo site_url('home/kelas_saya'); ?>"><?php echo get_phrase('all_courses'); ?></a></li>
                  
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
              <a class="nav-link active font-weight-bold text-dark" href="<?php echo site_url('home/profil/profil_saya'); ?>"><?php echo get_phrase('profile'); ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="<?php echo site_url('home/profil/akun'); ?>"><?php echo get_phrase('account'); ?></a>
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
            <h3><b><?php echo get_phrase('profile');?></b></h3>
            <p><?php echo get_phrase('add_information_about_yourself_to_share_on_your_profile'); ?></p>
        </div>
        
    </div>
    <div class="card-body">
        <form action="<?php echo site_url('home/update_profile/update_basics'); ?>" method="post">
            <div class="content-box">
                <div class="basic-group">
                    <div class="form-group">
                        <label for="FristName"><?php echo get_phrase('basics'); ?>:</label>
                        <input type="text" class="form-control" name = "first_name" id="FristName" placeholder="<?php echo get_phrase('first_name'); ?>" value="<?php echo $user_details['first_name']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name = "last_name" placeholder="<?php echo get_phrase('last_name'); ?>" value="<?php echo $user_details['last_name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="Biography"><?php echo get_phrase('biography'); ?>:</label>
                        <textarea class="form-control author-biography-editor" name = "biography" id="Biography"><?php echo $user_details['biography']; ?></textarea>
                    </div>
                </div>
                <div class="link-group">
                    <div class="form-group">
                        <input type="text" class="form-control" maxlength="60" name = "twitter_link" placeholder="<?php echo get_phrase('twitter_link'); ?>" value="<?php echo $social_links['twitter']; ?>">
                        <small class="form-text text-muted"><?php echo get_phrase('add_your_twitter_link'); ?>.</small>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" maxlength="60" name = "facebook_link" placeholder="<?php echo get_phrase('facebook_link'); ?>" value="<?php echo $social_links['facebook']; ?>">
                        <small class="form-text text-muted"><?php echo get_phrase('add_your_facebook_link'); ?>.</small>
                    </div>
                </div>
                <?php if($user_details['is_edukator'] == 1){ ?>
                    <div class="form-group">
                        <label for="Biography">NIK:</label>
                        <input type="text" class="form-control" value="<?php echo $user_details['nik'] ?>" disabled >
                        <small class="form-text text-muted">Anda tidak dapat merubah nomor NIK.</small>
                    </div>
                <?php } ?>
            </div>
            <div class="content-update-box text-center">
                <button type="submit" class="btn btn-primary m-3">Simpan</button>
            </div>
        </form>

    </div> 
  </div>
    </div>
</section>




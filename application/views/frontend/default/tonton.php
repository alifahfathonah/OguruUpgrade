<?php 
    $channel = $this->user_model->get_all_user($video['id_user'])->row_array();
 ?>
<section class="category-header-area">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('home'); ?>"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">
                            <a href="<?php echo site_url('home/ovidi'); ?>">
                                Ovidi(Online Video)
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">
                                <?php echo $video['judul']; ?>
                            </a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="mb-4 mt-4" style="background: #ffff;">
    <div class="container">
      <div class="video-container mt-3">
            <iframe width="560" height="315" src="<?php echo $video['link']; ?>" frameborder="0" ></iframe>
        </div>
        
    </div>
</section>

<section class="category-course-list-area">
    <div class="container">
      <div class="row">
        <div class="col-md-2 text-center  mx-auto my-auto">
          <a href="<?php echo site_url('home/lihat_channel/'.$channel['id']); ?>"><img src="<?php echo $this->user_model->get_user_image_url($channel['id']); ?>" alt="" class="img-fluid" style="border-radius: 50%; width: 90px; ;"></a>
        </div>

        <div class="col-md-7 mt-3">
           <p class="instructors"><b><?php echo $video['judul']; ?></b></p>
           <a href="<?php echo site_url('home/lihat_channel/'.$channel['id']); ?>"><p class="instructors" ><i>
               Oleh : <?php echo $channel['first_name'].' '.$channel['last_name']; ?></i>
           </p></a>
           <p><?php echo $video['deskripsi']; ?></p>
        </div>

        
        <?php if ($is_follower) { ?>
          <div id="unfollow" class="col-md-2 text-center mx-auto my-auto" >
          <a href="" class="btn btn-secondary" style="margin:width: 100%" onclick="unfollow()">Berhenti Mengikuti</a>
        </div>
          <?php
          } else{ ?>
          <div id="follow" class="col-md-2 text-center mx-auto my-auto" >
          
            <?php 
              if ($this->session->userdata('user_login') != true) {
                  echo '<a href="#login" data-target="#login" data-toggle="modal" class="btn btn-primary" style="margin:width: 100%" onclick="unfollow()">+ Ikuti</a>';
              }
              else{
                echo '<a href="" onclick="follow()" class="btn btn-secondary" style="margin:width: 100%" onclick="unfollow()">+ Ikuti</a>';
              }
             ?>
          </div> 
        <?php } ?>

      </div>
    </div>
</section>

<script type="text/javascript">
  function follow() {
    $.ajax({
        url: "<?php echo site_url().'home/follow/'.$video['id_user'].'/follow'; ?>",
        type: "GET",
        dataType: 'JSON',
        success: function(response){
          $('#follow').hide();
          $('#unfollow').show();
        },
    });
  }

  function unfollow() {
    $.ajax({
        url: "<?php echo site_url().'home/follow/'.$id_follow.'/unfollow'; ?>",
        type: "GET",
        dataType: 'JSON',
        success: function(response){
          $('#follow').show();
          $('#unfollow').hide();
        },
    });
  }
</script>
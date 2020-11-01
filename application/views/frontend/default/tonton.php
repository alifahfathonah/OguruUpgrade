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
                                <?php echo $page_title; ?>
                            </a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="category-header-area" style="background: #ffff;">
    <div class="container-lg">
        <div class="row">
            <iframe src="<?php echo $video['link'] ?>" style="width: 55%; height: 400px; margin: auto;" allowfullscreen>
            </iframe>
        </div>
    </div>
</section>

<section class="category-course-list-area">
    <div class="container">
        <div class="row">
            <div class="video-box-2" style="margin: auto;">
              <div class="video-image" style="margin-right: -150px;">
                   <a href="<?php echo site_url('home/lihat_channel/'.$channel['id']); ?>"><img src="<?php echo $this->user_model->get_user_image_url($channel['id']); ?>" alt="" class="img-fluid" style="border-radius: 50%; width: 30% ;"></a>
               </div>
               <div class="course-details">
                <div class="row">
                  <div class="col-md-10 text-left">
                      <p class="instructors"><b><?php echo $video['judul']; ?></b></p>
                       <br>
                       <a href="<?php echo site_url('home/lihat_channel/'.$channel['id']); ?>"><p class="instructors" style="margin-top: -25px;"><i>
                           Oleh : <?php echo $channel['first_name'].' '.$channel['last_name']; ?></i>
                       </p></a>
                       <p><?php echo $video['deskripsi']; ?></p>
                    </div>
                    <?php if ($is_follower) { ?>
                    <div id="unfollow" class="col-md-1" style="margin: auto;">
                      <a href="" onclick="unfollow()">diikuti</a>
                    </div>
                    <?php
                    } else{ ?>
                    <div id="follow" class="col-md-1" style="margin: auto;">
                      <?php 
                        if ($this->session->userdata('user_login') != true) {
                            echo '<a href="#login" data-target="#login" data-toggle="modal" class="btn btn-primary">+ ikuti </a>';
                        }
                        else{
                          echo '<a onclick="follow()" href="" class="btn btn-primary">+ ikuti </a>';
                        }
                       ?>
                    </div> 
                  <?php } ?>
                </div>
               </div>
             </div>
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
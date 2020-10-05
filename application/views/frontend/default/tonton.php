<?php 
    $channel = $this->user_model->get_all_user($video['id_user'])->row_array();
 ?>
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
              <div class="video-image">
                   <img src="<?php echo $this->user_model->get_user_image_url($channel['id']); ?>" alt="" class="img-fluid" style="border-radius: 50%; width: 50%;">
               </div>
               <div class="course-details" style="margin-left: -10%; margin-top: 5%;">
                   <p class="instructors"><b><?php echo $video['judul']; ?></b></p>
                   <br>
                   <p class="instructors" style="margin-top: -25px;">
                       Oleh : <?php echo $channel['first_name'].' '.$channel['last_name']; ?>
                   </p>
                   <p><?php echo $video['deskripsi']; ?></p>
               </div>
             </div>
        </div>
    </div>
</section>
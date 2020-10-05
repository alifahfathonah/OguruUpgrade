<div class="row">
  <?php foreach($video as $vid):
   $channel = $this->user_model->get_all_user($vid['id_user'])->row_array();?>
   <div class="col-md-4 col-lg-4">
     <div class="course-box-wrap">
         <a href="<?php echo site_url().'home/tonton/'.$vid['id'] ?>">
             <div class="course-box">
                 <div class="course-image">
                    <iframe src="<?php echo $vid['link']; ?>" class="img-fluid" style="min-height: 238px;"></iframe>
                 </div>
                 <div class="video-box-2" style="max-height: 100px">
                   <div class="video-image">
                       <img src="<?php echo $this->user_model->get_user_image_url($channel['id']); ?>" alt="" class="img-fluid" style="border-radius: 50%;">
                   </div>
                   <div class="course-details">
                       <p class="instructors"><b><?php echo $vid['judul']; ?></b></p>
                       <br>
                       <p class="instructors" style="margin-top: -25px;">
                           Oleh : <?php echo $channel['first_name'].' '.$channel['last_name']; ?>
                       </p>
                       <p><?php echo $video['deskripsi']; ?></p>
                   </div>
                 </div>
             </div>
        </a>
     </div>
   </div>
 <?php endforeach; ?>
</div>

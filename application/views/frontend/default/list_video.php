<div class="row">
  <?php foreach($video as $vid):
   $channel = $this->user_model->get_all_user($vid['id_user'])->row_array();?>
   <div class="col-md-6 col-lg-6">
     <div class="course-box-wrap">
         <a href="<?php echo site_url().'home/tonton/'.$vid['id'] ?>">
             <div class="course-box">
                 <div class="course-image">
                    <iframe src="<?php echo $vid['link']; ?>" class="img-fluid border-0" style="min-height: 238px; width: 100%; margin-bottom: -4px;"></iframe>
                 </div>
                 <div class="row mr-1 ml-1 mt-2 ">
                   <div class="col-sm-2 text-center my-auto ">
                     <img src="<?php echo $this->user_model->get_user_image_url($channel['id']); ?>" alt="" class="" style="border-radius: 50%; width: 50px;">
                   </div>

                   <div class="col-sm-10">
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
                 <!-- <div class="video-box-2" >
                   <div class="video-image">
                       <img src="<?php echo $this->user_model->get_user_image_url($channel['id']); ?>" alt="" class="img-fluid mx-auto my-auto" style="border-radius: 50%; width: 50px;">
                   </div>
                   <div class="course-details">
                       <p class="instructors"><b><?php echo $vid['judul']; ?></b></p>
                       <br>
                       <p class="instructors" style="margin-top: -25px;">
                           Oleh : <?php echo $channel['first_name'].' '.$channel['last_name']; ?>
                       </p>
                       <p><?php echo $video['deskripsi']; ?></p>
                   </div>
                 </div> -->
             </div>
        </a>
     </div>
   </div>
 <?php endforeach; ?>
</div>

<div class="row">
  <?php foreach($video as $vid):?>
   <div class="col-md-4 col-lg-4">
     <div class="course-box-wrap">
         <a href="<?php echo site_url().'home/tonton_channel/'.$vid['id'] ?>">
             <div class="course-box">
                 <div class="course-image">
                    <iframe src="
                    <?php 
                      if($vid['status'] == 1){
                        echo $vid['link']; 
                      }
                      else{
                        echo base_url().'uploads/ovidi/'.$vid['link'];
                      }
                    ?>
                    " class="img-fluid" style="min-height: 238px;"></iframe>
                 </div>
                 <div class="video-box-2">
                   <div class="course-details">
                      <p class="instructors"><b><?php echo $vid['judul']; ?></b></p>
                   </div>
                 </div>
             </div>
        </a>
     </div>
   </div>
 <?php endforeach; ?>
</div>

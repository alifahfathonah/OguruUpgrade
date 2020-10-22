<section class="category-header-area" style="background: #ffff;">
    <div class="container-lg text-center">
        <div class="row">
            <iframe src="
            <?php 
              if($video['status'] == 1){
                echo $video['link']; 
              }
              else{
                echo base_url().'uploads/ovidi/'.$video['link'];
              }
            ?>
            " style="width: 55%; height: 400px; margin: auto;" allowfullscreen>
            </iframe>
        </div>
        <a href="<?php echo site_url().'home/crud_ovidi/delete?id_video='.$video['id'].'&&file_ovidi='.$video['link']; ?>" class="text-center" onclick="return confirm('Yakin menghapus ovidi ini ?')"><i class="fas fa-trash-alt"></i> Hapus ovidi</a>
    </div>
</section>
<section class="category-course-list-area">
    <div class="container">
        <div class="row">
            <div class="video-box-2" style="margin: auto;">
               <div class="course-details">
                   <p class="instructors"><b><?php echo $video['judul']; ?></b></p>
                   <br>
                   <p class="instructors" style="margin-top: -25px;">
                       Kategori : <?php echo $kategori; ?>
                   </p>
               </div>
             </div>
        </div>
    </div>
</section>
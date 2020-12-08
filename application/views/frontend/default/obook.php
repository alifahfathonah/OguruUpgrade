<section class="category-header-area">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('home'); ?>"><i class="fas fa-home"></i></a></li>
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

<section class="category-course-list-area">
    <div class="container">
        <?php 
        $no = $this->uri->segment('3') + 1;
        foreach($book as $u){ 
        ?>
        <div class="row bg-white border rounded p-2 mt-3 ml-3 mr-3">
            <div class="col-md-4">
                <img class="pt-3 pb-3" src="<?php echo 'https://i.ytimg.com/vi/'.substr($u->video_obook,30).'/hqdefault.jpg' ?>" style="width: 100%; height: auto;">
            </div>
            <div class="col-md-8">
                <div class="p-3">
                <h3><b><?php echo $u->judul; ?></b></h3>
                <div class="text-justify" style="-webkit-line-clamp: 5; overflow : hidden;text-overflow: ellipsis; display: -webkit-box;-webkit-box-orient: vertical;"><?php echo $u->konten; ?><p></p></div>
                <a href="<?php echo site_url().'home/lihat_obook/'.$u->id; ?>">Lanjut Baca</a>
                </div>
            </div>

        </div>
        <?php } ?>

        <?php 
        echo $this->pagination->create_links();
    ?>
    	
    </div>
</section>
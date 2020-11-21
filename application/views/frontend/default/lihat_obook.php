
<section class="category-header-area">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('home'); ?>"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">
                            <a href="<?php echo site_url()."/home/obook"; ?>">
                                <?php echo $page_title; ?>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                                <?php echo $book['judul']; ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="category-course-list-area">
    <div class="container p-3">
        <br>
        <h3><b><?php echo $book['judul']; ?></b></h3>
        <br>
        <span><i class="fa fa-user mr-3"></i>Oleh : <?php echo $book['penerbit']; ?> <i class="fa fa-calendar ml-4 mr-3"></i> <?php echo date_format(date_create($book['tanggal']),"j M Y"); ?></span>
        <div class="video-container mt-3">
            <iframe width="560" height="315" src="<?php echo $book['video_obook']; ?>" frameborder="0" ></iframe>
        </div>

        <div>
            <br>
            <?php echo $book['konten']; ?>
        </div>
    </div>
    
</section>

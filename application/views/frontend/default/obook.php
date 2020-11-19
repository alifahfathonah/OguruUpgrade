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
    	<?php for ($i=0; $i < 10; $i++) {  ?>
        <div class="row bg-white border rounded p-2 mt-3 ml-3 mr-3">
        	<div class="col-md-4">
        		<img class="pt-3 pb-3" src="https://i.ytimg.com/vi/ztH1PrAH7Rg/hqdefault.jpg" style="width: 100%; height: auto;">
        	</div>
        	<div class="col-md-8">
        		<div class="p-3">
        		<h3><b>Halo Ini Judul</b></h3>
        		<div class="text-justify" style="-webkit-line-clamp: 5; overflow : hidden;text-overflow: ellipsis; display: -webkit-box;-webkit-box-orient: vertical;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        		proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <p></p></div>
        		<a href="<?php echo site_url().'home/lihat_obook/1' ?>">Lanjut Baca</a>
        		</div>
        	</div>

        </div>

        	<?php 
    	} ?>
    	<ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a></li>
    <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
    <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
  </ul>
    </div>
</section>
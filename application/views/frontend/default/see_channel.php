<section class="page-header-area">
    <div class="container-fluid">
        <div class="form-group text-left">
            <h5>Channel <?php echo $channel['first_name'].' '.$channel['last_name']; ?></h5>
        </div>
        <div class="container row" style="margin-left: 5%;">
        	<div class="col-md-2">
        		<div class="user-box">
        			 <img src="<?php echo base_url().'uploads/user_image/'.$channel['id'].'.jpg';?>" alt="" class="img-fluid">
        		</div>
        	</div>
        	<div class="col-md-7" style="margin-left: 20px;">
        		<h4 class="form-group"><?php echo $channel['first_name'].' '.$channel['last_name']; ?></h4>
        		<i><h6 class="form-group"><?php echo $jumlah_follower; ?> Pengikut</h6></i>
        		<h6 class="form-group"><?php echo $channel['deskripsi_channel']; ?></h6>
        	</div>
        	<div class="col-md-2 text-center">
        		<div class="form-group"></div>
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
</section>

<section class="category-course-list-area">
    <div class="container">
        <div class="category-filter-box">
			<p> Total Ovidi : <?php echo $jumlah_semua; ?></p>            
        </div>  
        <div class="row">
            <div class="col-lg-3 filter-area">
                <div class="card">
                    <a href="javascript::"  style="color: unset;">
                        <div class="card-header filter-card-header" id="headingOne" data-toggle="collapse" data-target="#collapseFilter" aria-expanded="true" aria-controls="collapseFilter">
                            <h6 class="mb-0">
                                <?php echo get_phrase('filter'); ?>
                                <i class="fas fa-sliders-h" style="float: right;"></i>
                            </h6>
                        </div>
                    </a>
                    <div id="collapseFilter" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body pt-0">
                            <div class="filter_type">
                                <ul>
                                    <span class="parent-category">Semua Kategori</span>
                                    <li class="ml-2">
                                        <div class="">
                                            <input type="radio" id="category_all" name="kategori" class="categories custom-radio" value="all" onclick="filter(this)" <?php if($selected_category_id == 'all') echo 'checked'; ?>>
                                            <label for="category_all">Semua Kategori</label>
                                        </div>
                                    </li>
                                    <?php
                                    $counter = 1;
                                    $total_number_of_categories = $this->db->get_where('category', array('parent' => 3))->num_rows();
                                    $categories = $this->crud_model->get_categories(3)->result_array(); ?>
                                        <?php foreach ($categories as $sub_category):
                                            $counter++; ?>
                                            <li class="ml-2">
                                                <div class="parent-category hidden-categories ">
                                                    <input type="radio" id="sub_category-<?php echo $sub_category['id'];?>" name="kategori" class="categories custom-radio" value="<?php echo $sub_category['slug']; ?>" onclick="filter(this)" <?php if($selected_category_id == $sub_category['id']) echo 'checked'; ?>>
                                                    <label for="sub_category-<?php echo $sub_category['id'];?>"><?php echo $sub_category['name']; ?></label>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                </ul>
                                <a href="javascript::" id = "city-toggle-btn" onclick="showToggle(this, 'hidden-categories')" style="font-size: 12px;"><?php echo $total_number_of_categories > $number_of_visible_categories ? "Lebih sedikit" : ""; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="category-course-list">
                    <?php include 'list_video.php'; ?>
                    <?php if (count($video) == 0): ?>
                        <?php echo get_phrase('no_result_found'); ?>
                    <?php endif; ?>
                </div>
                <nav>
                    <?php if ($selected_category_id == "all"){
                        echo $this->pagination->create_links();
                    }?>
                </nav>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    var id_channel = "<?php echo $channel['id'] ?>";
    function get_url() {
        var urlPrefix   = "<?php echo site_url('home/lihat_channel/"+id_channel+"?'); ?>";
        var urlSuffix = "";
        var slectedCategory = "";

        // Get selected category
        $('.categories:checked').each(function() {
            slectedCategory = $(this).attr('value');
        });

        urlSuffix = "kategori="+slectedCategory;
        var url = urlPrefix+urlSuffix;
        return url;
    }
    function filter() {
        var url = get_url();
        window.location.replace(url);
        //console.log(url);
    }

    function showToggle(elem, selector) {
        $('.'+selector).slideToggle(20);
        if($(elem).text() === "Lebih sedikit")
        {
            $(elem).text('Lebih banyak');
        }
        else
        {
            $(elem).text('Lebih sedikit');
        }
    }
</script>
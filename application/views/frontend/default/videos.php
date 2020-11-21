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
        <div class="category-filter-box filter-box clearfix">
            
        </div>
        <div class="row">
            <div class="col-lg-3 filter-area mb-5">
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
    function get_url() {
        var urlPrefix   = "<?php echo site_url('home/ovidi?'); ?>";
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
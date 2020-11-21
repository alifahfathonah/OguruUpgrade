<?php

$my_courses = $this->user_model->my_courses()->result_array();

$categories = array();
foreach ($my_courses as $my_course) {
    $course_details = $this->crud_model->get_course_by_id($my_course['course_id'])->row_array();
    if (!in_array($course_details['category_id'], $categories)) {
        array_push($categories, $course_details['category_id']);
    }
}
?>
<section class="page-header-area my-course-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-title"><?php echo get_phrase('my_courses'); ?></h1>
                <ul>
                  <li class="active"><a href="<?php echo site_url('home/kelas_saya'); ?>"><?php echo get_phrase('all_courses'); ?></a></li>
                  <!-- <li><a href="<?php echo site_url('home/pesan'); ?>"><?php echo get_phrase('my_messages'); ?></a></li> -->
                  <li><a href="<?php echo site_url('home/riwayat_pembayaran'); ?>"><?php echo get_phrase('purchase_history'); ?></a></li>
                  <li><a href="<?php echo site_url('home/profil/profil_saya'); ?>"><?php echo get_phrase('user_profile'); ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="my-courses-area">
    <div class="container">
        <div class="row align-items-baseline">
            <div class="col-lg-9">
                <div class="my-course-filter-bar filter-box">
                    <span><?php echo get_phrase('filter_by'); ?></span>
                    <div class="btn-group">
                        <a class="btn btn-outline-secondary dropdown-toggle all-btn" href="#"data-toggle="dropdown">
                            <?php echo get_phrase('categories'); ?>
                        </a>

                        <div class="dropdown-menu">
                            <?php foreach ($categories as $category):
                                $category_details = $this->crud_model->get_category_details_by_id($category)->row_array();
                                ?>
                                <a class="dropdown-item" href="#" id = "<?php echo $category; ?>" onclick="getCoursesByCategoryId(this.id)"><?php echo $category_details['name']; ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- <div class="btn-group">
                        <a class="btn btn-outline-secondary dropdown-toggle" href="#"data-toggle="dropdown">
                            <?php echo get_phrase('instructors'); ?>
                        </a>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"><?php echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?></a>

                        </div>
                    </div> -->
                    <div class="btn-group">
                        <a href="<?php echo site_url('home/kelas_saya'); ?>" class="btn reset-btn" disabled><?php echo get_phrase('reset'); ?></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="my-course-search-bar ">
                    <form action="">
                        <div class="input-group mt-3" style="width: 100%;">
                            <input type="text" class="form-control rounded"  placeholder="<?php echo get_phrase('search_my_courses'); ?>" onkeyup="getCoursesBySearchString(this.value)">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row no-gutters" id = "my_courses_area">
            <?php foreach ($my_courses as $my_course):
                $course_details = $this->crud_model->get_course_by_id($my_course['course_id'])->row_array();
                $instructor_details = $this->user_model->get_all_user($course_details['user_id'])->row_array();
                $parent = 'Akademik';
                if($course_details['parent_category'] == 1){
                    $parent = 'Vokasional';
                }
                ?>
                <div class="col-lg-3">
                    <div class="course-box-wrap">
                            <div class="course-box">
                                <a href="<?php echo site_url('home/'.$parent.'_/'.slugify($course_details['title']).'/'.$my_course['course_id']); ?>">
                                    <div class="course-image">
                                        <img src="<?php echo $this->crud_model->get_course_thumbnail_url($my_course['course_id']); ?>" alt="" class="img-fluid">
                                        <span class="play-btn"></span>
                                    </div>
                                </a>
                                <div class="course-details">
                                    <a href="<?php echo site_url('home/'.$parent.'_/'.slugify($course_details['title']).'/'.$my_course['course_id']); ?>"><h5 class="title"><?php echo ellipsis($course_details['title']); ?></h5></a>
                                    <a href="<?php echo site_url('home/edukator_info/'.$instructor_details['id']); ?>"><p class="instructors"><?php echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?></p></a>

                                    <div class="rating your-rating-box" onclick="event.preventDefault();" data-toggle="modal" data-target="#EditRatingModal">

                                        <?php
                                         $get_my_rating = $this->crud_model->get_user_specific_rating('course', $my_course['course_id']);
                                         for($i = 1; $i < 6; $i++):?>
                                         <?php if ($i <= $get_my_rating['rating']): ?>
                                            <i class="fas fa-star filled"></i>
                                        <?php else: ?>
                                            <i class="fas fa-star"></i>
                                         <?php endif; ?>
                                        <?php endfor; ?>
                                        <p class="your-rating-text" id = "<?php echo $my_course['course_id']; ?>" onclick="getCourseDetailsForRatingModal(this.id)">
                                            <span class="edit"><?php echo get_phrase('edit'); ?></span>
                                            Rating
                                        </p>
                                    </div>
                                </div>
                                <div class="row" style="padding: 5px;">
                                    <div class="col-sm-6 mb-2 text-center">
                                        <a style="width: 98%" href="<?php echo site_url('home/'.$parent.'_/'.slugify($course_details['title']).'/'.$my_course['course_id']); ?>" class="btn btn-primary"><?php echo get_phrase('course_detail'); ?></a>
                                    </div>
                                    <div class="col-sm-6  text-center">
                                         <a style="width: 98%" href="<?php echo site_url('home/belajar/'.slugify($course_details['title']).'/'.$my_course['course_id']); ?>" class="btn btn-primary"><?php echo get_phrase('start_lesson'); ?></a>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<script type="text/javascript">
function getCoursesByCategoryId(category_id) {
    $.ajax({
        type : 'POST',
        url : '<?php echo site_url('home/my_courses_by_category'); ?>',
        data : {category_id : category_id},
        success : function(response){
            $('#my_courses_area').html(response);
        }
    });
}

function getCoursesBySearchString(search_string) {
    $.ajax({
        type : 'POST',
        url : '<?php echo site_url('home/my_courses_by_search_string'); ?>',
        data : {search_string : search_string},
        success : function(response){
            $('#my_courses_area').html(response);
        }
    });
}

function getCourseDetailsForRatingModal(course_id) {
    $.ajax({
        type : 'POST',
        url : '<?php echo site_url('home/get_course_details'); ?>',
        data : {course_id : course_id},
        success : function(response){
            $('#course_title_1').append(response);
            $('#course_title_2').append(response);
            $('#course_thumbnail_1').attr('src', "<?php echo base_url().'uploads/thumbnails/course_thumbnails/';?>"+course_id+".jpg");
            $('#course_thumbnail_2').attr('src', "<?php echo base_url().'uploads/thumbnails/course_thumbnails/';?>"+course_id+".jpg");
            $('#course_id_for_rating').val(course_id);
            // $('#instructor_details').text(course_id);
            console.log(response);
        }
    });
}
</script>

<?php
$instructor_details = $this->user_model->get_all_user($instructor_id)->row_array();
$social_links  = json_decode($instructor_details['social_links'], true);
?>
<section class="instructor-header-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="instructor-name"><?php echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?></h1>
                <h2 class="instructor-title"><?php echo $instructor_details['title']; ?></h2>
            </div>
        </div>
    </div>
</section>

<section class="instructor-details-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="instructor-left-box text-center">
                    <div class="instructor-image">
                        <img src="<?php echo $this->user_model->get_user_image_url($instructor_details['id']);?>" alt="" class="img-fluid">
                    </div>
                    <div class="instructor-social">
                        <ul>
                            <li><a href="<?php echo $social_links['twitter']; ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="<?php echo $social_links['facebook']; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <!-- <li><a href="<?php echo $social_links['linkedin']; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="instructor-right-box">

                    <div class="biography-content-box view-more-parent">
                        <!-- <div class="view-more" onclick="viewMore(this,'hide')"><b><?php echo get_phrase('show_full_biography'); ?></b></div> -->
                        <div class="biography-content">
                            <?php echo $instructor_details['biography']; ?>
                        </div>
                    </div>

                    <div class="instructor-stat-box">
                        <ul>
                            <li>
                                <div class="small"><?php echo get_phrase('total_student'); ?></div>
                                <div class="num">
                                    <?php
                                    $jumlah = $this->db->select('*')
                                            ->from('enrol')
                                            ->join('course', 'course.id = enrol.course_id')
                                            ->join('users', 'users.id = course.user_id')
                                            ->where('users.id', $instructor_details['id'])
                                            ->get()->num_rows();
                                    echo $jumlah;?>
                                </div>
                            </li>
                            <li>
                                <div class="small"><?php echo get_phrase('courses'); ?></div>
                                <div class="num">
                                    <?php
                                    $jumlah_kelas = $this->db->select('*')
                                            ->from('course')
                                            ->join('users', 'users.id = course.user_id')
                                            ->where('users.id', $instructor_details['id'])
                                            ->get()->num_rows();
                                    echo $jumlah_kelas;?>
                                </div>
                            </li>
                            <li>
                                <div class="small"><?php echo get_phrase('reviews'); ?></div>
                                <div class="num">
                                    <?php
                                    $jumlah_ulas = $this->db->get_where('rating', array('ratable_id' => $instructor_details['id']))->num_rows();
                                    echo $jumlah_ulas;?>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
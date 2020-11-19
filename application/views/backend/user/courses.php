<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('courses'); ?>
                    <a href="<?php echo site_url('user/form_kelas/tambah'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_course'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-12">
        <div class="card widget-inline">
            <div class="card-body p-0">
                <div class="row no-gutters">
                    <div class="col">
                        <a href="<?php echo site_url('user/kelas'); ?>" class="text-secondary">
                            <div class="card shadow-none m-0">
                                <div class="card-body text-center">
                                    <i class="dripicons-link text-muted" style="font-size: 24px;"></i>
                                    <h3><span>
                                        <?php
                                            $active_courses = $this->crud_model->get_status_wise_courses_for_instructor('active')->num_rows();
                                            echo '<script type="text/javascript"> console.log("'.$active_courses.'")</script>';
                                            echo $active_courses;
                                         ?>
                                    </span></h3>
                                    <p class="text-muted font-15 mb-0"><?php echo get_phrase('active_courses'); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col">
                        <a href="<?php echo site_url('user/kelas'); ?>" class="text-secondary">
                            <div class="card shadow-none m-0 border-left">
                                <div class="card-body text-center">
                                    <i class="dripicons-link-broken text-muted" style="font-size: 24px;"></i>
                                    <h3><span>
                                        <?php
                                            $pending_courses = $this->crud_model->get_status_wise_courses_for_instructor('pending');
                                            echo $pending_courses->num_rows();
                                         ?>
                                    </span></h3>
                                    <p class="text-muted font-15 mb-0"><?php echo get_phrase('pending_courses'); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col">
                        <a href="<?php echo site_url('user/kelas'); ?>" class="text-secondary">
                            <div class="card shadow-none m-0 border-left">
                                <div class="card-body text-center">
                                    <i class="dripicons-bookmark text-muted" style="font-size: 24px;"></i>
                                    <h3><span>
                                        <?php
                                            $draft_courses = $this->crud_model->get_status_wise_courses_for_instructor('draft');
                                            echo $draft_courses->num_rows();
                                         ?>
                                    </span></h3>
                                    <p class="text-muted font-15 mb-0"><?php echo get_phrase('draft_courses'); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col">
                        <a href="<?php echo site_url('user/kelas'); ?>" class="text-secondary">
                            <div class="card shadow-none m-0 border-left">
                                <div class="card-body text-center">
                                    <i class="dripicons-star text-muted" style="font-size: 24px;"></i>
                                    <h3><span><?php echo $this->crud_model->get_free_and_paid_courses('free', $this->session->userdata('user_id'))->num_rows(); ?></span></h3>
                                    <p class="text-muted font-15 mb-0"><?php echo get_phrase('free_courses'); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col">
                        <a href="<?php echo site_url('user/kelas'); ?>" class="text-secondary">
                            <div class="card shadow-none m-0 border-left">
                                <div class="card-body text-center">
                                    <i class="dripicons-tags text-muted" style="font-size: 24px;"></i>
                                    <h3><span><?php echo $this->crud_model->get_free_and_paid_courses('paid', $this->session->userdata('user_id'))->num_rows(); ?></span></h3>
                                    <p class="text-muted font-15 mb-0"><?php echo get_phrase('paid_courses'); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div> <!-- end row -->
            </div>
        </div> <!-- end card-box-->
    </div> <!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('course_list'); ?></h4>
                <form class="row justify-content-center" action="<?php echo site_url('user/kelas'); ?>" method="get">
                    <!-- Course Categories -->
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="category_id"><?php echo get_phrase('categories'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="category_id" id="category_id">
                                <option value="<?php echo 'all'; ?>" <?php if($selected_category_id == 'all') echo 'selected'; ?>><?php echo get_phrase('all'); ?></option>
                                    <optgroup label="Vokasional">
                                        <?php $sub_categories = $this->crud_model->get_sub_categories(1);
                                        foreach ($sub_categories as $sub_category): ?>
                                        <option value="<?php echo $sub_category['id']; ?>" <?php if($selected_category_id == $sub_category['id']) echo 'selected'; ?>><?php echo $sub_category['name']; ?></option>
                                    <?php endforeach; ?>
                                    <optgroup label="Akademik">
                                        <?php $sub_categories = $this->crud_model->get_sub_categories(2);
                                        foreach ($sub_categories as $sub_category): ?>
                                        <option value="<?php echo $sub_category['id']; ?>" <?php if($selected_category_id == $sub_category['id']) echo 'selected'; ?>><?php echo $sub_category['name']; ?></option>
                                    <?php endforeach; ?>
                                </optgroup>
                        </select>
                    </div>
                </div>

                <!-- Course Status -->
                <div class="col-xl-2">
                    <div class="form-group">
                        <label for="status"><?php echo get_phrase('status'); ?></label>
                        <select class="form-control select2" data-toggle="select2" name="status" id = 'status'>
                            <option value="all" <?php if($selected_status == 'all') echo 'selected'; ?>><?php echo get_phrase('all'); ?></option>
                            <option value="active" <?php if($selected_status == 'active') echo 'selected'; ?>><?php echo get_phrase('active'); ?></option>
                            <option value="pending" <?php if($selected_status == 'pending') echo 'selected'; ?>><?php echo get_phrase('pending'); ?></option>
                        </select>
                    </div>
                </div>

                <!-- Course Tipe -->
                <div class="col-xl-2">
                    <div class="form-group">
                        <label for="tipe">Tipe</label>
                        <select class="form-control select2" data-toggle="select2" name="tipe" id = 'tipe'>
                            <option value="all" <?php if($selected_tipe == 'all') echo 'selected'; ?>><?php echo get_phrase('all'); ?></option>
                            <option value="online" <?php if($selected_tipe == 'online') echo 'selected'; ?>>Online</option>
                            <option value="webinar" <?php if($selected_tipe == 'webinar') echo 'selected'; ?>>Webinar</option>
                        </select>
                    </div>
                </div>

                <!-- Course Price -->
                <div class="col-xl-2">
                    <div class="form-group">
                        <label for="price"><?php echo get_phrase('price'); ?></label>
                        <select class="form-control select2" data-toggle="select2" name="price" id = 'price'>
                            <option value="all"  <?php if($selected_price == 'all' ) echo 'selected'; ?>><?php echo get_phrase('all'); ?></option>
                            <option value="free" <?php if($selected_price == 'free') echo 'selected'; ?>><?php echo get_phrase('free'); ?></option>
                            <option value="paid" <?php if($selected_price == 'paid') echo 'selected'; ?>><?php echo get_phrase('paid'); ?></option>
                        </select>
                    </div>
                </div>

                <div class="col-xl-2">
                    <label for=".." class="text-white"><?php echo get_phrase('..'); ?></label>
                    <button type="submit" class="btn btn-primary btn-block" name="button"><?php echo get_phrase('filter'); ?></button>
                </div>
            </form>

            <div class="table-responsive-sm mt-4">
                <?php if (count($courses) > 0): ?>
                    <table id="course-datatable" class="table table-striped dt-responsive nowrap" width="100%" data-page-length='25'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('title'); ?></th>
                                <th><?php echo get_phrase('category'); ?></th>
                                <th>Keterangan</th>
                                <th>Tipe</th>
                                <th><?php echo get_phrase('enrolled_student'); ?></th>
                                <th><?php echo get_phrase('status'); ?></th>
                                <th><?php echo get_phrase('price'); ?></th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($courses as $key => $course):
                                $instructor_details = $this->user_model->get_all_user($course['user_id'])->row_array();
                                $category_details = $this->crud_model->get_category_details_by_id($course['category_id'])->row_array();
                                $sections = $this->crud_model->get_section('course', $course['id']);
                                $lessons = $this->crud_model->get_lessons('course', $course['id']);
                                $enroll_history = $this->crud_model->enrol_history($course['id']);
                                $parent = 'Akademik_';
                                if($course['parent_category'] == '1'){
                                    $parent = 'Vokasional';
                                }
                            ?>
                                <tr>
                                    <td><?php echo ++$key; ?></td>
                                    <td>
                                        <strong><a href="<?php echo site_url('user/form_kelas/edit/'.$course['id']); ?>"><?php echo ellipsis($course['title']); ?></a></strong><br>
                                        <small class="text-muted"><?php echo 'Edukator : <b>'.$instructor_details['first_name'].' '.$instructor_details['last_name'].'</b>'; ?></small>
                                    </td>
                                    <td>
                                        <span class="badge badge-dark-lighten"><?php echo $category_details['name']; ?></span>
                                    </td>
                                    <td>
                                        <?php 
                                            if($course['tipe'] == 'online'){ ?>
                                        <small class="text-muted"><?php echo '<b>'.get_phrase('total_section').'</b>: '.$sections->num_rows(); ?></small><br>
                                        <small class="text-muted"><?php echo '<b>'.get_phrase('total_lesson').'</b>: '.$lessons->num_rows(); ?></small><br>
                                        <?php
                                            }
                                            else{
                                         ?>
                                         <small class="text-muted"><b>Grup Chat : <?php echo $course['grupchat']; ?></b></small>
                                         <br>
                                         <small class="text-muted"><b>Live webinar : <?php echo $course['live']; ?></b></small>
                                     <?php } ?>
                                    </td>
                                    <td>
                                        <small class="text-muted"><?php echo $course['tipe']; ?></small><br>
                                    </td>
                                    <td>
                                        <small class="text-muted"><?php echo '<b>'.get_phrase('total_enrolment').'</b>: '.$enroll_history->num_rows(); ?></small>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($course['status'] == 'pending'): ?>
                                            <i class="mdi mdi-circle text-warning" style="font-size: 19px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase($course['status']); ?>"></i>
                                        <?php elseif ($course['status'] == 'active'):?>
                                            <i class="mdi mdi-circle text-success" style="font-size: 19px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase($course['status']); ?>"></i>
                                        <?php elseif ($course['status'] == 'draft'):?>
                                            <i class="mdi mdi-circle text-secondary" style="font-size: 19px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase($course['status']); ?>"></i>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($course['is_free_course'] == null): ?>
                                            <?php if ($course['discount_flag'] == 1): ?>
                                                <span class="badge badge-dark-lighten"><?php echo 'Rp. '.$course['discounted_price'].',-'; ?></span>
                                            <?php else: ?>
                                                <span class="badge badge-dark-lighten"><?php echo 'Rp. '.$course['price'].',-'; ?></span>
                                            <?php endif; ?>
                                        <?php elseif ($course['is_free_course'] == 1):?>
                                            <span class="badge badge-success-lighten"><?php echo get_phrase('free'); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="<?php echo site_url('home/'.$parent.'/'.slugify($course['title']).'/'.$course['id']); ?>" target="_blank"><?php echo get_phrase('view_course_on_frontend');?></a></li>
                                              <li><a class="dropdown-item" href="<?php echo site_url('user/form_kelas/edit/'.$course['id']); ?>"><?php echo get_phrase('edit_this_course');?></a></li>
                                              <!-- <li><a class="dropdown-item" href="<?php echo site_url('user/form_kelas/edit/'.$course['id']); ?>"><?php echo get_phrase('section_&_lesson');?></a></li> -->
                                              <?php if ($course['status'] == 'active' || $course['status'] == 'pending'): ?>
                                                  <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('user/course_actions/draft/'.$course['id']); ?>');"><?php echo get_phrase('mark_as_drafted'); ?></a></li>
                                              <?php else: ?>
                                                  <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('user/course_actions/publish/'.$course['id']); ?>');"><?php echo get_phrase('publish_this_course'); ?></a></li>
                                              <?php endif; ?>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('user/course_actions/delete/'.$course['id']); ?>');"><?php echo get_phrase('delete_this_course'); ?></a></li>
                                          </ul>
                                      </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
                <?php if (count($courses) == 0): ?>
                    <div class="img-fluid w-100 text-center">
                      <img style="opacity: 1; width: 100px;" src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
                      <?php echo get_phrase('no_data_found'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</div>

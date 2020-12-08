<?php
$course_details = $this->crud_model->get_course_by_id($course_id)->row_array();
?>
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('update').': '.$course_details['title']; ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3"><?php echo get_phrase('course_manager'); ?>
                    <a href="<?php echo site_url('user/preview/'.$course_id); ?>" class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm ml-1" target="_blank"><?php echo get_phrase('view_on_frontend'); ?> <i class="mdi mdi-arrow-right"></i> </a>
                    <a href="<?php echo site_url('user/kelas'); ?>" class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"><i class=" mdi mdi-keyboard-backspace"></i> <?php echo get_phrase('back_to_course_list'); ?></a>
                </h4>

                <div class="row">
                    <div class="col-xl-12">
                        <form class="required-form" action="<?php echo site_url('user/course_actions/edit/'.$course_id); ?>" method="post" enctype="multipart/form-data">
                            <div id="basicwizard">
                                <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                                    <?php 
                                        if ($course_details['tipe'] == 'online') { ?>
                                        <li class="nav-item">
                                           <a href="#curriculum" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                               <i class="mdi mdi-account-circle mr-1"></i>
                                               <span class="d-none d-sm-inline"><?php echo get_phrase('curriculum'); ?></span>
                                           </a>
                                       </li>
                                    <?php
                                        }
                                     ?>
                                    <li class="nav-item">
                                        <a href="#basic" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-fountain-pen-tip mr-1"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('basic'); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#requirements" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-bell-alert mr-1"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('requirements'); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#outcomes" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-camera-control mr-1"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('outcomes'); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#pricing" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-currency-cny mr-1"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('pricing'); ?></span>
                                        </a>
                                    </li>
                                        <li class="nav-item" id="media_a">
                                            <a href="#media" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                <i class="mdi mdi-library-video mr-1"></i>
                                                <span class="d-none d-sm-inline"><?php echo get_phrase('media'); ?></span>
                                            </a>
                                        </li>
                                    <li class="nav-item" id="media_b">
                                        <a href="#mediab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-library-video mr-1"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('media'); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#seo" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-tag-multiple mr-1"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('seo'); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#finish" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('finish'); ?></span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content b-0 mb-0">
                                    <div class="tab-pane" id="curriculum">
                                        <?php include 'curriculum.php'; ?>
                                    </div>

                                <div class="tab-pane" id="basic">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-8">
                                            <div class="form-group row mb-3">
                                                <label class="col-md-2 col-form-label" for="course_title"><?php echo get_phrase('course_title'); ?><span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" id="course_title" name = "title" placeholder="<?php echo get_phrase('enter_course_title'); ?>" value="<?php echo $course_details['title']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label class="col-md-2 col-form-label" for="short_description"><?php echo get_phrase('short_description'); ?></label>
                                                <div class="col-md-10">
                                                    <textarea name="short_description" id = "short_description" class="form-control"><?php echo $course_details['short_description']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label class="col-md-2 col-form-label" for="description"><?php echo get_phrase('description'); ?></label>
                                                <div class="col-md-10">
                                                    <textarea name="description" id = "description" class="form-control"><?php echo $course_details['description']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label class="col-md-2 col-form-label" for="sub_category_id"><?php echo get_phrase('category'); ?><span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <select class="form-control select2" data-toggle="select2" name="sub_category_id" id="sub_category_id" required>
                                                        <option value=""><?php echo get_phrase('select_a_category'); ?></option>
                                                            <optgroup label="Vokasional">
                                                                <?php $sub_categories = $this->crud_model->get_sub_categories(1);
                                                                foreach ($sub_categories as $category): ?>
                                                                <option value="<?php echo $category['id']; ?>" <?php if($category['id'] == $course_details['category_id']) echo 'selected'; ?>><?php echo $category['name']; ?></option>
                                                            <?php endforeach; ?>
                                                            </optgroup>
                                                            <optgroup label="Akademik">
                                                                <?php $sub_categories = $this->crud_model->get_sub_categories(2);
                                                                foreach ($sub_categories as $category): ?>
                                                                <option value="<?php echo $category['id']; ?>" <?php if($category['id'] == $course_details['category_id']) echo 'selected'; ?>><?php echo $category['name']; ?></option>
                                                            <?php endforeach; ?>
                                                            </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                            <div class="form-group row mb-3">
                                                <label class="col-md-2 col-form-label" for="tipe">Tipe<span class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <select class="form-control select2" data-toggle="select2" name="tipe" id="tipe" required onchange="show_web(this.value)">
                                                        <option value="online" <?php if($course_details['tipe'] == 'online' ){ echo "selected"; } ?>>Online</option>
                                                        <option value="webinar" <?php if($course_details['tipe'] == 'webinar') { echo "selected"; } ?>>Webinar</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div id="webinar_div">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label" for="kuota">Tanggal<span class="required">*</span></label>
                                                    <div class="col-md-10">
                                                        <input type="date" class="form-control" id="course_date" name = "tanggal" value="<?php echo $course_details['tanggal'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label" for="kuota">Waktu<span class="required">*</span></label>
                                                    <div class="col-md-10">
                                                        <input type="time" class="form-control" id="course_time" name = "waktu" value="<?php echo $course_details['waktu'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label" for="durasi">Durasi (jam)<span class="required">*</span></label>
                                                    <div class="col-md-10">
                                                        <input type="number" class="form-control" id="course_durasi" name = "durasi" placeholder="Durasi webinar" value="<?php echo $course_details['durasi'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label" for="kuota">Kuota<span class="required">*</span></label>
                                                    <div class="col-md-10">
                                                        <input type="number" class="form-control" id="course_kuota" name = "kuota" placeholder="Jumlah kuota" value="<?php echo $course_details['kuota'] ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->
                                </div> <!-- end tab pane -->

                                <div class="tab-pane" id="requirements">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-8">
                                            <div class="form-group row mb-3">
                                                <label class="col-md-2 col-form-label" for="requirements"><?php echo get_phrase('requirements'); ?></label>
                                                <div class="col-md-10">
                                                    <div id = "requirement_area">
                                                        <?php if (count(json_decode($course_details['requirements'])) > 0): ?>
                                                            <?php
                                                            $counter = 0;
                                                            foreach (json_decode($course_details['requirements']) as $requirement):?>
                                                            <?php if ($counter == 0):
                                                                $counter++; ?>
                                                                <div class="d-flex mt-2">
                                                                    <div class="flex-grow-1 px-3">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="requirements[]" id="requirements" placeholder="<?php echo get_phrase('provide_requirements'); ?>" value="<?php echo $requirement; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button" class="btn btn-success btn-sm" style="" name="button" onclick="appendRequirement()"> <i class="fa fa-plus"></i> </button>
                                                                    </div>
                                                                </div>
                                                            <?php else: ?>
                                                                <div class="d-flex mt-2">
                                                                    <div class="flex-grow-1 px-3">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="requirements[]" id="requirements" placeholder="<?php echo get_phrase('provide_requirements'); ?>" value="<?php echo $requirement; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button" class="btn btn-danger btn-sm" style="margin-top: 0px;" name="button" onclick="removeRequirement(this)"> <i class="fa fa-minus"></i> </button>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <div class="d-flex mt-2">
                                                            <div class="flex-grow-1 px-3">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" name="requirements[]" id="requirements" placeholder="<?php echo get_phrase('provide_requirements'); ?>">
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <button type="button" class="btn btn-success btn-sm" style="" name="button" onclick="appendRequirement()"> <i class="fa fa-plus"></i> </button>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>

                                                    <div id = "blank_requirement_field">
                                                        <div class="d-flex mt-2">
                                                            <div class="flex-grow-1 px-3">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" name="requirements[]" id="requirements" placeholder="<?php echo get_phrase('provide_requirements'); ?>">
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <button type="button" class="btn btn-danger btn-sm" style="margin-top: 0px;" name="button" onclick="removeRequirement(this)"> <i class="fa fa-minus"></i> </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="outcomes">
                                <div class="row justify-content-center">
                                    <div class="col-xl-8">
                                        <div class="form-group row mb-3">
                                            <label class="col-md-2 col-form-label" for="outcomes"><?php echo get_phrase('outcomes'); ?></label>
                                            <div class="col-md-10">
                                                <div id = "outcomes_area">
                                                    <?php if (count(json_decode($course_details['outcomes'])) > 0): ?>
                                                        <?php
                                                        $counter = 0;
                                                        foreach (json_decode($course_details['outcomes']) as $outcome):?>
                                                        <?php if ($counter == 0):
                                                            $counter++; ?>
                                                            <div class="d-flex mt-2">
                                                                <div class="flex-grow-1 px-3">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" name="outcomes[]" placeholder="<?php echo get_phrase('provide_outcomes'); ?>" value="<?php echo $outcome; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="">
                                                                    <button type="button" class="btn btn-success btn-sm" name="button" onclick="appendOutcome()"> <i class="fa fa-plus"></i> </button>
                                                                </div>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="d-flex mt-2">
                                                                <div class="flex-grow-1 px-3">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" name="outcomes[]"  placeholder="<?php echo get_phrase('provide_outcomes'); ?>" value="<?php echo $outcome; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="">
                                                                    <button type="button" class="btn btn-danger btn-sm" style="margin-top: 0px;" name="button" onclick="removeOutcome(this)"> <i class="fa fa-minus"></i> </button>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <div class="d-flex mt-2">
                                                        <div class="flex-grow-1 px-3">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="outcomes[]" placeholder="<?php echo get_phrase('provide_outcomes'); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <button type="button" class="btn btn-success btn-sm" name="button" onclick="appendOutcome()"> <i class="fa fa-plus"></i> </button>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <div id = "blank_outcome_field">
                                                    <div class="d-flex mt-2">
                                                        <div class="flex-grow-1 px-3">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="outcomes[]" id="outcomes" placeholder="<?php echo get_phrase('provide_outcomes'); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <button type="button" class="btn btn-danger btn-sm" style="margin-top: 0px;" name="button" onclick="removeOutcome(this)"> <i class="fa fa-minus"></i> </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="pricing">
                            <div class="row justify-content-center">
                                <div class="col-xl-8">
                                    <div class="form-group row mb-3">
                                        <div class="offset-md-2 col-md-10">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="is_free_course" id="is_free_course" value="1" <?php if($course_details['is_free_course'] == 1) echo 'checked'; ?>>
                                                <label class="custom-control-label" for="is_free_course"><?php echo get_phrase('check_if_this_is_a_free_course'); ?></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-md-2 col-form-label" for="price"><?php echo get_phrase('course_price').' ( Rp )'; ?></label>
                                        <div class="col-md-10">
                                            <input type="number" class="form-control" id="price" name = "price" min="0" placeholder="<?php echo get_phrase('enter_course_course_price'); ?>" value="<?php echo $course_details['price']; ?>" >
                                        </div>
                                    </div>

                                    <!-- <div class="form-group row mb-3 hidden">
                                        <div class="offset-md-2 col-md-10">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="discount_flag" id="discount_flag" value="1" <?php if($course_details['discount_flag'] == 1) echo 'checked'; ?>>
                                                <label class="custom-control-label" for="discount_flag"><?php echo get_phrase('check_if_this_course_has_discount'); ?></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3 hidden">
                                        <label class="col-md-2 col-form-label" for="discounted_price"><?php echo get_phrase('discounted_price').' ('.currency_code_and_symbol().')'; ?></label>
                                        <div class="col-md-10">
                                            <input type="number" class="form-control" name="discounted_price" id="discounted_price" onkeyup="calculateDiscountPercentage(this.value)" value="<?php echo $course_details['discounted_price']; ?>" min="0">
                                            <small class="text-muted"><?php echo get_phrase('this_course_has'); ?> <span id = "discounted_percentage" class="text-danger">0%</span> <?php echo get_phrase('discount'); ?></small>
                                        </div>
                                    </div> -->
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div> <!-- end tab-pane -->
                        <div class="tab-pane" id="media">
                            <div class="row justify-content-center">

                                <div class="col-xl-8">
                                    <div class="form-group row mb-3">
                                        <label class="col-md-2 col-form-label" for="course_overview_provider"><?php echo get_phrase('course_overview_provider'); ?></label>
                                        <div class="col-md-10">
                                            <select class="form-control select2" data-toggle="select2" name="course_overview_provider" id="course_overview_provider">
                                                <option value="youtube" <?php if ($course_details['course_overview_provider'] == 'youtube')echo 'selected';?>><?php echo get_phrase('youtube'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-xl-8">
                                    <div class="form-group row mb-3">
                                        <label class="col-md-2 col-form-label" for="course_overview_url"><?php echo get_phrase('course_overview_url'); ?></label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="course_overview_url" id="course_overview_url" placeholder="E.g: https://www.youtube.com/watch?v=oBtf8Yglw2w" value="<?php echo $course_details['video_url'] ?>">
                                        </div>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-xl-8">
                                    <div class="form-group row mb-3">
                                        <label class="col-md-2 col-form-label" for="course_thumbnail_label"><?php echo get_phrase('course_thumbnail'); ?></label>
                                        <div class="col-md-10">
                                            <div class="wrapper-image-preview" style="margin-left: -6px;">
                                                <div class="box" style="width: 250px;">
                                                    <div class="js--image-preview" style="background-image: url(<?php echo $this->crud_model->get_course_thumbnail_url($course_details['id']);?>);"></div>
                                                    <div class="upload-options">
                                                        <label for="course_thumbnail" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('course_thumbnail'); ?> <br> <small>(600 X 600)</small> </label>
                                                        <input id="course_thumbnail" type="file" class="image-upload" name="course_thumbnail" accept="image/*">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>
                        <div class="tab-pane" id="mediab">
                            <div class="row justify-content-center">
                                <div class="col-xl-8">
                                    <div class="form-group row mb-3">
                                        <label class="col-md-2 col-form-label" for="course_overview_provider"><?php echo get_phrase('course_overview_provider'); ?></label>
                                        <div class="col-md-10">
                                            <select class="form-control select2" data-toggle="select2" name="course_overview_provider" id="course_overview_provider">
                                                <option value="youtube" <?php if ($course_details['course_overview_provider'] == 'youtube')echo 'selected';?>><?php echo get_phrase('youtube'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-xl-8">
                                    <div class="form-group row mb-3">
                                        <label class="col-md-2 col-form-label" for="course_overview_url"><?php echo get_phrase('course_overview_url'); ?></label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="course_overview_url" id="course_overview_url" placeholder="E.g: https://www.youtube.com/watch?v=oBtf8Yglw2w" value="<?php echo $course_details['video_url'] ?>">
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                                
                                <div class="col-xl-8">
                                    <div class="form-group row mb-3">
                                        <label class="col-md-2 col-form-label" for="grup_chat">Grup Chat</label>
                                        <div class="col-md-10">
                                            <select class="form-control select2" data-toggle="select2" name="grup_chat" id="grup_chat">
                                                <option value="whatsapp" <?php if($course_details['grupchat'] == 'whatsapp') { echo "selected"; } ?>>Whatsapp</option>
                                                <option value="telegram" <?php if($course_details['grupchat'] == 'telegram') { echo "selected"; } ?>>Telegram</option>
                                                <option value="line" <?php if($course_details['grupchat'] == 'line') { echo "selected"; } ?>>Line</option>
                                                <!-- <option value="vimeo"><?php echo get_phrase('vimeo'); ?></option>
                                                <option value="html5"><?php echo get_phrase('HTML5'); ?></option> -->
                                            </select>
                                        </div>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-xl-8">
                                    <div class="form-group row mb-3">
                                        <label class="col-md-2 col-form-label" for="link_chat">Link Grup Chat</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="link_chat" id="link_chat" placeholder="Isikan link sesuai pilihan grup chat" value="<?php echo $course_details['linkgrup'] ?>">
                                        </div>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-xl-8">
                                    <div class="form-group row mb-3">
                                        <label class="col-md-2 col-form-label" for="live">Live Webinar</label>
                                        <div class="col-md-10">
                                            <select class="form-control select2" data-toggle="select2" name="live" id="live">
                                                <option value="Zoom" <?php if($course_details['live'] == 'zoom') { echo "selected"; } ?>>Zoom</option>
                                                <option value="gmeet" <?php if($course_details['live'] == 'gmeet') { echo "selected"; } ?>>Gmeet</option>
                                            </select>
                                            <span class="text-muted">Link live webinar dibagikan dalam grup chat.</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-8">
                                    <div class="form-group row mb-3">
                                        <label class="col-md-2 col-form-label" for="course_thumbnail_label"><?php echo get_phrase('course_thumbnail'); ?></label>
                                        <div class="col-md-10">
                                            <div class="wrapper-image-preview" style="margin-left: -6px;">
                                                <div class="box" style="width: 250px;">
                                                    <div class="upload-options">
                                                        <label for="course_thumbnailb" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('course_thumbnail'); ?> <br> <small>(600 X 600)</small> </label>
                                                        <input id="course_thumbnailb" type="file" class="image-upload" name="course_thumbnailb" accept="image/*">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>
                        <div class="tab-pane" id="seo">
                            <div class="row justify-content-center">
                                <div class="col-xl-8">
                                    <div class="form-group row mb-3">
                                        <label class="col-md-2 col-form-label" for="website_keywords"><?php echo get_phrase('meta_keywords'); ?></label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control bootstrap-tag-input" id = "meta_keywords" name="meta_keywords" value="<?php echo $course_details['meta_keywords']; ?>"/>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-xl-8">
                                    <div class="form-group row mb-3">
                                        <label class="col-md-2 col-form-label" for="meta_description"><?php echo get_phrase('meta_description'); ?></label>
                                        <div class="col-md-10">
                                            <textarea name="meta_description" class="form-control"><?php echo $course_details['meta_description']; ?></textarea>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>
                        <div class="tab-pane" id="finish">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center">
                                        <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                        <h3 class="mt-0"><?php echo get_phrase("thank_you"); ?> !</h3>

                                        <p class="w-75 mb-2 mx-auto"><?php echo get_phrase('you_are_just_one_click_away'); ?></p>

                                        <div class="mb-3 mt-3">
                                            <button type="button" class="btn btn-primary text-center" onclick="checkRequiredFields()"><?php echo get_phrase('submit'); ?></button>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>

                        <!-- <ul class="list-inline mb-0 wizard text-center">
                            <li class="previous list-inline-item">
                                <a href="javascript::" class="btn btn-info"> <i class="mdi mdi-arrow-left-bold"></i> </a>
                            </li>
                            <li class="next list-inline-item">
                                <a href="javascript::" class="btn btn-info"> <i class="mdi mdi-arrow-right-bold"></i> </a>
                            </li>
                        </ul> -->

                    </div> <!-- tab-content -->
                </div> <!-- end #progressbarwizard-->
            </form>
        </div>
    </div><!-- end row-->
</div> <!-- end card-body-->
</div> <!-- end card-->
</div>
</div>

<script type="text/javascript">
  $(document).ready(function () {
    initSummerNote(['#description']);
  });
</script>

<script type="text/javascript">
var tipe = '<?php echo $course_details["tipe"] ?>';
var blank_outcome = jQuery('#blank_outcome_field').html();
var blank_requirement = jQuery('#blank_requirement_field').html();
jQuery(document).ready(function() {
    jQuery('#blank_outcome_field').hide();
    jQuery('#blank_requirement_field').hide();
    calculateDiscountPercentage($('#discounted_price').val());
    if (tipe == 'online') { 
        $('#webinar_div').hide();
    }
    console.log('tipe = '+tipe);
    $('#media_a').hide();
    $('#media_b').hide();
    if(tipe == 'online'){
        $('#media_a').show();
    }else{
        $('#media_b').show();
    }
});
function appendOutcome() {
    jQuery('#outcomes_area').append(blank_outcome);
}
function removeOutcome(outcomeElem) {
    jQuery(outcomeElem).parent().parent().remove();
}

function appendRequirement() {
    jQuery('#requirement_area').append(blank_requirement);
}
function removeRequirement(requirementElem) {
    jQuery(requirementElem).parent().parent().remove();
}

function ajax_get_sub_category(category_id) {
    console.log(category_id);
    $.ajax({
        url: '<?php echo site_url('user/ajax_get_sub_category/');?>' + category_id ,
        success: function(response)
        {
            jQuery('#sub_category_id').html(response);
        }
    });
}

function priceChecked(elem){
    if (jQuery('#discountCheckbox').is(':checked')) {

        jQuery('#discountCheckbox').prop( "checked", false );
    }else {

        jQuery('#discountCheckbox').prop( "checked", true );
    }
}

function topCourseChecked(elem){
    if (jQuery('#isTopCourseCheckbox').is(':checked')) {

        jQuery('#isTopCourseCheckbox').prop( "checked", false );
    }else {

        jQuery('#isTopCourseCheckbox').prop( "checked", true );
    }
}

function isFreeCourseChecked(elem) {

    if (jQuery('#'+elem.id).is(':checked')) {
        $('#price').prop('required',false);
    }else {
        $('#price').prop('required',true);
    }
}

function calculateDiscountPercentage(discounted_price) {
    if (discounted_price > 0) {
        var actualPrice = jQuery('#price').val();
        if ( actualPrice > 0) {
            var reducedPrice = actualPrice - discounted_price;
            var discountedPercentage = (reducedPrice / actualPrice) * 100;
            if (discountedPercentage > 0) {
                jQuery('#discounted_percentage').text(discountedPercentage.toFixed(2) + "%");

            }else {
                jQuery('#discounted_percentage').text('<?php echo '0%'; ?>');
            }
        }
    }
}

function show_web(param) {
    if (param === "online") {
        // $('#level').hide();
        $('#media_a').show();
        $('#media_b').hide();
        $('#webinar_div').hide();
        // $('#online').show();
    // }else if (lesson_type === "other") {
    //     $('#video').hide();
    //     $('#other').show();
    }else {
        // $('#level').show();
        $('#media_a').hide();
        $('#webinar_div').show();
        $('#media_b').show();
        // $('#other').hide();
    }
}

$('.on-hover-action').mouseenter(function() {
    var id = this.id;
    $('#widgets-of-'+id).show();
});
$('.on-hover-action').mouseleave(function() {
    var id = this.id;
    $('#widgets-of-'+id).hide();
});
</script>

<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('system_settings'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('system_settings');?></h4>

                    <form class="required-form" action="<?php echo site_url('admin/system_settings/system_update'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="system_name"><?php echo get_phrase('website_name'); ?><span class="required">*</span></label>
                            <input type="text" name = "system_name" id = "system_name" class="form-control" value="<?php echo get_settings('system_name');  ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="system_title"><?php echo get_phrase('website_title'); ?><span class="required">*</span></label>
                            <input type="text" name = "system_title" id = "system_title" class="form-control" value="<?php echo get_settings('system_title');  ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="website_keywords"><?php echo get_phrase('website_keywords'); ?></label>
                            <input type="text" class="form-control bootstrap-tag-input container" id = "website_keywords" name="website_keywords" value="<?php echo get_settings('website_keywords');  ?>"/>
                        </div>

                        <div class="form-group">
                            <label for="website_description"><?php echo get_phrase('website_description'); ?></label>
                            <textarea name="website_description" id = "website_description" class="form-control" rows="5"><?php echo get_settings('website_description');  ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="author"><?php echo get_phrase('author'); ?></label>
                            <input type="text" name = "author" id = "author" class="form-control" value="<?php echo get_settings('author');  ?>">
                        </div>

                        <div class="form-group">
                            <label for="system_email"><?php echo get_phrase('system_email'); ?><span class="required">*</span></label>
                            <input type="text" name = "system_email" id = "system_email" class="form-control" value="<?php echo get_settings('system_email');  ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="address"><?php echo get_phrase('address'); ?></label>
                            <textarea name="address" id = "address" class="form-control" rows="5"><?php echo get_settings('address');  ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="phone"><?php echo get_phrase('phone'); ?></label>
                            <input type="text" name = "phone" id = "phone" class="form-control" value="<?php echo get_settings('phone');  ?>">
                        </div>

                        <div class="form-group">
                            <label for="phone">Link whatsapp</label>
                            <input type="text" name = "link_wa" id = "link_wa" class="form-control" value="<?php echo get_settings('whatsapp_link');  ?>">
                        </div>

                        <div class="form-group">
                            <label for="phone">Link instagram</label>
                            <input type="text" name = "link_ig" id = "link_ig" class="form-control" value="<?php echo get_settings('instagram_link');  ?>">
                        </div>

                        <div class="form-group">
                            <label for="phone">Link youtube</label>
                            <input type="text" name = "link_yt" id = "link_yt" class="form-control" value="<?php echo get_settings('youtube_link');  ?>">
                        </div>

                        <div class="form-group">
                            <label for="language"><?php echo get_phrase('student_email_verification'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="student_email_verification" id="student_email_verification">
                                <option value="enable" <?php if(get_settings('student_email_verification') == "enable") echo 'selected'; ?>><?php echo get_phrase('enable'); ?></option>
                                <option value="disable" <?php if(get_settings('student_email_verification') == "disable") echo 'selected'; ?>><?php echo get_phrase('disable'); ?></option>
                            </select>
                        </div>

                        <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase('save'); ?></button>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

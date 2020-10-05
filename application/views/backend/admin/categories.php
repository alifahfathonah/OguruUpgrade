<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('categories'); ?>
                  <a href="<?php echo site_url('admin/category_form/add_category'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_category'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
         <div class="col-md-6 col-lg-6 col-xl-4 on-hover-action" id = "<?php echo $category['id']; ?>">
             <div class="card d-block">
                 <div class="card-body">
                     <h4 class="card-title mb-0"><i class="<?php echo $category['font_awesome_class']; ?>"></i> Vokasional</h4>
                     <small style="font-style: italic;"><p class="card-text"><?php echo $categories_v->num_rows(); ?></p></small>
                 </div>

                 <ul class="list-group list-group-flush">
                     <?php foreach ($categories_v->result_array() as $category): ?>
                        <li class="list-group-item on-hover-action" id = "<?php echo $category['id']; ?>">
                            <span><i class="<?php echo $category['font_awesome_class']; ?>"></i> <?php echo $category['name']; ?></span>
                            <span class="category-action" id = 'category-delete-btn-<?php echo $category['id']; ?>' style="float: right; margin-left: 5px; display: none; height: 20px;">
                                <a href="javascript::" class="action-icon" onclick="confirm_modal('<?php echo site_url('admin/categories/delete/'.$category['id']); ?>');"> <i class="mdi mdi-delete" style="font-size: 18px;"></i></a>
                            </span>
                            <span class="category-action" id = 'category-edit-btn-<?php echo $category['id']; ?>' style="float: right; display: none; height: 20px;">
                                <a href="<?php echo site_url('admin/category_form/edit_category/'.$category['id']); ?>" class="action-icon"> <i class="mdi mdi-pencil" style="font-size: 18px;"></i></a>
                            </span>
                        </li>
                     <?php endforeach; ?>
                 </ul>
             </div> <!-- end card-->
         </div>
         <div class="col-md-6 col-lg-6 col-xl-4 on-hover-action" id = "<?php echo $category['id']; ?>">
             <div class="card d-block">
                 <div class="card-body">
                     <h4 class="card-title mb-0"><i class="<?php echo $category['font_awesome_class']; ?>"></i> Akademik</h4>
                     <small style="font-style: italic;"><p class="card-text"><?php echo $categories_a->num_rows(); ?></p></small>
                 </div>

                 <ul class="list-group list-group-flush">
                     <?php foreach ($categories_a->result_array() as $category): ?>
                        <li class="list-group-item on-hover-action" id = "<?php echo $category['id']; ?>">
                            <span><i class="<?php echo $category['font_awesome_class']; ?>"></i> <?php echo $category['name']; ?></span>
                            <span class="category-action" id = 'category-delete-btn-<?php echo $category['id']; ?>' style="float: right; margin-left: 5px; display: none; height: 20px;">
                                <a href="javascript::" class="action-icon" onclick="confirm_modal('<?php echo site_url('admin/categories/delete/'.$category['id']); ?>');"> <i class="mdi mdi-delete" style="font-size: 18px;"></i></a>
                            </span>
                            <span class="category-action" id = 'category-edit-btn-<?php echo $category['id']; ?>' style="float: right; display: none; height: 20px;">
                                <a href="<?php echo site_url('admin/category_form/edit_category/'.$category['id']); ?>" class="action-icon"> <i class="mdi mdi-pencil" style="font-size: 18px;"></i></a>
                            </span>
                        </li>
                     <?php endforeach; ?>
                 </ul>
             </div> <!-- end card-->
         </div>
         <div class="col-md-6 col-lg-6 col-xl-4 on-hover-action" id = "<?php echo $category['id']; ?>">
             <div class="card d-block">
                 <div class="card-body">
                     <h4 class="card-title mb-0"><i class="<?php echo $category['font_awesome_class']; ?>"></i> Video</h4>
                     <small style="font-style: italic;"><p class="card-text"><?php echo $categories_y->num_rows(); ?></p></small>
                 </div>

                 <ul class="list-group list-group-flush">
                     <?php foreach ($categories_y->result_array() as $category): ?>
                        <li class="list-group-item on-hover-action" id = "<?php echo $category['id']; ?>">
                            <span><i class="<?php echo $category['font_awesome_class']; ?>"></i> <?php echo $category['name']; ?></span>
                            <span class="category-action" id = 'category-delete-btn-<?php echo $category['id']; ?>' style="float: right; margin-left: 5px; display: none; height: 20px;">
                                <a href="javascript::" class="action-icon" onclick="confirm_modal('<?php echo site_url('admin/categories/delete/'.$category['id']); ?>');"> <i class="mdi mdi-delete" style="font-size: 18px;"></i></a>
                            </span>
                            <span class="category-action" id = 'category-edit-btn-<?php echo $category['id']; ?>' style="float: right; display: none; height: 20px;">
                                <a href="<?php echo site_url('admin/category_form/edit_category/'.$category['id']); ?>" class="action-icon"> <i class="mdi mdi-pencil" style="font-size: 18px;"></i></a>
                            </span>
                        </li>
                     <?php endforeach; ?>
                 </ul>
             </div> <!-- end card-->
         </div>
</div>

<script type="text/javascript">
    $('.on-hover-action').mouseenter(function() {
        var id = this.id;
        $('#category-delete-btn-'+id).show();
        $('#category-edit-btn-'+id).show();
    });
    $('.on-hover-action').mouseleave(function() {
        var id = this.id;
        $('#category-delete-btn-'+id).hide();
        $('#category-edit-btn-'+id).hide();
    });
</script>

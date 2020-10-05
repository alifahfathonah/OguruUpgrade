<?php
	$user_details = $this->user_model->get_user($this->session->userdata('user_id'))->row_array();
?>
<section class="page-header-area">
    <div class="container-fluid">
        <div class="form-group text-left">
            <h4>Channel Saya</h4>
        </div>
        <div class="user-box menu-icon-box">
	        <div class="icon">
	            <a href="javascript::">
	                <?php
	                if (file_exists('uploads/user_image/'.$user_details['id'].'.jpg')): ?>
	                <img src="<?php echo base_url().'uploads/user_image/'.$user_details['id'].'.jpg';?>" alt="" class="img-fluid">
	            <?php else: ?>
	                <img src="<?php echo base_url().'uploads/user_image/placeholder.png';?>" alt="" class="img-fluid">
	            <?php endif; ?>
	        </a>
	    </div>
    </div>
</section>
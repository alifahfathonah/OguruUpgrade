<?php
    $payment_histories = $this->crud_model->get_instructor_wise_payment_history($this->session->userdata('user_id'));
    echo '<script type="text/javascript"> console.log("'.count($payment_histories).'")</script>';
?>

<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('instructor_revenue'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('instructor_revenue'); ?></h4>
                <div class="row justify-content-md-center">
                    <div class="col-xl-6">
                        <form class="form-inline" action="<?php echo site_url('user/pendapatan/filter_by_date_range') ?>" method="get">
                            <div class="col-xl-10">
                                <div class="form-group">
                                    <div id="reportrange" class="form-control" data-toggle="date-picker-range" data-target-display="#selectedValue"  data-cancel-class="btn-light" style="width: 100%;">
                                        <i class="mdi mdi-calendar"></i>&nbsp;
                                        <span id="selectedValue"><?php echo date("F d, Y" , $timestamp_start) . " - " . date("F d, Y" , $timestamp_end);?></span> <i class="mdi mdi-menu-down"></i>
                                    </div>
                                    <input id="date_range" type="hidden" name="date_range" value="<?php echo date("d F, Y" , $timestamp_start) . " - " . date("d F, Y" , $timestamp_end);?>">
                                </div>
                            </div>
                            <div class="col-xl-2">
                                <button type="submit" class="btn btn-info" id="submit-button" onclick="update_date_range();"> <?php echo get_phrase('filter');?></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive-sm mt-4">
                    <table class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th><?php echo get_phrase('enrolled_course'); ?></th>
                                <th><?php echo get_phrase('instructor_revenue'); ?></th>
                                <th><?php echo get_phrase('status'); ?></th>
                                <th><?php echo get_phrase('option'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($payment_histories as $payment):
                                if ($payment['transaction_status'] != 'failure') {
                                   $user_data = $this->db->get_where('users', array('id' => $payment['user_id']))->row_array();
                                    $course_data = $this->db->get_where('course', array('id' => $payment['id_course']))->row_array();
                                    echo '<script type="text/javascript"> console.log("'.$course_data['title'].'")</script>';
                                    $parent = 'Akademik';
                                    if($course_data['parent_id'] == 1){
                                        $parent = 'Vokasional';
                                    }
                                    ?>
                                    <tr class="gradeU">
                                        <td>
                                            <strong><a href="<?php echo site_url('home/'.$parent.'/'.slugify($course_data['title']).'/'.$course_data['id']); ?>" target="_blank"><?php echo ellipsis($course_data['title']); ?></a></strong><br>
                                            <small class="text-muted"><?php echo get_phrase('enrolment_date').': '.date('D, d-M-Y', $payment['date_added']); ?></small>
                                        </td>
                                        <td>
                                            <?php echo 'Rp. '.$payment['edukator_revenue'].',-'; ?><br>
                                            <small class="text-muted"><?php echo get_phrase('total_amount').': Rp. '.$payment['gross_amount'].',-'; ?></small>
                                        </td>
                                        <td style="text-align: center;">
                                            <?php if ($payment['transaction_status'] == 'pending'): ?>
                                                <div class="badge badge-danger"><?php echo get_phrase('pending'); ?></div>
                                            <?php elseif($payment['transaction_status'] == 'settlement'): ?>
                                                <div class="badge badge-success">Dibayar</div>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo site_url('user/faktur/'.$payment['id']); ?>" class="btn btn-outline-primary btn-rounded btn-sm"><i class="mdi mdi-printer-settings"></i></a>
                                        </td>
                                    </tr> 
                            <?php }
                        endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function update_date_range()
{
    var x = $("#selectedValue").html();
    $("#date_range").val(x);
}
</script>

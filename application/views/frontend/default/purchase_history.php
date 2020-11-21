<?php
    $this->db->where(array('id_pengirim' => $this->session->userdata('user_id'), 'transaction_status' => 'settlement'));
    $purchase_history = $this->db->get('payment_mid',$per_page, $this->uri->segment(3));
?>
<section class="page-header-area my-course-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-title"><?php echo get_phrase('purchase_history'); ?></h1>
                <ul>
                  <li><a href="<?php echo site_url('home/kelas_saya'); ?>"><?php echo get_phrase('all_courses'); ?></a></li>
                  <!-- <li><a href="<?php echo site_url('home/pesan'); ?>"><?php echo get_phrase('my_messages'); ?></a></li> -->
                  <li class="active"><a href="<?php echo site_url('home/riwayat_pembayaran'); ?>"><?php echo get_phrase('purchase_history'); ?></a></li>
                  <li><a href="<?php echo site_url('home/profil/profil_saya'); ?>"><?php echo get_phrase('user_profile'); ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="purchase-history-list-area">
    <div class="container">
        <div class="table-responsive rounded">
    <table class="table table-striped">
      <thead class="text-white bg-primary">
        <tr>
          <th><?php echo get_phrase('purchase_history');?></th>
          <th><?php echo get_phrase('date'); ?></th>
          <th><?php echo get_phrase('total_price'); ?></th>
          <th><?php echo get_phrase('payment_type'); ?> </th>
          <th>Order Id </th>
          
        </tr>
      </thead>
      <tbody>
        <?php if ($purchase_history->num_rows() > 0):
        foreach($purchase_history->result_array() as $each_purchase):
        $course_details = $this->crud_model->get_course_by_id($each_purchase['id_course'])->row_array();
        $parent = 'Akademik_';
        if($course_details['parent_category'] == '1'){
            $parent = 'Vokasional_';
        }
        ?>
        <tr class="bg-white">
          <td class="text-center">
                <img style="width: 130px; height: auto;" src="<?php echo $this->crud_model->get_course_thumbnail_url($each_purchase['id_course']);?>" class="img-fluid" >
                <h5>
                    <a href="<?php echo site_url('home/'.$parent.'/'.slugify($course_details['title']).'/'.$course_details['id']); ?>"><h5 class="m-3 font-weight-bold text-dark"><?php echo $course_details['title']; ?></h5></a>
                </h5>
                
          </td>
          <td><?php echo date_format(date_create($each_purchase['transaction_time']),"j F Y H:i");  ?></td>
          <td class="font-weight-bold "><?php echo currency($each_purchase['gross_amount']); ?></td>
          <td><?php echo ucfirst($each_purchase['payment_type']); ?></td>
          <td><?php echo ucfirst($each_purchase['order_id']); ?></td>
          
          
        </tr>

        
        <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center"><?php echo get_phrase('no_records_found'); ?></p>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
    </div>
<!-- </section>

        <section class="purchase-history-list-area">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <ul class="purchase-history-list">
                            <li class="purchase-history-list-header">
                                <div class="row">
                                    <div class="col-sm-6"><h4 class="purchase-history-list-title"> <?php echo get_phrase('purchase_history'); ?> </h4></div>
                                    <div class="col-sm-6 hidden-xxs hidden-xs">
                                        <div class="row">
                                            <div class="col-sm-3"> <?php echo get_phrase('date'); ?> </div>
                                            <div class="col-sm-3"> <?php echo get_phrase('total_price'); ?> </div>
                                            <div class="col-sm-4"> <?php echo get_phrase('payment_type'); ?> </div>
                                            <div class="col-sm-2"> Order Id </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php if ($purchase_history->num_rows() > 0):
                                foreach($purchase_history->result_array() as $each_purchase):
                                $course_details = $this->crud_model->get_course_by_id($each_purchase['id_course'])->row_array();
                                $parent = 'Akademik_';
                                if($course_details['parent_category'] == '1'){
                                    $parent = 'Vokasional_';
                                }
                                ?>
                                    <li class="purchase-history-items mb-2">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="purchase-history-course-img">
                                                    <img src="<?php echo $this->crud_model->get_course_thumbnail_url($each_purchase['id_course']);?>" class="img-fluid">
                                                </div>
                                                <a class="purchase-history-course-title" href="<?php echo site_url('home/'.$parent.'/'.slugify($course_details['title']).'/'.$course_details['id']); ?>" >
                                                    <?php
                                                        echo $course_details['title'];
                                                    ?>
                                                </a>
                                            </div>
                                            <div class="col-sm-6 purchase-history-detail">
                                                <div class="row">
                                                    <div class="col-sm-3 date">
                                                        <?php echo $each_purchase['transaction_time']; ?>
                                                    </div>
                                                    <div class="col-sm-3 price"><b>
                                                        Rp. <?php echo $each_purchase['gross_amount']; ?>
                                                    </b></div>
                                                    <div class="col-sm-4 payment-type">
                                                        <?php echo ucfirst($each_purchase['payment_type']); ?>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <?php echo ucfirst($each_purchase['order_id']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li>
                                    <div class="row" style="text-align: center;">
                                        <?php echo get_phrase('no_records_found'); ?>
                                    </div>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section> -->
        <nav>
            <?php echo $this->pagination->create_links(); ?>
        </nav>

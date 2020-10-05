    <section class="page-header-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-title">Notifikasi</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="notifications-list-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="list-wrapper">
                        <div class="notification-list">
                            <?php 
                                if(count($notifikasi) == 0){
                                    echo '<div class="container text-center">Tidak ada notifikasi</div><br><br>';
                                }else{
                             ?>
                            <ul>
                                <?php 
                                foreach ($notifikasi as $notif) {
                                    if($notif['tipe'] == 'message'){
                                        $data = $this->crud_model->get_message_notif($notif['id_target']);
                                        $jumlah = 0;
                                        $sender_id = '';
                                        foreach ($data as $d) {
                                            if($d['sender'] != $this->session->userdata('user_id')){
                                                $jumlah++;
                                                $sender_id = $d['sender'];
                                            }
                                         }
                                         
                                        $user_detail = $this->db->get_where('users', array('id' => $sender_id))->row_array();
                                        $go = 'home/pesan/baca_pesan/'.$notif['id_target'];
                                        if($jumlah > 0){
                                    ?>
                                        <li>
                                            <a href="<?php echo site_url($go); ?>">
                                                <div class="notification clearfix">
                                                    <div class="notification-details">
                                                        <p class="notification-text">
                                                            <b><?php echo $jumlah.' pesan baru dari '.$user_detail['first_name'].' '.$user_detail['last_name']; ?></b>
                                                        </p>
                                                        <p class="notification-time">
                                                            <?php echo date('D, d-M-Y', $notif['date_add']); ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                <?php    
                                        }
                                    }
                                    elseif ($notif['tipe'] == 'pembayaran') {
                                            $kls = $this->db->get_where('payment_mid', array('order_id' => $notif['id_target']))->result_array();
                                            if($kls[0]['transaction_status'] == 'pending'){
                                                $kls1 = $this->db->get_where('course', array('id' => $kls[0]['id_course']))->result_array();
                                        ?>

                                        <li>
                                            <a href="#" data-target="#wait" data-toggle="modal">
                                                <div class="notification clearfix">
                                                    <div class="notification-details">
                                                        <p class="notification-text">
                                                            <b>Menunggu pembayaran untuk kelas <?php echo $kls1[0]['title'] ?></b>
                                                        </p>
                                                        <p class="notification-time">
                                                            <?php echo date('D, d-M-Y', $notif['date_add']); ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                <?php
                                        }
                                    }
                                }
                                 ?>
                            </ul>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<div class="modal fade" id="wait" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Kelas</label>
                    <div class="form-control"><?php echo $kls1[0]['title']; ?></div>
                </div>
                <div class="form-group">
                    <label>Jumlah Tiket</label>
                    <div class="form-control">
                       <?php 
                            echo $this->db->get_where('sertifikat', array('order_id' => $kls[0]['order_id']))->num_rows();
                         ?>
                    </div>
                </div>
                <div class="form-group">
                    <a href="<?php echo $kls[0]['pdf_url'] ?>" target="_blank"><button class="btn btn-primary">Cara Pembayaran</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

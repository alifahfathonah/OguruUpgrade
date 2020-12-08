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
                                echo '<br><br><br><div class="container text-center">Tidak ada notifikasi</div><br><br><br><br><br><br>';
                            }else{
                         ?>
                        <ul>
                            <?php 
                            foreach ($notifikasi as $notif) {
                                ?>
                            <?php    
                                if($notif['tipe'] == 'pembayaran') {
                                    ?>
                                    <li>
                                        <a <?php echo $notif['link']; ?>>
                                            <div class="notification clearfix">
                                                <div class="notification-details">
                                                    <p class="notification-text">
                                                        <b><?php echo $notif['pesan']; ?></b>
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
                                elseif ($notif['tipe'] == 'edukator') { 
                                    if ($notif['id_target'] == 'terima') {
                                    ?>
                                    <li>
                                        <a href="<?php echo site_url().'home/update_notif_accept/'.$notif['id']; ?>">
                                            <div class="notification clearfix">
                                                <div class="notification-details">
                                                    <p class="notification-text">
                                                        <b>Selamat !!
                                                        akunmu disetujui admin Oguru, kamu sekarang seorang edukator.</b>
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
                                    else{ ?>
                                    <li>
                                        <a <?php echo $notif['link']; ?>>
                                            <div class="notification clearfix">
                                                <div class="notification-details">
                                                    <p class="notification-text">
                                                        <b>Mohon maaf !!
                                                        akunmu belum disetujui admin Oguru untuk menjadi edukator.</b>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Kelas</label>
                    <div id="nama_kelas" class="form-control"></div>
                </div>
                <div class="form-group">
                    <label>Jumlah Tiket</label>
                    <div id="jumlah_ticket" class="form-control">
                       
                    </div>
                </div>
                <div class="form-group">
                    <a id="cara_bayar" href="#" target="_blank"><button class="btn btn-primary">Cara Pembayaran</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tolak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pesan Penolakan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Pesan</label>
                    <div id="pesan_penolakan" class="form-control"></div>
                </div>
                <div class="form-group">
                    <a id="hapus_notif" href="#"><button class="btn btn-danger">Hapus</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#wait').on('show.bs.modal', function(e) {
        var kelas = $(e.relatedTarget).data('kelas');
        var jumlah = $(e.relatedTarget).data('jumlah');
        var link_pdf = $(e.relatedTarget).data('link_pdf');
        document.getElementById("jumlah_ticket").innerHTML = jumlah;
        document.getElementById("nama_kelas").innerHTML = kelas;
        $('#cara_bayar').attr('href', link_pdf);
    });

    $('#tolak').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        var pesan = $(e.relatedTarget).data('pesan');
        document.getElementById("pesan_penolakan").innerHTML = pesan;
        $('#hapus_notif').attr('href', '<?php echo site_url()."home/delete_notif/" ?>'+id);
    });
</script>
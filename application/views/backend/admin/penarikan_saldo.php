<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>Penarikan <?php echo get_phrase('saldo'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">Penarikan <?php echo get_phrase('saldo'); ?></h4>
                <div class="table-responsive-sm mt-4">
                    <table class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th><?php echo get_phrase('instructor'); ?></th>
                                <th>Jumlah</th>
                                <th>Bank</th>
                                <th>Rekening</th>
                                <th>Tanggal</th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($saldo as $i => $sl):
                                $user_data = $this->db->get_where('users', array('id' => $sl['id_user']))->row_array();?>
                                <tr class="gradeU">
                                    <td><?php echo $i+1; ?></td>
                                    <td><?php echo $user_data['first_name'].' '.$user_data['last_name']; ?></td>
                                    <td>
                                        <?php echo 'Rp. '.$sl['jumlah'].'.00'; ?><br>
                                    </td>
                                    <td>
                                        <?php echo $sl['bank']; ?><br>
                                    </td>
                                    <td>
                                        <?php echo $sl['no_rekening']; ?><br>
                                    </td>
                                    <td><?php echo date('D, d-M-Y', $sl['tanggal']); ?></td>
                                    <td><a href="#" onclick="confirm_modal('<?php echo site_url('admin/penarikan_saldo/'.$sl['id']); ?>');">Konfirmasi</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

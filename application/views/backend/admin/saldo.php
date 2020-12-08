<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('saldo'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('saldo'); ?></h4>
                <div class="table-responsive-sm mt-4">
                    <table class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th><?php echo get_phrase('instructor'); ?></th>
                                <th><?php echo get_phrase('saldo'); ?></th>
                                <th class="text-center"><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($saldo as $i => $sl):
                                $user_data = $this->db->get_where('users', array('id' => $sl['id_user']))->row_array();?>
                                <tr class="gradeU">
                                    <td><?php echo $i+1; ?></td>
                                    <td><?php echo $user_data['first_name'].' '.$user_data['last_name']; ?></td>
                                    <td>
                                        <?php echo 'Rp. '.$sl['saldo'].'.00'; ?><br>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

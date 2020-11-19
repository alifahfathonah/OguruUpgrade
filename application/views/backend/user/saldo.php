<?php 
    $saldo_history = $this->db->get_where('saldo_history', array('id_user' => $this->session->userdata('user_id')))->result_array();
 ?>

<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Saldo</h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> 
                    <i class="fa fa-wallet"></i> 
                    <span style="margin-left: 10px">Rp. <?php echo $saldo; ?>,-</span>
                </h4>
                <div class="text-right" style="margin-top: -35px;">
                    <a href="#tarik" data-target="#tarik" data-toggle="modal" class="btn btn-primary"><i class="fa fa-sign-out-alt" style="transform: rotate(90deg);"></i> Tarik Saldo</a>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">Riwayat Transaksi</h4>
                <div class="table-responsive-sm mt-4">
                    <table class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i = 0;
                                foreach ($saldo_history as $history) {
                                    $i = $i + 1;
                                    ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo date('D, d-M-Y', $history['tanggal']); ?></td>
                                    <td><?php echo 'Rp. '.$history['jumlah'].',-'; ?></td>
                                    <td>
                                        <?php 
                                            if($history['status'] == 0){
                                                echo "Diproses";
                                            }
                                            else{
                                                echo "Berhasil";
                                            } ?>
                                    </td>
                                </tr>
                            <?php
                                }
                             ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tarik" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tarik Saldo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form action="<?php echo site_url('user/saldo/tarik_saldo'); ?>" method="post">
                          <div class="content-box">
                              <div class="basic-group">
                                  <div class="form-group">
                                      <span>Saldo anda saat ini : <b>Rp. <?php echo $saldo; ?>,-</b></span>
                                  </div>
                                  <div class="form-group">
                                      <label for="bank"><span class="input-field-icon"></span> Bank :</label>
                                      <select class="form-control select2" name="bank">
                                          <option value="BRI">BRI</option>
                                          <option value="BTN">BTN</option>
                                          <option value="BCA">BCA</option>
                                          <option value="Mandiri">Mandiri</option>
                                      </select>
                                      <small class="form-text text-muted">Pilih bank anda.</small>
                                  </div>
                                  <div class="form-group">
                                      <label for="bank"><span class="input-field-icon"></span> No. Rekening :</label>
                                      <input class="form-control" type="number" name="norekening" required="">
                                      <small class="form-text text-muted">Masukkan nomor rekening anda.</small>
                                  </div>
                                      <label for="bank"><span class="input-field-icon"></span> Nominal penarikan :</label>
                                      <input class="form-control" type="number" name="nominal" min="1000" max="<?php echo $saldo; ?>" required>
                                      <small class="form-text text-muted">Minimal Rp. 1000,-.</small>
                              </div>
                          </div>
                          <div class="content-update-box text-center">
                              <button type="submit" class="btn btn-success">Ajukan</button>
                          </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



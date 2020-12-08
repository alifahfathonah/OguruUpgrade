<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                <a href="#" data-target="#upload" data-toggle="modal" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i>Tambah Ovidi</a>  
            </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
              <h4 class="mb-3 header-title">CHANNEL</h4>
              <div class="row">
                <div class="col-sm-7 mb-3 mt-4">
                    <h4 class="form-group"><?php echo $user_details['first_name'].' '.$user_details['last_name']; ?></h4>
                        <i><h6 class="form-group"><?php echo $jumlah_follower; ?> Pengikut</h6></i>
                        <h6 class="form-group"><?php echo $user_details['deskripsi_channel']; ?>  <a href="javascript::" data-target="#deskripsi" data-toggle="modal"><i class="fas fa-pencil-alt d-inline"> </i></a></h6>
                </div>
              </div>
              <div class="table-responsive-sm mt-4">
                <table id="basic-datatable" class="table table-striped table-centered mb-0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Channel</th>
                      <th>Deskripsi</th>
                      <th>Jumlah Ovidi</th>
                      <th>Ovidi Aktif</th>
                      <th>Ovidi Ditunda</th>
                      <th>Ovidi Dibatalkan</th>
                      <th><?php echo get_phrase('actions'); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                       foreach ($data as $key => $ovidi): 
                        $total = $this->db->get_where('video', array('id_user' => $ovidi->id_user))->num_rows();
                        $total_aktif = $this->db->get_where('video', array('id_user' => $ovidi->id_user, 'status' => 1))->num_rows();
                        $total_tunda = $this->db->get_where('video', array('id_user' => $ovidi->id_user, 'status' => 0))->num_rows();
                        $total_non = $this->db->get_where('video', array('id_user' => $ovidi->id_user, 'status' => -1))->num_rows();
                        ?>
                          <tr>
                              <td><?php echo $key+1; ?></td>
                              <td><?php echo $ovidi->first_name.' '.$ovidi->last_name; ?></td>
                              <td><?php echo $ovidi->deskripsi_channel; ?></td>
                              <td><?php echo $total; ?></td>
                              <td><?php echo $total_aktif; ?></td>
                              <td><?php echo $total_tunda; ?></td>
                              <td><?php echo $total_non; ?></td>
                              <td>
                                  <div class="dropright dropright">
                                    <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?php echo site_url('home/lihat_channel/'.$ovidi->id_user) ?>">Lihat</a></li>
                                    </ul>
                                </div>
                              </td>
                          </tr>
                      <?php endforeach; ?>
                  </tbody>
              </table>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="modal fade" id="deskripsi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Deskripsi Channel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form action="<?php echo site_url().'admin/ubah_deskripsi'; ?>" method="post" enctype="multipart/form-data">
                          <div class="content-box">
                              <div class="basic-group">
                                  <div class="form-group">
                                      <label for="nik"> Deskripsi :</label>
                                      <textarea class="form-control" name="deskripsi" required="" rows="5"><?php echo $user_details['deskripsi_channel']; ?></textarea>
                                  </div>   
                              </div>
                          </div>
                          <input type="hidden" name="select_kategori" value="<?php echo $selected_category ?>">
                          <div class="content-update-box text-center">
                              <button type="submit" class="btn btn-outline-primary">Submit</button>
                          </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Ovidi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form action="<?php echo site_url('admin/ovidi/add') ?>" method="post" enctype="multipart/form-data">
                          <div class="content-box">
                              <div class="basic-group">
                                <div class="form-group">
                                  <label for="bank"><span class="input-field-icon"></span> Kategori :</label>
                                  <select id="pilih_kategori" class="form-control" name="pilih_kategori">
                                    <option style="display: none;">Pilih kategori</option>
                                  <?php 
                                    $categories = $this->crud_model->get_categories(3)->result_array();
                                    foreach ($categories as $kat) { ?>
                                      <option value="<?php echo $kat['id'] ?>"><?php echo $kat['name'] ?></option>
                                <?php
                                    }
                                   ?>
                                  </select>
                                  <small class="form-text text-muted">Pilih kategori ovidi.</small>
                                </div>
                                <div class="form-group">
                                      <label for="judul_ovidi"> Judul :</label>
                                      <input id="judul_ovidi" type="text" name="judul_ovidi" required="" class="form-control">
                                  </div> 
                                  <div class="form-group">
                                      <label for="deskripsi_ovidi"> Deskripsi :</label>
                                      <textarea id="deskripsi_ovidi" class="form-control" name="deskripsi_ovidi" required="" rows="5"></textarea>
                                  </div> 
                                  <div class="form-group">
                                      <label for="judul_ovidi"> Link :</label>
                                      <input id="link_ovidi" type="text" name="link_ovidi" required="" class="form-control">
                                  </div> 
                              </div>
                          </div>
                          <input type="hidden" name="select_kategori" value="<?php echo $selected_category ?>">
                          <div class="content-update-box text-center">
                              <button type="submit" class="btn btn-outline-primary">Submit</button>
                          </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>

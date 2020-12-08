<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
            </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
              <h4 class="mb-3 header-title">List Edukator</h4>
              <div class="table-responsive-sm mt-4">
                <table id="basic-datatable" class="table table-striped table-centered mb-0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th><?php echo get_phrase('photo'); ?></th>
                      <th><?php echo get_phrase('name'); ?></th>
                      <th><?php echo get_phrase('email'); ?></th>
                      <th>NIK</th>
                      <th>Data</th>
                      <th><?php echo get_phrase('actions'); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                       foreach ($users->result_array() as $key => $user): ?>
                          <tr>
                              <td><?php echo $key+1; ?></td>
                              <td>
                                  <img src="<?php echo $this->user_model->get_user_image_url($user['id']);?>" alt="" height="50" width="50" class="img-fluid rounded-circle img-thumbnail">
                              </td>
                              <td><?php echo $user['first_name'].' '.$user['last_name']; ?></td>
                              <td><?php echo $user['email']; ?></td>
                              <td><?php echo $user['nik']; ?></td>
                              <td><a href="<?php echo base_url().'uploads/edukator_file/'.$user['ktp'] ?>" target="_blank">Lihat</a></td>
                              <td>
                                  <div class="dropright dropright">
                                    <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/users/delete/'.$user['id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                                        <li><a id="btn_konfir" href="#" data-target="#konfirmasi" data-toggle="modal" data-id="<?php echo $user['id']; ?>" class="dropdown-item">Konfirmasi</a></li>
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

<div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Edukator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form action="<?php echo site_url().'admin/konfirmasi_edukator/add' ?>" method="post">
                          <div class="content-box">
                              <div class="basic-group">
                                  <div class="form-group">
                                      <label for="pilih-konfirmasi"><span class="input-field-icon"><i class="fas fa-check"></i></span> Konfirmasi :</label>
                                      <select onchange="pilih(this.value)" class="form-control" name="konfir">
                                        <option value="terima">Terima</option>
                                        <option value="tolak">Tolak</option>
                                      </select>
                                  </div>
                                  <div class="form-group" id="pesan">
                                    <label for="pilih-konfirmasi"><span class="input-field-icon"><i class="fas fa-envelope"></i></span> Pesan :</label>
                                    <textarea class="form-control" rows="3" name="pesan">
                                    </textarea>
                                  </div>
                              </div>
                          </div>
                          <input id="id_user" type="hidden" name="id_user">
                          <div class="content-update-box text-center">
                              <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  $(document).on('click', '#btn_konfir', function(){
    var id = $(this).data('id');
    $('#id_user').attr('value', id);
  });
  
  $('#pesan').hide();

  function pilih(param) {
    if (param == 'terima') {
      $('#pesan').hide();
    }
    else{
     $('#pesan').show(); 
    }
  }
</script>
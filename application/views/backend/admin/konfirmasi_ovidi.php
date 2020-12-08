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
              <h4 class="mb-3 header-title">OVIDI</h4>
              <div class="table-responsive-sm mt-4">
                <table id="basic-datatable" class="table table-striped table-centered mb-0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Channel</th>
                      <th>Judul</th>
                      <th>Deskripsi</th>
                      <th>Kategori</th>
                      <th>Tanggal</th>
                      <th><?php echo get_phrase('actions'); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                       foreach ($data as $key => $ovidi): ?>
                          <tr>
                              <td><?php echo $key+1; ?></td>
                              <td><?php echo $ovidi->first_name.' '.$ovidi->last_name; ?></td>
                              <td><?php echo $ovidi->judul; ?></td>
                              <td><?php echo $ovidi->deskripsi; ?></td>
                              <td><?php echo $ovidi->name; ?></td>
                              <td><?php echo date('D, d-M-Y', $ovidi->date_added); ?></td>
                              <td>
                                  <div class="dropright dropright">
                                    <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?php echo site_url('admin/download_ovidi/'.$ovidi->id) ?>">Unduh</a></li>
                                        <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#konfirmasi" data-id="<?php echo $ovidi->id ?>">Konfirmasi</a></li>
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
                <h5 class="modal-title">Konfirmasi Ovidi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form action="<?php echo site_url().'admin/konfirmasi_ovidi/konfir'; ?>" method="post" enctype="multipart/form-data">
                          <div class="content-box">
                              <div class="basic-group">
                                  <div class="form-group">
                                      <label for="konfirmasi"> Konfirmasi :</label>
                                      <select onchange="klik(this.value)" class="form-control" name="konfirm">
                                        <option value="1">Terima</option>
                                        <option value="-1">Tolak</option>
                                      </select>
                                  </div>
                                  <div id="link" class="form-group">
                                    <label for="link"> Link Baru : </label>
                                    <input type="text" name="link" class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label for="pesan"> Pesan : </label>
                                      <textarea class="form-control" name="pesan">
                                      </textarea>
                                  </div>   
                              </div>
                          </div>
                          <input id="id" type="hidden" name="id">
                          <div class="content-update-box text-center">
                              <button type="submit" class="btn btn-outline-primary">Submit</button>
                          </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#konfirmasi').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        document.getElementById('id').value = id;
    });
  });

  function klik(argument) {
    if(argument == '1'){
      $('#link').show();
    }
    else{
     $('#link').hide(); 
    }
  }
</script>
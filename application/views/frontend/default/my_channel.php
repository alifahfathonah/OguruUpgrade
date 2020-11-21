<?php
	$user_details = $this->user_model->get_user($this->session->userdata('user_id'))->row_array();
?>
<section class="page-header-area">
    <div class="container-fluid">
      <div class="container-fluid">
        <h2 class="text-center mb-4"><b>Channel Saya</b></h2>
      </div>
      <div class="row">
        <div class="col-sm-2 text-center my-auto">
            <img src="<?php echo base_url().'uploads/user_image/'.$this->session->userdata('user_id').'.jpg';?>" alt="" width = "90">

        </div>
        <div class="col-sm-7 mb-3 mt-4">
            <h4 class="form-group"><?php echo $user_details['first_name'].' '.$user_details['last_name']; ?></h4>
                <i><h6 class="form-group"><?php echo $jumlah_follower; ?> Pengikut</h6></i>
                <h6 class="form-group"><?php echo $user_details['deskripsi_channel']; ?>  <a href="javascript::" data-target="#deskripsi" data-toggle="modal"><i class="fas fa-pencil-alt d-inline"> </i></a></h6>
        </div>

              <div id="unfollow" class="col-sm-3 text-center  my-auto " >
                <button data-target="#upload" data-toggle="modal" class="btn btn-primary"> Upload Ovidi </button>
              </div> 
        </div>

        <!-- <div class="form-group text-left">
            <h5>Channel Saya</h5>
        </div>
        <div class="container row" style="margin-left: 5%;">
        	<div class="col-md-2">
        		<div class="user-box">
        			 <img src="<?php echo base_url().'uploads/user_image/'.$this->session->userdata('user_id').'.jpg';?>" alt="" class="img-fluid">
        		</div>
        	</div>
        	<div class="col-md-7" style="margin-left: 20px;">
        		<h4 class="form-group"><?php echo $user_details['first_name'].' '.$user_details['last_name']; ?></h4>
        		<i><h6 class="form-group"><?php echo $jumlah_follower; ?> Pengikut</h6></i>
        		<h6 class="form-group"><?php echo $user_details['deskripsi_channel']; ?>  <a href="javascript::" data-target="#deskripsi" data-toggle="modal"><i class="fas fa-pencil-alt d-inline"> </i></a></h6>
        	</div>
        	<div class="col-md-2 text-center">
        		<div class="form-group"></div>
        		<button data-target="#upload" data-toggle="modal" class="btn btn-primary"> Upload Ovidi </button>
        	</div>
        </div>
    </div> -->
</section>

<section class="category-course-list-area">
    <div class="container">
        <div class="category-filter-box">
			<div class="row">
			    <div class="col-12">
			        <div class="card widget-inline">
			            <div class="card-body p-0">
			                <div class="row no-gutters">
			                	<div class="col">
		                            <div class="card shadow-none m-0">
		                                <div class="card-body text-center">
		                                    <h3><span>
		                                        <?php
		                                            echo $jumlah_semua;
		                                         ?>
		                                    </span></h3>
		                                    <p class="text-muted font-15 mb-0">Total Ovidi</p>
		                                </div>
		                            </div>
			                    </div>

			                    <div class="col">
		                            <div class="card shadow-none m-0">
		                                <div class="card-body text-center">
		                                    <h3><span>
		                                        <?php
		                                            echo $jumlah_aktif;
		                                         ?>
		                                    </span></h3>
		                                    <p class="text-muted font-15 mb-0">Ovidi Aktif</p>
		                                </div>
		                            </div>
			                    </div>

			                    <div class="col">
		                            <div class="card shadow-none m-0">
		                                <div class="card-body text-center">
		                                    <h3><span>
		                                        <?php
		                                            echo $jumlah_tunda;
		                                         ?>
		                                    </span></h3>
		                                    <p class="text-muted font-15 mb-0">Ovidi Ditunda</p>
		                                </div>
		                            </div>
			                    </div>

			                    <div class="col">
		                            <div class="card shadow-none m-0">
		                                <div class="card-body text-center">
		                                    <h3><span>
		                                        <?php
		                                            echo $jumlah_batal;
		                                         ?>
		                                    </span></h3>
		                                    <p class="text-muted font-15 mb-0">Ovidi Dibatalkan</p>
		                                </div>
		                            </div>
			                    </div>

			                </div> <!-- end row -->
			            </div>
			        </div> <!-- end card-box-->
			    </div> <!-- end col-->
			</div>            
        </div>  
        <div class="row">
            <div class="col-lg-3 filter-area">
                <div class="card">
                    <a href="javascript::"  style="color: unset;">
                        <div class="card-header filter-card-header" id="headingOne" data-toggle="collapse" data-target="#collapseFilter" aria-expanded="true" aria-controls="collapseFilter">
                            <h6 class="mb-0">
                                <?php echo get_phrase('filter'); ?>
                                <i class="fas fa-sliders-h" style="float: right;"></i>
                            </h6>
                        </div>
                    </a>
                    <div id="collapseFilter" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body pt-0">
                            <div class="filter_type">
                                <ul>
                                	<br>
                                    <li class="ml-2">
                                        <div class="">
                                            <input type="radio" id="category_all" name="kategori" class="categories custom-radio" value="aktif" onclick="filter(this)" <?php if($selected_category == 'aktif') echo 'checked'; ?>>
                                            <label for="category_all">Aktif</label>
                                        </div>
                                    </li>
                                    <li class="ml-2">
                                        <div class="">
                                            <input type="radio" id="sub_category1" name="kategori" class="categories custom-radio" value="tunda" onclick="filter(this)" <?php if($selected_category == "tunda") echo 'checked'; ?>>
                                            <label for="sub_category1">Ditunda</label>
                                        </div>
                                    </li>
                                    <li class="ml-2">
                                        <div class="">
                                            <input type="radio" id="sub_category2" name="kategori" class="categories custom-radio" value="batal" onclick="filter(this)" <?php if($selected_category == "batal") echo 'checked'; ?>>
                                            <label for="sub_category2">Dibatalkan</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="category-course-list">
                    <?php include 'list_video_channel.php'; ?>
                    <?php if (count($video) == 0): ?>
                        <?php echo get_phrase('no_result_found'); ?>
                    <?php endif; ?>
                </div>
                <nav>
                    <?php if ($selected_category_id == "all"){
                        echo $this->pagination->create_links();
                    }?>
                </nav>
            </div>
        </div>
    </div>
</section>

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
                    <form action="<?php echo site_url().'home/ubah_deskripsi'; ?>" method="post" enctype="multipart/form-data">
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
                              <button type="submit" class="btn">Submit</button>
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
                    <form id="upload_form" enctype="multipart/form-data">
                          <div class="content-box">
                              <div class="basic-group">
                              	<div class="form-group">
                                  <label for="bank"><span class="input-field-icon"></span> Bank :</label>
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
                                      <label for="file_ovidi"> File Video:</label>
                                      <input id="fileku" class="form-control" type="file" accept="video/*" name="file_ovidi">
                                  </div>  
                                  <div id="progres" class="form-group progress">
									  <div class="progress-bar" id="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:0%">
										<span id="status"></span>
									  </div>
								</div>  
                              </div>
                          </div>
                          <input type="hidden" name="select_kategori" value="<?php echo $selected_category ?>">
                          <div class="content-update-box text-center">
                              <button type="submit" class="btn" onclick="uploadFile()">Submit</button>
                          </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	$('#progres').hide();

    function get_url() {
        var urlPrefix   = "<?php echo site_url('home/channel?'); ?>";
        var urlSuffix = "";
        var slectedCategory = "";

        // Get selected category
        $('.categories:checked').each(function() {
            slectedCategory = $(this).attr('value');
        });

        urlSuffix = "kategori="+slectedCategory;
        var url = urlPrefix+urlSuffix;
        return url;
    }
    function filter() {
        var url = get_url();
        window.location.replace(url);
    }

    function uploadFile() {
    	$('#progres').show();
	    var file = document.getElementById("fileku").files[0];
	    var judul = document.getElementById("judul_ovidi").value;
	    var deskripsi = document.getElementById("deskripsi_ovidi").value;
	    var kategori = document.getElementById("pilih_kategori");
	    var select = kategori.options[kategori.selectedIndex].value;

	    var formdata = new FormData();
	    formdata.append("pilih_kategori", select);
	    formdata.append("deskripsi_ovidi", deskripsi);
	    formdata.append("judul_ovidi", judul);
	    formdata.append("file_ovidi", file);
	    var ajax = new XMLHttpRequest();
	    ajax.upload.addEventListener("progress", progressUpload, false);
	    ajax.open("POST", "<?php echo site_url('home/crud_ovidi/add');?>", true);
	    ajax.send(formdata);
	}

	function progressUpload(event){
		var url = "<?php echo site_url('home/channel?kategori='.$selected_category);?>";
	    var percent = (event.loaded / event.total) * 100;
	    document.getElementById("progress-bar").style.width = Math.round(percent)+'%';    
	    document.getElementById("status").innerHTML = Math.round(percent)+"% selesai";
		if(event.loaded==event.total){
			window.location.href = url;
		}
	}
</script>
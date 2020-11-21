<section class="page-header-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('home'); ?>"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#"><?php echo get_phrase('shopping_cart'); ?></a></li>
                    </ol>
                </nav>
                <h1 class="page-title"><?php echo get_phrase('shopping_cart'); ?></h1>
            </div>
        </div>
    </div>
</section>


<section class="cart-list-area">
    <div class="container">
        <div class="row" id = "cart_items_details">
            <div class="col-lg-9">
                <?php
                    $total_price  = $course_details['price'];
                    $instructor_details = $this->user_model->get_all_user($course_details['user_id'])->row_array();
                    $jumlah_sertif = 1;
                        ?>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <a href="<?php echo site_url('home/'.$parent.'_/'.slugify($course_details['title']).'/'.$course_details['id']); ?>">
                                <img src="<?php echo $this->crud_model->get_course_thumbnail_url($course_details['id']);?>" alt="" class="img-fluid">
                            </a>
                    </div>
                    <div class="col-md-4">
                        <a href="<?php echo site_url('home/'.$parent.'_/'.slugify($course_details['title']).'/'.$course_details['id']); ?>">
                                <h5 class="text-dark"><b><?php echo $course_details['title']; ?></b></h5>
                            </a>
                            <a href="<?php echo site_url('home/edukator_info/'.$instructor_details['id']); ?>">
                                <small class="text-secondary">
                                    <?php echo get_phrase('by'); ?>
                                    <span class="instructor-name"><?php echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?></span>,
                                </small>
                            </a>
                    </div>
                    <div class="col-md-3">
                        <a href="" class="text-right"><h5><b>
                                <?php if ($course_details['discount_flag'] == 1): ?>
                                    <div class="current-price">
                                        <?php
                                        $total_price += $course_details['discounted_price'];
                                        echo currency($course_details['discounted_price']);
                                        ?>
                                    </div>
                                    <div class="original-price">
                                        <?php
                                            echo 'Rp. '.$total_price.',-';
                                        ?>
                                    </div>
                                <?php else: ?>
                                    <div class="current-price">
                                        <?php
                                            echo 'Rp. '.$total_price.',-';
                                        ?>
                                    </div>
                                <?php endif; ?>
                                </b></h5>
                            </a>
                    </div>
                    <div class="col-md-2">
                        <div class="current-price">
                                <input class="form-control text-center" type="text" size="25" value="1" id="count">
                                <div class="form-control text-center">
                                    <input type="button" value="-" id="moins" onclick="minus()">
                                    <input type="button" value="+" id="plus" onclick="plus()">
                                </div>
                            </div>
                    </div>
                </div>
                
                <br>
                <form id="payment-form" method="post" action="<?=site_url()?>/snap/finish">
                    <div id="all_form_nama" class="in-cart-box">
                      <input type="hidden" name="result_type" id="result-type" value="">
                      <input type="hidden" name="result_data" id="result-data" value="">
                      <input type="hidden" name="id_course" id="id-course" value="<?php echo $course_details['id']; ?>">
                      <input type="hidden" name="id_pengirim" value="<?php echo $this->session->userdata('user_id'); ?>">
                      <input type="hidden" name="id_penerima" value="<?php echo $instructor_details['id']?>">
                      <input type="hidden" name="harga_asli" value="<?php echo $total_price; ?>">
                        <p>Nama Penerima Sertifikat</p>
                        <small class="form-text text-muted">Tulis nama lengkap penerima sertifikat untuk kelas ini.</small>
                        <div id="form_nama">
                            <div class="cart-course-wrapper">
                                <label>Nama Lengkap : </label>
                                <input class="form-control col-md-10" type="text" name="nama[]">
                            </div>
                        </div>
                        <div>
                        </div>
                    </div>
                </form>
                <!-- <div id="form_nama">
                    <div class="cart-course-wrapper">
                        <label>Nama Lengkap : </label>
                        <input class="form-control col-md-10" type="text" name="nama[]">
                    </div>
                </div> -->
            </div>
            <div class="col-lg-3">
                <div class="cart-sidebar">
                    <div class="total"><?php echo get_phrase('total'); ?>:</div>
                    <span id = "total_price_of_checking_out" hidden><?php echo $total_price; ?></span>
                    <div id="total_bayar" class="total-price">
                        <?php 
                            echo 'Rp. '.$total_price.',-'; ?>        
                    </div>
                    <!-- jika pembayaran sudah -->
                    <?php 
                        if($cart_cek == "true"){
                    ?>
                        <p id="wait"><b>Menunggu pembayaran</b></p>
                    <?php 
                        }
                        else{
                     ?>
                        <button type="button" class="btn btn-primary btn-block checkout-btn" onclick="handleCheckOut()"><?php echo get_phrase('checkout'); ?></button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client-yT5PnoIdnTpNlleH"></script> -->
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-8R1sjHXU1hMqPaWV"></script>
<script type="text/javascript">
    var total = parseInt("<?php echo $total_price; ?>");
    var total_1 = parseInt(total);
    var total_bayar = total_1;
    var countEl = document.getElementById("count");
    var i = 1;
    // console.log(total_bayar);

    function removeFromCartList(elem) {
        url1 = '<?php echo site_url('home/handleCartItems');?>';
        url2 = '<?php echo site_url('home/refreshWishList');?>';
        url3 = '<?php echo site_url('home/refreshShoppingCart');?>';
        $.ajax({
            url: url1,
            type : 'POST',
            data : {course_id : elem.id},
            success: function(response)
            {

                $('#cart_items').html(response);
                if ($(elem).hasClass('addedToCart')) {
                    $('.big-cart-button-'+elem.id).removeClass('addedToCart')
                    $('.big-cart-button-'+elem.id).text("<?php echo get_phrase('add_to_cart'); ?>");
                }else {
                    $('.big-cart-button-'+elem.id).addClass('addedToCart')
                    $('.big-cart-button-'+elem.id).text("<?php echo get_phrase('added_to_cart'); ?>");
                }

                $.ajax({
                    url: url2,
                    type : 'POST',
                    success: function(response)
                    {
                        $('#wishlist_items').html(response);
                    }
                });

                $.ajax({
                    url: url3,
                    type : 'POST',
                    success: function(response)
                    {
                        $('#cart_items_details').html(response);
                    }
                });
            }
        });
    }

    <?php 
        // $nama = $user_details['first_name'].'_'.$user_details['last_name'].'_'.$course_details['id'].'_'.$course_details['title'].'_'.substr($user_details['email'], 0,-10).'_'.$user_details['id'];
        $url = substr(current_url(), 26);
     ?>

    function handleCheckOut() {
        $.ajax({
            url: '<?php echo site_url('home/isLoggedIn');?>',
            success: function(response)
            {
                if (!response) {
                    $('#login').modal('show');
                }else {
                    event.preventDefault();
                    $(this).attr("disabled", "disabled");
                    $.ajax({
                        url: '<?php echo site_url()."/snap/token" ?>',
                        data: {
                            id_course : "<?php echo $course_details['id'] ?>",
                            first_name : "<?php echo $user_details['first_name'] ?>",
                            last_name : "<?php echo $user_details['last_name'] ?>",
                            judul_course : "<?php echo $course_details['title'] ?>",
                            email : "<?php echo $user_details['email'] ?>",
                            id_user : "<?php echo $user_details['id'] ?>",
                            total_bayar : total_bayar,
                            jumlah : countEl.value
                        },
                        cache: false,

                        success: function(data) {
                          //location = data;

                          // console.log('token = '+data);
                          
                          var resultType = document.getElementById('result-type');
                          var resultData = document.getElementById('result-data');

                          function changeResult(type,data){
                            $("#result-type").val(type);
                            $("#result-data").val(JSON.stringify(data));
                            //resultType.innerHTML = type;
                            //resultData.innerHTML = JSON.stringify(data);
                          }

                          snap.pay(data, {
                              onSuccess: function(result){
                                changeResult('success', result);
                                console.log(result.status_message);
                                console.log(result);
                                $("#payment-form").submit();
                              },
                              onPending: function(result){
                                changeResult('pending', result);
                                console.log(result.status_message);
                                $("#payment-form").submit();
                              },
                              onError: function(result){
                                changeResult('error', result);
                                console.log(result.status_message);
                                $("#payment-form").submit();
                              }
                            });
                        }
                      });
                }
            }
        });
    }

    function handleCartItems(elem) {
        url1 = '<?php echo site_url('home/handleCartItems');?>';
        url2 = '<?php echo site_url('home/refreshWishList');?>';
        url3 = '<?php echo site_url('home/refreshShoppingCart');?>';
        $.ajax({
            url: url1,
            type : 'POST',
            data : {course_id : elem.id},
            success: function(response)
            {
                $('#cart_items').html(response);
                if ($(elem).hasClass('addedToCart')) {
                    $('.big-cart-button-'+elem.id).removeClass('addedToCart')
                    $('.big-cart-button-'+elem.id).text("<?php echo get_phrase('add_to_cart'); ?>");
                }else {
                    $('.big-cart-button-'+elem.id).addClass('addedToCart')
                    $('.big-cart-button-'+elem.id).text("<?php echo get_phrase('added_to_cart'); ?>");
                }
                $.ajax({
                    url: url2,
                    type : 'POST',
                    success: function(response)
                    {
                        $('#wishlist_items').html(response);
                    }
                });

                $.ajax({
                    url: url3,
                    type : 'POST',
                    success: function(response)
                    {
                        $('#cart_items_details').html(response);
                    }
                });
            }
        });
    }

    var count = 1;
    var id_total = document.getElementById("total_bayar");
    var blank_nama = document.getElementById("form_nama");
    function plus(){
        count++;
        countEl.value = count;
        total_1 = total_1 + total ;
        id_total.innerHTML = 'Rp. ' + total_1 + ',-';
        var nw = document.createElement('div');
        nw.id = "form_nama"+i;
        nw.innerHTML = blank_nama.innerHTML;
        i++;
        document.getElementById('all_form_nama').appendChild(nw);
        total_bayar = total_1;
    }
    function minus(){
      if (count > 1) {
        count--;
        countEl.value = count;
        total_1 = total_1 - total ;
        id_total.innerHTML = 'Rp. ' + total_1 + ',-';
        var a = 'form_nama'+ (i-1);
        console.log(a);
        document.getElementById('all_form_nama').removeChild(document.getElementById(a));
        i--;
        total_bayar = total_1;
      }  
    }
</script>
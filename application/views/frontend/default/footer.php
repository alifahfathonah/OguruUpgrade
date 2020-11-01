<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3><?php echo get_settings('system_name')?></h3>
              <div class="pb-3">
                <?php echo get_settings('website_description') ?>
              </div>
              <div class="social-links mt-3">
                <a href="<?php echo get_settings('whatsapp_link') ?>"><i class="fab fa-whatsapp"></i></a>
                <a href="<?php echo get_settings('instagram_link') ?>"><i class="fab fa-instagram"></i></a>
                <a href="<?php echo get_settings('youtube_link') ?>"><i class="fab fa-youtube"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Tentang</h4>
            <ul>
              <li><i class="fas fa-chevron-right"></i> <a href="<?php echo site_url('home/tentang_kami') ?>"> Tentang Kami</a></li>
              <li><i class="fas fa-chevron-right"></i> <a href="<?php echo site_url('home/bantuan') ?>">Bantuan</a></li>
              <li><i class="fas fa-chevron-right"></i> <a href="<?php echo site_url('home/syarat_ketentuan') ?>">Syarat & Ketentuan</a></li>
              <li><i class="fas fa-chevron-right"></i> <a href="<?php echo site_url('home/kebijakan_privasi') ?>">Kebijakan Privasi</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Alamat</h4>
            <p>
              <strong><?php echo strtoupper(get_settings('system_name')) ?></strong>
              <br><?php echo nl2br(get_settings('address')) ?>
              <br>Email: <?php echo get_settings('system_email') ?>
              <br>Telepon: <?php echo get_settings('phone') ?>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span><?php echo get_settings('system_name')?></span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Developed by <a href="https://oguruindonesia.com/"><?php echo get_settings('system_name')?></a>
      </div>
    </div>
  </footer>

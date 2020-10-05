<div class="main-nav-wrap">
  <div class="mobile-overlay"></div>

  <ul class="mobile-main-nav">
    <div class="mobile-menu-helper-top"></div>

    <li class="has-children">
      <a href="">
        <i class="fas fa-th d-inline"></i>
        <span>Vokasional</span>
        <span class="has-sub-category"><i class="fas fa-angle-right"></i></span>
      </a>

      <ul class="category corner-triangle top-left is-hidden">
        <li class="go-back"><a href=""><i class="fas fa-angle-left"></i>Menu</a></li>

      <?php
      $categories = $this->crud_model->get_categories('1')->result_array();
      foreach ($categories as $key => $category):?>
      <li>
        <a href="<?php echo site_url('home/Vokasional?kategori='.$category['slug']); ?>">
          <span class="icon"><i class="<?php echo $category['font_awesome_class']; ?>"></i></span>
          <span><?php echo $category['name']; ?></span>
        </a>
    </li>
  <?php endforeach; ?>
  <li class="all-category-devided">
    <a href="<?php echo site_url('home/Vokasional'); ?>">
      <span class="icon"><i class="fa fa-align-justify"></i></span>
      <span>Semua Kelas</span>
    </a>
  </li>
</ul>
</li>

<div class="mobile-menu-helper-bottom"></div>
</ul>
</div>

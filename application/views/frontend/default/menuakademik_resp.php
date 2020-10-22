  <li class="nav-item dropdown dmenu mr-3">
    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
      <i class="fas fa-book d-inline mr-2"></i>
        <span>Akademik</span>
    </a>
    <div class="dropdown-menu sm-menu">
      <?php
      $categories = $this->crud_model->get_categories('2')->result_array();
      foreach ($categories as $key => $category):?>
        <a class="dropdown-item pt-1 pb-1" href="<?php echo site_url('home/akademik?kategori='.$category['slug']); ?>">
          <span class="icon text-center" style="display: inline-block;width: 20px"><i class="<?php echo $category['font_awesome_class']; ?> text-muted"  ></i></span>
          <span class="text-dark ml-3" style="font-size: 14px;"><?php echo $category['name']; ?></span>
        </a>
      <?php endforeach; ?> 
      <hr class="mt-1 mb-2">  
      <a class="dropdown-item pt-1 pb-1" href="<?php echo site_url('home/akademik'); ?>">
        <span class="icon text-center" style="display: inline-block;width: 20px"><i class="fa fa-align-justify text-muted"></i></span>
        <span class="text-dark ml-3" style="font-size: 14px;">Semua Kelas</span>
      </a>
    </div>
  </li>


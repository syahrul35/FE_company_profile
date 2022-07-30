<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="index.html" class="logo d-flex align-items-center">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <!-- <img src="assets/img/logo.png" alt=""> -->
      <h1><a href="<?php echo site_url('Beranda_c') ?>"><img src="<?php echo base_url('assets/'); ?>img/logo_h.png" style="margin: -10px -0px 0px 0px;" alt="Logo <?php echo $namaPerusahaan; ?>"></a></h1>
    </a>

    <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
    <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    <nav id="navbar" class="navbar">
      <ul>
        <li><a href="<?php echo site_url('Home') ?>"><?php echo get_phrase('Beranda') ?></a></li>
        <li><a href="<?php echo site_url('About-us') ?>"><?php echo get_phrase('Tentang Kami') ?></a></li>
        <li><a href="<?php echo site_url('Our-Products') ?>"><?php echo get_phrase('Produk Kami') ?></a></li>
        <li><a href="<?php echo site_url('Photo-Gallery') ?>"><?php echo get_phrase('Galeri Foto') ?></a></li>
        <li><a class="active" href="<?php echo site_url('Contacts') ?>"><?php echo get_phrase('Hubungi Kami') ?></a></li>
        <li class="dropdown">
          <a href="#" data-toggle="dropdown">
            <?php echo get_phrase('Pilih Bahasa'); ?>
            <img src="<?php echo base_url('assets/') ?>flag/id.png" class="px-2">&nbsp;<img src="<?php echo base_url('assets/') ?>flag/en.png">
            &nbsp;
            <i class="bi bi-chevron-down dropdown-indicator"></i>
          </a>
          <ul class="dropdown-menu dropdown-light-blue dropdown-caret">
            <?php
            $fields = $this->db->list_fields('language');
            foreach ($fields as $field) {
              if ($field == 'phrase_id' || $field == 'phrase') continue;
            ?>
              <li>
                <a href="<?php echo base_url(); ?>Multilanguage/select_language/<?php echo $field; ?>" style="color:black;">
                  <?php echo $field; ?>
                  <?php //selecting current language
                  if ($this->session->userdata('current_language') == $field) : ?>
                    <i class="icon-ok"></i>
                  <?php endif; ?>
                </a>
              </li>
            <?php
            }
            ?>
          </ul>
        </li>
      </ul>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs d-flex align-items-center" style="background-image: url(<?php echo base_url('assets/') ?>img/82fa28179db1f8b30c60786d1418f120.jpeg);">
  <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

    <h2><?php echo get_phrase('Kontak') ?></h2>
    <ol>
      <li><a href="<?php echo site_url('Home') ?>"><?php echo get_phrase('Beranda') ?></a></li>
      <li><?php echo get_phrase('Kontak') ?></li>
    </ol>

  </div>
</div><!-- End Breadcrumbs -->

<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <?php foreach ($kontak->result() as $result) : ?>

      <div class="row gy-4 posts-list">

        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12 contact">
            <div class="single-well-c">
              <a href="#">
                <h2 class="sec-head-c"><span><?php echo get_phrase('Hubungi Kami') ?></span></h2>
              </a>
              <p>
                <?php if ($this->session->userdata('current_language') == 'English') { ?>
                  <?php echo $result->deskripsi_kontak_us ?>
                <?php } else { ?>
                  <?php echo $result->deskripsi_kontak ?>
                <?php } ?>
              </p>
              <p>Email :
                <?php echo $result->email_kontak ?></p>
              <p><?php echo get_phrase('nomor') ?> :
                <?php echo $result->nomor_kontak ?>
              </p>
            </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12 mt-5 img-side">
            <?php echo $result->script_embed_code ?>
          </div>
        </div>
      </div><!-- End blog posts list -->
    <?php endforeach; ?>

  </div>
</section><!-- End Blog Section -->
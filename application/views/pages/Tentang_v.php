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
        <li><a href="<?php echo site_url('Home') ?>"><?php echo get_phrase('Beranda') ?></a></a></li>
        <li><a class="active" href="<?php echo site_url('About-us') ?>"><?php echo get_phrase('Tentang Kami') ?></a></li>
        <li><a href="<?php echo site_url('Our-Products') ?>"><?php echo get_phrase('Produk Kami') ?></a></li>
        <li><a href="<?php echo site_url('Photo-Gallery') ?>"><?php echo get_phrase('Galeri Foto') ?></a></li>
        <li><a href="<?php echo site_url('Contacts') ?>"><?php echo get_phrase('Hubungi Kami') ?></a></li>
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

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs d-flex align-items-center" style="background-image: url(<?php echo base_url('assets/') ?>img/82fa28179db1f8b30c60786d1418f120.jpeg);">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

      <h2><?php echo get_phrase('Tentang') ?></h2>
      <ol>
        <li><a href="<?php echo site_url('Home') ?>"><?php echo get_phrase('Beranda') ?></a></li>
        <li><?php echo get_phrase('Tentang') ?></li>
      </ol>

    </div>
  </div><!-- End Breadcrumbs -->

<main id="main">
  <!-- ======= Alt Services Section ======= -->
  <section id="alt-services" class="alt-services">
    <div class="container" data-aos="fade-up">
      <div class="section-headline text-center mb-4">
        <h2 style="text-decoration: underline;"><?php echo get_phrase('Tentang Kami') ?></h2>
      </div>
      <?php foreach ($tentang->result() as $result) : ?>
        <div class="row justify-content-around gy-4 mt-4">
          <div class="col-lg-6 img-bg">
            <a href="#">
              <img src="<?php echo base_url('assets/'); ?>img/<?php echo $result->foto_tentang ?>" style="width: 400px; margin-top:50px;" alt="<?php echo $namaPerusahaan; ?>">
            </a>
          </div>
          <div class="col-lg-5 d-flex flex-column justify-content-center">
            <div class="well-middle">
              <div class="single-well">
                <a href="#">
                  <h2 class="sec-head"><span><?php echo $result->nama_tentang ?></span></h2><br><br>
                </a>
                <p class="justify-content-center">
                  <?php if ($this->session->userdata('current_language') == 'English') { ?>
                    <?php echo $result->deskripsi_tentang_en ?>
                  <?php } else { ?>
                    <?php echo $result->deskripsi_tentang ?>
                  <?php } ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>

  </section><!-- End Alt Services Section -->

</main><!-- End #main -->
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
        <li><a class="active" href="<?php echo site_url('Our-Products') ?>"><?php echo get_phrase('Produk Kami') ?></a></li>
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
                <a href="<?php echo base_url(); ?>Multilanguage/select_language/<?php echo $field; ?>" style="color: wheat; font-weight: 400;">
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

    <h2><?php echo get_phrase('Produk Detail') ?></h2>
    <ol>
      <li><a href="<?php echo site_url('Home') ?>"><?php echo get_phrase('Beranda') ?></a></li>
      <li><a href="<?php echo site_url('Layanan_c') ?>"><?php echo get_phrase('Produk Kami') ?></a></li>
      <li><?php echo get_phrase('Produk Detail') ?></li>
    </ol>

  </div>
</div><!-- End Breadcrumbs -->

<main id="main">
  <!-- ======= Alt Services Section ======= -->
  <section id="alt-services" class="alt-services">
    <div class="container" data-aos="fade-up">
      <div class="section-headline text-center mb-4">
        <h2 style="text-decoration: underline; text-transform: uppercase;"><?php echo str_replace('-', ' ', $nama) ?></h2>
      </div>

      <div class="row justify-content-around gy-4 mt-4">
        <div class="col-lg-6 img-bg" style="min-height: 0;">
          <a href="<?php echo base_url('assets/'); ?>img/<?php echo $detail->foto_layanan ?>" class="glightbox preview-link">
            <img src="<?php echo base_url('assets/'); ?>img/<?php echo $detail->foto_layanan ?>" style="width: 70%; margin-top:3em; border-radius: 30px;" alt="<?php echo $namaPerusahaan; ?>">
          </a>
        </div>
        <div class="col-lg-5 d-flex flex-column justify-content-center" style="border: 2px wheat solid; border-radius: 30px; width: 80%;">
          <div class="well-middle m-auto" style="text-align: justify; width: 80%; padding: 20px;">
            <div class="single-well">
              <a href="#">
              </a>
              <p text-align="justify p-3">
                <?php if ($this->session->userdata('current_language') == 'English') { ?>
                  <?php echo $detail->deskripsi_layanan_en ?>
                <?php } else { ?>
                  <?php echo $detail->deskripsi_layanan ?>
                <?php } ?>
              </p>
            </div>
          </div>
        </div>
      </div>


    </div>

  </section><!-- End Alt Services Section -->
</main><!-- End #main -->
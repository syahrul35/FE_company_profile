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
        <li><a class="active" href="<?php echo site_url('Home') ?>"><?php echo get_phrase('Beranda') ?></a></li>
        <li><a href="<?php echo site_url('About-us') ?>"><?php echo get_phrase('Tentang Kami') ?></a></li>
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

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero">
  <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

    <?php foreach ($slider->result() as $result) : ?>
      <div class="carousel-item active" style="background-image: url(<?php echo base_url('assets/') ?>img/<?php echo $result->foto_slider ?>)"></div>
    <?php endforeach; ?>

    <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
    </a>

    <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
    </a>

  </div>

</section><!-- End Hero Section -->

<main id="main">

  <!-- ======= Alt Services Section ======= -->
  <section id="alt-services" class="alt-services">
    <div class="container" data-aos="fade-up">
      <div class="section-headline text-center mb-4">
        <h2 style="text-decoration: underline; text-transform: uppercase;"><?php echo get_phrase('Tentang Kami') ?></h2>
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
                    <?php echo substr($result->deskripsi_tentang_en, 0, 1000) . '...' ?>
                  <?php } else { ?>
                    <?php echo substr($result->deskripsi_tentang, 0, 1000) . '...' ?>
                  <?php } ?>
                </p>
              </div>
              <a href="<?php echo site_url('About-us') ?>" class="btn btn-warning"><?php echo get_phrase('selengkapnya') ?></a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>

  </section><!-- End Alt Services Section -->

  <!-- ======= Our Projects Section ======= -->
  <section id="projects" class="projects">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <div class="section-headline text-center">
          <h2 style="text-decoration: underline;"><span><?php echo get_phrase('Galeri Foto') ?></span></h2>
        </div>
      </div>

      <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">

        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
          <?php $a = 0;
          $b = 3;
          foreach ($galeri->result() as $result) {
            $a++;
            if ($a <= $b) { ?>
              <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
                <div class="portfolio-content h-100">
                  <a href="<?php echo base_url('assets/'); ?>img/<?php echo $result->foto_galeri ?>" class="glightbox preview-link">
                    <img src="<?php echo base_url('assets/'); ?>img/<?php echo $result->foto_galeri ?>" style="border-radius: 30px;" alt="<?php echo $namaPerusahaan; ?>" class="img-fluid shadow p-3 mb-5 bg-body rounded" alt="">
                  </a>
                </div>
              </div>
          <?php }
          } ?>
          <!-- End Projects Item -->

        </div><!-- End Projects Container -->

      </div>

    </div>
  </section><!-- End Our Projects Section -->

</main><!-- End #main -->
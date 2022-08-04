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
        <li><a class="active" href="<?php echo site_url('Photo-Gallery') ?>"><?php echo get_phrase('Galeri Foto') ?></a></li>
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

    <h2><?php echo get_phrase('Galeri Foto') ?></h2>
    <ol>
      <li><a href="<?php echo site_url('Home') ?>"><?php echo get_phrase('Beranda') ?></a></li>
      <li><?php echo get_phrase('Galeri Foto') ?></li>
    </ol>

  </div>
</div><!-- End Breadcrumbs -->

<!-- ======= Our Projects Section ======= -->
<section id="projects" class="projects">
  <div class="section-headline text-center mb-4">
    <h2 style="text-decoration: underline; text-transform: uppercase;"><?php echo get_phrase('Galeri Foto') ?></h2>
  </div>

  <?php foreach ($album as $a) : ?>

    <div class="about-area area-padding-3 mb-4 mt-4">
      <div class="container">
        <div class="row wow fadeInDown mb-4">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-left mb-2" style="text-decoration: underline;">
              <?php if ($this->session->userdata('current_language') == 'English') { ?>
                <h3><?php echo $a['nama_album_en']; ?></h3>
              <?php } else { ?>
                <h3><?php echo $a['nama_album']; ?></h3>
              <?php } ?>
            </div>
          </div>
        </div>


        <?php foreach ($galeri->getPhotoByAlbum($a['id_album'])->result() as $result) : ?>

          <div class="container mb-4 mt-4" data-aos="fade-up">

            <div class="row gy-4 portfolio-container justify-content-around" data-aos="fade-up" data-aos-delay="200">

              <div class="col-lg-4 portfolio-item filter-remodeling m-auto mb-2 mt-4">
                <div class="portfolio-content h-100">
                  <a href="<?php echo base_url('assets/'); ?>img/<?php echo $result->foto_galeri ?>" class="glightbox preview-link">
                    <img src="<?php echo base_url('assets/'); ?>img/<?php echo $result->foto_galeri ?>" class="img-fluid" alt="" style="border-radius: 30px;">
                  </a>
                </div>
              </div><!-- End Projects Item -->

            </div>
          </div>
        <?php endforeach; ?>

        <div class="see-more text-center col-12">
          <?php if ($this->session->userdata('current_language') == 'English') { ?>
            <a href="<?php echo site_url('Photo-Gallery/' . str_replace(' ', '-', $a['nama_album_en'])) ?>" class="btn btn-warning"><?php echo get_phrase('Lihat Selengkapnya') ?></a>
          <?php } else { ?>
            <a href="<?php echo site_url('Photo-Gallery/' . str_replace(' ', '-', $a['nama_album'])) ?>" class="btn btn-warning"><?php echo get_phrase('Lihat Selengkapnya') ?></a>
          <?php } ?>
        </div>
      </div>
    </div>

  <?php endforeach; ?>

</section><!-- End Our Projects Section -->

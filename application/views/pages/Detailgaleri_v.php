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

		<h2><?php echo $judul; ?></h2>
		<ol>
			<li><a href="<?php echo site_url('Beranda_c') ?>"><?php echo get_phrase('Beranda') ?></a></li>
			<li><a href="<?php echo site_url('Galeri_c') ?>"><?php echo get_phrase('Galeri Foto') ?></a></li>
			<li><?php echo $judul ?></li>
		</ol>

	</div>
</div><!-- End Breadcrumbs -->

<main>
	<!-- ======= Our Projects Section ======= -->
	<section id="projects" class="projects">
		<div class="container" data-aos="fade-up">

			<div class="section-header">
				<div class="section-headline text-center">
					<h2 style="text-decoration: underline; text-transform: uppercase;"><span><?php echo $judul; ?></span></h2>
				</div>
			</div>

			<div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">

				<div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
					<?php
					foreach ($galeri->result() as $result) : ?>
						<div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
							<div class="portfolio-content h-100">
								<a href="<?php echo base_url('assets/'); ?>img/<?php echo $result->foto_galeri ?>" class="glightbox preview-link">
									<img src="<?php echo base_url('assets/'); ?>img/<?php echo $result->foto_galeri ?>" class="img-fluid" alt="" style="border-radius: 30px;">
								</a>
							</div>
						</div>
					<?php endforeach; ?>
					<!-- End Projects Item -->

				</div><!-- End Projects Container -->

			</div>

		</div>
	</section><!-- End Our Projects Section -->
</main>
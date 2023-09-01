<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}

include 'functions.php';

$id = $_GET["id"];
$datamember = query("SELECT * FROM tbl_member WHERE id = $id")[0];

if ( isset($_POST["submit"]) ) {
	if ( edit($_POST) > 0 ) {
    $_SESSION["alertSuccess"] = "Data berhasil diupdate!";
		header("location: nav_member.php");
	
	} else {
    $_SESSION["alertError"] = "Data gagal diupdate!";
		header("location: nav_member.php");
	}
}

?>


<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Zy Website</title>
    <script defer data-api="/stats/api/event" data-domain="preview.tabler.io" src="/stats/js/script.js"></script>
    <meta name="msapplication-TileColor" content=""/>
    <meta name="theme-color" content=""/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="mobile-web-app-capable" content="yes"/>
    <meta name="HandheldFriendly" content="True"/>
    <meta name="MobileOptimized" content="320"/>
    <link rel="icon" href="static/logo/ZyLogo2.png" type="image/x-icon"/>
    <link rel="shortcut icon" href="static/logo/ZyLogo2.png" type="image/x-icon"/>
    <meta name="description" content="Tabler comes with tons of well-designed components and features. Start your adventure with Tabler and make your dashboard great again. For free!"/>
    <meta name="canonical" content="https://preview.tabler.io/layout-navbar-overlap.html">
    <meta name="twitter:image:src" content="https://preview.tabler.io/static/og.png">
    <meta name="twitter:site" content="@tabler_ui">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Tabler: Premium and Open Source dashboard template with responsive and high quality UI.">
    <meta name="twitter:description" content="Tabler comes with tons of well-designed components and features. Start your adventure with Tabler and make your dashboard great again. For free!">
    <meta property="og:image" content="https://preview.tabler.io/static/og.png">
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="640">
    <meta property="og:site_name" content="Tabler">
    <meta property="og:type" content="object">
    <meta property="og:title" content="Tabler: Premium and Open Source dashboard template with responsive and high quality UI.">
    <meta property="og:url" content="https://preview.tabler.io/static/og.png">
    <meta property="og:description" content="Tabler comes with tons of well-designed components and features. Start your adventure with Tabler and make your dashboard great again. For free!">
    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css?1685973381" rel="stylesheet"/>
    <link href="./dist/css/tabler-flags.min.css?1685973381" rel="stylesheet"/>
    <link href="./dist/css/tabler-payments.min.css?1685973381" rel="stylesheet"/>
    <link href="./dist/css/tabler-vendors.min.css?1685973381" rel="stylesheet"/>
    <link href="./dist/css/demo.min.css?1685973381" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
      .mem_gambar {
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      }
    </style>

  <!-- Jquery Fancybox -->
    <script src="dist/libs/fancybox/jquery.js"></script>
    <link rel="stylesheet" href="dist/libs/fancybox/jquery.fancybox.css?v=2.1.0" media="screen">
    <script src="dist/libs/fancybox/jquery.fancybox.pack.js?v=2.1.0"></script>
    <script>
      $(document).ready(function() {
            $('.fancybox').fancybox();
      });
    </script>

  </head>
  <body >
    <script src="./dist/js/demo-theme.min.js?1685973381"></script>
    
    <div class="page">
      <!-- Navbar -->
      <header class="navbar navbar-expand-md navbar-overlap d-print-none"  data-bs-theme="dark">
        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="." class="text-decoration-none">
            <img src="./static/logo/ZyLogo2.png" alt="" width="50" class="pe-1">
              ZyGroup
            </a>
          </h1>
          <div class="navbar-nav flex-row order-md-last">
            <div class="d-none d-md-flex mx-3">
              <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip"
		   data-bs-placement="bottom">
                <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>
              </a>
              <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip"
		   data-bs-placement="bottom">
                <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>
              </a>
            </div>

            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
                <div class="d-none d-xl-block ps-2">
                  <div>Dhiya</div>
                  <div class="mt-1 small text-secondary">Tim IT</div>
                </div>
              </a>

              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow" data-bs-theme="light">
                <div class="position-relative mb-5 pt-4">
                  <span class="avatar avatar-lg rounded-circle position-absolute top-100 start-50 translate-middle mt-5 border border-dark border-3" style="background-image: url(./static/avatars/000m.jpg)"></span>
                </div>
                <div class="pt-5">
                  <p class="text-center pt-4"> Dhiya <br> <small>Tim IT</small> </p>
                  <div class="dropdown-divider m-3"></div>
                  <div class="d-flex">
                    <a href="#" class="text-reset px-5 pb-3 bd-highlight">Settings</a> |
                    <a href="logout.php" class="text-reset px-5 pb-3 bd-highlight ">Logout</a>
                  </div>
                  </div>
              </div>
            </div>
          </div>

          <!-- ====================================================================== NAVBAR ====================================================================== -->

          <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center justify-content-center">
              <ul class="navbar-nav">

              <!-- Home -->
                <li class="nav-item">
                  <a class="nav-link" href="./" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Home
                    </span>
                  </a>
                </li>

                <!-- Member -->
                <li class="nav-item active">
                  <a class="nav-link" href=". ">
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="white" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                      <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                      <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                      <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                    </svg>
                    </span>
                    <span class="nav-link-title text-light">
                      Members
                    </span>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="./" >
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-blogger me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M8 21h8a5 5 0 0 0 5 -5v-3a3 3 0 0 0 -3 -3h-1v-2a5 5 0 0 0 -5 -5h-4a5 5 0 0 0 -5 5v8a5 5 0 0 0 5 5z"></path>
                    <path d="M7 7m0 1.5a1.5 1.5 0 0 1 1.5 -1.5h3a1.5 1.5 0 0 1 1.5 1.5v0a1.5 1.5 0 0 1 -1.5 1.5h-3a1.5 1.5 0 0 1 -1.5 -1.5z"></path>
                    <path d="M7 14m0 1.5a1.5 1.5 0 0 1 1.5 -1.5h7a1.5 1.5 0 0 1 1.5 1.5v0a1.5 1.5 0 0 1 -1.5 1.5h-7a1.5 1.5 0 0 1 -1.5 -1.5z"></path>
                  </svg>
                    <span class="nav-link-title">
                      Blog
                    </span>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="./" >
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M15 8h.01"></path>
                      <path d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z"></path>
                      <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5"></path>
                      <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3"></path>
                    </svg>
                    <span class="nav-link-title">
                      Galery
                    </span>
                  </a>
                </li>

              </ul>
            </div>
          </div>
        </div>
      </header>
      <div class="page-wrapper">

<!-- ============================================================================================================================================ -->

        <!-- Page header -->
        <div class="page-header d-print-none text-white">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                  Zy Members
                </div>
                <h2 class="page-title">
                  Edit Data Member ZyGroup
                </h2>
              </div>
            </div>
          </div>
        </div>

<!-- ============================================================================================================================================ -->
        
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">

              <div class="col-12">
                <div class="card">
					<div class="card-header">
						<h3 class="card-title">Edit Member</h3>
					</div>

	  			<form action="" method="post" enctype="multipart/form-data">

					<div class="p-5 pt-3 pb-3">
						<div class="modal-body">
						<div class="mb-3">
						
            <input type="hidden" name="id" value="<?= $datamember["id"]; ?>">
            <input type="hidden" name="gambarLama" value="<?= $datamember["gambar"]; ?>">
            <input type="hidden" name="update_sekarang" value="<?= date("Y-m-d") ?>">

						<!-- Nama -->
						<label for="nama" class="form-label">Name</label>
						<input id="nama" type="text" class="form-control " placeholder="Your name" name="nama" required
            value="<?= $datamember["nama"]; ?>">

						</div>
					
						<div class="row">
						<div class="col-lg-9">
							<div class="mb-3">
							
							<!-- No Telepon -->
							<label for="telp" class="form-label">No Telepon</label>
							<input id="telp" type="tel" class="form-control" placeholder="Isi nomor telepon" name="telp" required
              value="<?= $datamember["telp"]; ?>"
              pattern="(\+62|62|0)8[1-9][0-9]{6,9}$">

							</div>
						</div>

						<div class="col-lg-3">
							<div class="mb-3">
							
							<!-- Jenis Kelamin -->
              <div class="form-label pb-2">Jenis Kelamin</div>
              <div>
                <label class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-Laki" 
                  <?php if ($datamember["jenis_kelamin"] == 'Laki-Laki' ) { echo 'checked'; } ?> >
                  <span class="form-check-label">Laki-Laki</span>
                </label>

                <label class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan"
                  <?php if ($datamember["jenis_kelamin"] == 'Perempuan' ) { echo 'checked'; } ?> >
                  <span class="form-check-label">Perempuan</span>
                </label>
              </div>              
							</div>
              
						</div>
						</div>

						<div class="row">
						<div class="col-lg-6">
							<div class="mb-3">
							
							<!-- Kota -->
							<label for="kota" class="form-label">Kota</label>
							<input id="kota" type="text" class="form-control" placeholder="Masukkan kota" name="kota" required
              value="<?= $datamember["kota"]; ?>" >

							</div>
						</div>
						<div class="col-lg-6">
							<div class="mb-3">

							<!-- Tanggal Lahir -->
							<label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
							<input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir" required
              value="<?= $datamember["tanggal_lahir"]; ?>" >

							</div>
						</div>
						</div>

						<div class="row">
              <div class="col-1">
                <img id="v_gambar" src="dist/img/upload/<?php echo $datamember["gambar"]; ?>" width="100" height="100" class="img-fluid img-thumbnail mem_gambar">
              </div>
							<div class="col-lg-7">
								<div class="mb-3">

								<!-- Gambar -->
								<label for="gambar" class="form-label">Gambar</label>
								<input id="gambar" type="file" class="form-control" name="gambar">

                <?php if ( isset($_SESSION["messageError"]) ) : ?>
                  <div class="gambar_error text-warning"><?= $_SESSION["messageError"]; ?></div>
                <?php session_destroy(); endif; ?>	

								</div>
							</div>
							<div class="col-lg-4">
								<div class="mb-3">

								<!-- Jabatan -->
								<label for="jabatan" class="form-label">Jabatan</label>
								<input id="jabatan" type="text" class="form-control" name="jabatan" required
                value="<?= $datamember["jabatan"]; ?>" >

								</div>
							</div>
						</div>


						<div class="modal-footer">

							<a href="nav_member.php" class="btn btn-link link-secondary text-decoration-none mx-3">
							Cancel
							</a>

							<button type="submit" name="submit" class="btn btn-primary">
							<!-- Download SVG icon from http://tabler-icons.io/i/plus -->
							<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
							<path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
							<path d="M16 19h6"></path>
							<path d="M19 16v6"></path>
							<path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path>
							</svg>
							Save
							</button>

						</div>
					</div>

					</form>

					</div>
                </div>
              </div>
            </div>
          </div>
        </div>

<!-- ============================================================================================================================================ -->

        <footer class="footer footer-transparent d-print-none">
          <div class="container-xl">
            <div class="row text-center align-items-center">
              <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                    &copy; 2023 ZyGroup. All rights reserved. Design by
                    <a href="https://www.instagram.com/mel_elaaa/" class="link-secondary text-primary" target="_blank">@Camela Devs</a>.
                  </li>
                  <li class="list-inline-item">
                      v1.0.0-beta
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>

<!-- ============================================================================================================================================ -->
    
    <!-- Libs JS -->
    <script src="./dist/libs/apexcharts/dist/apexcharts.min.js?1685973381" defer></script>
    <script src="./dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1685973381" defer></script>
    <script src="./dist/libs/jsvectormap/dist/maps/world.js?1685973381" defer></script>
    <script src="./dist/libs/jsvectormap/dist/maps/world-merc.js?1685973381" defer></script>
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js?1685973381" defer></script>
    <script src="./dist/js/demo.min.js?1685973381" defer></script>

    <script>
      // Input gambar nongol gambarnya
      const image = document.querySelector("#v_gambar"),
      input = document.querySelector("#gambar");

      input.addEventListener("change", () => {
        image.src = URL.createObjectURL(input.files[0]);
      });
    </script>
  </body>
</html>
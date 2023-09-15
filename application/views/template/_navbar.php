<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
       
    <span class="ri-book-mark-line">Kas Buku</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-lg-inline-flex" ><?= $user['nama']; ?></span>
            <i class="ri-arrow-down-s-fill" style="margin-right:0.5rem;"></i>
            <img src="<?= base_url('assets/NiceAdmin/profile/') . $user['image']; ?>" alt="Profile" class="rounded-circle">
          </a><!-- End Profile Iamge Icon -->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
            <div class="position-relative">
                            <img class="rounded-circle" src="<?= base_url('assets/NiceAdmin/profile/') . $user['image']; ?>" alt="" style="width:8rem;">
        				</a>
						</div>
             <h6><?= $user['nama']; ?></h6>
              <span><?= $this->session->userdata('level'); ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?= base_url('profile'); ?>">
                <i class="ri-contacts-line"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
            <a class="dropdown-item d-flex align-items-center" href="<?= base_url('assets/NiceAdmin/profile/') . $user['image']; ?>" class="fancybox" data-fancybox="gallery1">
            <i class="ri-gallery-fill"></i>
                <span>Lihat Foto</span>      
        				</a>
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center bg-danger text-white "  href="<?= base_url('auth/logout'); ?>">
                <i class="ri-door-open-line "></i>
                <span>Log Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
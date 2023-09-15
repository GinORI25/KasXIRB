<?php
	$menu = $this->uri->segment(1);
	?>
	
  
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item ">
        <a class="nav-link collapsed" href="<?= base_url('Dashboard'); ?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-success collapsed" href="<?= base_url('Pemasukan'); ?>">
          <i class="ri-arrow-up-circle-line"></i>
          <span>Pemasukan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger collapsed" href="<?= base_url('pengeluaran'); ?>">
          <i class="ri-arrow-down-circle-line"></i>
          <span>Pengeluaran</span>
        </a>
      </li>
      <?php if ($this->session->userdata('level')=='Admin'){ ?>
						<a href="<?= base_url('User'); ?>" class="nav-item nav-link text-dark collapsed <?php if($menu=='User'){echo'active'; } ?>"><i class="ri-contacts-line"></i>User
					</a>
					<?php } ?>
      <!-- End Dashboard Nav -->

      <li class="nav-heading">Data</li>
<hr>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('profile'); ?>">
          <i class="ri-account-pin-circle-line"></i>
          <span>Profile</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link collapsed " href="<?= base_url('auth/logout'); ?>">
          <i class="ri-door-open-line text-danger "></i>
          <span>Log out</span>
        </a>
      </li>
    <!-- End Profile Page Nav -->
</ul>

  </footer><!-- End Footer -->
  </aside><!-- End Sidebar-->
  
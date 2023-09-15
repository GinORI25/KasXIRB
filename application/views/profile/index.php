
<body>
 

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
       
          <li class="breadcrumb-item">User</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

              <div id="hilang">
                    <?php echo $this->session->flashdata('alert', true); ?>
                </div> 

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
         
            <div class="card-body profile-card pt-5 d-flex flex-column align-items-center">
            
            <img src="<?= base_url('assets/NiceAdmin/profile/') . $user['image']; ?>" alt="" class="rounded-circle" >
            <div class="filter ">
                  <a class="icon" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-arrow-down-s-line"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow" style="">
                    <li class="dropdown-header text-start">
                      <h6>Detail</h6>
                    </li>
                    <a class="dropdown-item d-flex align-items-center" href="<?= base_url('assets/NiceAdmin/profile/') . $user['image']; ?>" class="fancybox" data-fancybox="gallery1">
                  <i class="ri-gallery-fill"></i>
                <span>Lihat Foto</span>      
        				</a>  </ul>
                </div>
              <h2><?= $user['nama']; ?></h2>
              <h3><?= $user['level']; ?></h3>
          
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">

                <li class="nav-item" role="presentation">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" aria-selected="true" role="tab">Overview</button>
                </li>

                <li class="nav-item" role="presentation">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" aria-selected="false" tabindex="-1" role="tab">Edit Profile</button>
                </li>
              
              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview" role="tabpanel">
             
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Username | nama</div>
                    <div class="col-lg-9 col-md-8"><?= $user['username']; ?> | <?= $user['nama']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">posisi</div>
                    <div class="col-lg-9 col-md-8"><?= $user['level']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">kelas</div>
                    <div class="col-lg-9 col-md-8"><?= $user['kelas']; ?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit" role="tabpanel">
               
                  <!-- Profile Edit Form -->
                  <form action="<?= base_url('Profile/update') ; ?>" method="post" enctype="multipart/form-data">
                     <input type="text" name="id_user" value="<?= $user['id_user']; ?>" hidden>
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                      <img src="<?= base_url('assets/NiceAdmin/profile/') . $user['image']; ?>" alt="profile" >
                        <div class="pt-2">
                          <input type="file" name="image" class="mb-3" title="Upload new profile image">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Username</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="username" type="text" class="form-control" id="username" value="<?= $user['username']; ?>" disabled>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nama" type="text" class="form-control" id="nama" value="<?= $user['nama']; ?>">
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

               
      </div>
    </section>

  </main><!-- End #main -->


<main id="main" class="main">
<!-- content Start -->
<div class="section dashboard">
		<div class="row">

			<!-- Left side columns -->
			<div class="col-lg">
				<div class="row">

	
<div class="pagetitle">
		<h1>User </h1>
		<nav>
		<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Data User</a></li>
				
			</ol>
		</nav>
	</div>

    <div id="hilang">
		<?php echo $this->session->flashdata('alert', true); ?>
	</div>
	<div class="col-12 ">
		<div class="bg-light rounded h-100 p-4 ">
		<div class="d-flex justify-content-between">

    <button type="button" class="btn btn-primary rounded px-4 mb-4" data-bs-toggle="modal" data-bs-target="#TambahUser">
				<i class="ri-add-fill"></i> Tambah User
				</button>
			<a href=" <?= base_url('user'); ?>"><button type="button"
					class="btn btn-secondary rounded px-3 mb-4 " data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="Detail List"><i class="ri-bar-chart-horizontal-fill"></i></button></a>

         
			</div>
		
        <div class="row">
    <?php foreach ($data_user as $usr): ?>
      <div class="card border border-dark mb-3 m-2" style="max-width: 555px;">

        <div class="row g-4">
          <div class="col-md">
		  <a class="dropdown-item d-flex align-items-center" href="<?= base_url('assets/NiceAdmin/profile/') . $usr['image']; ?>" class="fancybox" data-fancybox="gallery1">
          <img src="<?= base_url('assets/NiceAdmin/profile/') . $usr['image']; ?>" 
              class="img-fluid rounded-start border border-warning  rounded" style="margin:2.5rem 1.5rem 1rem 1rem "  data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="Lihat Foto"></a>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Nama :
                <?= $usr['nama']; ?>
              </h5>
              <p class="card-text">Username :
                <?= $usr['username']; ?>
              </p>
              <p class="card-text">Kelas :
                <?= $usr['kelas']; ?>
              </p>
              <p class="card-text">Posisi :
                <?= $usr['level']; ?>
              </p>
                                 <a href="<?= base_url('user/hapus/' .$usr['id_user']) ;?>"
									onclick="return confirm('apakah anda yakin ingin menghapus data ini??')"
									class="badge bg-danger m-2"><i class="ri-delete-bin-5-line"></i> Hapus User
								</a>
                <a href="<?= base_url('user/edit/') ;?>" class="badge bg-warning m-2" data-bs-toggle="modal" data-bs-target="#EditUser<?= $usr['id_user']; ?>"><i
										class="ri-ball-pen-line"></i> Edit User</a>
            
                
            </div>
          </div>
        </div>
        </div>
        
				<!-- Modal  EDIT -->
				<div class="modal fade" id="EditUser<?= $usr['id_user']; ?>" tabindex="-1" aria-labelledby="EditUserLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="EditUserLabel"><i class="ri-ball-pen-line"></i> Edit User</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
					<form action="<?= base_url('user/update'); ?>" method="post">
					<input type="hidden" name="id_user" value="<?= $usr['id_user']; ?>">
							<div class="modal-body">

								<div class="row mb-3">
									<label for="username" class="col-sm-2 col-form-label">username : </label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="username" name="username" value="<?= $usr['username']; ?>" disabled>
										</div>
								</div>
								<div class="row mb-3">
									<label for="nama" class="col-sm-2 col-form-label">nama : </label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="nama" name="nama"  value="<?= $usr['nama']; ?>" required>
										</div>
								</div>
								<div class="row mb-3">
										<label for="kelas" class="col-sm-2 col-form-label">kelas :</label>
									<div class="col-sm-10 ">
										<select class="form-select " id="kelas" name="kelas" id="kelas" aria-label="Floating label select example">
											<option selected="">kelas</option>
											<option value="XI RA"<?php if($usr['kelas']=='XII RA'){ echo 'seleceted'; } ?>>XI RA</option>
											<option value="XI RB"<?php if($usr['kelas']=='XII RB'){ echo 'seleceted'; } ?>>XI RB</option>
											<option value="XI RA"<?php if($usr['kelas']=='XII RC'){ echo 'seleceted'; } ?>>XI RC</option>
										</select>
									</div>
								</div>
								<div class="row mb-3">
										<label for="level" class="col-sm-2 col-form-label">level : </label>
									<div class="col-sm-10 ">
										<select class="form-select " id="level" name="level" id="level" aria-label="Floating label select example">
												<option selected="">Level</option>
												<option value="User"<?php if($usr['level']=='user'){ echo 'seleceted'; } ?>>user</option>
												<option value="Admin"<?php if($usr['level']=='admin'){ echo 'seleceted'; } ?>>Admin</option>
										</select>
									</div>
								</div>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="submit" name="simpan" class="btn btn-primary"><i class="ri-ball-pen-line"></i> Edit</button>
							</div>
					</form>			
					</div>
					</div>
				</div>
				</div>
				<?php endforeach ;?>
	</div>
    </div>
	</div>
    </div>
	</div>
    </div>

</main>



<!-- Modal  tambah -->
<div class="modal fade" id="TambahUser" tabindex="-1" aria-labelledby="TambahUserLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="TambahUserLabel">	<i class="ri-add-fill"></i> Tambah User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <form action="<?= base_url('user/simpan'); ?>" method="post">
	 		 <div class="modal-body">

				<div class="row mb-3">
            		<label for="username" class="col-sm-2 col-form-label">username : </label>
            			<div class="col-sm-10">
                			<input type="text" class="form-control" id="username" name="username" required>
            			</div>
        		</div>
				<div class="row mb-3">
            		<label for="nama" class="col-sm-2 col-form-label">nama : </label>
            			<div class="col-sm-10">
                			<input type="text" class="form-control" id="nama" name="nama" required>
            			</div>
        		</div>
				<div class="row mb-3">
            		<label for="password" class="col-sm-2 col-form-label">password : </label>
            			<div class="col-sm-10">
                			<input type="password" class="form-control" id="password" name="password" required>
            			</div>
        		</div>
				<div class="row mb-3">
                         <label for="kelas" class="col-sm-2 col-form-label">kelas :</label>
                    <div class="col-sm-10 ">
                        <select class="form-select " id="kelas" name="kelas" id="kelas" aria-label="Floating label select example">
                            <option selected="">kelas</option>
                            <option value="XI RA">XI RA</option>
                            <option value="XI RB">XI RB</option>
                            <option value="XI RA">XI RC</option>
                        </select>
                	</div>
				</div>
				<div class="row mb-3">
                         <label for="level" class="col-sm-2 col-form-label">level : </label>
                    <div class="col-sm-10 ">
                        <select class="form-select " id="level" name="level" id="level" aria-label="Floating label select example">
								<option selected="">Level</option>
                                <option value="User">user</option>
                        	    <option value="Admin">Admin</option>
                        </select>
                	</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" name="simpan" class="btn btn-primary"><i class="ri-add-fill"></i> Tambah</button>
			</div>
	</form>			
      </div>
    </div>
  </div>
</div>


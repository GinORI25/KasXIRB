<main id="main" class="main">
<!-- content Start -->
<div class="pagetitle">
		<h1>Pemasukan </h1>
		<nav>
		<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Data Pemasukan</a></li>
				
			</ol>
		</nav>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				<form action="<?= base_url('Pemasukan/simpan') ;?>" method="post">
						<div class="row mb-3">
							<label for="keterangan" class="col-sm-2 col-form-label">keterangan</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="keterangan" name="keterangan">
							</div>
						</div>
						<div class="row mb-3">
							<label for="nominal" class="col-sm-2 col-form-label">nominal</label>
							<div class="col-sm-10">
								<input type="number" class="form-control" id="nominal" name="nominal">
							</div>
						</div>
						<div class="row mb-3">
							<label for="tanggal" class="col-sm-2 col-form-label">tanggal</label>
							<div class="col-sm-10">
								<input type="date" class="form-control" id="tanggal" name="tanggal">
							</div>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" name="simpan" class="btn btn-success">Save </button>
						</div>
				</div>
			</div>
			</form>
		</div>
	</div>


<div id="hilang">
	<?php echo $this->session->flashdata('alert', true); ?>
</div>
<div class="col-12 m-2">
	<div class="bg-light rounded h-100 p-4">

		
		<div class="d-flex align-items-center justify-content-between mb-3">
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
				tambah pemasukan
		</button>
			<button data-bs-toggle="modal" data-bs-target="#ModalPrintPemasukan" class="btn btn-success "><i
					class="ri-printer-line"></i>Laporan Pemasukan</button>
			<!-- <a class="btn btn-success">Saldo Akhir Rp. 0</a> -->
		</div>
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Tanggal</th>
						<th scope="col">keterangan</th>
						<?php if($this->session->userdata('level')=='Admin'){ ?>
						<th scope="col">Username</th>
						<?php } ?>
						<th scope="col">nominal</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach ($pemasukan as $pms) { ?>
					<tr>
						<th scope="row"><?= $no; ?></th>
						<td><?= $pms['tanggal']; ?></td>
						<td><?= $pms['keterangan']; ?></td>
						<?php if($this->session->userdata('level')=='Admin'){ ?>
						<td><?= $pms['username']; ?></td>
						<?php }; ?>
						<td style="color:red; " align="right">Rp.<?=number_format($pms['nominal']); ?></td>
						<td>
							<a href="<?= base_url('pemasukan/hapus/' .$pms['id_transaksi']) ;?>"
								onclick="return confirm('apakah anda yakin ingin menghapus data ini??')"
								class="btn btn-danger m-2"><i class="ri-delete-bin-5-line"></i>
							</a>

						</td>
					</tr>
					<?php $no++; } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<div class="modal fade" id="ModalPrintPemasukan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">  Laporan Pemasukan</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url('Pemasukan/laporan_Pemasukan'); ?>" method="post" target="_blank">
				<div class="modal-body">
					<div class="form-group mb-3">
						<label class="form-label">Tanggal Awal</label>
						<input type="date" class="form-control" name="tanggal1" required>
					</div>
					<div class="form-group mb-3">
						<label class="form-label">Tanggal Berakhir</label>
						<input type="date" class="form-control" name="tanggal2" required>
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Print</button>
				</div>
			</form>
		</div>
	</div>
</div>
</main>









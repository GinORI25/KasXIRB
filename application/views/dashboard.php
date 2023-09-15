<main id="main" class="main">

	<div class="pagetitle">
		<h1>Dashboard</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
			</ol>
		</nav>
	</div><!-- End Page Title -->

	<div class="section dashboard">
		<div class="row">

			<!-- Left side columns -->
			<div class="col-lg">
				<div class="row">

	
					<!-- Revenue Card -->
					<div class="col-xxl-6 col-md-6">
						<div class="card info-card ">


							<div class="card-body">
								<h5 class="card-title">Pemasukan</h5>

								<div class="d-flex align-items-center">
									<div
										class="rounded-circle d-flex align-items-center justify-content-center">
										
									</div>
              <!-- Default Table -->
			  <table class="table ">
									<tbody>
										<tr>
											<td>Hari ini</td>
											<td>Bulan ini</td>
											<td>Total Pemasukan</td>
										</tr>
										<tr>
											<?php
											$date = date('d');
											$month = date('m');
											$ue =  "SELECT sum(nominal) as nominal FROM transaksi WHERE DAY(tanggal) = $date AND jenis_transaksi = 'Pemasukan'";
											$ue2 =  "SELECT sum(nominal) as nominal FROM transaksi WHERE MONTH(tanggal) = $month AND jenis_transaksi = 'Pemasukan'";
											$harilu = $this->db->query($ue)->row_array();
											$bulanlu = $this->db->query($ue2)->row_array();

											
											foreach ($tMasuk as $totalMasuk) {
												?>
												<td>Rp. <?= number_format($harilu['nominal']); ?></td>
												<td>Rp. <?= number_format($bulanlu['nominal']); ?></td>
												<td>Rp. <?= number_format($totalMasuk); ?></td>
												
											<?php } ?>
										</tr>
									</tbody>
								</table>
								 
							</div>
						</div>
						</div>
					</div><!-- End Revenue Card -->
	
					<!-- Revenue Card -->
					<div class="col-xxl-6 col-md-6">
						<div class="card info-card ">


							<div class="card-body">
								<h5 class="card-title">Pengeluaran</h5>

								<div class="d-flex align-items-center">
									<div
										class="rounded-circle d-flex align-items-center justify-content-center">
										
									</div>
              <!-- Default Table -->
			  <table class="table ">
									<tbody>
										<tr>
											<td>Hari ini</td>
											<td>Bulan ini</td>
											<td>Total Pengeluaran</td>
										</tr>
										<tr>
											<?php
											$date = date('d');
											$month = date('m');
											$ue =  "SELECT sum(nominal) as nominal FROM transaksi WHERE DAY(tanggal) = $date AND jenis_transaksi = 'Pengeluaran'";
											$ue2 =  "SELECT sum(nominal) as nominal FROM transaksi WHERE MONTH(tanggal) = $month AND jenis_transaksi = 'Pengeluaran'";
											$harilu = $this->db->query($ue)->row_array();
											$bulanlu = $this->db->query($ue2)->row_array();

											
											foreach ($tkeluar as $totalkeluar) {
												?>
												<td>Rp. <?= number_format($harilu['nominal']); ?></td>
												<td>Rp. <?= number_format($bulanlu['nominal']); ?></td>
												<td>Rp. <?= number_format($totalkeluar); ?></td>
												
											<?php } ?>
										</tr>
									</tbody>
								</table>
								 
							</div>
						</div>

								</div>
							</div>

						</div>
						</div>
					</div><!-- End Revenue Card -->

					<!-- Customers Card -->
					<div class="col-xxl-5 col-xl-12">

						<div class="card info-card">


							<div class="card-body">
								<h5 class="card-title">Saldo </h5>

												<div class="d-flex justify-content-between">
									<button type="button" class="btn btn-warning">
										<b>Total : </b>Rp<?= number_format($totalMasuk - $totalkeluar) ;?>
             						 </button>
									  <button data-bs-toggle="modal" data-bs-target="#ModalPrint" class="btn btn-success "><i
										class="ri-printer-line"></i>  Print Saldo</button>
										</div>
								</div>

							</div>
						</div>

					</div><!-- End Customers Card -->

				</div>
			</div><!-- End Left side columns -->

		</div>



	
			<!-- Modal -->
			<div class="modal fade" id="ModalPrint" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="exampleModalLabel">Laporan Saldo Akhir</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<form action="<?= base_url('Dashboard/laporan'); ?>" method="post" target="_blank">
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
</main><!-- End #main -->
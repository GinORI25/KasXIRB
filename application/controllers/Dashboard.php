<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if ($this->session->userdata()==NULL){
			redirect('auth/index');
		}
		
		$this->load->model('Dashboard_model');
	}
	
	public function index()
	{
		$data['user'] = $this->db->get_where('user',['username'=> $this->session->userdata('username')])->row_array();
		$data['tMasuk']  = $this->Dashboard_model->getTotalPemasukan();
		$data['tkeluar']  = $this->Dashboard_model->getTotalpengeluaran();

		$data['title'] = 'Dashboard'; 

		$this->load->view('template/_header', $data);
		$this->load->view('template/_navbar', $data);
		$this->load->view('template/_sidebar', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('template/_footer', $data);
	} 

	public function laporan()
	{
		$tanggal1 = $this->input->post('tanggal1');
		$tanggal2 = $this->input->post('tanggal2');

		$data['tanggal1'] = $tanggal1;
		$data['tMasuk']  = $this->Dashboard_model->filterByTanggalPemasukan($tanggal1, $tanggal2);
		$data['tKeluar']  = $this->Dashboard_model->filterByTanggalPengeluaran($tanggal1, $tanggal2);
		$data['filter'] = $this->Dashboard_model->filterByTanggal($tanggal1, $tanggal2);
		$data['judul'] = "Laporan keuangan dari tanggal $tanggal1 sampai $tanggal2"  ;

		$data['title'] = 'laporan'; 
		$this->load->view('laporan/laporan_Dashboard', $data);

		$paper_size = 'A4';
		$orientation = 'portrait';
		$html = $this->output->get_output();

		$this->load->library('pdf');

		$this->pdf->generate(
			$html,
			"Laporan_transaksi",
			$paper_size,
			$orientation
		);
	
	}

}

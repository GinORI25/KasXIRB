<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {

	
	public function index()
	{
		$username = $this->session->userdata('username');
		$level = $this->session->userdata('level');
		$this->db->from('transaksi');
		$this->db->where('jenis_transaksi', 'pengeluaran');
		if($level=='User'){
			$this->db->where('username', $username);
		}
		$this->db->order_by('tanggal','DESC');  
		$pengeluaran = $this->db->get()->result_array();
		$data =  array('pengeluaran' => $pengeluaran);
		
		
		$data['user'] = $this->db->get_where('user',['username'=> $this->session->userdata('username')])->row_array();
		$data['title'] = 'pengeluaran'; 

		$this->load->view('template/_header', $data);
		$this->load->view('template/_sidebar', $data);
		$this->load->view('template/_navbar', $data);
		$this->load->view('pengeluaran/index', $data);
		$this->load->view('template/_footer', $data);
	}
	public function simpan()
	{
		$data = array(
			'keterangan'    => $this->input->post('keterangan'),
			'nominal'   	=> $this->input->post('nominal'),
			'tanggal'    	=> $this->input->post('tanggal'),
			'username'    	=> $this->session->userdata('username'),
			'jenis_transaksi'    	=> 'pengeluaran'
		);
		$this->db->insert('transaksi',$data);
		$this->session->set_flashdata('alert','<div class="alert alert-success" role="alert">
			Data Pengeluaran Berhasil Diinputkan
		</div>');
		redirect('pengeluaran/index');
	}
	public function hapus($id)
	{
		$where = array('id_transaksi' => $id);
		$this->db->delete('transaksi', $where);
		$this->session->set_flashdata('alert','<div class="alert alert-danger" role="alert">
			Data Pengeluaran Berhasil Dihapus
	</div>');
	redirect('pengeluaran/index');
	}

	public function laporan()
	{
		$tanggal1 = $this->input->post('tanggal1');
		$tanggal2 = $this->input->post('tanggal2');

		$this->load->model('Dashboard_model');

		$data['title'] = 'laporan'; 
		$data['filter'] = $this->Dashboard_model->filterLaporanPengeluaran($tanggal1, $tanggal2);
		$data['tKeluar']  = $this->Dashboard_model->filterByTanggalPengeluaran($tanggal1, $tanggal2); 
		$data['judul'] = " 	Tanggal $tanggal1 sampai $tanggal2"  ;
		$this->load->view('laporan/laporan_Pengeluaran', $data);

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

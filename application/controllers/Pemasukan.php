<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasukan extends CI_Controller {

	
	public function index()
	{
		$username = $this->session->userdata('username');
		$level = $this->session->userdata('level');
		$this->db->from('transaksi');
		$this->db->where('jenis_transaksi', 'pemasukan');
		if($level=='User'){
			$this->db->where('username', $username);
		}
		$this->db->order_by('tanggal','DESC');  
		$pemasukan = $this->db->get()->result_array();
		$data =  array('pemasukan' => $pemasukan);
		
		
		$data['user'] = $this->db->get_where('user',['username'=> $this->session->userdata('username')])->row_array();
		$data['title'] = 'Pemasukan'; 

		$this->load->view('template/_header', $data);
		$this->load->view('template/_sidebar', $data);
		$this->load->view('template/_navbar', $data);
		$this->load->view('pemasukan/index', $data);
		$this->load->view('template/_footer', $data);
	}

	public function simpan()
	{
		$data = array(
			'keterangan'    => $this->input->post('keterangan'),
			'nominal'   	=> $this->input->post('nominal'),
			'tanggal'    	=> $this->input->post('tanggal'),
			'username'    	=> $this->session->userdata('username'),
			'jenis_transaksi'    	=> 'pemasukan'
		);
		$this->db->insert('transaksi',$data);
		$this->session->set_flashdata('alert','<div class="alert alert-success" role="alert">
		Data Pemasukan berhasil Diinputkan
		</div>');
		redirect('Pemasukan/index');
	}

	public function hapus($id)
	{
		$where = array('id_transaksi' => $id);
		$this->db->delete('transaksi', $where);
		$this->session->set_flashdata('alert','<div class="alert alert-danger" role="alert">
			Data Pemasukan Berhasil Dihapus
	</div>');
	redirect('pemasukan/index');
	}

	public function laporan_Pemasukan()
	{
		$this->load->model('Dashboard_model');
		$tanggal1 = $this->input->post('tanggal1');
		$tanggal2 = $this->input->post('tanggal2');


		$data['title'] = 'laporan'; 
		$data['judul'] = " Tanggal $tanggal1 sampai $tanggal2"  ;
		$data['tMasuk']  = $this->Dashboard_model->filterByTanggalPemasukan($tanggal1, $tanggal2);
		$data['tabrak'] = $this->Dashboard_model->filterLaporanPemasukan($tanggal1, $tanggal2);
		$this->load->view('laporan/laporan_Pemasukan', $data);

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

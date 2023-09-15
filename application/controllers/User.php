<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('level')!='Admin'){
			redirect('Dashboard');
		}
	}
	
	
	public function index()
	{
		$this->db->select('*')->from('user');
		$this->db->order_by('nama','ASC');  
		$user = $this->db->get()->result_array();
		$data =  array('data_user' => $user);
		
		$data['user'] = $this->db->get_where('user',['username'=> $this->session->userdata('username')])->row_array();
		$data['title'] = 'data user'; 

		$this->load->view('template/_header', $data);
		$this->load->view('template/_sidebar', $data);
		$this->load->view('template/_navbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('template/_footer', $data);
	}
	
	public function simpan()
	{



		$username = $this->input->post('username');
		$cekusername = $this->db->where('username', $username)->count_all_results('user');
		if($cekusername==1){
			$this->session->set_flashdata('alert','<div class="alert alert-danger" role="alert">
			Soryy Username sudah digunakan
		</div>');
		redirect('user/index');
		}

		$data = array(
			'username' => $this->input->post('username'),
			'nama' => $this->input->post('nama'),
			'kelas' => $this->input->post('kelas'),
			'image' => 'default.jpg',
			'password' =>$this->input->post('password'),
			'level' => $this->input->post('level'),
		
		);

		$this->db->insert('user', $data);
		$this->session->set_flashdata('alert','<div class="alert alert-success" role="alert">
			Data berhasil ditambahkan
		</div>');

		redirect('user/index');
	}
	public function hapus($id)
	{
		$where = array('id_user' => $id);
		$this->db->delete('user', $where);
		$this->session->set_flashdata('alert','<div class="alert alert-danger" role="alert">
			Data berhasil dihapus
	</div>');
	redirect('user/index');
	}

	public function update()
	{
		 $data = array(
			'nama'       =>$this->input->post('nama'),
			'kelas'       =>$this->input->post('kelas'),
			'level'       =>$this->input->post('level'),
		 );
		 $where = array('id_user' => $this->input->post('id_user'));
		 $this->db->update('user', $data, $where);
		 $this->session->set_flashdata('alert','<div class="alert alert-success" role="alert">
			Yeayy data berhasil terupdate
		</div>');
		redirect('user/index');
	}
	public function account()
	{
		$this->db->select('*')->from('user');
		$this->db->order_by('nama','ASC');  
		$user = $this->db->get()->result_array();
		$data =  array('data_user' => $user);
		
		$data['user'] = $this->db->get_where('user',['username'=> $this->session->userdata('username')])->row_array();
		$data['title'] = 'Account'; 

		$this->load->view('template/_header', $data);
		$this->load->view('template/_sidebar', $data);
		$this->load->view('template/_navbar', $data);
		$this->load->view('user/account', $data);
		$this->load->view('template/_footer', $data);
	}
}

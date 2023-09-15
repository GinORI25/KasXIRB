<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	public function index()
	{
        $data['title'] = 'Login Mas Bro'; 

        $this->load->view('template/_authheader',$data);
		$this->load->view('auth/index');
		$this->load->view('template/_authfooter');
		
	}
    public function login()
	{
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->db->from('user')->where('username',$username);
        $user = $this->db->get()->row();
        if($user==NULL){
            $this->session->set_flashdata('alert','<div class="alert alert-danger" role="alert">
            username does not exist !!
		</div>');
        redirect('auth');
        } else if($user->password==$password){
            $data = array(
                    'username'  => $user->username,
                    'nama'      => $user->nama,
                    'kelas'     => $user->kelas,
                    'level'     => $user->level,
                    'id_user'   => $user->id_user,
            );
            $this->session->set_userdata($data);
           
            redirect('Dashboard');
        } else{
            $this->session->set_flashdata('alert','<div class="alert alert-danger" role="alert">
	        Wrong Password !!
		</div>');
        redirect('auth');
        }
	}
    public function logout(){
        $this->session->sess_destroy();
        redirect('auth/index');
    }
}
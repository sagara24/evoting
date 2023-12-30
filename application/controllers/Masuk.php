<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
	public function index()
	{
		$this->load->view('masuk/index');
	}
	public function aksi_login()
	{
		$no_induk = $this->input->post('no_induk');
		$password = md5($this->input->post('password'));
		$cek = $this->db->get_where('pemilih', array ('no_induk' => $no_induk, 'password' => $password));
		$banyak = $cek->num_rows();
		$data = $cek->result();
		if($banyak >= 1){
			$data_session = array(
				'no_induk' => $data[0]->no_induk,
				'id_pemilih' => $data[0]->id_pemilih,
				'status' => "login",				
			);
			$this->session->set_userdata($data_session);
			redirect('utama');
		} else {
			$this->session->set_flashdata('error', 'No. Induk tidak terdaftar atau password salah!');
			redirect('masuk');
		}
	}
	public function logout() {
		session_destroy();
		redirect('utama');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Pemilih extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('Pemilih_model');
        $this->load->helper('url');
    }
	public function index()
	{
		if ($this->session->userdata('status') != 'login') {
			redirect('admin/masuk');
		} else {
			$data['nama_pemilih'] = $this->session->userdata('nama_pemilih');
			$search = $this->input->get('search'); // Ambil nilai pencarian dari URL
	
			if ($search) {
				// Jika ada pencarian, lakukan query dengan kondisi pencarian
				$this->db->like('nama_pemilih', $search);
				$data['pemilih'] = $this->db->get('pemilih')->result();
			} else {
				// Jika tidak ada pencarian, ambil semua data
				$data['pemilih'] = $this->db->get('pemilih')->result();
			}
	
			$this->load->view('admin/pemilih/index', $data);
		}
		if ($this->session->userdata('status') != 'login') {
			redirect('admin/masuk');
		} else {
			$data['pemilih'] = $this->db->get('pemilih')->result();
			$this->load->view('admin/pemilih/index', $data);
		}
	}
	public function tambah() 
	{
		$this->load->view('admin/pemilih/tambah');
	}
	public function simpan()
	{
		$nama = $this->input->post('nama');
		$jekel = $this->input->post('jekel');
		$kelas = $this->input->post('kelas');
        $no_induk = $this->input->post('no_induk');
        $password = md5($this->input->post('password'));
		$status_pemilih = $this->input->post('status_pemilih');
            $data = array(
                'nama_pemilih' => $nama,
                'jenis_kelamin' => $jekel,
				'kelas' => $kelas,
                'no_induk' => $no_induk,
                'password' => $password,
				'status_pemilih' => $status_pemilih
            );
            $this->db->insert('pemilih', $data);
            $this->session->set_flashdata('success', 'Berhasil Diupload');
            redirect('admin/pemilih');
	}
	public function ubah($id)
	{
		$data['cari'] = $this->db->get_where('pemilih', array('id_pemilih' => $id))->result();
		$this->load->view('admin/pemilih/ubah', $data);
	}
	public function subah()
	{
		$nama = $this->input->post('nama');
		$jekel = $this->input->post('jekel');
		$kelas = $this->input->post('kelas');
        $no_induk = $this->input->post('no_induk');
        $password = md5($this->input->post('password'));
		$id = $this->input->post('kode');
		$status_pemilih = $this->input->post('status_pemilih');
        if($password == "") {
            $data = array(
                'nama_pemilih' => $nama,
                'jenis_kelamin' => $jekel,
				'kelas' => $kelas,
                'no_induk' => $no_induk,
				'status_pemilih' => $status_pemilih
            );
        } else {
            $data = array(
                'nama_pemilih' => $nama,
                'jenis_kelamin' => $jekel,
				'kelas' => $kelas,
                'no_induk' => $no_induk,
                'password' => $password,
				'status_pemilih' => $status_pemilih
            );
        }
			$this->db->where('id_pemilih', $id);
			$this->db->update('pemilih', $data);
            $this->session->set_flashdata('success', 'Berhasil Diubah');
            redirect('admin/pemilih');
	}
	public function hapus($id)
	{
		$cari = $this->db->get_where('pemilih', array('id_pemilih' -> $id))->result();
		$this->db->where(array('id_pemilih' => $id));
		$this->db->delete('pemilih');
		$this->session->set_flashdata('success', 'Berhasil diHapus');
		redirect('admin/pemilih');
	}
	public function report()
	{
		if ($this->session->userdata('status') != 'login') {
			redirect('admin/masuk');
		} else {
			$data['pemilih'] = $this->db->get('pemilih')->result();
			$this->load->view('admin/pemilih/report', $data);
		}
	}
	public function cetak()
	{
		$data['pemilih'] = $this->db->get('pemilih')->result();
		$this->load->view('admin/pemilih/cetak', $data);
	}
	public function reset_status($id)
	{
		$pemilih = $this->db->get_where('pemilih', array('id_pemilih' => $id))->row();

		if ($pemilih->status_pemilih == 'sudah_memilih') {
			$this->session->set_flashdata('error', 'Pemilih sudah memilih. Reset status tidak diizinkan.');
		} else {
			$data = array('status_pemilih' => 'belum_memilih');
			$this->db->where('id_pemilih', $id);
			$this->db->update('pemilih', $data);

			$this->session->set_flashdata('success', 'Status Pemilih Berhasil Direset');			
		}				
		redirect('admin/pemilih');
	}
	public function uploaddata()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'xlsx|xls';
		$config['file_name'] = 'doc' . time();
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('importexcel')) {
			$file = $this->upload->data();
			$reader = ReaderEntityFactory::CreateXLSXReader();

			$reader->open('uploads/' . $file['file_name']);
			foreach ($reader->getSheetIterator() as $sheet) {
				$numRow = 1;
				foreach ($sheet->getRowIterator() as $row) {
					if ($numRow > 1) {
						$data = array(
							'nama_pemilih' => $row->getCellAtIndex(1),
							'jenis_kelamin' => $row->getCellAtIndex(2),
							'kelas' => $row->getCellAtIndex(3),
							'no_induk' => $row->getCellAtIndex(4),
							'password' => $row->getCellAtIndex(5),
							'status_pemilih' => $row->getCellAtIndex(6),
						);
						$this->Pemilih_model->import_data($data);
					}
					$numRow++;
				}
				$reader->close();
				unlink('uploads/' . $file['file_name']);
				$this->session->set_flashdata('success', 'Import data berhasil');
				redirect('admin/pemilih');
			}
		} else {
			echo "Error : " . $this->upload->display_errors();
		};
	}
}
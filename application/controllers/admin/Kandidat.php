<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kandidat extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
	public function index()
	{
		if ($this->session->userdata('status') != 'login') {
			redirect('admin/masuk');
		} else {
			$data['kandidat'] = $this->db->get('kandidat')->result();
			$this->load->view('admin/kandidat/index.php', $data);
		}
	}
	public function tambah() 
	{
		$this->load->view('admin/kandidat/tambah');
	}
	public function simpan()
	{
		$nama = $this->input->post('nama');
		$nomor = $this->input->post('nomor');
		$visi_misi = $this->input->post('visi_misi');
        $config['upload_path'] = './gambar/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto')) {
            $upload = $this->upload->data();
            $data = array(
                'nama_kandidat' => $nama,
                'no_kandidat' => $nomor,
				'visi_misi' => $visi_misi,
                'foto_kandidat' => $upload['file_name']
            );
            $this->db->insert('kandidat', $data);
            $this->session->set_flashdata('success', 'Berhasil Diupload');
            redirect('admin/kandidat');
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('admin/kandidat');
        }
	}
	public function ubah($id)
	{
		$data['cari'] = $this->db->get_where('kandidat', array('id_kandidat' => $id))->result();
		$this->load->view('admin/kandidat/ubah', $data);
	}
	public function subah()
	{
		$nama = $this->input->post('nama');
		$nomor = $this->input->post('nomor');
		$visi_misi = $this->input->post('visi_misi');
		$id = $this->input->post('kode');
		if (isset($_FILES['foto']['tmp_name'])) {
			$config['upload_path'] = './gambar/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('foto')) {
				$upload = $this->upload->data();
				$data = array(
					'nama_kandidat' => $nama,
					'no_kandidat' => $nomor,
					'visi_misi' => $visi_misi,
					'foto_kandidat' => $upload['file_name']
				);
			} else {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('admin/kandidat');
			}
		} else {
			$data = array(
				'nama_kandidat' => $nama,
                'no_kandidat' => $nomor,
				'visi_misi' => $visi_misi
			);
		}
			$this->db->where('id_kandidat', $id);
			$this->db->update('kandidat', $data);
            $this->session->set_flashdata('success', 'Berhasil Diubah');
            redirect('admin/kandidat');
	}
	public function hapus($id)
	{
		$cari = $this->db->get_where('kandidat', array('id_kandidat' => $id))->result();
		$gambar = $cari[0]->foto_kandidat;
		unlink('./gambar/' . $gambar);
		$this->db->where(array('id_kandidat' => $id));
		$this->db->delete('kandidat');
		$this->session->set_flashdata('success', 'Berhasil diHapus');
		redirect('admin/kandidat');
	}
	public function report()
	{
		if ($this->session->userdata('status') != 'login') {
			redirect('admin/masuk');
		} else {
			$data['kandidat'] = $this->db->get('kandidat')->result();
			$this->load->view('admin/kandidat/report', $data);
		}
	}
	public function cetak()
	{
		$data['kandidat'] = $this->db->get('kandidat')->result();
		$this->load->view('admin/kandidat/cetak', $data);
	}
	public function suara()
	{
		$data['pilih'] = $this->db->get('pilih')->num_rows();
		$data['kandidat'] = $this->db->get('kandidat')->result();
		$this->load->view('admin/kandidat/suara', $data);
	}
} 


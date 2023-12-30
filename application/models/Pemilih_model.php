<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilih_model extends CI_Model {
    public function import_data($data)
    {
        $jumlah = count($data);
        if ($jumlah > 0) {
            $this->db->replace('pemilih', $data);
        }
    }
}
?>
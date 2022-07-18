<?php
defined('BASEPATH') or exit('No direct script access allowed');

//extends class CI_Model
class Obat_model extends CI_Model
{
    public function getDataObat($id_obat)
    {
        //Menggunakan Query Builder
        if ($id_obat) {
            $this->db->from('obat');
            $this->db->where('id_obat', $id_obat);
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from('obat');
            $query = $this->db->get()->result_array();
            return $query;
        }
    }

    //fungsi untuk menambahkan data
    public function insertObat($data)
    {
        //Menggunakan Query Builder
        $this->db->insert('obat', $data);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk mengubah data
    public function updateObat($data, $id_obat)
    {
        //Menggunakan Query Builder
        $this->db->update('obat', $data, ['id_obat' => $id_obat]);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk menghapus data
    public function deleteObat($id_obat)
    {
        //Menggunakan Query Builder
        $this->db->delete('obat', ['id_obat' => $id_obat]);
        return $this->db->affected_rows();
        // return $query;
    }
}

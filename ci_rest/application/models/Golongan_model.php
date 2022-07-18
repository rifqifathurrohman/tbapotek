<?php
defined('BASEPATH') or exit('No direct script access allowed');

//extends class CI_Model
class Golongan_model extends CI_Model
{
    public function getDataGolongan($id_golongan)
    {
        //Menggunakan Query Builder
        if ($id_golongan) {
            $this->db->from('golongan');
            $this->db->where('id_golongan', $id_golongan);
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from('golongan');
            $query = $this->db->get()->result_array();
            return $query;
        }
    }

    //fungsi untuk menambahkan data
    public function insertGolongan($data)
    {
        //Menggunakan Query Builder
        $this->db->insert('golongan', $data);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk mengubah data
    public function updateGolongan($data, $id_golongan)
    {
        //Menggunakan Query Builder
        $this->db->update('golongan', $data, ['id_golongan' => $id_golongan]);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk menghapus data
    public function deleteGolongan($id_golongan)
    {
        //Menggunakan Query Builder
        $this->db->delete('golongan', ['id_golongan' => $id_golongan]);
        return $this->db->affected_rows();
        // return $query;
    }
}

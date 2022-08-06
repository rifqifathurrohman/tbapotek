<?php
defined('BASEPATH') or exit('No direct script access allowed');

//extends class CI_Model
class Pelanggan_model extends CI_Model
{
    public function getDataPelanggan($id_pelanggan)
    {
        //Menggunakan Query Builder
        if ($id_pelanggan) {
            // $this->db->select('nama_pelanggan, jenis_kelamin, umur, alamat, notelp');
            $this->db->select('*');
            $this->db->from('pelanggan');
            $this->db->where('id_pelanggan', $id_pelanggan);
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            // $this->db->select('nama_pelanggan, jenis_kelamin, umur, alamat, notelp');
            $this->db->select('*');
            $this->db->from('pelanggan');
            $query = $this->db->get()->result_array();
            return $query;
        }
    }

    //fungsi untuk menambahkan data
    public function insertPelanggan($data)
    {
        //Menggunakan Query Builder
        $this->db->insert('pelanggan', $data);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk mengubah data
    public function updatePelanggan($data, $id_pelanggan)
    {
        //Menggunakan Query Builder
        $this->db->update('pelanggan', $data, ['id_pelanggan' => $id_pelanggan]);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk menghapus data
    public function deletePelanggan($id_pelanggan)
    {
        //Menggunakan Query Builder
        $this->db->delete('pelanggan', ['id_pelanggan' => $id_pelanggan]);
        return $this->db->affected_rows();
        // return $query;
    }
}

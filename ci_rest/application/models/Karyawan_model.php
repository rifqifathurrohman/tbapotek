<?php
defined('BASEPATH') or exit('No direct script access allowed');

//extends class CI_Model
class Karyawan_model extends CI_Model
{
    public function getDataKaryawan($id_karyawan)
    {
        //Menggunakan Query Builder
        if ($id_karyawan) {
            // $this->db->select('nama_karyawan, alamat, notelp, user, password');
            $this->db->select('*');
            $this->db->from('karyawan');
            $this->db->where('id_karyawan', $id_karyawan);
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            // $this->db->select('nama_karyawan, alamat, notelp, user, password');
            $this->db->select('*');
            $this->db->from('karyawan');
            $query = $this->db->get()->result_array();
            return $query;
        }
    }

    //fungsi untuk menambahkan data
    public function insertKaryawan($data)
    {
        //Menggunakan Query Builder
        $this->db->insert('karyawan', $data);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk mengubah data
    public function updateKaryawan($data, $id_karyawan)
    {
        //Menggunakan Query Builder
        $this->db->update('karyawan', $data, ['id_karyawan' => $id_karyawan]);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk menghapus data
    public function deleteKaryawan($id_karyawan)
    {
        //Menggunakan Query Builder
        $this->db->delete('karyawan', ['id_karyawan' => $id_karyawan]);
        return $this->db->affected_rows();
        // return $query;
    }
}

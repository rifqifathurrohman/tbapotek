<?php
defined('BASEPATH') or exit('No direct script access allowed');

//extends class CI_Model
class Faktursupplier_model extends CI_Model
{
    public function getDataFaktursupplier($id_f_supplier)
    {
        //Menggunakan Query Builder
        if ($id_f_supplier) {
            $this->db->from('faktur_supplier');
            $this->db->where('id_f_supplier', $id_f_supplier);
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from('faktur_supplier');
            $query = $this->db->get()->result_array();
            return $query;
        }  
    }

    //fungsi untuk menambahkan data
    public function insertFaktursupplier($data)
    {
        //Menggunakan Query Builder
        $this->db->insert('faktur_supplier', $data);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk mengubah data
    public function updateFaktursupplier($data, $id_f_supplier)
    {
        //Menggunakan Query Builder
        $this->db->update('faktur_supplier', $data, ['id_f_supplier' => $id_f_supplier]);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk menghapus data
    public function deleteFaktursupplier($id_f_supplier)
    {
        //Menggunakan Query Builder
        $this->db->delete('faktur_supplier', ['id_f_supplier' => $id_f_supplier]);
        return $this->db->affected_rows();
        // return $query;
    }

}

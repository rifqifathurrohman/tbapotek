<?php
defined('BASEPATH') or exit('No direct script access allowed');

//extends class CI_Model
class Supplier_model extends CI_Model
{
    public function getDataSupplier($id_supplier)
    {
        //Menggunakan Query Builder
        if ($id_supplier) {
            $this->db->from('supplier');
            $this->db->where('id_supplier', $id_supplier);
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from('supplier');
            $query = $this->db->get()->result_array();
            return $query;
        }
    }

    //fungsi untuk menambahkan data
    public function insertSupplier($data)
    {
        //Menggunakan Query Builder
        $this->db->insert('supplier', $data);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk mengubah data
    public function updateSupplier($data, $id_supplier)
    {
        //Menggunakan Query Builder
        $this->db->update('supplier', $data, ['id_supplier' => $id_supplier]);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk menghapus data
    public function deleteSupplier($id_supplier)
    {
        //Menggunakan Query Builder
        $this->db->delete('supplier', ['id_supplier' => $id_supplier]);
        return $this->db->affected_rows();
        // return $query;
    }
}

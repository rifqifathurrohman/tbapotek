<?php
defined('BASEPATH') or exit('No direct script access allowed');

//extends class CI_Model
class Transaksisupplier_model extends CI_Model
{
    public function getDataTransaksisupplier($id_t_supplier)
    {
        //Menggunakan Query Builder
        if ($id_t_supplier) {
            // $this->db->select('tanggal, nama_karyawan, nama_supplier, penanggungjawab, nama_obat, jumlah, total_bayar');
            $this->db->select('*');
            $this->db->from('transaksi_supplier');
            $this->db->where('id_t_supplier', $id_t_supplier);
            $this->db->join('obat', 'obat.id_obat = transaksi_supplier.id_obat');
            $this->db->join('supplier', 'supplier.id_supplier = transaksi_supplier.id_supplier');
            $this->db->join('karyawan', 'karyawan.id_karyawan = transaksi_supplier.id_karyawan');
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            // $this->db->select('tanggal, nama_karyawan, nama_supplier, penanggungjawab, nama_obat, jumlah, total_bayar');
            $this->db->select('*');
            $this->db->from('transaksi_supplier');
            $this->db->join('obat', 'obat.id_obat = transaksi_supplier.id_obat');
            $this->db->join('supplier', 'supplier.id_supplier = transaksi_supplier.id_supplier');
            $this->db->join('karyawan', 'karyawan.id_karyawan = transaksi_supplier.id_karyawan');
            $query = $this->db->get()->result_array();
            return $query;
        }
    }

    //fungsi untuk menambahkan data
    public function insertTransaksisupplier($data)
    {
        //Menggunakan Query Builder
        $this->db->insert('transaksi_supplier', $data);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk mengubah data
    public function updateTransaksisupplier($data, $id_t_supplier)
    {
        //Menggunakan Query Builder
        $this->db->update('transaksi_supplier', $data, ['id_t_supplier' => $id_t_supplier]);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk menghapus data
    public function deleteTransaksisupplier($id_t_supplier)
    {
        //Menggunakan Query Builder
        $this->db->delete('transaksi_supplier', ['id_t_supplier' => $id_t_supplier]);
        return $this->db->affected_rows();
        // return $query;
    }
}

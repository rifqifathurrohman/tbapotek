<?php
defined('BASEPATH') or exit('No direct script access allowed');

//extends class CI_Model
class Transaksipenjualan_model extends CI_Model
{
    public function getDataTransaksipenjualan($id_t_penjualan)
    {
        //Menggunakan Query Builder
        if ($id_t_penjualan) {
            $this->db->select('*');
            // $this->db->select('tanggal, nama_karyawan, nama_pelanggan, umur, nama_obat, harga, jumlah, total_bayar');
            $this->db->from('transaksi_penjualan');
            $this->db->where('id_t_penjualan', $id_t_penjualan);
            $this->db->join('obat', 'obat.id_obat = transaksi_penjualan.id_obat');
            $this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi_penjualan.id_pelanggan');
            $this->db->join('karyawan', 'karyawan.id_karyawan = transaksi_penjualan.id_karyawan');
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            // $this->db->select('*');
            $this->db->select('*');
            // $this->db->select('tanggal, nama_karyawan, nama_pelanggan, umur, nama_obat, harga, jumlah, total_bayar');
            $this->db->from('transaksi_penjualan');
            $this->db->join('obat', 'obat.id_obat = transaksi_penjualan.id_obat');
            $this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi_penjualan.id_pelanggan');
            $this->db->join('karyawan', 'karyawan.id_karyawan = transaksi_penjualan.id_karyawan');
            $query = $this->db->get()->result_array();
            return $query;
        }
    }

    //fungsi untuk menambahkan data
    public function insertTransaksipenjualan($data)
    {
        //Menggunakan Query Builder
        $this->db->insert('transaksi_penjualan', $data);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk mengubah data
    public function updateTransaksipenjualan($data, $id_t_penjualan)
    {
        //Menggunakan Query Builder
        $this->db->update('transaksi_penjualan', $data, ['id_t_penjualan' => $id_t_penjualan]);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk menghapus data
    public function deleteTransaksipenjualan($id_t_penjualan)
    {
        //Menggunakan Query Builder
        $this->db->delete('transaksi_penjualan', ['id_t_penjualan' => $id_t_penjualan]);
        return $this->db->affected_rows();
        // return $query;
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

//extends class CI_Model
class Fakturpenjualan_model extends CI_Model
{
    public function getDataFakturpenjualan($id_f_penjualan)
    {
        //Menggunakan Query Builder
        if ($id_f_penjualan) {
            // $this->db->select('*');
            $this->db->from('faktur_penjualan');
            $this->db->where('id_f_penjualan', $id_f_penjualan);
            // $this->db->join('golongan_obat', 'golongan_obat.id_golobat = penjualan.id_golobat');
            // $this->db->join('kasir', 'kasir.id_kasir = penjualan.id_kasir');
            // $this->db->join('obat', 'obat.id_obat = penjualan.id_obat2');
            // $this->db->join('pelanggan', 'pelanggan.id_pelanggan = penjualan.id_pelanggan');//kurang join ini
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            // $this->db->select('*');
            $this->db->from('faktur_penjualan');
            // $this->db->join('golongan_obat', 'golongan_obat.id_golobat = penjualan.id_golobat');
            // $this->db->join('kasir', 'kasir.id_kasir = penjualan.id_kasir');
            // $this->db->join('obat', 'obat.id_obat = penjualan.id_obat2');
            // $this->db->join('pelanggan', 'pelanggan.id_pelanggan = penjualan.id_pelanggan');//kurang join ini
            $query = $this->db->get()->result_array();
            return $query;
        }  
    }

    //fungsi untuk menambahkan data
    public function insertFakturpenjualan($data)
    {
        //Menggunakan Query Builder
        $this->db->insert('faktur_penjualan', $data);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk mengubah data
    public function updateFakturpenjualan($data, $id_f_penjualan)
    {
        //Menggunakan Query Builder
        $this->db->update('faktur_penjualan', $data, ['id_f_penjualan' => $id_f_penjualan]);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk menghapus data
    public function deleteFakturpenjualan($id_f_penjualan)
    {
        //Menggunakan Query Builder
        $this->db->delete('faktur_penjualan', ['id_f_penjualan' => $id_f_penjualan]);
        return $this->db->affected_rows();
        // return $query;
    }

}

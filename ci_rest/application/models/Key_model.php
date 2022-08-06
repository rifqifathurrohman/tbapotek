<?php
defined('BASEPATH') or exit('No direct script access allowed');

//extends class CI_Model
class Key_model extends CI_Model
{
  public function getDataKey($id)
  {
    //Menggunakan Query builder
    if ($id) {
      $this->db->select('*');
      $this->db->from('keys');
      $this->db->where('id', $id);
      $query = $this->db->get()->row_array();
      return $query;
    } else {
      // $this->db->from('kategori');
      $this->db->select('id, key');
      $this->db->from('keys');
      $query = $this->db->get()->result_array();
      return $query;
    }
  }

  //fungsi untuk menambahkan data
  public function insertKey($data)
  {
    //Menggunakan Query builder
    $this->db->insert('keys', $data);
    return $this->db->affected_rows();
    /// return $query;
  }

 
}
<?php
class User_model extends CI_Model{
	protected $_table = 'karyawan';

	public function lihat(){
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_id($id_karyawan){
		$query = $this->db->get_where($this->_table, ['id_karyawan' => $id_karyawan]);
		return $query->row();
	}

	public function lihat_username($username){
		$query = $this->db->get_where($this->_table, ['username' => $username]);
		return $query->row();
	}

	// public function tambah($data){
	// 	return $this->db->insert($this->_table, $data);
	// }

	// public function ubah($data, $id){
	// 	$query = $this->db->set($data);
	// 	$query = $this->db->where(['id' => $id]);
	// 	$query = $this->db->update($this->_table);
	// 	return $query;
	// }

	// public function hapus($id){
	// 	return $this->db->delete($this->_table, ['id' => $id]);
	// }
}
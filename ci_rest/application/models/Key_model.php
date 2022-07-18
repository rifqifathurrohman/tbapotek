<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Key_model extends CI_Model {

    //tambahin method untuk insert data barang
    function insertKey($data){
        $this->db->insert('keys', $data);
    }
}
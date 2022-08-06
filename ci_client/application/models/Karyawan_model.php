<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Karyawan_model extends CI_Model
{
    private $_guzzle;

    public function __construct()
    {
        parent::__construct();
        $this->_guzzle = new Client([
            'base_uri' => 'http://localhost/TB_PEMOGRAMANIII/ci_rest/api/karyawan/apotek',
            'auth'  => ['admin', '1234']
        ]);
    }

    public function getAll()
    {
        $response = $this->_guzzle->request('GET', '', [
            'query' => [
                'KEY' => 'algies'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result['data'];
    }

    public function getById($id_karyawan)
    {
        $response = $this->_guzzle->request('GET', '', [
            'query' => [
                'KEY' => 'algies',
                'id_karyawan' => $id_karyawan
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result['data'];
    }

    public function save($data)
    {
        $response = $this->_guzzle->request('POST', '', [
            'http_errors' => false, //menghilangkan segala jinis http errors
            'form_params' => $data 
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }
    public function update($data)
    {
        $response = $this->_guzzle->request('PUT', '', [
            'http_errors' => false, //menghilangkan segala jinis http errors
            'form_params' => $data 
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }
    public function delete($id_karyawan)
    {
        $response = $this->_guzzle->request('DELETE', '', [
            'form_params' => [
                'http_errors' => false, //menghilangkan segala jinis http errors
                'KEY' => 'algies',
                'id_karyawan' => $id_karyawan
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }
}

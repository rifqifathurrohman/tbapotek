<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Pelanggan_model extends CI_Model
{
    private $_guzzle;

    public function __construct()
    {
        parent::__construct();
        $this->_guzzle = new Client([
            'base_uri' => 'http://localhost/TB_PEMOGRAMANIII/ci_rest/api/pelanggan/apotek',
            'auth'  => ['admin', '1234']
        ]);
    }

    public function getAll()
    {
        $response = $this->_guzzle->request('GET', '', [
            'query' => [
                'KEY' => 'rifki'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result['data'];
    }

    public function getById($id_pelanggan)
    {
        $response = $this->_guzzle->request('GET', '', [
            'query' => [
                'KEY' => 'rifki',
                'id_pelanggan' => $id_pelanggan
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
    public function delete($id_pelanggan)
    {
        $response = $this->_guzzle->request('DELETE', '', [
            'form_params' => [
                'http_errors' => false, //menghilangkan segala jinis http errors
                'KEY' => 'rifki',
                'id_pelanggan' => $id_pelanggan
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }
}

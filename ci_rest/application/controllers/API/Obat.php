<?php
defined('BASEPATH') or exit('No direct script access allowed');

//import library dari Format dan RestController
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Obat extends RestController
{ 

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Obat_model'); 
        $this->methods['apotek_get']['limit'] = 500;
        $this->methods['apotek_post']['limit'] = 100;
    }

    //fungsi CRUD (GET, POST, PUT, DELETE) simpan di bawah sini

    //fungsi untuk menampilkan data
    public function apotek_get()
    {
        $id_obat = $this->get('id_obat');
        $data = $this->Obat_model->getDataObat($id_obat);

        //Jika terdapat data pada variabel $data
        if($data){
        $this->response(
            [
                'data' => $data,
                'status' => 'success',
                'response_code' => RestController::HTTP_OK
            ],
            RestController::HTTP_OK
        );
        //Kondisi selain di atas (jika tidak ada data pada variabel $data)
        }else{
            $this->response(
                [
                    'status' => 'failed',
                    'response_code' => RestController::HTTP_NOT_FOUND,
                    'message' => 'Data Tidak Ada',
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }

    function apotek_post()
    {
        $data = array(
            'id_obat' => $this->post('id_obat'),
            'id_supplier' => $this->post('id_supplier'),
            'id_golongan' => $this->post('id_golongan'),
            'nama' => $this->post('nama'),
            'stok' => $this->post('stok'),
            'harga' => $this->post('harga')

        );

        //cek data id_obat
        $cek_id_obat = $this->Obat_model->getDataObat($this->post('id_obat'));

        //Jika semua data wajib diisi
        if ($data['id_obat'] == NULL || $data['id_supplier'] == NULL || $data['id_golongan'] == NULL || $data['nama'] == NULL || $data['stok'] == NULL || $data['harga'] == NULL) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //cek jika ada isi pada variabel $id_obat    
        } elseif ($cek_id_obat) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Sudah Ada Di DB!!!!',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Jika data tersimpan
        } elseif ($this->Obat_model->insertObat($data) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data Berhasil Ditambahkan',
                ],
                RestController::HTTP_CREATED
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Gagal Menambahkan Data',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

    function apotek_put()
    {
        $id_obat = $this->put('id_obat');
        $data = array(
            'id_supplier' => $this->put('id_supplier'),
            'id_golongan' => $this->put('id_golongan'),
            'nama' => $this->put('nama'),
            'stok' => $this->post('stok'),
            'harga' => $this->post('harga')
            
        );

        //Jika field id_obat tidak diisi
        if ($id_obat == NULL) {
            $this->response(
                [
                    'status' => $id_obat,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_obat Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Jika data berhasil berubah
        } elseif ($this->Obat_model->updateObat($data, $id_obat) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data Obat Dengan id_obat '.$id_obat.' Berhasil Diubah',
                ],
                RestController::HTTP_CREATED
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Gagal Mengubah Data',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

    function apotek_delete()
    {
        $id_obat = $this->delete('id_obat');

        //Jika field id_obat tidak diisi
        if ($id_obat == NULL) {
            $this->response(
                [
                    'status' => $id_obat,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_obat Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Kondisi ketika OK
        } elseif ($this->Obat_model->deleteObat($id_obat) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data Obat Dengan id_obat '.$id_obat.' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
        //Kondisi gagal
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Obat Dengan id_obat '.$id_obat.' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
}

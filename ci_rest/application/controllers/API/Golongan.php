<?php
defined('BASEPATH') or exit('No direct script access allowed');

//import library dari Format dan RestController
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Golongan extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Golongan_model'); 
        $this->methods['apotek_get']['limit'] = 200;
        $this->methods['apotek_post']['limit'] = 200;
    }

    //fungsi CRUD (GET, POST, PUT, DELETE) simpan di bawah sini

    //fungsi untuk menampilkan data
    public function apotek_get()
    {
        $id_golongan = $this->get('id_golongan');
        $data = $this->Golongan_model->getDataGolongan($id_golongan);

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
                    'message' => 'id_golongan Tidak Ditemukan'
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }

    function apotek_post()
    {
        $data = array(
            'golongan_obat' => $this->post('golongan_obat'),
            'kegunaan' => $this->post('kegunaan'),
            'id_golongan' => $this->post('id_golongan'),
            'rakpenyimpanan' => $this->post('rakpenyimpanan')

        );

        //cek data id_golongan
        $cek_id_golongan = $this->Golongan_model->getDataGolongan($this->post('id_golongan'));

        //Jika semua data wajib diisi
        if ($data['id_golongan'] == NULL || $data['golongan_obat'] == NULL || $data['kegunaan'] == NULL || $data['rakpenyimpanan'] == NULL) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //cek jika ada isi pada variabel $id_golongan    
        } elseif ($cek_id_golongan) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Sudah Ada Di DB!!!!',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Jika data tersimpan
        } elseif ($this->Golongan_model->insertGolongan($data) > 0) {
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
        $id_golongan = $this->put('id_golongan');
        $data = array(
            'golongan_obat' => $this->put('golongan_obat'),
            'kegunaan' => $this->put('kegunaan'),
            'rakpenyimpanan' => $this->put('rakpenyimpanan'),
        );

        //Jika field id_golongan tidak diisi
        if ($id_golongan == NULL) {
            $this->response(
                [
                    'status' => $id_golongan,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_golongan Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Jika data berhasil berubah
        } elseif ($this->Golongan_model->updateGolongan($data, $id_golongan) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data Golongan Dengan id_golongan '.$id_golongan.' Berhasil Diubah',
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
        $id_golongan = $this->delete('id_golongan');

        //Jika field id_golongan tidak diisi
        if ($id_golongan == NULL) {
            $this->response(
                [
                    'status' => $id_golongan,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_golongan Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Kondisi ketika OK
        } elseif ($this->Golongan_model->deleteGolongan($id_golongan) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data Golongan Dengan id_golongan '.$id_golongan.' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
        //Kondisi gagal
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Golongan Dengan id_golongan '.$id_golongan.' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

//import library dari Format dan RestController
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Karyawan extends RestController
{ 

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model'); 
        $this->methods['apotek_get']['limit'] = 200;
        $this->methods['apotek_post']['limit'] = 200;
    }

    //fungsi CRUD (GET, POST, PUT, DELETE) simpan di bawah sini

    //fungsi untuk menampilkan data
    public function apotek_get()
    {
        $id_karyawan = $this->get('id_karyawan');
        $data = $this->Karyawan_model->getDataKaryawan($id_karyawan);

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
                    'message' => 'id_karyawan Tidak Ditemukan'
                ],
                RestController::HTTP_NOT_FOUND
            ); 
        }
    }

    function apotek_post()
    {
        $data = array(
            'id_karyawan' => $this->post('id_karyawan'),
            'nama_karyawan' => $this->post('nama_karyawan'),
            'alamat' => $this->post('alamat'),
            'notelp' => $this->post('notelp'),
            'username' => $this->post('username'),
            'password' => $this->post('password')

        );

        //cek data id_karyawan
        $cek_id_karyawan = $this->Karyawan_model->getDataKaryawan($this->post('id_karyawan'));

        //Jika semua data wajib diisi
        if ($data['id_karyawan'] == NULL || $data['nama_karyawan'] == NULL || $data['alamat'] == NULL || $data['notelp'] == NULL || $data['username'] == NULL || $data['password'] == NULL) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //cek jika ada isi pada variabel $id_karyawan    
        } elseif ($cek_id_karyawan) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Sudah Ada Di DB!!!!',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Jika data tersimpan
        } elseif ($this->Karyawan_model->insertKaryawan($data) > 0) {
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
        $id_karyawan = $this->put('id_karyawan');
        $data = array(
            'nama_karyawan' => $this->put('nama_karyawan'),
            'alamat' => $this->put('alamat'),
            'notelp' => $this->put('notelp'),
            'username' => $this->put('username'),
            'password' => $this->put('password')
            
        );

        //Jika field id_karyawan tidak diisi
        if ($id_karyawan == NULL) {
            $this->response(
                [
                    'status' => $id_karyawan,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_karyawan Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Jika data berhasil berubah
        } elseif ($this->Karyawan_model->updateKaryawan($data, $id_karyawan) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data Karyawan Dengan id_karyawan '.$id_karyawan.' Berhasil Diubah',
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
        $id_karyawan = $this->delete('id_karyawan');

        //Jika field id_karyawan tidak diisi
        if ($id_karyawan == NULL) {
            $this->response(
                [
                    'status' => $id_karyawan,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_karyawan Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Kondisi ketika OK
        } elseif ($this->Karyawan_model->deleteKaryawan($id_karyawan) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data Karyawan Dengan id_karyawan '.$id_karyawan.' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
        //Kondisi gagal
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Karyawan Dengan id_karyawan '.$id_karyawan.' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
}

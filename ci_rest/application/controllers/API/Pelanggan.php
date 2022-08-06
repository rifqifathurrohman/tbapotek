<?php
defined('BASEPATH') or exit('No direct script access allowed');

//import library dari Format dan RestController
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Pelanggan extends RestController
{ 

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggan_model'); 
        $this->methods['apotek_get']['limit'] = 200;
        $this->methods['apotek_post']['limit'] = 200;
    }

    //fungsi CRUD (GET, POST, PUT, DELETE) simpan di bawah sini

    //fungsi untuk menampilkan data
    public function apotek_get()
    {
        $id_pelanggan = $this->get('id_pelanggan');
        $data = $this->Pelanggan_model->getDataPelanggan($id_pelanggan);

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
                    'message' => 'id_pelanggan Tidak Ditemukan'
                ],
                RestController::HTTP_NOT_FOUND
            ); 
        }
    }

    function apotek_post()
    {
        $data = array(
            'id_pelanggan' => $this->post('id_pelanggan'),
            'nama_pelanggan' => $this->post('nama_pelanggan'),
            'jenis_kelamin' => $this->post('jenis_kelamin'),
            'umur' => $this->post('umur'),
            'alamat' => $this->post('alamat'),
            'notelp' => $this->post('notelp')

        );

        //cek data id_pelanggan
        $cek_id_pelanggan = $this->Pelanggan_model->getDataPelanggan($this->post('id_pelanggan'));

        //Jika semua data wajib diisi
        if ($data['id_pelanggan'] == NULL || $data['nama_pelanggan'] == NULL || $data['jenis_kelamin'] == NULL || $data['umur'] == NULL || $data['alamat'] == NULL || $data['notelp'] == NULL ) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //cek jika ada isi pada variabel $id_pelanggan    
        } elseif ($cek_id_pelanggan) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Sudah Ada Di DB!!!!',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Jika data tersimpan
        } elseif ($this->Pelanggan_model->insertPelanggan($data) > 0) {
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
        $id_pelanggan = $this->put('id_pelanggan');
        $data = array(
            'nama_pelanggan' => $this->put('nama_pelanggan'),
            'jenis_kelamin' => $this->put('jenis_kelamin'),
            'umur' => $this->put('umur'),
            'alamat' => $this->put('alamat'),
            'notelp' => $this->put('notelp')
            
        );

        //Jika field id_pelanggan tidak diisi
        if ($id_pelanggan == NULL) {
            $this->response(
                [
                    'status' => $id_pelanggan,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_pelanggan Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Jika data berhasil berubah
        } elseif ($this->Pelanggan_model->updatePelanggan($data, $id_pelanggan) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data Pelanggan Dengan id_pelanggan '.$id_pelanggan.' Berhasil Diubah',
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
        $id_pelanggan = $this->delete('id_pelanggan');

        //Jika field id_pelanggan tidak diisi
        if ($id_pelanggan == NULL) {
            $this->response(
                [
                    'status' => $id_pelanggan,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_pelanggan Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Kondisi ketika OK
        } elseif ($this->Pelanggan_model->deletePelanggan($id_pelanggan) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data Pelanggan Dengan id_pelanggan '.$id_pelanggan.' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
        //Kondisi gagal
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Pelanggan Dengan id_pelanggan '.$id_pelanggan.' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
}

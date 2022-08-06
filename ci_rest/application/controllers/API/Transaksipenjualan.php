<?php
defined('BASEPATH') or exit('No direct script access allowed');

//import library dari Format dan RestController
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Transaksipenjualan extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksipenjualan_model'); 
        $this->methods['apotek_get']['limit'] = 200;
        $this->methods['apotek_post']['limit'] = 200;
    }

    //fungsi CRUD (GET, POST, PUT, DELETE) simpan di bawah sini

    //fungsi untuk menampilkan data
    public function apotek_get()
    {
        $id_t_penjualan = $this->get('id_t_penjualan');
        $data = $this->Transaksipenjualan_model->getDataTransaksipenjualan($id_t_penjualan);

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
                    'response_code' => RestController::HTTP_NOT_FOUND
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }

    function apotek_post()
    {
        $data = array(
            'id_t_penjualan' => $this->post('id_t_penjualan'),
            'id_karyawan' => $this->post('id_karyawan'),
            'id_pelanggan' => $this->post('id_pelanggan'),
            'id_obat' => $this->post('id_obat'),
            'tanggal' => $this->post('tanggal'),
            'jumlah' => $this->post('jumlah'),
            'total_bayar' => $this->post('total_bayar')

        );

        //cek data id_t_penjualan
        $cek_id_t_penjualan = $this->Transaksipenjualan_model->getDataTransaksipenjualan($this->post('id_t_penjualan'));

        //Jika semua data wajib diisi
        if ($data['id_t_penjualan'] == NULL || $data['id_karyawan'] == NULL || $data['id_pelanggan'] == NULL || $data['id_obat'] == NULL || $data['tanggal'] == NULL || $data['jumlah'] == NULL || $data['total_bayar'] == NULL ) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //cek jika ada isi pada variabel $id_t_penjualan    
        } elseif ($cek_id_t_penjualan) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Sudah Ada Di DB!!!!',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Jika data tersimpan
        } elseif ($this->Transaksipenjualan_model->insertTransaksipenjualan($data) > 0) {
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
        $id_t_penjualan = $this->put('id_t_penjualan');
        $data = array(
            'id_karyawan' => $this->put('id_karyawan'),
            'id_pelanggan' => $this->put('id_pelanggan'),
            'id_obat' => $this->put('id_obat'),
            'tanggal' => $this->put('tanggal'),
            'jumlah' => $this->put('jumlah'),
            'total_bayar' => $this->put('total_bayar')
        );

        //Jika field id_t_penjualan tidak diisi
        if ($id_t_penjualan == NULL) {
            $this->response(
                [
                    'status' => $id_t_penjualan,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_t_penjualan Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Jika data berhasil berubah
        } elseif ($this->Transaksipenjualan_model->updateTransaksipenjualan($data, $id_t_penjualan) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data Transaksi Penjualan Dengan id_t_penjualan '.$id_t_penjualan.' Berhasil Diubah',
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
        $id_t_penjualan = $this->delete('id_t_penjualan');

        //Jika field id_t_penjualan tidak diisi
        if ($id_t_penjualan == NULL) {
            $this->response(
                [
                    'status' => $id_t_penjualan,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_t_penjualan Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Kondisi ketika OK
        } elseif ($this->Transaksipenjualan_model->deleteTransaksipenjualan($id_t_penjualan) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data Transaksi Penjualan Dengan id_t_penjualan '.$id_t_penjualan.' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
        //Kondisi gagal
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Transaksi Penjualan Dengan id_t_penjualan '.$id_t_penjualan.' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

//import library dari Format dan RestController
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Fakturpenjualan extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Fakturpenjualan_model'); 
        $this->methods['apotek_get']['limit'] = 200;
        $this->methods['apotek_post']['limit'] = 200;
    }

    //fungsi CRUD (GET, POST, PUT, DELETE) simpan di bawah sini

    //fungsi untuk menampilkan data
    public function apotek_get()
    {
        $id_f_penjualan = $this->get('id_f_penjualan');
        $data = $this->Fakturpenjualan_model->getDataFakturpenjualan($id_f_penjualan);

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
                    'message' => 'id_f_penjualan Tidak Ditemukan'
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }

    function apotek_post()
    {
        $data = array(
            'id_f_penjualan' => $this->post('id_f_penjualan'),
            'id_karyawan' => $this->post('id_karyawan'),
            'id_pelanggan' => $this->post('id_pelanggan'),
            'id_obat' => $this->post('id_obat'),
            'tanggal' => $this->post('tanggal'),
            'jumlah' => $this->post('jumlah'),
            'total_bayar' => $this->post('total_bayar')

        );

        //cek data id_f_penjualan
        $cek_id_f_penjualan = $this->Fakturpenjualan_model->getDataFakturpenjualan($this->post('id_f_penjualan'));

        //Jika semua data wajib diisi
        if ($data['id_f_penjualan'] == NULL || $data['id_karyawan'] == NULL || $data['id_pelanggan'] == NULL || $data['id_obat'] == NULL || $data['tanggal'] == NULL || $data['jumlah'] == NULL || $data['total_bayar'] == NULL ) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //cek jika ada isi pada variabel $id_f_penjualan    
        } elseif ($cek_id_f_penjualan) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Sudah Ada Di DB!!!!',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Jika data tersimpan
        } elseif ($this->Fakturpenjualan_model->insertFakturpenjualan($data) > 0) {
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
        $id_f_penjualan = $this->put('id_f_penjualan');
        $data = array(
            'id_karyawan' => $this->post('id_karyawan'),
            'id_pelanggan' => $this->post('id_pelanggan'),
            'id_obat' => $this->post('id_obat'),
            'tanggal' => $this->post('tanggal'),
            'jumlah' => $this->post('jumlah'),
            'total_bayar' => $this->post('total_bayar')
        );

        //Jika field id_f_penjualan tidak diisi
        if ($id_f_penjualan == NULL) {
            $this->response(
                [
                    'status' => $id_f_penjualan,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_f_penjualan Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Jika data berhasil berubah
        } elseif ($this->Fakturpenjualan_model->updateFakturpenjualan($data, $id_f_penjualan) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data Penjualan Dengan id_f_penjualan '.$id_f_penjualan.' Berhasil Diubah',
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
        $id_f_penjualan = $this->delete('id_f_penjualan');

        //Jika field id_f_penjualan tidak diisi
        if ($id_f_penjualan == NULL) {
            $this->response(
                [
                    'status' => $id_f_penjualan,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_f_penjualan Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Kondisi ketika OK
        } elseif ($this->Fakturpenjualan_model->deleteFakturpenjualan($id_f_penjualan) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data Penjualan Dengan id_f_penjualan '.$id_f_penjualan.' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
        //Kondisi gagal
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Penjualan Dengan id_f_penjualan '.$id_f_penjualan.' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
}

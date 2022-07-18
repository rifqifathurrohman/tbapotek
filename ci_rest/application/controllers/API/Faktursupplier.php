<?php
defined('BASEPATH') or exit('No direct script access allowed');

//import library dari Format dan RestController
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Faktursupplier extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Faktursupplier_model'); 
        $this->methods['apotek_get']['limit'] = 200;
        $this->methods['apotek_post']['limit'] = 200;
    }

    //fungsi CRUD (GET, POST, PUT, DELETE) simpan di bawah sini

    //fungsi untuk menampilkan data
    public function apotek_get()
    {
        $id_f_supplier = $this->get('id_f_supplier');
        $data = $this->Faktursupplier_model->getDataFaktursupplier($id_f_supplier);

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
                    'message' => 'id_f_supplier Tidak Ditemukan'
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }

    function apotek_post()
    {
        $data = array(
            'id_f_supplier' => $this->post('id_f_supplier'),
            'id_obat' => $this->post('id_obat'),
            'id_supplier' => $this->post('id_supplier'),
            'id_karyawan' => $this->post('id_karyawan'),
            'tanggal' => $this->post('tanggal'),
            'jml_obat' => $this->post('jml_obat'),
            'total_bayar' => $this->post('total_bayar')

        );

        //cek data id_f_supplier
        $cek_id_f_supplier = $this->Faktursupplier_model->getDataFaktursupplier($this->post('id_f_supplier'));

        //Jika semua data wajib diisi
        if ($data['id_f_supplier'] == NULL || $data['id_obat'] == NULL || $data['id_supplier'] == NULL || $data['id_karyawan'] == NULL || $data['tanggal'] == NULL || $data['jml_obat'] == NULL || $data['total_bayar'] == NULL ) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //cek jika ada isi pada variabel $id_f_supplier    
        } elseif ($cek_id_f_supplier) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Sudah Ada Di DB!!!!',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Jika data tersimpan
        } elseif ($this->Faktursupplier_model->insertFaktursupplier($data) > 0) {
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
        $id_f_supplier = $this->put('id_f_supplier');
        $data = array(
            'id_obat' => $this->post('id_obat'),
            'id_supplier' => $this->post('id_supplier'),
            'id_karyawan' => $this->post('id_karyawan'),
            'tanggal' => $this->post('tanggal'),
            'jml_obat' => $this->post('jml_obat'),
            'total_bayar' => $this->post('total_bayar')
        );

        //Jika field id_f_supplier tidak diisi
        if ($id_f_supplier == NULL) {
            $this->response(
                [
                    'status' => $id_f_supplier,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_f_supplier Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Jika data berhasil berubah
        } elseif ($this->Faktursupplier_model->updateFaktursupplier($data, $id_f_supplier) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data supplier Dengan id_f_supplier '.$id_f_supplier.' Berhasil Diubah',
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
        $id_f_supplier = $this->delete('id_f_supplier');

        //Jika field id_f_supplier tidak diisi
        if ($id_f_supplier == NULL) {
            $this->response(
                [
                    'status' => $id_f_supplier,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_f_supplier Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Kondisi ketika OK
        } elseif ($this->Faktursupplier_model->deleteFaktursupplier($id_f_supplier) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data supplier Dengan id_f_supplier '.$id_f_supplier.' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
        //Kondisi gagal
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data supplier Dengan id_f_supplier '.$id_f_supplier.' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
}

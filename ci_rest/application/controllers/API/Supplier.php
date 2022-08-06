<?php
defined('BASEPATH') or exit('No direct script access allowed');

//import library dari Format dan RestController
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Supplier extends RestController
{ 

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Supplier_model'); 
        $this->methods['apotek_get']['limit'] = 200;
        $this->methods['apotek_post']['limit'] = 200;
    }

    //fungsi CRUD (GET, POST, PUT, DELETE) simpan di bawah sini

    //fungsi untuk menampilkan data
    public function apotek_get()
    {
        $id_supplier = $this->get('id_supplier');
        $data = $this->Supplier_model->getDataSupplier($id_supplier);

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
                    'message' => 'id_supplier Tidak Ditemukan'
                ],
                RestController::HTTP_NOT_FOUND
            ); 
        }
    }

    function apotek_post()
    {
        $data = array(
            'id_supplier' => $this->post('id_supplier'),
            'nama_supplier' => $this->post('nama_supplier'),
            'alamat' => $this->post('alamat'),
            'notelp' => $this->post('notelp'),
            'penanggungjawab' => $this->post('penanggungjawab')
        );

        //cek data id_supplier
        $cek_id_supplier = $this->Supplier_model->getDataSupplier($this->post('id_supplier'));

        //Jika semua data wajib diisi
        if ($data['id_supplier'] == NULL || $data['nama_supplier'] == NULL || $data['alamat'] == NULL || $data['notelp'] == NULL || $data['penanggungjawab'] == NULL ) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //cek jika ada isi pada variabel $id_supplier    
        } elseif ($cek_id_supplier) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Sudah Ada Di DB!!!!',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Jika data tersimpan
        } elseif ($this->Supplier_model->insertSupplier($data) > 0) {
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
        $id_supplier = $this->put('id_supplier');
        $data = array(
            'nama_supplier' => $this->put('nama_supplier'),
            'alamat' => $this->put('alamat'),
            'notelp' => $this->put('notelp'),
            'penanggungjawab' => $this->put('penanggungjawab')
            
        );

        //Jika field id_supplier tidak diisi
        if ($id_supplier == NULL) {
            $this->response(
                [
                    'status' => $id_supplier,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_supplier Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Jika data berhasil berubah
        } elseif ($this->Supplier_model->updateSupplier($data, $id_supplier) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data Supplier Dengan id_supplier '.$id_supplier.' Berhasil Diubah',
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
        $id_supplier = $this->delete('id_supplier');

        //Jika field id_supplier tidak diisi
        if ($id_supplier == NULL) {
            $this->response(
                [
                    'status' => $id_supplier,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_supplier Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Kondisi ketika OK
        } elseif ($this->Supplier_model->deleteSupplier($id_supplier) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data Supplier Dengan id_supplier '.$id_supplier.' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
        //Kondisi gagal
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Supplier Dengan id_supplier '.$id_supplier.' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Key extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Key_model');
        $this->methods['key_post']['limit'] = 1000;
    }

    public function key_get()
    {
        $id = $this->get('id');
        $data = $this->Key_model->getDataKey($id);

        if($data)
        {
           $this->response(
            [
                'data' => $data,
                'status' => 'success',
                'response_code' => RestController::HTTP_OK
            ],
            RestController::HTTP_OK
        );
        } else {
            $this->response(
            [
                'status' => 'gagal',
                'response_code' => RestController::HTTP_NOT_FOUND
            ],
            RestController::HTTP_NOT_FOUND
        );
        }
    }

function key_post()
{
    $data = array(
        // 'id' => $this->post('id'),
        // 'user_id' => $this->post('user_id'),
        'key' => $this->post('key'),
        // 'level' => $this->post('level'),
        // 'ignore_limits' => $this->post('ignore_limits'),
        // 'is_private_key' => $this->post('is_private_key'),
        // 'ip_addresses' => $this->post('ip_addresses'),
        // 'date_created' => $this->post('date_created'),
    );

    $cek_id = $this->Key_model->getDataKey($this->post('id'));

    //Jika semua data wajib diisi
    if ($data['key'] == NULL ) {
        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Kosong',
            ],
            RestController::HTTP_BAD_REQUEST
        );

    }elseif ($cek_id) {
        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Duplikat',
            ],
            RestController::HTTP_BAD_REQUEST
        );
    }
    //Jika data tersimpan
    elseif ($this->Key_model->insertKey($data) > 0) {
        $this->response(
            [
                'status' => true,
                'response_code' => RestController::HTTP_CREATED,
                'message' => 'Data Berhasil Ditambahkan',
            ],
            RestController::HTTP_CREATED
        );
        //Jika data duplikat
    }  else {
        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Gagal Menambahkan Data'
            ],
            RestController::HTTP_BAD_REQUEST
        );
    }
}

// function users_put()
//     {
//         $id_users = $this->put('id_users');
//         $data = array(
//             'username' => $this->put('username'),
//             'password' => $this->put('password'),
//             'status' => $this->put('status'),
//             'level' => $this->put('level')
//         );

//         //Jika field id_users tidak diisi
//         if ($id_users == NULL) {
//             $this->response(
//                 [
//                     'status' => $id_users,
//                     'response_code' => RestController::HTTP_BAD_REQUEST,
//                     'message' => 'id_users Tidak Boleh Kosong',
//                 ],
//                 RestController::HTTP_BAD_REQUEST
//             );
//         //Jika data berhasil berubah
//         } elseif ($this->Users_model->updateUsers($data, $id_users) > 0) {
//             $this->response(
//                 [
//                     'status' => true,
//                     'response_code' => RestController::HTTP_CREATED,
//                     'message' => 'Data Users Dengan id_users '.$id_users.' Berhasil Diubah',
//                 ],
//                 RestController::HTTP_CREATED
//             );
//         } else {
//             $this->response(
//                 [
//                     'status' => false,
//                     'response_code' => RestController::HTTP_BAD_REQUEST,
//                     'message' => 'Gagal Mengubah Data',
//                 ],
//                 RestController::HTTP_BAD_REQUEST
//             );
//         }
//     }

// function users_delete()
//     {
//         $id_users = $this->delete('id_users');

//         //Jika field id_users tidak diisi
//         if ($id_users == NULL) {
//             $this->response(
//                 [
//                     'status' => $id_users,
//                     'response_code' => RestController::HTTP_BAD_REQUEST,
//                     'message' => 'id_users Tidak Boleh Kosong',
//                 ],
//                 RestController::HTTP_BAD_REQUEST
//             );
//         //Kondisi ketika OK
//         } elseif ($this->Users_model->deleteUsers($id_users) > 0) {
//             $this->response(
//                 [
//                     'status' => true,
//                     'response_code' => RestController::HTTP_OK,
//                     'message' => 'Data Users Dengan id_users '.$id_users.' Berhasil Dihapus',
//                 ],
//                 RestController::HTTP_OK
//             );
//         //Kondisi gagal
//         } else {
//             $this->response(
//                 [
//                     'status' => false,
//                     'response_code' => RestController::HTTP_BAD_REQUEST,
//                     'message' => 'Data Users Dengan id_users '.$id_users.' Tidak Ditemukan',
//                 ],
//                 RestController::HTTP_BAD_REQUEST
//             );
//         }
//     }

}
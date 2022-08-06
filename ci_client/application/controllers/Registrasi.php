<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Tambah data Karyawan";

        $this->form_validation->set_rules('id_karyawan', 'ID Karyawan', 'trim|required|numeric');
        $this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('notelp', 'NO HP', 'trim|required|numeric');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            // $this->load->view('templates/menu');
            $this->load->view('registrasi/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "id_karyawan" => $this->input->post('id_karyawan'),
                "nama_karyawan" => $this->input->post('nama_karyawan'),
                "alamat" => $this->input->post('alamat'),
                "notelp" => $this->input->post('notelp'),
                "username" => $this->input->post('username'),
                "password" => $this->input->post('password'),
                "KEY" => "algies"
            ];

            $insert = $this->Karyawan_model->save($data);
           
            if($insert['response_code']===201){
                $this->session->set_flashdata('flash', 'Data Ditambahkan');
                redirect('Login');
            } elseif ($insert['response_code']===400) {
                $this->session->set_flashdata('message', 'Data Duplikat!!');
                redirect('Login');
            }else{
                $this->session->set_flashdata('message', 'GAGAL!!');
                redirect('Login');
            }
        }

      
    }

    // public function detail($id_karyawan)
    // {
    //     $data['title'] = "Detail data Karyawan";
    //     $data['data_karyawan'] = $this->Karyawan_model->getById($id_karyawan);

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/menu');
    //     $this->load->view('registrasi/detail', $data);
    //     $this->load->view('templates/footer');
    // }

    // public function add()
    // {
    //     $data['title'] = "Tambah data Karyawan";

    //     $this->form_validation->set_rules('id_karyawan', 'ID Karyawan', 'trim|required|numeric');
    //     $this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'trim|required');
    //     $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
    //     $this->form_validation->set_rules('notelp', 'NO HP', 'trim|required|numeric');
    //     $this->form_validation->set_rules('username', 'Username', 'trim|required');
    //     $this->form_validation->set_rules('password', 'Password', 'trim|required');


    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/menu');
    //         $this->load->view('registrasi/index', $data);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $data = [
    //             "id_karyawan" => $this->input->post('id_karyawan'),
    //             "nama_karyawan" => $this->input->post('nama_karyawan'),
    //             "alamat" => $this->input->post('alamat'),
    //             "notelp" => $this->input->post('notelp'),
    //             "username" => $this->input->post('username'),
    //             "password" => $this->input->post('password'),
    //             "KEY" => "algies"
    //         ];

    //         $insert = $this->Karyawan_model->save($data);
           
    //         if($insert['response_code']===201){
    //             $this->session->set_flashdata('flash', 'Data Ditambahkan');
    //             redirect('Login');
    //         } elseif ($insert['response_code']===400) {
    //             $this->session->set_flashdata('message', 'Data Duplikat!!');
    //             redirect('Login');
    //         }else{
    //             $this->session->set_flashdata('message', 'GAGAL!!');
    //             redirect('Login');
    //         }
    //     }

      
    // }

    // public function edit($id_karyawan)
    // {
    //     $data['title'] = "Ubah data Karyawan";
    //     $data['data_karyawan'] = $this->Karyawan_model->getById($id_karyawan);

    //     $this->form_validation->set_rules('id_karyawan', 'ID Karyawan', 'trim|required|numeric');
    //     $this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'trim|required');
    //     $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
    //     $this->form_validation->set_rules('notelp', 'NO HP', 'trim|required|numeric');
    //     $this->form_validation->set_rules('username', 'Username', 'trim|required');
    //     $this->form_validation->set_rules('password', 'Password', 'trim|required');

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/menu');
    //         $this->load->view('karyawan/edit', $data);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $data = [
    //             "id_karyawan" => $this->input->post('id_karyawan'),
    //             "nama_karyawan" => $this->input->post('nama_karyawan'),
    //             "alamat" => $this->input->post('alamat'),
    //             "notelp" => $this->input->post('notelp'),
    //             "username" => $this->input->post('username'),
    //             "password" => $this->input->post('password'),
    //             "KEY" => "algies"
    //         ];

    //         $update = $this->Karyawan_model->update($data);
           
    //         if($update['response_code']===201){
    //             $this->session->set_flashdata('flash', 'Data telah diubah');
    //             redirect('Karyawan');
    //         } elseif ($update['response_code']===400) {
    //             $this->session->set_flashdata('message', 'Data Duplikat!!');
    //             redirect('Karyawan');
    //         }else{
    //             $this->session->set_flashdata('message', 'GAGAL!!');
    //             redirect('Karyawan');
    //         }
    //     }
    // }

    // public function delete($id_karyawan)
    // {
    //     $delete = $this->Karyawan_model->delete($id_karyawan);
    //     if($delete['response_code']===200){
    //         $this->session->set_flashdata('flash', 'Dihapus');
    //         redirect('Karyawan');
    //     }else{
    //         $this->session->set_flashdata('message', 'GAGAL!!');
    //         redirect('Karyawan');
    //     }
    }


<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "List data Pelanggan";
        $data['data_pelanggan'] = $this->Pelanggan_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('pelanggan/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_pelanggan)
    {
        $data['title'] = "Detail data Pelanggan";
        $data['data_pelanggan'] = $this->Pelanggan_model->getById($id_pelanggan);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('pelanggan/detail', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = "Tambah data Pelanggan";

        $this->form_validation->set_rules('id_pelanggan', 'ID Pelanggan', 'trim|required|numeric');
        $this->form_validation->set_rules('nama_pelanggan', 'NAMA', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('umur', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('notelp', 'NO HP', 'trim|required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('pelanggan/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "id_pelanggan" => $this->input->post('id_pelanggan'),
                "nama_pelanggan" => $this->input->post('nama_pelanggan'),
                "jenis_kelamin" => $this->input->post('jenis_kelamin'),
                "umur" => $this->input->post('umur'),
                "alamat" => $this->input->post('alamat'),
                "notelp" => $this->input->post('notelp'),
                "KEY" => "algies"
            ];

            $insert = $this->Pelanggan_model->save($data);
           
            if($insert['response_code']===201){
                $this->session->set_flashdata('flash', 'Data Ditambahkan');
                redirect('Pelanggan');
            } elseif ($insert['response_code']===400) {
                $this->session->set_flashdata('message', 'Data Duplikat!!');
                redirect('Pelanggan');
            }else{
                $this->session->set_flashdata('message', 'GAGAL!!');
                redirect('Pelanggan');
            }
        }

      
    }

    public function edit($id_pelanggan)
    {
        $data['title'] = "Ubah data Pelanggan";
        $data['data_pelanggan'] = $this->Pelanggan_model->getById($id_pelanggan);

        $this->form_validation->set_rules('id_pelanggan', 'ID Pelanggan', 'trim|required|numeric');
        $this->form_validation->set_rules('nama_pelanggan', 'NAMA', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('umur', 'Jenis Kelamin', 'trim|required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('notelp', 'NO HP', 'trim|required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('pelanggan/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "id_pelanggan" => $this->input->post('id_pelanggan'),
                "nama_pelanggan" => $this->input->post('nama_pelanggan'),
                "jenis_kelamin" => $this->input->post('jenis_kelamin'),
                "umur" => $this->input->post('umur'),
                "alamat" => $this->input->post('alamat'),
                "notelp" => $this->input->post('notelp'),
                "KEY" => "algies"
            ];

            $update = $this->Pelanggan_model->update($data);
           
            if($update['response_code']===201){
                $this->session->set_flashdata('flash', 'Data telah diubah');
                redirect('Pelanggan');
            } elseif ($update['response_code']===400) {
                $this->session->set_flashdata('message', 'Data Duplikat!!');
                redirect('Pelanggan');
            }else{
                $this->session->set_flashdata('message', 'GAGAL!!');
                redirect('Pelanggan');
            }
        }
    }

    public function delete($id_pelanggan)
    {
        $delete = $this->Pelanggan_model->delete($id_pelanggan);
        if($delete['response_code']===200){
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('Pelanggan');
        }else{
            $this->session->set_flashdata('message', 'GAGAL!!');
            redirect('Pelanggan');
        }
    }
}

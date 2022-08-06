<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Golongan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Golongan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "List data Golongan Obat";
        $data['data_golongan'] = $this->Golongan_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('golongan/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_golongan)
    {
        $data['title'] = "Detail data Golongan";
        $data['data_golongan'] = $this->Golongan_model->getById($id_golongan);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('golongan/detail', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = "Tambah data Golongan";

        $this->form_validation->set_rules('id_golongan', 'ID Golongan', 'trim|required|numeric');
        $this->form_validation->set_rules('golongan_obat', 'golongan_obat', 'trim|required');
        $this->form_validation->set_rules('kegunaan', 'kegunaan', 'trim|required');
        $this->form_validation->set_rules('rakpenyimpanan', 'rakpenyimpanan', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('golongan/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "id_golongan" => $this->input->post('id_golongan'),
                "golongan_obat" => $this->input->post('golongan_obat'),
                "kegunaan" => $this->input->post('kegunaan'),
                "rakpenyimpanan" => $this->input->post('rakpenyimpanan'),
                "KEY" => "rifki"
            ];

            $insert = $this->Golongan_model->save($data);
           
            if($insert['response_code']===201){
                $this->session->set_flashdata('flash', 'Data Ditambahkan');
                redirect('Golongan');
            } elseif ($insert['response_code']===400) {
                $this->session->set_flashdata('message', 'Data Duplikat!!');
                redirect('Golongan');
            }else{
                $this->session->set_flashdata('message', 'GAGAL!!');
                redirect('Golongan');
            }
        }

      
    }

    public function edit($id_golongan)
    {
        $data['title'] = "Ubah data Golongan";
        $data['data_golongan'] = $this->Golongan_model->getById($id_golongan);

        $this->form_validation->set_rules('id_golongan', 'ID Golongan', 'trim|required|numeric');
        $this->form_validation->set_rules('golongan_obat', 'golongan_obat', 'trim|required');
        $this->form_validation->set_rules('kegunaan', 'kegunaan', 'trim|required');
        $this->form_validation->set_rules('rakpenyimpanan', 'rakpenyimpanan', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('golongan/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "id_golongan" => $this->input->post('id_golongan'),
                "golongan_obat" => $this->input->post('golongan_obat'),
                "kegunaan" => $this->input->post('kegunaan'),
                "rakpenyimpanan" => $this->input->post('rakpenyimpanan'),
                "KEY" => "rifki"
            ];

            $update = $this->Golongan_model->update($data);
           
            if($update['response_code']===201){
                $this->session->set_flashdata('flash', 'Data telah diubah');
                redirect('Golongan');
            } elseif ($update['response_code']===400) {
                $this->session->set_flashdata('message', 'Data Duplikat!!');
                redirect('Golongan');
            }else{
                $this->session->set_flashdata('message', 'GAGAL!!');
                redirect('Golongan');
            }
        }
    }

    public function delete($id_golongan)
    {
        $delete = $this->Golongan_model->delete($id_golongan);
        if($delete['response_code']===200){
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('Golongan');
        }else{
            $this->session->set_flashdata('message', 'GAGAL!!');
            redirect('Golongan');
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Obat_model');
        $this->load->library('form_validation');
        $this->load->model('Golongan_model');
    }

    public function index()
    {
        $data['title'] = "List data Obat";
        $data['data_obat'] = $this->Obat_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('obat/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_obat)
    {
        $data['title'] = "Detail data Obat";
        $data['data_obat'] = $this->Obat_model->getById($id_obat);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('obat/detail', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = "Tambah data Obat";

        $data['data_obat'] = $this->Obat_model->getAll();
        $data['data_golongan'] =$this->Golongan_model->getAll();

        $this->form_validation->set_rules('id_obat', 'id_obat', 'trim|required|numeric');
        $this->form_validation->set_rules('id_golongan', 'id_golongan', 'trim|required|numeric');
        $this->form_validation->set_rules('nama_obat', 'Nama_obat', 'trim|required');
        $this->form_validation->set_rules('stok', 'Stok', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('obat/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "id_obat" => $this->input->post('id_obat'),
                "id_golongan" => $this->input->post('id_golongan'),
                "nama_obat" => $this->input->post('nama_obat'),
                "stok" => $this->input->post('stok'),
                "harga" => $this->input->post('harga'),
                "KEY" => "rifki"
            ];

            $insert = $this->Obat_model->save($data);
           
            if($insert['response_code']===201){
                $this->session->set_flashdata('flash', 'Data Ditambahkan');
                redirect('Obat');
            } elseif ($insert['response_code']===400) {
                $this->session->set_flashdata('message', 'Data Duplikat!!');
                redirect('Obat');
            }else{
                $this->session->set_flashdata('message', 'GAGAL!!');
                redirect('Obat');
            }
        }

      
    }

    public function edit($id_obat)
    {
        $data['title'] = "Ubah data Obat";
        $data['data_obat'] = $this->Obat_model->getById($id_obat);
        $data['data_golongan'] =$this->Golongan_model->getAll();

        $this->form_validation->set_rules('id_obat', 'id_obat', 'trim|required|numeric');
        $this->form_validation->set_rules('id_golongan', 'id_golongan', 'trim|required|numeric');
        $this->form_validation->set_rules('nama_obat', 'Nama_obat', 'trim|required');
        $this->form_validation->set_rules('stok', 'Stok', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('obat/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "id_obat" => $this->input->post('id_obat'),
                "id_golongan" => $this->input->post('id_golongan'),
                "nama_obat" => $this->input->post('nama_obat'),
                "stok" => $this->input->post('stok'),
                "harga" => $this->input->post('harga'),
                "KEY" => "rifki"
            ];

            $update = $this->Obat_model->update($data);
           
            if($update['response_code']===201){
                $this->session->set_flashdata('flash', 'Data telah diubah');
                redirect('Obat');
            } elseif ($update['response_code']===400) {
                $this->session->set_flashdata('message', 'Data Duplikat!!');
                redirect('Obat');
            }else{
                $this->session->set_flashdata('message', 'GAGAL!!');
                redirect('Obat');
            }
        }
    }

    public function delete($id_obat)
    {
        $delete = $this->Obat_model->delete($id_obat);
        if($delete['response_code']===200){
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('Obat');
        }else{
            $this->session->set_flashdata('message', 'GAGAL!!');
            redirect('Obat');
        }
    }
}

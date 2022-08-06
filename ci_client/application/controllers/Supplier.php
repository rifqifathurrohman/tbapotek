<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Supplier_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "List data Supplier";
        $data['data_supplier'] = $this->Supplier_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('supplier/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_supplier)
    {
        $data['title'] = "Detail data Supplier";
        $data['data_supplier'] = $this->Supplier_model->getById($id_supplier);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('supplier/detail', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = "Tambah data Supplier";

        $this->form_validation->set_rules('id_supplier', 'ID Supplier', 'trim|required|numeric');
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('notelp', 'NO HP', 'trim|required|numeric');
        $this->form_validation->set_rules('penanggungjawab', 'Penanggung Jawab', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('supplier/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "id_supplier" => $this->input->post('id_supplier'),
                "nama_supplier" => $this->input->post('nama_supplier'),
                "alamat" => $this->input->post('alamat'),
                "notelp" => $this->input->post('notelp'),
                "penanggungjawab" => $this->input->post('penanggungjawab'),
                "KEY" => "algies"
            ];

            $insert = $this->Supplier_model->save($data);

            if ($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Data Ditambahkan');
                redirect('Supplier');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Data Duplikat!!');
                redirect('Supplier');
            } else {
                $this->session->set_flashdata('message', 'GAGAL!!');
                redirect('Supplier');
            }
        }
    }

    public function edit($id_supplier)
    {
        $data['title'] = "Ubah data Supplier";
        $data['data_supplier'] = $this->Supplier_model->getById($id_supplier);

        $this->form_validation->set_rules('id_supplier', 'ID Supplier', 'trim|required|numeric');
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('notelp', 'NO HP', 'trim|required|numeric');
        $this->form_validation->set_rules('penanggungjawab', 'Penanggung Jawab', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('supplier/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "id_supplier" => $this->input->post('id_supplier'),
                "nama_supplier" => $this->input->post('nama_supplier'),
                "alamat" => $this->input->post('alamat'),
                "notelp" => $this->input->post('notelp'),
                "penanggungjawab" => $this->input->post('penanggungjawab'),
                "KEY" => "algies"
            ];

            $update = $this->Supplier_model->update($data);

            if ($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Data telah diubah');
                redirect('Supplier');
            } elseif ($update['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Data Duplikat!!');
                redirect('Supplier');
            } else {
                $this->session->set_flashdata('message', 'GAGAL!!');
                redirect('Supplier');
            }
        }
    }

    public function delete($id_supplier)
    {
        $delete = $this->Supplier_model->delete($id_supplier);
        if ($delete['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('Supplier');
        } else {
            $this->session->set_flashdata('message', 'GAGAL!!');
            redirect('Supplier');
        }
    }
}

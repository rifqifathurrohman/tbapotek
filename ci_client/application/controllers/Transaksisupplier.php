<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksisupplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksisupplier_model');
        $this->load->library('form_validation');
        $this->load->model('Karyawan_model');
        $this->load->model('Supplier_model');
        $this->load->model('Obat_model');
    }

    public function index()
    {
        $data['title'] = "List data Transaksi Supplier";
        $data['data_transaksisupplier'] = $this->Transaksisupplier_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('Transaksisupplier/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_t_supplier)
    {
        $data['title'] = "Detail Data Transaksi Supplier";
        $data['data_transaksisupplier'] = $this->Transaksisupplier_model->getById($id_t_supplier);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('Transaksisupplier/detail', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = "Tambah Data Transaksi Supplier";

        $data['data_obat'] = $this->Obat_model->getAll();
        $data['data_supplier'] =$this->Supplier_model->getAll();
        $data['data_karyawan'] =$this->Karyawan_model->getAll();

        $this->form_validation->set_rules('id_t_supplier', 'ID T Supplier', 'trim|required|numeric');
        $this->form_validation->set_rules('id_obat', 'ID Obat', 'trim|required');
        $this->form_validation->set_rules('id_supplier', 'ID supplier', 'trim|required');
        $this->form_validation->set_rules('id_karyawan', 'ID Karyawan', 'trim|required');        
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
        $this->form_validation->set_rules('total_bayar', 'Total Bayar', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('Transaksisupplier/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "id_t_supplier" => $this->input->post('id_t_supplier'),
                "id_obat" => $this->input->post('id_obat'),
                "id_supplier" => $this->input->post('id_supplier'),
                "id_karyawan" => $this->input->post('id_karyawan'),
                "tanggal" => $this->input->post('tanggal'),
                "jumlah" => $this->input->post('jumlah'),
                "total_bayar" => $this->input->post('total_bayar'),
                "KEY" => "algies"
            ];

            $insert = $this->Transaksisupplier_model->save($data);
           
            if($insert['response_code']===201){
                $this->session->set_flashdata('flash', 'Data Ditambahkan');
                redirect('Transaksisupplier');
            } elseif ($insert['response_code']===400) {
                $this->session->set_flashdata('message', 'Data Duplikat!!');
                redirect('Transaksisupplier');
            }else{
                $this->session->set_flashdata('message', 'GAGAL!!');
                redirect('Transaksisupplier');
            }
        }

      
    }

    public function edit($id_t_supplier)
    {
        $data['title'] = "Ubah Data Transaksi Supplier";
        $data['data_transaksisupplier'] = $this->Transaksisupplier_model->getById($id_t_supplier);

        $data['data_obat'] = $this->Obat_model->getAll();
        $data['data_supplier'] =$this->Supplier_model->getAll();
        $data['data_karyawan'] =$this->Karyawan_model->getAll();

        $this->form_validation->set_rules('id_t_supplier', 'ID T Supplier', 'trim|required|numeric');
        $this->form_validation->set_rules('id_obat', 'ID Obat', 'trim|required');
        $this->form_validation->set_rules('id_supplier', 'ID supplier', 'trim|required');
        $this->form_validation->set_rules('id_karyawan', 'ID Karyawan', 'trim|required');        
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
        $this->form_validation->set_rules('total_bayar', 'Total Bayar', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('Transaksisupplier/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "id_t_supplier" => $this->input->post('id_t_supplier'),
                "id_obat" => $this->input->post('id_obat'),
                "id_supplier" => $this->input->post('id_supplier'),
                "id_karyawan" => $this->input->post('id_karyawan'),
                "tanggal" => $this->input->post('tanggal'),
                "jumlah" => $this->input->post('jumlah'),
                "total_bayar" => $this->input->post('total_bayar'),
                "KEY" => "algies"
            ];

            $update = $this->Transaksisupplier_model->update($data);
           
            if($update['response_code']===201){
                $this->session->set_flashdata('flash', 'Data telah diubah');
                redirect('Transaksisupplier');
            } elseif ($update['response_code']===400) {
                $this->session->set_flashdata('message', 'Data Duplikat!!');
                redirect('Transaksisupplier');
            }else{
                $this->session->set_flashdata('message', 'GAGAL!!');
                redirect('Transaksisupplier');
            }
        }
    }

    public function delete($id_t_supplier)
    {
        $delete = $this->Transaksisupplier_model->delete($id_t_supplier);
        if($delete['response_code']===200){
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('Transaksisupplier');
        }else{
            $this->session->set_flashdata('message', 'GAGAL!!');
            redirect('Transaksisupplier');
        }
    }
}

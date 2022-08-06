<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksipenjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksipenjualan_model');
        $this->load->model('Karyawan_model');
        $this->load->model('Pelanggan_model');
        $this->load->model('Obat_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "List data Transaksi Penjualan";
        $data['data_transaksipenjualan'] = $this->Transaksipenjualan_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('transaksipenjualan/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_t_penjualan)
    {
        $data['title'] = "Detail Data Transaksi Penjualan";
        $data['data_transaksipenjualan'] = $this->Transaksipenjualan_model->getById($id_t_penjualan);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('transaksipenjualan/detail', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = "Tambah Data Transaksi Penjualan";

        $data['data_obat'] = $this->Obat_model->getAll();
        $data['data_pelanggan'] = $this->Pelanggan_model->getAll();
        $data['data_karyawan'] = $this->Karyawan_model->getAll();

        $this->form_validation->set_rules('id_t_penjualan', 'id_t_Penjualan', 'trim|required|numeric');
        $this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'trim|required');
        $this->form_validation->set_rules('id_pelanggan', 'id_pelanggan', 'trim|required');
        $this->form_validation->set_rules('id_obat', 'id_obat', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
        $this->form_validation->set_rules('total_bayar', 'Total Bayar', 'trim|required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('transaksipenjualan/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "id_t_penjualan" => $this->input->post('id_t_penjualan'),
                "id_karyawan" => $this->input->post('id_karyawan'),
                "id_pelanggan" => $this->input->post('id_pelanggan'),
                "id_obat" => $this->input->post('id_obat'),
                "tanggal" => $this->input->post('tanggal'),
                "jumlah" => $this->input->post('jumlah'),
                "total_bayar" => $this->input->post('total_bayar'),
                "KEY" => "algies"
            ];

            $insert = $this->Transaksipenjualan_model->save($data);

            if ($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Data Ditambahkan');
                redirect('Transaksipenjualan');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Data Duplikat!!');
                redirect('Transaksipenjualan');
            } else {
                $this->session->set_flashdata('message', 'GAGAL!!');
                redirect('Transaksipenjualan');
            }
        }
    }

    public function edit($id_t_penjualan)
    {
        $data['title'] = "Ubah Data Transaksi Penjualan";
        $data['data_transaksipenjualan'] = $this->Transaksipenjualan_model->getById($id_t_penjualan);
        $data['data_obat'] = $this->Obat_model->getAll();
        $data['data_pelanggan'] = $this->Pelanggan_model->getAll();
        $data['data_karyawan'] = $this->Karyawan_model->getAll();

        $this->form_validation->set_rules('id_t_penjualan', 'id_t_Penjualan', 'trim|required|numeric');
        $this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'trim|required');
        $this->form_validation->set_rules('id_pelanggan', 'id_pelanggan', 'trim|required');
        $this->form_validation->set_rules('id_obat', 'id_obat', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
        $this->form_validation->set_rules('total_bayar', 'Total Bayar', 'trim|required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('transaksipenjualan/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "id_t_penjualan" => $this->input->post('id_t_penjualan'),
                "id_karyawan" => $this->input->post('id_karyawan'),
                "id_pelanggan" => $this->input->post('id_pelanggan'),
                "id_obat" => $this->input->post('id_obat'),
                "tanggal" => $this->input->post('tanggal'),
                "jumlah" => $this->input->post('jumlah'),
                "total_bayar" => $this->input->post('total_bayar'),
                "KEY" => "algies"
            ];

            $update = $this->Transaksipenjualan_model->update($data);

            if ($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Data telah diubah');
                redirect('Transaksipenjualan');
            } elseif ($update['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Data Duplikat!!');
                redirect('Transaksipenjualan');
            } else {
                $this->session->set_flashdata('message', 'GAGAL!!');
                redirect('Transaksipenjualan');
            }
        }
    }

    public function delete($id_t_penjualan)
    {
        $delete = $this->Transaksipenjualan_model->delete($id_t_penjualan);
        if ($delete['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('Transaksipenjualan');
        } else {
            $this->session->set_flashdata('message', 'GAGAL!!');
            redirect('Transaksipenjualan');
        }
    }
}

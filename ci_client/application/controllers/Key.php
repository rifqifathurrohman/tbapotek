<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Key extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Key_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Generated Key";
        // $data['data_key'] = $this->Key_model->getAll();
        $this->form_validation->set_rules('id', 'id', 'trim|required');
        $this->form_validation->set_rules('key', 'key', 'trim|required');

        if ($this->form_validation->run() == false){
          $this->load->view('templates/header', $data);
          $this->load->view('templates/menu');
          $this->load->view('key/index', $data);
          $this->load->view('templates/footer');

        } else {
          $data = [
            "id" => $this->input->post('id'),
            "key" => $this->input->post('key'),
            "KEY" => "algies"
          ];
          $insert = $this->Key_model->save($data);
          if($insert['response_code'] == 201) {
            $this->session->set_flashdata('flash', 'data ditambahkan');
            redirect('key');
          }elseif ($insert['response_code'] == 400) {
            $this->session->set_flashdata('message', 'data duplikat');
            redirect('key');

          }else {

              $this->session->set_flashdata('message', 'gagal!');
              redirect('key');
          }


        }
    }

    

    // public function add()
    // {
    //     $data['title'] = "Generated Key";

    //     $this->form_validation->set_rules('id', 'id', 'trim|required');
    //     $this->form_validation->set_rules('key', 'key', 'trim|required');

    //     if ($this->form_validation->run() == false){
    //       $this->load->view('templates/header', $data);
    //       $this->load->view('templates/menu');
    //       $this->load->view('key/add', $data);
    //       $this->load->view('templates/footer');

    //     } else {
    //       $data = [
    //         "id" => $this->input->post('id'),
    //         "key" => $this->input->post('key'),
    //         "KEY" => "algies"
    //       ];
    //       $insert = $this->Key_model->save($data);
    //       if($insert['response_code'] == 201) {
    //         $this->session->set_flashdata('flash', 'data ditambahkan');
    //         redirect('key');
    //       }elseif ($insert['response_code'] == 400) {
    //         $this->session->set_flashdata('message', 'data duplikat');
    //         redirect('key');

    //       }else {

    //           $this->session->set_flashdata('message', 'gagal!');
    //           redirect('key');
    //       }


    //     }
    // }

    
}
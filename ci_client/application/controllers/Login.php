<?php

class Login extends CI_Controller{
	public function __construct(){
		parent::__construct();
		// date_default_timezone_set('Asia/Jakarta');
		// if($this->session->login) redirect('buku');
		// $this->load->model('M_petugas', 'm_petugas');
		$this->load->model('User_model');
	}

	public function index(){
		$this->load->view('login');
	}

	public function proses_login(){
		if($this->input->post('role') === 'user') $this->_proses_login_user($this->input->post('username'));
		// elseif($this->input->post('role') === 'admin') $this->_proses_login_admin($this->input->post('username'));
		else {
			?>
			<script>
				alert('role tidak tersedia!')
			</script>
			<?php
		}
	}

	// protected function _proses_login_petugas($username){
	// 	$get_petugas = $this->m_petugas->lihat_username($username);
	// 	if($get_petugas){
	// 		if($get_petugas->password == $this->input->post('password')){
	// 			$session = [
	// 				'kode' => $get_petugas->kode,
	// 				'nama' => $get_petugas->nama,
	// 				'username' => $get_petugas->username,
	// 				'password' => $get_petugas->password,
	// 				'role' => $this->input->post('role'),
	// 				'jam_masuk' => date('H:i:s')
	// 			];

	// 			$this->session->set_userdata('login', $session);
	// 			$this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
	// 			redirect('dashboard');
	// 		} else {
	// 			$this->session->set_flashdata('error', 'Password Salah!');
	// 			redirect();
	// 		}
	// 	} else {
	// 		$this->session->set_flashdata('error', 'Username Salah!');
	// 		redirect();
	// 	}
	// }

	protected function _proses_login_user($username){
		$get_user = $this->User_model->lihat_username($username);
		if($get_user){
			if($get_user->password == $this->input->post('password')){
				$session = [
					
					'id_karyawan' => $get_user->id_karyawan,
					'nama_karyawan' => $get_user->nama_karyawan,
					'alamat' => $get_user->alamat,
					'notelp' => $get_user->notelp,
					'username' => $get_user->username,
					'password' => $get_user->passw
			
				];

				$this->session->set_userdata('login', $session);
				$this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
				redirect('obat');
			} else {
				$this->session->set_flashdata('error', 'Password Salah!');
				redirect();
			}
		} else {
			$this->session->set_flashdata('error', 'Username Salah!');
			redirect();
		}
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
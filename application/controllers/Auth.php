<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		check_already_login();
		$this->load->view('page/login');
	}

	public function loginOTP()
	{
		check_already_login();
		$this->load->view('page/loginOTP');
	}

	public function loginOTPConfirm()
	{
		check_already_login();
		$this->load->view('page/loginOtpConfirm');
	}


	public function logout()
	{
		$params = array('id','username','tipe_user','date_now');
		$this->session->unset_userdata($params);
		redirect('auth/login');
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])) {
			$this->load->model('user_m');
			$query = $this->user_m->login($post);
			if($query->num_rows() > 0) {
				$row = $query->row();
				$params = array (
					'id' => $row->id,					
					'username' => $row->username,					
					'nama' => $row->nama,					
					'email' => $row->email,					
					'hp' => $row->hp,					
					'tipe_user' => $row->tipe_user,
					'date_now' => date('Y:m:d H:i:s'),
				);
				$this->session->set_userdata($params);
				// $kalimat = "Terima kasih telah membuka logbook UPTKUKM Jatim, *".$row->nama."*\n\nSelamat Berkerja Penuh Khidmat untuk Lembaga, Bangsa, dan Negara";
				// $this->fungsi->sendWA("0".$row->hp,$kalimat);
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('danger','Login Gagal');
				redirect("auth/login");
			}
		} else {
			echo "Mau Main2 ya";
			redirect('auth/login');
		}
	}

	public function processotp()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])) {
			$this->load->model('user_m');
			$this->load->library('wa');

			$query = $this->user_m->getotp($post);
			if($query->num_rows() > 0) {
				$row = $query->row();
				$params = array (
					'id' => $row->id,					
					'nama' => $row->nama,					
					'email' => $row->email,					
					'hp' => $row->hp,					
				);
				$params['otp'] = rand(100000,999999);
				$this->session->set_userdata($params);
				$kalimat = "Kode OTP KAMU : ".$params['otp'];			
				$this->wa->waWhacenter(hp($post['hp']),$kalimat);
				$this->user_m->insertOtp($params);
				redirect('auth/loginOtpConfirm');
			} else {
				$this->session->set_flashdata('danger','Nomor tidak ditemukan');
				redirect("auth/loginotp");
			}
		} else {
			echo "Mau Main2 ya";
			redirect('auth/login');
		}
	}

	public function validationOTP()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])) {
			$this->load->model('user_m');
			$query = $this->user_m->validationOtp($post);
			if($query->num_rows() > 0) {
				$row = $query->row();
				$params = array (
					'id' => $row->id,					
					'username' => $row->username,					
					'nama' => $row->nama,					
					'email' => $row->email,					
					'hp' => $row->hp,					
					'tipe_user' => $row->tipe_user,
					'date_now' => date('Y:m:d H:i:s'),
				);
				$this->session->set_userdata($params);
				// $kalimat = "Terima kasih telah membuka logbook UPTKUKM Jatim, *".$row->nama."*\n\nSelamat Berkerja Penuh Khidmat untuk Lembaga, Bangsa, dan Negara";
				// $this->fungsi->sendWA("0".$row->hp,$kalimat);
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('danger','Login Gagal');
				redirect("auth/login");
			}
		} else {
			echo "Mau Main2 ya";
			redirect('auth/login');
		}
	}

}

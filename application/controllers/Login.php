<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Login extends CI_Controller {
	public function __construct(){
	parent::__construct();
 	$this->load->model('ModelLogin');
 	//$this->load->model('Mhome');
	$this->load->helper('url');  
}

public function index()

	{
	//	$this->ModelLogin->getsecurity();
		$this->load->view('login');
	}

	
	public function cek_login()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');

		$cek=$this->ModelLogin->cek_login($username,$password);
		if(count($cek)>0){
			if($cek[0]['status']==1){
				if($cek[0]['password']==$password){
					if($cek[0]['akses']==0){
						$_SESSION['admin'] = $this->session->set_userdata(array('id'=>$cek[0]['kduser'],'type'=>$cek[0]['akses']));
						redirect('admin'); }
					else if($cek[0]['akses']==1){
						$_SESSION['user'] = $this->session->set_userdata(array('id'=>$cek[0]['kduser'],'type'=>$cek[0]['akses']));
						redirect('page');}
				}else{
				$this->session->set_flashdata('error', 'Password Salah! ');
				redirect('login');}
			}else{
			$this->session->set_flashdata('error', 'Akun Belum di Aktivasi! ');
				redirect('login');
			}
		}else{
			$this->session->set_flashdata('error', 'Username Tidak Ditemukan! Pastikan kembali Username Anda ');
				redirect('login');
		}
	}
	
		
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

}

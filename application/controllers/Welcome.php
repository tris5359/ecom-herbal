<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
	parent::__construct();
 	$this->load->model('modelAdmin');
 	//$this->load->model('Mhome');
	$this->load->helper('url');  
	}

	public function index()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('admin/loginSistem');
	
	}	
}	

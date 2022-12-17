<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelLogin extends CI_Model {
public function __construct(){
		parent::__construct();
 $this->load->database();
	}

	public function cek_login($username,$password)
	{
		$query=$this->db->query('SELECT * from tb_user where username="'.$username.'" and password="'.$password.'" ');
		return $query->result_array();
	}
	
	/*public function getsecurity() {
		$username = $this->session->user('id')
		 if (empty($username)) {

		 	$this->session->sess_destroy();
		 	redirect('Clogin');
		 }
	} */
	
	public function get($id=null){
		$this->db->from('tb_user');
		if ($id != null) {
			$this->db->where('user_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	
	


}





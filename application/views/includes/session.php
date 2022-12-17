<?php
	date_default_timezone_set('Asia/Jakarta');

	if(isset($_SESSION['admin'])){
		header('location: admin/home.php');
	}


			$site = $this->db->query("SELECT * FROM site limit 1 ")->result_array();
		
	if(!empty($this->session->userdata('id'))){
		
			$id = $this->session->userdata('id');
			$user = $this->db->query("SELECT * FROM tb_user WHERE kduser= '".$id."' ")->result_array();

			$site = $this->db->query("SELECT * FROM site limit 1 ")->result_array();
			
	}
?>
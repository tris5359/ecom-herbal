<?php
	date_default_timezone_set('Asia/Jakarta');

	$id = $this->session->userdata('id');
	$user =$this->db->query("SELECT * FROM tb_user WHERE kdUser='".$id."'")->result_array();

	$site =$this->db->query("SELECT * FROM site limit 1")->result_array();

?>
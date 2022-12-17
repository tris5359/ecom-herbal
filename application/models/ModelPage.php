
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPage extends CI_Model {
public function __construct(){
		parent::__construct();
 $this->load->database();
	}

	public function messageSite($subjek,$msg){
		$data = $this->db->query("INSERT INTO tb_content (kodecontent, judul, isicontent) VALUES (NULL, '".$subjek."', '".$msg."')");
	}

	
	public function uploadFoto($new_cover, $npm) {
		$data = $this->db->query("UPDATE tb_mahasiswa a inner join tb_user b on a.kdUser=b.kdUser SET b.foto='".$new_cover."' WHERE a.NPM='".$npm."'");
	}
	public function GetKdUser($CEK) {
		$data = $this->db->query("SELECT b.kdUser  FROM tb_mahasiswa a inner join tb_user b on a.kdUser=b.kdUser where a.NPM like '".$CEK."'"); 
		return $data->result_array();
	}

	public function insertTanya($name,$email,$message,$tgl,$time){
		$data = $this->db->query("INSERT INTO `tb_tanyakami` (`kdtanya`, `namaLengkap`, `email`, `isi`, tgl, waktu) VALUES (NULL, '".$name."', '".$email."', '".$message."', '".$tgl."', '".$time."');");
	}

	



}





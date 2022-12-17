
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAdmin extends CI_Model {
public function __construct(){
		parent::__construct();
 $this->load->database();
	}

	public function hapusContact($kd) {
		$data = $this->db->query("DELETE FROM tb_content where kodecontent ='".$kd."'");
	}
	public function updateSiteSetting($namasitus, $taggline, $mail, $alamat, $notlp, $tentangtoko,$fototoko, $fotologo){
		$data = $this->db->query("UPDATE site SET sitename='".$namasitus."', tagline='".$taggline."', email='".$mail."', addressStore='".$alamat."', noTlp='".$notlp."', tentangToko='".$tentangtoko."', fotoToko='".$fototoko."', fotoLogo='".$fotologo."'");
	}
	public function updateBanner($foto, $text, $text2, $id) {
		$data = $this->db->query("UPDATE banner set img='".$foto."', text1='".$text."', text2='".$text2."' WHERE idbanner='".$id."'");
	}
	public function tambahProduk($kodeDetil,$namaBarang,$hargaBarang,$stok,$deskripsi,$deskripsi2,$foto) {
		$data = $this->db->query("INSERT INTO tb_barang(kodedetil, namabarang, harga, stok, deskripsiSingkat, deskripsi, foto) VALUES ('".$kodeDetil."','".$namaBarang."','".$hargaBarang."','".$stok."', '".$deskripsi."', '".$deskripsi2."','".$foto."') ");
	}

	public function hapusProduk($kd) {
		$data = $this->db->query("DELETE FROM tb_barang WHERE kodebarang='".$kd."'");
	}

	public function ubahProduk($kodebarang,$namaBarang,$hargaBarang,$stok,$deskripsi,$deskripsi2,$foto){
		$data = $this->db->query("UPDATE tb_barang set namabarang='".$namaBarang."', harga='".$hargaBarang."', stok='".$stok."', deskripsiSingkat='".$deskripsi."', deskripsi='".$deskripsi2."', foto='".$foto."' where kodebarang='".$kodebarang."'");
	}

	public function tambahKategori($kategori,$foto) {
		$data = $this->db->query("INSERT INTO tb_detilkategori(namadetil, fotoKategori) VALUES ('".$kategori."','".$foto."') ");
	}

	public function hapusCategory($kd) {
		$data = $this->db->query("DELETE FROM tb_detilkategori WHERE kodedetil='".$kd."'");
	}

	public function ubahKategori($kodedetil,$nama,$foto){
		$data = $this->db->query("UPDATE tb_detilkategori SET namadetil='".$nama."', fotoKategori='".$foto."' WHERE kodedetil='".$kodedetil."'");
	}

	public function tambahBlog($Judul,$deskripsi,$foto,$nama,$date){
		$data = $this->db->query("INSERT INTO `tb_blog` (`id`, `tglUpload`, `penulis`, `judul`, `content`, `foto`, `view`) VALUES (NULL, '".$date."', '".$nama."', '".$Judul."', '".$deskripsi."', '".$foto."', '0');");
	}

	public function ubahBlog($Judul,$deskripsi,$foto,$nama,$date,$id){
		$data = $this->db->query("UPDATE tb_blog SET tglUpload='".$date."', penulis='".$nama."', judul='".$Judul."', content='".$deskripsi."', foto='".$foto."' WHERE id='".$id."'");
	}
	public function hapusBlog($kd){
		$data = $this->db->query("DELETE FROM tb_blog WHERE id='".$kd."'");
	}






	
	public function get($id=null){
		$this->db->from('tb_user');
		if ($id != null) {
			$this->db->where('user_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}
	public function getsequrity() {
		$us= $this->session->userdata('id');
		if (empty($us)) {
			$this->session->sess_destroy();
			redirect('login');
		}
	}



}





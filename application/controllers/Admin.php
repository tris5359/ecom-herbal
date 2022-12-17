<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
	 	$this->load->model('ModelAdmin');
	 	//$this->load->model('Mhome');
		$this->load->helper('url');  
		require APPPATH.'libraries/phpmailer/src/Exception.php';
	 	require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
		require APPPATH.'libraries/phpmailer/src/SMTP.php';

	}

	public function index(){
	$this->ModelAdmin->getsequrity();
    $this->load->view('admin/page/beranda');	
	}	
	public function products(){
	$this->ModelAdmin->getsequrity();
    $this->load->view('admin/page/products');	
	}
	public function category(){
	$this->ModelAdmin->getsequrity();
    $this->load->view('admin/page/category');	
	}
	public function users(){
	$this->ModelAdmin->getsequrity();
    $this->load->view('admin/page/users');	
	}
	public function orders(){
	$this->ModelAdmin->getsequrity();
    $this->load->view('admin/page/orders');	
	}
	public function payments(){
	$this->ModelAdmin->getsequrity();
    $this->load->view('admin/page/payments');	
	}
	public function contact(){
	$this->ModelAdmin->getsequrity();
    $this->load->view('admin/page/contact');	
	}
	public function setting(){
	$this->ModelAdmin->getsequrity();
    $this->load->view('admin/page/setting');	
	}
	public function banner(){
	$this->ModelAdmin->getsequrity();
    $this->load->view('admin/page/banner');	
	}

	public function blog(){
	$this->ModelAdmin->getsequrity();
    $this->load->view('admin/page/blog');	
	}


	public function hapusContact(){
	    try{
	    $kd = $this->input->get('kodecontent');
		 $input=$this->ModelAdmin->hapusContact($kd);
		 $this->session->set_flashdata('success', 'Data Berhasil di Hapus!');
    }
    catch(PDOException $e){
      	$_SESSION['error'] = $e->getMessage();
    }
      redirect('admin/contact');
	}

	public function updateSiteSetting(){
		$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
	    $namasitus = $this->input->post('sitename');
		$taggline = $this->input->post('tagline');
		$mail = $this->input->post('email');
		$notlp = $this->input->post('notlp');
		$alamat = $this->input->post('alamat');
		$tentangtoko = $this->input->post('tentangtoko');

		$logo = $_FILES['fotologo']['name'];
		$foto = $_FILES['fototoko']['name'];

		$site =$this->db->query("SELECT * FROM site limit 1")->result_array();

		$file = $site[0]['fotoToko'];
		$file2 = $site[0]['fotoLogo'];

		$x = explode('.', $foto);
		$ekstensi = strtolower(end($x));

		$x1 = explode('.', $logo);
		$ekstensi1 = strtolower(end($x1));
		 
				if(!empty($foto)){
		            $config['allowed_types'] = 'jpg|jpeg|png';
		            $config['max_size'] = '5144';
		            $config['upload_path'] = './assets/images/toko/';
		            $this->load->library('upload', $config);
		            if ($this->upload->do_upload('fototoko')) {
		                $old_cover = $file;
		                unlink(FCPATH . 'assets/images/toko/' .$old_cover);
		                $fototoko = $this->upload->data('file_name');
		                $this->db->set('fototoko', $fototoko);          
					     }
				}else{
					 $fototoko = $file;
				}
				if(!empty($logo)){
		            $config['allowed_types'] = 'jpg|jpeg|png';
		            $config['max_size'] = '5144';
		            $config['upload_path'] = './assets/images/toko/';
		            $this->load->library('upload', $config);
		            if ($this->upload->do_upload('fotologo')) {
		                $old_cover = $file2;
		                unlink(FCPATH . 'assets/images/toko/' .$old_cover);
		                $fotologo = $this->upload->data('file_name');
		                $this->db->set('fotologo', $fotologo);          
					      }
				}else{
					 $fotologo = $file2;
				}
						
		       

		       try{
						$input=$this->ModelAdmin->updateSiteSetting($namasitus, $taggline, $mail, $alamat, $notlp, $tentangtoko,$fototoko, $fotologo);
				 		$this->session->set_flashdata('success', 'Informasi Website berhasil di perbarui');
					}
					catch(PDOException $e){
						$_SESSION['error'] = $e->getMessage();
					}

      redirect('admin/setting');
	}

	public function updateBanner(){
		$text1b1 = $this->input->post('text1b1');
		$text1b2 = $this->input->post('text1b2');
		$text1b3 = $this->input->post('text1b3');
		$text2b1 = $this->input->post('text2b1');
		$text2b2 = $this->input->post('text2b2');
		$text2b3 = $this->input->post('text2b3');
		$idb1 = $this->input->post('idb1');
		$idb2 = $this->input->post('idb2');
		$idb3 = $this->input->post('idb3');
		$oldb1 = $this->input->post('oldb1');
		$oldb2 = $this->input->post('oldb2');
		$oldb3 = $this->input->post('oldb3');

		$foto = $_FILES['fotob1']['name'];
		$foto2 = $_FILES['fotob2']['name'];
		$foto3 = $_FILES['fotob3']['name'];

		 
				if(!empty($foto)){
		            $config['allowed_types'] = 'jpg|jpeg|png';
		            $config['max_size'] = '5144';
		            $config['upload_path'] = './assets/images/banner/';
		            $this->load->library('upload', $config);
		            if ($this->upload->do_upload('fotob1')) {
		                $old_cover = $oldb1;
		                unlink(FCPATH . 'assets/images/banner/' .$old_cover);
		                $fotob1 = $this->upload->data('file_name');
		                $this->db->set('fotob1', $fotob1);          
					     }
				}else{
					 $fotob1 = $oldb1;
				}
				if(!empty($foto2)){
		            $config['allowed_types'] = 'jpg|jpeg|png';
		            $config['max_size'] = '5144';
		            $config['upload_path'] = './assets/images/banner/';
		            $this->load->library('upload', $config);
		            if ($this->upload->do_upload('fotob2')) {
		                $old_cover = $oldb2;
		                unlink(FCPATH . 'assets/images/banner/' .$old_cover);
		                $fotob2 = $this->upload->data('file_name');
		                $this->db->set('fotob2', $fotob2);          
					     }
				}else{
					 $fotob2 = $oldb2;
				}
				if(!empty($foto3)){
		            $config['allowed_types'] = 'jpg|jpeg|png';
		            $config['max_size'] = '5144';
		            $config['upload_path'] = './assets/images/banner/';
		            $this->load->library('upload', $config);
		            if ($this->upload->do_upload('fotob3')) {
		                $old_cover = $oldb3;
		                unlink(FCPATH . 'assets/images/banner/' .$old_cover);
		                $fotob3 = $this->upload->data('file_name');
		                $this->db->set('fotob3', $fotob3);          
					     }
				}else{
					 $fotob3 = $oldb3;
				}

		       try{
						$input=$this->ModelAdmin->updateBanner($fotob1, $text1b1, $text2b1, $idb1);
						$inpu2t=$this->ModelAdmin->updateBanner($fotob2, $text1b2, $text2b2, $idb2);
						$input3=$this->ModelAdmin->updateBanner($fotob3, $text1b3, $text2b3, $idb3);
				 		$this->session->set_flashdata('success', 'Informasi Website berhasil di perbarui');
					}
					catch(PDOException $e){
						$_SESSION['error'] = $e->getMessage();
					}

      redirect('admin/banner');
	}

	public function tambahProduk(){
		try{

			$namaBarang = $this->input->post('NamaBarang');
			$hargaBarang = $this->input->post('Harga');
			$stok = $this->input->post('stok');
			$deskripsi = $this->input->post('Deskripsi');
			$deskripsi2 = $this->input->post('Deskripsi2');
			$deskripsi = str_replace('<p>', '', $deskripsi);
			$deskripsi2 = str_replace('<p>', '', $deskripsi2);
			$deskripsi = str_replace('</p>', '', $deskripsi);
			$deskripsi2 = str_replace('</p>', '', $deskripsi2);
			$kodeDetil = $this->input->post('kodedetil');

			$image = $_FILES['foto']['name'];

			if (empty($image)) {
				?>
				<script type="text/javascript">
					alert('Gambar Produk Tidak Boleh Kosong!');
					window.history.go(-1);
				</script>
				<?php
				exit();
			}else{
				if(!empty($image)){
		            $config['allowed_types'] = 'jpg|jpeg|png';
		            $config['max_size'] = '5144';
		            $config['upload_path'] = './assets/images/';
		            $this->load->library('upload', $config);
		            if ($this->upload->do_upload('foto')) {
		                $foto = $this->upload->data('file_name');
		                $this->db->set('foto', $foto);          
					     }
				}else{
					 $foto = $foto;
				}

			}

		    $input=$this->ModelAdmin->tambahProduk($kodeDetil,$namaBarang,$hargaBarang,$stok,$deskripsi,$deskripsi2,$foto);
			$this->session->set_flashdata('success', 'Behasil Menambahkan Produk!');
				   
	    }
	    catch(PDOException $e){
	      	$_SESSION['error'] = $e->getMessage();
	    }
		
	      redirect('admin/products');
	}

	public function hapusProduk(){
	    try{
	     $fotolama = $this->input->get('fotolama');
	     $kd = $this->input->get('kodebarang');
		 
		 unlink(FCPATH . 'assets/images/' .$fotolama);

		 $input=$this->ModelAdmin->hapusProduk($kd);
		 $this->session->set_flashdata('success', 'Berhasil Menghapus Produk!');
    }
    catch(PDOException $e){
      	$_SESSION['error'] = $e->getMessage();
    }
      redirect('admin/products');
	}

	public function ubahProduk(){
		try{

			$namaBarang = $this->input->post('NamaBarang');
			$hargaBarang = $this->input->post('harga1');
			$stok = $this->input->post('stok');
			$deskripsi = $this->input->post('Deskripsi');
			$deskripsi2 = $this->input->post('Deskripsi2');
			$kodebarang = $this->input->post('kodebarang');

			$fotolama = $this->input->post('fotolama');
			$image = $_FILES['foto']['name'];

				if(!empty($image)){
		            $config['allowed_types'] = 'jpg|jpeg|png';
		            $config['max_size'] = '5144';
		            $config['upload_path'] = './assets/images/';
		            $this->load->library('upload', $config);
		            if ($this->upload->do_upload('foto')) {
		                $old_cover = $fotolama;
		                unlink(FCPATH . 'assets/images/' .$old_cover);
		                $foto = $this->upload->data('file_name');
		                $this->db->set('foto', $foto);          
					     }
				}else{
					 $foto = $fotolama;
				}

			

		    $input=$this->ModelAdmin->ubahProduk($kodebarang,$namaBarang,$hargaBarang,$stok,$deskripsi,$deskripsi2,$foto);
			$this->session->set_flashdata('success', 'Behasil Menambahkan Produk!');
				   
	    }
	    catch(PDOException $e){
	      	$_SESSION['error'] = $e->getMessage();
	    }
		
	      redirect('admin/products');
	}

	public function tambahKategori(){
		try{

			$kategori = $this->input->post('kategori');
			$image = $_FILES['foto']['name'];

			if (empty($image)) {
				?>
				<script type="text/javascript">
					alert('Gambar Produk Tidak Boleh Kosong!');
					window.history.go(-1);
				</script>
				<?php
				exit();
			}else{
				if(!empty($image)){
		            $config['allowed_types'] = 'jpg|jpeg|png';
		            $config['max_size'] = '5144';
		            $config['upload_path'] = './assets/images/';
		            $this->load->library('upload', $config);
		            if ($this->upload->do_upload('foto')) {
		                $old_cover = $foto;
		                unlink(FCPATH . 'assets/images/' .$old_cover);
		                $foto = $this->upload->data('file_name');
		                $this->db->set('foto', $foto);          
					     }
				}else{
					 $foto = $foto;
				}

			}

		    $input=$this->ModelAdmin->tambahKategori($kategori,$foto);
			$this->session->set_flashdata('success', 'Behasil Menambahkan Kategori!');
				   
	    }
	    catch(PDOException $e){
	      	$_SESSION['error'] = $e->getMessage();
	    }
		
	      redirect('admin/category');
	}

	public function hapusCategory(){
	    try{
	     $fotolama = $this->input->get('fotolama');
	     $kd = $this->input->get('kodedetil');
		 
		 unlink(FCPATH . 'assets/images/' .$fotolama);

		 $input=$this->ModelAdmin->hapusCategory($kd);
		 $this->session->set_flashdata('success', 'Berhasil Menghapus Kategori!');
    }
    catch(PDOException $e){
      	$_SESSION['error'] = $e->getMessage();
    }
      redirect('admin/category');
	}

	public function ubahKategori(){
		try{

			$nama = $this->input->post('nama');
			$kodedetil = $this->input->post('kodedetil');

			$fotolama = $this->input->post('fotolama');
			$image = $_FILES['foto']['name'];

				if(!empty($image)){
		            $config['allowed_types'] = 'jpg|jpeg|png';
		            $config['max_size'] = '5144';
		            $config['upload_path'] = './assets/images/';
		            $this->load->library('upload', $config);
		            if ($this->upload->do_upload('foto')) {
		                $old_cover = $fotolama;
		                unlink(FCPATH . 'assets/images/' .$old_cover);
		                $foto = $this->upload->data('file_name');
		                $this->db->set('foto', $foto);          
					     }
				}else{
					 $foto = $fotolama;
				}

			

		    $input=$this->ModelAdmin->ubahKategori($kodedetil,$nama,$foto);
			$this->session->set_flashdata('success', 'Behasil Menambahkan Kategori!');
				   
	    }
	    catch(PDOException $e){
	      	$_SESSION['error'] = $e->getMessage();
	    }
		
	      redirect('admin/category');
	}

	public function tambahBlog(){
		try{

			$Judul = $this->input->post('Judul');
			$deskripsi = $this->input->post('Konten');
			$nama = $this->input->post('nama');
			$deskripsi = str_replace('<p>', '', $deskripsi);
			$deskripsi = str_replace('</p>', '', $deskripsi);

			$date = date('Y-m-d');
			$image = $_FILES['foto']['name'];

				if(!empty($image)){
		            $config['allowed_types'] = 'jpg|jpeg|png';
		            $config['max_size'] = '5144';
		            $config['upload_path'] = './assets/images/';
		            $this->load->library('upload', $config);
		            if ($this->upload->do_upload('foto')) {
		                $foto = $this->upload->data('file_name');
		                $this->db->set('foto', $foto);          
					     }
				}else{
					 $foto = $foto;
				}

		    $input=$this->ModelAdmin->tambahBlog($Judul,$deskripsi,$foto,$nama,$date);
			$this->session->set_flashdata('success', 'Behasil Menambahkan Blog!');
				   
	    }
	    catch(PDOException $e){
	      	$_SESSION['error'] = $e->getMessage();
	    }
		
	      redirect('admin/blog');
	}

		public function ubahBlog(){
		try{

			$Judul = $this->input->post('Judul');
			$deskripsi = $this->input->post('Konten');
			$nama = $this->input->post('nama');
			$fotolama = $this->input->post('fotolama');
			$id = $this->input->post('id');
			$deskripsi = str_replace('<p>', '', $deskripsi);
			$deskripsi = str_replace('</p>', '', $deskripsi);

			$date = date('Y-m-d');
			$image = $_FILES['foto']['name'];

					if(!empty($image)){
		            $config['allowed_types'] = 'jpg|jpeg|png';
		            $config['max_size'] = '5144';
		            $config['upload_path'] = './assets/images/';
		            $this->load->library('upload', $config);
		            if ($this->upload->do_upload('foto')) {
		                $old_cover = $fotolama;
		                unlink(FCPATH . 'assets/images/' .$old_cover);
		                $foto = $this->upload->data('file_name');
		                $this->db->set('foto', $foto);          
					     }
				}else{
					 $foto = $fotolama;
				}

		    $input=$this->ModelAdmin->ubahBlog($Judul,$deskripsi,$foto,$nama,$date,$id);
			$this->session->set_flashdata('success', 'Behasil Mengubah Blog!');
				   
	    }
	    catch(PDOException $e){
	      	$_SESSION['error'] = $e->getMessage();
	    }
		
	      redirect('admin/blog');
	}

	public function hapusBlog(){
	    try{
	     $fotolama = $this->input->get('fotolama');
	     $kd = $this->input->get('id');
		 
		 unlink(FCPATH . 'assets/images/' .$fotolama);

		 $input=$this->ModelAdmin->hapusBlog($kd);
		 $this->session->set_flashdata('success', 'Berhasil Menghapus Blog!');
    }
    catch(PDOException $e){
      	$_SESSION['error'] = $e->getMessage();
    }
      redirect('admin/blog');
	}





	
}
?>
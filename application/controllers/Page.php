<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



class Page extends CI_Controller {
	public function __construct(){
	parent::__construct();
 	$this->load->model('ModelPage');
 	//$this->load->model('Mhome');
	$this->load->helper('url');  

					require APPPATH.'libraries/phpmailer/src/Exception.php';
	                require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
	                require APPPATH.'libraries/phpmailer/src/SMTP.php';
	}

	public function index()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('index');
	
	}	
	public function Product()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('Product');
	
	}
	public function Track_Oder()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('Track-oder');
	
	}
	public function Payment()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('Payment');
	
	}		
	public function About()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('About');
	
	}
	public function Contact()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('Contact');
	
	}
	public function lihatPemesanan()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('lihatPemesanan');
	
	}
	public function productDetail()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('product-detail');
	
	}
	public function category()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('category');
	
	}
	public function search()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('search');
	
	}

	public function shopingCart()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('shoping-cart');
	
	}
	public function register()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('register');
	
	}
	public function profile()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('profile');
	
	}
	public function aktivasiAkun()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('aktivasiAkun');
	
	}
	public function thanks()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('thanks');
	
	}
	public function blog()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('blog');
	
	}
	public function blogDetail()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('blog-detail');
	
	}
	
	public function messageSite(){
	try{
	    $subjek = $this->input->post('subjek');
	    $msg = $this->input->post('msg');

		 $input=$this->modelPage->messageSite($subjek,$msg);
		 $this->session->set_flashdata('success', 'Masukkan/saran anda Berhasil dikirim ke toko');
    }
    catch(PDOException $e){
      	$_SESSION['error'] = $e->getMessage();
    }
      redirect('page/Contact');
	}

	public function updateCart(){
	try{
	    $subjek = $this->input->post('subjek');
	    $msg = $this->input->post('msg');

		 
	$id = $this->input->post('id');
	$qty = $this->input->post('num-product1');

	if(!empty($this->session->userdata('id'))){
		try{
	  		$this->db->query("UPDATE tb_keranjang SET banyak='".$qty."' WHERE id='".$id."'");
		 	$this->session->set_flashdata('success', 'Jumlah Item di Update');
		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}
	else{
		foreach($_SESSION['cart'] as $key => $row){
			if($row['produkid'] == $id){
				$_SESSION['cart'][$key]['banyak'] = $qty;
		 	$this->session->set_flashdata('success', 'Jumlah Item di Update');

			}
		}
	}

    }
    catch(PDOException $e){
      	$_SESSION['error'] = $e->getMessage();
    }
       ?>
				<script type="text/javascript">
					window.history.go(-1);
				</script>
				<?php
				exit();
	}

	public function deleteCart(){
	try{
	    
	$id =$this->input->get('Act');
	$product =$this->input->get('mod');
	$rl =$this->input->get('rl');

	if(!empty($this->session->userdata('id'))){
		try{
	  		$this->db->query("DELETE FROM tb_keranjang WHERE id='".$id."'");
		 	$this->session->set_flashdata('success', 'Item '.$product.' dihapus dari Keranjang');

			
		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}
	else{
		foreach($_SESSION['cart'] as $key => $row){
			if($row['produkid'] == $id){
				unset($_SESSION['cart'][$key]);
		 		$this->session->set_flashdata('success', 'Item '.$product.' dihapus dari Keranjang');
				
			}
		}
	}


    }
    catch(PDOException $e){
      	$_SESSION['error'] = $e->getMessage();
    }
      ?>
				<script type="text/javascript">
					window.history.go(-1);
				</script>
				<?php
				exit();
	}


	public function addKeranjang(){
	try{

	    $id = $this->input->post('id');
		$banyak = $this->input->post('banyak');
		$stok =$this->input->post('stok');
		$nama =$this->input->post('nama');
		$kduser =$this->input->post('kduser');

	if(!empty($this->session->userdata('id'))){
		if ($banyak > $stok) {
			$_SESSION['error'] = true;
		 	$this->session->set_flashdata('error', 'Stok Produk Tidak Cukup');
	}
	else{
			
	  $row = $this->db->query("SELECT *, COUNT(*) AS numrows FROM tb_keranjang WHERE kodepelanggan='".$kduser."' AND kodebarang='".$id."'")->result_array();
		if($row[0]['numrows'] < 1){
			try{
	  			$this->db->query("INSERT INTO tb_keranjang (kodepelanggan, kodebarang, banyak) VALUES ('".$kduser."', '".$id."', '".$banyak."')");
		 			$this->session->set_flashdata('success', 'Item ditambahkan ke Keranjang');
				
			}
			catch(PDOException $e){
				$_SESSION['error'] = true;
				$_SESSION['error'] = $e->getMessage();
			}
		}
		else{
			$_SESSION['error'] = true;
		 	$this->session->set_flashdata('error', 'Produk sudah di Keranjang');
		}
		}
}else{
		if(!isset($_SESSION['cart'])){
			$_SESSION['cart'] = array();
		}

		$exist = array();

		foreach($_SESSION['cart'] as $row){
			array_push($exist, $row['produkid']);
		}

		if(in_array($id, $exist)){
			$_SESSION['error'] = true;
		 	$this->session->set_flashdata('error', 'Produk sudah di Keranjang');
		}
		else{
			$data['produkid'] = $id;
			$data['banyak'] = $banyak;

			if(array_push($_SESSION['cart'], $data)){
		 	$this->session->set_flashdata('success', 'Item di Tambahkan ke Keranjang');
			}
			else{
				$_SESSION['error'] = true;
		 	$this->session->set_flashdata('error', 'Tidak Bisa Menambahkan Item ke Keranjang');
			}
		}

	}


    }
    catch(PDOException $e){
      	$_SESSION['error'] = $e->getMessage();
    }
      ?>
				<script type="text/javascript">
					window.history.go(-1);
				</script>
				<?php
				exit();
	}





	public function registerUser(){
	$nama_depan = $this->input->post('nama_depan');
	    $nama_belakang = $this->input->post('nama_belakang');
	    $jk = $this->input->post('jk');
	    $email = $this->input->post('email');
	    $username = $this->input->post('username');

	    $pass = $this->input->post('password');
	    $konpass = $this->input->post('repassword');

		if($pass != $konpass){
		 	$this->session->set_flashdata('error', 'konfirmasi Kata sandi tidak sesuai');
      		redirect('page/register');
		  		exit();	

		}else{
				$now = date('Y-m-d');
				$password = password_hash($pass, PASSWORD_DEFAULT);

				//generate code
				$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$code=substr(str_shuffle($set), 0, 15);
				$type = 5;
				$status = 3;
				try{
					
					$message = '					
					<div  style="margin-left: 5%;width: 80%;box-shadow: 0px 20px 20px 5px #555;padding: 50px">
					  <div style=" font-family: andalus;font-size:16px">
					      <h2 style="text-align: center;pad">Aktivasi Akun</h2>
					      <div style="margin-left: 5%;margin-top: 50px">
					        <h2>Terima kasih telah mendaftar.</h2>
							<p>Username: '.$username.'</p>
							<p>Password: '.$pass.'</p>
							<p>Silakan klik tautan di bawah ini untuk mengaktifkan akun Anda.</p>
					      </div>
					      <div style="text-align: center;margin-top: 80px">
					        <a href="http://localhost/herbal/page/aktivasiAkun?code='.$code.'&k='.base64_encode($username).'" style="padding: 10px 50px;text-transform: uppercase;background-color: #2196F3;color: #fff;border-radius: 20px;border:2px solid #00BCD4;text-decoration:none ">Aktivasi Akun</a>
					      </div>
					  </div></div>
					</div>';
					//username :SITUA
					//Password : Kakaka;1

		    		
	    			
					$response = false;
                     $mail = new PHPMailer();                         
				    try {
				        //Server settings            
				        $mail->isSMTP();                                     
				        $mail->Host = 'smtp.gmail.com';                      
				        $mail->SMTPAuth = true;                               
				        $mail->Username = 'si.bimbingan.informatika@gmail.com';     
				        $mail->Password = 'abcd9876';                    
				        $mail->SMTPOptions = array(
			            'ssl' => array(
			            'verify_peer' => false,
			            'verify_peer_name' => false,
			            'allow_self_signed' => true
			            )
			        );                        
				        $mail->SMTPSecure = 'ssl';                           
				        $mail->Port = 465;                                   

				        $mail->setFrom('si.bimbingan.informatika@gmail.com');
				        
				        //Recipients
				        $mail->addAddress($email);              
				        $mail->addReplyTo('si.bimbingan.informatika@gmail.com');
				       
				        //Content
				        $mail->isHTML(true);                                  
				        $mail->Subject = 'Register Akun';
				        $mail->Body    = $message;
				        $mail->send();
	  					$this->db->query("INSERT INTO  tb_user (username, namadepan, namabelakang, email, password, status, akses, codeAktivasiAkun) VALUES ('".$username."', '".$nama_depan."', '".$nama_belakang."', '".$email."', '".$pass."', '0', '1', '".$code."')");


		 				$this->session->set_flashdata('success', 'Akun telah dibuat. Periksa email Anda untuk mengaktifkan akun anda');
			        
				        
				        redirect('page/register');

				    } 
				    catch (Exception $e) {
		 				$this->session->set_flashdata('error', 'Pesan Gagal terkirim, silakan coba lagi!');
				        redirect('page/register');
				    }


				}
				catch(PDOException $e){
		 				$this->session->set_flashdata('error', $e->getMessage());
					redirect('page/register');
				}

			}
      redirect('page/register');
	}

	public function pembayaran(){
	try{
	    $nama_depan =  $this->input->post('nama_depan');
    $nama_belakang =  $this->input->post('nama_belakang');
    $alamatp =  $this->input->post('alamatp');
    $daerah =  $this->input->post('daerah');
    $pos =  $this->input->post('pos');
    $email =  $this->input->post('email');
    $no_tlp =  $this->input->post('no_tlp');
    $catatan =  $this->input->post('catatan');
    $kduser =  $this->input->post('kduser');
    $date = date('Y-m-d');

      $set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code='HI'.substr(str_shuffle($set), 0, 15);
        $status='Proses';

        try{
      
	  $input=$this->db->query("INSERT INTO tb_pemesanan ( kodepelanggan, kodetransaksi, namadepan, namabelakang, notlp, alamatpenerima, daerah, kdpos, tglbeli, status) VALUES ( '".$kduser."', '".$code."', '".$nama_depan."', '".$nama_belakang."', '".$no_tlp."', '".$alamatp."', '".$daerah."', '".$pos."', '".$date."', '".$status."') ");

      $salesid = $this->db->insert_id();
      
      try{
	  $stmt=$this->db->query("SELECT *, tb_keranjang.banyak as quantity FROM tb_keranjang LEFT JOIN tb_barang ON tb_barang.kodebarang =tb_keranjang.kodebarang  WHERE kodepelanggan ='".$kduser."'")->result_array();

        foreach($stmt as $row){
	  $this->db->query("INSERT INTO vnota (tglnota, idpemesanan, kodebarang, banyak) VALUES ( '".$date."',  '".$salesid."',  '".$row['kodebarang']."',  '".$row['quantity']."') ");
        }
	  $this->db->query("DELETE FROM tb_keranjang WHERE kodepelanggan = '".$kduser."'");

		$this->session->set_flashdata('success', 'Transaksi berhasil. Terima kasih.');
      redirect('page/thanks?code='.$code);
          exit();

      }
      catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
      }

    }
    catch(PDOException $e){
      $_SESSION['error'] = $e->getMessage();
    }

    }
    catch(PDOException $e){
      	$_SESSION['error'] = $e->getMessage();
    }
      redirect('page/Contact');
	}
}



	
	
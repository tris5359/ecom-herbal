<?php include 'includes/session.php'; ?>

<?php include 'includes/header.php'; ?>
	<title><?php echo $site[0]['sitename'] ?> - Account Activation</title>

	<?php
	$outputC = '';
	if(!isset($_GET['code']) OR !isset($_GET['k'])){
		$outputC .= '
			<div class="alert alert-danger">
                <h3><i class="icon fa fa-warning" style="font-size:200px"></i><br> Error!</h3>
                <p style="font-size:25px;color:#000">Kode aktivasi akun tidak ditemukan! silakan cek email saat anda mendaftarkan akun
            </div>
	            <p style="font-size:20px;color:#222">Anda Dapat Melakukan <a href="<?php echo base_url()?>page/register" class="btn-default">REGISTER</a></p>
            
		'; 
	}
	else{
		$kodepelanggan = base64_decode($_GET['k']);

	    $row = $this->db->query("SELECT *, COUNT(*) AS numrows FROM tb_user WHERE codeAktivasiAkun='".$_GET['code']."' AND username='".$kodepelanggan."'")->result_array();

		if($row[0]['numrows'] > 0){
			if($row[0]['status']!=0){
				$outputC .= '
					<div class="alert alert-danger">
		                <h3><i class="icon fa fa-warning" style="font-size:200px"></i><br> Error!</h3>
		                <p style="font-size:25px;color:#000">Akun sudah diaktivasi
		            </div>
		            <p style="font-size:20px;color:#222">Anda Sudah Dapat <a href="index.php?View=login" class="btn-default">LOGIN</a> Menggunakan Akun Anda</p>
				';
			}
			else{
				try{
	    			$this->db->query("UPDATE tb_user SET status=1 WHERE codeAktivasiAkun='".$_GET['code']."' AND username='".$row[0]['username']."'");
					$outputC .= '
						<div class="alert alert-success">
			                <h3><i class="icon fa fa-check" style="font-size:200px"></i><br> Success!</h3>
			                <p style="font-size:25px;color:#000">Akun sudah diaktivasi </b>
			            </div>
		            <p style="font-size:20px;color:#222">Anda Sudah Dapat <a href="index.php?View=login" class="btn-default">LOGIN</a> Menggunakan Akun Anda</p>
			            
					';
				}
				catch(PDOException $e){
					$outputC .= '
						<div class="alert alert-danger">
			                <h3><i class="icon fa fa-warning" style="font-size:200px"></i><br> Error!</h3>
			                <p style="font-size:25px;color:#000">'.$e->getMessage().'
			            </div>
			            <p style="font-size:20px;color:#222">Anda Dapat Melakukan <a href="<?php echo base_url()?>page/register" class="btn-default">REGISTER</a></p>
					';
				}

			}
			
		}
		else{
			$outputC .= '
				<div class="alert alert-danger">
	                <h3><i class="icon fa fa-warning" style="font-size:200px"></i><br> Error!</h3>
	                <p style="font-size:25px;color:#000">Tidak dapat mengaktivasi akun, Code akun Salah! silakan Periksa kembali email anda.
	            </div>
	            <p style="font-size:20px;color:#222">Anda Dapat Melakukan <a href="<?php echo base_url()?>page/register" class="btn-default">REGISTER</a></p>
			';
		}

	}
?>
<body class="animsition">
	<!-- navigasi bar -->
	<?php include 'includes/navbar.php'; ?>
	<!-- Sidebar -->
	<?php include 'includes/sidebar.php'; ?>
	<!-- Cart -->
	<?php include 'includes/cart.php'; ?>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../assets/images/jenis-jamur-yang-bisa-dikonsumsi.jpg');margin-top: 80px">
		<h2 class="ltext-105 cl0 txt-center">
			account activation
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-50 ">
		<div class="container">
				<div style="width: 96%;margin-left: 2%;box-shadow: 0px 10px 10px 1px #333">
        <div class="row" style="margin-top: 50px; margin-bottom: 40px">
          <div class="col-md-12 text-center">
            <span style="font-size: 100px; " class="icon-check_circle display-3 text-success"></span>
            <section class="content">
	        <div class="row">
	        	<div class="col-sm-12 m-t-65 m-b-80" style="font-family: andalus;">
	        		<?php echo $outputC; ?>
	        	</div>
	        </div>
	      </section>
          </div>
    </div><br>
</div>
		</div>
	</section>	
	
	


	<!-- Footer -->
	<?php include 'includes/footer.php'; ?>
	<?php include 'includes/scripts.php'; ?>
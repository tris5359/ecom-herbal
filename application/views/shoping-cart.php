<?php include 'includes/session.php'; ?>

<?php include 'includes/header.php'; ?>
	<title><?php echo $site[0]['sitename'] ?> - Shoping Cart</title>
<body class="animsition">
	<!-- navigasi bar -->
	<?php include 'includes/navbar.php'; ?>
	<!-- Sidebar -->
	<?php include 'includes/sidebar.php'; ?>
	<!-- Cart -->
	<?php include 'includes/cart.php'; ?>



	<?php
	$output ='';
	$output2 ='';
	$i = 1;


	if(!empty($this->session->userdata('id'))){
		if(isset($_SESSION['cart'])){
			foreach($_SESSION['cart'] as $row){
	  			$crow = $this->db->query("SELECT *, COUNT(*) AS numrows FROM tb_keranjang WHERE kodepelanggan='".$user[0]['kduser']."' AND kodebarang='".$row['produkid']."'")->result_array();
				if($crow[0]['numrows'] < 1){
	  				$this->db->query("INSERT INTO tb_keranjang (kodepelanggan, kodebarang, banyak) VALUES ('".$user[0]['kduser']."', '".$row['produkid']."', '".$row['banyak']."')");
				}
				else{
	  				$this->db->query("UPDATE tb_keranjang SET banyak='".$row['banyak']."' WHERE kodepelanggan='".$user[0]['kduser']."' AND kodebarang='".$row['produkid']."')");
				}
			}
			unset($_SESSION['cart']);
		}

		try{
	  		$jumbarang = $this->db->query("SELECT COUNT(*) AS numrows FROM tb_keranjang WHERE kodepelanggan='".$user[0]['kduser']."' ")->result_array();
			if ($jumbarang[0]['numrows'] != 0) {
			$total = 0;
	  		$stmt = $this->db->query("SELECT *, tb_barang.harga as hargabarang, tb_keranjang.id as idcart FROM tb_keranjang LEFT JOIN tb_barang ON tb_barang.kodebarang=tb_keranjang.kodebarang WHERE tb_keranjang.kodepelanggan='".$user[0]['kduser']."' ")->result_array();			
	  		foreach($stmt as $row){
				$image = (!empty($row['foto'])) ? base_url().'assets/images/'.$row['foto'] : base_url().'assets/images/noimage.jpg';
				$subtotal = $row['hargabarang']*$row['banyak'];
				$total += $subtotal;
				$output .= '		
				<tr class="table_row">
									<td class="column-1">
									<ul class="header-cart-wrapitem w-full">
										<li class="header-cart-item flex-w flex-t ">
										
										<a href="deleteCart?Act='.$row['idcart'].'&mod='.$row['namabarang'].'&rl='.$_SERVER['REQUEST_URI'].'" class="header-cart-item-img">

											<img src="'.$image.'" alt="IMG">
										</a>
										</li>
										</ul>
									</td>
									<td class="column-2">'.$row['namabarang'].'</td>
									<td class="column-3">Rp. '.number_format($row['hargabarang'],0,',','.').'</td>
									<form action="updateCart" method="post">
									<input class="mtext-104 cl3 txt-center num-product" type="hidden" name="id" value="'.$row['idcart'].'">
									<td class="column-4">
									<input type="hidden" id="idharga'.$i.'" class="hidden" value="'.$row['hargabarang'].'">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" onclick="return eventcartmin'.$i.'()">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" id="idqty'.$i.'" name="num-product1" value="'.$row['banyak'].'" onkeyup="cartsub'.$i.'()">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" onclick="return eventcart'.$i.'()">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td class="column-5">
									<input type="text" style="position:absolute;padding-left:70px;margin-top:-10px;margin-right:70px;" id="idtotal'.$i.'" value="Rp. '.number_format($subtotal, 0,',','.').'">
										<button style="position:absolute;width:50px;float:right;margin-left:22%;margin-top:-20px"  class="flex-c-m stext-101 cl0 size-121 bg1 bor1 hov-btn1 p-lr-15 trans-04 pointer" name="pesan">
											edit
										</button>
									</td>
									</form>
								</tr>

				';

				$i++;

			}
				$output2 .= "Total Belanja:  Rp. ".number_format($total,0,',','.');


		}else{
			$output .= '
				<tr class="table_row" ><td colspan="5" align="center">Keranjang Belanja Kosong</td></tr>
			';
		}

		}	
		catch(PDOException $e){
			$output .= $e->getMessage();
		}

	}
	else{
		if(isset($_SESSION['cart'])){
		if(count($_SESSION['cart']) != 0){
			$total = 0;
			foreach($_SESSION['cart'] as $row){
	  		$produk3 = $this->db->query("SELECT *, tb_barang.harga as hargabarang FROM tb_barang LEFT JOIN tb_detilkategori ON tb_detilkategori.kodedetil=tb_barang.kodedetil WHERE tb_barang.kodebarang='".$row['produkid']."' ")->result_array();
				$image = (!empty($produk3[0]['foto'])) ? base_url().'assets/images/'.$produk3[0]['foto'] : base_url().'assets/images/noimage.jpg';
				$subtotal = $produk3[0]['hargabarang']*$row['banyak'];
				$total += $subtotal;
				$output .= '	
								<tr class="table_row">
									<td class="column-1">
									<ul class="header-cart-wrapitem w-full">
										<li class="header-cart-item flex-w flex-t ">
										
										<a href="deleteCart?Act='.$row['produkid'].'&mod='.$produk3[0]['namabarang'].'&rl='.$_SERVER['REQUEST_URI'].'" class="header-cart-item-img">

											<img src="'.$image.'" alt="IMG">
										</a>
										</li>
										</ul>
									</td>
									<td class="column-2">'.$produk3[0]['namabarang'].'</td>
									<td class="column-3">Rp. '.number_format($produk3[0]['hargabarang'],0,',','.').'</td>
									<form action="updateCart" method="post">
									<input class="mtext-104 cl3 txt-center num-product" type="hidden" name="id" value="'.$row['produkid'].'">
									<td class="column-4">
									<input type="hidden" id="idharga'.$i.'" class="hidden" value="'.$produk3[0]['hargabarang'].'">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" onclick="return eventcartmin'.$i.'()">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" id="idqty'.$i.'" name="num-product1" value="'.$row['banyak'].'" onkeyup="cartsub'.$i.'()">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" onclick="return eventcart'.$i.'()">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td class="column-5">
									<input type="text" style="position:absolute;padding-left:70px;margin-top:-10px;margin-right:70px;" id="idtotal'.$i.'" value="Rp. '.number_format($subtotal, 0,',','.').'">
										<button style="position:absolute;width:50px;float:right;margin-left:22%;margin-top:-20px"  class="flex-c-m stext-101 cl0 size-121 bg1 bor1 hov-btn1 p-lr-15 trans-04 pointer" name="pesan">
											edit
										</button>
									</td>
									</form>
								</tr>
				';
				$i++;
			}
			$output2 .= "Total Belanja:  Rp. ".number_format($total,0,',','.');
		}
		else{
			$output .= '
				<tr class="table_row" ><td colspan="5" align="center">Keranjang Belanja Kosong</td></tr>
			';
		}
	}
	else{
			$output .= '
				<tr class="table_row" ><td colspan="5" align="center">Keranjang Belanja Kosong</td></tr>
			';
		}


		
	}


?>


	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92 " style="background-image: url('../assets/images/jenis-jamur-yang-bisa-dikonsumsi.jpg');margin-top: 80px">
		<h2 class="ltext-105 cl0 txt-center">
			Shoping Cart
		</h2>
	</section>	

	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php?View=home" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
		
		
	

	<!-- Shoping Cart -->
		<div class="container p-t-90">
			<div class="row">
				<div class="col-md-2 m-l-30" style="margin-top: -90px">
				<?php include 'includes/leftmenu.php'; ?>
			</div>
				<div class="col-md-9 ">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
									<th class="column-1">edit</th>
								</tr>

								<?php echo $output ?>
								
							</table>
						</div>
						<div class="m-t-30"></div>
						<?php
	        			if(!empty($this->session->userdata('id'))){
	        				echo "
	        					<!--<div id='paypal-button'></div>-->
	        					<a href='".base_url()."page/Payment' class='flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10' style='width:70px;font-family:Poppins-Medium;font-size:13px ;'>Pembayaran</a>
	        					<a href='".base_url()."' class='flex-c-m stext-101 cl0 size-119 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer' style='width:100px;float:right;margin-top:-55px;font-family:Poppins-Medium;font-size:13px ;'>
							Kembali Belanja</a>
	        				";
	        			}
	        			else{
	        				echo "
	        				<h4 style='font-family:Poppins-Medium;font-size:15px; float:right; position: absolute; width:100%'>Perlu <a href='".base_url()."login'>Login</a> Untuk Pembayaran.</h4>
	        					<a href='".base_url()."' class='flex-c-m stext-101 cl0 size-119 bg1 bor14 hov-btn1 p-lr-15 trans-04 pointer' style='width:170px;float:right;font-family:Poppins-Medium;font-size:13px ;margin-bottom:50px'>
							Kembali Belanja</a>
	        					
	        				";
	        			}
	        		?>
	        	</div>
						
					</div></div></div>

				</div>

			</div>
		</div>
		
		

	<!-- Footer -->
	<?php include 'includes/footer.php'; ?>
	<?php include 'includes/scripts.php'; ?>
	<?php include 'includes/script.php'; ?>

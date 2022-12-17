
	<?php
	$output ='';
	$output2 ='';

	if(!empty($this->session->userdata('id'))){
		if(isset($_SESSION['cart'])){
			foreach($_SESSION['cart'] as $row){
	            $crow = $this->db->query("SELECT *, COUNT(*) AS numrows FROM tb_keranjang WHERE kodepelanggan='".$user[0]['kduser']."' AND kodebarang='".$row['produkid']."'")->result_array();
				if($crow[0]['numrows'] < 1){
	           		$this->db->query("INSERT INTO tb_keranjang (kodepelanggan, kodebarang, banyak) VALUES ('".$user[0]['kduser']."', '".$row['produkid']."', '".$row['banyak']."')");
				}
				else{
	           		$this->db->query("UPDATE tb_keranjang SET banyak='".$row['banyak']."' WHERE kodepelanggan='".$user[0]['kduser']."' AND kodebarang='".$row['produkid']."'");
				}
			}
			unset($_SESSION['cart']);
		}

		try{
	        $jumbarang = $this->db->query("SELECT COUNT(*) AS numrows FROM tb_keranjang WHERE kodepelanggan='".$user[0]['kduser']."'")->result_array();
			if ($jumbarang[0]['numrows'] != 0) {
			$total = 0;
	        $stmt = $this->db->query("SELECT *, tb_barang.harga as hargabarang, tb_keranjang.id as idcart FROM tb_keranjang LEFT JOIN tb_barang ON tb_barang.kodebarang=tb_keranjang.kodebarang WHERE tb_keranjang.kodepelanggan='".$user[0]['kduser']."'")->result_array();
			foreach($stmt as $row){
				$image = (!empty($row['foto'])) ? base_url().'assets/images/'.$row['foto'] :  base_url().'assets/images/noimage.jpg';
				$subtotal = $row['hargabarang']*$row['banyak'];
				$total += $subtotal;
				$output .= '
					<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<a href="deleteCart?Act='.$row['idcart'].'&mod='.$row['namabarang'].'&rl='.$_SERVER['REQUEST_URI'].'" class="header-cart-item-img">
							<img src="'.$image.'" alt="IMG">
						</a>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								'.$row['namabarang'].'
							</a>

							<span class="header-cart-item-info">
								'.$row['banyak'].' x '.number_format($row['hargabarang'],0,',','.').'
							</span>
						</div>
					</li>
				</ul>

				';

			}
				$output2 .= "<b class='cl1'>Total Belanja: </b>   Rp. ".number_format($total,0,',','.');


		}else{
			$output .= "
				Keranjang Belanja Kosong
			";
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
	        $produk2 = $this->db->query("SELECT *, tb_barang.harga as hargabarang FROM tb_barang LEFT JOIN tb_detilkategori ON tb_detilkategori.kodedetil=tb_barang.kodedetil WHERE tb_barang.kodebarang='".$row['produkid']."'")->result_array();
				$image = (!empty($produk2[0]['foto'])) ?  base_url().'assets/images/'.$produk2[0]['foto'] :  base_url().'assets/images/noimage.jpg';
				$subtotal = $produk2[0]['hargabarang']*$row['banyak'];
				$total += $subtotal;
				$output .= '
					<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<a href="deleteCart?Act='.$row['produkid'].'&mod='.$produk2[0]['namabarang'].'&rl='.$_SERVER['REQUEST_URI'].'" class="header-cart-item-img">
						
							<img src="'.$image.'" alt="IMG">
						</a>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								'.$produk2[0]['namabarang'].'
							</a>

							<span class="header-cart-item-info">
								'.$row['banyak'].' x '.number_format($produk2[0]['hargabarang'],0,',','.').'
							</span>
						</div>
					</li>
				</ul>

				';
			}
			$output2 .= "<b class='cl1'>Total Belanja: </b>  Rp. ".number_format($total,0,',','.');
		}
		else{
			$output .= "
				Keranjang Belanja Kosong
			";
		}
	}
	else{
			$output .= "
				Keranjang Belanja Kosong
			";
		}


		
	}


?>


<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl1">
					Keranjang
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<?php echo $output ?>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						<?php echo  $output2 ?>
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="<?php echo base_url()?>page/shopingCart" class="flex-c-m stext-101 cl0 size-107 bg1 bor2 hov-btn1 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="<?php echo base_url()?>page/Payment" class="flex-c-m stext-101 cl0 size-107 bg1 bor2 hov-btn1 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>


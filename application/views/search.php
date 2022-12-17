<?php include 'includes/session.php'; ?>

<?php include 'includes/header.php'; ?>
    <link href="<?php echo base_url()?>assets/bootstrap/css/bootstrap2.css" rel="stylesheet">

	<title><?php echo $site[0]['sitename'] ?> - Search</title>
<body class="animsition">
	<!-- navigasi bar -->
	<?php include 'includes/navbar.php'; ?>
	<!-- Sidebar -->
	<?php include 'includes/sidebar.php'; ?>
	<!-- Cart -->
	<?php include 'includes/cart.php'; ?>

	<?php
  try{        
	  $jumlah = $this->db->query("SELECT COUNT(*) As jumlah FROM tb_barang WHERE namabarang LIKE '%".$_GET['search']."%'")->result_array();
    
  }
  catch(PDOException $e){
    echo "There is some problem in connection: " . $e->getMessage();
  }
?>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92 " style="background-image: url('../assets/images/jenis-jamur-yang-bisa-dikonsumsi.jpg');margin-top: 80px">
		<h2 class="ltext-105 cl0 txt-center">
			Search
		</h2>
	</section>	

	
	<!-- Product -->
	<div class="row" >
		<div class="col-md-2 m-l-70 m-b-100">
	<?php include 'includes/leftmenu.php'; ?>
			
		</div>
		<div class="col-md-8 ">
			<div class="bg0 m-t-23 p-b-140 ">
				<div class="container">
					<div class="row isotope-grid">
						 <?php
	       			
	  						$row = $this->db->query("SELECT COUNT(*) AS numrows FROM tb_barang WHERE namabarang LIKE '%".$_GET['search']."%'")->result_array();
			       			if($row[0]['numrows'] < 1){
			       				echo '
			       				<div class="row m-t-40" style="width:100%">
			       				<div class="col-md-3" > </div>
			       				<div class="col-md-6" >

			       				<h1 style="font-family:Poppins-Regular;font-size:18px;">Pencarian <a href="#">'.$_GET['search'].'</a> Tidak Ditemukan</h1> </div>
			       				</div>';
			       			}
			       			else{
			       				echo '
			       				<div class="row m-t-40 m-l-30" style="width:100%">
			       				<div class="col-md-6" >

			       				<h1 style="font-family:Poppins-Regular;font-size:18px;">Hasil pencarian <a href="#">'.$_GET['search'].'</a> ditemukan '.$row[0]['numrows'].' items</h1> </div>
			       				</div>

			       				';          	

				                try{
				                	if (isset($_GET['page_no']) && $_GET['page_no']!="") {
					                $page_no = $_GET['page_no'];
					                } else {
					                  $page_no = 1;
					                      }

					                $tampil = 12;
					                  $offset = ($page_no-1) * $tampil;
					                $sebelum = $page_no - 1;
					                $selanjutnya = $page_no + 1;
					                $adjacents = "2"; 

					                $jumlah = $jumlah[0]['jumlah']-1;
					                  $jumlah_halaman = ceil($jumlah / $tampil);
					                $second_last = $jumlah_halaman - 1; // total page minus 1
	  								$stmt = $this->db->query("SELECT * FROM tb_barang WHERE namabarang LIKE '%".$_GET['search']."%' LIMIT  ".$offset.", ".$tampil."")->result_array();
				                  foreach($stmt as $row){
				                  	$images = (!empty($row['foto']))? $row['foto'] : 'noimage.jpg';
				                    echo '

									  <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 m-t-100 isotope-item '.$row['kodedetil'].'">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-pic hov-img0">
										<img src="'.base_url().'assets/images/'.$images.'" style="height: 230px" alt="IMG-PRODUCT">

										<a href="#viewproduk'.$row['kodebarang'].'"  data-toggle="modal" data-target="#viewproduk'.$row['kodebarang'].'" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
											Quick View
										</a>
									</div>

									<div class="block2-txt flex-w flex-t p-t-14">
										<div class="block2-txt-child1 flex-col-l ">
											<a href="productDetail?Product='.$row['namabarang'].'&id='.$row['kodebarang'].'" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
												'.$row['namabarang'].'
											</a>

											<span class="stext-105 cl3">
												Rp. '.number_format($row['harga'],0,',','.').'
											</span>
										</div>

										<div class="block2-txt-child2 flex-r p-t-3">
											<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
												<img class="icon-heart1 dis-block trans-04" src="'.base_url().'assets/images/icons/icon-heart-01.png" alt="ICON">
												<img class="icon-heart2 dis-block trans-04 ab-t-l" src="'.base_url().'assets/images/icons/icon-heart-02.png" alt="ICON">
											</a>
										</div>
									</div>
								</div>
							</div>'; 
							?>

							<div class="modal fade" id="viewproduk<?php echo $row['kodebarang']?>" tabindex="-1" role="dialog" >
						  <div class="modal-dialog modal-md m-t-70" role="document"  >
						    <div class="modal-content " style="border-radius: 0px;width: 1100px;margin-left: -60%">
						       <div class="container">
									<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
										<button class="how-pos3 hov3 trans-04 js-hide-modal1">
											<img src="<?php echo base_url()?>assets/images/icons/icon-close.png" alt="CLOSE">
										</button>

										<div class="row">
											<div class="col-md-6 col-lg-7 p-b-30">
												<div class="p-l-25 p-r-30 p-lr-0-lg">
													<div class="wrap-slick3 flex-sb flex-w">
														<div class="wrap-slick3-dots"></div>
														<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

														<div class="slick3 gallery-lb">
															<div class="item-slick3" data-thumb="<?php echo base_url()?>assets/images/<?php echo $images ?>">
																<div class="wrap-pic-w pos-relative">
																	<img src="<?php echo base_url()?>assets/images/<?php echo $images ?>" alt="IMG-PRODUCT">
																	<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo base_url()?>assets/images/<?php echo $images ?>">
																		<i class="fa fa-expand"></i>
																	</a>
																</div>
															</div>
															<div class="item-slick3" data-thumb="<?php echo base_url()?>assets/images/<?php echo $images ?>">
																<div class="wrap-pic-w pos-relative">
																	<img src="<?php echo base_url()?>assets/images/<?php echo $images ?>" alt="IMG-PRODUCT">
																	<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo base_url()?>assets/images/<?php echo $images ?>">
																		<i class="fa fa-expand"></i>
																	</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											
											<div class="col-md-6 col-lg-5 p-b-30">
												<div class="p-r-50 p-t-5 p-lr-0-lg">
													<h4 class="mtext-105 cl2 js-name-detail p-b-14">
													<?php echo $row['namabarang']?>								
													</h4>

													<span class="mtext-106 cl2">
													<?php echo 'Rp. '.number_format($row['harga'],0,',','.')?>
													</span>

													<p class="stext-102 cl3 p-t-23">
														<?php echo $row['deskripsiSingkat']?>
													</p>
													
													<div class="p-t-33">
														<div class="flex-w flex-r-m p-b-10">
														<div class="size-203 flex-c-m respon6">
															Stok
														</div>

														<div class="size-204 respon6-next">
																<?php echo $row['stok']?>
														</div>
													</div>
														<div class="flex-w flex-r-m p-b-10">
															<div class="size-204 flex-w flex-m respon6-next">
																<form class="form-inline" action="<?php echo base_url()?>page/addKeranjang" method="post">
																<div class="wrap-num-product flex-w m-r-20 m-tb-10">
																	<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
																		<i class="fs-16 zmdi zmdi-minus"></i>
																	</div>

																	<input  class="mtext-104 cl3 txt-center num-product" type="number" name="banyak" id="quantity" value="1">

																	<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
																		<i class="fs-16 zmdi zmdi-plus"></i>
																	</div>
																	<input type="hidden" value="<?php echo (empty($user[0]['kduser']))?'':$user[0]['kduser']; ?>" name="kduser">
																	<input type="hidden" value="<?php echo $row['kodebarang']; ?>" name="id">
													           		<input type="hidden" value="<?php echo $row['namabarang']; ?>" name="nama">
																	<input type="hidden" value="<?php echo $row['stok']; ?>" name="stok">
													           		
																</div>
																<?php echo ($row['stok']==0)? '<a disabled onclick="habis()" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" style="color:#fff">Add to cart</a>' : '<button type="submit"  class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">Add to cart</button>'?> 
																
															
															</form>
															</div>
														</div>	
													</div>

													
												</div>
											</div>
										</div>
									</div>
						            
						          </div>
						    </div>
						  </div>
						</div>


						<?php         


			                  }}
			                catch(PDOException $e){
			                  echo "There is some problem in connection: " . $e->getMessage();
			                }
			              ?>
			             </div></div>
            <div class="m-b-50"></div>
            <div style="font-family:Poppins-Light;font-size:15px;color:#444;;position: absolute;width: 100%;">
            
            <ul class="pagination " style="margin-left:27%;">
  <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
  <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
  <a <?php if($page_no > 1){ echo "href='?page_no=$sebelum'"; } ?>><</a>
  </li>
       
    <?php 
  if ($jumlah_halaman <= 10){     
    for ($counter = 1; $counter <= $jumlah_halaman; $counter++){
      if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
        }
        }
  }
  elseif($jumlah_halaman > 10){
    
  if($page_no <= 4) {     
   for ($counter = 1; $counter < 8; $counter++){     
      if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
        }
        }
    echo "<li><a>...</a></li>";
    echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
    echo "<li><a href='?page_no=$jumlah_halaman'>$jumlah_halaman</a></li>";
    }

   elseif($page_no > 4 && $page_no < $jumlah_halaman - 4) {     
    echo "<li><a href='?page_no=1'>1</a></li>";
    echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {     
           if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
        }                  
       }
       echo "<li><a>...</a></li>";
     echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
     echo "<li><a href='?page_no=$jumlah_halaman'>$jumlah_halaman</a></li>";      
            }
    
    else {
        echo "<li><a href='?page_no=1'>1</a></li>";
    echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $jumlah_halaman - 6; $counter <= $jumlah_halaman; $counter++) {
          if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
        }                   
                }
            }
  }
?>
    
  <li <?php if($page_no >= $jumlah_halaman){ echo "class='disabled'"; } ?>>
  <a <?php if($page_no < $jumlah_halaman) { echo "href='?page_no=$selanjutnya'"; } ?>>></a>
  </li>
    <?php if($page_no < $jumlah_halaman){
    echo "<li><a href='?page_no=$jumlah_halaman'>Terakhir &rsaquo;&rsaquo;</a></li>";
    } ?>
</ul></div>
						

						<?php }?>
					</div>
					
				</div>
				
			</div>
		</div>
	</div>
		

	<!-- Footer -->
	<?php include 'includes/footer.php'; ?>
	<?php include 'includes/scripts.php'; ?>

<script>
$(function(){
	$('.zoom').magnify();
});
</script>
<!-- Custom Scripts -->
<script>
$(function(){
  $('#navbar-search-input').focus(function(){
    $('#searchBtn').show();
  });

  $('#navbar-search-input').focusout(function(){
    $('#searchBtn').hide();
  });

  getCart();

  $('#productForm').submit(function(e){
  	e.preventDefault();
  	var product = $(this).serialize();
  	$.ajax({
  		type: 'POST',
  		url: 'proses/cart_add.php',
  		data: product,
  		dataType: 'json',
  		success: function(response){
  			$('#callout').show();
  			$('.message').html(response.message);
  			if(response.error){
  				$('#callout').removeClass('callout-success').addClass('callout-danger');
  			}
  			else{
				$('#callout').removeClass('callout-danger').addClass('callout-success');
				getCart();
  			}
  		}
  	});
  });

  $(document).on('click', '.close', function(){
  	$('#callout').hide();
  });

});

function getCart(){
	$.ajax({
		type: 'POST',
		url: 'proses/cart_fetch.php',
		dataType: 'json',
		success: function(response){
			$('#cart_menu').html(response.list);
			$('.cart_count').html(response.count);
		}
	});
}
</script>
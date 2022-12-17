<?php include 'includes/session.php'; ?>

<?php include 'includes/header.php'; ?>
	<title><?php echo $site[0]['sitename'] ?> - Blog</title>
<body class="animsition">
	<!-- navigasi bar -->
	<?php include 'includes/navbar.php'; ?>
	<!-- Sidebar -->
	<?php include 'includes/sidebar.php'; ?>
	<!-- Cart -->
	<?php include 'includes/cart.php'; ?>

	
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92 m-b-70" style="background-image: url('../assets/images/jenis-jamur-yang-bisa-dikonsumsi.jpg');margin-top: 80px">
		<h2 class="ltext-105 cl0 txt-center">
			Blog
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-62 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-80">
					<div class="p-r-45 p-r-0-lg">
						<!-- item blog -->
						<?php 
					$stmt = $this->db->query("SELECT *, day(tglUpload) as hari, DATE_FORMAT(tglUpload, '%b %Y') AS tgl  FROM tb_blog order by tglUpload desc")->result_array();
					foreach ($stmt as $data) {
                         $image = (!empty($data['foto'])) ? base_url().'assets/images/'.$data['foto'] : base_url().'assets/images/noimage.jpg';

						$kalimat=$data['content'];
                                    $jumlahkarakter=300;
                                    $cetak = substr($kalimat, 0, $jumlahkarakter);
						?>
						<div class="p-b-63">
							<a href="<?php echo base_url()?>page/blogDetail?content=<?php echo $data['id']?>" class="hov-img0 how-pos5-parent">
								<img src="<?php echo $image ?>" alt="IMG-BLOG" style="height: 250px">

								<div class="flex-col-c-m size-123 bg9 how-pos5">
									<span class="ltext-107 cl2 txt-center">
										<?php echo $data['hari'] ?>
									</span>

									<span class="stext-109 cl3 txt-center">
										<?php echo $data['tgl'] ?>
									</span>
								</div>
							</a>

							<div class="p-t-32">
								<h4 class="p-b-15">
									<a href="<?php echo base_url()?>page/blogDetail?content=<?php echo $data['id']?>" class="ltext-108 cl2 hov-cl1 trans-04">
										<?php echo $data['judul'] ?>
									</a>
								</h4>

								<p class="stext-117 cl6" style="text-align: justify;">
									<?php echo $cetak.' ...' ?>
								</p>

								<div class="flex-w flex-sb-m p-t-18">
									<span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
										<span>
											<span class="cl4">By</span> <?php echo $data['penulis'] ?>  
										</span>
									</span>

									<a href="<?php echo base_url()?>page/blogDetail?content=<?php echo $data['id']?>" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
										Continue Reading

										<i class="fa fa-long-arrow-right m-l-9"></i>
									</a>
								</div>
							</div>
						</div>
					<?php } ?>

					</div>
				</div>

				<div class="col-md-4 col-lg-3 p-b-80">
					<?php include 'includes/leftmenu.php'; ?>
					
				</div>
			</div>
		</div>
	</section>	
	
		

	<!-- Footer -->
	<?php include 'includes/footer.php'; ?>
	<?php include 'includes/scripts.php'; ?>

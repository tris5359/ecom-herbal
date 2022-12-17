<?php include 'includes/session.php'; ?>

<?php include 'includes/header.php'; ?>
	<title><?php echo $site[0]['sitename'] ?> - Blog Detail</title>
<body class="animsition">
	<!-- navigasi bar -->
	<?php include 'includes/navbar.php'; ?>
	<!-- Sidebar -->
	<?php include 'includes/sidebar.php'; ?>
	<!-- Cart -->
	<?php include 'includes/cart.php'; ?>

	<?php 
	 	$id = $_GET['content'];
		$stmt = $this->db->query("SELECT *, day(tglUpload) as hari, DATE_FORMAT(tglUpload, '%b %Y') AS tgl, DATE_FORMAT(tglUpload, '%d %M %Y')  AS  tgl2  FROM tb_blog WHERE id ='".$id."' order by tglUpload desc")->result_array();
        $image = (!empty($stmt[0]['foto'])) ? base_url().'assets/images/'.$stmt[0]['foto'] : base_url().'assets/images/noimage.jpg';


		$this->db->query("UPDATE tb_blog SET view=view+1 WHERE id='".$id."'");

	 ?>
	<!-- breadcrumb -->
	<div class="container" style="margin-top: 80px">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="<?php echo base_url()?>page" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="<?php echo base_url()?>page/blog" class="stext-109 cl8 hov-cl1 trans-04">
				Blog
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				<?php echo $stmt[0]['judul'];?>
			</span>
		</div>
	</div>


	<!-- Content page -->
	<section class="bg0 p-t-52 p-b-20">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-80">
					<div class="p-r-45 p-r-0-lg">
						<!--  -->
						<div class="wrap-pic-w how-pos5-parent">
							<img src="<?php echo $image ?>" alt="IMG-BLOG" style="height: 300px">

							<div class="flex-col-c-m size-123 bg9 how-pos5">
								<span class="ltext-107 cl2 txt-center">
									<?php echo $stmt[0]['hari'];?>
								</span>

								<span class="stext-109 cl3 txt-center">
									<?php echo $stmt[0]['tgl'];?>
								</span>
							</div>
						</div>

						<div class="p-t-32">
							<span class="flex-w flex-m stext-111 cl2 p-b-19">
								<span>
									<span class="cl4">By</span> <?php echo $stmt[0]['penulis'];?>  
									<span class="cl12 m-l-4 m-r-6">|</span>
								</span>

								<span>
									<?php echo $stmt[0]['tgl2'];?>
									<span class="cl12 m-l-4 m-r-6">|</span>
								</span>
							</span>

							<h4 class="ltext-109 cl2 p-b-28">
								<?php echo $stmt[0]['judul'];?>
							</h4>

							<p class="stext-117 cl6 p-b-26" style="text-align: justify;">
								<?php echo $stmt[0]['content'];?>
							</p>

							
						</div>

						

						
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
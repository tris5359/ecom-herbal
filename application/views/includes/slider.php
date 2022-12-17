<?php 
		$b1 = $this->db->query("SELECT * FROM `banner` WHERE `banner`.`idbanner` = 1")->result_array();
		$b2 = $this->db->query("SELECT * FROM `banner` WHERE `banner`.`idbanner` = 2")->result_array();
		$b3 = $this->db->query("SELECT * FROM `banner` WHERE `banner`.`idbanner` = 3")->result_array();
	
	?>
	<link href="https://fonts.googleapis.com/css2?family=Salsa&display=swap" rel="stylesheet">


<section class="section-slide" style="margin-top: 70px">
		<div class="wrap-slick1 rs1-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url(assets/images/banner/<?php echo $b1[0]['img']?>);">
					<div class="container h-full">
						<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-202 txt-center cl0 respon2">
									<?php echo $b1[0]['text2']?>
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h1 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1" style="font-family: Salsa;font-size: 6vw;">
									<?php echo $b1[0]['text1']?>
								</h1>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="<?php echo base_url()?>page/Product" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>


				</div>

				<div class="item-slick1" style="background-image: url(assets/images/banner/<?php echo $b2[0]['img']?>);">
					<div class="container h-full">
						<div class="flex-col-c-m h-full p-t-100 p-b-30 respon5">
							<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-202 txt-center cl0 respon2">
									<?php echo $b2[0]['text2']?>
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
								<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1" style="font-family: Salsa;font-size: 6vw;">
									<?php echo $b2[0]['text1']?>
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								<a href="<?php echo base_url()?>page/Product" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
								
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(assets/images/banner/<?php echo $b3[0]['img']?>);">
					<div class="container h-full">
						<div class="flex-col-c-m h-full p-t-100 p-b-30 respon5" >
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-202 txt-center cl0 respon2">
									<?php echo $b3[0]['text2']?>
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
								<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1" style="font-family: Salsa;font-size: 6vw;">
									<?php echo $b3[0]['text1']?>
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
								<a href="<?php echo base_url()?>page/Product" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>


						</div>
					</div>
				</div>
			</div>
		</div>
		 <marquee direction="left" scrollamount="7" style="background-color: #82ae46; height: 30px; overflow: none; font-size: 15px; color: #fff; padding-top: 5px; text-transform: capitalize; font-family: andalus;" >
        <?php echo $site[0]['tagline']?> 
       </marquee>
	</section>
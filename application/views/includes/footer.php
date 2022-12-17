<footer class="bg8 p-t-75 p-b-32" style="color: #82ae46;font-weight: 800">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl1 p-b-30">
						Kategori
					</h4>

					<ul>
						<?php                             
	                try{
	                  $stmt = $this->db->query("SELECT * FROM tb_detilkategori")->result_array();
	                  foreach($stmt as $row){
	                    echo '
	                    <li class="p-b-10">
							<a href="category?Kategori='.$row['namadetil'].'&Mod='.base64_encode($row['kodedetil']).'" class="stext-107 cl2 hov-cl1 trans-04">
								'.$row['namadetil'].'
							</a>
						</li>
	                    ';            
	                  }
	                }
	                catch(PDOException $e){
	                  echo "There is some problem in connection: " . $e->getMessage();
	                }
	              ?>						
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl1 p-b-30">
						Help
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl2 hov-cl1 trans-04">
								Track Order
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl2 hov-cl1 trans-04">
								Returns 
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl2 hov-cl1 trans-04">
								Shipping
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl2 hov-cl1 trans-04">
								FAQs
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">					

					<div >
						<a href="#" class="fs-30 cl2 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-30 cl2 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-30 cl2 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-google"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl1 p-b-30">
						Contact Store
					</h4>
					<ul>
						<li class="p-b-10">
							<span class="stext-107 cl2 hov-cl1 trans-04"><i class="fa fa-user m-r-8" aria-hidden="true"></i></span>Email :<br> 
							<a href="#" class="stext-107 cl2 hov-cl1 trans-04">
								<?php echo $site[0]['email'] ?>
							</a>
						</li>

						<li class="p-b-10">
							<span class="stext-107 cl2 hov-cl1 trans-04"><i class="fa fa-phone m-r-8" aria-hidden="true"></i></span>Hubungi Kami :<br> 
							<a href="#" class="stext-107 cl2 hov-cl1 trans-04">
								<?php echo $site[0]['noTlp'] ?>
							</a>
						</li>

						<li class="p-b-10">
							<span class="stext-107 cl2 hov-cl1 trans-04"><i class="fa fa-map-marker m-r-8" aria-hidden="true"></i>  </span>Alamat Toko :<br>
							<a href="#" class="stext-107 cl2 hov-cl1 trans-04">
								<?php echo $site[0]['addressStore'] ?>
							</a>
						</li>
					</ul>
				</div>
			</div>
				</div>
				<p class="stext-107 cl6 txt-center" style="margin-bottom: -25px;color: #000;font-weight: 800">
					Copyright&copy; 2020 - <?php echo date("Y");?> by <?php echo $site[0]['sitename'] ?> | All rights reserved 

				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	
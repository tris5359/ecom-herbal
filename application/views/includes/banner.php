<div class="sec-banner bg0" style="margin: 5%;background-color: #fff;">
	<div class="">
		<center><h2 class="ltext-105 cl5  respon1 p-t-30 p-l-20 p-b-20" style="font-family: Poppins-Bold">
		   	Kategori				
		</h2>

		<p style="color: black; font-size: 15px;margin-bottom: 30px">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart</p>
	</center>
	</div>
		<div class="flex-w flex-c-m p-b-50" >
				<?php             	               
	                try{
	                  $stmt = $this->db->query("SELECT * FROM tb_detilkategori")->result_array();
	                  foreach($stmt as $row){
	                	?>
	                      <div class="size-202 ">
							<!-- Block1 -->
							<div class="block1 wrap-pic-w" style="padding: 5px">
								<img src="assets/images/<?php echo $row['fotoKategori'] ?>" alt="IMG-BANNER" style="height: 180px;">
								<a href="page/category?Kategori=<?php echo $row['namadetil'].'&Mod='.base64_encode($row['kodedetil'])?>" class="block1-txt ab-t-l s-full flex-col-l-sb trans-03 ">
										<span class="block1-info stext-102 bg1 cl0 trans-04" style="position: absolute;;width: 100%;bottom: 0px;padding: 5px;text-align: center;">
											<?php echo $row['namadetil']?>
										</span>

									
								</a>
							</div>
						</div>  
	                 <?php }
	                }
	                catch(PDOException $e){
	                  echo "There is some problem in connection: " . $e->getMessage();
	                }
	              ?>
			
			
		</div>
	</div>
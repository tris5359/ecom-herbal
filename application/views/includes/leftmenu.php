<div class="p-t-55">
				<h4 class="mtext-112 cl2 p-b-20">
					Kategori
				</h4>

				<ul>
				<?php             		                
	                try{
	                  $stmt = $this->db->query("SELECT * FROM tb_detilkategori")->result_array();
	                  foreach($stmt as $row){
	                  $prow = $this->db->query("SELECT COUNT(*) AS numrows FROM tb_detilkategori a Inner join  tb_barang b ON a.kodedetil=b.kodedetil where a.kodedetil='".$row['kodedetil']."'")->result_array();
	                    echo '
	                      <li class="p-b-7">
							<a href="category?Kategori='.$row['namadetil'].'&Mod='.base64_encode($row['kodedetil']).'" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
								<span>
									'.$row['namadetil'].'
								</span>
								<span style="background-color:#333;border-radius:30px;width:30px; text-align:center;color:#fff">
									'.$prow[0]['numrows'].'
								</span>
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
			<div class="p-t-55 m-b-60">
				<h4 class="mtext-112 cl2 p-b-20 ">
					Populer Hari Ini
				</h4>

				<ul>
				<?php             	
	  			$now = date('Y-m-d');

	                try{
	                  $stmt = $this->db->query("SELECT * FROM tb_barang WHERE view='".$now."' ORDER BY counter DESC LIMIT 10")->result_array();
	                  foreach($stmt as $row){
	                    echo '
	                      <li class="p-b-7">
							<a href="productDetail?Product='.$row['namabarang'].'&id='.$row['kodebarang'].'" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
								<span>
									'.$row['namabarang'].'
								</span>
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
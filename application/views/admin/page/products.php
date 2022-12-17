<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<?php 
      $stmt = $this->db->query("SELECT tb_barang.*, .tb_detilkategori.namadetil from tb_barang JOIN tb_detilkategori ON tb_barang.kodedetil = tb_detilkategori.kodedetil order by kodebarang DESC")->result_array();

      $stmt2 = $this->db->query("SELECT * FROM  tb_detilkategori")->result_array();

 ?>

    <body data-ng-app>
    <?php include 'includes/sidebar.php'; ?>
    <!-- Overlay For Sidebars -->

    <!-- #END# Search Bar -->
    <section class="content">
    <?php include 'includes/topbar.php'; ?>

    <div class="warper container-fluid">
        <div class="page-header"><h1>Products</h1></div>
       
        <div class="warper container-fluid" style="display: block;">
        <?php 
                            foreach($stmt as $q){
                              if($q['stok']<=3){  
                                ?>  
                                <script>
                                  $(document).ready(function(){
                                    $('#pesan_sedia').css("color","red");
                                    $('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
                                  });
                                </script>
                                <?php
                                echo "<div style='padding:5px' class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $q['namabarang']."</a> yang tersisa sudah kurang dari 3 . silahkan pesan lagi !!</div>"; 
                              }}
                            
                            ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a href="#" data-column="0" class="toggle-vis btn btn-default btn-sm">No</a>
                                <a href="#" data-column="1" class="toggle-vis btn btn-default btn-sm">Foto</a>
                                <a href="#" data-column="2" class="toggle-vis btn btn-default btn-sm">Nama Barang</a>
                                <a href="#" data-column="3" class="toggle-vis btn btn-default btn-sm">Kategori</a>
                                <a href="#" data-column="4" class="toggle-vis btn btn-default btn-sm">Harga</a>
                                <a href="#" data-column="5" class="toggle-vis btn btn-default btn-sm">Stok</a>
                            </div>
                            <div class="panel-body">
                            <div class="panel-heading">
                              <a data-toggle="modal" data-target="#tambah" type="button" title="tambah" class="btn btn-info" target="blanks"  style="margin-right : 8px "><i class="fa fa-plus"></i>TAMBAH</a>
                            </div>
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="toggleColumn-datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Nama Barang</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Control</th>
                                        </tr>
                                            

                                    </thead>                     
                                    <tbody>
                                       <?php
                                    $i=1;
                                        foreach($stmt as $row){
                                            $image = (!empty($row['foto'])) ? base_url().'assets/images/'.$row['foto'] : base_url().'assets/images/noimage.jpg';
                                                echo "<tr>";
                                                echo "<td align='center'>".$i."</td>";
                                                echo "<td align='center'> <a href='$image'> <img src='".$image."' height='30px' width='30px'></a></td>";
                                                echo "<td>$row[namabarang]</td>";
                                                echo "<td>$row[namadetil]</td>";
                                                echo "<td align='right'>Rp. ".number_format($row['harga'],0,',','.')."</td>";
                                                echo "<td >$row[stok]</td>";
                                                echo '<td style="text-align: center;"><a data-toggle="modal" data-target="#modal_editdisposisi'.$row['kodebarang'].'" type="button" title="edit" class="btn btn-warning" target="blanks"  style="margin-right : 8px "><i class="fa fa-edit"></i></a>';?><a href="<?php echo base_url()?>admin/hapusProduk?kodebarang=<?php echo $row['kodebarang']; ?>&fotolama=<?php echo $row['foto']; ?>" onclick = " return confirm('anda yakin ingin menghapus data ini ?');" title="hapus" class="btn btn-danger"  style="margin-right : 8px "><i class="fa fa-trash-o"></i></a></td><?php
                                                echo "</tr>";
                                                $i++;
                                            }
                                    ?>
                                    </tbody>
                                        <tr>
                                            <?php
                                            foreach ($stmt as $row) {
                                            ?>
                                        </tr>
                                            <?php } ?>
                                    <table>
                                        
                                    </table>
                                </table>
                            </div>
                        </div> 
                    </div>


        <!-- Modal-->
        <?php $no = 1;
        foreach ($stmt as $row){
            $namabarang = $row['namabarang'];
        $harga = $row['harga'];
        $deskripsi = $row['deskripsi'];
        ?>
        <div class="modal fade" id="modal_editdisposisi<?php echo $row['kodebarang'];  ?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg"> 
                <form method ="post" action ="<?php echo base_url();?>admin/ubahProduk" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Keluar</span></button>
                            <h4 class="modal-title" id="myModalLabel">EDIT PRODUK (" <?php echo $row['namabarang'] ?> ") </h4>
                             <input type="hidden"  name="fotolama" value="<?php echo $row['foto']; ?>">
                             <input type="hidden"  name="kodebarang" value="<?php echo $row['kodebarang']; ?>">
                        </div>
                        <div class="modal-body" style="margin-bottom: 20px">
                            <div class="form-group">
                                        <label for="NamaBarang">Nama Barang</label>
                                        <input type="text" class="form-control" name="NamaBarang" placeholder="Nama Barang" value="<?php echo $namabarang; ?>">
                                    </div> 
                                    <div class="form-group">
                                        <label for="haga">Harga</label>
                                        <input type="text" class="form-control" name="harga1" placeholder="Harga" value="<?php echo $harga; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="haga">Stok Barang</label>
                                        <input type="number" class="form-control" name="stok" placeholder="Stok Barang" value="<?php echo $row['stok'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="Deskripsi">Deskripsi Singkat</label>
                                        <textarea type="text" class="form-control" name="Deskripsi" placeholder="Deskripsi Singkat"><?php echo $row['deskripsiSingkat'];?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="Deskripsi">Deskripsi Detail</label>
                                        <textarea type="text" class="form-control" name="Deskripsi2" placeholder="Deskripsi Detail"><?php echo $deskripsi;?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Pilih Foto</label>
                                        <input name="foto" type="file" class="file btn btn-primary" style="width: 100%">
                                    </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" onclick = " return confirm('anda yakin ingin menyimpan data ini ?'); ">Simpan</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- <div class="modal fade" id="hapus<?php echo $row['kodebarang'];  ?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog"> 
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Keluar</span></button>
                            <h4 class="modal-title" id="myModalLabel">HAPUS PRODUK  </h4>
                        </div>
                        <div class="modal-body" style="margin-bottom: 20px">
                           <center style="color: red">Apa Anda Ingin Menghapus Produk <b>"<?php echo $row['namabarang'] ?></b>"?</center> 
                                      
                        </div>
                        <div class="modal-footer">
                            <a href="<?php echo base_url()?> admin/hapusProduk?kodebarang=<?php echo $row['kodebarang']; ?>"  type="submit" class="btn btn-primary">Hapus</a>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                        </div>
                    </div>
            </div>
        </div> -->
                
<?php }?>

    <!-- modal tambah -->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg"> 
                <form method ="post" action ="<?php echo base_url()?>admin/tambahProduk" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Keluar</span></button>
                            <h4 class="modal-title" id="myModalLabel">TAMBAH PRODUK </h4>
                        </div>
                        <div class="modal-body" style="margin-bottom: 20px">
                            <div class="form-group">
                                        <label for="NamaBarang">Nama Barang</label>
                                        <input type="text" class="form-control" name="NamaBarang" placeholder="Nama Barang">
                                    </div>
                                    <div class="form-group">
                                        <label for="haga">Harga</label>
                                        <input type="number" class="form-control" name="Harga" placeholder="Harga">
                                    </div>
                                    <div class="form-group">
                                        <label for="haga">Stok Barang</label>
                                        <input type="number" class="form-control" name="stok" placeholder="Stok Barang">
                                    </div>
                                    <div class="form-group">
                                        <label for="Deskripsi">Deskripsi Singkat</label>
                                        <textarea type="text" class="form-control" name="Deskripsi" placeholder="Deskripsi Singkat"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="Deskripsi">Deskripsi Detail</label>
                                        <textarea type="text" class="form-control" name="Deskripsi2" placeholder="Deskripsi Detail"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="Merk">Kategori</label> <br />
                                        <?php
                                         $no =1;
                                      $inc = 3; 
                                  
                                        foreach($stmt2 as $row){    
                                         $inc = ($inc == 3) ? 1 : $inc + 1;
                                            if($inc == 1) echo '<div class="row clearfix">';                             
                                        ?>  
                                        <div class="col-md-4" style="margin-bottom:-5px;">        
                                            <input id="radioStacked<?php echo $no;?>" name="kodedetil" type="radio" value="<?php echo $row['kodedetil'];?>">
                                             <label style="font-weight: 400" for="radioStacked<?php echo $no;?>"><?php echo $row['namadetil']; ?></label></div>
                                        <?php $no++;
                                   if($inc == 3) echo "</div> "; }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Pilih Foto</label>
                                        <input name="foto" type="file" class="file btn btn-primary" style="width: 100%">
                                    </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" onclick = " return confirm('anda yakin ingin menyimpan data ini ?'); ">Simpan</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

            
            
            
        </div>
        <!-- Warper Ends Here (working area) -->
        <?php include 'includes/footer.php' ?>
</section>
    
     <?php include 'includes/scripts.php' ?>
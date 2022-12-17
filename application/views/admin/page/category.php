<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<?php 
      $stmt = $this->db->query("SELECT * from tb_detilkategori order by namadetil")->result_array();

      $stmt2 = $this->db->query("SELECT * FROM  tb_detilkategori")->result_array();

 ?>

    <body data-ng-app>
    <?php include 'includes/sidebar.php'; ?>
    <!-- Overlay For Sidebars -->

    <!-- #END# Search Bar -->
    <section class="content">
    <?php include 'includes/topbar.php'; ?>

    <div class="warper container-fluid">
        <div class="page-header"><h1>Category</h1></div>
       
        <div class="warper container-fluid" style="display: block;">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a href="#" data-column="0" class="toggle-vis btn btn-default btn-sm">No</a>
                                <a href="#" data-column="1" class="toggle-vis btn btn-default btn-sm">Foto</a>
                                <a href="#" data-column="2" class="toggle-vis btn btn-default btn-sm">Nama Kategori</a>
                            </div>
                            <div class="panel-body">
                            <div class="panel-heading">
                              <a data-toggle="modal" data-target="#tambah" type="button" title="tambah" class="btn btn-info" target="blanks"  style="margin-right : 8px "><i class="fa fa-plus"></i>TAMBAH</a>
                            </div>
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="toggleColumn-datatable">
                                    <thead>
                                        <tr>
                                            <!--<th>Kode Kategori</th>-->
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Nama Kategori</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>                     
                                    <tbody>
                                       <?php
                                    $i=1;
                                        foreach($stmt as $row){
                                            $image = (!empty($row['fotoKategori'])) ? base_url().'assets/images/'.$row['fotoKategori'] : base_url().'assets/images/noimage.jpg';
                                                echo "<tr>";
                                                //echo "<td>$row[kodedetil]</td>";
                                                echo "<td>$i.</td>";
                                                echo "<td align='center'> <a href='$image'> <img src='".$image."' height='30px' width='30px'></a></td>";
                                                echo "<td>$row[namadetil]</td>";?>
                                                <td style="text-align: center;">
                                                    <a data-toggle="modal" data-target="#modal_editdisposisi<?php echo $row['kodedetil']; ?>"  type="button" title="edit" class="btn btn-warning" target="blanks"  style="margin-right : 8px "><i class="fa fa-edit"></i></a>'
                                                    <a href="<?php echo base_url()?>admin/hapusCategory?kodedetil=<?php echo $row['kodedetil']; ?>&fotolama=<?php echo $row['fotoKategori']; ?>" onclick = " return confirm('anda yakin ingin menghapus data ini ?');" title="hapus" class="btn btn-danger"  style="margin-right : 8px "><i class="fa fa-trash-o"></i></a>
                                                </td>
                                                <?php
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
        ?>
        <div class="modal fade" id="modal_editdisposisi<?php echo $row['kodedetil'];  ?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog "> 
                <form method ="post" action ="<?php echo base_url();?>admin/ubahKategori" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Keluar</span></button>
                            <h4 class="modal-title" id="myModalLabel">EDIT KATEGORI (" <?php echo $row['namadetil'] ?> ") </h4>
                        </div>
                        
                             <input type="hidden"  name="fotolama" value="<?php echo $row['fotoKategori']; ?>">
                             <input type="hidden"  name="kodedetil" value="<?php echo $row['kodedetil']; ?>">
                        <div class="modal-body" style="margin-bottom: 20px">
                            <fieldset class="form-group">
                                            <label for="NamaBarang">Nama Kategori</label>
                                            <input type="text" class="form-control" name="nama" placeholder="Nama Barang" value="<?php echo $row['namadetil']; ?>">
                                        </fieldset>
                                    <fieldset class="form-group">
                                        <label class="control-label">Pilih Foto Kategori</label>
                                        <input name="foto" type="file" class="file btn btn-primary" style="width: 100%">
                                    </fieldset>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" onclick = " return confirm('anda yakin ingin menyimpan data ini ?'); ">Simpan</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- <div class="modal fade" id="hapus<?php echo $row['kodedetil'];  ?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                            <a href="<?php echo base_url()?> admin/hapusProduk?kodedetil=<?php echo $row['kodedetil']; ?>"  type="submit" class="btn btn-primary">Hapus</a>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                        </div>
                    </div>
            </div>
        </div> -->
                
<?php }?>

    <!-- modal tambah -->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog "> 
                <form method ="post" action ="<?php echo base_url();?>admin/tambahKategori" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Keluar</span></button>
                            <h4 class="modal-title" id="myModalLabel">TAMBAH KATEGORI </h4>
                        </div>
                        <div class="modal-body" style="margin-bottom: 20px">
                            <fieldset class="form-group">
                                        <label for="NamaKategori">Nama Kategori</label>
                                        <input type="text" class="form-control" name="kategori" placeholder="Nama Kategori">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label class="control-label">Pilih Foto Kategori</label>
                                        <input name="foto" type="file" class="file btn btn-primary" style="width: 100%">
                                    </fieldset>
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
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<?php 
      $stmt = $this->db->query("SELECT *, DATE_FORMAT(tglUpload, '%d/%m/%Y')  AS tgl  FROM `tb_blog` order by tglUpload   DESC")->result_array();

 ?>

    <body data-ng-app>
    <?php include 'includes/sidebar.php'; ?>
    <!-- Overlay For Sidebars -->

    <!-- #END# Search Bar -->
    <section class="content">
    <?php include 'includes/topbar.php'; ?>

    <div class="warper container-fluid">
        <div class="page-header"><h1>Blog</h1></div>
       
        <div class="warper container-fluid" style="display: block;">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a href="#" data-column="0" class="toggle-vis btn btn-default btn-sm">No</a>
                                <a href="#" data-column="1" class="toggle-vis btn btn-default btn-sm">Foto</a>
                                <a href="#" data-column="2" class="toggle-vis btn btn-default btn-sm">Judul</a>
                                <a href="#" data-column="3" class="toggle-vis btn btn-default btn-sm">Konten</a>
                                <a href="#" data-column="4" class="toggle-vis btn btn-default btn-sm">Tanggal Upload</a>
                                <a href="#" data-column="5" class="toggle-vis btn btn-default btn-sm">View</a>
                            </div>
                            <div class="panel-body">
                            <div class="panel-heading">
                              <a data-toggle="modal" data-target="#tambah" type="button" title="tambah" class="btn btn-info" target="blanks"  style="margin-right : 8px "><i class="fa fa-plus"></i>TAMBAH</a>
                            </div>
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="toggleColumn-datatable">
                                    <thead>
                                        <tr>
                                            <th style="width: 3%">No</th>
                                            <th style="width: 3%">Foto</th>
                                            <th style="width: 20%">Judul</th>
                                            <th style="width: 40%">Konten</th>
                                            <th style="width: 10%">Tanggal Upload</th>
                                            <th style="width: 3%">View</th>
                                            <th style="width: 15%">Alat</th>
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
                                                echo "<td>$row[judul]</td>";
                                                echo "<td>$row[content]</td>";
                                                echo "<td align='right'>".$row['tgl']."</td>";
                                                echo "<td >$row[view]</td>";
                                                echo '<td style="text-align: center;"><a data-toggle="modal" data-target="#modal_editdisposisi'.$row['id'].'" type="button" title="edit" class="btn btn-warning" target="blanks"  style="margin-right : 8px "><i class="fa fa-edit"></i></a>';?><a href="<?php echo base_url()?>admin/hapusBlog?id=<?php echo $row['id']; ?>&fotolama=<?php echo $row['foto']; ?>" onclick = " return confirm('anda yakin ingin menghapus data ini ?');" title="hapus" class="btn btn-danger"  style="margin-right : 8px "><i class="fa fa-trash-o"></i></a></td><?php
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
        <div class="modal fade" id="modal_editdisposisi<?php echo $row['id'];  ?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg"> 
                <form method ="post" action ="<?php echo base_url();?>admin/ubahBlog" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Keluar</span></button>
                            <h4 class="modal-title" id="myModalLabel">EDIT BLOG </h4>
                             <input type="hidden"  name="fotolama" value="<?php echo $row['foto']; ?>">
                             <input type="hidden" name="nama" value="<?php echo $user[0]['namadepan'].' '.$user[0]['namabelakang'] ?>">
                             <input type="hidden"  name="id" value="<?php echo $row['id']; ?>">
                        </div>
                        <div class="modal-body" style="margin-bottom: 20px">
                            <div class="form-group">
                                        <label for="NamaBarang">Judul</label>
                                        <input type="text" class="form-control" name="Judul" placeholder="Judul" value="<?php echo $row['judul']; ?>">
                                    </div> 
                                    <div class="form-group">
                                        <label for="Deskripsi">Konten</label>
                                        <textarea type="text" class="form-control" name="Konten" placeholder="Konten"><?php echo$row['content']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Pilih Foto</label>
                                        <input name="foto" type="file" class="file btn btn-primary" style="width: 100%">
                                    </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" >Simpan</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
                
<?php }?>

    <!-- modal tambah -->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg"> 
                <form method ="post" action ="<?php echo base_url()?>admin/tambahBlog" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Keluar</span></button>
                            <h4 class="modal-title" id="myModalLabel">TAMBAH BLOG </h4>
                        </div>
                        <div class="modal-body" style="margin-bottom: 20px">
                            <div class="form-group">
                                        <label for="NamaBarang">Judul</label>
                                        <input type="hidden" name="nama" value="<?php echo $user[0]['namadepan'].' '.$user[0]['namabelakang'] ?>">
                                        <input type="text" class="form-control" name="Judul" placeholder="Judul">
                                    </div>
                                    <div class="form-group">
                                        <label for="haga">Konten</label>
                                        <textarea type="text" class="form-control" name="Konten" placeholder="Konten"></textarea>

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Pilih Foto</label>
                                        <input name="foto" type="file" class="file btn btn-primary" style="width: 100%">
                                    </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
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
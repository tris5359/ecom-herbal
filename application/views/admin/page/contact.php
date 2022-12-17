<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<?php 
      $stmt = $this->db->query("SELECT * from tb_content ORDER BY `tb_content`.`kodecontent` DESC")->result_array();
 ?>

    <body data-ng-app>
    <?php include 'includes/sidebar.php'; ?>
    <!-- Overlay For Sidebars -->

    <!-- #END# Search Bar -->
    <section class="content">
    <?php include 'includes/topbar.php'; ?>

    <div class="warper container-fluid">
        <div class="page-header"><h1>View Message</h1></div>
       
        <div class="warper container-fluid" style="display: block;">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a href="#" data-column="0" class="toggle-vis btn btn-default btn-sm">No</a>
                                <a href="#" data-column="1" class="toggle-vis btn btn-default btn-sm">Judul Content</a>
                                <a href="#" data-column="2" class="toggle-vis btn btn-default btn-sm">Isi Content</a>
                            </div>
                            <div class="panel-body">
                            <div class="panel-heading">
                            </div>
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="toggleColumn-datatable">
                                    <thead>
                                       <tr>
                                            <!--<th>Kode Kategori</th>-->
                                            <th>No</th>
                                            <th>Judul Content</th>
                                            <th>Isi Content</th>
                                            <th>Alat</th>
                                        </tr>
                                            

                                    </thead>                     
                                    <tbody>
                                       <?php
                                    $i=1;
                                        foreach($stmt as $row){
                                                echo "<tr>";
                                                //echo "<td>$row[kodedetil]</td>";
                                                echo "<td>$i.</td>";
                                                echo "<td>$row[judul]</td>";
                                                echo "<td>$row[isicontent]</td>";
                                                /*echo "<td><a href='menu2.php?menu=editkategori&id=$row[kodedetil]'>
                                                <span class='glyphicon glyphicon-edit'></span> Edit</a> 
                                                <a href='menu2.php?menu=delkategori&id=$row[kodedetil]'><span class='glyphicon glyphicon-remove'></span> Delete</a></td>";*/
                                    ?><td>
                                        <a href="<?php echo base_url()?>admin/hapusContact?kodecontent=<?php echo $row['kodecontent']; ?>" onclick = " return confirm('anda yakin ingin menghapus data ini ?');" title="hapus" class="btn btn-danger"  style="margin-right : 8px "><i class="fa fa-trash-o"></i></a>
                                        </td><?php
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


        </div>
        <!-- Warper Ends Here (working area) -->
        <?php include 'includes/footer.php' ?>
</section>
    
     <?php include 'includes/scripts.php' ?>
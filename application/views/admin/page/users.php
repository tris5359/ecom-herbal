<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<?php 
      $stmt = $this->db->query("SELECT * FROM `tb_user` where akses=1")->result_array();

 ?>

    <body data-ng-app>
    <?php include 'includes/sidebar.php'; ?>
    <!-- Overlay For Sidebars -->

    <!-- #END# Search Bar -->
    <section class="content">
    <?php include 'includes/topbar.php'; ?>

    <div class="warper container-fluid">
        <div class="page-header"><h1>Users</h1></div>
       
        <div class="warper container-fluid" style="display: block;">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a href="#" data-column="0" class="toggle-vis btn btn-default btn-sm">No</a>
                                <a href="#" data-column="1" class="toggle-vis btn btn-default btn-sm">Foto</a>
                                <a href="#" data-column="2" class="toggle-vis btn btn-default btn-sm">Email</a>
                                <a href="#" data-column="3" class="toggle-vis btn btn-default btn-sm">Nama</a>
                                <a href="#" data-column="4" class="toggle-vis btn btn-default btn-sm">Status</a>
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
                                              <th>Email</th>
                                              <th>Nama</th>
                                              <th>Status</th>
                                        </tr>
                                            

                                    </thead>                     
                                    <tbody>
                                       <?php
                                    $i=1;
                                        foreach($stmt as $row){
                                            $status = ($row['status']==1) ? '<span class="label label-success">Aktivasi</span>' : '<span class="label label-danger">Belum Aktivasi</span>';
                                            $active = ($row['status']==0) ? '<span class="pull-right"><a href="#activate" class="status" data-toggle="modal" data-id="'.$row['kduser'].'"><i class="fa fa-check-square-o"></i></a></span>' : '';
                                            $image = (!empty($row['foto'])) ? base_url().'assets/images/'.$row['foto'] : base_url().'assets/images/noimage.jpg';
                                                echo "<tr>";
                                                echo "<td align='center'>".$i."</td>";
                                                echo "<td align='center'> <a href='$image'> <img src='".$image."' height='30px' width='30px'></a></td>";
                                                echo '<td>'.$row['email'].'</td>';
                                                echo '<td>'.$row['namadepan'].' '.$row['namabelakang'].'</td>';
                                                echo '<td>'.$status.' '.$active.'</td>';
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
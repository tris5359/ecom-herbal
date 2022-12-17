<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<?php 
      $stmt = $this->db->query("SELECT * from tb_transfer")->result_array();

 ?>

    <body data-ng-app>
    <?php include 'includes/sidebar.php'; ?>
    <!-- Overlay For Sidebars -->

    <!-- #END# Search Bar -->
    <section class="content">
    <?php include 'includes/topbar.php'; ?>

    <div class="warper container-fluid">
           <div class="page-header"><h1>Payments</h1></div>
       
        <div class="warper container-fluid" style="display: block;">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a href="#" data-column="0" class="toggle-vis btn btn-default btn-sm">No</a>
                                <a href="#" data-column="1" class="toggle-vis btn btn-default btn-sm">Nomor Nota</a>
                                <a href="#" data-column="2" class="toggle-vis btn btn-default btn-sm">Tanggal Transfer</a>
                                <a href="#" data-column="3" class="toggle-vis btn btn-default btn-sm">Nama Bank</a>
                                <a href="#" data-column="4" class="toggle-vis btn btn-default btn-sm">Pemilik Rekening</a>
                                <a href="#" data-column="5" class="toggle-vis btn btn-default btn-sm">Jumlah</a>
                                <a href="#" data-column="6" class="toggle-vis btn btn-default btn-sm">Status</a>
                            </div>
                            <div class="panel-body">
                            <div class="panel-heading">
                           
                            </div>
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="toggleColumn-datatable">
                                    <thead>
                                        <tr class="text-center">
                                            <th align='center'>No.</th>
                                            <th align='center'>Nomor Nota</th>
                                            <th align='center'>Tanggal Transfer</th>
                                            <th align='center'>Nama Bank</th>
                                            <th align='center'>Pemilik Rekening</th>
                                            <th align='center'>Jumlah</th>
                                            <th align="center">Status</th>
                                            <th align='center'>Action</th>
                                            
                                        </tr>
                                    </thead>                     
                                    <tbody>
                                     <?php
                                    $i=1;
                                    foreach($stmt as $row){                                 
                                            echo "<tr>";
                                            echo "<td align='center'>$i</td>";
                                            echo "<td align='center'>$row[nomornota]</td>";
                                            echo "<td align='center'>$row[tgltransfer]</td>";
                                            echo "<td align='center'>$row[namabank]</td>";
                                            echo "<td align='left'>$row[pemilikrekening]</td>";
                                            echo "<td align='right'>Rp.".number_format($row["jumlahuang"],0,',','.')."</td>";
                                            if ($row['status'] == 0) {
                                                echo "<td align='center'><span class='label label-danger'>Not Confirmed</span></td>";
                                            }else{
                                                echo "<td align='center'><span class='label label-success'> Confirmed</span></td>";
                                            }
                                            echo "<td align='center'><a href='#' class='btn btn-info'>
                                                <i class='fa fa-fw fa-check-square-o'></i> Konfirmasi</a></td>";
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
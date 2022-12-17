<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<?php 
      $stmt = $this->db->query("SELECT *, tb_pemesanan.status as stat, tb_pemesanan.namadepan as depan, tb_pemesanan.namabelakang as belakang  from tb_pemesanan inner join tb_user on tb_pemesanan.kodepelanggan=tb_user.kduser ORDER BY tglbeli DESC")->result_array();

 ?>

    <body data-ng-app>
    <?php include 'includes/sidebar.php'; ?>
    <!-- Overlay For Sidebars -->

    <!-- #END# Search Bar -->
    <section class="content">
    <?php include 'includes/topbar.php'; ?>

    <div class="warper container-fluid">
        <div class="page-header"><h1>Orders</h1></div>
       
        <div class="warper container-fluid" style="display: block;">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a href="#" data-column="0" class="toggle-vis btn btn-default btn-sm">No</a>
                                <a href="#" data-column="1" class="toggle-vis btn btn-default btn-sm">Nama Pembeli</a>
                                <a href="#" data-column="2" class="toggle-vis btn btn-default btn-sm">No Telpon</a>
                                <a href="#" data-column="3" class="toggle-vis btn btn-default btn-sm">Tanggal Beli</a>
                                <a href="#" data-column="4" class="toggle-vis btn btn-default btn-sm">pembayaran</a>
                                <a href="#" data-column="5" class="toggle-vis btn btn-default btn-sm">status</a>
                                <a href="#" data-column="6" class="toggle-vis btn btn-default btn-sm">Produk</a>
                            </div>
                            <div class="panel-body">
                            <div class="panel-heading">
                           
                            </div>
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="toggleColumn-datatable">
                                    <thead>
                                        <tr>
                                            <th><p class='text-center'>No.</p></th>
                                            <th><p class='text-center'>Nama Pembeli</p></th>
                                            <th><p class='text-center'>No Telpon</p></th>
                                            <th><p class='text-center'>Tanggal Beli</p></th>
                                            <th><p class='text-center'>pembayaran</p></th>
                                            <th><p class='text-center'>status</p></th>
                                            <th><p class='text-center'>Produk</p></th>
                                            <!-- <th><p class='text-center'>Nama Pelanggan</p></th> -->
                                            <th><p class='text-center'>Kirim</p></th>
                                        </tr>
                                    </thead>                     
                                    <tbody>
                                       <?php
                                    $i=1;
                                        foreach($stmt as $row){
                                            $total = 0;
                                        $stmt2 = $this->db->query("SELECT * FROM vnota LEFT JOIN tb_barang ON tb_barang.kodebarang=vnota.kodebarang WHERE idpemesanan='".$row['idpemesanan']."'")->result_array();

                                        foreach($stmt2 as $row2){
                                            $subtotal = $row2['harga']*$row2['banyak'];
                                            $total += $subtotal;
                                        }
                                        echo "<tr>";
                                        echo "<td><p class='text-center'>$i.</p></td>";
                                        echo "<td>".$row['namadepan'].' '.$row['namabelakang']."</td>
                                            <td>".$row['nomorhp']."</td>
                                            <td>".date('d F Y', strtotime($row['tglbeli']))."</td>
                                            <td>Rp. ".number_format($total,2,',','.')."</td>
                                            ";?>
                                            <?php
                                            if ($row['stat']=='Sukses') {
                                               echo "<td style='color:green;'><b>".$row['stat']."</b></td>"; 
                                              } else {
                                               echo "<td style='color:red;'><b>".$row['stat']."</b></td>"; 
                                              }
                                              echo "
                                            <td>";?>
                                            <a href="#transaction<?php echo $row['idpemesanan']?>"  data-toggle="modal" data-target="#transaction<?php echo $row['idpemesanan']?>"  class="btn btn-sm btn-flat btn-primary transact"><i class='fa fa-search'></i>
                                                View
                                            </a>

                                            </td>
                                            <td>
                                                <a href="#kirim<?php echo $row['idpemesanan']?>"  data-toggle="modal" data-target="#kirim<?php echo $row['idpemesanan']?>"  class="btn btn-warning btn-sm btn-flat kirim"><i class='fa fa-envelope'></i>
                                                Kirim
                                            </a>
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
        <div class="modal fade" id="transaction<?php echo $row['idpemesanan']?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span></button>
                                                      <h4 class="modal-title"><b>Daftar Pembelanajaan</b></h4>
                                                    </div>
                                                    <div class="modal-body " >
                                                      <p>
                                                        Tanggal: <span id="date"><?php echo date('d F Y', strtotime($row['tglbeli'])) ?> </span>
                                                        <span class="pull-right">Kode Transaksi: <span id="transid"> <?php echo $row['kodetransaksi']?></span></span> 
                                                      </p>
                                                      <div class="row " style="margin-left: 10px;margin-right: 10px; margin-top: 20px">
                                                        <div class="col-md-5 table-bordered " style="padding: 5px 5px">Produk</div>
                                                        <div class="col-md-2 table-bordered  " style="padding: 5px 5px">Harga</div>
                                                        <div class="col-md-2 table-bordered  " style="padding: 5px 5px">Quantity</div>
                                                        <div class="col-md-3 table-bordered  " style="padding: 5px 5px">Subtotal</div>
                                                      </div>
                                                      <?php
                                                        $stmt3 = $this->db->query("SELECT * FROM vnota LEFT JOIN tb_barang ON tb_barang.kodebarang=vnota.kodebarang WHERE idpemesanan='".$row['idpemesanan']."'")->result_array();
                                                                $total = 0;
                                                                foreach($stmt3 as $row3){
                                                                    $subtotal = $row3['harga']*$row3['banyak'];
                                                                    $total += $subtotal;
                                                                echo '<div class="row " style="margin-left: 10px;margin-right: 10px;">
                                                                        <div class="col-md-5 table-bordered  " style="padding: 5px 5px">'.$row3['namabarang'].'</div>
                                                                        <div class="col-md-2 table-bordered  " style="padding: 5px 5px">'.number_format($row3['harga'],0,',','.').'</div>
                                                                        <div class="col-md-2 table-bordered  " style="padding: 5px 5px">x'.$row3['banyak'].'</div>
                                                                        <div class="col-md-3 table-bordered " style="padding: 5px 5px">'.number_format($subtotal,0,',','.').'</div>
                                                                       </div>'; }?>
                                                                  <div class="row " style="margin-left: 10px;margin-right: 10px;">
                                                                    <div class="col-md-9 table-bordered  " style="padding: 5px 5px">Total</div>
                                                                    <div class="col-md-3 table-bordered  " style="padding: 5px 5px">Rp. <?php echo number_format($total,0,',','.')?></div>
                                                                  </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                  <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                                                </div>
                    </div>
            </div>
        </div>

        <div class="modal fade" id="kirim<?php echo $row['idpemesanan']?>" tabindex="-1" role="dialog" >
                                               <div class="modal-dialog m-t-80" >
                                                <div class="modal-content" style="width: 900px;margin-left: -25%">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span></button>
                                                      <h4 class="modal-title"><b>KIRIM PRODUK...</b></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                      <div class="row " style="margin-left: 10px;margin-right: 10px; margin-top: 20px">
                                                        <div class="col-md-3 table-bordered  " style="padding: 5px 5px">Nama Penerima</div>
                                                        <div class="col-md-9 table-bordered  " style="padding: 5px 5px"><?php echo $row['depan'].' '.$row['belakang']?></div>
                                                      </div>
                                                      <div class="row " style="margin-left: 10px;margin-right: 10px;">
                                                        <div class="col-md-3 table-bordered  " style="padding: 5px 5px">No Telpon Penerima</div>
                                                        <div class="col-md-9 table-bordered  " style="padding: 5px 5px"><?php echo $row['notlp']?></div>
                                                      </div>
                                                      <div class="row " style="margin-left: 10px;margin-right: 10px;">
                                                        <div class="col-md-3 table-bordered  " style="padding: 5px 5px">Kode Pos</div>
                                                        <div class="col-md-9 table-bordered  " style="padding: 5px 5px"><?php echo $row['kdpos']?></div>
                                                      </div>
                                                      <div class="row " style="margin-left: 10px;margin-right: 10px;">
                                                        <div class="col-md-3 table-bordered  " style="padding: 5px 5px">Alamat</div>
                                                        <div class="col-md-9 table-bordered  " style="padding: 5px 5px"><?php echo $row['alamatpenerima']?></div>
                                                      </div>
                                                      <div class="row " style="margin-left: 10px;margin-right: 10px;">
                                                        <div class="col-md-3 table-bordered  " style="padding: 5px 5px">Daerah</div>
                                                        <div class="col-md-9 table-bordered  " style="padding: 5px 5px"><?php echo $row['daerah']?></div>
                                                      </div>
                                                      <div class="row " style="margin-left: 10px;margin-right: 10px;">
                                                        <div class="col-md-3 table-bordered  " style="padding: 5px 5px">Tanggal Pemesanan</div>
                                                        <div class="col-md-9 table-bordered  " style="padding: 5px 5px"><?php echo $row['tglbeli']?></div>
                                                      </div>
                                                      <div style="margin-top: 30px"></div>
                                                      <form class="form-horizontal" method="POST" action="pages/order_kirim.php">
                                                        <input type="hidden" class="id" name="id" value="<?php echo $row['idpemesanan']?>">
                                                        <div class="text-center">
                                                            <p>KIRIM PRODUK KEPADA</p>
                                                            <h2 class="bold nama"><?php echo $row['namadepan'].' '.$row['namabelakang']?></h2>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                                      <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-envelope-open"></i> Kirim</button>
                                                      </form>
                                                      </div>
                                                    </div>
                                                </div>
                                            </div>
<?php }?>
            
        </div>
        <!-- Warper Ends Here (working area) -->
        <?php include 'includes/footer.php' ?>
</section>
    
     <?php include 'includes/scripts.php' ?>    
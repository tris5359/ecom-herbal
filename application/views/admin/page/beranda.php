<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<?php 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }

?>
    <body data-ng-app>
    <?php include 'includes/sidebar.php'; ?>
    <!-- Overlay For Sidebars -->

    <!-- #END# Search Bar -->
    <section class="content">
    <?php include 'includes/topbar.php'; ?>

    <div class="warper container-fluid">
                    
            <div class="page-header"><h1>Dashboard</h1></div>
            
            
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="panel panel-default clearfix dashboard-stats rounded">
                         <?php
                            $stmt = $this->db->query("SELECT SUM(harga) as hargabarang FROM tb_detilnota")->result_array(); 
                              $total = $stmt[0]['hargabarang'];

                          ?>    
                        <span id="dashboard-stats-sparkline1" class="sparkline transit"></span>
                        <i class="fa  fa-money bg-success transit stats-icon"></i>
                        <h3 class="transit">Rp. <?php echo number_format_short($total,2,',','.'); ?></h3>
                        <p class="text-muted transit">Total Penjualan</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="panel panel-default clearfix dashboard-stats rounded">
                         <?php
                            $count = $user =$this->db->query("SELECT count(*) as notif_order FROM tb_detilnota WHERE proses = 0 ")->result_array(); 
                            ?>
                        <span id="dashboard-stats-sparkline1" class="sparkline transit"></span>
                        <i class="fa fa-shopping-cart bg-warning transit stats-icon"></i>
                        <h3 class="transit"><?php echo $count[0]['notif_order']; ?></h3>
                        <p class="text-muted transit">Orders</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="panel panel-default clearfix dashboard-stats rounded">
                        <?php
                            $count = $user =$this->db->query("SELECT count(*) as notif_product FROM tb_barang")->result_array(); 
                            ?>
                        <span id="dashboard-stats-sparkline2" class="sparkline transit"></span>
                        <i class="fa fa-tags bg-info transit stats-icon"></i>
                        <h3 class="transit"><?php echo $count[0]['notif_product']; ?></h3>
                        <p class="text-muted transit">Products</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="panel panel-default clearfix dashboard-stats rounded">
                        <?php
                            $count = $user =$this->db->query("SELECT count(*) as notif_user FROM tb_user ")->result_array(); 
                            ?>
                        <span id="dashboard-stats-sparkline3" class="sparkline transit"></span>
                        <i class="fa fa-user bg-danger transit stats-icon"></i>
                        <h3 class="transit"><?php echo $count[0]['notif_user']; ?> </h3>
                        <p class="text-muted transit">Total Users</p>
                    </div>
                </div>
            
            </div>

                  <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Laporan Penjualan Bulanan</h3>
              <div class="box-tools pull-right">
                <form class="form-inline">
                  <div class="form-group">
                    <label>Pilih Tahun: </label>
                    <select class="form-control input-sm" id="select_year">
                      <?php
                        for($i=2015; $i<=2065; $i++){
                          $selected = ($i==$year)?'selected':'';
                          echo "
                            <option value='".$i."' ".$selected.">".$i."</option>
                          ";
                        }
                      ?>
                    </select>
                  </div>
                </form>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <br>
                <div id="legend" class="text-center"></div>
                <canvas id="barChart" style="height:300px"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>

            
      
            
            
            
        </div>
        <!-- Warper Ends Here (working area) -->
        <?php include 'includes/footer.php' ?>
</section>
    
     <?php include 'includes/scripts.php' ?>
     <!-- Chart Data -->
<?php
  $months = array();
  $sales = array();
  for( $m = 1; $m <= 12; $m++ ) {
    try{
      $stmt = $this->db->query("SELECT *, SUM(harga) as total FROM tb_detilnota WHERE MONTH(tglnota)='".$m."' AND YEAR(tglnota)='".$year."'")->result_array();
      $total = $stmt[0]['total'];


      array_push($sales, round($total, 2));
    }
    catch(PDOException $e){
      echo $e->getMessage();
    }

    $num = str_pad( $m, 2, 0, STR_PAD_LEFT );
    $month =  date('M', mktime(0, 0, 0, $m, 1));
    array_push($months, $month);
  }

  $months = json_encode($months);
  $sales = json_encode($sales);

?>

<script>
$(function(){
  var barChartCanvas = $('#barChart').get(0).getContext('2d')
  var barChart = new Chart(barChartCanvas)
  var barChartData = {
    labels  : <?php echo $months; ?>,
    datasets: [
      {
        label               : 'Pemasukan',
        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : <?php echo $sales; ?>
      }
    ]
  }

  var barChartOptions                  = {

    scaleBeginAtZero        : true,
    scaleShowGridLines      : true,
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    scaleGridLineWidth      : 1,
    scaleShowHorizontalLines: true,
    scaleShowVerticalLines  : true,
    barShowStroke           : true,
    barStrokeWidth          : 2,
    barValueSpacing         : 5,
    barDatasetSpacing       : 1,
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
    responsive              : true,
    maintainAspectRatio     : true
  }

  barChartOptions.datasetFill = false
  var myChart = barChart.Bar(barChartData, barChartOptions)
  document.getElementById('legend').innerHTML = myChart.generateLegend();
});
</script>
<script>
$(function(){
  $('#select_year').change(function(){
    window.location.href = 'admin?year='+$(this).val();
  });
});
</script>
<!DOCTYPE html>
<html lang="en">

<head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/images/toko/<?php echo $site[0]['fotoLogo'] ?>"/>
  <title>Admin <?php echo $site[0]['sitename'] ?></title>

  <meta name="description" content="">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/bootstrap/bootstrap.css" /> 


  <!-- datatables Styling  -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/plugins/datatables/jquery.dataTables.css" />
  <!-- Calendar Styling  -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/plugins/calendar/calendar.css" />
    
    <!-- Fonts  -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,300' rel='stylesheet' type='text/css'>
    
    <!-- Base Styling  -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/app/app.v2.css" />
    
    <script src="<?php echo base_url() ?>assets/tinymce/tinymce.js"></script>
  
  <script>tinymce.init({selector:'textarea'});</script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/cssNotif.css">

  <?php
      if(isset($_SESSION['error'])){
        echo '
          <div style="z-index:1"
           class="notify bar-top do-show" data-notification-status="error">
            <p style="margin-top:10px;font-size:18px;font-family:andalus">'.$_SESSION["error"].'</p> 
          </div>
        ';
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo '
          <div style="z-index:1"
          data-status="success" class="notify bar-top do-show" data-notification-status="success">
            <p style="margin-top:10px;font-size:18px;font-family:andalus">'.$_SESSION["success"].'</p> 
          </div>
        ';
        unset($_SESSION['success']);
      }
    ?>
    <script  src="<?php echo base_url()?>assets/jsnotif.js"></script>
    <?php

function number_format_short( $n, $precision = 1 ) {
  if ($n < 900) {
    // 0 - 900
    $n_format = number_format($n, $precision);
    $suffix = '';
  } else if ($n < 900000) {
    // 0.9k-850k
    $n_format = number_format($n / 1000, $precision);
    $suffix = ' Ribu';
  } else if ($n < 900000000) {
    // 0.9m-850m
    $n_format = number_format($n / 1000000, $precision);
    $suffix = ' Juta';
  } else if ($n < 900000000000) {
    // 0.9b-850b
    $n_format = number_format($n / 1000000000, $precision);
    $suffix = ' Meliar';
  } else {
    // 0.9t+
    $n_format = number_format($n / 1000000000000, $precision);
    $suffix = ' Triliun';
  }
  // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
  // Intentionally does not affect partials, eg "1.50" -> "1.50"
  if ( $precision > 0 ) {
    $dotzero = '.' . str_repeat( '0', $precision );
    $n_format = str_replace( $dotzero, '', $n_format );
  }
  return $n_format . $suffix;
}

?>
<?php 
$actual_link = $_SERVER['REQUEST_URI'];
$link2 = str_replace('/herbal/', '', $actual_link);
//$link2 = str_replace('/.'$site['sitename'].'/', '', $actual_link);
$actual_link2 = $_SERVER['PHP_SELF'];
$link3 = str_replace('/herbal/index.php/', '', $actual_link2);
//$link2 = str_replace('/.'$site['sitename'].'/', '', $actual_link);
  $outputCART =0;

if(!empty($this->session->userdata('id'))){
  try{
      $cnt =  $this->db->query("SELECT count(*) as jumlah FROM tb_keranjang LEFT JOIN tb_barang ON tb_barang.kodebarang=tb_keranjang.kodebarang WHERE tb_keranjang.kodepelanggan='".$user[0]['kduser']."'")->result_array();

      $outputCART = $cnt[0]['jumlah'];

     
    }
    catch(PDOException $e){
     echo $e->getMessage();
    }
}else if(isset($_SESSION['cart'])){
      $outputCART = count($_SESSION['cart']) ;
  }
?>

<header >
  <div class="top-bar">
        <div class="content-topbar flex-sb-m h-full">
          <div class="left-top-bar">
          </div>
          <div class="right-top-bar flex-w h-full">
            

            <a href="<?php echo base_url()?>login" class="flex-c-m trans-04 p-lr-25">
              Login
            </a>
          </div>
             


          
        </div>
      </div>
    <!-- Header desktop -->
    <div class="container-menu-desktop trans-03">
      <div class="wrap-menu-desktop" style="background-color: #fff;">
        <nav class="limiter-menu-desktop p-l-45">
          
          <!-- Logo desktop -->   
          <a href="#" class="logo" style="color:green;font-size:50px;font-family: sail">
           <b><?php echo $site[0]['sitename'] ?></b>
          </a>
          <!-- Menu desktop -->
          <div class="menu-desktop">
            <ul class="main-menu">
              <li class="<?php echo ($link2=="page/" || $link2=="") ? "active-menu" : ''; ?>">
                <a href="<?php echo base_url()?>">Home</a>
              </li>

              <li class="<?php echo ($link2=="page/Product" || $link3=="page/productDetail"  || $link3=="page/category") ? "active-menu" : ''; ?>">
                <a href="<?php echo base_url()?>page/Product">Product</a>
              </li>

              <li class="<?php echo ($link2=="page/Track_Oder" || $link2=="page/lihatPemesanan") ? "active-menu" : ''; ?>" >
                <a href="<?php echo base_url()?>page/Track_Oder">Track Oder</a>
              </li>

              <li class="<?php echo ($link2=="page/Payment" ) ? "active-menu" : ''; ?>">
                <a href="<?php echo base_url()?>page/Payment">Payment</a>
              </li>


              <li class="<?php echo ($link2=="page/About" ) ? "active-menu" : ''; ?>">
                <a href="<?php echo base_url()?>page/About">About</a>
              </li>
              <li class="<?php echo ($link2=="page/blog" || $link2=="page/blogDetail" ) ? "active-menu" : ''; ?>">
                <a href="<?php echo base_url()?>page/blog">Blog</a>
              </li>

              <li class="<?php echo ($link2=="page/Contact" ) ? "active-menu" : ''; ?>">
                <a href="<?php echo base_url()?>page/Contact">Contact</a>
              </li>
            </ul>
          </div>  

          <!-- Icon header -->
          <div class="wrap-icon-header flex-w flex-r-m h-full">
            <div class="flex-c-m h-full p-r-24">
              <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
              </div>
            </div>

              
            <div class="flex-c-m h-full p-l-18 p-r-25 bor5">
              <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="<?php echo $outputCART ?>">
                <i class="zmdi zmdi-shopping-cart"></i>
              </div>
            </div>
              
            <div class="flex-c-m h-full p-lr-19">
              <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
                <i class="zmdi zmdi-menu"></i>
              </div>
            </div>
          </div>
        </nav>
      </div>  
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
      <!-- Logo moblie -->    
      <div class="logo-mobile" style="color:green;font-size:30px;font-family: sail;margin-top: -10px">
           <b><?php echo $site[0]['sitename'] ?></b>
        <a href="<?php echo base_url()?>"></a>
      </div>

      <!-- Icon header -->
      <div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
        <div class="flex-c-m h-full p-r-10">
          <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
            <i class="zmdi zmdi-search"></i>
          </div>
        </div>

        <div class="flex-c-m h-full p-lr-10 bor5">
          <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="<?php echo $outputCART ?>">
            <i class="zmdi zmdi-shopping-cart"></i>
          </div>
        </div>
      </div>

      <!-- Button show menu -->
      <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
      <ul class="main-menu-m">
        <li class="<?php echo ($link2=="index.php?View=home" || $link2=="") ? "active-menu" : ''; ?>">
                <a href="<?php echo base_url()?>">Home</a>
              </li>

              <li class="<?php echo ($link2=="page/Product" ) ? "active-menu" : ''; ?>">
                <a href="<?php echo base_url()?>page/Product">Product</a>
              </li>

              <li class="<?php echo ($link2=="page/Track_Oder" ) ? "active-menu" : ''; ?>" >
                <a href="<?php echo base_url()?>page/Track_Oder">Track Oder</a>
              </li>

              <li class="<?php echo ($link2=="page/Payment" ) ? "active-menu" : ''; ?>">
                <a href="<?php echo base_url()?>page/Payment">Payment</a>
              </li>


              <li class="<?php echo ($link2=="page/About" ) ? "active-menu" : ''; ?>">
                <a href="<?php echo base_url()?>page/About">About</a>
              </li>
              <li class="<?php echo ($link2=="page/blog" || $link2=="page/blogDetail") ? "active-menu" : ''; ?>">
                <a href="<?php echo base_url()?>page/blog">Blog</a>
              </li>

              <li class="<?php echo ($link2=="page/Contact" ) ? "active-menu" : ''; ?>">
                <a href="<?php echo base_url()?>page/Contact">Contact</a>
              </li>
              <li class="<?php echo ($link2=="page/profile" ) ? "active-menu" : ''; ?>">
                <a href="<?php echo base_url()?>page/profile">My Account</a>
              </li>

            </ul>
      </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
      <div class="container-search-header">
        <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
          <img src="<?php echo base_url()?>assets/images/icons/icon-close2.png" alt="CLOSE">
        </button>

        <form class="wrap-search-header flex-w p-l-15" action="<?php echo base_url()?>page/search" method="get">
          <button class="flex-c-m trans-04">
            <i class="zmdi zmdi-search"></i>
          </button>
          <input class="plh3" type="text" name="search" placeholder="Search...">
        </form>
      </div>
    </div>
  </header>

    <link rel="stylesheet" href="<?php echo base_url()?>assets/cssNotif.css">

  <?php
      if(isset($_SESSION['error'])){
        echo '
          <div style="margin-top:70px;z-index:1"
           class="notify bar-top do-show" data-notification-status="error">
            <p style="margin-top:10px;font-size:18px;font-family:andalus">'.$_SESSION["error"].'</p> 
          </div>
        ';
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo '
          <div style="margin-top:70px;z-index:1"
          data-status="success" class="notify bar-top do-show" data-notification-status="success">
            <p style="margin-top:10px;font-size:18px;font-family:andalus">'.$_SESSION["success"].'</p> 
          </div>
        ';
        unset($_SESSION['success']);
      }
    ?>
    <script  src="<?php echo base_url()?>assets/jsnotif.js"></script>

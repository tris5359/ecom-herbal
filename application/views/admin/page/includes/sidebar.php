<?php 
$actual_link = $_SERVER['PHP_SELF'];
$link = str_replace('/herbal/index.php/', '', $actual_link);
?> 

    <aside class="left-panel">
             <?php
              $image = (!empty($user[0]['foto'])) ? base_url().'assets/admin/images/avtar/'.$user[0]['foto'] : base_url().'assets/admin/images/avtar/user.png';
              $nama = (!empty($user[0]['namadepan'])) ? $user[0]['namadepan'].' '.$user[0]['namabelakang'] : 'Admin';
          ?>
            <div class="user text-center">
                  <img src="<?php echo $image ?>" class="img-circle" alt="...">
                  <h4 class="user-name"><?php echo $nama ?></h4>
                  
                  <div class="dropdown user-login">
                  <button class="btn btn-xs dropdown-toggle btn-rounded" type="button" data-toggle="dropdown" aria-expanded="true">
                    <i class="fa fa-circle status-icon available"></i> Online <i class="fa fa-angle-down"></i>
                  </button>
                  </div>     
            </div>

            <nav class="navigation">
                <ul class="list-unstyled">
                    <li class="<?php echo ($link=="admin") ? "active" : ''; ?>">
                        <a href="<?php echo base_url() ?>admin"><i class="fa fa-bookmark-o"></i><span class="nav-label">Dashboard</span></a>
                    </li>
                    <li class="<?php echo ($link=="admin/products") ? "active" : ''; ?>">
                        <a href="<?php echo base_url() ?>admin/products"><i class="fa fa-tags"></i><span class="nav-label">Products</span></a>
                    </li>
                    <li class="<?php echo ($link=="admin/category") ? "active" : ''; ?>">
                        <a href="<?php echo base_url() ?>admin/category"><i class="fa fa-puzzle-piece"></i><span class="nav-label">Category</span></a>
                    </li>
                    <li class="<?php echo ($link=="admin/users") ? "active" : ''; ?>">
                        <a href="<?php echo base_url() ?>admin/users"><i class="fa fa-group"></i><span class="nav-label">Users</span></a>
                    </li>
                    <li class="<?php echo ($link=="admin/orders") ? "active" : ''; ?>">
                        <a href="<?php echo base_url() ?>admin/orders"><i class="fa fa-list"></i><span class="nav-label">Orders</span></a>
                    </li>
                    <li class="<?php echo ($link=="admin/payments") ? "active" : ''; ?>">
                        <a href="<?php echo base_url() ?>admin/payments"><i class="fa fa-credit-card"></i><span class="nav-label">Payments</span></a>
                    </li>
                    <li class="<?php echo ($link=="admin/contact") ? "active" : ''; ?>">
                        <a href="<?php echo base_url() ?>admin/contact"><i class="fa fa-envelope"></i><span class="nav-label">Contact</span></a>
                    </li>
                    <li class="<?php echo ($link=="admin/setting") ? "active" : ''; ?>">
                        <a href="<?php echo base_url() ?>admin/setting"><i class="fa fa-gear"></i><span class="nav-label">Site Setting</span></a>
                    </li>
                    <li class="<?php echo ($link=="admin/banner") ? "active" : ''; ?>">
                        <a href="<?php echo base_url() ?>admin/banner"><i class="fa fa-barcode"></i><span class="nav-label">Banner</span></a>
                    </li>
                    <li class="<?php echo ($link=="admin/blog") ? "active" : ''; ?>">
                        <a href="<?php echo base_url() ?>admin/blog"><i class="fa fa-list"></i><span class="nav-label">Blog</span></a>
                    </li>

                </ul>
            </nav>
            
    </aside>
    <!-- Aside Ends-->
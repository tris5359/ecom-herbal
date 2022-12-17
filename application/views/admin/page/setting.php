<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>


    <body data-ng-app>
    <?php include 'includes/sidebar.php'; ?>
    <!-- Overlay For Sidebars -->

    <!-- #END# Search Bar -->
    <section class="content">
    <?php include 'includes/topbar.php'; ?>

    <div class="warper container-fluid">
        <div class="page-header"><h1>Site Setting</h1></div>
        <form action="<?php echo base_url()?>admin/updateSiteSetting" method="POST" enctype='multipart/form-data'>
                    <fieldset class="form-group">
                        <label for="Sitename">Site Name</label>
                        <input type="text" class="form-control" name="sitename" placeholder="Site Name" value="<?php echo $site[0]['sitename']; ?>">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="Tagline">Tagline</label>
                        <input type="text" class="form-control" name="tagline" placeholder="Tagline" value="<?php echo $site[0]['tagline']; ?>">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $site[0]['email']; ?>">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="email">Nomor Telpon</label>
                        <input type="text" class="form-control" name="notlp" placeholder="Nomor Telpon" value="<?php echo $site[0]['noTlp']; ?>">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="Deskripsi">Alamat</label>
                        <textarea type="text" class="form-control" name="alamat" placeholder="Alamat"><?php echo $site[0]['addressStore']; ?></textarea>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="Deskripsi">Tentang Toko</label>
                        <textarea type="text" class="form-control" name="tentangtoko" placeholder="Deskripsi Toko"><?php echo $site[0]['tentangToko']; ?></textarea>
                    </fieldset>
                    <fieldset class="form-group">
                        <label class="control-label">Logo</label>
                        <input name="fotologo" type="file" class="file btn btn-primary">
                    </fieldset>
                    <fieldset class="form-group">
                        <label class="control-label">Foto Toko</label>
                        <input name="fototoko" type="file" class="file btn btn-primary">
                    </fieldset>
                   <center style="margin-top: 50px"> <fieldset class="form-group">
                        <input type="submit" value="UPDATE" name="updateSite" class="btn btn-primary" style="padding: 5px 50px">
                    </fieldset></center>
                    
                </form>
        </div>
        <!-- Warper Ends Here (working area) -->
        <?php include 'includes/footer.php' ?>
</section>
    
     <?php include 'includes/scripts.php' ?>
     
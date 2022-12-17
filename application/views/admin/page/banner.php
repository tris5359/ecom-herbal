<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<?php 
      $b1 = $this->db->query("SELECT * FROM `banner` WHERE `banner`.`idbanner` =1")->result_array();
      $b2 = $this->db->query("SELECT * FROM `banner` WHERE `banner`.`idbanner` =2")->result_array();
      $b3 = $this->db->query("SELECT * FROM `banner` WHERE `banner`.`idbanner` =3")->result_array();
 ?>
    <body data-ng-app>
    <?php include 'includes/sidebar.php'; ?>
    <!-- Overlay For Sidebars -->

    <!-- #END# Search Bar -->
    <section class="content">
    <?php include 'includes/topbar.php'; ?>

    <div class="warper container-fluid">
        <div class="page-header"><h1>Site Setting</h1></div>
        <form action="<?php echo base_url()?>admin/updateBanner" method="POST" enctype='multipart/form-data'>
                    
                    <fieldset class="form-group">
                        <label class="control-label">Banner 1</label>
                        <br><img id="blah1" src="<?php echo base_url().'assets/images/banner/'.$b1[0]['img']?>" style="width: 300px; height: 160px">

                        <input name="fotob1" type="file" class="file btn btn-primary" onchange="readURL(this);" style="width: 300px;">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="text1">Text 1 Banner 1</label>
                        <input type="text" class="form-control" name="text1b1" placeholder="Text 1 Banner 1" value="<?php echo $b1[0]['text1']; ?>">
                        <input type="hidden" class="form-control" name="idb1" value="<?php echo $b1[0]['idbanner']; ?>">
                        <input type="hidden" class="form-control" name="oldb1" value="<?php echo $b1[0]['img']; ?>">

                    </fieldset>
                    <fieldset class="form-group">
                        <label for="text2">Text 2 Banner 1</label>
                        <input type="text" class="form-control" name="text2b1" placeholder="Text 2 Banner 1" value="<?php echo $b1[0]['text2']; ?>">
                    </fieldset>
                    <fieldset class="form-group">
                        <label class="control-label">Banner 2</label>
                        <br><img id="blah2" src="<?php echo base_url().'assets/images/banner/'.$b2[0]['img']?>" style="width: 300px; height: 160px">

                        <input name="fotob2" type="file" class="file btn btn-primary" onchange="readURL2(this);" style="width: 300px;">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="text1">Text 1 Banner 2</label>
                        <input type="text" class="form-control" name="text1b2" placeholder="Text 1 Banner 1" value="<?php echo $b2[0]['text1']; ?>">
                        <input type="hidden" class="form-control" name="idb2" value="<?php echo $b2[0]['idbanner']; ?>">
                        <input type="hidden" class="form-control" name="oldb2" value="<?php echo $b2[0]['img']; ?>">

                    </fieldset>
                    <fieldset class="form-group">
                        <label for="text2">Text 2 Banner 2</label>
                        <input type="text" class="form-control" name="text2b2" placeholder="Text 2 Banner 2" value="<?php echo $b2[0]['text2']; ?>">
                    </fieldset>
                    <fieldset class="form-group">
                        <label class="control-label">Banner 3</label>
                        <br><img id="blah3" src="<?php echo base_url().'assets/images/banner/'.$b3[0]['img']?>" style="width: 300px; height: 160px">
                        <input name="fotob3" type="file" class="file btn btn-primary" onchange="readURL3(this);" style="width: 300px;">
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="text1">Text 1 Banner 3</label>
                        <input type="text" class="form-control" name="text1b3" placeholder="Text 1 Banner 1" value="<?php echo $b3[0]['text1']; ?>">
                        <input type="hidden" class="form-control" name="idb3" value="<?php echo $b3[0]['idbanner']; ?>">
                        <input type="hidden" class="form-control" name="oldb3" value="<?php echo $b3[0]['img']; ?>">


                    </fieldset>
                    <fieldset class="form-group">
                        <label for="text2">Text 2 Banner 3</label>

                        <input type="text" class="form-control" name="text2b3" placeholder="Text 2 Banner 3" value="<?php echo $b3[0]['text2']; ?>">
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
     <script type="text/javascript">
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah1')
                        .attr('src', e.target.result)
                        .width(300)
                        .height(160);
                };

                reader.readAsDataURL(input.files[0]);
            }
        };
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah2')
                        .attr('src', e.target.result)
                        .width(300)
                        .height(160);
                };

                reader.readAsDataURL(input.files[0]);
            }
        };
        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah3')
                        .attr('src', e.target.result)
                        .width(300)
                        .height(160);
                };

                reader.readAsDataURL(input.files[0]);
            }
        };
</script>
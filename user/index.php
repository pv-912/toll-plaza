    <?php 
        require_once 'header.php';
     ?>
       

   
    <div class="container-fluid">
        <div class="row" >
            <div class="col-sm-6 col-sm-offset-5" style="text-align: center;margin-bottom:7vh;">

                <?php if($main_role=='student'){ ?>

                <a href="<?php echo base_url_student; ?>" class="rainbow-button" alt="Apply Now"></a>

                <?php } else{?>

                <a href="#login" data-toggle="modal" data-target="#login" class="rainbow-button" alt="Apply Now"></a>

                <?php }?>
            </div>
        </div>
    </div>


    <?php //require_once('footer.php'); ?>

    <?php require_once('../login_modal.php'); ?>
   
</body>

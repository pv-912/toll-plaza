    <?php 
include 'header.php';
?>

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="" id="top">
     <ol class="carousel-indicators">
       <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
       <li data-target="#carousel-example-generic" data-slide-to="1"></li>
       <li data-target="#carousel-example-generic" data-slide-to="2"></li>
     </ol>
    
     <div class="carousel-inner" role="listbox">
       <div class="item active">
         <img src="<?php echo base_url; ?>src/img/slider1.jpg" alt="slider1" class="indexSliderImage responsive">
         <div class="carousel-caption">
         </div>
       </div>
       <div class="item">
         <img src="<?php echo base_url; ?>src/img/slider2.jpg" alt="slider2" class="indexSliderImage responsive">
         <div class="carousel-caption">
         </div>
       </div>
       <div class="item">
         <img src="<?php echo base_url; ?>src/img/slider3.jpg" alt="slider3"  class="indexSliderImage responsive">
         <div class="carousel-caption">
         </div>
       </div>
     </div>

     <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
       <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
       <span class="sr-only">Previous</span>
     </a>
     <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
       <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
       <span class="sr-only">Next</span>
     </a>
   </div>
      <div class="container-fluid">
        <div class="row">
          <h1 style="padding-left: 5vw">About Us</h1>
          Pay-toll is a online application
        </div>
    </div>



    <?php require_once('../components/login_modal_user.php'); ?>
   
</body>











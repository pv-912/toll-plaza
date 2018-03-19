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
              <h1 class="about_header">ABOUT US</h1>
            <div class="half_underline"></div>
          <p class="about_discription">Rising traffic on tolls is an inescapable condition in large and growing metropolitan areas across the world, from Los Angeles to Tokyo, from Cairo to Sao Paolo. Peak-hour traffic on tolls is an inherent result of the way modern societies operate. It stems from the widespread desires of people to pursue certain goals that inevitably overload existing roads and transit systems every day. But everyone hates traffic on tolls, and it keeps getting worse, in spite of attempted remedies.</p>
        </div>
    </div>
<style >
  .carousel-inner>.item>img, .carousel-inner>.item>a>img {
    line-height: 1;
    width: 100%;
    height: 44em;
}
.discription {
    font-size: 2em;
    text-align: center;
}
.carousel {
    position: relative;
/*    margin-top: -3vh;*/
}
</style>


    <?php require_once('../components/login_modal_user.php'); ?>
   











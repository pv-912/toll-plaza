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
          <div class="image-heading">AIM FOR DIGITAL INDIA</div>
         </div>
       </div>
       <div class="item">
         <img src="<?php echo base_url; ?>src/img/slider2.jpg" alt="slider2" class="indexSliderImage responsive">
         <div class="carousel-caption">
         <div class="image-heading">YOU DON’T WANT TO BE IN THIS LANE – IT’S EXIT-ONLY</div>

         </div>
       </div>
       <div class="item">
         <img src="<?php echo base_url; ?>src/img/slider3.jpg" alt="slider3"  class="indexSliderImage responsive">
         <div class="carousel-caption">
         <div class="image-heading">SOLUTION TO TRAFFIC</div>

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
      <div id="about" class="container-fluid">
        <div class="row">
              <h1 class="about_header">ABOUT US</h1>
            <div class="half_underline"></div>
          <p class="about_discription">Rising traffic on tolls is an inescapable condition in large and growing metropolitan areas across the world, from Los Angeles to Tokyo, from Cairo to Sao Paolo. Peak-hour traffic on tolls is an inherent result of the way modern societies operate. It stems from the widespread desires of people to pursue certain goals that inevitably overload existing roads and transit systems every day. But everyone hates traffic on tolls, and it keeps getting worse, in spite of attempted remedies.</p>
        </div>
    </div>
<div id="contact" class="footer">
    <div class="row">
        <div class="col-md-6">
            <div class="footer_header">
                CONTACT US
            </div>
            <div class="half_underline_footer"></div>
            <div class="email">
                <p>Email Id : varunbhandia@tollplaza.com</p>
                <p>Mobile No. : +91 9001126303</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                    <div class="col-xs-4">
                        <center>
                        <a href="#"><img  src="../src/img/fb.png" alt="Sangram facebook" class="socialicons1"></a>
                            </center>
                    </div>
                    <div class="col-xs-4">  
                        <center>
                        <a href="#"> <img src="../src/img/youtube.png" alt="Sangram youtube" class="socialicons2"></a>
                        </center>
                    </div>
                    <div class="col-xs-4">   
                        <center>
                        <a href="#"> <img src="../src/img/insta.png" alt="Sangram instagram" class="socialicons3"></a>
                        </center>
                    </div>
                </div>
        </div>
    </div>
</div>

<style >
  .carousel-inner>.item>img, .carousel-inner>.item>a>img {
    line-height: 1;
    width: 100%;
    height: 44em;
}
    
@media only screen and (max-width: 768px) {
  .carousel-inner>.item>img, .carousel-inner>.item>a>img {
    line-height: 1;
    width: 100%;
    height: 15em;
}
}
    
.discription {
    font-size: 2em;
    text-align: center;
}
.carousel {
    position: relative;
/*    margin-top: -3vh;*/
}
#about{
  height: 92vh;
}
.about_header {
    margin-top: 7vh;
    margin-left: 5vw;
    font-family: 'Montserrat', sans-serif;
    font-size: 4em;
    font-weight: 600;
    color: black;
    letter-spacing: .2em;
}
.half_underline {
    margin-left: 5vw;
    height: 1vh;
    width: 12vw;
    background-color: black;
}
.about_discription {
    text-align: justify;
    line-height: 200%;
    /* margin-top: 2vh; */
    /* margin-right: 10vw; */
    /* margin-left: 5vw; */
    font-family: 'Montserrat', sans-serif;
    padding: 112px;
    font-size: 1.5em;
    color: #4b4d51;
}
#contact{
  height: 100vh;
}
.half_underline_footer {
    margin-top: 1.5vh;
    margin-left: 5vw;
    height: 0.7vh;
    width: 15vw;
    background-color: white;
}
.email {
    margin-top: 7vh;
    margin-left: 5vw;
    font-family: 'Montserrat', sans-serif;
    font-size: 2em;
    color: #e0e3e5;
    letter-spacing: .05em;
    line-height: 200%;
}
.socialicons1 {
    padding-top: 30vh;
    width: 1.6vw;
}.socialicons2 {
    padding-top: 30vh;
    width: 3.6vw;
}.socialicons3 {
    padding-top: 30vh;
    width: 3.6vw;
}
.footer_header {
    margin-top: 7vh;
    margin-left: 5vw;
    font-family: 'Montserrat', sans-serif;
    font-size: 4em;
    font-weight: 600;
    color: white;
    letter-spacing: .2em;
}
.image-heading{
  font-size: 5em;
}
</style>


    <?php require_once('../components/login_modal_tolls.php'); ?>






<script type="text/javascript">
  
   $(document).ready(function(){
    $('a[href^="#"]').click(function(e) {
        e.preventDefault();
        var target = this.hash, $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top
        }, 900, 'swing', function() {
            window.location.hash = target;
        });
    });
});
</script>




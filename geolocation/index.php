<?php include '../config/config.php';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <form id="formGeo" method="POST" action="geoLocation.php">
       <input type="hidden" name="latitude" id="latitude" />
       <input type="hidden" name="longitude" id="longitude" />
    </form>
</body>
</html>
<script>

$(document).ready(function(){
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showLocation);
    } else { 
        $('#location').html('Geolocation is not supported by this browser.');
    }
});


function showLocation(position) {
	document.getElementById("latitude").value=position.coords.latitude;
    document.getElementById("longitude").value=position.coords.longitude;
    document.getElementById("formGeo").submit();


 //    var latitude = position.coords.latitude;
	// var longitude = position.coords.longitude;
 //    latitude=latitude;
 //    longitude=longitude;
 //    console.log(longitude);
	// $.ajax({
	// 	type:'POST',
	// 	url:'geoLocation.php',
	// 	data:'latitude='+latitude+'&longitude='+longitude,
	// 	success:function(msg){
 //            if(msg){
 //               $("#location").html(msg);
 //            }else{
 //                $("#location").html('Not Available');
 //            }

        
	// 	}
	// });
   
}
</script>

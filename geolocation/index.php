<?php include '../config/config.php';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<!DOCTYPE html>
<html>

<body>
<span id="location"></span>
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
	
    var latitude = position.coords.latitude;
	var longitude = position.coords.longitude;
    latitude=latitude;
    longitude=longitude;
    console.log(longitude);
	$.ajax({
		type:'POST',
		url:'geoLocation.php',
		data:'latitude='+latitude+'&longitude='+longitude,
		success:function(msg){
            if(msg){
               $("#location").html(msg);
            }else{
                $("#location").html('Not Available');
            }

        
		}
	});
//     var location=$("#location").val();
// console.log(location);
}
</script>

<?php include '../config/config.php';?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>
<body>
    <form id="formGeo" method="POST" action="<?php echo base_url?>geolocation/geoLocation.php">
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
}
</script>

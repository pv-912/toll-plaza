<?php
if(!empty($_POST['latitude']) && !empty($_POST['longitude'])){

    //Send request and receive json data by latitude and longitude
    $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($_POST['latitude']).','.trim($_POST['longitude']).'&sensor=false';

    $json = @file_get_contents($url);
    $data = json_decode($json);
    $status = $data->status;
    if($status=="OK"){
        //Get address from json data
        $location = $data->results[0]->formatted_address;
    }else{
        $location =  '';
    }
    // dipslay address
    $location_ = $location;
      
    $geo_lat =$_POST['latitude'];;
    $geo_lng =$_POST['longitude'];;
    $side_by_two = 0.0001;
    $low_lat = $geo_lat - $side_by_two;
    $high_lat = $geo_lat + $side_by_two;
    $low_lng = $geo_lng - $side_by_two;
    $high_lng = $geo_lng + $side_by_two;
    $get_tolls = "SELECT * FROM tolls WHERE lat BETWEEN ($low_lat, $high_lat) AND lng BETWEEN ($low_lng, $high_lng)";

}
?>

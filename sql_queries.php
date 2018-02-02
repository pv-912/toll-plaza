<?php

    // Insert User
    $name = 'Nikhil One';
    $dob = '23-10-1998';
    $car_variant = 'light';
    $car_color = '#ff0000';
    $licence_no = 'AB-1234';
    $balance = 1000;
    $gender = 'Male';
    $add_user = `INSERT INTO users (name,  dob, car_variant, car_color, licence_no, balance, gender) VALUES ($name,  $dob, $car_variant, $car_color, $licence_no, $balance, $gender);`;

    // Insert Toll
    $name = 'Testing Toll One';
    $address = 'Roorkee, Haridwar';
    $lat = 12.312331;
    $lng = 213.231312;
    $heavy_rate = 200;
    $heavy_return_rate = 175;
    $medium_rate = 150;
    $medium_return_rate = 125;
    $light_rate = 100;
    $light_return_rate = 75;
    $add_toll = `INSERT INTO tolls (name, address, lat, lng, heavy_rate, heavy_return_rate, medium_rate, medium_return_rate, light_rate, light_return_rate) VALUES ($name, $address, $lat, $lng, $heavy_rate, $heavy_return_rate, $medium_rate, $medium_return_rate, $light_rate, $light_return_rate);`;

?>
<?php

    // Users table me rows ki identify krne le liye 


    // User Area
        // User Signup
            // Insert User -- Data from submitted form
                $name = 'Nikhil One';
                $dob = '23-10-1998';
                $car_variant = 'light';
                $car_color = '#ff0000';
                $license_no = 'AB-1234';
                $balance = 1000;
                $gender = 'Male';
                $contact = '';
                $vehicle_number = '';
                $username = '';
                $password = '';
                $role = '';
                $add_user = `INSERT INTO users (name,  dob, car_variant, car_color, license_no, balance, gender, contact, vehicle_number, username, password, role) VALUES ($name,  $dob, $car_variant, $car_color, $license_no, $balance, $gender, $contact, $vehicle_number, $username, $password, $role);`;


        // Get Tolls
            // Think of an efficient algorithm to fetch data depending of minimum distance




            // Method - 1: Square Box
            // Should obtain data using GET Request, for this
                $geo_lat = 'From Geolocation';
                $geo_lng = 'From Geolocation';
                $side_by_two = 0.0001;
                $low_lat = $geo_lat - $side_by_two;
                $high_lat = $geo_lat + $side_by_two;
                $low_lng = $geo_lng - $side_by_two;
                $high_lng = $geo_lng + $side_by_two;
                $get_tolls = `SELECT * FROM tolls WHERE lat BETWEEN ($low_lat, $high_lat) AND lng BETWEEN ($low_lng, $high_lng)`;

            // Use javascript to sort the result array
                // --> Maybe create a function which takes (array of objects) as input and appends a method to each object.
                //  That method calculates and returns the distance from geo_lat and geo_lng for that object.
                // Sort the array in ascending order based on obtained distance


            // Search
                $que = 'seach query';
                $get_tolls = `SELECT * FROM tolls WHERE name like '%$que%' or address like '%$que%' ORDER BY name`;



        // Request Toll Access
            // Data
                $user_id = 10; // from session
                $toll_id = 8; // from post
                $round = '0 or 1'; // from POST
                // Store car_varient-round in SESSION
                $get_payment = `SELECT $varient_and_round from tolls where id=$toll_id`;
                    // Handle errors: If get_payment -> num_rows == 0
                        return 'not_found'; // give error-> toll not found
                    // Else payment -> $get_payment;
                        $payment= 175;
            
            // Check if already exists
                $get_data = `SELECT round FROM toll_access WHERE toll_id=$toll_id AND user_id=$user_id`;
                    // if get_data -> num_rows == 0, then normally #GiveAccess
                        // if !(does exists round): Give access - Normal
                            // Set data in access table    
                                $add_access = `INSERT INTO toll_access (user_id, toll_id) VALUES ($user_id, $toll_id);`;
                            // Make Payment
                                $make_payment = `UPDATE users SET balance=balance-$payment WHERE id=$user_id;`;
                            // Insert Log
                                $add_log = `INSERT INTO user_logs (user_id, toll_id, payment) VALUES ($user_id, $toll_id, $payment);`;
                            return 'registered';

                        // else: Give access - Round
                            $round = 1;
                            // Set data in access table
                                $add_access = `INSERT INTO toll_access (user_id, toll_id, round) VALUES ($user_id, $toll_id, $round);`;
                            // Make Payment
                                $make_payment = `UPDATE users SET balance=balance-$payment WHERE id=$user_id;`;
                            // Insert Log
                                $add_log = `INSERT INTO user_logs (user_id, toll_id, payment) VALUES ($user_id, $toll_id, $payment);`;
                            return 'registered';

                    // else
                        return 'already_registered'; // give error-> alerady registered


        // Add Money
            $user_id = 10; // from session
            $payment = 500; // from POST
            $make_payment = `UPDATE users SET balance=balance+$payment WHERE id=$user_id;`;


        // Show user logs
            $user_id = 10; // from session
            $get_logs = `SELECT name, address, payment FROM user_logs AS logs INNER JOIN tolls ON logs.toll_id = tolls.id WHERE user_id=$user_id ;`;


    // Admin Area
        // Toll Signup
            // Insert Toll  -- Data from submitted form
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
                $username = '';
                $password = '';
                $role = '';
                $add_toll = `INSERT INTO tolls (name, address, lat, lng, heavy_rate, heavy_return_rate, medium_rate, medium_return_rate, light_rate, light_return_rate, username, password, role) VALUES ($name, $address, $lat, $lng, $heavy_rate, $heavy_return_rate, $medium_rate, $medium_return_rate, $light_rate, $light_return_rate, $username, $password, $role);`;


        // Toll Live Data
            $toll_id = 10; // From session
            $get_live_data = `SELECT * FROM toll_access AS toll INNER JOIN users ON toll.user_id = users.id where toll_id=$toll_id;`;


        // Toll Logs
            $toll_id = 10; // From session
            $get_toll_logs = `SELECT * FROM user_logs AS logs INNER JOIN users ON logs.user_id = users.id where toll_id = $toll_id order by id desc;`;



    // Scanner Area
        // Scanner - API
            // Verify access token -- if possible
            $toll_id = 8; // Obtained after toll login ?? Manually feed
            $user_id = 10;
            $get_data = `select * from toll_access where toll_id=$toll_id AND user_id=$user_id`;
                // If get_data -> num_rows == 0, then DOES NOT EXISTS
                    return 'denied';
                // else if get_data -> num_rows == 1 && round = 0, then EXISTS
                    $remove_access = ``;
                    return 'passed';
                // else if get_data -> num_rows == 1 && round = 1, then Round Trip Exists
                    $reset_round = ``;
                    return 'round';
                // else --> Exception occured.
                    //Log data
                    return 'error';
                // return --> handle hardware

?>
<?php
    // User Area
        // User Signup
            // Insert User
                $name = 'Nikhil One';
                $dob = '23-10-1998';
                $car_variant = 'light';
                $car_color = '#ff0000';
                $licence_no = 'AB-1234';
                $balance = 1000;
                $gender = 'Male';
                $add_user = `INSERT INTO users (name,  dob, car_variant, car_color, licence_no, balance, gender) VALUES ($name,  $dob, $car_variant, $car_color, $licence_no, $balance, $gender);`;

        // Request Access

            // Data
                $user_id = 10;
                $toll_id = 8;
                // For security puropses, dont get toll fee from  POST data. Use (user_id and user table) -> car_variant -> (toll_id and toll table) -> $payment
                $payment= 175;
            // Insert Log
                $add_log = `INSERT INTO user_logs (user_id, toll_id, payment) VALUES ($user_id, $toll_id, $payment);`;

            
            // Check if already exists
                $get_data = `select round from toll_access where toll_id=$toll_id AND user_id=$user_id`;
                    // if get_data -> num_rows == 0, then normally #GiveAccess
                        // Give access    
                            $add_log = `INSERT INTO toll_access (user_id, toll_id) VALUES ($user_id, $toll_id);`;
                            // Update money in user table
                            return 1;
                        // Give access - Round
                            $round = 1;
                            $add_log = `INSERT INTO toll_access (user_id, toll_id, round) VALUES ($user_id, $toll_id, $round);`;
                            // Update money in user table
                            return 1;
                    // else
                        return 0; // give error-> alerady registered


    // Admin Area
        // Toll Signup
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


    // Scanner Area
        // Scanner - API
            // Verify access token -- if possible
            $toll_id = 8;
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
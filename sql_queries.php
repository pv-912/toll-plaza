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


        // Get Tolls
            // Think of an efficient algorithm to fetch data depending of minimum distance












        // Request Toll Access
            // Data
                $user_id = 10; // from session
                $toll_id = 8; // from post
                // Store car_varient in SESSION
                $get_payment = `SELECT $varient from tolls where id=$toll_id`;
                    // Handle errors: If get_payment -> num_rows == 0
                        return 'not_found'; // give error-> toll not found
                    // Else payment -> $get_payment;
                        $payment= 175;


            // Insert Log
                $add_log = `INSERT INTO user_logs (user_id, toll_id, payment) VALUES ($user_id, $toll_id, $payment);`;

            
            // Check if already exists
                $get_data = `SELECT round FROM toll_access WHERE toll_id=$toll_id AND user_id=$user_id`;
                    // if get_data -> num_rows == 0, then normally #GiveAccess
                        // if !(does exists round): Give access - Normal
                            $add_log = `INSERT INTO toll_access (user_id, toll_id) VALUES ($user_id, $toll_id);`;
                            $make_payment = `UPDATE users SET balance=balance-$payment WHERE id=$user_id;`;
                            return 'registered';
                        // else: Give access - Round
                            $round = 1;
                            $add_log = `INSERT INTO toll_access (user_id, toll_id, round) VALUES ($user_id, $toll_id, $round);`;
                            $make_payment = `UPDATE users SET balance=balance-$payment WHERE id=$user_id;`;
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
        
        
        // Toll Live Data
            $toll_id = 10; // From session
            $get_live_data = `SELECT * FROM toll_access AS toll INNER JOIN users ON toll.user_id = users.id where toll_id=$toll_id;`;

        // Toll Logs
            $toll_id = 10; // From session
            $get_toll_logs = `SELECT * FROM user_logs AS logs INNER JOIN users ON logs.user_id = users.id where toll_id = $toll_id;`;



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
<?php
    require_once '../config/config.php';
    echo "string";
		$_SESSION['user_id'] = 1; 
		$user_id=$_SESSION['user_id'];
		$query = "SELECT * FROM `users` WHERE `id`= $user_id";
		$result = $conn->query($query);
		$row = $result->fetch_assoc();
		print_r($row);

    if ($row['role'] == 'user' && isset($_POST['toll_id'])) {

    	

        if ($row['carVariant'] == 'light' && isset($_POST['round'])) {

        	

            $varient_and_round = 'light_return_rate';


        } else if ($row['carVariant'] == 'light') {

        	

            $varient_and_round = 'light_rate';


        } else if ($row['carVariant'] == 'medium' && isset($_POST['round'])) {


            $varient_and_round = 'medium_return_rate';


        } else if ($row['carVariant'] == 'medium') {


            $varient_and_round = 'medium_rate';


        } else if ($row['carVariant'] == 'heavy' && isset($_POST['round'])) {


            $varient_and_round = 'heavy_return_rate';


        } else if ($row['carVariant'] == 'heavy') {


            $varient_and_round = 'heavy_rate';


        } else {


            print "Varient and Round Exception";


        };
         $varient_and_round;
         $toll_id=$_POST['toll_id'];
        $get_payment = "SELECT $varient_and_round FROM tolls WHERE id=$toll_id";

        $result = $conn->query($get_payment);
        while($row = $result->fetch_assoc()) {
            $payment= $row[$varient_and_round];
        }
        echo $payment;

        $get_data = "SELECT allow FROM toll_access WHERE toll_id=$toll_id AND user_id=$user_id";
        $result = $conn->query($get_data);
        $row=$result->num_rows;
        if ($row) {
            if (!isset($_POST['round'])) {
                $add_access = "INSERT INTO toll_access (user_id, toll_id) VALUES ($user_id, $toll_id);";
                
            } else {
                $add_access = "INSERT INTO toll_access (user_id, toll_id, allow) VALUES ($user_id, $toll_id, 1);";
            }
            $make_payment = "UPDATE users SET balance=balance-$payment WHERE id=$user_id;";
            $add_log = "INSERT INTO user_logs (user_id, toll_id, payment) VALUES ($user_id, $toll_id, $payment);";    
            $conn->query($add_access);
            $conn->query($make_payment);
            $conn->query($add_log);
            print "registered";
        } else {
            print "already_registered";
        }
    }
?>

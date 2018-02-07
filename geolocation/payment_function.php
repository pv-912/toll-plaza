<?php

    ob_start();
    session_start();
   /* logout after 10min. */    
    if(time()-$_SESSION['time']>60*60*10){
        unset($_SESSION['time']);
        // setcookie("username", "", time()-3600);
        // setcookie("role", "", time()-3600);
        // setcookie("name", "", time()-3600); 
        session_destroy();
        // header("location: ../index.php");}
    else{
        $_SESSION['time']=time();
    }
    require_once '../config/config.php';
    $user_id=$_SESSION['id'];
    $round = $_POST['round'];
    $query = "SELECT * FROM `users` WHERE `id`= $user_id";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    // Test it
    if ($row['role'] == 'user' && isset($_POST['toll_id'])) {
        if ($row['carVariant'] == 'light' && isset($round)) {
            $varient_and_round = 'light_return_rate';
        } else if ($row['carVariant'] == 'light') {
            $varient_and_round = 'light_rate';
        } else if ($row['carVariant'] == 'medium' && isset($round)) {
            $varient_and_round = 'medium_return_rate';
        } else if ($row['carVariant'] == 'medium') {
            $varient_and_round = 'medium_rate';
        } else if ($row['carVariant'] == 'heavy' && isset($round)) {
            $varient_and_round = 'heavy_return_rate';
        } else if ($row['carVariant'] == 'heavy') {
            $varient_and_round = 'heavy_rate';
        } else {
            echo "Varient and Round Exception";
        };

        $varient_and_round;
        $toll_id=$_POST['toll_id'];
        $get_payment = "SELECT $varient_and_round FROM tolls WHERE id=$toll_id";

        $result = $conn->query($get_payment);
        while($row = $result->fetch_assoc()) {
            $payment= $row[$varient_and_round];
        }

        $get_data = "SELECT round FROM toll_access WHERE toll_id=$toll_id AND user_id=$user_id";
        $result = $conn->query($get_data);
        $row=$result->num_rows;
        if ($row == 0) {
            $add_access = "INSERT INTO toll_access (user_id, toll_id, round) VALUES ($user_id, $toll_id, $round);";
            $make_payment = "UPDATE users SET balance=balance-$payment WHERE id=$user_id;";
            $add_log = "INSERT INTO user_logs (user_id, toll_id, payment) VALUES ($user_id, $toll_id, $payment);";    
            $conn->query($add_access);
            $conn->query($make_payment);
            $conn->query($add_log);
            echo "registered";
        } else {
            echo "already_registered";
        }
    } else {
        echo "exception 00";
    }
?>
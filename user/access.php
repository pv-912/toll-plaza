<?php
    require_once '../config/config.php';

    $_SESSION['username'] = 'kshitij';
    $_SESSION['user_id'] = 1; 
    $_SESSION['role'] = 'user';
    $_SESSION['variant'] = 'light';
    $_POST['toll_id'] = 2;
    $variant_and_round = 'lol';
    $_POST['round']=1;
    $round=$_POST['round'];

    $user_id = $_SESSION['user_id'];
    $toll_id = $_POST['toll_id'];
    if ($_SESSION['role'] === 'user' && isset($_POST['toll_id'])) {
        if ($_SESSION['variant'] == 'light' && isset($_POST['round'])) {
            $variant_and_round = 'light_return_rate';
        } else if ($_SESSION['variant'] == 'light') {
            $variant_and_round = 'light_rate';
        } else if ($_SESSION['variant'] == 'medium' && isset($_POST['round'])) {
            $variant_and_round = 'medium_return_rate';
        } else if ($_SESSION['variant'] == 'medium') {
            $variant_and_round = 'medium_rate';
        } else if ($_SESSION['variant'] == 'heavy' && isset($_POST['round'])) {
            $variant_and_round = 'heavy_return_rate';
        } else if ($_SESSION['variant'] == 'heavy') {
            $variant_and_round = 'heavy_rate';
        } else {
            print "variant and Round Exception";
        };
        echo $variant_and_round;
        echo $toll_id;
        $get_payment = "SELECT $variant_and_round FROM tolls WHERE id=$toll_id";

        $result = $conn->query($get_payment);
        while($row = $result->fetch_assoc()) {
            $payment= $row[$variant_and_round];
        }
        echo $payment;

        $get_data = "SELECT allow FROM toll_access WHERE toll_id=$toll_id AND user_id=$user_id";
        $result = $conn->query($get_data);
        $row=$result->num_rows;
        print_r($row);
        if ($row[allow]) {
            if (!isset($_POST['round'])) {
                $add_access = "INSERT INTO toll_access (user_id, toll_id) VALUES ($user_id, $toll_id);";
                
            } else {
                $add_access = "INSERT INTO toll_access (user_id, toll_id, allow) VALUES ($user_id, $toll_id, $round);";
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
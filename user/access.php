<?php
    require_once './../config/config.php';

    $_SESSION['username'] = 'nikhil';
    $_SESSION['user_id'] = 1; 
    $_SESSION['role'] = 'user';
    $_SESSION['varient'] = 'light';
    $_POST['toll_id'] = 1;
    $varient_and_round = 'lol';

    $user_id = $_SESSION['user_id'];
    $toll_id = $_POST['toll_id'];
    if ($_SESSION['role'] === 'user' && isset($_POST['toll_id'])) {
        if ($_SESSION['varient'] == 'light' && isset($_POST['round'])) {
            $varient_and_round = 'light_return_rate';
        } else if ($_SESSION['varient'] == 'light') {
            $varient_and_round = 'light_rate';
        } else if ($_SESSION['varient'] == 'medium' && isset($_POST['round'])) {
            $varient_and_round = 'medium_return_rate';
        } else if ($_SESSION['varient'] == 'medium') {
            $varient_and_round = 'medium_rate';
        } else if ($_SESSION['varient'] == 'heavy' && isset($_POST['round'])) {
            $varient_and_round = 'heavy_return_rate';
        } else if ($_SESSION['varient'] == 'heavy') {
            $varient_and_round = 'heavy_rate';
        } else {
            print "Varient and Round Exception";
        };
        echo $varient_and_round;
        echo $toll_id;
        $get_payment = "SELECT $varient_and_round FROM tolls WHERE id=$toll_id";

        $result = $conn->query($get_payment);
        while($row = $result->fetch_assoc()) {
            $payment= $row[$varient_and_round];
        }
        echo $payment;

        $get_data = "SELECT round FROM toll_access WHERE toll_id=$toll_id AND user_id=$user_id";
        $result = $conn->query($get_data);
        if ($result->num_rows == 0) {
            if (!isset($_POST['round'])) {
                $add_access = "INSERT INTO toll_access (user_id, toll_id) VALUES ($user_id, $toll_id);";
                
            } else {
                $add_access = "INSERT INTO toll_access (user_id, toll_id, round) VALUES ($user_id, $toll_id, $round);";
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

    // $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";

    // if ($conn->query($sql) === TRUE) {
    //     echo "New record created successfully";
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }

?>

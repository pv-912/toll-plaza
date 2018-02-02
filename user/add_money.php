<?php
    require_once './../config/config.php';

    $_SESSION['user_id'] = 1; 
    $_SESSION['role'] = 'user';

    $user_id = $_SESSION['user_id'];
    
    if(isset($_POST['payment'])){
        $payment = $_POST['payment'];
    }

    if($_SESSION['role'] == 'user' && isset($_POST['submit'])) {
        $make_payment = "UPDATE users SET balance=balance+$payment WHERE id=$user_id;";
        if($conn->query($make_payment)) {
            print "Successfully Added";
        } else {
            print "money not added";
        };
    }
?>
<form action="" method="POST">
    <input type="number" name="payment" />
    <input type="submit" name="submit" />
</form> 
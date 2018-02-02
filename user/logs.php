<?php
    require_once './../config/config.php';

    $_SESSION['user_id'] = 1; 
    $_SESSION['role'] = 'user';

    $user_id = $_SESSION['user_id'];
    
    if(isset($_POST['payment'])){
        $payment = $_POST['payment'];
    }

    $get_logs = "SELECT name, address, payment FROM user_logs AS logs INNER JOIN tolls ON logs.toll_id = tolls.id WHERE user_id=$user_id;";

    $logs = $conn->query($get_logs);
?>
<table>
    <tr>
        <td>
            Name
        </td>
        <td>
            Address
        </td>
        <td>
            Payment
        </td>
    </tr>
<?php
    foreach ($logs as $log) {
?>
    <tr>
        <td>
            <?=log['name']?>
        </td>
        <td>
            <?=log['address']?>
        </td>
        <td>
            <?=log['payment']?>
        </td>
    </tr>
<?php
    }
?>
</table>
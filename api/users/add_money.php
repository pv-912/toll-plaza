    <?php
    ob_start();
    session_start(); 

    include '../../config/config.php';

    if (isset($_POST['moneyAdd']) & isset($_SESSION['id'])){
        $userId = $_SESSION['id'];
        $moneyAdd  = $_POST['moneyAdd'];

        echo $userId;
        echo '<br>';
        echo $moneyAdd;
        $sql = "UPDATE users set balance=balance+$moneyAdd where id=?";
        echo $sql;     
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $userId);
            if(mysqli_stmt_execute($stmt)){
                echo "Money Added .";
                header('Location: http://localhost/toll-plaza/user/addmoney.php/');
            } else{
                echo "Something Went Wrong.";
                header('Location: http://localhost/toll-plaza/user/addmoney.php/');
            }
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        } else {
            echo "Something Went Wrong.";
            header('Location: http://localhost/toll-plaza/user/addmoney.php/');
        }    
    } else {
        echo "NO POST DATA";
    }
    
    
?>

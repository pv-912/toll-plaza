    <?php 
include '../../config/config.php';


    $userId = $_POST['userId'];
    $moneyAdd  = $_POST['moneyAdd'];

    $sql = "SELECT balance from users where user_id=?";
                if($stmt = mysqli_prepare($conn, $sql)){
                    mysqli_stmt_bind_param($stmt, "ii", $param_user_id);
                    
                    $param_user_id = $userId;
                    if(mysqli_stmt_execute($stmt)){
                        mysqli_stmt_store_result($stmt);

                        if(!mysqli_stmt_num_rows($stmt) == 0){                    
                            mysqli_stmt_bind_result($stmt, $balance);
                            if(mysqli_stmt_fetch($stmt)){
                                $balance = $balance + $moneyAdd;
                                $sql = "UPDATE users set balance=? where user_id=?";
         
                                    if($stmt = mysqli_prepare($conn, $sql)){
                                        mysqli_stmt_bind_param($stmt, "ii",$param_balance, $param_user_id);
                                        $param_balance = $balance;
                                        if(mysqli_stmt_execute($stmt)){
                                            echo '<script>alert("Money Added .")</script>';
                                        } else{
                                            echo '<script>alert("Something Went Wrong.")</script>';
                                        }
                                    }else {echo '<script>alert("Something Went Wrong.")</script>';}
                                     
                                    mysqli_stmt_close($stmt);
                                    
                                }
                                else{
                                echo '<script>alert("Something Went Wrong.")</script>';
                                }
                            }
                        }
                    mysqli_stmt_close($stmt);
                
            mysqli_close($conn);
        }
?>

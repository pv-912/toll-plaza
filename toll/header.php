<?php
  include '../config/config.php';
 
 $usernameLogin = $pass = $role ="";
  $usernameLogin_err = $pass_err = "";
 
    if($_SERVER["REQUEST_METHOD"] == "POST"){

      if(isset($_POST['usernameLogin'])){
        if(empty(trim($_POST["usernameLogin"]))){
          $usernameLogin_err = 'Please enter username.';
        }
      
       else{
          $usernameLogin = trim($_POST["usernameLogin"]);
      }
    }
    // echo $usernameLogin_err;
    if(isset($_POST['pass'])){
      if(empty(trim($_POST['pass']))){
          $pass_err = 'Please enter your password.';
      }
     else{
          $pass = trim($_POST['pass']);
      }
    }
    
    
    if(empty($usernameLogin_err) && empty($pass_err)){
        $sql = "SELECT name,password,role,id FROM tolls WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_usernameLogin);
            
            $param_usernameLogin =$usernameLogin;
            echo $param_usernameLogin;
            // echo 'hello';
            echo $param_usernameLogin;
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $login_name, $hashed_pass, $role, $id);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($pass, $hashed_pass)){
                          
                            if($role == "toll"){
                                session_start();
                                $_SESSION['id'] = $id; 
                                $_SESSION['role']=$role;
                                $_SESSION['time'] = time();
                                // setcookie("username", $username , time()+24*60*60);
                                // setcookie("role", $role , time()+24*60*60);
                                // setcookie("name", $login_name , time()+24*60*60);
                               echo '
                                <script>
                                   window.location.href="'.base_url_toll.'comingVehicles"; 
                                </script>';

                              }
                            
                        } else{
                            $pass_err = 'The password you entered was incorrect.
                                            <script>
                                              $("#login").modal("show");
                                            </script>';
                        }
                    }else{echo 'error';}
                } 
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title> Toll Plaza</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="">

    <meta name="keywords" content="toll-plaza, toll, highway">

    <meta name="author" content="Toll Plaza">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="<?php echo base_url; ?>src/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url; ?>src/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="<?php echo base_url; ?>src/css/style.css" rel="stylesheet">
    <script src="<?php echo base_url; ?>src/js/bootstrap.min.js"></script>
</head>


<body>

   <nav class="navbar navbar-inverse">
     <div class="container-fluid">
      <div class="row">
       <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="http://localhost/tollPlaza/"><img src="<?php echo base_url; ?>src/img/tollLogo.jpg" alt="Toll Plaza" class="indexNavbarTollLogo"></a>
         <a class="navbar-brand sparkNavbarTag "  href="index.php">Toll Plaza</a><br/>
       </div>

       <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">About Us </a></li>
            <li><a href="#">FAQ's</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#login" data-toggle="modal" data-target="#login" class="headerLogin" >Log In</a></li>
         </ul>
       </div>
     </div>
   </div>
   </nav>

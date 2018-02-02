<?php
 /* require_once 'http://localhost/toll-plaza/config/config.php';
 
 $username = $pass = $role = $login_name = "";
  $username_err = $pass_err = "";
 
  if($_SERVER["REQUEST_METHOD"] == "POST"){
 
      if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST['pass']))){
        $pass_err = 'Please enter your password.';
    } else{
        $pass = trim($_POST['pass']);
    }
    
    if(empty($username_err) && empty($pass_err)){
        $sql = "SELECT name,password,role FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $login_name, $hashed_pass, $role);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($pass, $hashed_pass)){
                          
                            if($role == "user"){
                                session_start();
                                $_SESSION['username'] = $username; 
                                $_SESSION['role']=$role;
                                $_SESSION['time'] = time();
                                setcookie("username", $username , time()+24*60*60);
                                setcookie("role", $role , time()+24*60*60);
                                setcookie("name", $login_name , time()+24*60*60);
                                header("location: faculty-portal/");

                              }else if($role == "toll"){
                                session_start();
                                $_SESSION['username'] = $username; 
                                $_SESSION['role']=$role;
                                $_SESSION['time'] = time();
                                setcookie("username", $username , time()+24*60*60);
                                setcookie("role", $role , time()+24*60*60);
                                setcookie("name", $login_name , time()+24*60*60);
                                header("location: student-portal/");

                              }
                            
                        } else{
                            $pass_err = 'The password you entered was incorrect.
                                            <script>
                                              $("#login").modal("show");
                                            </script>';
                        }
                    }else{echo 'error';}
                } else{
                    $username_err = 'No account found with this username.<script>
                                              $("#login").modal("show");
                                            </script>';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($conn);
}*/
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
    <link href="http://localhost/tollPlaza/src/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/tollPlaza/src/css/bootstrap-theme.min.css" rel="stylesheet">
    <script src="http://localhost/tollPlaza/src/js/bootstrap.min.js"></script>
</head>


<body>

   <nav class="navbar navbar-default">
     <div class="container-fluid">
      <div class="row">
       <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="http://localhost/tollPlaza/"><img src="" alt="IIT Roorkee" class="indexNavbarIitrLogo"></a>
         <a class="navbar-brand sparkNavbarTag "  href="index.php">Tool Plaza</a><br/>
         <!-- <p class="sparkFullFormTag">Summer Internship Programme at IIT Roorkee</p> -->
       </div>

       <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar-nav navbar-right">
                 <li><a href="#">About Us </a></li>
                 <li><a href="#">Projects</a></li>
                 <li><a href="#">Contact</a></li>
            <?php 
              /*$main_username = $main_role = $main_name = '';
              
              // if (isset($_COOKIE['username'])) {
              //   $main_username = $_COOKIE["username"];
              // }
              // if (isset($_COOKIE['role'])) {
              //   $main_role = $_COOKIE["role"];
              // }
              // if (isset($_COOKIE['name'])) {
              //   $main_name = $_COOKIE["name"];
              // }

              // echo $main_name;
              // echo $main_username;
              // echo $main_role;
             
                if($main_role== "toll"){?>

                 <li style="font-size: 1.4vw;color: #777;"><a href="<?php echo base_url_admin; ?>"><?php echo $main_name; ?></a></li>
                 <li style="font-size: 1.4vw;color: #777;"><a href="<?php echo base_url; ?>logout.php" data-toggle="tooltip" data-placement="center" title="Logout">Logout</a></li>

                 <?php } else if($main_role== "user"){?>
                 
                 <li style="font-size: 1.4vw;color: #777;"><a href="<?php echo base_url_faculty; ?>"><?php echo $main_name; ?></a></li>


                 <?php }else if($main_role== "student"){?>
                 
                  <li style="font-size: 1.4vw;color: #777;"><a href="<?php echo base_url_student; ?>"><?php echo $main_name; ?></a></li>

                <?php }else{?>
                 
                 
          <?php }*/ ?>
          <li><a href="#login" data-toggle="modal" data-target="#login" class="headerLogin" >Log In</a></li>
                  
         </ul>
       </div>
     </div>
   </div>
   </nav>

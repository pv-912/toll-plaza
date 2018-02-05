 <?php include('../toll/header.php'); ?>
 <?php


 // echo 'hjdskl';
include('../config/config.php');
 
$name = $username = $lat = $address = $lng = $heavy_rate = $password = $confirm_password = $carVariant = $heavy_return_rate =$light_rate_err =$light_return_rate_err =$medium_return_rate_err = $medium_rate = $vehicleNo = "";
$name_err = $username_err = $lat_err = $address_err = $lng_err = $heavy_rate_err = $password_err = $confirm_password_err = $carVariant_err = $heavy_return_rate_err = $medium_rate_err = $vehicleNo_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 if(isset($_POST["username"])){
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        $username = trim($_POST['username']);
        $sql = "SELECT username FROM tolls where username=? ";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already registered.";
                } 
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }else{
                echo "Oops! Something went wrong. Please try again later.2";
            }
         
        mysqli_stmt_close($stmt);
    }
}

    /* validators */
    if(isset($_POST['name'])){
        if(empty(trim($_POST['name']))){
            $name_err = "Please enter a name.";     
        }  else{
            $name = trim($_POST['name']);
            // echo $name;
        }
    }
    if(isset($_POST['address'])){
        if(empty(trim($_POST['address']))){
            $address_err = "Please select address";     
        } else{
            $address = trim($_POST['address']);
            // echo $address;
        }
    }    
    if(isset($_POST['lat'])){
        if(empty(trim($_POST['lat']))){
            $lat_err = "Please enter a lat no.";     
        } else{
            $lat = trim($_POST['lat']);
            // echo $lat;
        }
    }    
    if(isset($_POST['lng'])){
        if(empty(trim($_POST['lng']))){
            $lng_err = "Please enter a date of birth";     
        } else{
            $lng = trim($_POST['lng']);
            // echo $lng;
        }
    }   
    if(isset($_POST['heavy_rate'])){
        if(empty(trim($_POST['heavy_rate']))){
            $heavy_rate_err = "Please enter a heavy_rate name.";     
        } else{
            $heavy_rate = trim($_POST['heavy_rate']);
            // echo $heavy_rate;
        }
    }
    // if(isset($_POST['carVariant'])){
    //     if(empty(trim($_POST['carVariant']))){
    //         $carVariant_err = "Please enter a carVariant.";     
    //     } else{
    //         $carVariant = trim($_POST['carVariant']);
    //         // echo $heavy_rate;
    //     }
    // }
    if(isset($_POST['heavy_return_rate'])){
        if(empty(trim($_POST['heavy_return_rate']))){
            $heavy_return_rate_err = "Please enter a heavy_return_rate.";     
        } else{
            $heavy_return_rate = trim($_POST['heavy_return_rate']);
            // echo $heavy_return_rate;
        }
    }
    if(isset($_POST['medium_rate'])){
        if(empty(trim($_POST['medium_rate']))){
            $medium_rate_err = "Please enter a C.G.P.A.";     
        } else{
            $medium_rate = trim($_POST['medium_rate']);
            // echo $heavy_rate;
        }
    }
    if(isset($_POST['light_rate'])){
        if(empty(trim($_POST['light_rate']))){
            $light_rate_err = "Please enter a light_rate (B.Tech)";     
        } else{
            $light_rate = trim($_POST['light_rate']);
            // echo $heavy_rate;
        }
    }
    if(isset($_POST['medium_return_rate'])){
        if(empty(trim($_POST['medium_return_rate']))){
            $medium_return_rate_err = "Please enter a medium_return_rate (B.Tech)";     
        } else{
            $medium_return_rate = trim($_POST['medium_return_rate']);
            // echo $heavy_rate;
        }
    }
    if(isset($_POST['light_return_rate'])){
        if(empty(trim($_POST['light_return_rate']))){
            $light_return_rate_err = "Please enter a light_return_rate (B.Tech)";     
        } else{
            $light_return_rate = trim($_POST['light_return_rate']);
            // echo $heavy_rate;
        }
    }
    

    if(isset($_POST['password'])){
        if(empty(trim($_POST['password']))){
            $password_err = "Please enter a password.";     
        } elseif(strlen(trim($_POST['password'])) < 0){
            $password_err = "Password must have atleast 6 characters.";
        } else{
            $password = trim($_POST['password']);
            // echo $password;
        }
    }
    if(isset($_POST['confirm_password'])){
        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = 'Please confirm password.';     
        } else{
            $confirm_password = trim($_POST['confirm_password']);
            if($password != $confirm_password){
                $confirm_password_err = 'Password did not match.';
            }
        }
    }
    // echo $username_err; echo $password_err; echo $confirm_password_err;
    if(empty($username_err) && empty($password_err)){
         $sql = "INSERT INTO tolls (username, name, password, lat, lng, role, heavy_rate, medium_rate, light_rate, heavy_return_rate, medium_return_rate, light_return_rate) VALUES (?,?,?,?,?,?,?,?,?,?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "ssssssiiiiii", $param_username, $param_name, $param_password, $param_lat, $param_lng, $param_role, $param_heavy_rate, $param_medium_rate,  $param_light_rate, $param_heavy_return_rate, $param_medium_return_rate, $light_return_rate);
            // echo 'hello';
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            $param_name = $name;
            $param_lat = $lat;
            $param_lng = $lng;
            $param_address = $address;
            $param_role = "toll";
            $param_heavy_rate = $heavy_rate;
            $param_medium_rate = $medium_rate;
            $param_heavy_return_rate = $heavy_return_rate;
            $param_light_rate = $light_rate;
            $param_medium_return_rate = $medium_return_rate;
            $param_light_return_rate = $light_return_rate;
            // echo $param_light_return_rate."   ";
            // echo $param_medium_return_rate."   ";
            // echo $param_light_rate."   ";
            // echo $param_medium_rate."   ";
            // echo $param_heavy_rate."   ";
            // echo $param_heavy_return_rate."   ";
            // echo $param_lat."   ";
            // echo $param_lng."   ";
            // echo $param_name."   ";
            // echo $param_username."   ";
            // echo $param_address."   ";
            // echo $param_role."   ";
            // echo $param_password."   ";


            if(mysqli_stmt_execute($stmt)){
                echo '
                      <script>
                         window.location.href="'.base_url.'toll/index.php"; 
                      </script>';
                
            } else{
                echo " <script> alert(' Something went wrong.') </script>" ;
            }
         }else{
                ?> <script> alert(' Something went wrong2.') </script> <?php
            }
         
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($conn);
}
?>





		<div class="container">
            <div id="Error">
                
            </div>
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<p class="signupHereTag">Sign Up Here ..</p>
					<form class="form-horizontal" id="signupForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
           
			           <div class="form-group   <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
			             <label for="" class="sr-only">Name<sup>*</sup></label>
			             <div class="col-sm-12">
			               <input type="text"  name="name"  class="form-control"  placeholder="Name" value="<?php echo $name; ?>" >
			                <span class="help-block"><?php echo $name_err; ?></span>
			             </div>
			           </div>
			            
			           <div class="form-group">
			             <label for="username" class="sr-only">username<sup>*</sup></label>
			             <div class="col-sm-12">
			               <input type="text" name="username"  class="form-control" id="username"  placeholder="username"  value="<?php echo $username; ?>">
			                <span class="help-block"><?php echo $username_err; ?></span>
			             </div>
			           </div>
			          
			           <div class="form-group   ">
			              <label for="" class="sr-only">Latitude</label>
                         <div class="col-sm-6">
                           <input type="text" name="lat"  class="form-control"  placeholder="Latitude"  value="<?php echo $lat; ?>" >
                            <span class="help-block"> <?php echo $lat_err; ?></span>
                         </div>
			            
			             <label for="" class="sr-only">Longitude</label>
			             <div class="col-sm-6">
			               <input type="text" name="lng"  class="form-control"  placeholder="Longitude" value="<?php echo $lng; ?>" >
			                <span class="help-block"> <?php echo $lng_err; ?></span>
			             </div>
			           </div>
			           
                       <div class="form-group  ">
                        <label for="" class="sr-only">light_rate</label>
                         <div class="col-sm-6">
                           <input type="number"  name="light_rate" class="form-control"  placeholder="Light Rate" value="<?php echo $light_rate; ?>">
                            <span class="help-block"><?php echo $light_rate_err; ?></span>
                         </div>
                         <label for="" class="sr-only">light_return_rate</label>
                         <div class="col-sm-6">
                           <input type="number"  name="light_return_rate" class="form-control"  placeholder="Light Return Rate" value="<?php echo $light_return_rate; ?>">
                            <span class="help-block"><?php echo $light_return_rate_err; ?></span>
                         </div>
                       </div>

                       <div class="form-group  ">
                        <label for="" class="sr-only">medium_rate</label>
                         <div class="col-sm-6">
                           <input type="number" name="medium_rate"  class="form-control"  placeholder="Medium Rate" value="<?php echo $medium_rate; ?>">
                            <span class="help-block"><?php echo $medium_rate_err; ?></span>
                         </div>

                         <label for="" class="sr-only">medium_return_rate</label>
                         <div class="col-sm-6">
                           <input type="number"  name="medium_return_rate" class="form-control"  placeholder="Medium Return Rate" value="<?php echo $medium_return_rate; ?>">
                            <span class="help-block"><?php echo $medium_return_rate_err; ?></span>
                         </div>
                        </div>

                       <div class="form-group  ">
                        <label for="" class="sr-only">heavy_rate</label>
                         <div class="col-sm-6">
                           <input type="number" name="heavy_rate"  class="form-control"  placeholder="Heavy Rate" value="<?php echo $heavy_rate; ?>">
                            <span class="help-block"><?php echo $heavy_rate_err; ?></span>
                         </div>
                         <label for="" class="sr-only">heavy_return_rate</label>
                         <div class="col-sm-6">
                           <input type="number" name="heavy_return_rate"  class="form-control"  placeholder="Heavy Return Rate " value="<?php echo $heavy_return_rate; ?>">
                            <span class="help-block"><?php echo $heavy_return_rate_err; ?></span>
                         </div>
			           </div>
			          
			           <div class="form-group  <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
			             <label for=""  class="sr-only">Password<sup>*</sup></label>
			             <div class="col-sm-6">
			               <input type="password" name="password" id="signupPassword" class="form-control"  placeholder="Password"  value="<?php echo $password; ?>" autocomplete="off">
			                <span class="help-block"><?php echo $password_err; ?></span>
			             </div>
			            
			             <label for="" class="sr-only">Confirm Password<sup>*</sup></label>
			             <div class="col-sm-6">
			               <input type="password" name="confirm_password" class="form-control" id="signupConfirmPassword" placeholder="Confirm Password"  value="<?php echo $confirm_password; ?>" autocomplete="off">
			                <span class="help-block"><?php echo $confirm_password_err; ?></span>
			             </div>
			          
			           </div>
			           <div class="form-group">
			             <div class="col-sm-offset-3 col-sm-6">
			               <input type="submit" value="SIGN UP" id="signupSubmitButton" class="btn btn-primary signupModalSignupButton" style="width: 100%;margin-bottom: 5vh" autocomplete="off">
			             </div>
			           </div>
			         </form>

				</div>
			</div>
		</div>

           
<?php //require_once('footer.php'); ?>

    <?php require_once('login_modal_tolls.php'); ?>

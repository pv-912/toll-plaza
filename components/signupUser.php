 <?php include('../user/header.php'); ?>
 <?php

include('../config/config.php');
 
$name = $username = $contact = $gender = $dob = $college = $password = $confirm_password = $carVariant = $licenseNo = $carColor = $vehicleNo = "";
$name_err = $username_err = $contact_err = $gender_err = $dob_err = $college_err = $password_err = $confirm_password_err = $carVariant_err = $licenseNo_err = $carColor_err = $vehicleNo_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 if(isset($_POST["username"])){
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        $username = trim($_POST['username']);
        $sql = "SELECT username FROM users where username=? ";
        
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
    if(isset($_POST['gender'])){
        if(empty(trim($_POST['gender']))){
            $gender_err = "Please select gender";     
        } else{
            $gender = trim($_POST['gender']);
            // echo $gender;
        }
    }    
    if(isset($_POST['contact'])){
        if(empty(trim($_POST['contact']))){
            $contact_err = "Please enter a contact no.";     
        } elseif(strlen(trim($_POST['contact'])) < 10){
            $contact_err = "Please enter contact no.";
        } else{
            $contact = trim($_POST['contact']);
            // echo $contact;
        }
    }    
    if(isset($_POST['dob'])){
        if(empty(trim($_POST['dob']))){
            $dob_err = "Please enter a date of birth";     
        } else{
            $dob = trim($_POST['dob']);
            // echo $dob;
        }
    }   
    if(isset($_POST['college'])){
        if(empty(trim($_POST['college']))){
            $college_err = "Please enter a college name.";     
        } else{
            $college = trim($_POST['college']);
            // echo $college;
        }
    }
    if(isset($_POST['carVariant'])){
        if(empty(trim($_POST['carVariant']))){
            $carVariant_err = "Please enter a carVariant.";     
        } else{
            $carVariant = trim($_POST['carVariant']);
            // echo $college;
        }
    }
    if(isset($_POST['licenseNo'])){
        if(empty(trim($_POST['licenseNo']))){
            $licenseNo_err = "Please enter a licenseNo.";     
        } else{
            $licenseNo = trim($_POST['licenseNo']);
            // echo $licenseNo;
        }
    }
    if(isset($_POST['carColor'])){
        if(empty(trim($_POST['carColor']))){
            $carColor_err = "Please enter a C.G.P.A.";     
        } else{
            $carColor = trim($_POST['carColor']);
            // echo $college;
        }
    }
    if(isset($_POST['vehicleNo'])){
        if(empty(trim($_POST['vehicleNo']))){
            $vehicleNo_err = "Please enter a vehicleNo (B.Tech)";     
        } else{
            $vehicleNo = trim($_POST['vehicleNo']);
            // echo $college;
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
         $sql = "INSERT INTO users (username, name, password, contact, dob, gender, role, carVariant, carColor, licenseNo, vehicleNo) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "sssssssssss", $param_username, $param_name, $param_password, $param_contact, $param_dob, $param_gender, $param_role, $param_carVariant, $param_carColor, $param_licenseNo, $param_vehicleNo);
            // echo 'hello';
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            $param_name = $name;
            $param_contact = $contact;
            $param_dob = $dob;
            $param_gender = $gender;
            $param_role = "user";
            $param_carVariant = $carVariant;
            $param_carColor = $carColor;
            $param_licenseNo = $licenseNo;
            $param_vehicleNo = $vehicleNo;
            // echo $param_licenseNo;
            // echo $param_name;
            // echo $param_username;
            if(mysqli_stmt_execute($stmt)){
                echo '
                      <script>
                         window.location.href="'.base_url.'user/index.php"; 
                      </script>';
                
            } else{
                echo " <script> alert(' Something went wrong."; echo $param_role ; echo "') </script>" ;
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
			             <label for="" class="sr-only">Gender</label>
			             <div class="col-sm-6">
			               <select class="form-control"  name="gender"  placeholder="gender">
			                  <option value="male">Male</option>
			                  <option value="female">Female</option>
			               </select>
			                <span class="help-block"><?php echo $gender_err; ?></span>
			             </div>
			            
			             <label for="" class="sr-only">Date Of Birth</label>
			             <div class="col-sm-6">
			               <input type="text" name="dob"  class="form-control"  placeholder="Date Of Birth"  onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo $dob; ?>" >
			                <span class="help-block"> <?php echo $dob_err; ?></span>
			             </div>
			           </div>
			           
                       <div class="form-group  ">
                        <label for="" class="sr-only">licenseNo</label>
                         <div class="col-sm-6">
                           <input type="text" name="licenseNo"  class="form-control"  placeholder="licenseNo " value="<?php echo $licenseNo; ?>">
                            <span class="help-block"><?php echo $licenseNo_err; ?></span>
                         </div>
                        
                        <label for="" class="sr-only">vehicleNo</label>
                         <div class="col-sm-6">
                           <input type="text"  name="vehicleNo" class="form-control"  placeholder="vehicleNo ( B.Tech )" value="<?php echo $vehicleNo; ?>">
                            <span class="help-block"><?php echo $vehicleNo_err; ?></span>
                         </div>
                       </div>

                       <div class="form-group  ">
                        <label for="" class="sr-only">carVariant</label>
                         <div class="col-sm-6">
                           <input type="text" name="carVariant"  class="form-control"  placeholder="carVariant" value="<?php echo $carVariant; ?>">
                            <span class="help-block"><?php echo $carVariant_err; ?></span>
                         </div>
                        
                        <!-- <label for="" class="sr-only">carColor</label>
                         <div class="col-sm-6">
                           <input type="text"  name="carColor" class="form-control"  placeholder="C.G.P.A ( If % then convert it to C.G.P.A. ) " value="<?php //echo $carColor; ?>">
                            <span class="help-block"></span>
                         </div>
                       </div> -->

                       

			           <div class="form-group  ">
			            <label for="" class="sr-only">Car Color</label>
			             <div class="col-sm-6">
			               <input type="text" name="carColor"  class="form-control"  placeholder="Car Color" value="<?php echo $carColor; ?>">
			                <span class="help-block"><?php echo $college_err; ?></span>
			             </div>
			            
			            <label for="" class="sr-only">Contact</label>
			             <div class="col-sm-6">
			               <input type="number"  name="contact" class="form-control"  placeholder="Contact" value="<?php echo $contact; ?>">
			                <span class="help-block"><?php echo $contact_err; ?></span>
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

    <?php require_once('login_modal_user.php'); ?>

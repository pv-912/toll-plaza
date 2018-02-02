 <?php include('header.php'); ?>
 <?php
// define('base_url', 'http://localhost/tollPlaza/');
$servername = "localhost";
$username = "root";
$password = "99569";
$dbname = "tollplaza";
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}   ?>
 <?php


 echo 'hjdskl';
// include('../config/config.php');
 
$name = $username = $contact = $gender = $dob = $college = $password = $confirm_password = $car_variant = $license_no = $car_color = $vehicle_number = $sparkId = "";
$name_err = $username_err = $contact_err = $gender_err = $dob_err = $college_err = $password_err = $confirm_password_err = $car_variant_err = $license_no_err = $car_color_err = $vehicle_number_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 if(isset($_POST["username"])){
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        $sql = "SELECT username FROM users where username=? ";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "sss", $param_username);
            
            $param_username = trim($_POST["username"]);
            
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
    if(empty(trim($_POST['name']))){
        $name_err = "Please enter a name.";     
    }  else{
        $name = trim($_POST['name']);
        // echo $name;
    }
    
    if(empty(trim($_POST['gender']))){
        $gender_err = "Please select gender";     
    } else{
        $gender = trim($_POST['gender']);
        // echo $gender;
    }
    
    if(empty(trim($_POST['contact']))){
        $contact_err = "Please enter a contact no.";     
    } elseif(strlen(trim($_POST['contact'])) < 10){
        $contact_err = "Password must have atleast 10 digits.";
    } else{
        $contact = trim($_POST['contact']);
        // echo $contact;
    }
    
    if(empty(trim($_POST['dob']))){
        $dob_err = "Please enter a date of birth";     
    } else{
        $dob = trim($_POST['dob']);
        // echo $dob;
    }
    
    if(empty(trim($_POST['college']))){
        $college_err = "Please enter a college name.";     
    } else{
        $college = trim($_POST['college']);
        // echo $college;
    }

    if(empty(trim($_POST['car_variant']))){
        $car_variant_err = "Please enter a car_variant.";     
    } else{
        $car_variant = trim($_POST['car_variant']);
        // echo $college;
    }

    if(empty(trim($_POST['license_no']))){
        $license_no_err = "Please enter a license_no.";     
    } else{
        $license_no = trim($_POST['license_no']);
        // echo $college;
    }

    if(empty(trim($_POST['car_color']))){
        $car_color_err = "Please enter a C.G.P.A.";     
    } else{
        $car_color = trim($_POST['car_color']);
        // echo $college;
    }

    if(empty(trim($_POST['vehicle_number']))){
        $vehicle_number_err = "Please enter a vehicle_number (B.Tech)";     
    } else{
        $vehicle_number = trim($_POST['vehicle_number']);
        // echo $college;
    }


    

    
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST['password'])) < 0){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST['password']);
        // echo $password;
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    }
    // echo $username_err; echo $password_err; echo $confirm_password_err;
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)&& empty($vehicle_number_err)&& empty($car_color_err) && empty($license_no_err) && empty($car_variant_err)&& empty($college_err)&& empty($dob_err)&& empty($contact_err)&& empty($gender_err)&& empty($name_err)){
         $sql = "INSERT INTO users (username, password, name, contact, dob, gender, role, car_variant, car_color,license_no, vehicle_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "sssssssssss", $param_username, $param_password, $param_name, $param_contact, $param_dob, $param_gender, $param_role, $param_car_variant, $param_car_color, $param_license_no, $param_vehicle_number);
            // echo 'hello';
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            $param_name = $name;
            $param_contact = $contact;
            $param_dob = $dob;
            $param_college = $college;
            $param_gender = $gender;
            $param_role = "user";
            $param_car_variant = $car_variant;
            $param_car_color = $car_color;
            $param_license_no = $license_no;
            $param_vehicle_number = $vehicle_number;
            // $param_sparkId = $sparkId;
            // echo $param_gender;
            // echo $param_username;
            if(mysqli_stmt_execute($stmt)){
                header('Location: http://toolPlaza/user/index.php');
            
            } else{
                ?> <script> alert(' Something went wrong. ') </script> <?php
            }
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
			            
			           <div class="form-group  <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
			             <label for="" class="sr-only">username<sup>*</sup></label>
			             <div class="col-sm-12">
			               <input type="email" name="username"  class="form-control"  placeholder="username"  value="<?php echo $username; ?>">
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
                        <label for="" class="sr-only">license_no</label>
                         <div class="col-sm-6">
                           <input type="text" name="license_no"  class="form-control"  placeholder="license_no (1st)" value="<?php echo $license_no; ?>">
                            <span class="help-block"><?php echo $license_no_err; ?></span>
                         </div>
                        
                        <label for="" class="sr-only">vehicle_number</label>
                         <div class="col-sm-6">
                           <input type="text"  name="vehicle_number" class="form-control"  placeholder="vehicle_number ( B.Tech )" value="<?php echo $vehicle_number; ?>">
                            <span class="help-block"><?php echo $vehicle_number_err; ?></span>
                         </div>
                       </div>

                       <div class="form-group  ">
                        <label for="" class="sr-only">car_variant</label>
                         <div class="col-sm-6">
                           <input type="text" name="car_variant"  class="form-control"  placeholder="car_variant" value="<?php echo $car_variant; ?>">
                            <span class="help-block"><?php echo $car_variant_err; ?></span>
                         </div>
                        
                        <label for="" class="sr-only">car_color</label>
                         <div class="col-sm-6">
                           <input type="text"  name="car_color" class="form-control"  placeholder="C.G.P.A ( If % then convert it to C.G.P.A. ) " value="<?php echo $car_color; ?>">
                            <span class="help-block"><?php echo $car_color_err; ?></span>
                         </div>
                       </div>

                       

			           <div class="form-group   <?php echo (!empty($college_err)) ? 'has-error' : ''; ?>">
			            <label for="" class="sr-only">College</label>
			             <div class="col-sm-6">
			               <input type="text" name="college"  class="form-control"  placeholder="College" value="<?php echo $college; ?>">
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

    <?php require_once('../login_modal.php'); ?>

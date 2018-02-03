<?php

    include("connect.php");
    include("functions.php");
    
    if(logged_in())
    {
        header("location:profile.php");
        exit();
    }
    
    $error = "";

    if(isset($_POST['submit']))
    {
        $firstName = mysqli_real_escape_string($con, $_POST['fname']);
        $lastName = mysqli_real_escape_string($con, $_POST['lname']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = $_POST['password'];
        $passwordConfirm = $_POST['passwordConfirm'];
        

        $car_varient = $_POST['car_varient'];
        $car_color = $_POST['car_color'];
        $license_no = $_POST['license_no'];
        $balance = $_POST['balance'];
        $gender = $_POST['gender'];
        $role = $_POST['role'];
        $dob = $_POST['dob'];
        $contact = $_POST['contact'];
        $vehicle_number = $_POST['vehicle_number'];



        $image = $_FILES['image']['name'];
        $tmp_image = $_FILES['image']['tmp_name'];
        $imageSize = $_FILES['image']['size'];
                
        $conditions = isset($_POST['conditions']);
        
        $date = date("F, d Y");
        
        
        if(strlen($firstName) < 3)
        {
            $error = "First name is too short";
        }
        
        else if(strlen($lastName) < 3)
        {
            $error = "Last name is too short";
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $error = "Please enter valid email address";
        }
        else if(email_exists($email, $con))
        {
            $error = "Someone is already registered with this email";
        }
        else if(strlen($password) < 8)
        {
            $error = "Password must be greater than 8 characters";
        }
        else if($password !== $passwordConfirm)
        {
            $error = "Password does not match";
        }
        else if($image == "")
        {
            $error = "Please upload your image";
        }
        else if($imageSize > 1048576)
        {
            $error = "Image size must be less than 1 mb";
        }           
        else if(!$conditions)
        {
            $error = "You must be agree with the terms and conditions";
        }
        else
        {   
                //$password = password_hash($password, PASSWORD_DEFAULT);
                
                $imageExt = explode(".", $image);
                $imageExtension = $imageExt[1];
                
                if($imageExtension == "PNG" || $imageExtension == "png" || $imageExtension == "JPG" || $imageExtension == "jpg")
                {
                    $image = rand(0, 100000).rand(0, 100000).rand(0, 100000).time().".".$imageExtension;
                
        $insertQuery = "INSERT INTO `users`(`firstName`, `lastName`, `email`, `password`, `image`, `car_variant`, `car_color`, `license_no`, `balance`, `gender`, `role`, `dob`, `contact`, `vehicle_number`) VALUES ('$firstName','$lastName','$email','$password','$image','$car_varient','$car_color','$license_no','$balance','$gender','$role','$dob','$contact','$vehicle_number')";





                         
                        

                    if(mysqli_query($con, $insertQuery))
                    {
                        if(move_uploaded_file($tmp_image,"../images/$image"))
                        {
                            $error = "You are successfully registered";
                        }
                        else
                        {
                            $error = "Image is not uploaded";
                        }
                    }
                }
                else
                {
                    $error = "File must be an image";
                }
        }
                            
    }

?>



<!doctype html>

<html>
    
    <head>
        
    <title>Registration Page</title>
    <link rel="stylesheet" href="css/styles.css"  />
    
    </head>
    
    
    <body>
        
        <div id="error" style=" <?php  if($error !=""){ ?>  display:block; <?php } ?> "><?php echo $error; ?></div>
        
        <div id="wrapper">
            
            <div id="menu">
                <a href="signup.php">Sign Up</a>
                <a href="login.php">Login</a>
            </div>
            
            <div id="formDiv">
                
                <form method="POST" action="signup.php" enctype="multipart/form-data">
                
                <label>First Name:</label><br/>
                <input type="text" name="fname" class="inputFields" required/><br/><br/>
                
                <label>Last Name:</label><br/>
                <input type="text" name="lname"  class="inputFields" required/><br/><br/>
                
                <label>Email:</label><br/>
                <input type="text" name="email"  class="inputFields" required/><br/><br/>

                <label>car_varient</label><br/>
                <input type="text" name="car_varient"  class="inputFields" required/><br/><br/>

                <label>car_color</label><br/>
                <input type="text" name="car_color"  class="inputFields" required/><br/><br/>

                <label>license_no</label><br/>
                <input type="text" name="license_no"  class="inputFields" required/><br/><br/>

                <label>balance</label><br/>
                <input type="text" name="balance"  class="inputFields" required/><br/><br/>

                <label>gender</label><br/>
                <input type="gender" name="gender"  class="inputFields" required/><br/><br/>

                <label>role</label><br/>
                <input type="text" name="role"  class="inputFields" required/><br/><br/>

                <label>dob</label><br/>
                <input type="date" name="dob"  class="inputFields" required/><br/><br/>

                <label>contact</label><br/>
                <input type="text" name="contact"  class="inputFields" required/><br/><br/>

                <label>vehicle_number</label><br/>
                <input type="text" name="vehicle_number"  class="inputFields" required/><br/><br/>
                
                <label>Password:</label><br/>
                <input type="password" name="password" class="inputFields"  required/><br/><br/>
                
                <label>Re-enter Password:</label><br/>
                <input type="password" name="passwordConfirm"  class="inputFields" required/><br/><br/>
                
                <label>Image:</label><br/>
                <input type="file" name="image" id="imageupload"/><br/><br/>
                
            
                <input type="checkbox" name="conditions" />
                <label>I am agree with terms and conditions</label><br/><br/>
                
                <input type="submit"  class="theButtons"  name="submit" />

                
                
                </form>
            
            </div>
        
        </div>
        
    </body>

</html>

<!--<form method="POST" action="index.php" enctype="multipart/form-data">The enctype is needed to upload files or images-->
<!--<label>First Name:</label>  Label tag is new in html5-->
<?php 

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'projetweb');
 

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$username = $email= $password = $confirm_password = $role ="";
$username_err = $email_err = $password_err = $confirm_password_err = $role_err= "";   



if($_SERVER["REQUEST_METHOD"] == "POST"){
 

    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
   
        $sql = "SELECT id_user FROM utilisateur WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
           
            mysqli_stmt_bind_param($stmt, "s", $param_username);
       
            $param_username = trim($_POST["username"]);
            
            
            if(mysqli_stmt_execute($stmt)){
           
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

         
            mysqli_stmt_close($stmt);
        }
    }
    

    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    

    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    

    if(empty(trim($_POST["role"]))){
        $role_err = "Please enter a role.";
    } else{
   
        $sql = "SELECT id_user FROM utilisateur WHERE role = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
           
            mysqli_stmt_bind_param($stmt, "s", $param_role);
       
            $param_role = trim($_POST["role"]);
            
            
            if(mysqli_stmt_execute($stmt)){
           
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $role_err = "This role is already taken.";
                } else{
                    $role = trim($_POST["role"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

         
            mysqli_stmt_close($stmt);
        }
    }   
    
    

    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($confirm_role_err)){
        
      
        $sql = "INSERT INTO utilisateur (username,email, password, role) VALUES (?,?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
      
            mysqli_stmt_bind_param($stmt, "sss", $param_username,$param_email, $param_password, $param_role);
            
              $param_email=$email;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            $param_role = $role;

            if(mysqli_stmt_execute($stmt)){
     
                header("location: connexion.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    

    mysqli_close($link);
}
?>




<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>projet</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Article-List.css">
    <link rel="stylesheet" href="assets/css/Dark-Mode-Switch.css">
    <link rel="stylesheet" href="assets/css/Effective-Pricing-Cards-1.css">
    <link rel="stylesheet" href="assets/css/Effective-Pricing-Cards.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link rel="stylesheet" href="assets/css/Multi-step-form.css">
    <link rel="stylesheet" href="assets/css/Neon.css">
    <link rel="stylesheet" href="assets/css/News-Cards-1.css">
    <link rel="stylesheet" href="assets/css/News-Cards.css">
    <link rel="stylesheet" href="assets/css/Parallax-Scroll-Effect.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/Social-Icons.css">
    <link rel="stylesheet" href="assets/css/sticky-dark-top-nav-with-dropdown.css">
    <link rel="stylesheet" href="assets/css/Testimonials.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav">
        <div class="container"><img src="assets/img/logo.png"><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-align-justify"></i></button>
            <div
                class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.html">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link" href="signup.php">sign up</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">login</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder"></div>
            <form action="ajut.php " method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group ">
                <label>email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
               
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($role_err)) ? 'has-error' : ''; ?>">
            <label>role</label>
                <input type="text" name="role" class="form-control" value="<?php echo $role; ?>">
                <span class="help-block"><?php echo $role_err; ?></span>
            </div> 
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-primary" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
        </div>
    </div>
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="section-heading">Let's Get In Touch!</h2>
                    <hr class="my-4">
                    <p class="mb-5">Contact us for more info !</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 ml-auto text-center"><i class="fa fa-phone fa-3x mb-3 sr-contact" data-aos="zoom-in" data-aos-duration="300" data-aos-once="true"></i>
                    <p>956-423-351</p>
                </div>
                <div class="col-lg-4 mr-auto text-center"><i class="fa fa-envelope-o fa-3x mb-3 sr-contact" data-aos="zoom-in" data-aos-duration="300" data-aos-delay="300" data-aos-once="true"></i>
                    <p><a href="mailto:your-email@your-domain.com">sporthub@gmail.com</a></p>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/creative.js"></script>
    <script src="assets/js/Dark-Mode-Switch.js"></script>
    <script src="assets/js/Multi-step-form.js"></script>
</body>

</html>
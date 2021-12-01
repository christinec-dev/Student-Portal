
<?php
/**** Christine Coomans ****/
/**** https://github.com/christinec-dev *******/
?>

<?php
//starts session
session_start();
//includes configuration file for database connection
include_once('config.php');
//initial return message set to empty
$msg='';

//if the submit button is pressed, initialise session functions
if(isset($_POST['submit'])){
    //sets initial time as 30 minutes and gets IP Address from function below
	$time=time() + 1800;
	$ip_address=getIpAddr();

    // Gets the total amount of attempts(counts) for user IP Address
	$query=mysqli_query($con,"SELECT count(*) AS total_count FROM xyz_log_history WHERE TRYTIME > $time AND IPADDRESS = '$ip_address'");
    $check_login_row=mysqli_fetch_assoc($query);
	$total_count=$check_login_row['total_count'];
    
    //If the attempt try reaches three, block the user from the system
	if($total_count==3){
        $msg="Too Many Failed Login Attempts. <br/> Try Again In 30 Minutes.";
	}else{
    // Gets the post field records from our form
    $username = $_POST['username'];
    $password=$_POST['password'];
    
    // Selects the post field records from our table and validates if correct details		
    $res=mysqli_query($con, "SELECT * FROM `xyz_students` WHERE `USERNAME` = '$username' AND `PASSWORD` = '$password'");

        // Logs user in and clears IP ADDRESS attempts from log  
        if(mysqli_num_rows($res)){
			$_SESSION['IS_LOGIN']='true';
            $_SESSION['username'] = $username;

            //If user select ‘remember’ functionality, save username & password in cookies
            if(!empty($_POST["remember"])) {
                //sets username and password for 1 hour
                setcookie ("username",$_POST["username"],time()+ 3600);
                setcookie ("password",$_POST["password"],time()+ 3600);
                echo "Cookies Set Successfuly";
            //If user do not select ‘remember’, cookies will be deleted
            } else {
                setcookie("username","");
                setcookie("password","");
                echo "Cookies Not Set";
            }

			mysqli_query($con,"delete from xyz_log_history where IPADDRESS='$ip_address'");
            //takes us to dashboard
            echo "<script>window.location.href='dashboard.php';</script>";
        // Increases attempt count and displays remaining attempts as message
		}else{
			$total_count++;
			$rem_attm=3-$total_count; 

            //if no attempts left
			if($rem_attm==0){
                $msg="Too Many Failed Login Attempts. <br/> Try Again In 30 Minutes.";
			}else{
				$msg="Invalid Username or Password. <br/> Attempts Remaining: $rem_attm";
			}
            // Captures time tried to log in to log database
			$try_time=time();
			mysqli_query($con,"insert into xyz_log_history(IPADDRESS,TRYTIME) values('$ip_address','$try_time')");
		}
	}
}

// Function to get users' IP Address
function getIpAddr(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){
       $ipAddr=$_SERVER['HTTP_CLIENT_IP'];
    }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
       $ipAddr=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
       $ipAddr=$_SERVER['REMOTE_ADDR'];
    }
   return $ipAddr;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/logo.png" type="image/png" />
    <meta name="description" content="PHP Registration Form Main Login">
    <meta name="author" content="Christine Coomans, https://github.com/christinec-dev">  
    <title>Login</title>
    <!------- CSS needed for Bootstrap ------->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!------- CSS needed for Layout ------->
    <link href="./styles/index.css" rel="stylesheet">
</head>

<body>
    <!--------- Main Navigation --------->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img class="navbar-image" src="./assets/logo.png" alt="institute logo" style="width: 50px;"></a>        
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="login.php">Login</a>
                </li>
                </ul>
            </div>
        </div>
    </nav>
        
    <!--------- Login Form Main --------->
    <form id="login-form" class="form" method="post">        
        <div class="row">
            <div class="col-12">
                <h1 class="form-header">Login Form</h1>   
                <p class="hint-text">Please Enter Your Username and Password Below</p>
                <div style="width: 400px; margin: 0 auto;">
                <!--------- Show ERR Message --------->
                <div id="result" class="alert-danger"><?php echo $msg?></div>
            </div>
        </div>
        <div class="container">
            <!--------- Username Input --------->
            <div class="row form-row">
                <div class="col-5">
                    <label for="username" class="form-label" >
                        Username
                        <!--------- Star Enforcing Requirement --------->
                        <span class="important" style="color: red;">*</span>
                    </label>
                </div>
                <div class="col-auto">
                    <!--------- Allows cookie to be set if remember me is clicked --------->
                    <input type="text" class="form-control" id="username" name="username" maxlength="30" title="Username is invalid. Please try again."  style="width: 330px;" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>" required>
                </div>
            </div>
            <!--------- Password Input --------->
            <div class="row form-row">
                <div class="col-5">
                    <label for="password" class="form-label">
                        <!--------- Star Enforcing Requirement --------->
                        Password
                        <span class="important" style="color: red;">*</span>
                    </label>
                </div>
                <div class="col-auto">
                    <!--------- Allows cookie to be set if remember me is clicked --------->
                    <input type="password" class="form-control" id="password" name="password" style="width: 330px;" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" required>
                </div>
            </div>   
            <!--------- Cancel Button --------->
            <button type="submit" class="btn btn-cancel" onclick="cancel()">Cancel</button>
            <!--------- Register Button --------->  
            <input type="submit" name="submit" class="btn btn-regis btn-md" value="Login"><br/>
            <!--------- Remember Me Button --------->  
            <input type="checkbox" name="remember" /> 
            <label class="center" for="remember-me">Remember Me?</label> 
            <!--------- Login Option --------->
            <p class="centerr">Not registered yet? <a href="./register.php">Register</a></p>
        </div>
    </form>

<!--------- Footer --------->
<section class="footer">
    <div class="container">  
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                <p>Made by Christine Coomans,  https://github.com/christinec-dev</p>
            </div>
        </div>	
    </div>
</section>

<!--------- Cancel Button will return you to home page upon confirm --------->
<script>
    function cancel() { 
        if (confirm('Are you sure you want to cancel your registration?')) 
        window.location.href='./index.php'; 
    }
</script>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<!--------- JavaScript Bundle with Popper needed for Bootstrap --------->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
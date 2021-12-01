<?php
/**** Christine Coomans ****/
/**** https://github.com/christinec-dev *******/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/logo.png" type="image/png" />
    <meta name="description" content="PHP Registration Form">
    <meta name="author" content="Christine Coomans, https://github.com/christinec-dev">  
    <title>Register</title>
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
                    <a class="nav-link active" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                </ul>
            </div>
        </div>
    </nav>
        
    <!--------- Registration Form Main --------->
    <form name="register" action="./register_script.php" class="form" method="POST">
        <div class="row">
            <div class="col-12">
                <h1 class="form-header">Registration Form</h1>
            </div>
        </div>
        <div class="container">
            <!--------- Username Input --------->
            <div class="row form-row">
                <div class="col-4">
                    <label for="username" class="form-label" >
                        Username
                        <!--------- Star Enforcing Requirement --------->
                        <span class="important" style="color: red;">*</span>
                    </label>
                </div>
                <div class="col-auto">
                <!--------- Make it required to validate --------->
                <input type="text" class="form-control" id="username" name="username" maxlength="30" title="Username is invalid. Please try again." required>
                <span class="text-danger"></span>
                </div>
            </div>
            <!--------- Password Input --------->
            <div class="row form-row">
                <div class="col-4">
                    <label for="password" class="form-label">
                        Password
                        <span class="important" style="color: red;">*</span>
                    </label>
                </div>
                <div class="col-auto">
                    <!--------- Make it required, max and min lenght, and message if it does not meet the psw pattern --------->
                    <input type="password" maxlength="25" minlength="8" class="form-control" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                </div>
            </div>
            <!--------- Password Confirm --------->
            <div class="row form-row">
                <div class="col-4">
                    <label for="confirm" class="form-label">
                        Confirm Password
                        <span class="important" style="color: red;">*</span>
                    </label>
                </div>
                <div class="col-auto">
                    <!--------- Make it required, max and min lenght, and message if it does not meet the psw pattern --------->
                    <input type="password" class="form-control" id="confirm" name="confirm" maxlength="25" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>    
                </div>
            </div>
            <!--------- Name Input --------->
            <div class="row form-row">
                <div class="col-4">
                    <label for="firstname" class="form-label">
                        First Name
                        <span class="important" style="color: red;">*</span>
                    </label>
                </div>
                <div class="col-auto">
                    <!--------- Make it required to validate --------->
                    <input type="text" class="form-control" id="firstname" name="firstname" maxlength="30" required>
                </div>
            </div>
            <!--------- Surname Input --------->
            <div class="row form-row">
                <div class="col-4">
                    <label for="surname" class="form-label">
                        Last Name
                        <span class="important" style="color: red;">*</span>
                    </label>
                </div>
                <div class="col-auto">
                    <!--------- Make it required to validate --------->
                    <input type="text" class="form-control" id="surname" name="surname" maxlength="30" required>
                </div>
            </div>
            <!--------- Email Input --------->
            <div class="row form-row">
                <div class="col-4">
                    <label for="email" class="form-label">
                        Email Address
                        <span class="important" style="color: red;">*</span>
                    </label>
                </div>
                <div class="col-auto">
                    <!--------- Email type will validate if valid email --------->
                    <input type="email" class="form-control" id="email" name="email" title="Please enter a valid email address" required>
                </div>
            </div>
            <!--------- Qualification Selector --------->
            <div class="row form-row">
                <div class="col-4">
                    <label for="qualification" class="form-label">
                        Qualification
                        <span class="important" style="color: red;">*</span>
                    </label>
                </div>
                <div class="col-auto">
                    <!--------- Make it required to validate --------->
                    <select class="form-select" aria-label="qualification" name="qualification" id="qualification" title="Please select a qualification" required>
                        <option selected>Choose Qualification</option>
                        <option value="BSc It">BSc IT</option>
                        <option value="Diploma IT">Diploma IT</option>
                        <option value="HCIT">HCIT</option>
                    </select>
                </div>
            </div>
            <!--------- Cell Number --------->
            <div class="row form-row">
                <div class="col-4">
                    <label for="cell" class="form-label">
                        Cell Number
                        <span class="important" style="color: red;">*</span>
                    </label>
                </div>
                <div class="col-auto">
                    <!--------- Make it required, with a min and max lenght of 10 validation --------->
                    <input type="tel" class="form-control" id="cell" name="cell" title="Please enter a valid cell number of up to 10 digits" maxlength="10" minlength="10" required>
                </div>
            </div>
            <!--------- Gender Option --------->
            <div class="row form-row">
                <div class="col-4">
                    <label for="gender" class="form-label">
                        Gender 
                        <span class="important" style="color: red;">*</span>
                    </label>
                </div>
                <div class="col-auto">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                        <label class="form-check-label" for="gender">
                        Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                        <label class="form-check-label" for="gender">
                        Female
                        </label>
                    </div>
                </div>
            </div>
            <!--------- Nationality Selector --------->
            <div class="row form-row">
                <div class="col-4">
                    <label for="nationality" class="form-label">
                        Nationality
                        <span class="important" style="color: red;">*</span>
                    </label>
                </div>
                <div class="col-auto">
                    <!--------- Make it required to validate --------->
                    <select class="form-select" aria-label="nationality" name="nationality" title="Please select your nationality" required>
                        <option selected>Choose Nationality</option>
                        <option value="South African">South African</option>
                        <option value="Other">Other</option>
                </select>
                </div>
            </div>
            <!--------- Cancel Button --------->
            <button type="submit" class="btn btn-cancel" onclick="cancel()">Cancel</button>
            <!--------- Register Button --------->
            <button type="submit" class="btn btn-regis" value="Submit">Register</button>
            <!--------- Login Option --------->
            <p class="center">Already a registered student? <a href="./login.php">Login</a></p>
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

<!--------- JavaScript Bundle with Popper needed for Bootstrap --------->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
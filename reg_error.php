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
    <meta name="description" content="PHP Registration Form Error">
    <meta name="author" content="Christine Coomans, https://github.com/christinec-dev">  
    <title>Registration Error</title>
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
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--------- Welcome Container --------->
    <div class="container">
        <div class="header">
            <h1>Oops!</h1>
            <p>Something went wrong. Please try again!</p>
            
            <button class="btn btn-login"><a href="./login.php">Login</a></button>
            <button class="btn btn-register"><a href="./register.php">Register</a></button>
        </div>
    </div>

    <!--------- Main Footer --------->
    <section class="footer">
        <div class="container">  
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                    <p>Made by Christine Coomans,  https://github.com/christinec-dev</p>
                </div>
            </div>	
        </div>
    </section>

    <!--------- JavaScript Bundle with Popper Needed for Bootstrap --------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
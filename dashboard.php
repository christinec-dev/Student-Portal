
<?php
/**** Copyright Christine Coomans ****/
/**** https://github.com/christinec-dev *******/
?>

<!------- Initialises Session ------->
<?php 
//if user is logged in, start session
if(!isset($_SESSION['IS_LOGIN'])){ 
    session_start(); 
    //include database configuration
    include_once('config.php');
    //set session "id" as username
    $username=$_SESSION['username'];
    
    //selects everything from xyz_students table that is relevant to the username's row
    $query=mysqli_query($con,"SELECT * FROM `xyz_students` WHERE username='$username'");
    //will fetch the student id and firstname from respective row
    while($row = mysqli_fetch_row($query)) {
        $stid = $row[0];
        $firstname = $row[4];
    }
    
    //selects everything from xyz_account table
    $queryTwo=mysqli_query($con,"SELECT * FROM `xyz_account`");
    //will return the balance, due date and attendance per row
    while($row = mysqli_fetch_row($queryTwo)) {
        $balance = $row[0];
        $due = $row[1];
        $attendance = $row[2];
    }

    //will get the first module from the xyz_results table
    $moduleOne=mysqli_query($con,"SELECT * FROM `xyz_results` LIMIT 1");
    //will return the module name and result
    while($row = mysqli_fetch_row($moduleOne)) {
       $s1 = $row[0];
       $m1 = $row[1];
    }

    //will get the second module from the xyz_results table
    $moduleTwo=mysqli_query($con,"SELECT * FROM `xyz_results` LIMIT 2");
    //will return the module name and result
    while($row = mysqli_fetch_row($moduleTwo)) {
       $s2 = $row[0];
       $m2 = $row[1];
    }

    //will get the third module from the xyz_results table
    $moduleThree=mysqli_query($con,"SELECT * FROM `xyz_results` LIMIT 3");
    //will return the module name and result
    while($row = mysqli_fetch_row($moduleThree)) {
       $s3 = $row[0];
       $m3 = $row[1];
    }
    
    //will get the fourth module from the xyz_results table
    $moduleFour=mysqli_query($con,"SELECT * FROM `xyz_results` LIMIT 4");
    //will return the module name and result
    while($row = mysqli_fetch_row($moduleFour)) {
       $s4 = $row[0];
       $m4 = $row[1];
    }

    //will get the fifth module from the xyz_results table
    $moduleFive=mysqli_query($con,"SELECT * FROM `xyz_results` LIMIT 5");
    //will return the module name and result
    while($row = mysqli_fetch_row($moduleFive)) {
       $s5 = $row[0];
       $m5 = $row[1];
    }
}

//if user is not logged session, return to login.php
if(!isset($_SESSION['IS_LOGIN'])){ 
	header('Location: login.php'); 
	die(); 
} 
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
    <title>Student Dashboard</title>
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
                    <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
                </ul>
            </div>
        </div>
    </nav>

	<!--------- Welcome Container --------->
    <div class="container">
        <div class="header-login">
			<!--------- Welcome & Display Session Username --------->
			<h1>Welcome <span id="result"><?php echo $_SESSION['username'];?></span></h1>
            <!--------- Tab Headers ------------->
            <div class="tabs"  style="margin-top: 40px">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <!--------- Fees Header --------->
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="fees-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true" style="color: #131313 !important;">Fees</button>
                </li>
                <!--------- Attendance Header ---->
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="attend-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false" style="color: #131313 !important;">Attendance</button>
                </li>
                <!--------- Results Header -------->
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="results-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false" style="color: #131313 !important;">Results</button>
                </li>
            </ul>

            <!--------- Tabs --------------->
            <div class="tab-content" id="myTabContent" style="margin-top: 20px">
            <!--------- Fees Tab ----------->
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="fees-tab">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Student ID</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Balance</th>
                        <th scope="col">Due Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td><?php echo $stid?></td>
                        <td><?php echo $firstname?></td>
                        <td><?php echo "R" . $balance?></td>
                        <td><?php echo $due?></td>
                        </tr>
                    </tbody>    
                </table>   
                <div class="row">
                    <div>
                        <button class="btn btn-return"><a href="./dashboard.php">Return</a></button>
                    </div> 
                </div>     
            </div>
            <!--------- Attendance Tab ----------->
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="attend-tab">
            <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Student ID</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Attendance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $stid?></td>
                            <td><?php echo $firstname?></td>
                            <td><?php echo $attendance . "%"?></td>
                        </tr>
                    </tbody>    
                </table>   
                <div class="row">
                    <div>
                        <button class="btn btn-return"><a href="./dashboard.php">Return</a></button>
                    </div> 
                </div> 
            </div>
            <!--------- Results Tab ----------->
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="results-tab">
            <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Student ID</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Module</th>
                        <th scope="col">Result</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo $stid?></td>
                        <td><?php echo $firstname?></td>
                        <td class="list">
                            <?php echo $s1?><br/>
                            <?php echo $s3?><br/>
                            <?php echo $s2?><br/>
                            <?php echo $s4?><br/>
                            <?php echo $s5?><br/>
                        </td>
                        <td class="list">
                            <?php echo $m1?><br/>
                            <?php echo $m3?><br/>
                            <?php echo $m2?><br/>
                            <?php echo $m4?><br/>
                            <?php echo $m5?><br/>
                        </td>
                    </tr>
                    </tbody>    
                </table>   
                <div class="row">
                   <form action="" method="post" class="dash-form" style="padding-right: 58px; margin-top: -40px;">
                        <button class="btn btn-return"><a href="./dashboard.php">Return</a></button>
                        <!--------- Academic Record Request autmatically ----------->
                        <input type="submit" class="btn btn-request" value="Request Academic Record" name="button_pressed"/>
                    </form>
                    <!--------- Above input will automatically send the email to the RGIT Results Department ----------->
                    <?php
                        if(isset($_POST['button_pressed']))
                        {
                            $to      = 'someone@results.com';
                            $subject = 'Academic Record Request';
                            $message = 'Student with ID '. $stid . ' has requested their Academic Record. Please respond back.';
                            $headers = 'From: someone@results.com' . "\r\n" .
                                'Reply-To: someone@results.com' . "\r\n" .
                                'X-Mailer: PHP/' . phpversion();
                            mail($to, $subject, $message, $headers);
                            echo 'Email Sent.';
                        }
                    ?>
                </div> 
            </div>
            </div>
        </div>
        </div>
    </div>

	<!--------- Main Footer --------->
	<section class="footer">
        <div class="container">  
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                    <p>Made by Christine Coomans, https://github.com/christinec-dev</p>
                </div>
            </div>	
        </div>
    </section>

<!--------- JavaScript Bundle with Popper Needed for Bootstrap --------->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>


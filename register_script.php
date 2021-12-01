<?php
/**** Question One *********/
/**** Christine Coomans ****/
/**** https://github.com/christinec-dev *******/

// Creates a database connection to student_table
$con = mysqli_connect('localhost', 'root', '','student_table');

// Gets the post field records from our form
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT); //hashes password
$confirm =  password_hash($_POST['confirm'], PASSWORD_BCRYPT); //hashes password confirm
$firstname = $_POST['firstname'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$qualification = $_POST['qualification'];
$cell = $_POST['cell'];
$gender = $_POST['gender'];
$nationality = $_POST['nationality'];

//create a unique STID
$uuid = bin2hex(random_bytes(4));

// Stores the post field records from our form for validation
$data = $_POST;

//Validate that the username and email is unique and not taken by existing students
$sql_u = "SELECT * FROM registration_table WHERE username='$username'";
$sql_e = "SELECT * FROM registration_table WHERE email='$email'";
$res_u = mysqli_query($con, $sql_u);
$res_e = mysqli_query($con, $sql_e);

// Validates wether or not fields have been entered/selected
if (empty($data['username']) ||
    empty($data['firstname']) ||
    empty($data['surname']) ||
    empty($data['email']) ||
    empty($data['cell']) ||
    empty($data['nationality']) ||
    empty($data['gender']) ||
    empty($data['qualification']) ||
    empty($data['password']) ||
    empty($data['email']) ||
    empty($data['confirm'])) {
    //if a field is empty, remind user to fill it in and take them back to the form
    echo '<script>alert("Please fill in all required fields.");window.location.href = "register.php";</script>';
}

//if password and password confrim does not match
if ($data['password'] !== $data['confirm']) {
    //inform user and have them fill it in again
    echo '<script>alert("Confirmed password did not match. Please try again");window.location.href = "register.php";</script>';
    die();
}   

// if username is taken, stop user from registering
if (mysqli_num_rows($res_u) > 0) {
    echo '<script>alert("Username already taken. Please try again");window.location.href = "register.php";</script>';  }
// if email is taken, stop user from registering
else if (mysqli_num_rows($res_e) > 0) {
    echo '<script>alert("Email user already exists. Please try again");window.location.href = "register.php";</script>';
// Database INSERT SQL Code to add data to our registration_table table if email && username is unique
} else {
    $sql = "INSERT INTO `registration_table`(`STID`, `USERNAME`, `PASSWORD`, `CONFIRM_PASSWORD`, `FIRSTNAME`, `SURNAME`, `EMAIL`, `QUALIFICATION`, `CELL_NUMBER`, `GENDER`, `NATIONALITY`) VALUES ('$uuid', '$username', '$password', '$confirm', '$firstname', '$surname', '$email', '$qualification', '$cell', '$gender', '$nationality')";
}

// Inserts into database 
$rs = mysqli_query($con, $sql);

// Checks connection success
if($rs)
{
    echo '<script>window.location.href = "reg_success.php";</script>';
} else {
    echo '<script>window.location.href = "reg_error.php";</script>';
    exit;
}

// Closes connection
mysqli_close($con);
?>
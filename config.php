<?php
// Makes connection to our database
$con = mysqli_connect('localhost', 'root', '','xyz_database');
// Checks connection for error
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
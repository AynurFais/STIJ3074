<?php

$servername = "localhost";
$username = "root";
$passworddb = "";
$dbname = "crudapp";
$con = mysqli_connect($servername,$username,$passworddb,"$dbname");


function escape($string)
{
    global $con;    
    return mysqli_real_escape_string($con,$string);
}

function clean($string)
{
	$string = trim($string);
	$string = stripcslashes($string);
	$string = htmlentities($string);

	return $string;
}



?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

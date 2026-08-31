<?php

/*define('DB_SERVER','localhost');
define('DB_USERNAME',"root");
define('DB_PASSWORD',"")
define('DB_DATABASE',"websitedb")

$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);*/
$server = "localhost";
$username="root";
$password="MySQLPasswordIsStrong@90";
$database="intandovisionarydb";
$conn = mysqli_connect($server,$username,$password,$database);

if(!$conn)
{
    die("Connection Failed: ".mysqli_connect_error());
}


?>


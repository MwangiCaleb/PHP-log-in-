<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_sample_db2";

if(!$con = mysqli_connect($dbhost , $dbuser , $dbpass ,$dbname))
{

die("failed to connect!");



}
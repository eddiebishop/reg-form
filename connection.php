<?php

function Connect()
{
 $dbhost = "localhost";
 $dbuser = "id3053654_eddiebishop";
 $dbpass = "smokey12";
 $dbname = "id3053654_hw";
 
 // Create connection
 $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);
 
 return $conn;
}
 
?> 